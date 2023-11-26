<div>
    <div class="row">
        <div class="col-md-10">
            <h2>Create Inventory Item</h2>
        </div>
    </div>
    <hr />
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
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
                            <small id="emailHelp" class="form-text text-muted">
                                Set the threshold for stock levels. You'll receive a reminder when the stock quantity
                                approaches this level, prompting you to restock.
                            </small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Days Before Expiration Reminder</label>
                            <input type="number" class="form-control" wire:model="days_before_expiration_reminder">
                            @error('days_before_expiration_reminder')
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
                                <option value="" selected>Select</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
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
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-end mt-4">
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