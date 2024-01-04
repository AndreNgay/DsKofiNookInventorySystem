<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div>
    <div class="row">
        <div class="col-md-10">
            <h2>Batches About to Expire</h2>
        </div>

    </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Inventory Item</th>
                        <th scope="col">Batch Number</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Category</th>
                        <th scope="col">Expiration Date</th>
                        <th scope="col">Expires In</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($about_to_expire_batches as $about_to_expire_batch)
                    <tr>
                        <td>
                            @foreach($inventory_items as $inventory_item)
                            @if($inventory_item->id == $about_to_expire_batch->inventory_item_id)
                            {{ $inventory_item->item_name }}
                            @endif
                            @endforeach
                        </td>
                        <td>
                            Batch {{ $about_to_expire_batch->id }}
                        </td>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
