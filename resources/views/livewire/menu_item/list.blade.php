<?php

use Livewire\Volt\Component;
use App\Models\MenuItem;
use Livewire\Attributes\On;

new class extends Component {
    public $item_name;
    public $price;
    public $menu_items;

    public function mount() {
        $this->menu_items = MenuItem::all();
    }

    #[On('menu-items-updated')]
    public function getMenuItems() {
        $this->menu_items = MenuItem::all();
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
                    <th scope="col">Item Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
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
