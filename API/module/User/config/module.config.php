<?php

return [
    'service_manager' => [
        'factories' => [
            \User\V1\Rest\User\UserResource::class => \User\V1\Rest\User\UserResourceFactory::class,
        ],
    ],
    'input_filters' => [
        'invokables' => [
            \Application\Service\MyCollectionInputFilter::class => \Application\Service\MyCollectionInputFilterFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'user.rest.user' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/user[/:user_id]',
                    'defaults' => [
                        'controller' => 'User\\V1\\Rest\\User\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'user.rest.user',
        ],
    ],
    'zf-rest' => [
        'User\\V1\\Rest\\User\\Controller' => [
            'listener' => \User\V1\Rest\User\UserResource::class,
            'route_name' => 'user.rest.user',
            'route_identifier_name' => 'user_id',
            'collection_name' => 'user',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \User\V1\Rest\User\UserEntity::class,
            'collection_class' => \User\V1\Rest\User\UserCollection::class,
            'service_name' => 'User',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'User\\V1\\Rest\\User\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'User\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.user.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'User\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.user.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \User\V1\Rest\User\UserEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'user.rest.user',
                'route_identifier_name' => 'user_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \User\V1\Rest\User\UserCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'user.rest.user',
                'route_identifier_name' => 'user_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-content-validation' => [
        'User\\V1\\Rest\\User\\Controller' => [
            'input_filter' => 'User\\V1\\Rest\\User\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'User\\V1\\Rest\\User\\Validator' => [
            0 => [
                'name' => 'emails',
                'type' => \Application\Service\MyCollectionInputFilter::class,
              // 'type' =>  \Zend\InputFilter\CollectionInputFilter::class,
                'required' => false,
                'input_filter' => [
                    'email' => [
                        'required' => true,
                        'filters' => [
                            0 => [
                                'name' => \Zend\Filter\StringTrim::class,
                            ],
                            1 => [
                                'name' => \Zend\Filter\StripTags::class,
                            ],
                        ],
                        'validators' => [
                            0 => [
                                'name' => \Zend\Validator\EmailAddress::class,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
                'validators' => [],
                'filters' => [],
                'description' => 'Matriz (array multi-dimensional)  contendo valores de um ou mais emails',
                'field_type' => 'Array',
                'error_message' => 'Este campo tem de ser uma Matriz (array multi-dimensional)  contendo valor "email": Com um Email válido.',
            ],
            1 => [
                'name' => 'firstName',
                'required' => true,
                'validators' => [],
                'filters' => [],
                'error_message' => 'First Name é obrigatório',
            ],
        ],
    ],
];
