# LiveJournal

LiveJournal is a project that makes it possible to post and manage articles / blogs on a site. Also in the project there are several languages ​​that can be switched at any time. LiveJournal can serve as the foundation for creating a news site.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Installing

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/6.x/installation).

Clone the repository

```
git clone git@github.com:genyaevgeney/work-event-project.git
```

Switch to the repo folder

```
cd work-event-project
```

Install dependencies

```
composer install
```

Copy the example env file and make the required configuration changes in the .env file.

```
cp .env.example .env
```

The name of your database should be stored in the `DB_DATABASE` variable, the username in the `DB_USERNAME` variable and the user password in the `DB_PASSWORD` variable.

Generate key

```
php artisan key:generate
```

Run migrations

```
php artisan migrate
```

If you are working with MariaDB or earlier versions of MySQL, you may encounter a key length error when trying to start a migration.
As outlined in the Migrations [guide](https://laravel.com/docs/master/migrations#creating-indexes) to fix this all you have to do is edit your AppServiceProvider.php file and inside the boot method set a default string length:

```php
use Illuminate\Support\Facades\Schema;

public function boot()
{
    Schema::defaultStringLength(191);
}
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

Copy the example env file and make the required configuration changes in the .env file.

```
cp .env.example .env
```

Your server URL should be stored in the variable `VUE_APP_BASE_URL`.

Project setup

```
npm install
```

Lints and fixes files

```
npm run lint
```

Compiles and minifies for production

```
npm run build
```

Compiles and hot-reloads for development

```
npm run serve
```

Customize configuration

See [Configuration Reference](https://cli.vuejs.org/config/).

## Running the tests

To run the tests, you first need to create a database for the tests. The structure of the test database should be the same as that of the project database. After that, you need to open the phpunit.xml file and set your values ​​to `DB_CONNECTION` and `DB_DATABASE`.

Testing is explained in detail in the [official documentation](https://laravel.com/docs/6.x/testing).

To run the tests, run the following command

```
vendor/bin/phpunit
```
