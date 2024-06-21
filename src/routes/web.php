<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MogitateController;
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

Route::get('/products', [MogitateController::class, 'products'])->name('products');

Route::get('/products/register', [MogitateController::class, 'register']);

Route::post('/products/register', [MogitateController::class, 'upload']);

Route::get('/products/search', [MogitateController::class, 'search']);

Route::get('/products/{product_id}', [MogitateController::class, 'detail']);

Route::post('/products/{product_id}/update', [MogitateController::class, 'update']);

Route::delete('/products/{product_id}/delete', [MogitateController::class, 'delete']);
