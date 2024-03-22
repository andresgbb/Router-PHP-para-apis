<?php

use App\Controllers\UserController;

return [
    'GET' => [
        '/users' => [UserController::class, 'index'],
    ],
    'POST' => [
        '/users/new' => [UserController::class, 'store'],
    ],
    'DELETE' =>[
        '/users/delete' => [UserController::class, 'destroy'],
    ],
    'PUT' => [
        '/users/update' => [UserController::class, 'update'],
    ]
];