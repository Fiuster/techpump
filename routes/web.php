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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home',       [App\Http\Controllers\PagesController::class, 'index'])->name('home');
// Route::get('/',           [App\Http\Controllers\PagesController::class, 'index'])->name('index');
// Route::get('/articulos',  [App\Http\Controllers\PagesController::class, 'art1'])->name('articulos1');



Route::get('/', [App\Infrastructure\Controllers\CatalogController::class, 'list'])->name('/');
Route::get('/home', [App\Infrastructure\Controllers\CatalogController::class, 'list'])->name('home');
Route::get('/catalog', [App\Infrastructure\Controllers\CatalogController::class, 'list'])->name('catalog');


Route::group(['middleware'=>['auth']], function () {

    Route::post('/cart/addItem/{productId}',    [App\Infrastructure\Controllers\CartController::class, 'addItem'])      ->name('addItem');
    Route::post('/cart/removeItem/{productId}', [App\Infrastructure\Controllers\CartController::class, 'removeItem'])   ->name('removeItem');
    Route::get('/cart/detail',                  [App\Infrastructure\Controllers\CartController::class, 'detail'])       ->name('detail');
    Route::post('/checkout',                    [App\Infrastructure\Controllers\CartController::class, 'checkout'])     ->name('checkout');
});

Route::post('/order', [App\Infrastructure\Controllers\OrderController::class, 'completeOrder']);
