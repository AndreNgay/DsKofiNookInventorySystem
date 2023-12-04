<?php

namespace App\Livewire\MenuItems;

use Livewire\Component;
use App\Models\MenuItem;


class Page extends Component
{
    public $menu_items;
    public $menu_item, $id, $item_name, $price;

    public function render()
    {
        $this->menu_items = MenuItem::all();
        return view('livewire.menu-items.page');
    }

    public function resetInputs() {
        $this->item_name = '';
        $this->price = '';
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
    }

    public function delete($id) {
        $this->menu_item = MenuItem::find($id);
    }

    public function destroy() {
        $this->menu_item->delete();
    }

}
