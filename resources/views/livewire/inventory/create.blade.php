<?php

use Livewire\Volt\Component;
use App\Models\InventoryItem;
use App\Models\Category;
use App\Models\Unit;
use Livewire\Attributes\On; 

new class extends Component {
    public $item_name;
    public $category_id;
    public $unit_id; 

    public $hidden="hidden";
    
    public $categories;
    public $units; 

    
    public function mount() {
        $this->categories = Category::all();
        $this->units = Unit::all(); 
        
        $this->category_id = Category::first()->id;
        $this->unit_id = Unit::where('category_id', $this->category_id)->first()->id;
    }

    public function store() {
        InventoryItem::create([
            'item_name' => $this->item_name,
            'category_id' => $this->category_id,
            'unit_id' => $this->unit_id, 
        ]);

        $this->item_name = '';
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
        if($this->hidden == '') {
            $this->hidden = 'hidden';
        }
        else {
            $this->hidden = '';
        }
    }
};
?>

<div>
    <div wire:click="toggleForm">
        <livewire:components.buttons.primary title="Add Inventory Item" class="w-100" />
    </div>

    <br />
        <div class="card mb-3" {{ $hidden }}>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Item Name</label>
                    <input type="text" class="form-control" wire:model="item_name">
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
                        <livewire:components.buttons.secondary title="Close" class="ms-2" type="button"/>
                    </div>
                    <form wire:submit="store">
                        <livewire:components.buttons.primary title="Save" class="ms-2" type="submit" />
                    </form>
                </div>
            </div>
        </div>
  
</div>
