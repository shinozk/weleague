#! /bin/sh
set -e
composer install
cp -u .env.example .env
php artisan key:generate
php artisan serve --host 0.0.0.0 --port 80
