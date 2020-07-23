#Console

The console permit of manage your applications, a documentation is present inside it, but you can look this resumed:


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
    |   [cache -e]      : Purge cache of entities            |
    |   [cache -a]      : Purge data of application scope    |
    |   [cache --all]   : Purge all cache file               |
    |________________________________________________________|


