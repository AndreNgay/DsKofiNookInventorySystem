<div wire:ignore.self class="modal fade" id="createMenuItemIngredient" tabindex="-1" aria-labelledby="createMenuItemIngredientLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createMenuItemIngredientLabel">Add Ingredient</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Inventory Item</label>
                    <select class="form-select" wire:model="inventory_item_id" wire:change="inventoryItemChanged">
                        <option selected>Select</option>
                        @foreach ($inventory_items as $inventory_item)
                        <option value="{{ $inventory_item->id }}">{{ $inventory_item->item_name }}</option>
                        @endforeach
                        @error('inventory_item_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Unit</label>
                    <select class="form-select" wire:model="unit_id">
                        @foreach ($unit_selections as $unit_selection)
                        <option value="{{ $unit_selection->id }}">{{ $unit_selection->unit_name }}</option>
                        @endforeach
                    </select>
                    @error('unit_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <input type="number" class="form-control" wire:model="amount">
                    @error('amount')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click="store">Store</button>
            </div>
        </div>
    </div>
</div>
