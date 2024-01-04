<?php

namespace App\Livewire\MenuItems;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MenuItem;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;



class Page extends Component
{
    use WithPagination;
    
    public $menu_item, $id, $item_name, $price;

    public function mount() {
 
    }

    public function render()
    {
        $menu_items = MenuItem::simplePaginate(10);
        return view('livewire.menu-items.page', [
            'menu_items' => $menu_items,
        ]);
    }

    public function resetInputs() {
        $this->item_name = '';
        $this->price = '';
    }

    public function create() {
        $this->resetInputs();
    }

    public function store() {
        $this->validate([
            'item_name' => 'required',
            'price' => 'required|numeric|min:0',
        ]);
    
        MenuItem::create([
            'item_name' => $this->item_name,
            'price' => $this->price,
        ]);
        $this->resetInputs();
        session()->flash('message', 'Menu Item created successfully.');
    }

    public function edit($id) {
        $menu_item = MenuItem::find($id);
        $this->id = $menu_item->id;
        $this->item_name = $menu_item->item_name;
        $this->price = $menu_item->price;
    }

    public function update() {
        $this->validate([
            'item_name' => 'required',
            // price should not be lower than 0
            'price' => 'required|numeric|min:0',
        ]);
    
        MenuItem::find($this->id)->update([
            'item_name' => $this->item_name,
            'price' => $this->price,
        ]);
        session()->flash('message', 'Menu Item updated successfully.');
    }

    public function delete($id) {
        $this->menu_item = MenuItem::find($id);
    }

    public function destroy() {
        try {
            $this->menu_item->delete();
            session()->flash('success', 'Menu Item deleted successfully.');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1451) {
                session()->flash('error', 'Cannot delete this menu item. It is being referenced by other records.');
            } else {
                session()->flash('error', 'An error occurred while trying to delete the menu item.');
            }
        }
    
        return redirect()->route('menu-items');
    }

}
