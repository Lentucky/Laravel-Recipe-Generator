# Recipe Search - AI-Powered Recipe Finder

A Laravel + FastAPI application for searching recipes using all-MiniLM-L6-v2 for AI embeddings and semantic search.

## Features

-   Search recipes by keywords using AI
-   View ingredients and cooking steps
-   Responsive web interface
-   Fast semantic search using sentence transformers

## Prerequisites

-   PHP 8.4+
-   Node.js 18+
-   Python 3.8+
-   Composer
-   Git

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/recipe-ai.git
cd recipe-ai
```

### 2. Download the ML Model (IMPORTANT!)

**The model files are too large for GitHub.** Download them here:

👉 [Download Recipe Model from Google Drive](https://drive.google.com/drive/u/2/folders/1C5TzoRdG5kZv8gTnO8g37RoEkTM9GHJo)

Then extract to your project root. See [DOWNLOAD_MODEL.md](DOWNLOAD_MODEL.md) for detailed instructions.

### 3. Install Dependencies

**Laravel:**

```bash
composer install
cp .env.example .env
php artisan key:generate
```

**Node.js:**

```bash
npm install
```

**Python:**

```bash
python -m venv venv
venv\Scripts\activate  # Windows
# OR
source venv/bin/activate  # Mac/Linux

pip install -r requirements.txt
```

### 4. Run the Application

**Option A - Quick Start (Windows):**

```bash
.\start.bat
```

**Option B - Manual (All Platforms):**

Open 3 terminal windows:

Terminal 1 - Laravel:

```bash
php artisan serve
```

Terminal 2 - Frontend:

```bash
npm run dev
```

Terminal 3 - FastAPI:

```bash
venv\Scripts\activate  #Windows
source venv/bin/activate  #Mac/Linux
cd fastapi
uvicorn main:app --reload --port 8001
```

## Access the Application

-   **Recipe Search:** http://localhost:8000/recipes/search
-   **FastAPI Docs:** http://localhost:8001/docs

## Project Structure
