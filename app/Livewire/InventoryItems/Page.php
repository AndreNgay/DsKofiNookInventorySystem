<?php

namespace App\Livewire\InventoryItems;

use Livewire\Component;
use App\Models\InventoryItem;
use App\Models\Category;
use App\Models\Unit;


class Page extends Component
{
    public $inventory_items, $categories, $units;

    public $item_name, $stock_reminder, $expiration_reminder, $category_id, $unit_id;
    public $category_selections=[], $unit_selections=[];
    public function render()
    {
        $this->inventory_items = InventoryItem::all();
        $this->categories = Category::all();
        $this->units = Unit::all();
        return view('livewire.inventory-items.page');
    }

    public function createInventoryItemClicked() {
        $this->category_id = 1;
        $this->category_selections = Category::all();
        $this->unit_selections = Unit::where('category_id', $this->category_id)->get();
        $this->unit_id = $this->units->first()->id;
    }

    public function categoryChanged() {
        $this->unit_selections = Unit::where('category_id', $this->category_id)->get();
        $this->unit_id = $this->unit_selections->first()->id;
    }

    public function store() {
        InventoryItem::create([
            'item_name' => $this->item_name,
            'stock_reminder' => $this->stock_reminder,
            'expiration_reminder' => $this->expiration_reminder,
            'category_id' => $this->category_id,
            'unit_id' => $this->unit_id,
        ]);
        $this->resetInputs();
    }

    public function resetInputs() {
        $this->item_name = '';
        $this->stock_reminder = '';
        $this->expiration_reminder = '';
        $this->category_id = '';
        $this->unit_id = '';
    }
}
