<div>
    <div class="row">
        <h2>Home</h2>
    </div>
    <hr />

    <div class="row mb-3">
            {{-- <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Sum of Products Sold per Item
                    </div>
                    <div class="card-body">
                        @foreach($sum_of_products_sold_per_item as $item)
                            @foreach($menu_items as $menu)
                                @if($menu->id == $item->menu_item_id)
                                    <p>{{ $menu['item_name'] }}: {{ $item['total_sold'] }}</p>
                                    @break
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <!-- Add any additional action or link if needed -->
                    </div>
                </div>
            </div> --}}
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
        <div class="col-md-2">
            <div class="dropdown" id="dateRangeDropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    This Month
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" data-range="Today">Today</a></li>
                    <li><a class="dropdown-item" href="#" data-range="This Month">This Month</a></li>
                    <li><a class="dropdown-item" href="#" data-range="This Year">This Year</a></li>
                </ul>
            </div>
        </div>
        
        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    All
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" id="date-range-all">All</a></li>
                    <li><a class="dropdown-item" href="#" id="date-range-all">Top 5 Highest</a></li>
                    <li><a class="dropdown-item" href="#" id="date-range-all">Top 5 Lowest</a></li>
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
    // Fetch data from the Livewire component
    const num_of_sold_items = {{ $num_of_sold_items }};
    const sum_of_products_sold_per_item = @json($sum_of_products_sold_per_item);
    const menu_items = @json($menu_items);

    // Use the fetched data to update the chart
    updateChart(sum_of_products_sold_per_item);

    Livewire.on('updateChartData', data => {
        updateChart(data);
    });

    function updateChart(dataFromDatabase) {
    // Map the menu item names based on the menu_item_id
    const labels = dataFromDatabase.map(entry => {
        const menuItem = menu_items.find(menu => menu.id === entry.menu_item_id);
        return menuItem ? menuItem.item_name : 'Unknown';
    });

    var data = {
        labels: labels,
        datasets: [{
            label: 'Items Sold',
            data: dataFromDatabase.map(entry => entry.total_sold),
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

function filterDataByDateRange(range) {
    const today = new Date();
    let startDate, endDate;

    switch (range) {
        case 'Today':
            startDate = new Date(today);
            endDate = new Date(today);
            break;
        case 'This Month':
            startDate = new Date(today.getFullYear(), today.getMonth(), 1);
            endDate = new Date(today.getFullYear(), today.getMonth() + 1, 0);
            break;
        case 'This Year':
            startDate = new Date(today.getFullYear(), 0, 1);
            endDate = new Date(today.getFullYear(), 11, 31);
            break;
        default:
            // Default to the whole date range
            startDate = new Date(0);
            endDate = new Date();
            break;
    }

    console.log('Start Date:', startDate);
    console.log('End Date:', endDate);

    const filteredData = sum_of_products_sold_per_item.filter(entry => {
        const entryDate = new Date(entry.created_at.replace(/-/g, '/'));
        console.log('Entry Date:', entryDate);
        return entryDate >= startDate && entryDate <= endDate;
    });

    console.log('Filtered Data:', filteredData);

    updateChart(filteredData);
}



document.addEventListener('DOMContentLoaded', function () {
    // Attach event listener to the dropdown
    const dateRangeDropdown = new bootstrap.Dropdown(document.getElementById('dateRangeDropdown'));

    // Handle click events on dropdown items
    document.querySelectorAll('#dateRangeDropdown .dropdown-item').forEach(item => {
        item.addEventListener('click', function (event) {
            const range = event.target.getAttribute('data-range');
            filterDataByDateRange(range);
        });
    });
});

</script>
</div>