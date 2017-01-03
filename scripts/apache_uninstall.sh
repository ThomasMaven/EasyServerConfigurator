#!/bin/bash

printf "Script started \n"

#make sure script is started as root
if [ $(id -u) != 0 ]; then
  printf "You need to start this script as root!"
  exit 1
fi

#bakcup config file
timestamp=$(date +%s)
cp /etc/apache2/apache2.conf /etc/apache2/apache2.confBAK_$timestamp

# install apache2
apt-get -y remove apache2
apt-get -y purge apache2

echo "Apache2 uninstall finished"

