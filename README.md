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
