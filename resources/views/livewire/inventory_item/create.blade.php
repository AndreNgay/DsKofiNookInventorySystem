<?php

use Livewire\Volt\Component;
use App\Models\InventoryItem;
use App\Models\Category;
use App\Models\Unit;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

new class extends Component {
    public $item_name;
    public $category_id;
    public $unit_id;
    public $stock_reminder;
    public $days_before_expiration_reminder;
    public $hidden = 'hidden';
    public $categories;
    public $units;
    public $errorMessage = '';

    public function mount() {
        $this->categories = Category::all();
        $this->units = Unit::all();
        $this->category_id = Category::first()->id;
        $this->unit_id = Unit::where('category_id', $this->category_id)->first()->id;
    }

    public function store() {
        $this->validate([
            'item_name' => 'required|string|max:255',
            'stock_reminder' => 'nullable|integer|min:0',
            'days_before_expiration_reminder' => 'nullable|integer|min:0',
        ]);

        InventoryItem::create([
            'item_name' => $this->item_name,
            'category_id' => $this->category_id,
            'unit_id' => $this->unit_id,
            'stock_reminder' => $this->stock_reminder,
            'days_before_expiration_reminder' => $this->days_before_expiration_reminder,
        ]);

        $this->item_name = '';
        $this->stock_reminder = null;
        $this->days_before_expiration_reminder = null;
        $this->category_id = Category::first()->id;
        $this->category_id = Category::first()->id;
        $this->unit_id = Unit::first()->id;
        $this->dispatch('inventory-item-updated');
    }

    public function categoryChanged() {
        $this->units = Unit::where('category_id', $this->category_id)->get();
        $this->unit_id = $this->units->first()->id;
    }

    public function toggleForm() {
        $this->item_name = '';
        $this->stock_reminder = null;
        $this->days_before_expiration_reminder = null;

        if ($this->hidden == '') {
            $this->hidden = 'hidden';
        } else {
            $this->hidden = '';
        }
    }
};
?>

<div>
    <div wire:click="toggleForm" class="mb-2">
        <livewire:components.buttons.add title="Add Inventory Item" />
    </div>

    <div class="card mb-3" {{ $hidden }}>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Item Name</label>
                <input type="text" class="form-control" wire:model="item_name">
                @error('item_name') 
                <p class="text-danger">{{ $message }}</p> 
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Stock Reminder</label>
                <input type="number" class="form-control" wire:model="stock_reminder">
                @error('stock_reminder') 
                <p class="text-danger">{{ $message }}</p> 
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Days Before Expiration Reminder</label>
                <input type="number" class="form-control" wire:model="days_before_expiration_reminder">
                @error('days_before_expiration_reminder') 
                <p class="text-danger">{{ $message }}</p> 
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select" wire:model="category_id" wire:change="categoryChanged">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Unit</label>
                        <select class="form-select" wire:model="unit_id">
                            @foreach ($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                            @endforeach
                        </select>
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
