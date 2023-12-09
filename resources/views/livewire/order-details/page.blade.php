<div>
    <div class="row">
        <div class="col-md-10">
            <h2>Order #7 Details</h2>
        </div>
    </div>
    <hr />

    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu Item</th>
                        <th scope="col">Price</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <th scope="row">1</th>
                        <td>Machiato</td>
                        <td>50</td>
                        <td>2</td>
                        <td>
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-primary">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Americano</td>
                        <td>40</td>
                        <td>1</td>
                        <td>
                        <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-primary">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="d-flex justify-content-end">
            <h2>Total Price: 90</h2>
        </div>
    </div>
    
</div>

<!-- JavaScript function for printing -->
<script>
    function printTable() {
        window.print();
    }
</script>
