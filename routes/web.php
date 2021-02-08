<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'api/v1'], function () use ($router) {

    $router->get('/', function () use ($router) {
        return $router->app->version();
    });

    $router->get('/search', [
        'uses' => 'SearchController@filter'
    ]);

    // Users Endpoints
    $router->group(['prefix' => 'users'], function () use ($router) {

        $router->get('/', [
            'uses' => 'UserController@index'
        ]);

        $router->post('/', [
            'uses' => 'UserController@store'
        ]);

        $router->get('/{id}', [
            'uses' => 'UserController@show'
        ]);

        $router->put('/{id}', [
            'uses' => 'UserController@update'
        ]);

        $router->delete('/{id}', [
            'uses' => 'UserController@destroy'
        ]);
    });

    // Products Endpoints
    $router->group(['prefix' => 'products'], function () use ($router) {

        $router->get('/', [
            'uses' => 'ProductController@index'
        ]);

        $router->post('/', [
            'uses' => 'ProductController@store'
        ]);

        $router->get('/{id}', [
            'uses' => 'ProductController@show'
        ]);

        $router->put('/{id}', [
            'uses' => 'ProductController@update'
        ]);

        $router->delete('/{id}', [
            'uses' => 'ProductController@destroy'
        ]);

        $router->group(['prefix' => '{product}/reviews'], function () use ($router) {
            $router->get('/', [
                'uses' => 'ReviewController@index'
            ]);

            $router->post('/', [
                'uses' => 'ReviewController@store'
            ]);

            $router->get('/{id}', [
                'uses' => 'ReviewController@show'
            ]);

            $router->put('/{id}', [
                'uses' => 'ReviewController@update'
            ]);

            $router->delete('/{id}', [
                'uses' => 'ReviewController@destroy'
            ]);
        });
    });

    // Stores Endpoints
    $router->group(['prefix' => 'stores'], function () use ($router) {

        $router->get('/', [
            'uses' => 'StoreController@index'
        ]);

        $router->post('/', [
            'uses' => 'StoreController@store'
        ]);

        $router->get('/{id}', [
            'uses' => 'StoreController@show'
        ]);

        $router->put('/{id}', [
            'uses' => 'StoreController@update'
        ]);

        $router->delete('/{id}', [
            'uses' => 'StoreController@destroy'
        ]);
    });

    // Category Endpoints
    $router->group(['prefix' => 'categories'], function () use ($router) {

        $router->get('/', [
            'uses' => 'CategoryController@index'
        ]);

        $router->post('/', [
            'uses' => 'CategoryController@store'
        ]);

        $router->get('/{id}', [
            'uses' => 'CategoryController@show'
        ]);

        $router->put('/{id}', [
            'uses' => 'CategoryController@update'
        ]);

        $router->delete('/{id}', [
            'uses' => 'CategoryController@destroy'
        ]);

        $router->get('/{slug}/products', [
            'uses' => 'CategoryController@products'
        ]);
    });
});
