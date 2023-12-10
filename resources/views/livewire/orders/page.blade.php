<div>

    <div class="row">
        <div class="col-md-10">
            <h2>Orders List</h2>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100" type="button" href="/order-details-create" wire:navigate>
                Create New Order
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
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Taken At</th>
                            <th scope="col">Taken By</th>
                            <th scope="col">Details</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->id }}</th>
                            <td>{{ $order->total_price }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                @foreach($users as $user)
                                @if($user->id == $order->taken_by)
                                {{ $user->name }}
                                @endif
                                @endforeach
                            <td>
                                <a href="{{ route('details-order', ['id' => $order->id]) }}" class="btn btn-primary ms-2') }}" class="btn btn-primary" wire:navigate>
                                    View Details
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
