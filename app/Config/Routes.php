<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// $routes->get('/', 'Home::index');

$routes->group('admin',['filter' => 'filteradmin'], function ($routes) {
    $routes->get('dashboard', 'AdminController::index');
    
    // Balance Route
    $routes->get('balance', 'BalanceController::index');
    $routes->get('balance/show/(:num)', 'BalanceController::show/$1'); 
    $routes->get('balance/add', 'BalanceController::create');
    $routes->post('balance/store', 'BalanceController::store');
    $routes->get('balance/edit/(:num)', 'BalanceController::edit/$1');
    $routes->post('balance/update/(:num)', 'BalanceController::update/$1');
    $routes->get('balance/delete/(:num)', 'BalanceController::delete/$1');

    // Category Route
    $routes->get('category', 'CategoryController::index');
    $routes->get('category/add', 'CategoryController::create');
    $routes->post('category/store', 'CategoryController::store');
    $routes->get('category/edit/(:num)', 'CategoryController::edit/$1');
    $routes->post('category/update/(:num)', 'CategoryController::update/$1');
    $routes->get('category/delete/(:num)', 'CategoryController::delete/$1');

    // Unit Route
    $routes->get('unit', 'UnitController::index');
    $routes->get('unit/add', 'UnitController::create');
    $routes->post('unit/store', 'UnitController::store');
    $routes->get('unit/edit/(:num)', 'UnitController::edit/$1');
    $routes->post('unit/update/(:num)', 'UnitController::update/$1');
    $routes->get('unit/delete/(:num)', 'UnitController::delete/$1');

    // Type Route
    $routes->get('type', 'TypeController::index');
    $routes->get('type/add', 'TypeController::create');
    $routes->post('type/store', 'TypeController::store');
    $routes->get('type/edit/(:num)', 'TypeController::edit/$1');
    $routes->post('type/update/(:num)', 'TypeController::update/$1');
    $routes->get('type/delete/(:num)', 'TypeController::delete/$1');

    // Income Route
    $routes->get('income', 'IncomeController::index');
    $routes->get('income/show/(:num)', 'IncomeController::show/$1'); 
    $routes->get('income/add', 'IncomeController::create');
    $routes->post('income/store', 'IncomeController::store');
    $routes->get('income/edit/(:num)', 'IncomeController::edit/$1');
    $routes->post('income/update/(:num)', 'IncomeController::update/$1');
    $routes->get('income/delete/(:num)', 'IncomeController::delete/$1');

    // Expense Route
    $routes->get('expense', 'ExpenseController::index');
    $routes->get('expense/show/(:num)', 'ExpenseController::show/$1'); 
    $routes->get('expense/add', 'ExpenseController::create');
    $routes->post('expense/store', 'ExpenseController::store');
    $routes->get('expense/edit/(:num)', 'ExpenseController::edit/$1');
    $routes->post('expense/update/(:num)', 'ExpenseController::update/$1');
    $routes->get('expense/delete/(:num)', 'ExpenseController::delete/$1');
});

// Auth Route
$routes->get('login', 'AuthController::index');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// $routes->get('checktime', 'AuthController::checktime');
$routes->get('/', 'Home::index');

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
