<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::landing');

$routes->get('/adminLogin', 'Home::adminLogin');
$routes->post('/adminLoginProccess', 'AuthController::adminLoginProccess');
$routes->post('/makeOrder', 'Home::makeOrder');
$routes->get('sitemap.xml', 'SEO::sitemap');

$routes->group('admin', ['filter' => 'adminauth'], function ($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->post('addProduct', 'AdminController::addProduct');
    $routes->post('updateProduct', 'AdminController::updateProduct');
    $routes->post('deleteProduct', 'AdminController::deleteProduct');
    $routes->post('addCategory', 'AdminController::addCategory');
    $routes->post('changePassword', 'AdminController::changePassword');

    $routes->get('admins', 'AdminController::admins');
    $routes->post('addAdmin', 'AdminController::addAdmin');

    $routes->get('orders', 'AdminController::orders');
    $routes->post('updateOrderStatus', 'AdminController::updateOrderStatus');

    $routes->post('logout', 'AdminController::logout');
});

$routes->set404Override(function () {
    header("Location: " . base_url());
    exit;
});
