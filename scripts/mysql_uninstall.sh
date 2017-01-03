#!/bin/bash

#scipt that automates mysql uninstalling and purging

#make sure script is started as root
if [ $(id -u) != 0 ]; then
  printf "You need to start this script as root!"
  exit 1
fi

#bakcup config file
timestamp=$(date +%s)
cp /etc/mysql/mysql.conf.d/mysqld.cnf /etc/mysql/mysql.conf.d/mysqld.cnfBAK_$timestamp

sudo service mysql stop
sudo killall -9 mysql
sudo killall -9 mysqld
sudo apt-get -y remove --purge mysql-server mysql-client mysql-common
sudo apt-get -y autoremove
sudo apt-get -y autoclean
sudo deluser mysql
sudo rm -rf /var/lib/mysql
sudo apt-get -y purge mysql-server-core*
sudo apt-get -y purge mysql-client-core*
sudo rm -rf /var/log/mysql
sudo rm -rf /etc/mysql

echo "MySQL uninstall finished"
exit 0

