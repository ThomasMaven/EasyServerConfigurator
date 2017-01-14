#!/bin/bash

printf "Script started \n"

#make sure script is started as root
if [ $(id -u) != 0 ]; then
  printf "You need to start this script as root!"
  exit 1
fi

# install vsftpd
apt-get -y remove vsftpd
apt-get -y purge vsftpd

echo "vsftpd uninstall finished"

