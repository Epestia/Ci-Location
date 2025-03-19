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


$routes->get('reservations/create', 'ReservationController::create');
$routes->post('reservation/save', 'ReservationController::save');


$routes->get('reservations/recap/(:num)', 'ReservationController::recap/$1');
$routes->get('reservations/recap/(:num)/edit', 'ReservationController::edit/$1');
$routes->post('reservations/update/(:num)', 'ReservationController::update/$1');

$routes->get('reservations/delete/(:num)', 'ReservationController::delete/$1');
$routes->post('reservations/delete/(:num)', 'ReservationController::delete/$1');

$routes->get('/indisponibilite/create', 'IndisponibiliteController::createIndisponibilite');
$routes->post('indisponibilites/save', 'IndisponibiliteController::save');
$routes->get('indisponibilites/all', 'IndisponibiliteController::allIndisponibilites');
$routes->get('indisponibilites/edit/(:num)', 'IndisponibiliteController::edit/$1');
$routes->post('indisponibilites/update/(:num)', 'IndisponibiliteController::update/$1');
$routes->get('indisponibilites/delete/(:num)', 'IndisponibiliteController::delete/$1');
