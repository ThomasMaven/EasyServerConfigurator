
#!/bin/bash

printf "Script started \n"

#make sure script is started as root
if [ $(id -u) != 0 ]; then
  printf "You need to start this script as root!"
  exit 1
fi

# install isc-dhcp-server
apt-get -y isc-dhcp-server*
apt-get -y purge isc-dhcp-server*

echo "dhcp uninstall finished"
