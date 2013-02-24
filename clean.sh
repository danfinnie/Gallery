#! /usr/bin/env bash

echo "This will get rid of all your data.  Press enter to continue."
read

php app/console doctrine:schema:drop --force
rm -rvf web/uploads
cp app/config/parameters.yml{,.bak}
php app/console cache:clear

