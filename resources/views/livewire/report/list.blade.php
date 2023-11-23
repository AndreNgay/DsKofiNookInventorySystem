<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
    <div>
        <h2>Expiring Items</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Item Name</th>
                    <th>Expiration Date</th>
                    <th>Days Left</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Bread</td>
                    <td>2023-01-01</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Milk</td>
                    <td>2023-01-05</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Eggs</td>
                    <td>2023-01-10</td>
                    <td>15</td>
                </tr>
                <!-- Add more rows with dummy data as needed -->
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary">Print</button>
    </div>
</div>
