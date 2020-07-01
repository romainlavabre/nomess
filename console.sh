#!/bin/bash
dev-p()
{
    echo "Launch..."
    php -f vendor/nomess/kernel/Tools/Console/noMess/modeDev.php

    echo "
    Mod development enabled
    "
}


prod-p()
{

    php -f vendor/nomess/kernel/Tools/Console/noMess/modeProd.php

    echo "Do you want purge all cache ? ? (Recommended) [O/N]"

    read -p "webmaster$ " response

    if [ $response = 'O' ]
    then
        cache--all
    fi

    echo "
    Mod production enabled
    "

}

controller-c()
{
    echo "Launch..."
    php -f vendor/nomess/kernel/Tools/Console/do-controller.php
}

filter-c()
{
    echo "Launch..."
    php -f vendor/nomess/kernel/Tools/Console/do-filter.php
}

cache-a()
{
    echo 'Remove data of application scope...'
    sudo rm var/cache/as/*
}

cache-r()
{
    echo 'Remove cache of routing...'
    sudo rm var/cache/routes/*
}

cache-m()
{
    echo 'Remove cache of DataManager...'
    sudo rm var/cache/mondata.xml
}


cache-t()
{
    echo 'Remove cache of twig...'
    sudo rm -rf Web/cache/twig/*
}

cache-p()
{
  echo 'Remove cache of PersistsManager'
  sudo rm var/cache/pm/*
}

cache-f()
{
    echo 'Remove cache of filters'
    sudo rm var/cache/filters/*
}

cache-o()
{
    echo 'Remove cache of opcache'
    sudo php -f vendor/nomess/kernel/Tools/Console/opcache.php
}

cache--all()
{
    echo 'Data of application scope ignored'
    echo 'Remove cache of routing...'
    sudo rm var/cache/routes/*

    echo 'Remove cache of DataManager...'
    sudo rm var/cache/dm/datamanager.xml

    echo 'Remove cache of twig...'
    sudo rm -rf Web/cache/twig/*

    echo 'Remove cache of PersistsManager'
    sudo rm var/cache/pm/*

    echo 'Remove cache of EntityManager'
    sudo rm var/cache/em/*

    echo 'Remove cache of Filters'
    sudo rm var/cache/filters/*

    echo 'Remove cache of opcache'
    sudo php -f vendor/nomess/kernel/Tools/Console/opcache.php

}

error-r()
{
    cat var/log/error.log
}

error-p()
{
    sudo truncate -s 0 var/log/error.log
}



--help()
{
    echo -e "
     ________________________________________________________            ________________________________________________________
    |                       CONTEXT                          |          |                       GENERATOR                        |
    |________________________________________________________|          |________________________________________________________|
    |   [dev -p]    : Pass in development mod                |          |   [controller -c] : Generate one or many controller    |
    |   [prod -p]   : Pass in production mod                 |          |   [filter -c]     : Generate an filter class           |
    |________________________________________________________|          |________________________________________________________|


     ________________________________________________________            ________________________________________________________
    |                        CACHE                           |          |                         CONSULT                        |
    |________________________________________________________|          |________________________________________________________|
    |   [cache -r]      : Purge cache of routing             |          |   [error -r]   : Read the errors of apache             |
    |   [cache -t]      : Purge cache of twig                |          |   [error -p]   : Purge the errors of apache            |
    |   [cache -p]      : Purge cache of PersistsManager     |          |________________________________________________________|
    |   [cache -m]      : Purge cache of dataManager         |
    |   [cache -f]      : Purge cache of filters             |
    |   [cache -o]      : Purge cache of opcache             |
    |   [cache -a]      : Purge data of application scope    |
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
    |                     I have 2.20 years old                      |
    |                                                                |
    |            USE [ -- help ] DO THAT TO SEE MY ABILITIES         |
    |________________________________________________________________|
"

listen

