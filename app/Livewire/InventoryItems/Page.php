<?php

namespace App\Livewire\InventoryItems;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')] 

class Page extends Component
{
    public $inventory_items;
    public $categories;
    public $units;

    public function mount() {
        $this->inventory_items = \App\Models\InventoryItem::all();
        $this->categories = \App\Models\Category::all();
        $this->units = \App\Models\Unit::all();
    }
    public function render()
    {
        return view('livewire.inventory-items.page');
    }
}
