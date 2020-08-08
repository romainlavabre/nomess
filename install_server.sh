#!/bin/bash
#$1 mot de pass root


#Controle la présence de paramètre | exit si erreur
if [ -z $1 ];
then
    echo 'Veuillez spécifier le mot de passe de root (mysql)';
    exit
fi


#Installation d'apache2 + modrewrite
echo "Installation of apache2"
sudo apt-get install apache2
sudo a2enmod rewrite
systemctl restart apache2

#Installation de php + modapache
echo "Installation of php and dependencies"
sudo apt-get install php libapache2-mod-php php-mysql php-xml php-mailparse php-xdebug

echo "Active xdebug..."
sudo phpenmod php-xdebug

echo "Restart apache2..."
sudo systemctl restart apache2


#Configuration de base de mysql
sudo apt-get install mysql-server
echo "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '$1';" | sudo mysql
