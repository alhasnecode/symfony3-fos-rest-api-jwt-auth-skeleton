# Symfony 3 Rest API Example

A Symfony 3 Sample Rest API App using FOSRestBundle with JWT Authentication

## Requirements

- PHP 5.4 or higher

## Installation

- Update the project dependencies `$ composer update`
- Set your MySQL credentials and host at app/config/parameters.yml file
- Create the database by executing `$ php bin/console doctrine:database:create`
- Create database schema by executing `$ php bin/console doctrine:schema:update --force`
- Load the test set of data using the command `$ php bin/console doctrine:fixtures:load`
- Run the application using PHP's built-in server with one of the following commands `$ php bin/console server:start` or `php bin/console server:run`
- Test `/games` route with cURL:

   `$ curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X GET http://127.0.0.1:8000/games`
