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
Route::post('/login', 'User_loginController@login_user');
Route::delete('/example/{id}', 'ExampleController@delete');


Route::post('/get_users_already', 'register_userController@get_users');
Route::post('/save_user','register_userController@save_user');
Route::post('/check_user','userCheckerController@check');
Route::get('/get_register_form', 'RegisterConfigController@chargeInfo');