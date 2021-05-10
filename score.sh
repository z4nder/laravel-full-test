#!/bin/bash

PHPUNIT=./vendor/bin/phpunit

if [ -f "$PHPUNIT" ]; then
    ./vendor/bin/phpunit --configuration phpunit_hackerrank.xml > /dev/null 2>&1
    cat score.txt
else
    echo "This custom script can run any bash command, and perform tests."
    echo "It needs to only output one line in the format 'FS_SCORE:xx%', where xx is the percentage score for the solution."
    echo "FS_SCORE:70%"
fi
