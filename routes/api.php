<?php

$apis = [
    '/login'         => ['controller' => 'UserController', 'method' => 'login'],
    '/signup'         => ['controller' => 'UserController', 'method' => 'signup'],

    '/get_users'         => ['controller' => 'UserController', 'method' => 'getAllUsers'],
    '/create_user'         => ['controller' => 'UserController', 'method' => 'createUser'],
    '/delete_users'         => ['controller' => 'UserController', 'method' => 'deleteAllUsers'],
    '/update_user'         => ['controller' => 'UserController', 'method' => 'updateUser'],
];

