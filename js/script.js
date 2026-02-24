document.addEventListener("DOMContentLoaded", async function () {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const query = urlParams.get('q') || '';
    const type = urlParams.get('type') || 'all';
    const startIndex = parseInt(urlParams.get('start')) || 1;
    const safeSearchValue = urlParams.get('safe') || 'active';
    const locationValue = urlParams.get('cr') || 'countryUS';

    const resultsPerPage = 10;
    const currentPage = Math.ceil(startIndex / resultsPerPage);

    const searchInput = document.getElementById('search-input');
    searchInput.value = query;

    const tabs = ['all', 'images', 'videos', 'news'];
    tabs.forEach(tab => {
        const tabElement = document.getElementById(`${tab}-tab`);
    
        if (tab === type) {
            tabElement.classList.add('active');
        } else {
            tabElement.classList.remove('active');
        }
    });

    const apiUrl = `http://localhost:5000/api/search?q=${query}&type=${type}&start=${startIndex}&safe=${safeSearchValue}&cr=${locationValue}`;

    const resultsContainer = document.getElementById('results');
    resultsContainer.innerHTML = '';

    const knowledgePanel = document.getElementById('knowledge-panel');
    knowledgePanel.innerHTML = '';

    const definitionPanel = document.getElementById('definition-panel');
    definitionPanel.innerHTML = '';

    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            if (data.definition && type === 'all') {
                const def = data.definition;
                definitionPanel.innerHTML = `
                    <div class="search-answer-title"><i class="fas fa-book"></i> Definition</div>
                    <div class="search-answer-content">
                        <p><strong>${def.word} (${def.partOfSpeech})</strong>: ${def.definition}</p>
                    </div>
                `;
            } else {
                definitionPanel.style.display = 'none';
            }

            if (data.wikipedia && type === 'all') {
                const wiki = data.wikipedia;
                knowledgePanel.innerHTML = `
                    <div class="knowledge-panel">
                        ${wiki.image ? `<img src="${wiki.image}" alt="${wiki.title}">` : ''}
                        <h2>${wiki.title}</h2>
                        <p>${wiki.extract.length > 500 ? wiki.extract.substring(0, 500) + '...' : wiki.extract}</p>
                        <a href="${wiki.url}" target="_blank">Read more on Wikipedia</a>
                        <p class="source">Source: Wikipedia</p>
                    </div>
                `;
            } else {
                knowledgePanel.style.display = 'none';
            }

            let imageGroupContainer;
            if (type === 'images') {
                imageGroupContainer = document.createElement('div');
                imageGroupContainer.classList.add('image-results-container');
            }
            if (data.search.items && data.search.items.length > 0) {
                data.search.items.forEach(item => {
                    const resultItem = document.createElement('div');
                    resultItem.classList.add('result-item');

                    if (type === 'images') {
                        resultItem.classList.add('image');
                        const metaInfoDiv = document.createElement('div');
                        metaInfoDiv.className = 'img-search';
                        const imgLink = document.createElement('a');
                        imgLink.href = item.image.contextLink || item.link;
                        imgLink.target = '_blank';
                        const img = document.createElement('img');
                        img.src = item.link;
                        img.alt = item.title;
                        img.style.maxWidth = '100%';
                        imgLink.appendChild(img);
                        metaInfoDiv.appendChild(imgLink);
                        resultItem.appendChild(metaInfoDiv);
                    } else if (type === 'videos' && item.pagemap && item.pagemap.videoobject) {
                        const websiteName = item.displayLink || 'Unknown Website';
                        const favicon = `https://icons.duckduckgo.com/ip3/${websiteName}.ico`;
                        const metaInfoDiv = document.createElement('div');
                        metaInfoDiv.className = 'meta-info';
                        if (favicon) {
                            const faviconImg = document.createElement('img');
                            faviconImg.src = favicon;
                            faviconImg.alt = 'Favicon';
                            faviconImg.className = 'favicon';
                            metaInfoDiv.appendChild(faviconImg);
                        }
                        const websiteInfo = document.createElement('p');
                        websiteInfo.textContent = `${websiteName}`;
                        metaInfoDiv.appendChild(websiteInfo);
                        resultItem.appendChild(metaInfoDiv);
                        const videoTitle = document.createElement('h3');
                        videoTitle.innerHTML = `<a href="${item.link}" target="_blank">${item.title}</a>`;
                        resultItem.appendChild(videoTitle);
                    } else if (type === 'news' && item.pagemap && item.pagemap.metatags) {
                        const domain = item.displayLink || 'Unknown Domain';
                        const favicon = `https://icons.duckduckgo.com/ip3/${domain}.ico`;
                        const metaInfoDiv = document.createElement('div');
                        metaInfoDiv.className = 'meta-info';
                        if (favicon) {
                            const faviconImg = document.createElement('img');
                            faviconImg.src = favicon;
                            faviconImg.alt = 'Favicon';
                            faviconImg.className = 'favicon';
                            metaInfoDiv.appendChild(faviconImg);
                        }
                        const resultInfo = document.createElement('p');
                        resultInfo.textContent = `${domain}`;
                        metaInfoDiv.appendChild(resultInfo);
                        resultItem.appendChild(metaInfoDiv);
                        const newsTitle = document.createElement('h3');
                        newsTitle.innerHTML = `<a href="${item.link}" target="_blank">${item.title}</a>`;
                        resultItem.appendChild(newsTitle);
                        const snippet = document.createElement('p');
                        snippet.textContent = item.snippet;
                        resultItem.appendChild(snippet);
                    } else {
                        const domain = item.displayLink || 'Unknown Domain';
                        const favicon = `https://icons.duckduckgo.com/ip3/${domain}.ico`;
                        const metaInfoDiv = document.createElement('div');
                        metaInfoDiv.className = 'meta-info';
                        if (favicon) {
                            const faviconImg = document.createElement('img');
                            faviconImg.src = favicon;
                            faviconImg.alt = 'Favicon';
                            faviconImg.className = 'favicon';
                            metaInfoDiv.appendChild(faviconImg);
                        }
                        const resultInfo = document.createElement('p');
                        resultInfo.textContent = `${domain}`;
                        metaInfoDiv.appendChild(resultInfo);
                        resultItem.appendChild(metaInfoDiv);
                        const title = document.createElement('h3');
                        title.innerHTML = `<a href="${item.link}" target="_blank">${item.title}</a>`;
                        resultItem.appendChild(title);
                        if (item.snippet) {
                            const snippet = document.createElement('p');
                            snippet.textContent = item.snippet;
                            resultItem.appendChild(snippet);
                        }
                        if (type === 'videos') {
                            const img = document.createElement('img');
                            img.src = item.pagemap.cse_thumbnail ? item.pagemap.cse_thumbnail[0]['src'] : '';
                            img.classList.add('thumbnail');
                            resultItem.appendChild(img);
                        }
                    }

                    if (type === 'images') {
                        imageGroupContainer.appendChild(resultItem);
                    } else {
                        resultsContainer.appendChild(resultItem);
                    }
                });

                if (type === 'images' && imageGroupContainer) {
                    resultsContainer.appendChild(imageGroupContainer);
                }

                const totalResults = data.searchInformation.totalResults;
                const totalPages = Math.ceil(totalResults / resultsPerPage);
                const maxPagesToShow = 10;
                const paginationContainer = document.createElement('div');
                paginationContainer.classList.add('pagination-container');

                let startPage = Math.max(currentPage - Math.floor(maxPagesToShow / 2), 1);
                let endPage = Math.min(startPage + maxPagesToShow - 1, totalPages);

                if (endPage - startPage < maxPagesToShow - 1) {
                    startPage = Math.max(endPage - maxPagesToShow + 1, 1);
                }

                for (let i = startPage; i <= endPage; i++) {
                    const pageLink = document.createElement('a');
                    const pageStartIndex = (i - 1) * resultsPerPage + 1;
                    pageLink.href = `./search?q=${query}&type=${type}&start=${pageStartIndex}&safe=${safeSearchValue}&cr=${locationValue}`;
                    pageLink.textContent = i;
                    pageLink.classList.add('pagination-link');
                    if (i === currentPage) {
                        pageLink.classList.add('active');
                    }
                    paginationContainer.appendChild(pageLink);
                }

                resultsContainer.appendChild(paginationContainer);
            } else {
                resultsContainer.innerHTML = '<p>No results found.</p>';
            }
        })
        .catch(error => {
            console.error('Error fetching search results:', error);
        });
});