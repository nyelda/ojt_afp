<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'SigninController::index');
$routes->get('/signin', 'SigninController::index');
$routes->get('/signup', 'SignupController::index');
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/users', 'usersController::index');
$routes->get('/upload', 'uploadController::index');
$routes->get('/profile', 'ProfileController::index');


$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');


//$routes->get('/dashboard', 'DashboardController::templates',['filter' => 'authGuard']);
//routes->get('/profile', 'ProfileController::index',['filter' => 'authGuard']);
