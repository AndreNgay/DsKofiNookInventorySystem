<div>
    <div class="row">
        <div class="col-md-10">
            <h2>Order List</h2>
        </div>
        <div class="col-md-2">
            <a href="{{ route('order-create') }}" class="btn btn-primary w-100" wire:navigate>Add Order</a>
        </div>
    </div>
    <hr />

    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Taken By</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($orders as $order)
                    <tr>

                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->total_price  }}</td>
                        <td>{{ $order->created_at  }}</td>
                        <td>
                            @foreach($users as $user)
                            @if($user->id == $order->user_id)
                            {{ $user->name }}
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
