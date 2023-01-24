<?php

/** @var Router $router */

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

use Laravel\Lumen\Routing\Router;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->group(['prefix' => 'authors', 'namespace' => 'API\V1'], function () use ($router) {
        $router->get('/', 'AuthorController@index');
        $router->post('/', 'AuthorController@store');
        $router->get('/{author}', 'AuthorController@show');
        $router->put('/{author}', 'AuthorController@update');
        $router->patch('/{author}', 'AuthorController@update');
        $router->delete('/{author}', 'AuthorController@destroy');
    });
});
