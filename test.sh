#!/bin/bash

PHPUNIT=./vendor/bin/phpunit

if [ -f "$PHPUNIT" ]; then
    ./vendor/bin/phpunit
else
    echo "start"
fi
