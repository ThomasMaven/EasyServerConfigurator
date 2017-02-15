#!/bin/bash

printf "Script started \n"

#make sure script is started as root
if [ $(id -u) != 0 ]; then
  printf "You need to start this script as root!"
  exit 1
fi

#update repos
apt-get update

apt-get -y install postgresql postgresql-contrib

#set correct config params
#system("sudo ./scripts/postgres.sh port max_connections ssl shared_buffers temp_buffers work_mem maintenance_work_mem dynamic_shared_memory_type max_files_per_process max_worker_processes");

#                                   $1   $2              $3  $4             $5           $6       $7                    $8                        $9                    $10               

#changed regex to prevent lines with the word "support"
sed -i 's/^port.*/port      = '$1'/' /etc/postgresql/9.5/main/postgresql.conf
sed -i 's/.*max_connections.*/max_connections      = '$2'/' /etc/postgresql/9.5/main/postgresql.conf
sed -i 's/^ssl =.*/ssl      = '$3'/' /etc/postgresql/9.5/main/postgresql.conf
sed -i 's/^shared_buffers.*/shared_buffers      = '$4'/' /etc/postgresql/9.5/main/postgresql.conf
sed -i 's/.*temp_buffers.*/temp_buffers      = '$5'/' /etc/postgresql/9.5/main/postgresql.conf

#duplicate param to overwrite both commented and uncommented line
sed -i 's/^#work_mem.*/work_mem      = '$6'/' /etc/postgresql/9.5/main/postgresql.conf
sed -i 's/^work_mem.*/work_mem      = '$6'/' /etc/postgresql/9.5/main/postgresql.conf

#duplicate param to overwrite both commented and uncommented line
sed -i 's/^#maintenance_work_mem.*/maintenance_work_mem      = '$7'/' /etc/postgresql/9.5/main/postgresql.conf
sed -i 's/^maintenance_work_mem.*/maintenance_work_mem      = '$7'/' /etc/postgresql/9.5/main/postgresql.conf

sed -i 's/.*dynamic_shared_memory_type.*/dynamic_shared_memory_type      = '$8'/' /etc/postgresql/9.5/main/postgresql.conf
sed -i 's/.*max_files_per_process.*/max_files_per_process      = '$9'/' /etc/postgresql/9.5/main/postgresql.conf
sed -i 's/.*max_worker_processes.*/max_worker_processes      = '${10}'/' /etc/postgresql/9.5/main/postgresql.conf


service postgresql restart