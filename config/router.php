<?php
define('ROUTER', [
    '/404' => [
        'controller' => 'Src\\Controller\\ExceptionsController',
        'action' => 'page404',
        'method' => ['GET', 'POST']
    ],
    '/403' => [
        'controller' => 'Src\\Controller\\ExceptionsController',
        'action' => 'page403',
        'method' => ['GET', 'POST']
    ],
    '/405' => [
        'controller' => 'Src\\Controller\\ExceptionsController',
        'action' => 'page405',
        'method' => ['GET', 'POST']
    ],
    '/login' => [
        'controller' => 'Src\\Controller\\UserController',
        'action' => 'login',
        'method' => ['GET', 'POST']
    ],
    '/index' => [
        'controller' => 'Src\\Controller\\TaskController',
        'action' => 'index',
        'method' => ['GET']
    ],
    '/' => [
        'controller' => 'Src\\Controller\\TaskController',
        'action' => 'index',
        'method' => ['GET']
    ],
    '/create-task' => [
        'controller' => 'Src\\Controller\\TaskController',
        'action' => 'create',
        'method' => ['POST']
    ],
    '/logout' => [
        'controller' => 'Src\\Controller\\UserController',
        'action' => 'logout',
        'method' => ['GET', 'POST']
    ],
    '/edit-task' => [
        'controller' => 'Src\\Controller\\TaskController',
        'action' => 'edit',
        'method' => ['GET', 'POST']
    ]
]);
