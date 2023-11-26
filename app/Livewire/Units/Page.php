<?php

namespace App\Livewire\Units;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')] 
class Page extends Component
{
    public function render()
    {
        return view('livewire.units.page');
    }
}
