<?php

session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

$config = require_once __DIR__ . '/config/config.php';

define('BASE_PATH', $config['app']['base_path']);

require_once __DIR__ . '/app/core/Router.php';
require_once __DIR__ . '/app/core/Database.php';
require_once __DIR__ . '/app/core/Auth.php';

// Initialize Router
$router = new Router();

$router->add('GET', '/login', 'LoginController@index');
$router->add('POST', '/login', 'LoginController@login');
$router->add('GET', '/logout', 'LoginController@logout');

$router->add('GET', '/clients/autocomplete', 'ClientController@autocomplete');
$router->add('GET', '/clients/create', 'ClientController@create');
$router->add('POST', '/clients/store', 'ClientController@store');
$router->add('GET', '/clients/{id}', 'ClientController@show');
$router->add('GET', '/clients/{id}/edit', 'ClientController@edit');
$router->add('POST', '/clients/{id}/update', 'ClientController@update');
$router->add('GET', '/clients/{id}/delete', 'ClientController@check');
$router->add('POST', '/clients/{id}/delete', 'ClientController@delete');
$router->add('GET', '/clients', 'ClientController@index');

$router->add('GET', '/projects/create', 'ProjectController@create');
$router->add('POST', '/projects/store', 'ProjectController@store');
$router->add('GET', '/projects/{id}', 'ProjectController@show');
$router->add('GET', '/projects/{id}/edit', 'ProjectController@edit');
$router->add('POST', '/projects/{id}/update', 'ProjectController@update');
$router->add('GET', '/projects/{id}/delete', 'ProjectController@check');
$router->add('POST', '/projects/{id}/delete', 'ProjectController@delete');
$router->add('GET', '/projects', 'ProjectController@index');

$router->add('GET', '/', 'DashboardController@index');

// Redirect to login
if (!Auth::check()) {
    header('Location: ' . BASE_PATH . '/login');
    exit;
}

// Get the current URI without domain, trim slashes and send to router
$requestUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

$router->dispatch('/' . $requestUri);

?>