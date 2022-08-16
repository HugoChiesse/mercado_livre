<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MercadoLivreController;
use App\Http\Controllers\Admin\ProductController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/return_notifications', function () {
    return "Retorno da mensagem no site do Mercado Livre";
})->name('reponse');

Route::get('/connection_api', 'App\Http\Controllers\Admin\MercadoLivreController@index')
    ->name('connection_api');

Route::get('/access_token', 'App\Http\Controllers\Admin\MercadoLivreController@access_token')
    ->name('access_token');

Route::get('/response', 'App\Http\Controllers\Admin\MercadoLivreController@response')
    ->name('response');

Route::get('/create_user_test', 'App\Http\Controllers\Admin\MercadoLivreController@create_user_test')
    ->name('create_user_test');


Route::middleware('auth')->prefix('admin')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('admin');
    });
    
    Route::resource('products', ProductController::class);
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products/sync_data_product/{product_id}', 'sync_data_product')->name('products.sync_data_product');
    });
    
    Route::controller(AttributeController::class)->group(function () {
        Route::get('/products/{product_id}/attributes', 'index')->name('attributes.index');
        Route::post('/products/{product_id}/attributes/store', 'store')->name('attributes.store');
        Route::delete('/products/{product_id}/attributes/destroy', 'destroy')->name('attributes.destroy');
    });
    
    Route::controller(MercadoLivreController::class)->group(function () {
        Route::get('/sync_data_product/{product_id}', 'sync_data_product')->name('sync_data_product');
    });

});

require __DIR__ . '/auth.php';

Auth::routes();

