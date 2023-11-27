<?php

namespace App\Livewire\MenuItems;

use Livewire\Component;
use App\Models\MenuItem;


class Page extends Component
{
    public $menu_items;
    public $item_name, $price;

    public function render()
    {
        $this->menu_items = MenuItem::all();
        return view('livewire.menu-items.page');
    }

    public function store() {
        MenuItem::create([
            'item_name' => $this->item_name,
            'price' => $this->price,
        ]);
        $this->resetInputs();
    }

    public function resetInputs() {
        $this->item_name = '';
        $this->price = '';
    }
}
