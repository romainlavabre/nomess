#!/bin/bash
dev-p()
{
    echo "Launch..."
    php -f vendor/nomess/kernel/Tools/plugin/cli/prog/noMess/modeDev.php



    echo "Configure identifiants access to database ? [O/N]"

    read -p "webmaster$ " response

    if [ $response = 'O' ]
    then 
        sudo nano App/config/database.php
    fi

    unset $response


    echo "Configure the DataCenter ? [O/N]"

    read -p "webmaster$ " response

    if [ $response = 'O' ]
    then 
        sudo nano App/config/datacenter.php
    fi


    echo "
    Mod development enabled
    

    "
}


prod-p()
{

    php -f vendor/nomess/kernel/Tools/plugin/cli/prog/noMess/modeProd.php

    echo "Do you want purge all cache ? ? (Recommended) [O/N]"

    read -p "webmaster$ " response

    if [ $response = 'O' ]
    then
        cache--all
    fi

    unset $response



    echo "Configure identifiants access to database ? [O/N]"

    read -p "webmaster$ " response

    if [ $response = 'O' ]
    then 
        sudo nano App/config/database.php
    fi

    unset $response
    

    echo "Configure your DataCenter ? [O/N]"

    read -p "webmaster$ " response

    if [ $response = 'O' ]
    then 
        sudo nano App/config/datacenter.php
    fi


    echo "
    Mod production enabled
    "

}

crud-c()
{
    echo "Launch..."
    php -f vendor/nomess/kernel/Tools/plugin/cli/do-crud.php
}

controller-c()
{
    echo "Launch..."
    php -f vendor/nomess/kernel/Tools/plugin/cli/do-controller.php
}

cache-d()
{
    echo 'Suppression du cache php-di...'
    sudo rm App/var/cache/di/*
}

cache-r()
{
    echo 'Remove cache of routing...'
    sudo rm App/var/cache/routes/*
}

cache-m()
{
    echo 'Remove cache of DataManager...'
    sudo rm App/var/cache/mondata.xml
}


cache-t()
{
    echo 'Remove cache of twig...'
    sudo rm -rf Web/cache/twig/*
}

cache-p()
{
  echo 'Remove cache of PersistsManager'
  sudo rm App/var/cache/pm/*
}

cache--all()
{
    echo 'Remove cache of php-di...'
    sudo rm App/var/cache/di/*

    echo 'Remove cache of routing...'
    sudo rm App/var/cache/routes/*

    echo 'Remove cache of DataManager...'
    sudo rm App/var/cache/dm/datamanager.xml

    echo 'Remove cache of  twig...'
    sudo rm -rf Web/cache/twig/*

    echo 'Remove cache of PersistsManager'
    sudo rm App/var/cache/pm/*

}

--help()
{
    echo "
    [dev -p] : Pass in development mod
    [prod -p] : Pass in production mod

    [controller -c] : Generate one or many controller


    ---------------- cache -------------------


    [cache -d] : Purge cache of php-di
    [cache -r] : Purge cache of routing
    [cache -t] : Purge cache of twig
    [cache -p] : Purge cache of PersistsManager
    [cache -m] : Purge cache of dataManager
    [cache --all]: Purge all cache file


    ------------------------------------------
    [exit] : Quit"
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

echo "nomess version 2.17.0"

echo "--help for see the command available"

listen
