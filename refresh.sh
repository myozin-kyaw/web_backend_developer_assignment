#!/bin/bash
echo "---------- Downloading the depenencies ----------"
composer install

echo "---------- Copy .env.example ----------"
cp .env.example .env

echo "---------- Generating Environment Key ----------"
php artisan key:generate

echo "---------- Removing database/database.sqlite. ----------"
rm -rf database/database.sqlite

echo "---------- Refreshing the database ----------"
php artisan migrate --seed

echo "---------- Generating Laravel/Passport Crypt Keys ----------"
php artisan passport:keys

echo "---------- Please, Name of the client passport ----------"
php artisan passport:client --personal