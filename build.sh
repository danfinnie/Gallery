#! /usr/bin/env bash

php composer.phar install
php app/console doctrine:generate:entities DanFinnie --path src/
php app/console assets:install web
php app/console cache:clear
