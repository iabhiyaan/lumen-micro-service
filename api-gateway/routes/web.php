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


$router->group(['prefix' => 'api/v1', 'middleware' => ['auth:api'], 'namespace' => 'API\V1'], function () use ($router) {
    $router->get('/users/me', 'UserController@me');
});

$router->group(['prefix' => 'api/v1', 'middleware' => ['client.credentials'], 'namespace' => 'API\V1'], function () use ($router) {
    $router->group(['prefix' => 'books',], function () use ($router) {
        $router->get('/', 'BookController@index');
        $router->post('/', 'BookController@store');
        $router->get('/{book}', 'BookController@show');
        $router->put('/{book}', 'BookController@update');
        $router->patch('/{book}', 'BookController@update');
        $router->delete('/{book}', 'BookController@destroy');
    });

    $router->group(['prefix' => 'authors',], function () use ($router) {
        $router->get('/', 'AuthorController@index');
        $router->post('/', 'AuthorController@store');
        $router->get('/{author}', 'AuthorController@show');
        $router->put('/{author}', 'AuthorController@update');
        $router->patch('/{author}', 'AuthorController@update');
        $router->delete('/{author}', 'AuthorController@destroy');
    });

    $router->group(['prefix' => 'users',], function () use ($router) {
        $router->get('/', 'UserController@index');
        $router->post('/', 'UserController@store');
        $router->get('/{user}', 'UserController@show');
        $router->put('/{user}', 'UserController@update');
        $router->patch('/{user}', 'UserController@update');
        $router->delete('/{user}', 'UserController@destroy');
    });
});
