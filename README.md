# booking-system

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

This project requires PHP 7.3+ or above

Clone the repository

    git clone git@github.com:samsulalamm/booking-system.git

Switch to the repo folder

    cd booking-system

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**command list**

    git clone git@github.com:samsulalamm/booking-system.git
    cd booking-system
    composer install
    cp .env.example .env
    php artisan key:generate

## Environment variables

- `.env` - Environment variables can be set in this file
