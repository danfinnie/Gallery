#! /usr/bin/env bash

php composer.phar install
php composer.phar dumpautoload # Only some environments need this...
php app/console doctrine:generate:entities DanFinnie --path src/
cp app/config/parameters.yml{dist,}
php app/console assets:install web
php app/console cache:clear

echo "Please modify app/config/parameters.yml with correct values"
