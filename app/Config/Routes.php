<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('features', 'Features::index');
$routes->get('map', 'Map::index');
$routes->get('timeline', 'Timelines::index');
$routes->get('search', 'Search::index');
$routes->get('live-search/search', 'LiveSearchController::search');
$routes->get('resources', 'Resources::index');
$routes->get('about', 'About::index');
$routes->get('contact', 'Contact::index');
$routes->get('auth', 'Login::index');
$routes->get('/google-login', 'GoogleAuthController::login');
$routes->get('/google-callback', 'GoogleAuthController::callback');
$routes->get('/profile', 'Profile::index');
$routes->get('terms-and-conditions', 'Terms::index');
$routes->get('privacy-policy', 'PrivacyPolicy::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->post('/dashboard/add-country', 'Dashboard::addCountry');
$routes->post('/dashboard/add-law', 'Dashboard::addLaw');
$routes->post('/dashboard/add-document', 'Dashboard::addDocument');
$routes->post('/dashboard/add-case-study', 'Dashboard::addCaseStudy');
$routes->post('/dashboard/add-resource', 'Dashboard::addResource');
$routes->post('/dashboard/add-search-index', 'Dashboard::addSearchIndex');

