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
    'zf-oauth2' => array(
        'storage' => 'ZF\\OAuth2\\Adapter\\PdoAdapter',
        'db' => array(
            'dsn_type' => 'PDO',
            'dsn' => 'mysql:host='.getenv('OPENSHIFT_MYSQL_DB_HOST').';dbname=website',
            'username' => getenv('OPENSHIFT_MYSQL_DB_USERNAME'),
            'password' => getenv('OPENSHIFT_MYSQL_DB_PASSWORD'),
        ),
    ),
);
