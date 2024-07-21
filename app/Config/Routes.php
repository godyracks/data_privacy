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
$routes->get('resources', 'Resources::index');
$routes->get('about', 'About::index');
$routes->get('contact', 'Contact::index');
$routes->get('login', 'Login::index');
$routes->get('terms-and-conditions', 'Terms::index');
$routes->get('privacy-policy', 'PrivacyPolicy::index');
