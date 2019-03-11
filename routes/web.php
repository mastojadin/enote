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
    });
});

Auth::routes();

Route::fallback(function () {
    return redirect()->route('dashboard');
});
