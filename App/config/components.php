<?php


return [


    /**
     * Let an manager take care your persistence class, your only job is of optimize your SQL request
     */
    \NoMess\Components\PersistsManager\PersistsManager::class     => false,

    /**
     * Let an manager take care your data
     */
    \NoMess\Components\DataManager\Database::class                => false,

    /**
     * Use the form builder component (beta version)
     */
    \NoMess\Components\Forms\AbstractFormBuilder::class           => false,

    /**
     * Dynamically create your rewrite rules during program execution
     */
    \NoMess\Components\RuntimeRewriteUrl\RewriteRule::class       => false,

    /**
     * Use a light persistence container
     */
    \NoMess\Components\LightPersists\LightPersists::class         => false,

    /**
     * Use a worker for asynchronous tasks
     */
    \NoMess\Components\Worker\InteractiveRuntimeWorker::class     => false



];