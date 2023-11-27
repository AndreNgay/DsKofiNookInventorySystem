<?php

use App\Http\Controllers\InventoryItemBatchController;
use App\Http\Controllers\InventoryItemHistoryController;
use App\Http\Controllers\MenuItemIngredientController;
use App\Http\Controllers\OrderController;
use App\Livewire\InventoryItemBatches\CreateInventoryItemBatch;
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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Home
Route::get('/home', App\Livewire\Home\Page::class)
    ->middleware('auth')
    ->name('home');

// Inventory Items
Route::get('/inventory-items', App\Livewire\InventoryItems\Page::class)
    ->middleware('auth')
    ->name('inventory-items');



// Inventory Item Batches
Route::get('/batches-inventory-item/{id}', App\Livewire\InventoryItemBatches\Page::class)
    ->middleware('auth')
    ->name('batches-inventory-item');

Route::get('/inventory-item-batch-create/{id}', App\Livewire\InventoryItemBatches\Create::class)
    ->middleware('auth')
    ->name('inventory-item-batch-create');

// Orders
Route::get('/orders', App\Livewire\Orders\Page::class)
    ->middleware('auth')
    ->name('orders');
Route::get('/order-create', App\Livewire\Orders\Create::class)
    ->middleware('auth')
    ->name('order-create');

// Menu Items
Route::get('/menu-items', App\Livewire\MenuItems\Page::class)
    ->middleware('auth')
    ->name('menu-items');


// Menu Item Ingredients
Route::get('/ingredients-menu-item/{id}', App\Livewire\MenuItemIngredients\Page::class)
    ->middleware('auth')
    ->name('ingredients-menu-item');
Route::get('/menu-item-ingredient-create/{id}', App\Livewire\MenuItemIngredients\Create::class)
    ->middleware('auth')
    ->name('menu-item-ingredient-create');

// Units
Route::get('/units', App\Livewire\Units\Page::class)
    ->middleware('auth')
    ->name('units');
Route::get('/unit-create', App\Livewire\Units\Create::class)
    ->middleware('auth')
    ->name('unit-create');
    
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