<?php

use Livewire\Volt\Component;
use App\Models\InventoryItem;
use App\Models\Category;
use App\Models\Unit;
use Livewire\Attributes\On; 


new class extends Component {
    public $inventory_items = [];
    public $categories = [];
    public $units = [];

    public function mount() {
        $this->getInventoryItems();
    }

    #[On('inventory-item-updated')]
    public function getInventoryItems() {
        $this->inventory_items = InventoryItem::all();
        $this->categories = Category::all();
        $this->units = Unit::all();
    }

    public function showInventoryItemBatch($inventory_item_id) {
        return view('pages.inventory-item-batch', [
            'inventory_item' => InventoryItem::where('id', $inventory_item_id)->get(),
        ]);
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

    <form id="filterForm">
        <div class="row mb-1">
            <div class="col-md-6">
                <label for="category">Category</label>
                <select id="category" class="form-control">
                    <option value="all">All</option>
                    <option value="category1">Category 1</option>
                    <option value="category2">Category 2</option>
                    <!-- Add more categories as needed -->
                </select>
            </div>
            <div class="col-md-6">
                <label for="price">Price Range</label>
                <select id="price" class="form-control">
                    <option value="all">All</option>
                    <option value="0-25">$0 - $25</option>
                    <option value="25-50">$25 - $50</option>
                    <!-- Add more price ranges as needed -->
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Apply Filter</button>
            </div>
            
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Total Stock</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($inventory_items as $inventory_item)
                <tr>

                    <th scope="row">{{ $inventory_item->id }}</th>
                    <td>{{ $inventory_item->item_name }}</td>
                    <td>
                        @foreach ($categories as $category)
                        @if($category->id == $inventory_item->category_id)
                        {{ $category->category_name }}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        {{ $inventory_item->total_stock }}
                        @foreach ($units as $unit)
                        @if($unit->id == $inventory_item->unit_id)
                        {{ $unit->unit_name }}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        <div class="d-flex">
                            <button class="btn btn-primary ms-2" type="button"
                                href="{{ route('inventory-item-batch', ['id' => $inventory_item->id]) }}" wire:navigate>
                                <span class="bi bi-eye-fill"> View Batches</span>
                            </button>

                            <button class="btn btn-primary ms-2" type="button"
                                href="/item-history" wire:navigate>
                                <span class="bi bi-clock-fill"> View History</span>
                            </button>

                            <button class="btn btn-primary ms-2" type="button"><span class="bi bi-pencil-square">
                                    Edit</span></button>
                            <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="">
                                <span class="bi bi-trash-fill"> Delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
