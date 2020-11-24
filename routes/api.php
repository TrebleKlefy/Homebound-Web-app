<?php
use Illuminate\Http\Request;

// estas rutas se pueden acceder sin proveer de un token válido.
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
// estas rutas requiren de un token válido para poder accederse.
// Route::group(['middleware' => 'auth.jwt'], function () {
// Route::get('/logout', 'AuthController@logout');
// });
Route::post('/logout', 'AuthController@logout');
Route::get('/apiprofile/{user}',['uses' => 'APIController@user']);
Route::post('/apilistings/filtered', 'APIController@filter');
Route::get('/apilistings','APIController@index');
Route::get('/apinotification/{user}',['uses' => 'APIController@userNotification']);
