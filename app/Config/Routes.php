<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Articles;
use App\Controllers\Pages;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index'); // First page
$routes->get('/articles', 'Articles::index'); // Articles page
$routes->post('/articles/store', 'Articles::store'); // Saves an article to the database
$routes->post('/articles/update/(:segment)', [Articles::class, 'update/$1']); // Updates an article in the database
$routes->post('/articles/delete/(:segment)', [Articles::class, 'delete/$1']); // Deletes an article from the database
$routes->get('/articles/(:segment)', 'Articles::detail/$1'); // Routes to the article detail page for viewing
$routes->get('pages', [Pages::class, 'index']); // Routes to all other pages, including pages/home
$routes->get('(:segment)', [Pages::class, 'view']); // Routes to a viewable segment of the page

 //All routing syntaxes are correct

