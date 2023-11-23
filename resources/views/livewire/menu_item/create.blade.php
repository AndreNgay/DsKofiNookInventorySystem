<?php

use Livewire\Volt\Component;
use App\Models\MenuItem;    

new class extends Component {
    public $hidden = 'hidden';
    public $item_name;
    public $price;

    public function mount() {
    }
    
    public function toggleForm() {
        if($this->hidden == 'hidden') {
            $this->hidden = '';
        }
        else {
            $this->hidden = 'hidden';
        }
    }

    public function store() {
        MenuItem::create([
            'item_name' => $this->item_name,
            'price' => $this->price,
        ]);
        $this->item_name = '';
        $this->price = '';
        $this->dispatch('menu-items-updated');
    }
    
}; ?>

<div>
    <div wire:click="toggleForm" class="mb-2">
        <livewire:components.buttons.add title="Add Menu Item" />
    </div>

    <div class="card mb-3" {{ $hidden }}>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" class="form-control" wire:model="item_name">
                        @error('item_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control" wire:model="price">
                        @error('price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    <div wire:click="toggleForm">
                        <livewire:components.buttons.close />
                    </div>
                    <div wire:click="store">
                        <livewire:components.buttons.submit />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>