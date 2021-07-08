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

// Route::get('/', function () {
//     return view('welcome');
// });

// sample
Route::get('/', function () {
    return view('home');
})->name('home')->middleware('auth');;

// Route::get('/home', function () {
//     return view('sample');
// })->name('home');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::resource('users', 'UsersController');

Route::namespace('Auth')->group(function () {
    Route::get('/login','LoginController@show_login_form')->name('login');
    Route::post('/login','LoginController@process_login')->name('login');
    // Route::get('/register','LoginController@show_signup_form')->name('register');
    // Route::post('/register','LoginController@process_signup');
    Route::post('/logout','LoginController@logout')->name('logout');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
