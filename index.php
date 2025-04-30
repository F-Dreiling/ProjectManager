<?php

session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

$config = require_once __DIR__ . '/config/config.php';

require_once __DIR__ . '/app/core/Router.php';
require_once __DIR__ . '/app/core/Database.php';
require_once __DIR__ . '/app/core/Auth.php';

define('BASE_PATH', $config['app']['base_path']);

// Initialize Router
$router = new Router();

$router->add('GET', '/login', 'LoginController@index');
$router->add('POST', '/login', 'LoginController@login');
$router->add('GET', '/logout', 'LoginController@logout');

$router->add('GET', '/clients', 'ClientController@index');
$router->add('GET', '/clients/create', 'ClientController@create');
$router->add('POST', '/clients/store', 'ClientController@store');
$router->add('GET', '/clients/{id}', 'ClientController@show');
$router->add('GET', '/clients/{id}/edit', 'ClientController@edit');
$router->add('POST', '/clients/{id}/update', 'ClientController@update');
$router->add('GET', '/clients/{id}/delete', 'ClientController@delete');
$router->add('POST', '/clients/{id}/delete', 'ClientController@delete');

$router->add('GET', '/projects', 'ProjectController@index');
$router->add('GET', '/projects/create', 'ProjectController@create');
$router->add('POST', '/projects/store', 'ProjectController@store');
$router->add('GET', '/projects/{id}', 'ProjectController@show');
$router->add('GET', '/projects/{id}/edit', 'ProjectController@edit');
$router->add('POST', '/projects/{id}/update', 'ProjectController@update');
$router->add('GET', '/projects/{id}/delete', 'ProjectController@delete');
$router->add('POST', '/projects/{id}/delete', 'ProjectController@delete');

$router->add('GET', '/', 'DashboardController@index');

// Define public routes
$publicRoutes = [
    'login',
];

// Get the current URI
$requestUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Remove BASE_PATH
if (strpos($requestUri, ltrim(BASE_PATH, '/')) === 0) {
    $requestUri = substr($requestUri, strlen(ltrim(BASE_PATH, '/')));
    $requestUri = ltrim($requestUri, '/');
}

// Redirect to login
if (!in_array($requestUri, $publicRoutes) && !Auth::check()) {
    header('Location: ' . BASE_PATH . '/login');
    exit;
}

// Otherwise Dispatch
$router->dispatch('/' . $requestUri);

//echo '<br>Request URI: ' . htmlspecialchars($requestUri);

?>