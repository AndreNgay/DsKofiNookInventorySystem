<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editInventoryItem" tabindex="-1" aria-labelledby="editInventoryItemLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editInventoryItemLabel">Edit Inventory Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                    <small id="emailHelp" class="form-text text-muted">
                        Set the threshold for stock levels. You'll receive a reminder when the stock quantity
                        approaches this level, prompting you to restock.
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Expiration Reminder</label>
                    <input type="number" class="form-control" wire:model="expiration_reminder">
                    @error('expiration_reminder')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <small id="emailHelp" class="form-text text-muted">
                        Specify the number of days before an item's expiration. Receive a reminder in advance to
                        manage expiring items effectively.
                    </small>
                </div>


                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select" wire:model="category_id" wire:change="categoryChanged">
                        @foreach ($category_selections as $category_selection)
                        <option value="{{ $category_selection->id }}">{{ $category_selection->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Unit</label>
                    <select class="form-select" wire:model="unit_id">
                        @foreach ($unit_selections as $unit_selection)
                        <option value="{{ $unit_selection->id }}">{{ $unit_selection->unit_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="update">Update</button>
            </div>
        </div>
    </div>
</div>
