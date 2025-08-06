<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Landing routes
 $routes->get('/', 'Landing::index');
 $routes->get('/about_oras', 'Landing::about_oras');
 $routes->get('/events', 'Landing::events');
 $routes->get('/attractions', 'Landing::attractions');
 $routes->get('/gallery', 'Landing::gallery');
 $routes->get('/contact', 'Landing::contact');

// Admin routes
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/events', 'Admin::events');
$routes->get('/admin/tourist_spots', 'Admin::tourist_spots');
$routes->get('/admin/photo_gallery', 'Admin::photo_gallery');
$routes->get('/admin/communication', 'Admin::communication');

// Server side routes
$routes->post('/login', 'Auth::login');
$routes->post('/signup', 'Auth::signup');
$routes->post('/update_profile', 'Auth::update_profile');
$routes->post('/logout', 'Auth::logout');
$routes->post('/admin/update_profile', 'Admin::update_profile');
