<div>
    <div class="row">
        <div class="col-md-10">
            <h2>Create Menu Item</h2>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-4">
                        <div class="card-body">
                            <!-- Your form content here -->
                            <div class="mb-3">
                                <label class="form-label">Item Name</label>
                                <input type="text" class="form-control" wire:model="item_name">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" wire:model="price">
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
</div>
