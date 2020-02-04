# LiveJournal

Laravel Vue event project

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Installing

A step by step series of examples that tell you how to get a development env running

Install dependencies

```
composer install
```

Generate key

```
php artisan key:generate
```

Create .env file and fill it with your data

Run migrations

```
php artisan migrate
```

Run seeds

```
php artisan db:seed
```

### Client

First you need to go to the client folder

```
cd client
```

Project setup

```
npm install
```

Compiles and hot-reloads for development

```
npm run serve
```

Compiles and minifies for production

```
npm run build
```

Lints and fixes files

```
npm run lint
```

Customize configuration

See [Configuration Reference](https://cli.vuejs.org/config/).

## Running the tests

To run the tests, run the following command

```
phpunit
```
