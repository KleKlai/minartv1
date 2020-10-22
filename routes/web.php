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
    if(Auth::check()){
        return redirect('home');
    }
    return view('welcome');
});

Auth::routes();
// For Email Verification
Auth::routes(['verify' => true]);

// TODO: General Section ( For All User )
Route::get('/home', 'HomeController@index')->name('home');
Route::get('change/password', 'Utility\PasswordController@index')->name('password.index')->middleware('password.confirm');
Route::post('change/password', 'Utility\PasswordController@changePassword')->name('password.change');
Route::resource('artwork', 'ArtworkController');
Route::get('download/{artwork}', 'ArtworkController@download')->name('download.attachment');

Route::namespace('Utility')->prefix('notification')->name('notification.')->middleware('auth')->group(function() {

    Route::get('/view', 'NotificationController@index')->name('view');
    Route::get('/clear', 'NotificationController@markAllAsRead')->name('clear');
    Route::get('/read/{notification}', 'NotificationController@markAsRead')->name('view.read');
    Route::get('/single/read/{id}', 'NotificationController@singleMarkAsRead')->name('read');

});

// TODO: Restricted Area ( For Administrator )
Route::namespace('Admin')->middleware(['can:administrator'])->group(function () {
    Route::resource('user', 'UserController');
});

Route::get('users/trash', 'UserController@trash')->name('users.trash');
Route::patch('user/restore/{id}', 'UserController@restore')->name('user.restore');
Route::patch('artwork/status/{artwork}', 'ArtworkController@changeStatus')->name('status.change');

Route::namespace('Component\Artwork')->prefix('Component')->name('component.')->middleware('can:administrator')->group(function() {

    Route::resource('subject', 'SubjectController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('category', 'CategoryController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('style', 'StyleController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('medium', 'MediumController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('material', 'materialController', ['except' => 'create', 'show', 'edit', 'update']);
    Route::resource('size', 'sizeController', ['except' => 'create', 'show', 'edit', 'update']);

});

// TODO: Frequently Ask Question
Route::prefix('help')->namespace('Utility')->group( function() {
    Route::resource('faq', 'FAQController');
});

Route::get('export', 'Export\Artwork@export')->name('export.art');
Route::get('export/user', 'Export\Artwork@exportUser')->name('export.user');

// Route::get('addWatermark', function()
// {
//     $img = Image::make(public_path('sample_resource/main.jpg'));

//     /* insert watermark at bottom-right corner with 10px offset */
//     $img->insert(public_path('images/watermark.png'), 'bottom-right', 20, 20);

//     $img->save(public_path('sample_resource/main-new.jpg'));

//     dd('saved image successfully.');
// });
