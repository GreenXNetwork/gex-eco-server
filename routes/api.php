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

Route::middleware('api')->post('/login', 'Auth\LoginController@login');
Route::middleware('api')->post('/refresh', 'Auth\LoginController@refresh');
Route::middleware('api')->post('/register', 'Auth\RegisterController@register');
Route::middleware('auth:api')->post('/logout', 'Auth\LoginController@logout');

/* BEGIN - USER PROFILE */
Route::resources([
    'profile' => 'API\UserProfileController',
]);
/* END - USER PROFILE */