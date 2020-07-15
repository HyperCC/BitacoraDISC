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
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard');
});

// Rutas para el login.
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin',
], function () {

// mostrar todos los usuarios en DB.
    Route::get('users-index/', 'UserController@index')->name('users-index');

// Ruta para la creacion de un usuario.
    Route::get('users-create/', 'UserController@create')->name('users-create');
//Ruta para almacenar un usuario.
    Route::post('users-store/', 'UserController@store')->name('users-store');

//editar un usuario.
    Route::get('users-edit/{user}', 'UserController@edit')->name('users-edit');
//editar los datos de un usuario en la DB.
    Route::patch('users-update/{user}', 'UserController@update')->name('users-update');

// mostrar un usuario en especifico
    Route::get('users-show/{user}', 'UserController@show')->name('users-show');

// eliminar o marcar como no activo. deberia ser verbo 'delete' en vez de patch, pero no se elimina realmente de la DB.
    Route::patch('users-remover/{user}', 'UserController@remover')->name('users-remover');
});

Route::get('/home', 'HomeController@index')->name('home');

