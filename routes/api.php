<?php

use Illuminate\Http\Request;
// use App\Http\Controllers\Api\UserController;

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

Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');
Route::get('user/{id}', 'Api\UserController@show');

Route::get('event', 'Api\EventController@index');
Route::get('event/{id}', 'Api\EventController@show');

Route::get('campus', 'Api\CampusController@index');
Route::get('campus/{id}', 'Api\CampusController@show');

Route::get('main-category', 'Api\MainCategoryController@index');
Route::get('main-category/{id}', 'Api\MainCategoryController@show');

Route::get('category', 'Api\CategoryController@index');
Route::get('category/{id}', 'Api\CategoryController@show');

// Route::group(['middleware' => 'auth:api'], function () {
    
// });