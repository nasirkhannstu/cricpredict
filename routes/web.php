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
// perfect analysis for taking your decission

Route::get('/', function () {
    return view('welcome');
});
						//  Admin Panel Route
Route::resource('admin/game', 'GameController');
Route::resource('admin/team', 'TeamController');
Route::resource('admin/stadium', 'StadiumController');
Route::resource('admin/player', 'PlayerController');
Route::resource('admin/type', 'TypeController');



Auth::routes();
Route::get('admin_login', 'AdminAuth\LoginController@showLoginForm');
Route::post('admin_login', 'AdminAuth\LoginController@login');
Route::post('admin_logout', 'AdminAuth\LoginController@logout');
Route::post('admin_password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
Route::get('admin_password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('admin_password/reset', 'AdminAuth\ResetPasswordController@reset');
Route::get('admin_password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
// Route::get('admin_register', 'AdminAuth\RegisterController@showRegistrationForm');
// Route::post('admin_register', 'AdminAuth\RegisterController@register');
Route::get('/home', 'HomeController@index');
Route::get('/admin_home', 'AdminHomeController@index');
