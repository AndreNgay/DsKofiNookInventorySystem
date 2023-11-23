<?php

use Livewire\Volt\Component;
use Livewire\Attributes\On; 
use App\Models\MenuItemIngredient;

new class extends Component {
    public $menu_item_ingredients;

    public function mount($menu_item_id) {
        $this->menu_item_ingredients = MenuItemIngredient::where('menu_item_id', $menu_item_id)->get();
    }
}; ?>

<div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Inventory Item</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Category</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                @foreach ($menu_items as $menu_item)
                <tr wire:key="menu-item-{{ $menu_item->id }}">

                    <th scope="row">{{ $menu_item->id }}</th>
                    <td>{{ $menu_item->item_name }}</td>
                    <td>{{ $menu_item->price }}</td>
                    <td class="d-flex">
                        <button class="btn btn-primary ms-2" type="button"
                            href="{{ route('menu-item-ingredients', ['id' => $menu_item->id]) }}" wire:navigate>
                            <span class="bi bi-eye-fill"> View Ingredients</span>
                        </button>
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

