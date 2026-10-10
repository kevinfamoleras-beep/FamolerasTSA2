
<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Welcome page
$routes->get('/', 'Pages::index');

// Task List page
$routes->get('/tasks', 'Tasks::index');

// Profile page
$routes->get('/profile', 'Pages::profile');

// About page
$routes->get('/about', 'Pages::about');
