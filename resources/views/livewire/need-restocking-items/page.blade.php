<div>
    <div class="row">
        <div class="col-md-10">
            <h2>Items to Restock</h2>
        </div>
    </div>
    <hr />

    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Stock Left</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <th scope="row">1</th>
                        <td>Coffee Beans</td>
                        <td>30 grams</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Cake</td>
                        <td>15 pieces</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Milk</td>
                        <td>40 milliliters</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Tea Leaves</td>
                        <td>25 grams</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Sugar</td>
                        <td>500 grams</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Flour</td>
                        <td>1 kilogram</td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>Butter</td>
                        <td>200 grams</td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>Chocolate</td>
                        <td>10 bars</td>
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td>Yogurt</td>
                        <td>2 liters</td>
                    </tr>
                    <tr>
                        <th scope="row">10</th>
                        <td>Chicken</td>
                        <td>3 kilograms</td>
                    </tr>
                    <!-- Add more dummy data as needed -->
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary" onclick="printTable()">Print</button>
        </div>
    </div>
    
</div>

<!-- JavaScript function for printing -->
<script>
    function printTable() {
        window.print();
    }
</script>
