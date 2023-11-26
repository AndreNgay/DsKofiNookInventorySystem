<?php

namespace App\Livewire\MenuItems;

use App\Models\MenuItem;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')] 
class Create extends Component
{
    public $item_name;
    public $price;
    public function render()
    {
        return view('livewire.menu-items.create');
    }

    public function store() {
        MenuItem::create([
            'item_name' => $this->item_name,
            'price' => $this->price,
        ]);
    }
}
