#!/bin/bash

set -e

until bin/console doctrine:query:sql "SELECT 1"; do
  >&2 echo "Database is unavailable - sleeping"
  sleep 1
done

>&2 echo "Database is up - executing command"

composer install

bin/console doctrine:database:create --if-not-exists
bin/console doctrine:migrations:migrate --no-interaction

php-fpm