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

// About to Expire Items
Route::get('/about-to-expire-items', App\Livewire\AboutToExpireItems\Page::class)
    ->middleware('auth')
    ->name('about-to-expire-items');

// Need Restocking Items
Route::get('/need-restocking-items', App\Livewire\NeedRestockingItems\Page::class)
    ->middleware('auth')
    ->name('need-restocking-items');

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

// Inventory Item Histories
Route::get('/histories-inventory-item', App\Livewire\InventoryItemHistories\Page::class)
    ->middleware('auth')
    ->name('histories-inventory-item');

// Orders
Route::get('/orders', App\Livewire\Orders\Page::class)
    ->middleware('auth')
    ->name('orders');


// Order Details
Route::get('/order-details', App\Livewire\OrderDetails\Page::class)
    ->middleware('auth')
    ->name('order-details');

// Menu Items
Route::get('/menu-items', App\Livewire\MenuItems\Page::class)
    ->middleware('auth')
    ->name('menu-items');


// Menu Item Ingredients
Route::get('/ingredients-menu-item/{id}', App\Livewire\MenuItemIngredients\Page::class)
    ->middleware('auth')
    ->name('ingredients-menu-item');

// Units
Route::get('/units', App\Livewire\Units\Page::class)
    ->middleware('auth')
    ->name('units');

// Notifications
Route::get('/notifications', App\Livewire\Notifications\Page::class)
    ->middleware('auth')
    ->name('notifications');

// Accounts
Route::get('/accounts', App\Livewire\Accounts\Page::class)
    ->middleware('auth')
    ->name('accounts');

// Feedback
Route::get('/feedback', App\Livewire\Feedback\Page::class)
    ->middleware('auth')
    ->name('feedback');




    
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