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

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/user', 'UserController')->middleware('can:administrator');
Route::get('users/trash', 'UserController@trash')->name('users.trash');
Route::patch('user/restore/{id}', 'UserController@restore')->name('user.restore');

Route::post('password', 'UserController@changePassword')->name('change.password')->middleware('password.confirm');

Route::resource('artwork', 'ArtworkController');
Route::get('download/{artwork}', 'ArtworkController@download')->name('download.attachment');

// TODO: Components route start here
Route::prefix('Components')->name('component.')->middleware('can:administrator')->group(function() {

    Route::resource('subject', 'Component\SubjectController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('city', 'Component\CityController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('category', 'Component\CategoryController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('style', 'Component\StyleController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('medium', 'Component\MediumController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('material', 'Component\materialController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('size', 'Component\sizeController', ['except' => 'create', 'show', 'edit', 'update']);

});

Route::get('notification', 'NotificationController@index')->name('view.notification');
Route::get('/clear', function(){

	auth()->user()->unreadNotifications->markAsRead();

	return redirect()->back();

})->name('markAllAsRead');

Route::get('/markAsRead/{notification}', function($id){

    // $notification = auth()->user()->unreadNotifications->where('id',$id)->first();

    $notification = auth()->user()->notifications->where('id', $id)->first();

    if ($notification->read_at == '') {
        $notification->markAsRead();
        return redirect()->route('artwork.show', $notification->data['subject']);
    }

    return redirect()->route('artwork.show', $notification->data['subject']);

})->name('markRead');

Route::get('/markNotifRead/{id}', function($id){

    $notification = auth()->user()->unreadNotifications->where('id',$id)->markAsRead();

    return redirect()->back();

})->name('single.markRead');
