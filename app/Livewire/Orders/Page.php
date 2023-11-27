<?php

namespace App\Livewire\Orders;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;



class Page extends Component
{
    public $orders;
    public $users;
    public function mount() {
        $this->orders = Order::all();
        $this->users = User::all();
    }
    public function render()
    {
        return view('livewire.orders.page');
    }
}
