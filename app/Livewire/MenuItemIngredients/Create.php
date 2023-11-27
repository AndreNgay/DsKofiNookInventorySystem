<?php

namespace App\Livewire\MenuItemIngredients;

use App\Models\Category;
use App\Models\InventoryItem;
use App\Models\MenuItemIngredient;
use App\Models\Unit;
use Livewire\Component;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Route;



class Create extends Component
{
    public $inventory_item_id;
    public $inventory_items;
    public $unit_id;
    public $units;
    public $amount;


    public $menu_item_id;
    public $menu_item;

    
    public $categories;
    public $category_id;
    
    
    public function mount(){
        $this->menu_item_id = Route::current()->parameter('id');
        $this->menu_item = MenuItem::find($this->menu_item_id);


        $this->inventory_items = InventoryItem::all();
        
        $this->units = Unit::all();
        $this->categories = Category::all();
    }

    public function inventoryItemChanged(){
        $inventory_item = InventoryItem::find($this->inventory_item_id);
        $this->units = Unit::where('category_id', $inventory_item->category_id)->get();
    }

    public function store() {
        $inventory_item = InventoryItem::find($this->inventory_item_id);

        MenuItemIngredient::create([
            'inventory_item_id' => $this->inventory_item_id,
            'menu_item_id' => $this->menu_item_id,
            'category_id' => $inventory_item->category_id,
            'unit_id' => $this->unit_id,
            'amount' => $this->amount,
        ]);
    }
    public function render()
    {
        return view('livewire.menu-item-ingredients.create');
    }
}
