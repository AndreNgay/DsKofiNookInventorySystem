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

    <div class="row mb-1">
        <div class="col-md-1">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Popular Items
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" onclick="updateChartData('today')">Today</a></li>
                    <li><a class="dropdown-item" href="#" onclick="updateChartData('this_month')">This Month</a></li>
                    <li><a class="dropdown-item" href="#" onclick="updateChartData('this_year')">This Year</a></li>
                </ul>
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
        // Fetch data from the Laravel backend
        fetch('/api/earnings')
            .then(response => response.json())
            .then(dataFromDatabase => {
                // Use the fetched data to update the chart
                updateChart(dataFromDatabase);
            })
            .catch(error => console.error('Error fetching data:', error));

        function updateChart(dataFromDatabase) {
            var data = {
                labels: dataFromDatabase.map(entry => entry.item_name),
                datasets: [{
                    label: 'Earnings Breakdown',
                    data: dataFromDatabase.map(entry => entry.amount_of_times_bought),
                    backgroundColor: [
                        'burlywood',
                        'burlywood',
                        'burlywood',
                        // Add more colors as needed
                    ],
                    borderColor: [
                        'saddlebrown', // Border color can be different
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
        }
    </script>

</div>