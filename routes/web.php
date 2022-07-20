<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ItemController;
use App\Http\Controllers\User\CartController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth:users'])->name('dashboard');

Route::controller(ItemController::class)->group(function () {
    Route::get('/', 'index')->name('items.index');
    Route::get('/show/{item}', 'show')->name('items.show');
});

Route::prefix('carts')-> 
    middleware('auth:users')->group(function(){ 
        Route::get('/', [CartController::class, 'index'])->name('cart.index'); 
        Route::post('add', [CartController::class, 'add'])->name('cart.add'); 
        Route::post('update/{item}', [CartController::class, 'update'])->name('cart.update');
        Route::post('delete/{item}', [CartController::class, 'delete'])->name('cart.delete');
        Route::get('checkout', [CartController::class, 'checkout'])->name('cart.checkout'); 
        Route::get('success', [CartController::class, 'success'])->name('cart.success'); 
        Route::get('cancel', [CartController::class, 'cancel'])->name('cart.cancel'); 
});

require __DIR__.'/auth.php';
