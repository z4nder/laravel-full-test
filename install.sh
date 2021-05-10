#!/bin/bash

sudo su <<EOF
printf "APT UPDATE\n"
apt update -qq

printf "\n\nINSTALL SOFTWARE PROPERTIES COMMON\n"
apt -y -qq install software-properties-common

printf "\n\nADD PHP7.4 REPOSITORY\n"
add-apt-repository -y ppa:ondrej/php
apt update -qq

printf "\n\nINSTALL PHP7.4 AND DEPENDENCIES\n"
apt -y -qq install php7.4 php7.4-common php7.4-bcmath openssl php7.4-json php7.4-mbstring php7.4-dom php7.4-sql

printf "\n\nINSTALL COMPOSER\n"
apt -y -qq install composer
EOF

printf "\n\nrun composer\n"
composer install
