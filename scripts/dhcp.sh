#!/bin/bash

printf "Script started \n"

#make sure script is started as root
if [ $(id -u) != 0 ]; then
  printf "You need to start this script as root!"
  exit 1
fi

#update repos
apt-get update

apt-get -y install isc-dhcp-server


cat > /etc/dhcp/dhcpd.conf <<- EOM
# minimal sample /etc/dhcp/dhcpd.conf
default-lease-time $1;
max-lease-time $2;

subnet $3 netmask $4 {
 range $5 $6;
 option routers $7;
 option domain-name-servers $8 $9;
 option domain-name "${10}";
} 

EOM

systemctl restart isc-dhcp-server.service
