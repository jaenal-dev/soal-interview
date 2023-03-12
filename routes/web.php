<?php

use App\Http\Controllers\ExtraController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', function() {
        return view('dashboard', ['title' => 'Dashboard']);
    })->name('dashboard');

    Route::resource('/user', UserController::class);

    Route::get('/product-stock', function() {
        return view('product.product-stock', ['title' => 'Product Stock']);
    });

    Route::get('/swap-variable', [ExtraController::class, 'swap'])->name('swapvariable');

    Route::get('/format-rupiah', [ExtraController::class, 'formatrupiah'])->name('formatrupiah');
});

require __DIR__.'/auth.php';
