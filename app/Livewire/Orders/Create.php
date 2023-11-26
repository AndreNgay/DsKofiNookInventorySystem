<?php

namespace App\Livewire\Orders;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Order;
use App\Models\User;

#[Layout('layouts.app')] 
class Create extends Component
{
    public $orders;
    public $users;
    public function mount() {
        $this->orders = Order::all();
        $this->users = User::all();
    }
    public function render()
    {
        return view('livewire.orders.create');
    }
}
