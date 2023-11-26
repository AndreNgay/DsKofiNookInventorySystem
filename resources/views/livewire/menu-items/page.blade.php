<div>
    <div class="row">
        <div class="col-md-10">
            <h2>Menu Items</h2>
        </div>
        <div class="col-md-2">
            <a href="{{ route('menu-item-create') }}" class="btn btn-primary w-100" wire:navigate>Add Menu Item</a>
        </div>
    </div>
    <hr />

    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item Price</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($menu_items as $menu_item)
                    <tr>

                        <th scope="row">{{ $menu_item->id  }}</th>
                        <td>{{ $menu_item->item_name }}</td>
                        <td>{{ $menu_item->price }}</td>

                        <td>
                            <div class="d-flex">
                                <button class="btn btn-primary ms-2" type="button" href="{{ route('ingredients-menu-item', ['id' => $menu_item->id]) }}" wire:navigate>
                                    <i class="fas fa-solid fa-mortar-pestle">
                                    </i>
                                    View Ingredients
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
