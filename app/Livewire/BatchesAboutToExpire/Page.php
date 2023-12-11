<?php

namespace App\Livewire\BatchesAboutToExpire;

use App\Models\InventoryItemBatch;
use Livewire\Component;
use App\Models\InventoryItem;
use App\Models\Unit;

use Barryvdh\DomPDF\Facade as PDF;
use DateTime;
class Page extends Component
{
    public $inventory_item_batches, $about_to_expire_batches=[], $units, $categories, $current_date, $inventory_items;
    public function render()
    {
        $this->inventory_items = InventoryItem::all();
        $this->current_date = now();
        $this->units = Unit::all();
        $this->categories = \App\Models\Category::all();
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
        $data = $this->batches_about_to_expire;

        $pdf = PDF::loadView('reports.report_view', compact('data'));
        return $pdf->download('report.pdf');


    }
}
