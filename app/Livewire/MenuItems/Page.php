<?php

namespace App\Livewire\MenuItems;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\MenuItem;

#[Layout('layouts.app')] 

class Page extends Component
{
    public $menu_items;
    public function mount()
    {
        $this->menu_items = MenuItem::all();
    }
    public function render()
    {
        return view('livewire.menu-items.page');
    }
}
