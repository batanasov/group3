<?php
return array(
    'doctrine' => array(
        'connection' => array(
            // default connection name
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host'     => getenv('OPENSHIFT_MYSQL_DB_HOST'),
                    'port'     => getenv('OPENSHIFT_MYSQL_DB_PORT'),
                    'dbname'   => 'website',
                    'user'     => getenv('OPENSHIFT_MYSQL_DB_USERNAME'),
                    'password' => getenv('OPENSHIFT_MYSQL_DB_PASSWORD'),
                    'charset' => 'utf8',
                    'driverOptions' => array(
                        1002 => 'SET NAMES utf8'
                    )
                )
            )
        )
    ),
);