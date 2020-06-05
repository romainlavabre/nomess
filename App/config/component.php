<?php


return [


    /**
     * Let an manager take care your peristence class, your only job is of optimize your SQL request
     */
    \NoMess\Component\PersistsManager\PersistsManager::class     => false,

    /**
     * Let an manager take care your data
     */
    \NoMess\Component\DataManager\Database::class                => false,

    /**
     * Dynamically create your rewrite rules during program execution
     */
    \NoMess\Component\RuntimeRewriteUrl\RewriteRule::class       => false,

    /**
     * Use a light persistence container
     */
    \NoMess\Component\LightPersists\LightPersists::class         => false,

    /**
     * Use a worker for asynchronous tasks
     */
    \NoMess\Component\Worker\InteractiveRuntimeWorker::class     => false



];