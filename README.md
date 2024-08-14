# sputnik

This is a REST API service for choosing a vacation spot.

## Setup

### Cloning

```bash
git clone https://github.com/ryadovoyy/sputnik.git
cd sputnik
```

### Environment variables

Copy the env example file and run an `artisan` command to generate the app key:

```bash
cp .env.example .env
php artisan key:generate
```

Change `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` variables if you want.

## Run

```bash
docker compose up
```
