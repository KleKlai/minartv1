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
});

Auth::routes();
// For Email Verification
// Auth::routes(['verify' => true]);

// TODO: General Section ( For All User )
Route::get('/home', 'HomeController@index')->name('home');
Route::get('change/password', 'PasswordController@index')->name('password.index')->middleware('password.confirm');
Route::post('change/password', 'PasswordController@changePassword')->name('password.change');
Route::resource('artwork', 'ArtworkController');
Route::get('download/{artwork}', 'ArtworkController@download')->name('download.attachment');

Route::prefix('notification')->name('notification.')->middleware('auth')->group(function() {

    Route::get('/view', 'NotificationController@index')->name('view');
    Route::get('/clear', 'NotificationController@markAllAsRead')->name('clear');
    Route::get('/read/{notification}', 'NotificationController@markAsRead')->name('view.read');
    Route::get('/single/read/{id}', 'NotificationController@singleMarkAsRead')->name('read');

});

// TODO: Restricted Area ( For Administrator )
Route::middleware(['can:administrator', 'password.confirm'])->group(function () {
    Route::resource('/user', 'UserController');
});

Route::get('users/trash', 'UserController@trash')->name('users.trash');
Route::patch('user/restore/{id}', 'UserController@restore')->name('user.restore');
Route::patch('artwork/status/{artwork}', 'ArtworkController@changeStatus')->name('status.change');

Route::namespace('Component')->prefix('Component')->name('component.')->middleware('can:administrator')->group(function() {

    Route::resource('subject', 'SubjectController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('city', 'CityController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('category', 'CategoryController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('style', 'StyleController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('medium', 'MediumController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('material', 'materialController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('size', 'sizeController', ['except' => 'create', 'show', 'edit', 'update']);

});
