<?php

namespace App\Livewire\Reports;

use App\Models\Category;
use Livewire\Component;
use App\Models\InventoryItem;
use App\Models\Unit;


class Page extends Component
{
    public $inventory_items, $categories, $units;
    public function render()
    {
        $this->inventory_items = InventoryItem::all();
        $this->categories = Category::all();
        $this->units = Unit::all();
        return view('livewire.reports.page');
    }
}
