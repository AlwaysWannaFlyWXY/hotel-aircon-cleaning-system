# AirCare Hotel Aircon Cleaning

A simple Laravel tracker for hotel room aircon cleaning across floors 18–31.

## Hotel room setup

- 14 floors: 18 through 31
- 42 rooms on each floor
- Room suffixes `01`–`43`, excluding `04` (for example, `2401` and `3101`)
- 588 rooms in total

Each room is either **Not yet** or **Cleaned**. Recording a clean captures the team member and automatic date/time, while retaining an audit record in `cleaning_records`.

## Run with Docker

```bash
docker compose up --build
```

Open http://localhost:8000. The app runs migrations and seeds the 588 rooms when it starts.

## Local configuration

Set PostgreSQL values in `.env`, then run:

```bash
php artisan migrate --seed
php artisan serve
```

## Deploy on Render

This project uses the `Dockerfile`; no Node/Vite build is required. In your Render web service, add these environment variables (use your Supabase session-pooler values):

```text
APP_KEY=base64:your-generated-laravel-key
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-service.onrender.com
DB_CONNECTION=pgsql
DB_HOST=your-supabase-pooler-host
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=your-pooler-username
DB_PASSWORD=your-supabase-password
DB_SSLMODE=require
```

Render supplies `PORT` automatically; the container uses it when starting Laravel.
