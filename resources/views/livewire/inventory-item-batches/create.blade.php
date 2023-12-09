<div>
    <div class="row">
        <div class="col-md-10">
            <h2>Create a New Batch for {{ $inventory_item->item_name }}</h2>
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