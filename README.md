# Nomess

Nomess is compatible with Linux and Mac Os 

Install
> composer create-project nomess/nomess

*Librairie:*

*PHPUnit* <br>
*Twig* <br>
*ReadBeanPhp* <br>
*php-ref*

Requierement: <br>
php7.4 <br>
mb_string
<br>
<br>

___
#### Introduction

Nomess is built on an MVC pattern, many components are developed to combine perfomance and fluidity in development process.
<br>
<br>

For add an layer more abstraction:

> composer require newwebsouth/abstraction 

___
#### Tree

###### Application:


`src/Controllers` Contains your controllers

`src/Modules` Contains all modules of application

`src/Entities` Contains your entities

`src/Tables` Contains the classes of persistence (if the PersistsManager not used)

`config` Files of configuration

`var/*` Error log and files cached

`templates` Contains you template

`tests` Your tests

###### Tests

`Tests/Modules` Your testing class

`Tests/reports/*` Code coverage reports

`Tests/cov.sh` Generator of report global of code coverage

###### Root

`console.sh` Allow of purge cache, pass in development/production state, generate controllers ...

`install_server.sh` Create your script for install a basic server

<br>
<br>



# More

[The Controller system (annotations, method)](doc/Controller.md)

[The filter system](doc/Filter.md)

[The front-end (Engine and form)](doc/Front_end.md)

[Console](doc/Console.md)

# Components

[Container](doc/Container.md)

[EntityManager](doc/EntityManager.md)

[DataManager](doc/DataManager.md)

[PersistsManager](doc/PersistsManager.md)

[HttpSession](doc/HttpSession.md)

[LightPersists](doc/LightPersists.md)

[ApplicationScope](doc/ApplicationScope.md)


 
