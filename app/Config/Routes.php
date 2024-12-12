<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');  // Página principal
$routes->get('/login', 'UsuariosController::login');  // Ruta para el formulario de inicio de sesión
$routes->post('/login/autenticar', 'UsuariosController::autenticar');  // Ruta para procesar el inicio de sesión

$routes->get('/register', 'UsuariosController::index');  // Ruta para el formulario de registro
$routes->post('/register/registrar', 'UsuariosController::registrar');  // Ruta para procesar el registro

$routes->get('/logout', 'UsuariosController::logout');  // Ruta para cerrar sesión

$routes->get('/home', 'UsuariosController::home');
$routes->get('/logout', 'UsuariosController::logout');


$routes->get('/catalogo', 'MobiliarioController::index');
$routes->post('/catalogo/agregarCarrito/(:num)', 'MobiliarioController::agregarCarrito/$1');

$routes->get('/carrito', 'MobiliarioController::verCarrito');
$routes->post('/catalogo/eliminarDelCarrito/(:num)', 'MobiliarioController::eliminarDelCarrito/$1');
$routes->get('catalogo/generarQR', 'MobiliarioController::generarQR');

