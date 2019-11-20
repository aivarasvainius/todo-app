<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->post('login', 'AuthController@login');

    $router->group(['prefix' => 'todos', 'middleware' => 'auth'], function () use ($router) {
        $router->get('',  ['uses' => 'TodoController@index']);
        $router->get('/{id}',  ['uses' => 'TodoController@show']);
        $router->post('',  ['uses' => 'TodoController@store']);
        $router->put('/{id}',  ['uses' => 'TodoController@update']);
        $router->delete('/{id}',  ['uses' => 'TodoController@destroy']);
    });
});
