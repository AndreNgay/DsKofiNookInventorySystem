<div>
    <div class="row">
        <div class="col-md-10">
            <h2>Items Needing Restock</h2>
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
                        <th scope="col">Inventory Item</th>
                        <th scope="col">Stocks Left</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($need_restocking_items as $need_restocking_item)
                    <tr>
                        <td>
                            {{ $need_restocking_item->item_name }}
                        </td>
                        <td>
                            {{ $need_restocking_item->total_stock }}
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

