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

Route::resource('providers', 'ProviderController')->names('providers')->except([
    'edit', 'update', 'destroy'
]);

Route::resource('purchases', 'PurchaseController')->names('purchases')->except([
    'edit', 'update', 'destroy'
]);

Route::resource('sales', 'SaleController')->names('sales');


Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');

Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');

//ruta para imprimir el reporte de ventas
Route::get('sales/print/{sale}', 'SaleController@print')->name('sales.print');

Route::resource('business', 'BusinessController')->names('business')->only([
    'index', 'update'
]);

Route::resource('printers', 'PrinterController')->names('printers')->only([
    'index', 'update'
]);

    Route::get('users/upload/{purchase}', 'PurchaseController@upload')->name('upload.purchases');

    Route::get('change_status/products/{product}', 'ProductController@change_status');
    Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status');
    Route::get('change_status/sales/{sale}', 'SaleController@change_status');


    Route::get('sales/reports_day', 'ReportController@reports_day')->name('reports.day');
    Route::get('sales/reports_date', 'ReportController@reports_date')->name('reports.date');


    Route::post('sales/report.results','ReportController@report_results')->name('report.results');




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






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
