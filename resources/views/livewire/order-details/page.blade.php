<div>
    @include('livewire.order-details-create.create-modal')
    @include('livewire.order-details-create.edit-modal')
    @include('livewire.order-details-create.delete-modal')

    <div class="row">
        <div class="col-md-10">
            <h2>Details for Order #{{ $order->id }}</h2>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <hr />
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Menu Item</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($order_details as $order_detail)
                    <tr>
                        <th scope="row">
                            @foreach ($menu_items as $menu_item)
                            @if ($menu_item->id == $order_detail->menu_item_id)
                            {{ $menu_item->item_name }}
                            @endif
                            @endforeach
                        <td>{{ $order_detail->quantity }}</td>
                        <td>{{ $order_detail->price }}</td>

                        <td>
                            <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                data-bs-target="#editOrderDetail" wire:click="edit({{ $order_detail->id }})">
                                <span class="bi bi-pencil-square">
                                    Edit</span>
                            </button>

                            <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                data-bs-target="#deleteOrderDetail" wire:click="delete({{ $order_detail->id }})">
                                <span class="bi bi-trash-fill"> Delete</span>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr />
        

    </div>
</div>
