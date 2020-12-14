<?php
use Illuminate\Http\Request;

//post
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::post('/logout', 'AuthController@logout');
Route::post('/apilistings/filtered', 'APIController@filter');
Route::post('/contactus/{id}', 'NotificationController@contactuser')->name("contact.user");

//get
Route::get('/apiprofile/{user}',['uses' => 'APIController@user']);
Route::get('/apiadcount/{user}',['uses' => 'APIController@reviewcounter']);
Route::get('/apilistings','APIController@index');
Route::get('/apinotification/{user}',['uses' => 'APIController@userNotification']);
Route::get('/apiread/{nid}/{uid}','APIController@readInbox');


