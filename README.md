# Lost & Found
 
## Features
### Users management
Create various users in the application. But there is no access-management.
Every user can control the whole application / information.
Seeded user can log in with the following data : admin@tab.ch:password

### Items
You can define Items, which will be shown on the public page.

### Claims
Customers can claim an Item to get it back.

## Technologies
### PHP
Developed & Tested on PHP: 7.4.6

### Laravel
Based on Laravel-Framework Version: 7.26.1

### Yarn
User Yarn to compile Assets in Version: 1.22.0

## Setup
### Webserver
Best use Apache or Nginx as Webserver. Surely with PHP module or FPM | FCGI.
You'll have to set the document root into the dir `./public`.

### Composer installation
Now install all the composer-libraries with the command `composer install` or `php composer.phar install`.
See here how to install composer: https://getcomposer.org/

### DB Migration
If the app is set up, you have to create a db by now. Enter the configuration to the .env or add them to the server ENV.
If the configuration is done, run the following command: `php artisan migrate`

### DB Seeding
When migration is done, let the DB be seeded: `php artisan db:seed`

### Have fun... 
