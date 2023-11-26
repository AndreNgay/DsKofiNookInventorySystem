<?php

namespace App\Livewire\InventoryItems;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Category;
use App\Models\Unit;
use App\Models\InventoryItem;

#[Layout('layouts.app')] 

class Create extends Component
{
    public $categories;
    public $units;
    public $category_id;
    public $unit_id;

    public $item_name;
    public $stock_reminder;
    public $days_before_expiration_reminder;

    public function mount()
    {
        $this->categories = Category::all();
        $this->units = Unit::all();
    }


    public function render()
    {
        return view('livewire.inventory-items.create');
    }
    public function categoryChanged() {
        $this->units = Unit::where('category_id', $this->category_id)->get();
        $this->unit_id = $this->units->first()->id;
    }

    public function store() {
        $this->validate([
            'item_name' => 'required|string|max:255',
            'stock_reminder' => 'nullable|integer|min:0',
            'days_before_expiration_reminder' => 'nullable|integer|min:0',
        ]);

        InventoryItem::create([
            'item_name' => $this->item_name,
            'category_id' => $this->category_id,
            'unit_id' => $this->unit_id,
            'stock_reminder' => $this->stock_reminder,
            'days_before_expiration_reminder' => $this->days_before_expiration_reminder,
        ]);

        $this->item_name = '';
        $this->stock_reminder = null;
        $this->days_before_expiration_reminder = null;
        $this->category_id = Category::first()->id;
        $this->category_id = Category::first()->id;
        $this->unit_id = Unit::first()->id;
        $this->dispatch('inventory-item-updated');
    }
}
