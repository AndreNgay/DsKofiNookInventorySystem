<div>
    <div class="row">
        <div class="col-md-10">
            <h2>{{ $menu_item->item_name }} Ingredients</h2>
        </div>
        <div class="col-md-2">
            <a href="{{ route('menu-item-ingredient-create', ['id' => $menu_item->id]) }}" class="btn btn-primary w-100" wire:navigate>Add Ingredient</a>
        </div>
    </div>
    <hr />

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
