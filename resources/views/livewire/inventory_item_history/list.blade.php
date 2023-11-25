<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div class="table-responsive">
    <h2>Item History</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Date</th>
                <th>Action</th>
                <th>Quantity</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <td>2023-01-01</td>
                <td>Received</td>
                <td>100</td>
                <td>Initial stock</td>
            </tr>
            <tr>
                <td>2023-01-10</td>
                <td>Sold</td>
                <td>50</td>
                <td>Customer purchase</td>
            </tr>
            <tr>
                <td>2023-02-05</td>
                <td>Restocked</td>
                <td>75</td>
                <td>Supplier delivery</td>
            </tr>
            <!-- Additional Dummy Data -->
            <tr>
                <td>2023-03-15</td>
                <td>Sold</td>
                <td>30</td>
                <td>Special promotion</td>
            </tr>
            <tr>
                <td>2023-04-02</td>
                <td>Received</td>
                <td>50</td>
                <td>New product launch</td>
            </tr>
            <tr>
                <td>2023-05-20</td>
                <td>Sold</td>
                <td>20</td>
                <td>Online orders</td>
            </tr>
            <tr>
                <td>2023-06-12</td>
                <td>Restocked</td>
                <td>60</td>
                <td>Seasonal demand</td>
            </tr>
            <tr>
                <td>2023-07-08</td>
                <td>Sold</td>
                <td>25</td>
                <td>Flash sale</td>
            </tr>
            <tr>
                <td>2023-08-30</td>
                <td>Received</td>
                <td>40</td>
                <td>Inventory replenishment</td>
            </tr>
            <tr>
                <td>2023-09-18</td>
                <td>Sold</td>
                <td>15</td>
                <td>Customer reorders</td>
            </tr>
        </tbody>
    </table>
</div>
