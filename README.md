# Laravel News Demo

This repository contains demonstrative project based on [Laravel](https://laravel.com/) 5.4.

## Features
  - Create, read, update and delete articles (CRUD)
  - Tagging
  - Captcha protection (using [greggilbert/recaptcha](https://github.com/greggilbert/recaptcha))
  - Markdown support (using [cebe/markdown](https://github.com/cebe/markdown))

## Used Laravel functionality
From left column of documentation.

  - The HTTP Layer
    - Routing
    - Controllers
    - Requests
    - Responses
    - Views
    - Validation
  - Frontend
    - Blade templates
  - General
    - Caching
  - Database
    - Query Builder
    - Pagination
    - Migrations
    - Seeding
  - Eloquent ORM
    - Relationships
    - Mutators

## Getting started

1. Download this project.
2. Run `composer install` to install all PHP-depedencies.
3. Run `npm install` to install all front end depedencies.
4. Copy `.env.example` and rename it to `.env`. Then configure it. You also need to create keys for [Google ReCaptcha](https://www.google.com/recaptcha).
5. If you're running Vagrant, setup up Laravel Homestead as described in [docs](https://laravel.com/docs/master/homestead).
6. Run `npm run production` or `npm run dev` to compile front end assets.
7. Run `php artisan key:generate` to generate application key.
8. Run `php artisan migrate` to create tables.
9. Run `php artisan db:seed` to fill tables with data.
