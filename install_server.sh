#!/bin/bash
#$1 mot de pass root


#Controle la présence de paramètre | exit si erreur
if [ -z $1 ];
then
    echo 'Veuillez spécifier le mot de passe de root';
    exit
fi


#Installation d'apache2 + modrewrite
sudo apt-get apache2
sudo a2enmod rewrite
systemctl restart apache2

#Installation de php + modapache
sudo apt-get install php libapache2-mod-php php-mysql php-xml php-mailparse


#Configuration de base de mysql
sudo apt-get install mysql-server
echo "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '$1';" | sudo mysql