<?php

namespace App\Livewire\OrderDetails;

use App\Models\MenuItem;
use App\Models\OrderDetail;
use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

class Page extends Component
{
    public $order_details, $order_id, $order, $menu_items, $total_price;

    public function mount() {
        $this->order_id = Route::current()->parameter('id');
        $this->order = Order::findOrFail($this->order_id);
        $this->menu_items = MenuItem::all();
        $this->total_price = $this->order->total_price;
    }
    public function render()
    {
        $this->order_details = OrderDetail::where('order_id', $this->order_id)->get();
        return view('livewire.order-details.page');
    }
}
