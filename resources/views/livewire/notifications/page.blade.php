<div>
  <div class="row">
    <h2>Notifications</h2>
  </div>
  <hr />

  <!-- Unread Notifications -->
  <div class="row">
    <h3>Unread Notifications</h3>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Message</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <!-- Dummy data for unread notifications -->
          <tr>
            <td>Batch 1 of Coffee Beans will expire in 6 days (12/13/2023)</td>
            <td><input type="checkbox" id="notification1"></td>
          </tr>
          <tr>
            <td>Batch 2 of Sugar will expire in 3 days (12/10/2023)</td>
            <td><input type="checkbox" id="notification2"></td>
          </tr>
          <tr>
            <td>New order received - 5 Espresso</td>
            <td><input type="checkbox" id="notification3"></td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>

  <!-- Read Notifications -->
  <div class="row">
    <h3>Read Notifications</h3>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Message</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <!-- Dummy data for read notifications -->
          <tr>
            <td>Batch 3 of Milk has been restocked</td>
            <td><input type="checkbox" id="notification4" checked disabled></td>
          </tr>
          <tr>
            <td>Salt needs stocking - 50 grams left</td>
            <td><input type="checkbox" id="notification4" checked disabled></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>