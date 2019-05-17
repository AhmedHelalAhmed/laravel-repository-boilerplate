<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    /* Hello World */
    $api->get('hello', function() {
        return 'Hello World!';
    });

    $api->group(['namespace' => 'App\Http\Controllers\API'], function() use ($api) {
        /* Global Routes */
        $api->get('/', 'APIController@info');
        $api->get('info', 'APIController@info');

        /* User */
        $api->group(['prefix' => 'user'], function() use ($api) {
            /* GET */
            $api->get('/', 'UserController@index');
            $api->get('index', 'UserController@index');
            $api->get('trashed/with', 'UserController@withTrashed');
            $api->get('trashed/with/index', 'UserController@withTrashed');
            $api->get('trashed/only', 'UserController@onlyTrashed');
            $api->get('trashed/only/index', 'UserController@onlyTrashed');

            /* POST */
            $api->post('create', 'UserController@create');

            /* PUT */
            $api->put('update/{id}', 'UserController@update');

            /* DELETE */
            $api->delete('delete/{id}', 'UserController@delete');
        });

    }); // End namespace group.

}); // End $api->version.
