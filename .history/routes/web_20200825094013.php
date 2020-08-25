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

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/user', 'UserController')->middleware('can:administrator');
Route::post('password', 'UserController@changePassword')->name('change.password');

Route::resource('artwork', 'ArtworkController');
Route::get('notification', 'NotificationController@index')->name('view.notification');
Route::get('download/{artwork}', 'ArtworkController@download')->name('download.attachment');

// TODO: Components route start here
Route::prefix('Components')->name('component.')->middleware('can:administrator')->group(function() {

    Route::resource('subject', 'Component\SubjectController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('country', 'Component\CountryController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('category', 'Component\CategoryController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('style', 'Component\StyleController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('medium', 'Component\MediumController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('material', 'Component\materialController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('size', 'Component\sizeController', ['except' => 'create', 'show', 'edit', 'update']);

});

Route::get('notify', function() {
    $user = \App\User::find(1);

    $details = [
        'header' => Auth::user()->name,
        'body' => 'test notification',
    ];

    $user->notify(new \App\Notifications\notify($details));
});

Route::get('/clear', function(){

	auth()->user()->unreadNotifications->markAsRead();

	return redirect()->back();

})->name('markAllAsRead');

Route::get('/markAsRead/{id}', function($id){

	auth()->user()->unreadNotifications->where('id',$id)->markAsRead();

	return redirect()->back();

})->name('markRead');

Route::get('/notif', function() {
    auth()->user()->unreadNotifications;
});
