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


cache-t()
{
    echo 'Suppression du cache routing...'
    sudo rm -rf Web/cache/*
}

--help()
{
    echo "

    [cache -d] : Vider le cache php-di (Un nouveau sera automatiquement créé)
    [cache -r] : Vider le cache routing (Un nouveau sera automatiquement créé)
    [cache -t] : Vider le cache twig (Un nouveau sera automatiquement créé)

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

echo "NoMess version 2.10.0

Bienvenue sur noMess"

echo "--help pour connaitre les commandes disponnible"

listen
