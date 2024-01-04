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
use App\Http\Controllers\ChartController;
use App\Http\Controllers\PdfGenerator;
use App\Http\Controllers\PdfGeneratorController;

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

Route::get('/api/earnings', [ChartController::class, 'getEarningsData']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Home
Route::get('/home', App\Livewire\Home\Page::class)
    ->middleware('auth', 'profile-made')
    ->name('home');

// Edit Profie
Route::get('/edit-profile', App\Livewire\EditProfile\Page::class)
    ->middleware('auth')
    ->name('edit-profile');
Route::get('/edit-profile-personal-info', App\Livewire\EditProfile\PersonalInfo::class)
    ->middleware('auth')
    ->name('edit-profile-personal-info');
Route::get('/edit-profile-contact', App\Livewire\EditProfile\Contact::class)
    ->middleware('auth')
    ->name('edit-profile-contact');


// Batches about to expire
Route::get('/batches-about-to-expire', App\Livewire\BatchesAboutToExpire\Page::class)
    ->middleware('auth', 'profile-made')
    ->name('batches-about-to-expire');

// Need Restocking Items
Route::get('/need-restocking-items', App\Livewire\NeedRestockingItems\Page::class)
    ->middleware('auth', 'profile-made')
    ->name('need-restocking-items');

// Inventory Items
Route::get('/inventory-items', App\Livewire\InventoryItems\Page::class)
    ->middleware('auth', 'profile-made')
    ->name('inventory-items');

// Inventory Item Batches
Route::get('/batches-inventory-item/{id}', App\Livewire\InventoryItemBatches\Page::class)
    ->middleware('auth', 'profile-made')
    ->name('batches-inventory-item');

// Inventory Item Histories
Route::get('/histories-inventory-item', App\Livewire\InventoryItemHistories\Page::class)
    ->middleware('auth', 'profile-made')
    ->name('histories-inventory-item');

// Orders
Route::get('/orders', App\Livewire\Orders\Page::class)
    ->middleware('auth', 'profile-made')
    ->name('orders');

// Order Details Create
Route::get('/order-details-create', App\Livewire\OrderDetailsCreate\Page::class)
    ->middleware('auth', 'profile-made')
    ->name('order-details-create');

// Order Details
Route::get('details-order/{id}', App\Livewire\OrderDetails\Page::class)
    ->middleware('auth', 'profile-made')
    ->name('details-order');

// Menu Items
Route::get('/menu-items', App\Livewire\MenuItems\Page::class)
    ->middleware('auth', 'profile-made')
    ->name('menu-items');


// Menu Item Ingredients
Route::get('/ingredients-menu-item/{id}', App\Livewire\MenuItemIngredients\Page::class)
    ->middleware('auth', 'profile-made')
    ->name('ingredients-menu-item');

// Units
Route::get('/units', App\Livewire\Units\Page::class)
    ->middleware('auth', 'profile-made')
    ->name('units');

// Notifications
Route::get('/notifications', App\Livewire\Notifications\Page::class)
    ->middleware('auth', 'profile-made')
    ->name('notifications');

// Accounts
Route::get('/accounts', App\Livewire\Accounts\Page::class)
    ->middleware('auth', 'profile-made')
    ->name('accounts');


// Reports
Route::get('/reports', App\Livewire\Reports\Page::class)
    ->middleware('auth', 'profile-made')
    ->name('reports');

// PDF Generator
Route::get('/pdfgenerator', App\Livewire\PdfGenerator\Page::class)
    ->middleware('auth', 'profile-made')
    ->name('pdfgenerator');