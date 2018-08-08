<?php

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('admin.users.index');
})->name('admin.index');
Route::view('/users', 'admin.pages.users')->name('admin.users.index');
Route::view('/login', 'admin.pages.login')->name('admin.users.login');
