<?php


return [



    /*
     ====================================== INTERNAL SERVICE ======================================
     */

    \NoMess\Database\IPDOFactory::class                                     => \NoMess\Database\PDOFactory::class,
    \Nomess\Components\EntityManager\EntityManagerInterface::class          => \Nomess\Components\EntityManager\EntityManager::class,
    \Nomess\Container\ContainerInterface::class                             => \Nomess\Container\Container::class,
    \NoMess\Components\ApplicationScope\ApplicationScopeInterface::class    => \Nomess\Components\ApplicationScope\ApplicationScope::class,
    \NoMess\Components\LightPersists\LightPersistsInterface::class          => \Nomess\Components\LightPersists\LightPersists::class
];
