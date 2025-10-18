#! /bin/sh
set -e

composer install

npm install
npm run build
php artisan serve --host 0.0.0.0 --port 8080
