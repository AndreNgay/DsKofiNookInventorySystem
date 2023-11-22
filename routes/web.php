<?php

use App\Http\Controllers\InventoryItemBatchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MenuController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('inventory', [InventoryController::class, 'index'])
    ->middleware(['auth'])
    ->name('inventory');

Route::get('/inventory-item-batch/{id}', [InventoryItemBatchController::class, 'index'])
    ->middleware('auth')
    ->name('inventory-item-batch');
    
Route::get('menu', [MenuController::class, 'index'])
    ->middleware(['auth'])
    ->name('inventory');
