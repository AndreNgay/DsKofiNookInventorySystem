<?php

use Livewire\Volt\Component;

new class extends Component {
    public $hidden = 'hidden';
    public function toggleForm() {
        if($this->hidden == 'hidden') {
            $this->hidden = '';
        }
        else {
            $this->hidden = 'hidden';
        }
    }
}; ?>

<div>
    <div wire:click="toggleForm" class="mb-2">
        <livewire:components.buttons.add title="Add Ingredient" />
    </div>

    <div class="card mb-3" {{ $hidden }}>
        <div class="card-body">
            <div class="row">
                <div class="mb-3">
                    <label class="form-label">Inventory Item</label>
                    <input type="text" class="form-control" wire:model="item_name">
                    @error('item_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="number" class="form-control" wire:model="price">
                        @error('price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Amount</label>
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
