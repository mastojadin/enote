<?php

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

Route::get('/', function(){
    return redirect()->route('login');
});

// Registration Routes...
Route::get('register', function(){
    return redirect()->route('login');
})->name('register');
Route::post('register', function(){
    return redirect()->route('login');
});

// Password Reset Routes...
Route::get('password/reset', function(){
    return redirect()->route('login');
});
Route::post('password/email', function(){
    return redirect()->route('login');
});
Route::get('password/reset/{token}', function(){
    return redirect()->route('login');
});
Route::post('password/reset', function(){
    return redirect()->route('login');
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('dashboard', 'Dashboard@dashboard')->name('dashboard');

    Route::group(['middleware' => 'adminCheck', 'prefix' => 'users'], function () {
        Route::get('/', 'Users@index')->name('users');
        Route::get('/newuser', 'Users@newUser')->name('newUser');
        Route::get('/edituser/{edit_userID}', 'Users@editUser')->name('editUser');
        Route::post('/saveuser', 'Users@saveUser')->name('saveUser');
        Route::post('/updateuser', 'Users@updateUser')->name('updateUser');
        Route::post('/deleteuser', 'Users@deleteUser')->name('deleteUser');
    });

    Route::group(['middleware' => 'superCheck', 'prefix' => 'roles'], function () {
        Route::get('/', 'Roles@index')->name('roles');
        Route::post('/saveRole', 'Roles@saveRole')->name('saveRole');
        Route::post('/updateRole', 'Roles@updateRole')->name('updateRole');
        Route::post('/deleteRole', 'Roles@deleteRole')->name('deleteRole');
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'Profile@myprofile')->name('myprofile');
        Route::post('updateprofile', 'Profile@update')->name('updateAboutUser');
        Route::get('/view/{view_userID}', 'Profile@viewme')->name('viewProfile');
    });
});

Auth::routes();

Route::fallback(function () {
    return redirect()->route('dashboard');
});
