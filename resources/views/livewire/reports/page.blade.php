<div>
    <div class="row">
        <div class="col-md-8">
            <h2>Reports Page</h2>
        </div>
        <div class="col-md-4">
            {{-- EXPORT TO PDF NA NASA HTDOCS --}}
            {{-- @php
                $tableData = [];

                foreach ($inventory_items as $inventory_item) {
                    $categoryName = '';
                    foreach ($categories as $category) {
                        if ($category->id == $inventory_item->category_id) {
                            $categoryName = $category->category_name;
                            break; // Stop the loop once a match is found
                        }
                    }

                    $unitName = '';
                    foreach ($units as $unit) {
                        if ($unit->id == $inventory_item->unit_id) {
                            $unitName = $unit->unit_name;
                            break; // Stop the loop once a match is found
                        }
                    }

                    $tableData[] = [
                        'id' => $inventory_item->id,
                        'item_name' => $inventory_item->item_name,
                        'category' => $categoryName,
                        'total_stock' => $inventory_item->total_stock . ' ' . $unitName,
                    ];
                }

                $queryParameters = http_build_query(['data' => $tableData]);
            @endphp
            <a href="http://localhost/FPDF/try.php?{{ $queryParameters }}" class="btn btn-primary w-100" target="_blank">
                Export to PDF
            </a> --}}

            {{-- Export All Items--}}

            {{-- Export Selected Items--}}

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

    {{-- SEARCH --}}
    <form wire:submit.prevent="applyFilters" class="d-flex" role="search">
        <input wire:model="query" class="form-control me-2" type="search" placeholder="Search by item name" aria-label="Search" id="query" name="query">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-search"></i>
        </button>
    </form>

    {{-- FILTERS --}}
    <div class="row mb-2 pb-1 justify-content-center">
        <div class="col-2">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $selectedRestockFilter ? ucfirst($selectedRestockFilter) : 'Restock Type' }}
                </button>
                <ul class="dropdown-menu ">
                    <li>
                        <a wire:click="updateRestockFilter('')" class="dropdown-item" href="#">
                            All Restock Types
                        </a>
                    </li>
                    <li>
                        <a wire:click="updateRestockFilter('restock asap')" class="dropdown-item" href="#">
                            Restock ASAP
                        </a>
                    </li>
                    <li>
                        <a wire:click="updateRestockFilter('almost out of stock')" class="dropdown-item" href="#">
                            Almost Out of Stock
                        </a>
                    </li>
                    <li>
                        <a wire:click="updateRestockFilter('lot of stock left')" class="dropdown-item" href="#">
                            Lot of Stock Left
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-2">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $categoryFilter ? $categories->where('id', $categoryFilter)->first()->category_name : 'Any Category' }}
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a wire:click="updateCategoryFilter('')" class="dropdown-item" href="#">
                            Any Category
                        </a>
                    </li>
                    @foreach ($categories as $category)
                        <li>
                            <a wire:click="updateCategoryFilter('{{ $category->id }}')" class="dropdown-item" href="#">
                                {{ $category->category_name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


</div>

</div>