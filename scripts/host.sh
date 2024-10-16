#!/bin/bash

# Variables
host=$1
ip=$2
ansible_user=$3
ansible_password=$4

sudo chmod 666 /etc/ansible/hosts

if [ "$(grep -w $host /etc/ansible/hosts | wc -l)" -eq 0 ]
then
   echo -e "[$host]\n$ansible_user@$ip\n\n[$host:vars]\nansible_password=$ansible_password\nansible_connection=ssh\n\n#################################\n" >> /etc/ansible/hosts
else
    if grep -q -w "$host" /etc/ansible/hosts && ! grep -q -w "$ip" /etc/ansible/hosts
    then
            sudo sed -i "/^\[$host\]$/,/^#\+$/c\[$host\]\n$ansible_user@$ip\n\n[$host:vars]\nansible_password=$ansible_password\nansible_connection=ssh\n\n#################################" /etc/ansible/hosts
            echo "Se ha actualizado la información del host existente."
    else
        echo "La IP del host es la misma o el host ya existe, no se reemplazará la información."
    fi
fi

sudo chmod 644 /etc/ansible/hosts


