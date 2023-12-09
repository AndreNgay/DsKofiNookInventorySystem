<?php

namespace App\Livewire\InventoryItemBatches;

use Livewire\Component;
use App\Models\Category;
use App\Models\Unit;
use App\Models\InventoryItemBatch;
use App\Models\InventoryItem;
use Illuminate\Support\Facades\Route;


class Page extends Component
{
    public $inventory_item_id, $inventory_item;
    public $inventory_item_batches, $categories, $units, $current_date;

    public $inventory_item_batch_id, $stock, $expiration_date, $category_id, $unit_id, $unit_selections=[];

    public function mount() {
        $this->inventory_item_id = Route::current()->parameter('id');
        $this->inventory_item = InventoryItem::find($this->inventory_item_id);
    }
    

    public function render()
    {

        $this->inventory_item_batches = InventoryItemBatch::where('inventory_item_id', $this->inventory_item_id)->get();
        $this->categories = Category::all();
        $this->units = Unit::all();
        $this->current_date = now()->timezone('Asia/Manila');
        return view('livewire.inventory-item-batches.page');
    }

    public function resetInputs() {
        $this->stock = '';
        $this->expiration_date = '';
        $this->category_id = '';
        $this->unit_id = '';
    }

    public function create() {
        $this->resetInputs();
        $this->category_id = $this->inventory_item->category_id;
        $this->unit_selections = Unit::where('category_id', $this->category_id)->get();
    }

    public function store() {
        $this->validate([
            'stock' => 'required',
            'expiration_date' => 'required',
            'category_id' => 'required',
            'unit_id' => 'required',
        ]);

        InventoryItemBatch::create([
            'inventory_item_id' => $this->inventory_item_id,
            'stock' => $this->stock,
            'expiration_date' => $this->expiration_date,
            'category_id' => $this->category_id,
            'unit_id' => $this->unit_id,
        ]);
        $inventory_item_unit_conversion = Unit::where('id', $this->inventory_item->unit_id)->first()->unit_conversion; 
        $inventory_item_batch_unit_conversion = Unit::where('id', $this->unit_id)->first()->unit_conversion;

        // convert inventory_item_stock and inventory_item_batch_stock to default_unit
        $inventory_item_stock = $this->inventory_item->total_stock * $inventory_item_unit_conversion; // 12
        $inventory_item_batch_stock = $this->stock * $inventory_item_batch_unit_conversion; // 6 pcs
        $total_stock = $inventory_item_stock + $inventory_item_batch_stock;

        InventoryItem::find($this->inventory_item_id)->update([
            'total_stock' => $total_stock / $inventory_item_unit_conversion,
        ]);
        session()->flash('message', 'Inventory Item Batch Created Successfully!');
        $this->resetInputs();
    }

    public function edit($id){
        $this->category_id = $this->inventory_item->category_id;
        $this->unit_selections = Unit::where('category_id', $this->category_id)->get();
        $this->stock = InventoryItemBatch::find($id)->stock;
        $this->unit_id = InventoryItemBatch::find($id)->unit_id;
        $this->expiration_date = InventoryItemBatch::find($id)->expiration_date;
        $this->inventory_item_batch_id = $id;
    }

    public function update() {
        $this->validate([
            'stock' => 'required',
            'unit_id' => 'required',
            'expiration_date' => 'required',
        ]);

        $inventory_item_batch = InventoryItemBatch::find($this->inventory_item_batch_id);
        
        $inventory_item_unit_conversion = Unit::where('id', $this->inventory_item->unit_id)->first()->unit_conversion; 
        $inventory_item_batch_unit_conversion = Unit::where('id', $inventory_item_batch->unit_id)->first()->unit_conversion;
    }

    public function delete($id){
        $this->inventory_item_batch_id = $id;
    }

    public function destroy() {
   
        $inventory_item_batch = InventoryItemBatch::find($this->inventory_item_batch_id);

        $inventory_item_unit_conversion = Unit::where('id', $this->inventory_item->unit_id)->first()->unit_conversion; 
        $inventory_item_batch_unit_conversion = Unit::where('id', $inventory_item_batch->unit_id)->first()->unit_conversion;

        // convert inventory_item_stock and inventory_item_batch_stock to default_unit
        $inventory_item_stock = $this->inventory_item->total_stock * $inventory_item_unit_conversion; // 12
        $inventory_item_batch_stock = $inventory_item_batch->stock * $inventory_item_batch_unit_conversion; // 6 pcs
        $total_stock = $inventory_item_stock - $inventory_item_batch_stock;

        $this->inventory_item->update([
            'total_stock' => $total_stock / $inventory_item_unit_conversion,
        ]);
        $inventory_item_batch->delete();
        session()->flash('message', 'Inventory Item Batch Deleted Successfully!');
    }
}
