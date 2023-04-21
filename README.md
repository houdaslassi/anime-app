# Anime Tracker

A modern web application for tracking your anime watching progress, built with Laravel and Tailwind CSS.

## Features

- **Dashboard Overview**: Get a quick glance at your anime watching status
  - Currently watching shows
  - Recently added anime
  - Personal watchlist management
  - Quick statistics

- **Watchlist Management**
  - Track watching status (Watching, Completed, Plan to Watch, Dropped)
  - Update episode progress
  - Add/Remove anime from watchlist
  - Organize your anime collection

- **Anime Details**
  - View comprehensive anime information
  - Cover images and descriptions
  - Episode tracking
  - Status updates

## Tech Stack

- **Backend**: Laravel 10.x
- **Frontend**: 
  - Blade Templates
  - Tailwind CSS
  - Alpine.js
- **Database**: MySQL
- **Authentication**: Laravel Breeze

## Requirements

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL

## Installation

1. Clone the repository
```bash
git clone <repository-url>
cd anime-app
```

2. Install PHP dependencies
```bash
composer install
```

3. Install and compile frontend dependencies
```bash
npm install
npm run dev
```

4. Configure environment
```bash
cp .env.example .env
php artisan key:generate
```

5. Configure your database in `.env`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=anime_tracker
DB_USERNAME=root
DB_PASSWORD=
```

6. Run migrations
```bash
php artisan migrate
```

7. Start the development server
```bash
php artisan serve
```

## Usage

1. Register a new account or login
2. Browse the anime catalog
3. Add shows to your watchlist
4. Update your watching progress
5. Track your completion statistics
