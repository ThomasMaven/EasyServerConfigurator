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
apt-get -y install apache2

#bakcup config file
timestamp=$(date +%s)
cp /etc/apache2/apache2.conf /etc/apache2/apache2.confBAK_$timestamp

#FROM PHP system("sudo ./scripts/apache.sh Timeout KeepAlive MaxKeepAliveRequest KeepAliveTimeout User Group HostnameLookups ErrorLog LogLevel Listen");
#                                          $1      $2        $3                  $4               $5   $6    $7              $8       $9       $10

sed -i 's/^Timeout .*/Timeout '$1'/' /etc/apache2/apache2.conf
sed -i 's/^KeepAlive .*/KeepAlive '$2'/' /etc/apache2/apache2.conf
sed -i 's/^MaxKeepAliveRequest .*/MaxKeepAliveRequest '$3'/' /etc/apache2/apache2.conf
sed -i 's/^KeepAliveTimeout .*/KeepAliveTimeout '$4'/' /etc/apache2/apache2.conf
sed -i 's/^User .*/User '$5'/' /etc/apache2/apache2.conf
sed -i 's/^Group .*/Group '$6'/' /etc/apache2/apache2.conf
sed -i 's/^HostnameLookups .*/HostnameLookups '$7'/' /etc/apache2/apache2.conf
sed -i 's/^ErrorLog .*/ErrorLog '$8'/' /etc/apache2/apache2.conf
sed -i 's/^LogLevel .*/LogLevel '$9'/' /etc/apache2/apache2.conf
sed -i 's/^Listen .*/Listen '${10}'/' /etc/apache2/apache2.conf

service apache2 start
