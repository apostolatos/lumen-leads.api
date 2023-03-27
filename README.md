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

## 1 Build & Run

`docker-compose up -d --build`

Now, create 3 containers

### 2 Then install our dependencies:

`docker exec leads-app composer install`

### 3. Publish the config file

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

### 4. Add the base URL and API key to your .env

```env
ACTIVE_CAMPAIGN_BASE_URL=https://dimitrisapostolatos.api-us1.com/api/3
ACTIVE_CAMPAIGN_API_KEY=a58358ae7bf8266b40eb678dcfc617a4307d53db7505a05365b9b0a5d105217009f5b2cc
```

### 5. Run the following console commands to install tables.

`php artisan migrate --seed`

Our database is all set!

### 6. Testing lumen application

Navigate to [http://localhost:8080](http://localhost:8000/) and you should see something like this

`Lumen (8.3.4) (Laravel Components ^8.0)`

## Usage

### 1. Retrieve Leads

`GET /api/lead`

### Response

    HTTP/1.1 201 Created
    Date: Thu, 24 Mar 2023 12:36:31 GMT
    Status: 201 Created
    Connection: close
    Content-Type: application/json
    Location: /lead
    Content-Length: 35

```json
    [
        {
            "_id": "64214089682bbd70ef029da2",
            "full_name": "Dimitrios Apostolatos",
            "email": "test@test.com",
            "industry": "2",
            "active_campain_id": "9",
            "updated_at": "2023-03-27T07:06:49.940000Z",
            "created_at": "2023-03-27T07:06:49.940000Z",
            "first_name": "Dimitrios",
            "last_name": "Apostolatos"
        }
    ]
```
    
 ### 1. Ceeate Leads

`POST /api/lead`

### Response

    HTTP/1.1 201 Created
    Date: Thu, 24 Mar 2023 12:36:31 GMT
    Status: 201 Created
    Connection: close
    Content-Type: application/json
    Location: /lead
    Content-Length: 35
    
 ```json
   {
        "full_name": "Dimitrios Apostolatos",
        "email": "test@test.com",
        "industry": "2",
        "active_campain_id": "9",
        "updated_at": "2023-03-27T07:06:49.940000Z",
        "created_at": "2023-03-27T07:06:49.940000Z",
        "_id": "64214089682bbd70ef029da2",
        "first_name": "Dimitrios",
        "last_name": "Apostolatos"
    }
```
 
