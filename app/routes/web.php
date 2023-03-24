<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use Illuminate\Support\Facades\DB;

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
    try {
        DB::connection()->getPDO();
            return $router->app->version();
        } catch (\Exception $e) {
        echo '<h1>No database selected</h1>';
    }
});
