<?php

namespace App\Livewire\MenuItemIngredients;

use App\Models\Unit;
use App\Models\Category;
use App\Models\InventoryItem;
use App\Models\MenuItem;
use App\Models\MenuItemIngredient;
use Livewire\Component;
use Illuminate\Support\Facades\Route;


class Page extends Component
{
    public $menu_item_id, $menu_item;
    public $menu_item_ingredients, $inventory_items, $categories, $units=[], $unit_selections;
    public $inventory_item_id, $category_id, $unit_id, $amount;

    public function mount() {
        $this->menu_item_id = Route::current()->parameter('id');
        $this->menu_item = MenuItem::find($this->menu_item_id);

        $this->inventory_items = InventoryItem::all();
        $this->inventory_item_id = $this->inventory_items->first()->id;

        $this->categories = Category::all();

        $this->units = Unit::all();
        
        $this->unit_selections = Unit::where('category_id', $this->inventory_items->first()->category_id)->get();
        $this->unit_id = $this->unit_selections->first()->id;
    }

    public function render()
    {
        $this->menu_item_ingredients = MenuItemIngredient::where('menu_item_id', $this->menu_item_id)->get();
        return view('livewire.menu-item-ingredients.page');
    }

    public function inventoryItemChanged(){
        $inventory_item = InventoryItem::find($this->inventory_item_id);
        $this->unit_selections = Unit::where('category_id', $inventory_item->category_id)->get();
        $this->unit_id = $inventory_item->unit_id;
    }

    public function resetInputs() {
        $this->inventory_item_id = null;
        $this->category_id = null;
        $this->unit_id = null;
        $this->amount = null;
    }

    public function store() {
        $this->validate([
            'inventory_item_id' => 'required',
            'unit_id' => 'required',
            'amount' => 'required|min:0',
        ]);

        $inventory_item = InventoryItem::find($this->inventory_item_id);

        MenuItemIngredient::create([
            'inventory_item_id' => $this->inventory_item_id,
            'menu_item_id' => $this->menu_item_id,
            'category_id' => $inventory_item->category_id,
            'unit_id' => $this->unit_id,
            'amount' => $this->amount,
        ]);
        $this->resetInputs();
        session()->flash('message', 'Ingredient added successfully');
    }


}
