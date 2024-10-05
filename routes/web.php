<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::prefix('product')->group(function () {
    Route::get('/add', [ProductController::class, 'add'])->name('product.add');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/save', [ProductController::class, 'save'])->name('product.save');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
});
