<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');



$routes->get('/Home/createUsers', 'Home::createUsers');

$routes->post('/user/create', 'UserController::CreateUser');

$routes->get('/Home/login', 'UserController::login');
$routes->post('login', 'UserController::login');
$routes->get('logout', 'UserController::logout');
$routes->get('dashboard', function () {
    if (!session()->get('is_logged_in')) {
        return redirect()->to('login');
    }
    return view('dashboard'); 
});



$routes->get('createHouse', 'HouseController::index');
$routes->get('information', 'UserController::information');
$routes->post('update-information', 'UserController::updateInformation');

$routes->get('allUsers', 'UserController::allUsers');
