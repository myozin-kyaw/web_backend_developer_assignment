#!/bin/bash

echo "---------- Refreshing the database ----------"
php artisan migrate:refresh --seed
