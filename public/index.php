<?php

define('ROOTDIR', realpath(dirname(__DIR__)).DIRECTORY_SEPARATOR);
define('APPNAME', 'Lovely Date');

// Turn off error display in production
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ROOTDIR.'vendor/autoload.php';
require_once ROOTDIR.'db.php';


session_start();


if (! ob_get_level()) {
    ob_start();
}


use \App\Router;

Router::get('/', '\App\Controllers\Controller@home');
Router::get('/home', '\App\Controllers\Controller@home');

Router::get('/admin', '\App\Controllers\Controller@admin');

Router::error('\App\Controllers\Controller@notFound');

// Login
Router::get('/login', '\App\Controllers\LoginController@showLogin');
Router::post('/login', '\App\Controllers\LoginController@login');
Router::get('/logout', '\App\Controllers\LoginController@logout');

// Register
Router::get('/register', '\App\Controllers\RegisterController@showRegister');
Router::post('/register', '\App\Controllers\RegisterController@register');


// User
Router::get('/admin/edit/(:num)', '\App\Controllers\UsersController@edit');
Router::post('/admin/update/(:num)', '\App\Controllers\UsersController@update');
Router::post('/admin/delete/(:num)',
'\App\Controllers\UsersController@delete');
Router::post('/search',
'\App\Controllers\UsersController@search');


Router::dispatch();

ob_end_flush();

