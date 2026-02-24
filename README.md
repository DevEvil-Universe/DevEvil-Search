<p align="center">
  <img alt="DevEvil Search Logo" src="https://github.com/user-attachments/assets/86e28896-98d6-4b19-bc45-fe1187e957c8" width="500" />
  
</p>


<h1 align="center">DevEvil Search</h1>

<p align="center">
  DevEvil Search is a fast, simple, open-source search engine powered by public APIs.
It delivers web, image, video, and news search results using the Brave Search API, enriched with instant summaries from Wikipedia and definitions from Free Dictionary API.
It also supports dynamic background images via the Pexels API.
</p>


<br/>

## Table of Contents

- [✨ Features](#-features)
- [📸 Screenshots](#-screenshots)
- [⚙️ Requirements](#️-requirements)
- [🔑 How To Get API Keys](#-how-to-get-api-keys)
  - [Brave Search API](#1%EF%B8%8F%E2%83%A3-brave-search-api)
  - [Pexels API](#2%EF%B8%8F%E2%83%A3-pexels-api)
- [🛠️ Installation](#-installation)
- [🧪 Local Development](#-local-development)
- [🌐 Production Deployment Guide (IMPORTANT)](#-production-deployment-guide-important)
  - [🖥 Backend Deployment (VPS)](#-backend-deployment-vps)
  - [🌍 Configure Nginx Reverse Proxy](#-configure-nginx-reverse-proxy)
- [🎨 Customization](#-customization)
- [🔐 CORS Configuration](#-cors-configuration)
- [📡 API Documentation](#-api-documentation)
  - [🔎 Search Endpoint](#-search-endpoint)
  - [🖼 Background Endpoint](#-background-endpoint)
- [🤝 Contributing](#-contributing)

---

## ✨ Features

- 🔎 **Multi-type search**: Web, Images, Videos, News
- 📖 Instant **Wikipedia summaries** (when relevant)
- 📚 Instant **word definitions** from Free Dictionary API
- 🖼️ Dynamic high-quality **random background** images (Pexels)
- 🌍 **Country-specific** results (region biasing)
- 🌗 **Dark / Light** mode support
- 🛡️ **SafeSearch** filtering (on/off)

---

## 📸 Screenshots

<p align="center">
  <img alt="DevEvil Search Homepage" src="https://github.com/user-attachments/assets/8c53fcf6-d63c-4f43-868d-a0cf9a587b66"  />
  <img alt="DevEvil Search Result Page" src="https://github.com/user-attachments/assets/8bb28ba4-3f85-47e8-9a52-fc861dc66d2a" />
</p>

---

# ⚙️ Requirements

You need:

* Node.js 18+
* A VPS (for backend API server)
* A web host (for frontend)
* Nginx (or Apache reverse proxy)
* API Keys:

  * Brave Search API
  * Pexels API

---

# 🔑 How To Get API Keys

## 1️⃣ Brave Search API

1. Go to [Brave Search API](https://api-dashboard.search.brave.com/) dashboard (Brave Search Developer Portal).
2. Create an account.
3. Subscribe to a plan (Free tier available with limited requests).
4. Generate your API key.
5. Copy the key.

You will use it as:

```env
BRAVE_API_KEY=your_brave_api_key_here
```

---

## 2️⃣ Pexels API

1. Go to [Pexels](https://www.pexels.com/api/) developer page.
2. Create an account.
3. Generate a free API key.
4. Copy the key.

You will use it as:

```env
PEXELS_API_KEY=your_pexels_api_key_here
```

---

# 🛠 Installation

## 1️⃣ Clone the Repository

```bash
git clone https://github.com/DevEvil-Universe/DevEvil-Search
cd devevil-search
```

---

## 2️⃣ Install Dependencies

```bash
npm install
```

---

## 3️⃣ Create Environment File

Rename `.env.example` file to `.env` and add your API keys to it:

```env
BRAVE_API_KEY=your_brave_api_key
PEXELS_API_KEY=your_pexels_api_key
```

---

# 🧪 Local Development

You can run **DevEvil Search locally** on your computer without a VPS by using:

* **XAMPP** (recommended for Windows)
* **WAMP**
* **MAMP** (Mac)
* OR any normal PHP local server

This allows you to test the **backend API (Node.js)** and the **frontend (PHP)** together before deploying.

---

## ✔️ 1. Start Your Node.js Backend (API)

First, run the backend:

```bash
node server.js
```

Your API is available at:

```
http://localhost:5000
```

Keep this terminal window open.

---

## ✔️ 2. Install XAMPP (Windows / macOS / Linux)

Download XAMPP:

[https://www.apachefriends.org/](https://www.apachefriends.org/)

Then:

1. Install XAMPP.
2. Start **Apache** from XAMPP Control Panel.


---

## ✔️ 3. Move the Frontend to XAMPP’s `htdocs`

Place all frontend files here:

```
C:\xampp\htdocs\devevil-search\
```

Now open:

```
http://localhost/devevil-search/
```

---

## ✔️ 4. Optional: Use PHP Built-in Server (No XAMPP Required)

If you have PHP installed:

```bash
php -S localhost:8000
```

Place your frontend files in the current folder.

Then visit:

```
http://localhost:8000
```

Backend remains at:

```
http://localhost:5000
```

---

## ✔️ 5. Optional: Use WAMP or MAMP

### WAMP (Windows)

* Install WAMP from wampserver.com
* Put your frontend in:

```
C:\wamp64\www\devevil-search\
```

Visit:

```
http://localhost/devevil-search/
```

### MAMP (macOS)

* Install MAMP
* Place frontend in:

```
/Applications/MAMP/htdocs/devevil-search/
```

Visit:

```
http://localhost:8888/devevil-search/
```

---

## ✔️ 6. Full Local Example

- **Backend (Node.js)** → [http://localhost:5000](http://localhost:5000)
- **Frontend (PHP via XAMPP)** → [http://localhost/devevil-search](http://localhost/devevil-search)

---

# 🌐 Production Deployment Guide (IMPORTANT)

You need:

* VPS → Backend (Node.js API)
* Shared Hosting / Server → Frontend (PHP)
* Reverse Proxy → Connect frontend to backend securely

---

## 🖥 Backend Deployment (VPS)

### Step 1 — Install Node.js

```bash
curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
sudo apt install nodejs
```

### Step 2 — Install PM2 (Process Manager)

```bash
npm install -g pm2
```

Start your server:

```bash
pm2 start server.js --name devevil-search
pm2 save
pm2 startup
```

---

## 🌍 Configure Nginx Reverse Proxy

Install nginx:

```bash
sudo apt install nginx
```

Create config file:

```bash
sudo nano /etc/nginx/sites-available/devevil-search
```

Example configuration:

```nginx
server {
    server_name api.yourdomain.com;

    location / {
        proxy_pass http://localhost:5000;
        proxy_http_version 1.1;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection 'upgrade';
        proxy_set_header Host $host;
        proxy_cache_bypass $http_upgrade;
    }
}
```

Enable it:

```bash
sudo ln -s /etc/nginx/sites-available/devevil-search /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
```

Now your backend API will be available at:

```
https://api.yourdomain.com/api/search
```

---

# 🖥 Frontend Setup

Upload frontend files to your hosting, such as cPanel.

## Things to Customize

### 🔹 index.php

* Website name
* Meta description
* Logo
* Title tags

### 🔹 search.php

* Search result layout
* Page title format
* SEO tags

### 🔹 navbar.php

* Brand name
* Links

---

# 🎨 Customization

## Change Colors

Edit:

```
/css/style.css
/css/result.css
```

Modify CSS variables or color values.

---

## 🖼 Images

1. Create folder:

```
/img
```

2. Upload your images
3. Replace image paths inside:

   * `index.php`
   * `search.php`

---

# 🔐 CORS Configuration

By default, backend allows:

```js
const allowedOrigins = ['http://localhost'];
```

Change this to your real frontend domain:

```js
const allowedOrigins = ['https://yourdomain.com'];
```

---

# 📡 API Documentation

---

# 🔎 Search Endpoint

```
GET /api/search
```

### Query Parameters

| Parameter | Description                          |
| --------- | ------------------------------------ |
| q         | Search query (required)              |
| type      | web, images, news, videos            |
| safe      | active / off                         |
| cr        | countryUS, countryGB, countryDE, etc |
| start     | pagination index                     |

---

## 📌 Example Requests

### Web Search

```bash
curl "http://localhost:5000/api/search?q=elon+musk&type=web"
```

### Image Search

```bash
curl "http://localhost:5000/api/search?q=mountains&type=images"
```

### With Country & Safe Search

```bash
curl "http://localhost:5000/api/search?q=ai&type=web&safe=active&cr=countryUS"
```

---

## 📦 Example Response Structure

```json
{
  "search": {
    "items": [
      {
        "title": "Example Title",
        "link": "https://example.com",
        "displayLink": "example.com",
        "snippet": "Example description..."
      }
    ],
    "searchInformation": {
      "totalResults": "100"
    }
  },
  "searchInformation": {
    "totalResults": "100"
  },
  "wikipedia": {
    "title": "Artificial intelligence",
    "extract": "Artificial intelligence (AI) is...",
    "image": "https://upload.wikimedia.org/...",
    "url": "https://en.wikipedia.org/wiki/Artificial_intelligence"
  },
  "definition": {
    "word": "intelligence",
    "partOfSpeech": "noun",
    "definition": "The ability to acquire knowledge..."
  }
}
```

---

### 🔎 Response Breakdown

* `search.items[]` → Search results
* `wikipedia` → Instant summary (if available)
* `definition` → Dictionary result (if available)

---

# 🖼 Background Endpoint

```
GET /api/background
```

### Example:

```bash
curl "http://localhost:5000/api/background"
```

### Example Response:

```json
{
  "imageUrl": "https://images.pexels.com/...",
  "photographer": "John Doe",
  "profileUrl": "https://pexels.com/@johndoe",
  "category": "nature"
}
```

## 🤝 Contributing

Contributions are welcome!  
Feel free to open issues or submit pull requests.

Give the repo a ⭐ if you find it useful!
