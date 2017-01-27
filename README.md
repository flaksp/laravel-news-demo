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
3. Copy `.env.example` and rename it to `.env`. Then configure it.
    1. [Create keys](https://www.google.com/recaptcha) to enable Google ReCaptcha.
    2. [Create VK application](https://vk.com/editapp?act=create) (type: website) to enable comments widget.
4. If you're running Vagrant, setup up Laravel Homestead as described in [docs](https://laravel.com/docs/master/homestead).
5. Run `php artisan key:generate` to generate application key.
6. Run `php artisan migrate` to create tables.
7. *Optional:* run `php artisan db:seed` to fill tables with dummy data.
