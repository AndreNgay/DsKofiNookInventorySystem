<div>
    @include('livewire.menu-items.create-modal')
    @include('livewire.menu-items.edit-modal')
    @include('livewire.menu-items.delete-modal')
    <div class="row">
        <div class="col-md-10">
            <h2>Menu Items</h2>
        </div>
        <div class="col-md-2">
            <button wire:click="create" type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#createMenuItem">
                Add New Menu Item
            </button>

        </div>
    </div>
    <hr />
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

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
                                <button class="btn btn-primary ms-2" type="button"
                                    href="{{ route('ingredients-menu-item', ['id' => $menu_item->id]) }}" wire:navigate>
                                    <i class="fas fa-solid fa-mortar-pestle">
                                    </i>
                                    View Ingredients
                                </button>

                                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                    data-bs-target="#editMenuItem" wire:click="edit({{ $menu_item->id }})">
                                    <span class="bi bi-pencil-square">
                                        Edit</span>
                                </button>

                                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                    data-bs-target="#deleteMenuItem" wire:click="delete({{ $menu_item->id }})">
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
