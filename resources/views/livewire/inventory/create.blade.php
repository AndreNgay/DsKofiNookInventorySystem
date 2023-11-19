<?php

use Livewire\Volt\Component;
use App\Models\Category;
use App\Models\Measurement;

new class extends Component {
    public $categories;
    public $measurements;

    public function mount() {
        $this->categories = Category::all();
        $this->measurements = Measurement::all();
    }

    
}; ?>

<div>
    <livewire:components.modals.modal-trigger-button title="Add Inventory Item" target="#createInventoryItemModal" />
    <livewire:inventory.create-inventory-item-modal :categories="$categories" :measurements="$measurements" />
</div>
