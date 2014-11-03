<?php
return array(
    'router' => array(
        'routes' => array(
            'napier-management-training-admin.rest.courses' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/admin/courses[/:courses_id]',
                    'defaults' => array(
                        'controller' => 'NapierManagementTrainingAdmin\\V1\\Rest\\Courses\\Controller',
                    ),
                ),
            ),
            'napier-management-training-admin.rest.venues' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/admin/venues[/:venues_id]',
                    'defaults' => array(
                        'controller' => 'NapierManagementTrainingAdmin\\V1\\Rest\\Venues\\Controller',
                    ),
                ),
            ),
            'napier-management-training-admin.rest.news' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/admin/news[/:news_id]',
                    'defaults' => array(
                        'controller' => 'NapierManagementTrainingAdmin\\V1\\Rest\\News\\Controller',
                    ),
                ),
            ),
            'napier-management-training-admin.rest.sessions' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/admin/sessions[/:sessions_id]',
                    'defaults' => array(
                        'controller' => 'NapierManagementTrainingAdmin\\V1\\Rest\\Sessions\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'napier-management-training-admin.rest.courses',
            1 => 'napier-management-training-admin.rest.venues',
            2 => 'napier-management-training-admin.rest.news',
            3 => 'napier-management-training-admin.rest.sessions',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'NapierManagementTrainingAdmin\\V1\\Rest\\Courses\\CoursesResource' => 'NapierManagementTrainingAdmin\\V1\\Rest\\Courses\\CoursesResourceFactory',
            'NapierManagementTrainingAdmin\\V1\\Rest\\Venues\\VenuesResource' => 'NapierManagementTrainingAdmin\\V1\\Rest\\Venues\\VenuesResourceFactory',
            'NapierManagementTrainingAdmin\\V1\\Rest\\News\\NewsResource' => 'NapierManagementTrainingAdmin\\V1\\Rest\\News\\NewsResourceFactory',
            'NapierManagementTrainingAdmin\\V1\\Rest\\Sessions\\SessionsResource' => 'NapierManagementTrainingAdmin\\V1\\Rest\\Sessions\\SessionsResourceFactory',
        ),
    ),
    'zf-rest' => array(
        'NapierManagementTrainingAdmin\\V1\\Rest\\Courses\\Controller' => array(
            'listener' => 'NapierManagementTrainingAdmin\\V1\\Rest\\Courses\\CoursesResource',
            'route_name' => 'napier-management-training-admin.rest.courses',
            'route_identifier_name' => 'courses_id',
            'collection_name' => 'courses',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(
                0 => 'venue',
            ),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'NapierManagementTrainingAdmin\\V1\\Rest\\Courses\\CoursesEntity',
            'collection_class' => 'NapierManagementTrainingAdmin\\V1\\Rest\\Courses\\CoursesCollection',
            'service_name' => 'courses',
        ),
        'NapierManagementTrainingAdmin\\V1\\Rest\\Venues\\Controller' => array(
            'listener' => 'NapierManagementTrainingAdmin\\V1\\Rest\\Venues\\VenuesResource',
            'route_name' => 'napier-management-training-admin.rest.venues',
            'route_identifier_name' => 'venues_id',
            'collection_name' => 'venues',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'NapierManagementTrainingAdmin\\V1\\Rest\\Venues\\VenuesEntity',
            'collection_class' => 'NapierManagementTrainingAdmin\\V1\\Rest\\Venues\\VenuesCollection',
            'service_name' => 'venues',
        ),
        'NapierManagementTrainingAdmin\\V1\\Rest\\News\\Controller' => array(
            'listener' => 'NapierManagementTrainingAdmin\\V1\\Rest\\News\\NewsResource',
            'route_name' => 'napier-management-training-admin.rest.news',
            'route_identifier_name' => 'news_id',
            'collection_name' => 'news',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'NapierManagementTrainingAdmin\\V1\\Rest\\News\\NewsEntity',
            'collection_class' => 'NapierManagementTrainingAdmin\\V1\\Rest\\News\\NewsCollection',
            'service_name' => 'news',
        ),
        'NapierManagementTrainingAdmin\\V1\\Rest\\Sessions\\Controller' => array(
            'listener' => 'NapierManagementTrainingAdmin\\V1\\Rest\\Sessions\\SessionsResource',
            'route_name' => 'napier-management-training-admin.rest.sessions',
            'route_identifier_name' => 'sessions_id',
            'collection_name' => 'sessions',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'NapierManagementTrainingAdmin\\V1\\Rest\\Sessions\\SessionsEntity',
            'collection_class' => 'NapierManagementTrainingAdmin\\V1\\Rest\\Sessions\\SessionsCollection',
            'service_name' => 'sessions',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'NapierManagementTrainingAdmin\\V1\\Rest\\Courses\\Controller' => 'Json',
            'NapierManagementTrainingAdmin\\V1\\Rest\\Venues\\Controller' => 'Json',
            'NapierManagementTrainingAdmin\\V1\\Rest\\News\\Controller' => 'Json',
            'NapierManagementTrainingAdmin\\V1\\Rest\\Sessions\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'NapierManagementTrainingAdmin\\V1\\Rest\\Courses\\Controller' => array(
                0 => 'application/vnd.napier-management-training-admin.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'NapierManagementTrainingAdmin\\V1\\Rest\\Venues\\Controller' => array(
                0 => 'application/vnd.napier-management-training-admin.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'NapierManagementTrainingAdmin\\V1\\Rest\\News\\Controller' => array(
                0 => 'application/vnd.napier-management-training-admin.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'NapierManagementTrainingAdmin\\V1\\Rest\\Sessions\\Controller' => array(
                0 => 'application/vnd.napier-management-training-admin.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'NapierManagementTrainingAdmin\\V1\\Rest\\Courses\\Controller' => array(
                0 => 'application/vnd.napier-management-training-admin.v1+json',
                1 => 'application/json',
            ),
            'NapierManagementTrainingAdmin\\V1\\Rest\\Venues\\Controller' => array(
                0 => 'application/vnd.napier-management-training-admin.v1+json',
                1 => 'application/json',
            ),
            'NapierManagementTrainingAdmin\\V1\\Rest\\News\\Controller' => array(
                0 => 'application/vnd.napier-management-training-admin.v1+json',
                1 => 'application/json',
            ),
            'NapierManagementTrainingAdmin\\V1\\Rest\\Sessions\\Controller' => array(
                0 => 'application/vnd.napier-management-training-admin.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'NapierManagementTrainingAdmin\\V1\\Rest\\Courses\\CoursesEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'napier-management-training-admin.rest.courses',
                'route_identifier_name' => 'courses_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NapierManagementTrainingAdmin\\V1\\Rest\\Courses\\CoursesCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'napier-management-training-admin.rest.courses',
                'route_identifier_name' => 'courses_id',
                'is_collection' => true,
            ),
            'NapierManagementTrainingAdmin\\V1\\Rest\\Venues\\VenuesEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'napier-management-training-admin.rest.venues',
                'route_identifier_name' => 'venues_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NapierManagementTrainingAdmin\\V1\\Rest\\Venues\\VenuesCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'napier-management-training-admin.rest.venues',
                'route_identifier_name' => 'venues_id',
                'is_collection' => true,
            ),
            'NapierManagementTrainingAdmin\\V1\\Rest\\News\\NewsEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'napier-management-training-admin.rest.news',
                'route_identifier_name' => 'news_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NapierManagementTrainingAdmin\\V1\\Rest\\News\\NewsCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'napier-management-training-admin.rest.news',
                'route_identifier_name' => 'news_id',
                'is_collection' => true,
            ),
            'NapierManagementTrainingAdmin\\V1\\Rest\\Sessions\\SessionsEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'napier-management-training-admin.rest.sessions',
                'route_identifier_name' => 'sessions_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NapierManagementTrainingAdmin\\V1\\Rest\\Sessions\\SessionsCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'napier-management-training-admin.rest.sessions',
                'route_identifier_name' => 'sessions_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'NapierManagementTrainingAdmin\\V1\\Rest\\Courses\\Controller' => array(
                'entity' => array(
                    'GET' => true,
                    'POST' => false,
                    'PATCH' => true,
                    'PUT' => true,
                    'DELETE' => true,
                ),
                'collection' => array(
                    'GET' => true,
                    'POST' => true,
                    'PATCH' => false,
                    'PUT' => false,
                    'DELETE' => false,
                ),
            ),
            'NapierManagementTrainingAdmin\\V1\\Rest\\Venues\\Controller' => array(
                'entity' => array(
                    'GET' => true,
                    'POST' => false,
                    'PATCH' => true,
                    'PUT' => true,
                    'DELETE' => true,
                ),
                'collection' => array(
                    'GET' => true,
                    'POST' => true,
                    'PATCH' => false,
                    'PUT' => false,
                    'DELETE' => false,
                ),
            ),
            'NapierManagementTrainingAdmin\\V1\\Rest\\News\\Controller' => array(
                'entity' => array(
                    'GET' => true,
                    'POST' => false,
                    'PATCH' => true,
                    'PUT' => true,
                    'DELETE' => true,
                ),
                'collection' => array(
                    'GET' => true,
                    'POST' => true,
                    'PATCH' => false,
                    'PUT' => false,
                    'DELETE' => false,
                ),
            ),
        ),
    ),
    'zf-content-validation' => array(
        'NapierManagementTrainingAdmin\\V1\\Rest\\News\\Controller' => array(
            'input_filter' => 'NapierManagementTrainingAdmin\\V1\\Rest\\News\\Validator',
        ),
        'NapierManagementTrainingAdmin\\V1\\Rest\\Courses\\Controller' => array(
            'input_filter' => 'NapierManagementTrainingAdmin\\V1\\Rest\\Courses\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'NapierManagementTrainingAdmin\\V1\\Rest\\News\\Validator' => array(
            0 => array(
                'name' => 'title',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'description' => 'News title',
                'error_message' => 'Title is required',
                'allow_empty' => false,
                'continue_if_empty' => false,
            ),
            1 => array(
                'name' => 'content',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => true,
                'continue_if_empty' => true,
            ),
        ),
        'NapierManagementTrainingAdmin\\V1\\Rest\\Courses\\Validator' => array(
            0 => array(
                'name' => 'title',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
            ),
            1 => array(
                'name' => 'price',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\Int',
                        'options' => array(),
                    ),
                ),
                'validators' => array(),
            ),
            2 => array(
                'name' => 'description',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => true,
                'continue_if_empty' => true,
            ),
            3 => array(
                'name' => 'limit',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\Int',
                        'options' => array(),
                    ),
                ),
                'validators' => array(),
                'allow_empty' => true,
                'continue_if_empty' => true,
            ),
        ),
    ),
);
