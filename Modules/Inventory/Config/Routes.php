<?php

namespace Modules\Inventory\Config;

$routes->group('inventory', ['namespace' => 'Modules\Inventory\Controllers'], static function ($routes) {
    $routes->get('/', 'Dashboard::index');
    // Tambahkan route inventory lainnya di sini
    // $routes->get('products', 'Products::index');
});
