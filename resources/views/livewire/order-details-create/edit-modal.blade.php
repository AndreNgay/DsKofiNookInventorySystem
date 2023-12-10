<div wire:ignore.self class="modal fade" id="editOrderDetail" tabindex="-1" aria-labelledby="editOrderDetailLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editOrderDetailLabel">Add Menu Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" wire:model="menu_item_id">
                        <option selected>Select Menu Item</option>
                        @foreach ($menu_items as $menu_item)
                        <option value="{{ $menu_item->id }}">{{ $menu_item->item_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" class="form-control" wire:model="quantity">
                    @error('quantity')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click="update">Add</button>
            </div>
        </div>
    </div>
</div>
