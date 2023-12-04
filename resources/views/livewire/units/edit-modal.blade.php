<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editUnit" tabindex="-1" aria-labelledby="editUnitLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editUnitLabel">Edit Unit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Unit Name</label>
                    <input type="text" class="form-control" wire:model="unit_name">
                    @error('unit_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select" wire:change="categoryChanged" wire:model="category_id">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Unit Conversion</label>
                    <input type="text" class="form-control" wire:model="unit_conversion">
                    <small id="emailHelp" class="form-text text-muted">
                        Enter the conversion value of this unit in relation to:
                        @if($category_id == 1)
                        Milliliters
                        @elseif($category_id == 2)
                        Grams
                        @elseif($category_id == 3)
                        Pieces
                        @endif
                        . 1 {{$unit_name}} = How much
                        @if($category_id == 1)
                        Milliliters
                        @elseif($category_id == 2)
                        Grams
                        @elseif($category_id == 3)
                        Pieces
                        @endif
                        ?
                    </small>
                    @error('unit_conversion')
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
