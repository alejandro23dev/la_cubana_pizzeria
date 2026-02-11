<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::landing');

$routes->get('/admin', 'Home::admin');
$routes->post('/adminLoginProccess', 'AuthController::adminLoginProccess');

$routes->group('admin', ['filter' => 'adminauth'], function ($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->post('addPizza', 'AdminController::addPizza');
    $routes->post('updatePizza', 'AdminController::updatePizza');
    $routes->post('deletePizza', 'AdminController::deletePizza');
});
