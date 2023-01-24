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

use App\Http\Controllers\API\V1\BookController;
use Laravel\Lumen\Routing\Router;

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->group(['prefix' => 'books', 'namespace' => 'API\V1'], function () use ($router) {
        $router->get('/', 'BookController@index');
        $router->post('/', 'BookController@store');
        $router->get('/{book}', 'BookController@show');
        $router->put('/{book}', 'BookController@update');
        $router->patch('/{book}', 'BookController@update');
        $router->delete('/{book}', 'BookController@destroy');
    });
});
