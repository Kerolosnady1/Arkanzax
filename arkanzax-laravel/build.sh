#!/usr/bin/env bash
# Exit on error
set -o errexit

echo "--- Installing Dependencies ---"
composer install --no-dev --no-interaction --prefer-dist

echo "--- Generating Optimizations ---"
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "--- Build Complete ---"
