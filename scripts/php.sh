#!/bin/bash

printf "Script started \n"

#make sure script is started as root
if [ $(id -u) != 0 ]; then
  printf "You need to start this script as root!"
  exit 1
fi

#update repos
apt-get update

# install apache2
apt-get -y install php php7.0 libapache2-mod-php7.0 

#load php module
sudo a2enmod php7.0

#restar apache2
sudo service apache2 restart


