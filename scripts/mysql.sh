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

#bakcup config file
timestamp=$(date +%s)
cp /etc/mysql/mysql.conf.d/mysqld.cnf /etc/mysql/mysql.conf.d/mysqld.cnfBAK_$timestamp

#set correct config params
#FROM PHP: system("sudo ./scripts/mysql.sh datadir port max_connections query_cache_limit query_cache_size bind-address max_allowed_packet key_buffer_size thread_stack thread_cache_size log_error");
#                                          $1      $2   $3              $4                $5               $6           $7                 $8              $9           $10               $11               

sed -i 's/.*datadir.*/datadir      = '$1'/' /etc/mysql/mysql.conf.d/mysqld.cnf
#changed regex to prevent lines with the word "support"
sed -i 's/^port.*/port      = '$2'/' /etc/mysql/mysql.conf.d/mysqld.cnf
sed -i 's/.*max_connections.*/max_connections      = '$3'/' /etc/mysql/mysql.conf.d/mysqld.cnf
sed -i 's/.*query_cache_limit.*/query_cache_limit      = '$4'/' /etc/mysql/mysql.conf.d/mysqld.cnf
sed -i 's/.*query_cache_size.*/query_cache_size      = '$5'/' /etc/mysql/mysql.conf.d/mysqld.cnf
sed -i 's/.*bind-address.*/bind-address      = '$6'/' /etc/mysql/mysql.conf.d/mysqld.cnf
sed -i 's/.*max_allowed_packet.*/max_allowed_packet      = '$7'/' /etc/mysql/mysql.conf.d/mysqld.cnf
sed -i 's/.*key_buffer_size.*/key_buffer_size      = '$8'/' /etc/mysql/mysql.conf.d/mysqld.cnf
sed -i 's/.*thread_stack.*/thread_stack      = '$9'/' /etc/mysql/mysql.conf.d/mysqld.cnf
sed -i 's/.*thread_cache_size.*/thread_cache_size      = '${10}'/' /etc/mysql/mysql.conf.d/mysqld.cnf
sed -i 's/.*log_error.*/log_error      = '${11}'/' /etc/mysql/mysql.conf.d/mysqld.cnf

service mysql start
