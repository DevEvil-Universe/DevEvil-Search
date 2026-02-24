const express = require('express');
const fetch = require('node-fetch');
const https = require('https');
const app = express();
const port = 5000;
const bodyParser = require('body-parser');
require('dotenv').config();
const cors = require('cors');

const ipv4Agent = new https.Agent({
    family: 4
});

const allowedOrigins = ['http://localhost'];


const BRAVE_API_KEY = process.env.BRAVE_API_KEY;
if (!BRAVE_API_KEY) {
    console.error('no API.');
}

app.use((req, res, next) => {
    const origin = req.headers.origin;
    if (allowedOrigins.includes(origin)) {
        res.header('Access-Control-Allow-Origin', origin);
    }
    res.header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
    res.header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    next();
});

app.options('*', (req, res) => {
    const origin = req.headers.origin;
    if (allowedOrigins.includes(origin)) {
        res.header('Access-Control-Allow-Origin', origin);
    }
    res.header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
    res.header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    res.sendStatus(200);
});

async function fetchWikipediaData(query) {
    try {
        const wikiUrl = `https://en.wikipedia.org/w/api.php?action=query&format=json&prop=extracts|pageimages&exintro&explaintext&redirects=1&titles=${encodeURIComponent(query)}&pithumbsize=300`;
        const response = await fetch(wikiUrl, { agent: ipv4Agent });
        const data = await response.json();
        const pages = data.query.pages;
        const pageId = Object.keys(pages)[0];
        
        if (pageId === "-1") {
            return null; 
        }

        const page = pages[pageId];
        return {
            title: page.title,
            extract: page.extract,
            image: page.thumbnail ? page.thumbnail.source : null,
            url: `https://en.wikipedia.org/wiki/${encodeURIComponent(page.title)}`
        };
    } catch (error) {
        console.error('Error fetching Wikipedia data:', error);
        return null;
    }
}

async function fetchDefinitionData(query) {
    try {
        const dictUrl = `https://api.dictionaryapi.dev/api/v2/entries/en/${encodeURIComponent(query)}`;
        const response = await fetch(dictUrl, { agent: ipv4Agent });
        const data = await response.json();
        
        if (data.title === "No Definitions Found") {
            return null; 
        }

        const entry = data[0]; 
        const definition = entry.meanings[0]?.definitions[0]?.definition || "No definition available.";
        const partOfSpeech = entry.meanings[0]?.partOfSpeech || "Unknown";
        return {
            word: entry.word,
            partOfSpeech: partOfSpeech,
            definition: definition
        };
    } catch (error) {
        console.error('Error fetching definition data:', error);
        return null;
    }
}

app.get('/api/search', async (req, res) => {
    const query = req.query.q;
    const type = req.query.type || 'all';
    const safeSearch = req.query.safe || 'active';
    const location = req.query.cr || 'countryUS';
    const startIndex = parseInt(req.query.start) || 1;

    const baseUrl = 'https://api.search.brave.com/res/v1/';
    let endpoint;
    if (type === 'images') endpoint = 'images/search';
    else if (type === 'news') endpoint = 'news/search';
    else if (type === 'videos') endpoint = 'videos/search';
    else endpoint = 'web/search';

    const count = type === 'images' ? 20 : 10;
    let offset = Math.max(0, startIndex - 1);
    if (type !== 'images') offset = Math.min(offset, 9); 

    let countryCode = 'us';
    if (location.startsWith('country')) {
        countryCode = location.substring(7).toLowerCase();
    } else if (location) {
        countryCode = location.toLowerCase();
    }

    const safeParam = type === 'images'
        ? (safeSearch === 'active' ? 'strict' : 'off')
        : (safeSearch === 'active' ? 'moderate' : 'off');

    const params = new URLSearchParams({
        q: query,
        count: count.toString()
    });
    if (type !== 'images') {
        params.append('offset', offset.toString());
    }
    if (countryCode) params.append('country', countryCode);
    params.append('safesearch', safeParam);

    const apiUrl = `${baseUrl}${endpoint}?${params.toString()}`;

    try {
        const [braveRaw, wikiData, definitionData] = await Promise.all([
            fetch(apiUrl, {
                headers: { 'X-Subscription-Token': BRAVE_API_KEY },
                agent: ipv4Agent
            }).then(r => {
                if (!r.ok) throw new Error(`Brave API ${r.status}`);
                return r.json();
            }),
            fetchWikipediaData(query),
            fetchDefinitionData(query)
        ]);

        let rawItems = [];
        const responseKey = (type === 'all') ? 'web' : type;
        if (braveRaw[responseKey] && Array.isArray(braveRaw[responseKey].results)) {
            rawItems = braveRaw[responseKey].results;
        } else if (Array.isArray(braveRaw.results)) {
            rawItems = braveRaw.results;
        }

        const items = rawItems.map((result, idx) => {
            let title = result.title || `Result ${idx + 1}`;
            let link = result.url || '';
            let displayLink = '';
            let snippet = result.description || result.snippet || '';
            let imageObj = null;

            if (type === 'images') {
                link = (result.properties && result.properties.url) ? result.properties.url : link;
                imageObj = { contextLink: result.source_url || '' };
                displayLink = result.publisher?.name || (result.source_url ? new URL(result.source_url).hostname.replace('www.', '') : '');
            } else {
                try {
                    displayLink = new URL(link).hostname.replace('www.', '');
                } catch (e) {}
                if (result.publisher?.name) displayLink = result.publisher.name;
            }

            const item = { title, link, displayLink, snippet };
            if (imageObj) item.image = imageObj;

            if (type === 'videos' && result.thumbnail) {
                item.pagemap = { cse_thumbnail: [{ src: result.thumbnail }] };
            }

            return item;
        });

        const searchResponse = {
            items,
            searchInformation: {
                totalResults: type === 'images' ? '200' : '100'
            }
        };

        res.json({
            search: searchResponse,
            searchInformation: searchResponse.searchInformation,
            wikipedia: wikiData,
            definition: definitionData
        });
    } catch (error) {
        console.error('Error fetching results:', error);
        res.status(500).json({ error: 'Error fetching search results' });
    }
});

app.get('/api/background', async (req, res) => {
    const PEXELS_API_KEY = process.env.PEXELS_API_KEY;
    const categories = ['nature', 'city', 'ocean', 'forest', 'street', 'landscape'];
    const randomCategory = categories[Math.floor(Math.random() * categories.length)];

    try {
        const pexelsResponse = await fetch(`https://api.pexels.com/v1/search?query=${randomCategory}&orientation=landscape&per_page=1&page=${Math.floor(Math.random() * 50) + 1}`, {
            headers: {
                Authorization: PEXELS_API_KEY
            },
            agent: ipv4Agent
        });

        const data = await pexelsResponse.json();
        const photo = data.photos[0];

        if (!photo) throw new Error('No photos returned from Pexels.');

        const imageUrl = `${photo.src.original}`;
        const photographer = photo.photographer;
        const profileUrl = photo.photographer_url;

        res.json({
            imageUrl,
            photographer,
            profileUrl,
            category: randomCategory
        });
    } catch (error) {
        console.error('Error fetching Pexels image:', error);
        res.status(500).json({ error: 'Failed to fetch image' });
    }
});

app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});