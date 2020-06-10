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

form-c()
{
    echo "Launch..."
    php -f vendor/nomess/kernel/Tools/plugin/cli/do-form.php
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

cache-e()
{
  echo 'Remove cache of PersistsManager'
  sudo rm App/var/cache/env/*
}

cache-f()
{
    echo 'Remove cache of form'
    sudo rm Web/public/inc/forms/*
}

cache--all()
{
    echo 'Remove cache of routing...'
    sudo rm App/var/cache/routes/*

    echo 'Remove cache of DataManager...'
    sudo rm App/var/cache/dm/datamanager.xml

    echo 'Remove cache of twig...'
    sudo rm -rf Web/cache/twig/*

    echo 'Remove cache of PersistsManager'
    sudo rm App/var/cache/pm/*

    echo 'Remove cache of form'
    sudo rm Web/public/inc/forms/*

    echo 'Remove cache of environment'
    sudo rm App/var/cache/env/*

}

log-r()
{
    cat App/var/log/log.txt
}

error-r()
{
    cat App/var/log/error.log
}

log-p()
{
    truncate -s 0 App/var/log/log.txt
}

error-p()
{
    truncate -s 0 App/var/log/error.log
}



--help()
{
    echo -e "
     ________________________________________________________            ________________________________________________________
    |                       CONTEXT                          |          |                       GENERATOR                        |
    |________________________________________________________|          |________________________________________________________|
    |   [dev -p]    : Pass in development mod                |          |   [controller -c] : Generate one or many controller    |
    |   [prod -p]   : Pass in production mod                 |          |   [form -c]       : Generate an form building class    |
    |________________________________________________________|          |________________________________________________________|


     ________________________________________________________            ________________________________________________________
    |                        CACHE                           |          |                         CONSULT                        |
    |________________________________________________________|          |________________________________________________________|
    |   [cache -r]      : Purge cache of routing             |          |   [log -r]     : Read the logs of nomess               |
    |   [cache -t]      : Purge cache of twig                |          |   [error -r]   : Read the errors of apache             |
    |   [cache -p]      : Purge cache of PersistsManager     |          |   [log -p]     : Purge the logs of nomess              |
    |   [cache -m]      : Purge cache of dataManager         |          |   [log -p]     : Purge the errors of apache            |
    |   [cache -f]      : Purge cache of forms               |          |________________________________________________________|
    |   [cache -e]      : Purge cache of environment         |
    |   [cache --all]   : Purge all cache file               |
    |________________________________________________________|

    [exit] : Quit
    "
}

listen()
{
    stop='null'

    while [ $stop = 'null' ]
    do
        echo ""
        echo -e "\e[1;33m___________________________________________________________________________________________________________\e[0m
\e[32mwebmaster$
        "
        read -p "->  " cmd1 cmd2

        if [[ ( "$cmd1" = ""  ||  "$cmd2" = "" ) && "$cmd1" != "exit" ]] ; then
            echo 'Please, i need of two parameters'

        elif [ "$cmd1" = "exit" ]; then

            echo -e '\e[46m\e[1;33mCome back when you want !                                                                                  \e[0m\e[0m
            '
            exit
        else
            function="${cmd1}${cmd2}"

            $function
        fi

    done
}

echo -e "
     ________________________________________________________________
    |      HELLO !!! I'AM NOMESS, I LIKE HELP YOU FOR DEVELOPMENT    |
    |             _____________________________________              |
    |                     I have 2.17 years old                      |
    |                                                                |
    |            USE [ -- help ] DO THAT TO SEE MY ABILITIES         |
    |________________________________________________________________|
"

listen

