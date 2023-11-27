<div>
    @include('livewire.units.create-modal')
    <div class="row">
        <div class="col-md-10">
            <h2>Units List</h2>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#createUnit">
                Create Unit
            </button>
        </div>
    </div>
    <hr />

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
