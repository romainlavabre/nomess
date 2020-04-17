#!/bin/bash

cache-d()
{
    echo 'Suppression du cache php-di...'
    sudo rm App/var/cache/di/*
}

cache-r()
{
    echo 'Suppression du cache routing...'
    sudo rm App/var/cache/routes/*
}

cache-m()
{
    echo 'Suppression du cache dataManager...'
    sudo rm App/var/cache/mondata.xml
}


cache-t()
{
    echo 'Suppression du cache twig...'
    sudo rm -rf Web/cache/twig/*
}

cache-w()
{
    echo 'Suppression du cache webRouter...'
    sudo rm -rf Web/cache/webRouter/*
}

cache--all()
{
    echo 'Suppression du cache php-di...'
    sudo rm App/var/cache/di/*

    echo 'Suppression du cache routing...'
    sudo rm App/var/cache/routes/*

    echo 'Suppression du cache dataManager...'
    sudo rm App/var/cache/mondata.xml

    echo 'Suppression du cache twig...'
    sudo rm -rf Web/cache/twig/*

    echo 'Suppression du cache webRouter...'
    sudo rm -rf Web/cache/webRouter/*
}

--help()
{
    echo "

    [cache -d] : Vider le cache php-di (Un nouveau sera automatiquement créé)
    [cache -r] : Vider le cache routing (Un nouveau sera automatiquement créé)
    [cache -t] : Vider le cache twig (Un nouveau sera automatiquement créé)
    [cache -w] : Vider le cache webRouter (Un nouveau sera automatiquement créé)
    [cache -m] : Vider le cache dataManager (Un nouveau sera automatiquement créé)
    [cache --all]: Vide l'ensemble des caches (Les caches seront automatiquements reconstruit)

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

echo "NoMess version 2.15.0

Bienvenue sur noMess"

echo "--help pour connaitre les commandes disponnible"

listen
