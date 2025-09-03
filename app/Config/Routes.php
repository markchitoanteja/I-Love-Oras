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
$routes->post('/admin/upload_image', 'Admin::upload_image');
$routes->post('/admin/update_image', 'Admin::update_image');
$routes->post('/admin/delete_image', 'Admin::delete_image');
$routes->post('/admin/delete_message', 'Admin::delete_message');
$routes->post('/admin/reply_message', 'Admin::reply_message');
$routes->post('/admin/add_event', 'Admin::add_event');
$routes->post('/admin/update_event', 'Admin::update_event');
$routes->post('/admin/delete_event', 'Admin::delete_event');
$routes->post('/admin/new_tourist_spot', 'Admin::new_tourist_spot');
$routes->post('/admin/update_tourist_spot', 'Admin::update_tourist_spot');
$routes->post('/admin/delete_tourist_spot', 'Admin::delete_tourist_spot');
$routes->post('/landing/submit_contact_form', 'Landing::submit_contact_form');
$routes->post('/landing/get-event-details', 'Landing::get_event_details');
