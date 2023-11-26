<?php

namespace App\Livewire\InventoryItemBatches;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Category;
use App\Models\Unit;
use App\Models\InventoryItemBatch;
use App\Models\InventoryItem;
use Illuminate\Support\Facades\Route;

#[Layout('layouts.app')]
class Page extends Component
{
    public $inventory_item_id;
    public $inventory_item;
    public $inventory_item_batches;
    public $categories;
    public $units;
    public $current_date;

    public function mount()
    {
        // Retrieve the 'id' parameter from the current route
        $this->inventory_item_id = Route::current()->parameter('id');
    
        $this->inventory_item = InventoryItem::find($this->inventory_item_id);
        $this->inventory_item_batches = InventoryItemBatch::where('inventory_item_id', $this->inventory_item_id)->get();
        $this->categories = Category::all();
        $this->units = Unit::all();
        $this->current_date = now()->timezone('Asia/Manila');
    }
    

    public function render()
    {
        return view('livewire.inventory-item-batches.page');
    }
}
