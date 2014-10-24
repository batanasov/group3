<?php
return array(
    'db' => array(
        'adapters' => array(
            'Db\\NapierManagementTrainig' => array(),
        ),
    ),
    'router' => array(
        'routes' => array(
            'oauth' => array(
                'options' => array(
                    'route' => '/api/auth',
                ),
            ),
        ),
    ),
);
