<?php

use App\Notifications\NotificateAvance;
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
    //auth()->user()->notify(new NotificateAvance('Avance', 'bita01'));
    return view('welcome');
});

// Rutas para el login.
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


// mostrar todos los usuarios en DB.
Route::get('users-index/', 'UserController@index')->name('users-index');
// mostrar los usuarios removidos en DB.
Route::get('users-deleteds/', 'UserController@deleteds')->name('users-deleteds');

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


Route::get('bitacoras-index/', 'BitacoraController@index')->name('bitacoras-index');
Route::get('bitacoras-edit/{bitacora}', 'BitacoraController@edit')->name('bitacoras-edit');
Route::get('bitacoras-create/', 'BitacoraController@create')->name('bitacoras-create');
Route::post('bitacoras-store/', 'BitacoraController@store')->name('bitacoras-store');
Route::get('bitacoras-show/{bitacora}', 'BitacoraController@show')->name('bitacoras-show');
Route::patch('bitacoras-update/{bitacora}', 'BitacoraController@update')->name('bitacoras-update');
Route::patch('bitacoras-remover/{bitacora}', 'BitacoraController@remover')->name('bitacoras-remover');
Route::get('/home', 'HomeController@index')->name('home');


// Ruta para la creacion de un AVANCE.
Route::get('avance-create/', 'AvanceController@create')->name('avances-create');
//Ruta para almacenar un AVANCE.
Route::post('avances-store/', 'AvanceController@store')->name('avances-store');

Route::get('avances-create-up', 'AvanceController@createUp')->name('avances-create-up');
// subir una evidencia para algun avance del usuario
Route::post('avances-up/', 'AvanceController@up')->name('avances-up');
// TODO: descargar evidencia de algun avance (POR TERMINAR AUN)
Route::get('avances-donwload/{evidencia}', 'AvanceController@getDownload')->name('avances-donwload');


// Rutas para EVIDENCIAS

Route::get('evidencia-create', 'EvidenciaController@create')->name('evidencia-create');
Route::post('evidencia-store', 'EvidenciaController@store')->name('evidencia-store');
Route::get('evidencia-index/{avance}', 'EvidenciaController@index')->name('evidencia-index');

//RUTAS para comentarios
Route::get('comentario-create/{avance}', 'ComentarioController@create')->name('comentario-create');
Route::post('comentario-store', 'ComentarioController@store')->name('comentario-store');
Route::get('comentario-index/{avance}', 'ComentarioController@index')->name('comentario-index');

// Rutas notificaciones
Route::get('notificaciones', 'NotificationController@index')->name('notificaciones-index');
