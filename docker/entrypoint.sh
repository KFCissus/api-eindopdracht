#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
  composer install
fi

#if [ ! -f ".env" ]; then
   cp .env.production .env
#fi

php artisan migrate
php artisan key:generate
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan serve --port=9000 --host=0.0.0.0 --env=.env.production
exec docker-php-entrypoint "$@"
