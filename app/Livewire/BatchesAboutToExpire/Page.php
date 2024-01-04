<?php

namespace App\Livewire\BatchesAboutToExpire;

use App\Models\Category;
use App\Models\InventoryItemBatch;
use Livewire\Component;
use App\Models\InventoryItem;
use App\Models\Unit;

use Barryvdh\DomPDF\Facade\Pdf;

use DateTime;
class Page extends Component
{
    public $inventory_item_batches, $about_to_expire_batches=[], $units, $categories, $current_date, $inventory_items;
    public function render()
    {
        $this->inventory_items = InventoryItem::all();
        $this->current_date = now();
        $this->units = Unit::all();
        $this->categories = Category::all();
        $this->inventory_item_batches = InventoryItemBatch::all();
        foreach ($this->inventory_item_batches as $inventory_item_batch) {
            $inventory_item = InventoryItem::find($inventory_item_batch->inventory_item_id);
            if ($inventory_item) {
                $expirationReminderDays = $inventory_item->expiration_reminder;
                $expirationDate = now()->addDays($expirationReminderDays);

                if ($inventory_item_batch->expiration_date < $expirationDate) {
                    array_push($this->about_to_expire_batches, $inventory_item_batch);
                }
            }
        }

        return view('livewire.batches-about-to-expire.page');
    }

    public function printReport()
    {
        $data = $this->about_to_expire_batches;
        $about_to_expire_batches = [];
        $inventory_items = InventoryItem::all();
        $inventory_item_batches = InventoryItemBatch::all();
        $units = Unit::all();
        $categories = Category::all(); 
        $current_date = now();
        foreach($inventory_item_batches as $inventory_item_batch) {
            $inventory_item = InventoryItem::find($inventory_item_batch->inventory_item_id);
            if ($inventory_item) {
                $expirationReminderDays = $inventory_item->expiration_reminder;
                $expirationDate = now()->addDays($expirationReminderDays);

                if ($inventory_item_batch->expiration_date < $expirationDate) {
                    array_push($about_to_expire_batches, $inventory_item_batch);
                }
            }
        }

        $pdf = Pdf::loadView('livewire.batches-about-to-expire.pdf', compact('about_to_expire_batches', 'inventory_items', 'units', 'categories', 'current_date'));
        return $pdf->download('report.pdf');
    }

}
