<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createUnit" tabindex="-1" aria-labelledby="createUnitLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createUnitLabel">Create Unit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Unit Name</label>
                    <input type="text" class="form-control" wire:model="unit_name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select" wire:model="category_id" wire:change="categoryChanged">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
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
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="store">Store</button>
            </div>
        </div>
    </div>
</div>
