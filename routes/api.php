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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/example','ExampleController@index');
Route::get("/example/{id}", 'ExampleController@show');
Route::post('/example', 'ExampleController@store');
Route::delete('/example/{id}', 'ExampleController@delete');