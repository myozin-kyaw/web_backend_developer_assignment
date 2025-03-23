#!/bin/bash
echo "---------- Removing database/database.sqlite. ----------"
rm -rf database/database.sqlite

echo "---------- Refreshing the database ----------"
php artisan migrate --seed

echo "---------- Copy .env.example ----------"
cp .env.example .env

echo "---------- Downloading the depenencies ----------"
composer install

echo "---------- Generating Environment Key ----------"
php artisan key:generate

echo "---------- Please, Name of the client passport ----------"
php artisan passport:client --personal