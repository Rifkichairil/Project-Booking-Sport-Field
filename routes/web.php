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

// Dashboard
Route::get('/', 'User\UserController@index')->name('user.index');
// Search Field
Route::get('search', 'SearchController@search')->name('search');
Route::get('active', 'User\UserController@userActivated')->name('user.email.activated');

// Login User
Route::get('/login', 'User\CoreController@login')->name('user.login');
Route::post('/login', 'User\CoreController@auth')->name('user.auth');

// Register User
Route::get('/register', 'User\CoreController@register')->name('user.register');
Route::post('/register', 'User\CoreController@store')->name('user.store');

Route::get('/detailField/{id}', 'User\FieldUserController@detailField')->name('user.detailfield');
Route::post('session', 'User\FieldUserController@session')->name('session');
//Turney
Route::get('/turney', 'TurneyController@index')->name('turney.index');

Route::middleware('status.users')->group(function () {
    // Route::get('dashboard', 'CoreController@dashboard')->name('core.dash');

    // Profile User
    Route::get('/user-profile', 'User\ProfileController@profile')->name('user.profile');
    Route::post('/', 'User\ProfileController@sendMail')->name('user.email');
    Route::get('/user-profile/{id}/edit', 'User\ProfileController@edit')->name('user.profile.edit');
    Route::post('/user-profile/{id}', 'User\ProfileController@update')->name('user.profile.update');

    // Field
    Route::post('/detailField/{id}', 'User\FieldUserController@storeField')->name('user.storeField');
    Route::get('/pemesanan', 'User\FieldUserController@bookingField')->name('user.pemesanan');

    // Payment
    Route::get('/payment/{id}', 'User\PaymentController@index')->name('user.index.payment');
    Route::post('/payment/{id}', 'User\PaymentController@store')->name('user.index.payment.store');

    // Invoice
    Route::get('/invoice/{id}', 'User\FieldUserController@invoice')->name('user.invoice');

    // Delete Order
    Route::delete('/delete-order/{id}', 'User\FieldUserController@delete')->name('delete.order');
});

// Logout User
Route::post('logout', 'User\CoreController@logout')->name('user.logout');
