<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('/Home/createUsers', 'Home::createUsers');

$routes->post('/user/create', 'UserController::CreateUser');

