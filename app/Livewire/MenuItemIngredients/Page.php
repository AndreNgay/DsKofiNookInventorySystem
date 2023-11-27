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
    public $menu_item_id;
    public $menu_item;
    public $menu_item_ingredients;
    public $inventory_items;
    public $categories;
    public $units;
    public function mount()
    {
        $this->menu_item_id = Route::current()->parameter('id');
        $this->menu_item = MenuItem::find($this->menu_item_id);
        $this->menu_item_ingredients = MenuItemIngredient::where('menu_item_id', $this->menu_item_id)->get();
        $this->inventory_items = InventoryItem::all();
        $this->categories = Category::all();
        $this->units = Unit::all();
    }

    public function render()
    {
        return view('livewire.menu-item-ingredients.page');
    }
}
