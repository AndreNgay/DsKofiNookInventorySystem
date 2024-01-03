<?php

namespace App\Livewire\Reports;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InventoryItem;
use App\Models\Unit;


class Page extends Component
{
    use WithPagination;

    public function render()
    {
        $inventory_items = InventoryItem::simplePaginate(10);
        $categories = Category::all();
        $units = Unit::all();
        return view('livewire.reports.page', [
            'inventory_items' => $inventory_items,
            'categories' => $categories,
            'units' => $units,
        ]);
    }
}
