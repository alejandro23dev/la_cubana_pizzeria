<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::landing');

$routes->get('/adminLogin', 'Home::adminLogin');
$routes->post('/adminLoginProccess', 'AuthController::adminLoginProccess');
$routes->post('/makeOrder', 'Home::makeOrder');

$routes->group('admin', ['filter' => 'adminauth'], function ($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->post('addPizza', 'AdminController::addPizza');
    $routes->post('updatePizza', 'AdminController::updatePizza');
    $routes->post('deletePizza', 'AdminController::deletePizza');

    $routes->get('admins', 'AdminController::admins');
    $routes->post('addAdmin', 'AdminController::addAdmin');

    $routes->get('orders', 'AdminController::orders');
    $routes->post('updateOrderStatus', 'AdminController::updateOrderStatus');

    $routes->post('logout', 'AdminController::logout');
});
