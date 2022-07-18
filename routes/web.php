<?php

use App\Http\Controllers\CategoryController;
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


Route::resource('categories', 'CategoryController')->names('categories');

Route::resource('clients', 'ClientController')->names('clients');

Route::resource('products', 'ProductController')->names('products');

Route::resource('providers', 'ProviderController')->names('providers');

Route::resource('purchases', 'PurchaseController')->names('purchases');

Route::resource('sales', 'SaleController')->names('sales');

Route::get('/pruebas', function () {
    return view('pruebas');
});

Route::get('home', function(){
    return 'home'; //ruta temporal
})->name('home');

Route::get('home', function(){
    return 'home'; //ruta temporal
})->name('reports.day');


Route::get('home', function(){
    return 'home'; //ruta temporal
})->name('reports.date');


Route::get('productos', 'ProductController@index')->name('products.index');





