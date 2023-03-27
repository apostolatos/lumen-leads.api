<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Laravel simple Application

First of all we need to clone project:

`git clone https://github.com/apostolatos/lumen-leads.api.git`

A folder `\lumen-leads.api` is now created.

`cd lumen-leads.api`

Run Docker Compose

now, create 3 containers

# Build & Run

`docker-compose up -d --build`

Then install our dependencies:

`docker-exec leads-app composer install`

Now, we need to create a database which is named `laravel_api`

Copy **.env.example**

Change the name with .env and make your own settings in .env file.

- MONGO_DB_CONNECTION=mongodb
- MONGO_DB_HOST=mongodb
- MONGO_DB_PORT=27017
- MONGO_DB_DATABASE=mongo
- MONGO_DB_USERNAME=root
- MONGO_DB_PASSWORD=password

- ACTIVE_CAMPAIGN_BASE_URL=https://dimitrisapostolatos.api-us1.com/api/3
- ACTIVE_CAMPAIGN_API_KEY=a58358ae7bf8266b40eb678dcfc617a4307d53db7505a05365b9b0a5d105217009f5b2cc

Once the database is created, run the following console commands to install tables.

`php artisan migrate --seed`

Our database is all set!

# Run

Navigate to http://localhost:8080 and you should see something like this

`Lumen (8.3.4) (Laravel Components ^8.0)`
