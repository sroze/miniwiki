#!/bin/bash
php app/console doctrine:generate:entities UIT
php app/console doctrine:schema:update --force
chown sroze:sroze . -R
chmod 777 . -R
