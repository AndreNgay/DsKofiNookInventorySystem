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
    public $menu_item_ingredients, $inventory_items, $categories, $units=[], $unit_selections=[];
    
    public $menu_item_ingredient_id, $inventory_item_id, $category_id, $unit_id, $amount;

    public function mount() {
        $this->menu_item_id = Route::current()->parameter('id');
        $this->menu_item = MenuItem::find($this->menu_item_id);
        $this->inventory_items = InventoryItem::all();
        $this->categories = Category::all();
        $this->units = Unit::all();
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
        $this->inventory_item_id = '';
        $this->category_id = '';
        $this->unit_id = '';
        $this->amount = '';
    }

    public function create() {
        $this->resetInputs();
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

    public function edit($id) {
        $menu_item_ingredient = MenuItemIngredient::find($id);
        $this->menu_item_ingredient_id = $menu_item_ingredient->id;
        $this->inventory_item_id = $menu_item_ingredient->inventory_item_id;
        $this->menu_item_id = $menu_item_ingredient->menu_item_id;
        $this->category_id = $menu_item_ingredient->category_id;
        $this->unit_id = $menu_item_ingredient->unit_id;
        $this->amount = $menu_item_ingredient->amount;
    }

    public function update() {
        $this->validate([
            'inventory_item_id' => 'required',
            'unit_id' => 'required',
            'amount' => 'required|min:0',
        ]);

        $menu_item_ingredient = MenuItemIngredient::find($this->menu_item_ingredient_id);
        $menu_item_ingredient->update([
            'inventory_item_id' => $this->inventory_item_id,
            'menu_item_id' => $this->menu_item_id,
            'category_id' => $this->category_id,
            'unit_id' => $this->unit_id,
            'amount' => $this->amount,
        ]);
        $this->resetInputs();
        session()->flash('message', 'Ingredient updated successfully');
    }

    public function delete($id) {
        $menu_item_ingredient = MenuItemIngredient::find($id);
        $this->menu_item_ingredient_id = $menu_item_ingredient->id;
    }

    public function destroy() {
        MenuItemIngredient::find($this->menu_item_ingredient_id)->delete();
        $this->resetInputs();
        session()->flash('message', 'Ingredient deleted successfully');
    }
}
