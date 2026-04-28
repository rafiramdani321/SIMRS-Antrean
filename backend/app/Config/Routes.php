<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('api', function ($routes) {
    $routes->post('auth/login', 'Auth::login');

    $routes->get('poli', 'PoliController::index');
    $routes->get('dokter', 'DokterController::index');
});

$routes->group('api', ['filter' => 'auth'], function ($routes) {});
