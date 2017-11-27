# Symfony 3 Rest API Example

A Symfony 3 Sample Rest API App using FOSRestBundle with Json Web Tokens Authentication

## Requirements

- PHP 5.4 or higher

## Installation

- Update the project dependencies `$ composer update`
- Set your MySQL credentials and host at app/config/parameters.yml file
- Create the database by executing `$ php bin/console doctrine:database:create`
- Create database schema by executing `$ php bin/console doctrine:schema:update --force`
- Load the test set of data using the command `$ php bin/console doctrine:fixtures:load`
- Run the application using PHP's built-in server with one of the following commands `$ php bin/console server:start` or `php bin/console server:run`
- Test `api/games` route with cURL:

   `$ curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X GET http://127.0.0.1:8000/api/games`

- Get the admin JWT token to access and execute secured urls `/api/secure/^`:
  - Request the admin token with `admin` for username and password values:

    `$ curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X POST -d '{"username":"admin","password":"admin"}' http://127.0.0.1:8000/api/secure/login_check`

  - Copy the returned token string and paste it in an Authorization header for
    the secured url request:

    `$ curl -i -H "Accept: application/json" -H "Content-Type: application/json" -H "Authorization: Bearer %token_string%" -X POST http://127.0.0.1:8000/api/secure/games`
