#! /usr/bin/env bash

echo "This will get rid of all your data.  Press enter to continue."
read

php app/console doctrine:schema:drop --force
rm -rvf src/Application src/DanFinnie/GalleryBundle/Entity web/uploads
cp app/config/parameters.yml{,.bak}
