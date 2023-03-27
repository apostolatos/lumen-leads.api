# Lumen simple Application

This package provides a simple interface to the ActiveCampaign API v3.

Currently the packages only supports the endpoints `Contacts`.

## Lumen Support

| Version | Release |
|---------|---------|
|  8.3.x  |   1.0   |

First of all we need to clone project:

`git clone https://github.com/apostolatos/lumen-leads.api.git`

A folder `\lumen-leads.api` is now created.

`cd lumen-leads.api`

## Build & Run

`docker-compose up -d --build`

Now, create 3 containers

## Then install our dependencies:

`docker-exec leads-app composer install`

### 2. Publish the config file

Copy **.env.example**

Change the name with .env and make your own settings in .env file.

```env
MONGO_DB_CONNECTION=mongodb
MONGO_DB_HOST=mongodb
MONGO_DB_PORT=27017
MONGO_DB_DATABASE=mongo
MONGO_DB_USERNAME=root
MONGO_DB_PASSWORD=password
```

### 3. Add the base URL and API key to your .env

```env
- ACTIVE_CAMPAIGN_BASE_URL=https://dimitrisapostolatos.api-us1.com/api/3
- ACTIVE_CAMPAIGN_API_KEY=a58358ae7bf8266b40eb678dcfc617a4307d53db7505a05365b9b0a5d105217009f5b2cc
```

## Run the following console commands to install tables.

`php artisan migrate --seed`

Our database is all set!

## Testing lumen application

Navigate to http://localhost:8080 and you should see something like this

`Lumen (8.3.4) (Laravel Components ^8.0)`
