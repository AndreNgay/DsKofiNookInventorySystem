<?php

use Livewire\Volt\Component;
use App\Models\InventoryItem;
use App\Models\InventoryItemBatch;

new class extends Component {
    public $hidden = 'hidden';
    public $inventory_item_id;
    public $stock;
    public $expiration_date;
    public $category;

    public function toggleForm() {
        $this->item_name = '';
        if($this->hidden == '') {
            $this->hidden = 'hidden';
        }
        else {
            $this->hidden = '';
        }
    }

    public function store() {
        InventoryItemBatch::create([
            'stock' => $this->stock,
            'expiration_date' => $this->expiration_date,
            'inventory_item_id' => $this->inventory_item_id,
            'category_id' => InventoryItem::find($this->inventory_item_id)->category_id,
            'unit_id' => InventoryItem::find($this->inventory_item_id)->unit_id,
        ]);

        InventoryItem::find($this->inventory_item_id)->update([
            'total_stock' => InventoryItem::find($this->inventory_item_id)->total_stock + $this->stock,
        ]);
        
        $this->dispatch('inventory-item-batch-updated');
    }
}; ?>

<div>
    <div wire:click="toggleForm" class="mb-2">
        <livewire:components.buttons.add title="Add Item Batch" />
    </div>

    <div class="card mb-3" {{ $hidden }}>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Stock</label>
                        <input type="number" class="form-control" wire:model="stock">
                        @error('item_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Expiration Date</label>
                        <input type="date" class="form-control" wire:model="expiration_date">
                        @error('expiration_date')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="d-flex justify-content-end">
                <div wire:click="toggleForm">
                    <livewire:components.buttons.close />
                </div>
                <form wire:submit="store">
                    <livewire:components.buttons.submit />
                </form>
            </div>
        </div>
    </div>
</div>
