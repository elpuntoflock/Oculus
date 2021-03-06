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

Route::get('prueba', function () {
    return "Hola desde web.php";

});

Route::get('nombre/{nombre}', function (string $nombre) {
    return "Hola desde web.php mi nombre " . $nombre ;

});


Route::get('user/{id}', function ($id) {
    //
})->where('id', '[0-9]+');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/master', 'MasterController@index');

Route::get('/calendario', function () {
    return view('layouts.calendario');
});

Route::resource('evento', 'EventoController');

Route::resource('contacto', 'ContactoController');

/* Route::post('contacto/create', function () {
    // Validate the request...

    return back()->withInput();
}
);  */