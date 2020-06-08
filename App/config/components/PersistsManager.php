<?php


return [
    Sample\Object\Name::class => [
        'id_config_database' => 'default',
        'read' => [
            'id_config_database' => 'optionnal_remove_if_not_use',
            'request' => 'Select_request',
            'patch' => [
                //Optionnal
            ]
        ],
        'create' => [
            'request' => 'Create_request'
        ],
        'update' => [
            'request' => 'Update_request'
        ],
        'delete' => [
            'request' => 'Delete_request'
        ],
        'other_request' => [
            'request' => 'request'
        ],
    ],

];
