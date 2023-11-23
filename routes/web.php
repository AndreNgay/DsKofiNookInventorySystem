<?php

use App\Http\Controllers\InventoryItemBatchController;
use App\Http\Controllers\InventoryItemHistoryController;
use App\Http\Controllers\MenuItemIngredientController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReportController;

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

Route::get('/menu-item-ingredients/{id}', [MenuItemIngredientController::class, 'index'])
    ->middleware('auth')
    ->name('menu-item-ingredients');
    
Route::get('menu', [MenuController::class, 'index'])
    ->middleware(['auth'])
    ->name('inventory');

Route::get('order', [OrderController::class, 'index'])
    ->middleware(['auth'])
    ->name('order');

Route::get('/reports', [ReportController::class, 'index'])
    ->middleware(['auth'])
    ->name('reports');

Route::get('/item-history', [InventoryItemHistoryController::class, 'index'])
    ->middleware(['auth'])
    ->name('item-history');