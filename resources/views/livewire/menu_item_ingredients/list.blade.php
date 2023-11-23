<?php

use Livewire\Volt\Component;
use Livewire\Attributes\On; 
use App\Models\MenuItemIngredient;
use App\Models\InventoryItem;
use App\Models\Category;
use App\Models\Unit;

new class extends Component {
    public $menu_item_ingredients;
    public $inventory_items;
    public $categories;
    public $units;

    public function mount($menu_item_id) {
        $this->menu_item_ingredients = MenuItemIngredient::where('menu_item_id', $menu_item_id)->get();
        $this->inventory_items = InventoryItem::all();
        $this->categories = Category::all();
        $this->units = Unit::all();
    }
}; ?>

<div>
<div class="mb-2">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search by item name" aria-label="Search"
                id="query" name="query">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Inventory Item</th>
                    <th scope="col">Category</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                @foreach ($menu_item_ingredients as $menu_item_ingredient)
                <tr>
                    <th scope="row">{{ $menu_item_ingredient->id }}</th>
                    <td>
                        @foreach($inventory_items as $inventory_item)
                        @if($menu_item_ingredient->inventory_item_id == $inventory_item->id)
                        {{ $inventory_item->item_name }}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($categories as $category)
                        @if($menu_item_ingredient->category_id == $category->id)
                        {{ $category->category_name }}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        {{ $menu_item_ingredient->amount }}
                        @foreach($units as $unit)
                        @if($menu_item_ingredient->unit_id == $unit->id)
                        {{ $unit->unit_name }}
                        @endif
                        @endforeach
                    </td>
                    <td class="d-flex">
                        
                        <button class="btn btn-primary ms-2" type="button">
                            <span class="bi bi-pencil-square"> Edit</span>
                        </button>
                        <button type="button" class="btn btn-primary ms-2" wire:click="delete"
                            wire:confirm="Are you sure you want to delete this item?">
                            <span class="bi bi-trash-fill"> Delete</span>
                        </button>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

