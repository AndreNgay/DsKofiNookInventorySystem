<?php

use Livewire\Volt\Component;
use App\Models\InventoryItem;
use App\Models\Category;
use App\Models\Measurement;

new class extends Component {
    public $item_name;
    public $category_id;
    public $measurement_id;
    
    public $categories;
    public $measurements;

    public function mount() {
        $this->categories = Category::all();
        $this->measurements = Measurement::all();
        $this->category_id = Category::first()->id;
        $this->measurement_id = Measurement::first()->id;
    }

    public function store() {
        InventoryItem::create([
            'item_name' => $this->item_name,
            'category_id' => $this->category_id,
            'measurement_id' => $this->measurement_id,
        ]);

        $this->item_name = '';
        $this->category_id = Category::first()->id;
        $this->measurement_id = Measurement::first()->id;
        $this->dispatch('inventory-item-updated'); 
    }


}; ?>

<div>
    <div class="modal fade" id="createInventoryItemModal" tabindex="-1" aria-labelledby="createInventoryItemModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-wheat">
                    <h1 class="modal-title fs-5" id="createInventoryItemModalLabel">Add Inventory Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" class="form-control" wire:model="item_name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-control" wire:model="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Measurement</label>
                        <select class="form-control" wire:model="measurement_id">
                            @foreach ($measurements as $measurement)
                            <option value="{{ $measurement->id }}">{{ $measurement->measurement_name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form wire:submit="store">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
