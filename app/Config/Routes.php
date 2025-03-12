<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Partie utilisateur : 
$routes->get('/Home/createUsers', 'Home::createUsers');
$routes->post('/user/create', 'UserController::CreateUser');
$routes->get('allUsers', 'UserController::allUsers');
$routes->get('/Home/login', 'UserController::login');
$routes->post('login', 'UserController::login');
$routes->get('logout', 'UserController::logout');
$routes->post('update-role', 'UserController::updateRole');
$routes->get('information', 'UserController::information');
$routes->post('update-information', 'UserController::updateInformation');

$routes->get('dashboard', function () {
    if (!session()->get('is_logged_in')) {
        return redirect()->to('login');
    }
    return view('dashboard'); 
});



$routes->get('createHouse', 'HouseController::index');
$routes->post('/house/store', 'HouseController::store');
$routes->get('/houses', 'HouseController::allHouses');

$routes->get('house/edit/(:num)', 'HouseController::edit/$1');
$routes->post('house/update/(:num)', 'HouseController::update/$1');
$routes->get('house/delete/(:num)', 'HouseController::delete/$1');
