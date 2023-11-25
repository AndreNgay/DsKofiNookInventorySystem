<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
    <div class="table-responsive">
        <h2>Expiring Items</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Item Name</th>
                    <th>Expiration Date</th>
                    <th>Days Left</th>
                    <th>Select</th> <!-- Added checkbox column -->
                </tr>
            </thead>
            <tbody>
                <!-- Expiring Items -->
                <tr>
                    <td>1</td>
                    <td>Bread</td>
                    <td>2023-01-01</td>
                    <td>5</td>
                    <td><input type="checkbox" name="expiring_items[]"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Milk</td>
                    <td>2023-01-05</td>
                    <td>10</td>
                    <td><input type="checkbox" name="expiring_items[]"></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Eggs</td>
                    <td>2023-01-10</td>
                    <td>15</td>
                    <td><input type="checkbox" name="expiring_items[]"></td>
                </tr>

                <!-- Additional Dummy Data -->
                <tr>
                    <td>4</td>
                    <td>Cheese</td>
                    <td>2023-01-15</td>
                    <td>20</td>
                    <td><input type="checkbox" name="expiring_items[]"></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Yogurt</td>
                    <td>2023-01-20</td>
                    <td>25</td>
                    <td><input type="checkbox" name="expiring_items[]"></td>
                </tr>
                <!-- ... (other expiring items) ... -->
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary">Print Expiring Items</button>
        </div>
    </div>

    <div class="table-responsive">
        <h2>Items to Restock</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Select</th> <!-- Added checkbox column -->
                </tr>
            </thead>
            <tbody>
                <!-- Items to Restock -->
                <tr>
                    <td>1</td>
                    <td>Flour</td>
                    <td>10 bags</td>
                    <td><input type="checkbox" name="restocked_items[]"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Sugar</td>
                    <td>5 bags</td>
                    <td><input type="checkbox" name="restocked_items[]"></td>
                </tr>
                <!-- ... (other restocked items) ... -->
            </tbody>
        </table>

        <!-- Print Button for Items to Restock -->
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary">Print Items to be Restocked</button>
        </div>
    </div>

</div>
