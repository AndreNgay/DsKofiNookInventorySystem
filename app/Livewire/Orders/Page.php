<?php

namespace App\Livewire\Orders;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Auth;



class Page extends Component
{
    public $orders=[], $order_details=[], $users, $menu_items;
    public function mount() {
  
    }
    public function render()
    {
        $this->orders = Order::where('completed', true)->get();
        $this->users = User::all();

        $this->menu_items = MenuItem::all();
        return view('livewire.orders.page');
    }
}
