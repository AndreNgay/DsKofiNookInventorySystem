<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
<h2>Item History</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Date</th>
        <th>Action</th>
        <th>Quantity</th>
        <th>Comments</th>
      </tr>
    </thead>
    <tbody>
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
      <!-- Add more rows with dummy data as needed -->
    </tbody>
  </table>
</div>
