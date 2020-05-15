<?php

return [
    'tts' => 10, //Time to sleep
    'nc' => 0, //Number of cycle | 0 => unlimited
    'autoload' => '/var/www/html/histoire/vendor/autoload.php', //Path to autoload
    'success_log' => '/var/www/html/histoire/App/var/log/worker/success.log', //Path to success log
    'error_log' => '/var/www/html/histoire/App/var/log/worker/error.log', //Path to error log

    'function-id' => function(){
        //Your function
    },
];