<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'JokesController::index');

// Rota para mudança de idioma
$routes->get('language/(:alpha)', 'JokesController::setLanguage/$1');

// API Routes para piadas
$routes->group('jokes', function($routes) {
    $routes->get('random', 'JokesController::random');
    $routes->get('categories', 'JokesController::categories');
    $routes->get('search', 'JokesController::search');
    $routes->get('(:num)', 'JokesController::show/$1');
});