<div>
    <div class="row">
        <div class="col-md-10">
            <h2>Add an Ingredient for {{ $menu_item->item_name }}</h2>
        </div>
    </div>
    <hr />
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-body">
                        <!-- Your form content here -->
                        <div class="mb-3">
                            <label class="form-label">Inventory Item</label>
                            <select class="form-select" wire:model="inventory_item_id"
                                wire:change="inventoryItemChanged">
                                <option value="" selected>Select</option>
                                @foreach ($inventory_items as $inventory_item)
                                <option value="{{ $inventory_item->id }}">{{ $inventory_item->item_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Unit</label>
                            <select class="form-select" wire:model="unit_id">
                                <option value="" selected>Select</option>
                                @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control" wire:model="amount">
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
        </div>
    </div>
</div>