<div>
    <div class="row">
        <div class="col-md-10">
            <h2>Batches for {{ $inventory_item->item_name }}</h2>
        </div>
        <div class="col-md-2">
            <a href="{{ route('inventory-item-batch-create', ['id' => $inventory_item->id]) }}"
                class="btn btn-primary w-100" wire:navigate>Add
                Batch</a>
        </div>
    </div>
    <hr />

    <div>
        <div class="mb-2">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search by item name" aria-label="Search"
                    id="query" name="query">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Category</th>
                        <th scope="col">Expiration Date</th>
                        <th scope="col">Expires In</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($inventory_item_batches as $inventory_item_batch)
                    <tr>
                        <th scope="row">{{ $inventory_item_batch->id }}</th>
                        <td>
                            {{ $inventory_item_batch->stock }}
                            @foreach ($units as $unit)
                            @if($unit->id == $inventory_item_batch->unit_id)
                            {{ $unit->unit_name }}
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($categories as $category)
                            @if($category->id == $inventory_item_batch->category_id)
                            {{ $category->category_name }}
                            @endif
                            @endforeach
                        </td>
                        <td>{{ $inventory_item_batch->expiration_date }}</td>

                        <td>
                            @php
                            // Convert expiration_date to DateTime object
                            $expirationDate = new DateTime($inventory_item_batch->expiration_date);

                            // Calculate the difference between expiration_date and current_date
                            $dateDiff = $current_date->diff($expirationDate);
                            echo $dateDiff->format('%R%a days');
                            @endphp
                        </td>

                        <td>
                            <div class="d-flex">
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