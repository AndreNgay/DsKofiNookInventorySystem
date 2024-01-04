<?php

namespace App\Livewire\InventoryItems;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InventoryItem;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class Page extends Component
{
    use WithPagination;


    public $inventory_item;
    public $id, $item_name, $item_description, $stock_reminder, $expiration_reminder, $category_id, $unit_id;

    public $category_selections=[], $unit_selections=[];

    public function render()
    {
        $inventory_items = InventoryItem::simplePaginate(10);

        $categories = Category::all();
        $units = Unit::all();

        return view('livewire.inventory-items.page', [
            'inventory_items' => $inventory_items,
            'categories' => $categories,
            'units' => $units,
        ]);
    }

    public function createInventoryItemClicked() {
        $this->category_id = 1;
        $this->category_selections = Category::all();
        $this->unit_selections = Unit::where('category_id', $this->category_id)->get();
        $this->unit_id = Unit::first()->id;
    }

    public function categoryChanged() {
        $this->unit_selections = Unit::where('category_id', $this->category_id)->get();
        $this->unit_id = $this->unit_selections->first()->id;
    }



    public function resetInputs() {
        $this->item_name = '';
        $this->item_description = '';
        $this->stock_reminder = '';
        $this->expiration_reminder = '';
        $this->category_id = '';
        $this->unit_id = '';
    }

    public function store() {
        $this->validate([
            'item_name' => 'required',
            'item_description' => 'required',
            'stock_reminder' => 'required',
            'expiration_reminder' => '',
            'category_id' => 'required',
            'unit_id' => 'required',
        ]);

        InventoryItem::create([
            'item_name' => $this->item_name,
            'item_description' => $this->item_description,
            'stock_reminder' => $this->stock_reminder,
            'expiration_reminder' => $this->expiration_reminder,
            'category_id' => $this->category_id,
            'unit_id' => $this->unit_id,
        ]);
        $this->resetInputs();

        session()->flash('message', 'Inventory Item Created Successfully!');
    }

    public function edit($id) {
        $this->inventory_item = InventoryItem::find($id);
        
        $this->category_id = $this->inventory_item->category_id;
        $this->category_selections = Category::all();
        $this->unit_selections = Unit::where('category_id', $this->category_id)->get();
        $this->unit_id = $this->units->first()->id;

        $inventory_item = InventoryItem::find($id);
        $this->id = $id;
        $this->item_name = $inventory_item->item_name;
        $this->item_description = $inventory_item->item_description;
        $this->stock_reminder = $inventory_item->stock_reminder;
        $this->expiration_reminder = $inventory_item->expiration_reminder;
        $this->category_id = $inventory_item->category_id;
        $this->unit_id = $inventory_item->unit_id;
    }

    public function update() {
        InventoryItem::find($this->id)->update([
            'item_name' => $this->item_name,
            'item_description' => $this->item_description,
            'stock_reminder' => $this->stock_reminder,
            'expiration_reminder' => $this->expiration_reminder,
            'category_id' => $this->category_id,
            'unit_id' => $this->unit_id,
        ]);
        $this->resetInputs();
        session()->flash('message', 'Inventory Item Updated Successfully!');
    }

    public function delete($id) {
        $this->inventory_item = InventoryItem::find($id);
    }
    
    public function destroy() {
        try {
            $this->inventory_item->delete();
            session()->flash('message', 'Inventory Item Deleted Successfully!');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1451) {
                session()->flash('error', 'Cannot delete this inventory item. It is being referenced by other records.');
            } else {
                session()->flash('error', 'An error occurred while trying to delete the inventory item.');
            }
        }
        return redirect()->route('inventory-items');
    }

    
}
