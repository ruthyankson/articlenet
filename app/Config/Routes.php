<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Articles;
use App\Controllers\Pages;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/articles', 'Articles::index');
// $routes->get('/articles/create', [Articles::class, 'create']);
// $routes->get('/articles/create', [Articles::class, 'create']);
$routes->post('/articles/store', 'Articles::store');
// $routes->get('/articles/edit/(:segment)', [Articles::class, 'edit/$1']);
$routes->post('/articles/update/(:segment)', [Articles::class, 'update/$1']);
$routes->post('/articles/delete/(:segment)', [Articles::class, 'delete/$1']);
$routes->get('/articles/(:segment)', 'Articles::detail/$1');
$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);

