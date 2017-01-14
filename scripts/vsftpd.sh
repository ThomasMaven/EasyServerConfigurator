#!/bin/bash

printf "Script started \n"

#make sure script is started as root
if [ $(id -u) != 0 ]; then
  printf "You need to start this script as root!"
  exit 1
fi

#update repos
apt-get update

apt-get -y install vsftpd

#set correct config params
#FROM PHP: system("sudo ./scripts/mysql.sh listen listen_ipv6 anonymous_enable write_enable local_umask anon_upload_enable anon_mkdir_write_enable dirmessage_enable use_localtime xferlog_enable");
#$1$2   $3   $4     $5    $6     $7    $8    $9$10   
sed -i 's/.*listen=.*/listen='$1'/' /etc/vsftpd.conf
sed -i 's/.*listen_ipv6.*/listen_ipv6='$2'/' /etc/vsftpd.conf
sed -i 's/.*anonymous_enable.*/anonymous_enable='$3'/' /etc/vsftpd.conf
#TODO: verify
sed -i 's/^#write_enable.*/write_enable='$4'/' /etc/vsftpd.conf
sed -i 's/^write_enable.*/write_enable='$4'/' /etc/vsftpd.conf

sed -i 's/.*local_umask.*/local_umask='$5'/' /etc/vsftpd.conf
sed -i 's/.*anon_upload_enable.*/anon_upload_enable='$6'/' /etc/vsftpd.conf
sed -i 's/.*anon_mkdir_write_enable.*/anon_mkdir_write_enable='$7'/' /etc/vsftpd.conf

sed -i 's/.*dirmessage_enable.*/dirmessage_enable='$8'/' /etc/vsftpd.conf
sed -i 's/.*use_localtime.*/use_localtime='$9'/' /etc/vsftpd.conf
sed -i 's/.*xferlog_enable.*/xferlog_enable='${10}'/' /etc/vsftpd.conf

