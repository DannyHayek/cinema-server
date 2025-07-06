<?php

$apis = [
    '/login'         => ['controller' => 'AuthController', 'method' => 'login'],
    '/signup'         => ['controller' => 'AuthController', 'method' => 'signup'],

    '/get_users'         => ['controller' => 'UserController', 'method' => 'getAllUsers'],
    '/create_user'         => ['controller' => 'UserController', 'method' => 'createUser'],
    '/delete_users'         => ['controller' => 'UserController', 'method' => 'deleteAllUsers'],
    '/update_user'         => ['controller' => 'UserController', 'method' => 'updateUser'],

    '/get_movies'         => ['controller' => 'MovieController', 'method' => 'getAllMovies'],
    '/create_movie'         => ['controller' => 'MovieController', 'method' => 'createMovie'],
    '/delete_movies'         => ['controller' => 'MovieController', 'method' => 'deleteAllMovies'],
    '/update_movie'         => ['controller' => 'MovieController', 'method' => 'updateMovie'],
];

