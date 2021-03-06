#!/bin/bash

printf "Script started \n"

#make sure script is started as root
if [ $(id -u) != 0 ]; then
  printf "You need to start this script as root!"
  exit 1
fi

# install postgresql
apt-get -y remove postgresql*
apt-get -y purge postgresql*

echo "postgresql uninstall finished"
