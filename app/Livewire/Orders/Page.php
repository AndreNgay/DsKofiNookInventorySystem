<?php

namespace App\Livewire\Orders;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use App\Models\User;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Auth;



class Page extends Component
{
    use WithPagination;

    public $order_details=[], $menu_items;
    public function mount() {
  
    }
    public function render()
    {
        $orders = Order::where('completed', true)->simplePaginate(10);
        $users = User::all();

        $this->menu_items = MenuItem::all();
        return view('livewire.orders.page', [
            'orders' => $orders,
            'users' => $users,
        ]);
    }
}
