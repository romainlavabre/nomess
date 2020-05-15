<?php


return [


    /**
     *  Create your dynamic rewrite rule during execution program
     */
    NoMess\Component\RuntimeRewriteUrl\RewriteRule::class       => false,

    /**
     * Have light peristence for customer
     */
    NoMess\Component\LightPersists\LightPersists::class         => false,

    /**
     * Use Worker for async task
     */
    NoMess\Component\Worker\InteractiveRuntimeWorker::class     => false

];