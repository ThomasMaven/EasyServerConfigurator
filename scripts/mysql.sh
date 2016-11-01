#!/bin/bash

printf "Script started \n"

#make sure script is started as root
if [ $(id -u) != 0 ]; then
  printf "You need to start this script as root!"
  exit 1
fi

#update repos
apt-get update

#generate root passwd 
rootpwd=$(date | md5sum | head -c 12 ; echo)


printf "password = $rootpwd" > installlog.txt

#set generated passwd during mysql server installation
debconf-set-selections <<< "mysql-server mysql-server/root_password password $rootpwd"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $rootpwd"

#install mysql server
apt-get -y install mysql-server



