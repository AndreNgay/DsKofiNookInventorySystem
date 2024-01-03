<div>
    <div class="row">
        <div class="col-md-10">
            <h2>Reports Page</h2>
        </div>
        <div class="col-md-2">
            <!-- Button trigger modal -->
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
                        <th scope="col">Category</th>
                        <th scope="col">Total Stock</th>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $inventory_items->links() }}

</div>

