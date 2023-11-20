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


}; ?>

<div>
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

                    <td>{{ $inventory_item->total_stock }}
                        @foreach ($units as $unit)
                            @if($unit->id == $inventory_item->unit_id)
                                {{ $unit->unit_symbol }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <div class="d-flex">
                            <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal"
                                data-bs-target="#updateItemModal{{ $inventory_item->id }}">
                                <span class="bi bi-pencil-square"></span> Update
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
