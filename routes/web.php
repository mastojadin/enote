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

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', 'Dashboard@dashboard')->name('dashboard');

        Route::prefix('users')->group(function() {
            Route::get('/', 'Users@index')->name('users');
            Route::get('/newUser', 'Users@newUser')->name('newUser');
            Route::get('/editUser/{edit_userID}', 'Users@editUser')->name('editUser');
            Route::post('/saveUser', 'Users@saveUser')->name('saveUser');
            Route::post('/updateUser', 'Users@updateUser')->name('updateUSer');
            Route::post('/deleteUser', 'Users@deleteUser')->name('deleteUser');
        });

        Route::prefix('routes')->group(function() {
            Route::get('/', 'Roles@index')->name('roles');
            Route::post('/saveRole', 'Roles@saveRole')->name('saveRole');
            Route::post('/updateRole', 'Roles@updateRole')->name('updateRole');
            Route::post('/deleteRole', 'Roles@deleteRole')->name('deleteRole');
        });
    });
});

Auth::routes();

Route::fallback(function () {
    return redirect()->route('dashboard');
});
