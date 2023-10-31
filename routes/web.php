<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('items')
    ->controller(ItemController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('', 'store');

        /** not used in this scope */
        Route::get('/{item}', 'item');
        Route::get('/{item}/edit', 'edit');
        Route::put('/{item}', 'update');
        Route::delete('/{item}', 'destroy');
    });
Route::prefix('sales')
    ->controller(SaleController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('', 'store');

        /** not used in this scope */
        Route::get('/{item}', 'item');
        Route::get('/{item}/edit', 'edit');
        Route::put('/{item}', 'update');
        Route::delete('/{item}', 'destroy');
    });


Route::fallback(function () {
    return redirect('/items');
});
