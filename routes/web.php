<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
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



Route::get('sales/reports_day', 'ReportController@reports_day')->name('reports.day');
Route::get('sales/reports_date', 'ReportController@reports_date')->name('reports.date');

Route::post('sales/report_results','ReportController@report_results')->name('report.results');


Route::resource('business', 'BusinessController')->names('business')->only([
    'index', 'update'
]);

Route::resource('printers', 'PrinterController')->names('printers')->only([
    'index', 'update'
]);


Route::resource('categories', 'CategoryController')->names('categories');

Route::resource('clients', 'ClientController')->names('clients');

Route::resource('products', 'ProductController')->names('products');

Route::resource('providers', 'ProviderController')->names('providers');

Route::resource('sales', 'SaleController')->names('sales');

Route::resource('purchases', 'PurchaseController')->names('purchases');

//Ocultar algunas rutas del controlador que no se esten empleando 
//Route::resource('purchases', 'PurchaseController')->names('purchases')->except([
//     'edit', 'update', 'destroy'
// ]);;




Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');

Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');

//ruta para imprimir el reporte de ventas
Route::get('sales/print/{sale}', 'SaleController@print')->name('sales.print');



    Route::get('users/upload/{purchase}', 'PurchaseController@upload')->name('upload.purchases');

    Route::get('change_status/products/{product}', 'ProductController@change_status')->name('change.status.products');
    Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')->name('change.status.purchases');
    Route::get('change_status/sales/{sale}', 'SaleController@change_status')->name('change.status.sales');

    Route::resource('users', 'UserController')->names('users');
    //Rol controlador
    Route::resource('roles', 'RoleController')->names('roles');



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




Route::get('get_products_by_barcode', 'ProductController@get_products_by_barcode')->name('get_products_by_barcode');

Route::get('get_products_by_id', 'ProductController@get_products_by_id')->name('get_products_by_id');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


