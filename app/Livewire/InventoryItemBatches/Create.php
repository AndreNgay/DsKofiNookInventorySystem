<?php

namespace App\Livewire\InventoryItemBatches;

use Livewire\Component;
use App\Models\InventoryItem;
use Illuminate\Support\Facades\Route;
use App\Models\InventoryItemBatch;


class Create extends Component
{
    public $inventory_item_id;
    public $inventory_item;
    public $stock;
    public $expiration_date;
    public $category_id;
    public $unit_id;

    public function mount() {
        $this->inventory_item_id = Route::current()->parameter('id');
        $this->inventory_item = InventoryItem::find($this->inventory_item_id);
    }
    public function render()
    {  
        return view('livewire.inventory-item-batches.create');
    }

    public function store() {
        InventoryItemBatch::create([
            'stock' => $this->stock,
            'expiration_date' => $this->expiration_date,
            'inventory_item_id' => $this->inventory_item->id,
            'category_id' => InventoryItem::find($this->inventory_item->id)->category_id,
            'unit_id' => InventoryItem::find($this->inventory_item->id)->unit_id,
        ]);

        InventoryItem::find($this->inventory_item->id)->update([
            'total_stock' => InventoryItem::find($this->inventory_item->id)->total_stock + $this->stock,
        ]);
        $this->dispatch('inventory-item-batch-updated');
    }

    
}
