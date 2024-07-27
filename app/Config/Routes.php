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
$routes->get('logout', 'Login::logout');
$routes->get('/google-login', 'GoogleAuthController::login');
$routes->get('/google-callback', 'GoogleAuthController::callback');
$routes->get('/profile', 'Profile::index');
$routes->get('terms-and-conditions', 'Terms::index');
$routes->get('privacy-policy', 'PrivacyPolicy::index');
$routes->get('/sivasakthi-dashboard', 'Dashboard::index');
$routes->post('sivasakthi-dashboard/add-country', 'Dashboard::addCountry');
$routes->post('sivasakthi-dashboard/add-law', 'Dashboard::addLaw');
$routes->post('sivasakthi-dashboard/add-document', 'Dashboard::addDocument');
$routes->post('sivasakthi-dashboard/add-case-study', 'Dashboard::addCaseStudy');
$routes->post('sivasakthi-dashboard/add-resource', 'Dashboard::addResource');
$routes->post('sivasakthi-dashboard/add-search-index', 'Dashboard::addSearchIndex');
$routes->get('view-more/(:any)/(:num)/(:any)', 'ViewMoreController::index/$1/$2/$3');


  // Routes for Laws
  $routes->get('sivasakthi-dashboard/editLaw/(:num)', 'Dashboard::editLaw/$1');
  $routes->post('sivasakthi-dashboard/updateLaw/(:num)', 'Dashboard::updateLaw/$1');
  $routes->get('sivasakthi-dashboard/deleteLaw/(:num)', 'Dashboard::deleteLaw/$1');

  // Routes for Documents
  $routes->get('sivasakthi-dashboard/editDocument/(:num)', 'Dashboard::editDocument/$1');
  $routes->post('sivasakthi-dashboard/updateDocument/(:num)', 'Dashboard::updateDocument/$1');
  $routes->get('sivasakthi-dashboard/deleteDocument/(:num)', 'Dashboard::deleteDocument/$1');

  // Routes for Case Studies
  $routes->get('sivasakthi-dashboard/editCaseStudy/(:num)', 'Dashboard::editCaseStudy/$1');
  $routes->post('sivasakthi-dashboard/updateCaseStudy/(:num)', 'Dashboard::updateCaseStudy/$1');
  $routes->get('sivasakthi-dashboard/deleteCaseStudy/(:num)', 'Dashboard::deleteCaseStudy/$1');

  // Routes for Resources
  $routes->get('sivasakthi-dashboard/editResource/(:num)', 'Dashboard::editResource/$1');
  $routes->post('sivasakthi-dashboard/updateResource/(:num)', 'Dashboard::updateResource/$1');
  $routes->get('sivasakthi-dashboard/deleteResource/(:num)', 'Dashboard::deleteResource/$1');
  $routes->get('error', 'ErrorController::index');
  $routes->post('submit-review', 'ViewMoreController::submitReview');




