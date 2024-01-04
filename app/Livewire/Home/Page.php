<?php

namespace App\Livewire\Home;

use App\Models\InventoryItem;
use App\Models\InventoryItemBatch;
use App\Models\MenuItem;
use App\Models\OrderDetail;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Page extends Component
{
    public $inventory_item_batches, $inventory_items, $num_of_batches_about_to_expire = 0,
        $num_of_items_that_need_restocking = 0, $num_of_sold_items = 0, $sum_of_products_sold_per_item, $menu_items;

    // public function mount()
    // {
    //     if (Auth::user()->profile_made == false) {
    //         return redirect()->route('edit-profile');
    //     }
    // }

    public $chartData;

    public function mount()
    {
        $this->getChartData();
    }

    public function getChartData()
    {
        // Sample data for the bar graph
        $sampleChartData = [
            ['menu_item_id' => 1, 'total_sold' => 10],
            ['menu_item_id' => 2, 'total_sold' => 5],
            ['menu_item_id' => 3, 'total_sold' => 8],
            // Add more sample data as needed
        ];

        $this->chartData = $sampleChartData;
    }

    public function handleUpdateChartData($data)
    {
        // Handle the data on the Livewire component side if needed
    }

    public function render()
    {
        $this->inventory_item_batches = InventoryItemBatch::all();
        $this->inventory_items = InventoryItem::all();
        $this->menu_items = MenuItem::all();

        // Use Eloquent to get the highest number of sold items
        $maxSoldItems = OrderDetail::select('menu_item_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('menu_item_id')
            ->orderByDesc('total_sold')
            ->first();

        if ($maxSoldItems) {
            $this->num_of_sold_items = $maxSoldItems->total_sold;
        }

        // Use Eloquent to get the sum of products sold per item
        $sumOfProductsSoldPerItem = OrderDetail::select('menu_item_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('menu_item_id')
            ->get();

        $this->sum_of_products_sold_per_item = $sumOfProductsSoldPerItem;

        foreach ($this->inventory_item_batches as $inventory_item_batch) {
            $inventory_item = InventoryItem::find($inventory_item_batch->inventory_item_id);

            if ($inventory_item) {
                $expirationReminderDays = $inventory_item->expiration_reminder;
                $expirationDate = now()->addDays($expirationReminderDays);

                if ($inventory_item_batch->expiration_date <= $expirationDate) {
                    $this->num_of_batches_about_to_expire++;
                }
            }
        }

        foreach ($this->inventory_items as $inventory_item) {
            if ($inventory_item->total_stock <= $inventory_item->stock_reminder) {
                $this->num_of_items_that_need_restocking++;
            }
        }

        $this->getChartData();

        return view('livewire.home.page', [
            'num_of_sold_items' => $this->num_of_sold_items,
            'sum_of_products_sold_per_item' => $this->sum_of_products_sold_per_item,
        ]);
    }
}
