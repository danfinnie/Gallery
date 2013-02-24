#! /usr/bin/env bash

php composer.phar install
php composer.phar dumpautoload # Only some environments need this...
php app/console doctrine:generate:entities DanFinnie --path src/
php app/console sonata:easy-extends:generate SonataMediaBundle --dest=src/ 
cp app/config/parameters.yml{.dist,}

echo "Please modify app/config/parameters.yml with correct values.  Then press enter to continue."
read

php app/console doctrine:schema:create
php app/console assets:install web
php app/console cache:clear

