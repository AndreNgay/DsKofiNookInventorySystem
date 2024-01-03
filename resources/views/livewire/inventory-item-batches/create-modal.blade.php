<div wire:ignore.self class="modal fade" id="createInventoryItemBatch" tabindex="-1"
    aria-labelledby="createInventoryItemBatch" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createInventoryItemBatch">Add New Batch</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Stock</label>
                    <input type="number" class="form-control" wire:model="stock">
                    @error('stock')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Unit</label>
                    <select class="form-select" wire:model="unit_id">
                        <option value="">Select Unit</option>
                        @foreach($unit_selections as $unit_selection)
                        <option value="{{ $unit_selection->id }}">{{ $unit_selection->unit_name }}</option>
                        @endforeach
                    </select>
                    @error('unit_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Expiration Date</label>
                    <input type="date" class="form-control" wire:model="expiration_date">
                    @error('expiration_date')
                    <p class="text-danger">{{ $message }}</p>
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
