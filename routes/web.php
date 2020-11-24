<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/aboutus',function(){
    return view('pages.aboutus');
})->name('aboutus');

Auth::routes();

// Route::get('/home/{user}', 'HomeController@index')->name('home');
Route::get('/admin/home', 'HomeController@adminHome')->name('home')->middleware('is_admin');
Route::get('/admin/profileview/{user}', 'HomeController@adminprofile')->name('profileview')->middleware('is_admin');
Route::get('/admin/profile/{user}', 'HomeController@editprofile')->name('profile')->middleware('is_admin');
Route::get('/admin/advertisments', 'HOmeController@all_advert')->name('all_advert')->middleware('is_admin');
Route::get('/admin/adlistapi', 'HomeController@advertApi')->name('listapi');

// listing for
Route::get('/listings/adlistapi','ListingController@userFetchList')->name('fecth');
Route::get('/listings','ListingController@index')->name('listings');
Route::get('/listingsextra/{id}','ListingController@indexs')->name('listingsext');
Route::get('/listings/{user}/create', 'ListingController@create')->name('listings.create');
// Route::get('/listings/{user}/edit', 'ListingController@edit_list')->name('listings.edit');
Route::get('/listings/{id}/edit',['middleware' => 'auth','uses' => 'ListingController@edit_list'])->name('listings.edit');
Route::delete('/listings/{id}/delete',['middleware' => 'auth','uses' => 'ListingController@destroy'])->name('listings.delete');
Route::post('/listingimage/delete', 'ListingController@destroyimg')->name('delete');
Route::patch('/listings/store/{id}/update', 'ListingController@store_edit')->name('listings.store_edit');
Route::post('/listings/store', 'ListingController@store')->name('listings.store');
Route::post('/listings/storeimage', 'ListingController@storeImage');
Route::post('/listings/approved','ListingController@approve_ad')->name('listings.approved')->middleware('is_admin');;
Route::post('/listings/filtered', 'ListingController@filter')->name('listings.filter');

Route::post('/listings/payment',['middleware' => 'auth','uses' => 'ListingController@payment'])->name('listings.payment');
Route::patch('/listings/{id}/paymentupdate',['middleware' => 'auth','uses' => 'ListingController@payment_edit'])->name('listings.paymentupdate');

Route::post('/imageapi','ListingController@imageApi')->name('listings.image');


Route::get('notification/{nid}/{uid}', 'NotificationController@ReadNotification')->name("get.notification");
Route::get('delete/notification/{nid}/', 'NotificationController@DeleteNotification')->name("delete.notification");

Route::get('inbox/message/', 'NotificationController@mailbox')->name("view.messages");
Route::get('inbox/message/read/{nid}', 'NotificationController@readInbox')->name("delete.notification");

Route::post('contactus/{id}', 'NotificationController@contactuser')->name("contact.user");


Route::get('/profile/{user}',[
    // 'middleware' => 'auth',
    'uses' => 'ProfileController@index'
])->name('profile.show');

Route::get('/profile/{id}/alladverts',[
    'middleware' => 'auth',
    'uses' => 'ProfileController@adverts'
])->name('useradverts.show');

Route::get('/profile/{user}/edit',[
    'middleware' => 'auth',
    'uses' => 'ProfileController@edit'])->name('profile.edit');
Route::post('/profile/storeimage', 'ProfileController@storeImages');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

// // api for login

// Route::post('/api/register', 'HomeController@register');
// Route::post('/api/login', 'HomeController@login');
// Route::get('/api/user', 'HomeController@getCurrentUser');
// Route::post('/api/update', 'HomeController@update');
// Route::get('/api/logout', 'HomeController@logout');



// Route::get('testimonials/{testimonials}/edit', [
//     'middleware' => 'auth',
//     'uses' => 'TestimonialController@edit'
// ]);
