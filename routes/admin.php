<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

// Login
Route::get('/', 'CoreController@login')->name('core.login');
Route::post('/', 'CoreController@auth')->name('core.auth');

// Register
Route::get('/register', 'CoreController@register')->name('core.register');
Route::post('/register', 'CoreController@store')->name('core.store');

// Verify Status Email
Route::get('/active', 'EmailController@activated')->name('core.email.activated');

// Auth
// Auth::routes(['verify' => true]);

    Route::get('/super-admin', 'SuperadminController@index')->middleware('status.super.admins')->name('core.super.index');
    Route::post('/super-admin/{id}', 'SuperadminController@updateStatus')->middleware('status.super.admins')->name('core.super.ustatus');
    Route::delete('/super-admin/{id}', 'SuperadminController@deleteAdmin')->middleware('status.super.admins')->name('core.super.delete');
    Route::get('/kategori-lapangan', 'SuperadminController@category')->middleware('status.super.admins')->name('core.super.category');
    Route::post('/kategori-lapangan', 'SuperadminController@storeCategory')->middleware('status.super.admins')->name('core.super.category.store');

    // Update Profile
    Route::get('/profile', 'ProfileController@profile')->name('core.profile');
    Route::get('/profile/{id}/edit', 'ProfileController@edit')->name('core.profile.edit');
    Route::post('/profile/{id}', 'ProfileController@update')->name('core.profile.update');

    // Layout Index Admin
    Route::get('/admins', 'AdminsController@index')->middleware('status.admins')->name('core.admins.index');
    // Route::get('/profile', 'AdminsController@profile')->name('core.admins.profile');

    // Field Admin
    Route::get('/lapangan', 'Normal\FieldController@index')->middleware('status.admins')->name('core.lapangan.index');
    Route::get('/lapangan/create', 'Normal\FieldController@create')->middleware('status.admins')->name('core.lapangan.create');
    Route::post('/lapangan/create', 'Normal\FieldController@store')->middleware('status.admins')->name('core.lapangan.store');
    Route::get('/lapangan/{id}/edit', 'Normal\FieldController@edit')->middleware('status.admins')->name('core.lapangan.edit');
    Route::patch('/lapangan/{id}', 'Normal\FieldController@update')->middleware('status.admins')->name('core.lapangan.update');
    Route::delete('/lapangan/{id}', 'Normal\FieldController@delete')->middleware('status.admins')->name('core.lapangan.delete');

    // Order Admin
    Route::get('/pesanan', 'Normal\OrderController@index')->middleware('status.admins')->name('core.pesanan.index');
    Route::post('/pesanan/{id}', 'Normal\OrderController@updateStatus')->middleware('status.admins')->name('core.pesanan.status');

     // Turnament
     Route::get('/turney-admin', 'TurneyController@index')->middleware('status.admins')->name('core.super.admin.turney');
     Route::post('/turney-admin-store', 'TurneyController@store')->middleware('status.admins')->name('core.super.admin.turney.store');
 
    // Logout
    Route::post('logout', 'CoreController@logout')->name('core.logout');
// });
