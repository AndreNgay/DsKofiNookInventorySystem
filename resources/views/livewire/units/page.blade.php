<div>
    @include('livewire.units.create-modal')
    @include('livewire.units.edit-modal')
    @include('livewire.units.delete-modal')
    <div class="row">
        <div class="col-md-10">
            <h2>Units List</h2>
        </div>
        <div class="col-md-2">
            <button wire:click="create" type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#createUnit">
                Add New Unit
            </button>
        </div>
    </div>
    <hr />
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <div class="row mb-2">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search by unit name" aria-label="Search"
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
                        <th scope="col">Unit Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Unit Conversion</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($units as $unit)
                    <tr>

                        <th scope="row">{{ $unit->id }}</th>
                        <td>{{ $unit->unit_name }}</td>
                        <td>
                            @foreach($categories as $category)
                            @if($category->id == $unit->category_id)
                            {{ $category->category_name }}
                            @endif
                            @endforeach
                        </td>

                        <td>
                            1 {{ $unit->unit_name }} = {{ $unit->unit_conversion }}
                            @if($unit->category_id == 1)
                            Milliliters
                            @elseif($unit->category_id == 2)
                            Grams
                            @elseif($unit->category_id == 3)
                            Pieces
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#editUnit" wire:click="edit({{ $unit->id }})">
                                    <span class="bi bi-pencil-square">
                                        Edit</span>
                                </button>

                                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                    data-bs-target="#deleteUnit" wire:click="delete({{ $unit->id }})">
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

    {{ $units->links() }}

</div>
