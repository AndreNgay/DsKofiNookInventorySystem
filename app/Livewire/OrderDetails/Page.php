<?php

namespace App\Livewire\OrderDetails;

use App\Models\MenuItem;
use App\Models\OrderDetail;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class Page extends Component
{
    use WithPagination;

    public $order_id, $order, $menu_items, $total_price;

    public function mount() {
        if (Auth::user()->role == 'admin') {
            return redirect()->to(route('accounts'));
        }
        $this->order_id = Route::current()->parameter('id');
        $this->order = Order::findOrFail($this->order_id);
        $this->menu_items = MenuItem::all();
        $this->total_price = $this->order->total_price;
    }
    public function render()
    {
        $order_details = OrderDetail::where('order_id', $this->order_id)->simplePaginate(10);
        return view('livewire.order-details.page', [
            'order_details' => $order_details,
        ]);
    }
}
