<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('create', 'Home::create');
$routes->post('getData', 'Home::getData');
$routes->post('deleteData', 'Home::deleteData');
$routes->post('getDataById', 'Home::getDataById');
$routes->post('updateData', 'Home::updateData');

