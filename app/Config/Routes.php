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
$routes->get('view-more/(:any)/(:num)/(:any)', 'ViewMoreController::index/$1/$2/$3');


  // Routes for Laws
  $routes->get('dashboard/editLaw/(:num)', 'Dashboard::editLaw/$1');
  $routes->post('dashboard/updateLaw/(:num)', 'Dashboard::updateLaw/$1');
  $routes->get('dashboard/deleteLaw/(:num)', 'Dashboard::deleteLaw/$1');

  // Routes for Documents
  $routes->get('dashboard/editDocument/(:num)', 'Dashboard::editDocument/$1');
  $routes->post('dashboard/updateDocument/(:num)', 'Dashboard::updateDocument/$1');
  $routes->get('dashboard/deleteDocument/(:num)', 'Dashboard::deleteDocument/$1');

  // Routes for Case Studies
  $routes->get('dashboard/editCaseStudy/(:num)', 'Dashboard::editCaseStudy/$1');
  $routes->post('dashboard/updateCaseStudy/(:num)', 'Dashboard::updateCaseStudy/$1');
  $routes->get('dashboard/deleteCaseStudy/(:num)', 'Dashboard::deleteCaseStudy/$1');

  // Routes for Resources
  $routes->get('dashboard/editResource/(:num)', 'Dashboard::editResource/$1');
  $routes->post('dashboard/updateResource/(:num)', 'Dashboard::updateResource/$1');
  $routes->get('dashboard/deleteResource/(:num)', 'Dashboard::deleteResource/$1');


