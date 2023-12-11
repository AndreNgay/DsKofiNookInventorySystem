<div>
    <div class="row">
        <h2>Home</h2>
    </div>
    <hr />

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Batches About to Expire
                </div>
                <div class="card-body">
                    <h2>{{ $num_of_batches_about_to_expire++ }}</h2>
                </div>
                <div class="card-footer">
                    <a href="/batches-about-to-expire" class="btn btn-primary">More Details <i
                            class="bi bi-arrow-right-short"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Items that Need Restocking
                </div>
                <div class="card-body">
                    <h2 class="card-title">{{ $num_of_items_that_need_restocking++ }}</h2>


                </div>
                <div class="card-footer">
                    <a href="/need-restocking-items" class="btn btn-primary">More Details <i
                            class="bi bi-arrow-right-short"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <canvas id="earningsChart" width="400" height="140"></canvas>
                </div>
            </div>
        </div>


    </div>
    <script>
        // Dummy data for earnings breakdown
        var data = {
            labels: ['Macchiato', 'Americano', 'Mocha', 'Long Black'],
            datasets: [{
                label: 'Earnings Breakdown',
                data: [2000, 3500, 1500, 4000],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1,
            }],
        };

        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Create the bar chart
        var ctx = document.getElementById('earningsChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>

    <script>
        // Dummy data for inventory trends
        var data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Coffee Beans',
                data: [300, 320, 340, 310, 330, 350],
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2,
                fill: false,
            }, {
                label: 'Milk',
                data: [200, 210, 230, 220, 240, 200],
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                fill: false,
            }, {
                label: 'Sugar',
                data: [150, 140, 160, 180, 170, 190],
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 2,
                fill: false,
            }],
        };

        var options = {
            scales: {
                x: {
                    beginAtZero: true,
                },
                y: {
                    beginAtZero: true,
                }
            }
        };

        // Create the line chart
        var ctx = document.getElementById('inventoryTrendsChart').getContext('2d');
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: options
        });
    </script>


</div>