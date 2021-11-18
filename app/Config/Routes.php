<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', function () {
	$data = [
		'title' => "Blog - Home"
	];
	echo view('view_admin');
});
$routes->get('/register', 'templating::register');
$routes->post('/saveRegister', 'templating::saveRegister');
$routes->get('/suratmasuk', 'AdminSuratMasukController::index');

$routes->get('/about', function () {
	$data = [
		'title' => "Tentang Kami"
	];
	echo view('layouts/header', $data);
	echo view('layouts/navbar');
	echo view('v_about');
	echo view('layouts/footer');
});
$routes->get('/admin', 'templating::index');
$routes->get('/admin/suratmasuk', 'AdminSuratMasukController::index');
$routes->get('/admin/suratmasuk/create', 'AdminSuratMasukController::create');
$routes->get('/admin/suratmasuk/edit/(:segment)', 'AdminSuratMasukController::edit/$1');
$routes->get('/admin/suratmasuk/delete/(:segment)', 'AdminSuratMasukController::delete/$1');
$routes->post('/admin/suratmasuk/update/(:segment)', 'AdminSuratMasukController::update/$1');
$routes->post('/admin/suratmasuk/store', 'AdminSuratMasukController::store');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
