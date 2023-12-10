<div wire:ignore.self class="modal fade" id="editInventoryItemBatch" tabindex="-1"
    aria-labelledby="editInventoryItemBatch" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editInventoryItemBatch">Add Ingredient</h1>
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
                    <label class="form-label">Expiration Date</label>
                    <input type="date" class="form-control" wire:model="expiration_date">
                    @error('expiration_date')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Unit</label>
                    <select class="form-select" wire:model="unit_id" disabled>
                        @foreach($unit_selections as $unit_selection)
                        @if($unit_selection->id == $unit_id)
                        <option selected value="{{ $unit_selection->id }}">{{ $unit_selection->unit_name }}</option>
                        @else
                        <option value="{{ $unit_selection->id }}">{{ $unit_selection->unit_name }}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('unit_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click="update">Update</button>
            </div>
        </div>
    </div>
</div>
