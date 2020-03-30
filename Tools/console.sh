#!/bin/bash
dev-p()
{
    echo "Lancement du programme..."
    php -f bin/plugin/cli/prog/noMess/modeDev.php
}

dev-c()
{
    echo "Lancement du programme..."
    php -f bin/plugin/cli/prog/noMess/configLocal.php
}

conf-r()
{
    echo "Lancement du programme..."
    php -f bin/plugin/cli/prog/noMess/reinit.php
}

prod-p()
{
    echo "Lancement du programme..."
    php -f bin/plugin/cli/prog/noMess/modeProd.php
}

crud-c()
{
    echo "Lancement du programme..."
    php -f bin/plugin/cli/do-crud.php
}

--help()
{
    echo "
    [dev -p] : Passer en mode developpement
    [dev -c] : Configurer le mode développement

    [conf -r] : Réinialiser la configuration

    [prod -p] : Passer en mode production

    [crud -c] : Créer un crud

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
