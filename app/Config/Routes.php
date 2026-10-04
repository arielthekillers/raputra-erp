<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

// --------------------------------------------------------------------
// User Management Module
// --------------------------------------------------------------------
$routes->group('users', ['namespace' => 'Modules\UserManagement\Controllers'], static function ($routes) {
    $routes->get('/', 'UserController::index');
    $routes->post('store', 'UserController::store');
});

service('auth')->routes($routes);
