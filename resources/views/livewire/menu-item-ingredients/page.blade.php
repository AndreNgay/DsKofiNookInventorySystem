<div>
    @include('livewire.menu-item-ingredients.create-modal')
    @include('livewire.menu-item-ingredients.edit-modal')
    @include('livewire.menu-item-ingredients.delete-modal')
    <div class="row">
        <div class="col-md-10">
            <h2>{{ $menu_item->item_name ?? 'Unknown Item' }} Ingredients</h2>
        </div>

        <div class="col-md-2">
            <button wire:click="create" type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                data-bs-target="#createMenuItemIngredient">
                Add New Ingredient
            </button>
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
                        <th scope="col">#</th>
                        <th scope="col">Inventory Item</th>
                        <th scope="col">Category</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($menu_item_ingredients as $menu_item_ingredient)
                        <tr>
                            <th scope="row">
                                {{ $menu_item_ingredient->id }}
                            </th>
                            <td>
                                @foreach($inventory_items as $inventory_item)
                                @if($inventory_item->id == $menu_item_ingredient->inventory_item_id)
                                {{ $inventory_item->item_name }}
                                @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($categories as $category)
                                @if($category->id == $menu_item_ingredient->category_id)
                                {{ $category->category_name }}
                                @endif
                                @endforeach
                            </td>
                            <td>
                                {{ $menu_item_ingredient->amount }}
                                @foreach($units as $unit)
                                @if($unit->id == $menu_item_ingredient->unit_id)
                                {{ $unit->unit_name }}
                                @endif
                                @endforeach
                            </td>

                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editMenuItemIngredient" wire:click="edit({{ $menu_item_ingredient->id }})">
                                        <span class="bi bi-pencil-square">
                                            Edit</span>
                                    </button>

                                    <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                        data-bs-target="#deleteMenuItemIngredient" wire:click="delete({{ $menu_item_ingredient->id }})">
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
    {{ $menu_item_ingredients->links() }}
</div>
