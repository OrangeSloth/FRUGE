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
Auth::routes();
//login 

// //admin
// Route::get('/home_user', 'AdminController@home');
// Route::get('/login', 'AdminController@login');
// Route::post('/loginPost', 'AdminController@loginPost');
// Route::get('/register', 'AdminController@register');
// Route::post('/registerPost', 'AdminController@registerPost');
// Route::get('/logout', 'AdminController@logout');

//user pages
// Route::get('/', 'PagesController@userIndex');
// Route::get('/about', 'PagesController@about');
// Route::get('/fruits', 'PagesController@fruits');

// // Route::get('/fruits/index', 'FruitsController@fruits');
// 
// Route::delete('/{fruit}', 'FruitsController@destroy');

//user
Route::get('/user', 'RequestController@index')->name('user.index');
Route::get('/user/create', 'RequestController@create')->name('user.index.show');
Route::post('/user', 'RequestController@store')->name('user.request.submit');
Route::get('/user/permintaan', 'RequestController@permintaan')->name('user.permintaan');
Route::get('/user/penggunaan', 'PagesController@userPenggunaan')->name('user.penggunaan');

Route::view('/dokumentasi', 'dokumentasi');
Route::post('/loginPost', 'auth\LoginController@login')->name('login.submit');
Route::post('/registerPost', 'auth\RegisterController@store');

//login
Route::get('/login', 'auth\LoginController@loginPage')->name('login');
Route::get('/', 'auth\LoginController@index')->name('home');
Route::get('/logout', 'PagesController@logout')->name('logout');


//admin pages
Route::get('/admin', 'RequestController@adminIndex')->name('admin.index')->middleware('is_admin');
Route::get('/admin/penggunaan', 'PagesController@adminPenggunaan')->name('adminPenggunaan')->middleware('is_admin');
Route::get('/admin/fruits/create', 'FruitsController@create')->name('fruitsForm')->middleware('is_admin');
Route::get('/admin/fruits', 'FruitsController@index')->name('fruitsStok')->middleware('is_admin');
Route::post('/admin/fruits', 'FruitsController@store')->middleware('is_admin');
Route::delete('/admin/fruits/{id}', 'FruitsController@destroy')->name('fruitsDelete')->middleware('is_admin');
Route::get('/admin/fruits/{fruit}/edit', 'FruitsController@edit')->name('fruitsEditForm')->middleware('is_admin');
Route::patch('/admin/fruits/{fruit}', 'FruitsController@update')->name('fruitsEditSubmit')->middleware('is_admin');
Route::patch('/admin/request/{id}', 'RequestController@update')->name('requestEditSubmit')->middleware('is_admin');
