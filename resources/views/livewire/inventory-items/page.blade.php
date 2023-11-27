<div>
    @include('livewire.inventory-items.create-modal')
    <div class="row">
        <div class="col-md-10">
            <h2>Inventory Items</h2>
        </div>
        <div class="col-md-2">
            <!-- Button trigger modal -->
            
            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                data-bs-target="#createInventoryItem" wire:click="createInventoryItemClicked">
                Create Inventory Item
            </button>
        </div>
    </div>
    <hr />

    <div class="row mb-2">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search by item name" aria-label="Search"
                id="query" name="query">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Total Stock</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($inventory_items as $inventory_item)
                    <tr>

                        <th scope="row">{{ $inventory_item->id }}</th>
                        <td>{{ $inventory_item->item_name }}</td>
                        <td>
                            @foreach ($categories as $category)
                            @if($category->id == $inventory_item->category_id)
                            {{ $category->category_name }}
                            @endif
                            @endforeach
                        </td>
                        <td>
                            {{ $inventory_item->total_stock }}
                            @foreach ($units as $unit)
                            @if($unit->id == $inventory_item->unit_id)
                            {{ $unit->unit_name }}
                            @endif
                            @endforeach
                        </td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-primary ms-2" type="button"
                                    href="{{ route('batches-inventory-item', ['id' => $inventory_item->id]) }}"
                                    wire:navigate>
                                    <span class="bi bi-eye-fill"> View Batches</span>
                                </button>

                                <button class="btn btn-primary ms-2" type="button" href="/item-history" wire:navigate>
                                    <span class="bi bi-clock-fill"> View History</span>
                                </button>

                                <button class="btn btn-primary ms-2" type="button"><span class="bi bi-pencil-square">
                                        Edit</span></button>
                                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                    data-bs-target="">
                                    <span class="bi bi-trash-fill"> Delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
</div>
