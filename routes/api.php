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


Route::apiResource('users', 'UserContoller');
Route::get('userShow', 'UserController@userShow');
Route::post('userStore', 'UserController@userStore');
Route::post('login', 'UserController@login');


Route::group(['middleware' => ['auth']], function ()
{
    Route::apiResource('books', 'BooksController');
    Route::post('store', 'BookController@store');
    Route::post('users/lend', 'UsersController@lend');
});
