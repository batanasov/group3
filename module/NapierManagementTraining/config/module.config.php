<?php
return array(
    'router' => array(
        'routes' => array(
            'napier-management-training.rest.courses' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/courses[/:courses_id]',
                    'defaults' => array(
                        'controller' => 'NapierManagementTraining\\V1\\Rest\\Courses\\Controller',
                    ),
                ),
            ),
            'napier-management-training.rest.venues' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/venues[/:venues_id]',
                    'defaults' => array(
                        'controller' => 'NapierManagementTraining\\V1\\Rest\\Venues\\Controller',
                    ),
                ),
            ),
            'napier-management-training.rest.news' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/news[/:news_id]',
                    'defaults' => array(
                        'controller' => 'NapierManagementTraining\\V1\\Rest\\News\\Controller',
                    ),
                ),
            ),
            'napier-management-training.rest.sessions' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/sessions[/:sessions_id]',
                    'defaults' => array(
                        'controller' => 'NapierManagementTraining\\V1\\Rest\\Sessions\\Controller',
                    ),
                ),
            ),
            'napier-management-training.rest.titles' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/titles',
                    'defaults' => array(
                        'controller' => 'NapierManagementTraining\\V1\\Rest\\Titles\\Controller',
                    ),
                ),
            ),
            'napier-management-training.rpc.registration' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/registration',
                    'defaults' => array(
                        'controller' => 'NapierManagementTraining\\V1\\Rpc\\Registration\\Controller',
                        'action' => 'registration',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'napier-management-training.rest.courses',
            1 => 'napier-management-training.rest.venues',
            2 => 'napier-management-training.rest.news',
            3 => 'napier-management-training.rest.sessions',
            4 => 'napier-management-training.rest.titles',
            5 => 'napier-management-training.rpc.registration',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'NapierManagementTraining\\V1\\Rest\\Courses\\CoursesResource' => 'NapierManagementTraining\\V1\\Rest\\Courses\\CoursesResourceFactory',
            'NapierManagementTraining\\V1\\Rest\\Venues\\VenuesResource' => 'NapierManagementTraining\\V1\\Rest\\Venues\\VenuesResourceFactory',
            'NapierManagementTraining\\V1\\Rest\\News\\NewsResource' => 'NapierManagementTraining\\V1\\Rest\\News\\NewsResourceFactory',
            'NapierManagementTraining\\V1\\Rest\\Sessions\\SessionsResource' => 'NapierManagementTraining\\V1\\Rest\\Sessions\\SessionsResourceFactory',
            'NapierManagementTraining\\V1\\Rest\\Titles\\TitlesResource' => 'NapierManagementTraining\\V1\\Rest\\Titles\\TitlesResourceFactory',
        ),
    ),
    'zf-rest' => array(
        'NapierManagementTraining\\V1\\Rest\\Courses\\Controller' => array(
            'listener' => 'NapierManagementTraining\\V1\\Rest\\Courses\\CoursesResource',
            'route_name' => 'napier-management-training.rest.courses',
            'route_identifier_name' => 'courses_id',
            'collection_name' => 'courses',
            'entity_http_methods' => array(
                0 => 'GET',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(
                0 => 'venue',
            ),
            'page_size' => '99999999',
            'page_size_param' => null,
            'entity_class' => 'NapierManagementTraining\\V1\\Rest\\Courses\\CoursesEntity',
            'collection_class' => 'NapierManagementTraining\\V1\\Rest\\Courses\\CoursesCollection',
            'service_name' => 'courses',
        ),
        'NapierManagementTraining\\V1\\Rest\\Venues\\Controller' => array(
            'listener' => 'NapierManagementTraining\\V1\\Rest\\Venues\\VenuesResource',
            'route_name' => 'napier-management-training.rest.venues',
            'route_identifier_name' => 'venues_id',
            'collection_name' => 'venues',
            'entity_http_methods' => array(
                0 => 'GET',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '999999',
            'page_size_param' => null,
            'entity_class' => 'NapierManagementTraining\\V1\\Rest\\Venues\\VenuesEntity',
            'collection_class' => 'NapierManagementTraining\\V1\\Rest\\Venues\\VenuesCollection',
            'service_name' => 'venues',
        ),
        'NapierManagementTraining\\V1\\Rest\\News\\Controller' => array(
            'listener' => 'NapierManagementTraining\\V1\\Rest\\News\\NewsResource',
            'route_name' => 'napier-management-training.rest.news',
            'route_identifier_name' => 'news_id',
            'collection_name' => 'news',
            'entity_http_methods' => array(
                0 => 'GET',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(
                0 => 'limit',
            ),
            'page_size' => '999999',
            'page_size_param' => 'limit',
            'entity_class' => 'NapierManagementTraining\\V1\\Rest\\News\\NewsEntity',
            'collection_class' => 'NapierManagementTraining\\V1\\Rest\\News\\NewsCollection',
            'service_name' => 'news',
        ),
        'NapierManagementTraining\\V1\\Rest\\Sessions\\Controller' => array(
            'listener' => 'NapierManagementTraining\\V1\\Rest\\Sessions\\SessionsResource',
            'route_name' => 'napier-management-training.rest.sessions',
            'route_identifier_name' => 'sessions_id',
            'collection_name' => 'sessions',
            'entity_http_methods' => array(
                0 => 'GET',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '9999999',
            'page_size_param' => null,
            'entity_class' => 'NapierManagementTraining\\V1\\Rest\\Sessions\\SessionsEntity',
            'collection_class' => 'NapierManagementTraining\\V1\\Rest\\Sessions\\SessionsCollection',
            'service_name' => 'sessions',
        ),
        'NapierManagementTraining\\V1\\Rest\\Titles\\Controller' => array(
            'listener' => 'NapierManagementTraining\\V1\\Rest\\Titles\\TitlesResource',
            'route_name' => 'napier-management-training.rest.titles',
            'route_identifier_name' => 'titles_id',
            'collection_name' => 'titles',
            'entity_http_methods' => array(),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '1000',
            'page_size_param' => null,
            'entity_class' => 'NapierManagementTraining\\V1\\Rest\\Titles\\TitlesEntity',
            'collection_class' => 'NapierManagementTraining\\V1\\Rest\\Titles\\TitlesCollection',
            'service_name' => 'titles',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'NapierManagementTraining\\V1\\Rest\\Courses\\Controller' => 'Json',
            'NapierManagementTraining\\V1\\Rest\\Venues\\Controller' => 'Json',
            'NapierManagementTraining\\V1\\Rest\\News\\Controller' => 'Json',
            'NapierManagementTraining\\V1\\Rest\\Sessions\\Controller' => 'Json',
            'NapierManagementTraining\\V1\\Rest\\Titles\\Controller' => 'Json',
            'NapierManagementTraining\\V1\\Rpc\\Registration\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'NapierManagementTraining\\V1\\Rest\\Courses\\Controller' => array(
                0 => 'application/vnd.napier-management-training.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'NapierManagementTraining\\V1\\Rest\\Venues\\Controller' => array(
                0 => 'application/vnd.napier-management-training.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'NapierManagementTraining\\V1\\Rest\\News\\Controller' => array(
                0 => 'application/vnd.napier-management-training.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'NapierManagementTraining\\V1\\Rest\\Sessions\\Controller' => array(
                0 => 'application/vnd.napier-management-training.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'NapierManagementTraining\\V1\\Rest\\Titles\\Controller' => array(
                0 => 'application/vnd.napier-management-training.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'NapierManagementTraining\\V1\\Rpc\\Registration\\Controller' => array(
                0 => 'application/vnd.napier-management-training.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
        ),
        'content_type_whitelist' => array(
            'NapierManagementTraining\\V1\\Rest\\Courses\\Controller' => array(
                0 => 'application/vnd.napier-management-training.v1+json',
                1 => 'application/json',
            ),
            'NapierManagementTraining\\V1\\Rest\\Venues\\Controller' => array(
                0 => 'application/vnd.napier-management-training.v1+json',
                1 => 'application/json',
            ),
            'NapierManagementTraining\\V1\\Rest\\News\\Controller' => array(
                0 => 'application/vnd.napier-management-training.v1+json',
                1 => 'application/json',
            ),
            'NapierManagementTraining\\V1\\Rest\\Sessions\\Controller' => array(
                0 => 'application/vnd.napier-management-training.v1+json',
                1 => 'application/json',
            ),
            'NapierManagementTraining\\V1\\Rest\\Titles\\Controller' => array(
                0 => 'application/vnd.napier-management-training.v1+json',
                1 => 'application/json',
            ),
            'NapierManagementTraining\\V1\\Rpc\\Registration\\Controller' => array(
                0 => 'application/vnd.napier-management-training.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'NapierManagementTraining\\V1\\Rest\\Courses\\CoursesEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'napier-management-training.rest.courses',
                'route_identifier_name' => 'courses_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NapierManagementTraining\\V1\\Rest\\Courses\\CoursesCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'napier-management-training.rest.courses',
                'route_identifier_name' => 'courses_id',
                'is_collection' => true,
            ),
            'NapierManagementTraining\\V1\\Rest\\Venues\\VenuesEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'napier-management-training.rest.venues',
                'route_identifier_name' => 'venues_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NapierManagementTraining\\V1\\Rest\\Venues\\VenuesCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'napier-management-training.rest.venues',
                'route_identifier_name' => 'venues_id',
                'is_collection' => true,
            ),
            'NapierManagementTraining\\V1\\Rest\\News\\NewsEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'napier-management-training.rest.news',
                'route_identifier_name' => 'news_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NapierManagementTraining\\V1\\Rest\\News\\NewsCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'napier-management-training.rest.news',
                'route_identifier_name' => 'news_id',
                'is_collection' => true,
            ),
            'NapierManagementTraining\\V1\\Rest\\Sessions\\SessionsEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'napier-management-training.rest.sessions',
                'route_identifier_name' => 'sessions_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NapierManagementTraining\\V1\\Rest\\Sessions\\SessionsCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'napier-management-training.rest.sessions',
                'route_identifier_name' => 'sessions_id',
                'is_collection' => true,
            ),
            'NapierManagementTraining\\V1\\Rest\\Titles\\TitlesEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'napier-management-training.rest.titles',
                'route_identifier_name' => 'titles_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NapierManagementTraining\\V1\\Rest\\Titles\\TitlesCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'napier-management-training.rest.titles',
                'route_identifier_name' => 'titles_id',
                'is_collection' => true,
            ),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'NapierManagementTraining\\V1\\Rpc\\Registration\\Controller' => 'NapierManagementTraining\\V1\\Rpc\\Registration\\RegistrationControllerFactory',
        ),
    ),
    'zf-rpc' => array(
        'NapierManagementTraining\\V1\\Rpc\\Registration\\Controller' => array(
            'service_name' => 'registration',
            'http_methods' => array(
                0 => 'POST',
            ),
            'route_name' => 'napier-management-training.rpc.registration',
        ),
    ),
    'zf-content-validation' => array(
        'NapierManagementTraining\\V1\\Rpc\\Registration\\Controller' => array(
            'input_filter' => 'NapierManagementTraining\\V1\\Rpc\\Registration\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'NapierManagementTraining\\V1\\Rpc\\Registration\\Validator' => array(
            0 => array(
                'name' => 'title',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => false,
                'error_message' => 'You have to select a valid title.',
                'continue_if_empty' => false,
            ),
            1 => array(
                'name' => 'firstname',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => false,
                'continue_if_empty' => false,
            ),
            2 => array(
                'name' => 'lastname',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => false,
                'continue_if_empty' => false,
            ),
            3 => array(
                'name' => 'address',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => false,
                'continue_if_empty' => false,
            ),
            4 => array(
                'name' => 'email',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => false,
                'continue_if_empty' => false,
            ),
            5 => array(
                'name' => 'telephone',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => false,
                'continue_if_empty' => false,
            ),
            6 => array(
                'name' => 'session',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => false,
                'continue_if_empty' => false,
            ),
            7 => array(
                'name' => 'payment',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => false,
                'continue_if_empty' => false,
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'NapierManagementTraining\\V1\\Rest\\Courses\\Controller' => array(
                'entity' => array(
                    'GET' => false,
                    'POST' => false,
                    'PATCH' => false,
                    'PUT' => false,
                    'DELETE' => false,
                ),
                'collection' => array(
                    'GET' => false,
                    'POST' => false,
                    'PATCH' => false,
                    'PUT' => false,
                    'DELETE' => false,
                ),
            ),
            'NapierManagementTraining\\V1\\Rest\\Venues\\Controller' => array(
                'entity' => array(
                    'GET' => false,
                    'POST' => false,
                    'PATCH' => false,
                    'PUT' => false,
                    'DELETE' => false,
                ),
                'collection' => array(
                    'GET' => false,
                    'POST' => false,
                    'PATCH' => false,
                    'PUT' => false,
                    'DELETE' => false,
                ),
            ),
            'NapierManagementTraining\\V1\\Rest\\News\\Controller' => array(
                'entity' => array(
                    'GET' => false,
                    'POST' => false,
                    'PATCH' => false,
                    'PUT' => false,
                    'DELETE' => false,
                ),
                'collection' => array(
                    'GET' => false,
                    'POST' => false,
                    'PATCH' => false,
                    'PUT' => false,
                    'DELETE' => false,
                ),
            ),
            'NapierManagementTraining\\V1\\Rest\\Sessions\\Controller' => array(
                'entity' => array(
                    'GET' => false,
                    'POST' => false,
                    'PATCH' => false,
                    'PUT' => false,
                    'DELETE' => false,
                ),
                'collection' => array(
                    'GET' => false,
                    'POST' => false,
                    'PATCH' => false,
                    'PUT' => false,
                    'DELETE' => false,
                ),
            ),
            'NapierManagementTraining\\V1\\Rest\\Titles\\Controller' => array(
                'entity' => array(
                    'GET' => false,
                    'POST' => false,
                    'PATCH' => false,
                    'PUT' => false,
                    'DELETE' => false,
                ),
                'collection' => array(
                    'GET' => false,
                    'POST' => false,
                    'PATCH' => false,
                    'PUT' => false,
                    'DELETE' => false,
                ),
            ),
            'NapierManagementTraining\\V1\\Rpc\\Registration\\Controller' => array(
                'actions' => array(
                    'registration' => array(
                        'GET' => false,
                        'POST' => false,
                        'PATCH' => false,
                        'PUT' => false,
                        'DELETE' => false,
                    ),
                ),
            ),
        ),
    ),
);
