<?php

namespace App\Livewire\NeedRestockingItems;

use Livewire\Component;

class Page extends Component
{
    public $need_restocking_items=[], $inventory_items;
    public function render()
    {
        $this->inventory_items = \App\Models\InventoryItem::all();
        foreach($this->inventory_items as $inventory_item) {
            if($inventory_item->total_stock < $inventory_item->stock_reminder){
                array_push($this->need_restocking_items, $inventory_item);
            }
        }
        return view('livewire.need-restocking-items.page');
    }
}
