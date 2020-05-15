#!/bin/bash
dev-p()
{
    echo "Lancement du programme..."
    php -f ../vendor/nomess/kernel/Tools/plugin/cli/prog/noMess/modeDev.php



    echo "Configurer les identifiants d'accès à votre base de donnée ? [O/N]"

    read -p "webmaster$ " response

    if [ $response = 'O' ]
    then 
        sudo nano ../App/config/database.php
    fi

    unset $response


    echo "Configurer vos données distantes ? [O/N]"

    read -p "webmaster$ " response

    if [ $response = 'O' ]
    then 
        sudo nano ../App/config/datacenter.php
    fi


    echo "
    Passage en mode développement terminé
    

    "
}

conf-r()
{
    echo "Lancement du programme..."
    php -f ../vendor/nomess/kernel/Tools/plugin/cli/prog/noMess/reinit.php
}

prod-p()
{

    echo "Si vous souhaitez que NoMess reconstruise les class auto-cablés, effacez le block 'NOMESS START[...] à NOMESS END[...] [O/N]"

    read -p "webmaster$ " response

    if [ $response = 'O' ]
    then
        sudo nano ../App/config/di-definitions.php
    fi

    unset $response

    echo "Lancement du programme..."
    php -f ../vendor/nomess/kernel/Tools/plugin/cli/prog/noMess/modeProd.php

    echo "Vous venez de passer en mode production."
    echo "Purger les caches ? (Recommandé) [O/N]"

    read -p "webmaster$ " response

    if [ $response = 'O' ]
    then
        cache--all
    fi

    unset $response



    echo "Configurer les identifiants d'accès à votre base de donnée ? [O/N]"

    read -p "webmaster$ " response

    if [ $response = 'O' ]
    then 
        sudo nano ../App/config/database.php
    fi

    unset $response
    

    echo "Configurer vos données distantes ? [O/N]"

    read -p "webmaster$ " response

    if [ $response = 'O' ]
    then 
        sudo nano ../App/config/datacenter.php
    fi


    echo "
    Passage en production terminé
    
    *Seuls les dossiers App, Web et vendor sont nécessaire en production
    "

}

crud-c()
{
    echo "Lancement du programme..."
    php -f ../vendor/nomess/kernel/Tools/plugin/cli/do-crud.php
}

controller-c()
{
    echo "Lancement du programme..."
    php -f ../vendor/nomess/kernel/Tools/plugin/cli/do-controller.php
}

cache-d()
{
    echo 'Suppression du cache php-di...'
    sudo rm ../App/var/cache/di/*
}

cache-r()
{
    echo 'Suppression du cache routing...'
    sudo rm ../App/var/cache/routes/*
}

cache-m()
{
    echo 'Suppression du cache dataManager...'
    sudo rm ../App/var/cache/mondata.xml
}


cache-t()
{
    echo 'Suppression du cache twig...'
    sudo rm -rf ../Web/cache/twig/*
}

cache-w()
{
    echo 'Suppression du cache webRouter...'
    sudo rm -rf ../Web/cache/webRouter/*
}

cache--all()
{
    echo 'Suppression du cache php-di...'
    sudo rm ../App/var/cache/di/*

    echo 'Suppression du cache routing...'
    sudo rm ../App/var/cache/routes/*

    echo 'Suppression du cache dataManager...'
    sudo rm ../App/var/cache/mondata.xml

    echo 'Suppression du cache twig...'
    sudo rm -rf ../Web/cache/twig/*

    echo 'Suppression du cache webRouter...'
    sudo rm -rf ../Web/cache/webRouter/*
}

--help()
{
    echo "
    [dev -p] : Passer en mode developpement

    [prod -p] : Passer en mode production

    [conf -r] : Réinialiser la configuration

    [crud -c] : Créer un ou plusieurs crud

    [controller -c] : Générer un ou plusieur controller


    ---------------- cache -------------------


    [cache -d] : Vider le cache php-di (Un nouveau sera automatiquement créé)
    [cache -r] : Vider le cache routing (Un nouveau sera automatiquement créé)
    [cache -t] : Vider le cache twig (Un nouveau sera automatiquement créé)
    [cache -w] : Vider le cache webRouter (Un nouveau sera automatiquement créé)
    [cache -m] : Vider le cache dataManager (Un nouveau sera automatiquement créé)
    [cache --all]: Vide l'ensemble des caches (Les caches seront automatiquements reconstruit)


    ------------------------------------------
    [exit] : Quitter"
}

listen()
{
    stop='null'

    while [ $stop = 'null' ]
    do 
        read -p "webmaster$ " cmd1 cmd2

        fonction="${cmd1}${cmd2}"

        $fonction
    done
}

echo "NoMess version 2.16.0

Bienvenue sur noMess"

echo "--help pour connaitre les commandes disponnible"

listen
