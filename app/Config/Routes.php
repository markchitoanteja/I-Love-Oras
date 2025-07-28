<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Landing routes
 $routes->get('/', 'Landing::index');
 $routes->get('/about_oras', 'Landing::about_oras');
 $routes->get('/attractions', 'Landing::attractions');
 $routes->get('/gallery', 'Landing::gallery');
 $routes->get('/contact', 'Landing::contact');

// Admin routes
$routes->get('/admin/dashboard', 'Admin::index');

// Server side routes
$routes->post('/login', 'Auth::login');
$routes->post('/signup', 'Auth::signup');
$routes->post('/update_profile', 'Auth::update_profile');
$routes->post('/logout', 'Auth::logout');
