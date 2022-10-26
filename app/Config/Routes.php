<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// $routes->get('/home/index', 'Home::index');

$routes->get('/tasks', 'Tasks::index');
$routes->get('/tasks/show/(:num)', 'Tasks::show/$1');

$routes->get('/tasks/new', 'Tasks::new');
$routes->post('/tasks/create', 'Tasks::create');

// EDIT
$routes->get('/tasks/edit/(:num)', 'Tasks::edit/$1');
$routes->post('/tasks/update/(:num)', 'Tasks::update/$1');

// Delete
$routes->get('/tasks/delete/(:num)', 'Tasks::delete/$1');
$routes->post('/tasks/delete/(:num)', 'Tasks::delete/$1');

// Sign up
$routes->get('/signup/new', 'Signup::new',['filter' => 'guest']);
$routes->post('/signup/create', 'Signup::create');
$routes->get('/signup/success', 'Signup::success');

// Log in
$routes->get('/login', 'Login::new',['filter' => 'guest']);
$routes->post('/login/create', 'Login::create');

// Log out
$routes->get('/logout', 'Login::logout');
$routes->get('login/logoutMessage', 'Login::logoutMessage');

// Admin show users
$routes->get('/admin/users', 'Admin\Users::index');
$routes->get('/admin/users/show/(:num)', 'Admin\Users::show/$1');
// Admin create user view
$routes->get('/admin/users/new', 'Admin\Users::new');
// Admin create user
$routes->post('/admin/users/create', 'Admin\Users::create');
// Admin edit user view
$routes->get('/admin/users/edit/(:num)', 'Admin\Users::edit/$1');
// Admin update user
$routes->post('/admin/users/update/(:num)', 'Admin\Users::update/$1');
// Admin delete user view
$routes->get('/admin/users/delete/(:num)', 'Admin\Users::delete/$1');
// Admin delete user delete
$routes->post('/admin/users/delete/(:num)', 'Admin\Users::delete/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
