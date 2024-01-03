<?php

namespace App\Livewire\Home;

use App\Models\InventoryItem;
use App\Models\InventoryItemBatch;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Page extends Component
{
    public $inventory_item_batches, $inventory_items, $num_of_batches_about_to_expire=0, $num_of_items_that_need_restocking=0;

    public function mount() {
        if(Auth::user()->profile_made == false) {
            return redirect()->route('edit-profile');
        }
        
    }

    public function render()
    {
 
        $this->inventory_item_batches = InventoryItemBatch::all();
        $this->inventory_items = InventoryItem::all();
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
            if($inventory_item->total_stock <= $inventory_item->stock_reminder) {
                $this->num_of_items_that_need_restocking++;
            }
        }
        return view('livewire.home.page');
    }
}
