<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// -----------------------------------------------------------------------
// Public routes (no auth required)
// -----------------------------------------------------------------------
$routes->get('/', 'Auth::index');
$routes->get('auth', 'Auth::index');
$routes->post('auth', 'Auth::index');
$routes->get('auth/logout', 'Auth::logout');
$routes->get('auth/blocked', 'Auth::blocked');

// -----------------------------------------------------------------------
// User routes (protected by AuthGuard filter)
// -----------------------------------------------------------------------
$routes->group('user', ['filter' => 'authguard'], function ($routes) {
    $routes->get('/', 'User::index');
});

// -----------------------------------------------------------------------
// Admin routes (protected by AuthGuard filter)
// -----------------------------------------------------------------------
$routes->group('admin', ['filter' => 'authguard'], function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('kandidat', 'Admin::kandidat');
    $routes->get('tambahkandidat', 'Admin::tambahKandidat');
    $routes->post('tambahkandidat', 'Admin::tambahKandidat');
    $routes->get('editkandidat/(:num)', 'Admin::editKandidat/$1');
    $routes->post('editkandidat/(:num)', 'Admin::editKandidat/$1');
    $routes->get('hapuskandidat/(:num)', 'Admin::hapusKandidat/$1');
    $routes->get('datapemilih', 'Admin::dataPemilih');
    $routes->get('download', 'Admin::download');
    $routes->post('importexcel', 'Admin::importExcel');
    $routes->get('laporan', 'Admin::laporan');
});
