<?php


return [
    \NoMess\Database\IPDOFactory::class                                  => \NoMess\Database\PDOFactory::class,
    \Nomess\Components\EntityManager\EntityManagerInterface::class       => \Nomess\Components\EntityManager\EntityManager::class,
    \Nomess\Components\EntityManager\Event\CreateEventInterface::class   => \Nomess\Components\EntityManager\Event\CreateEvent::class,
    \Nomess\Components\EntityManager\TransactionSubjectInterface::class  => \Nomess\Components\EntityManager\EntityManager::class,
    \Nomess\Container\ContainerInterface::class                          => \Nomess\Container\Container::class,
    \NoMess\Components\ApplicationScope\ApplicationScopeInterface::class => \Nomess\Components\ApplicationScope\ApplicationScope::class,
    \NoMess\Components\LightPersists\LightPersistsInterface::class       => \Nomess\Components\LightPersists\LightPersists::class,
];
