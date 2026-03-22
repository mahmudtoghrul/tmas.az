<?php
/**
 * Route Definitions
 *
 * Routes are language-aware. The language prefix is handled
 * automatically by the Router middleware.
 */

use Core\Router;

// Public pages
Router::get('/', 'PageController@home');
Router::get('/about', 'PageController@about');
Router::get('/services', 'ServiceController@index');
Router::get('/services/{slug}', 'ServiceController@show');
Router::get('/portfolio', 'PortfolioController@index');
Router::get('/portfolio/{slug}', 'PortfolioController@show');
Router::get('/blog', 'BlogController@index');
Router::get('/blog/{slug}', 'BlogController@show');
Router::get('/contact', 'PageController@contact');
Router::post('/contact', 'PageController@contactSubmit');

// Admin routes
Router::group('/admin', function () {
    Router::get('/', 'Admin\\DashboardController@index');
    Router::get('/login', 'Admin\\AuthController@loginForm');
    Router::post('/login', 'Admin\\AuthController@login');
    Router::get('/logout', 'Admin\\AuthController@logout');

    Router::get('/homepage', 'Admin\\HomepageController@index');
    Router::post('/homepage', 'Admin\\HomepageController@store');

    Router::resource('/pages', 'Admin\\PageController');
    Router::resource('/services', 'Admin\\ServiceController');
    Router::resource('/portfolio', 'Admin\\PortfolioController');
    Router::resource('/blog', 'Admin\\BlogController');
    Router::resource('/settings', 'Admin\\SettingController');

    // Contacts (view & delete only)
    Router::get('/contacts', 'Admin\\ContactController@index');
    Router::get('/contacts/{id}', 'Admin\\ContactController@show');
    Router::delete('/contacts/{id}', 'Admin\\ContactController@destroy');
});
