## Requirements 

* PHP >= 7.2
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* NodeJS >= 8.9.4
* NPM >= 5.8
* Composer >= 1.6

## Installation

##### 1. Clone & install
```bash
git clone https://github.com/artemsky/LaravelTemplate.git
cd LaravelTemplate
git checkout develop
composer install
npm install
php artisan env:init
```

##### 2. Configure `.env`

##### 3. Create database
```mysql
create database homestead;
```

##### 4. Run migrations && seeders
```bash
php artisan migrate --seed
```

###### Laravel Documentation - [here](https://laravel.com/docs/5.6)

## Run
#### Compile assets

* Build admin & client for production `npm run prod`
* Build admin & client for development `npm run dev`

###### Standalone build
* Build client for production `npm run production:client`
* Build admin for production `npm run production:admin`
* Build client for development `npm dev development:client`
* Build admin for development `npm dev development:admin`

## CI

```bash
npm ci
npm run prod
```

Laravel-mix Documentation [here](https://github.com/JeffreyWay/laravel-mix/tree/master/docs#readme)

#### Run server
###### With PHP Server
```bash
php artisan serve
```

###### With Apache/Nginx

Configure your server to look for `index.php` into project `/public` folder

____________________________________________________________________________

## Using Homestead

Documentation - [here](https://laravel.com/docs/5.6/homestead)
