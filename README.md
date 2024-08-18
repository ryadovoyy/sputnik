# sputnik

This is a REST API service for choosing a vacation spot.

## ER diagram

![er-diagram](./screenshots/er-diagram.png)

## Setup

### Cloning

```bash
git clone https://github.com/ryadovoyy/sputnik.git
cd sputnik
```

### Environment variables

Copy the env example file:

```bash
cp .env.example .env
```

Change `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` variables if you want.

## Run

```bash
docker compose up -d --build
```

Install dependencies and generate the app and secret keys:

```bash
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan jwt:secret
```

Then run migrations and seeders:

```bash
docker compose exec app php artisan migrate --seed
```

## Test

Now you are ready to see and test all endpoints. Import `postman-collection.json` in Postman and run the collection. The pre-request script will automatically authenticate you in the beginning and when a token expires.
