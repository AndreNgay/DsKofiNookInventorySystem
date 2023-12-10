<div>
    <div class="row">
        <div class="col-md-10">
            <h2>Batches About to Expire</h2>
        </div>

    </div>
    <hr />
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif


    <div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Category</th>
                        <th scope="col">Expiration Date</th>
                        <th scope="col">Expires In</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($about_to_expire_batches as $about_to_expire_batch)
                    <tr>
                        <th scope="row">{{ $about_to_expire_batch->id }}</th>
                        <td>
                            {{ $about_to_expire_batch->stock }}
                            @foreach ($units as $unit)
                            @if($unit->id == $about_to_expire_batch->unit_id)
                            {{ $unit->unit_name }}
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($categories as $category)
                            @if($category->id == $about_to_expire_batch->category_id)
                            {{ $category->category_name }}
                            @endif
                            @endforeach
                        </td>
                        <td>{{ $about_to_expire_batch->expiration_date }}</td>

                        <td>
                            @php
                            // Convert expiration_date to DateTime object
                            $expirationDate = new DateTime($about_to_expire_batch->expiration_date);

                            // Calculate the difference between expiration_date and current_date
                            $dateDiff = $current_date->diff($expirationDate);
                            echo $dateDiff->format('%R%a days');
                            @endphp
                        </td>

                        <td>
                            <div class="d-flex">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#editInventoryItemBatch"
                                    wire:click="edit({{ $about_to_expire_batch->id }})">
                                    <span class="bi bi-pencil-square">
                                        Edit</span>
                                </button>

                                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                    data-bs-target="#deleteInventoryItemBatch"
                                    wire:click="delete({{ $about_to_expire_batch->id }})">
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
    <div class="mt-4">
        <button class="btn btn-primary" wire:click="printReport">Print Report</button>
    </div>

</div>

@push('scripts')
    <script>
        Livewire.on('printReport', () => {
            window.print();
        });
    </script>
@endpush