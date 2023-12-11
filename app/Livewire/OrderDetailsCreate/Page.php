<?php

namespace App\Livewire\OrderDetailsCreate;

use Livewire\Component;
use App\Models\OrderDetail;
use App\Models\MenuItem;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class Page extends Component
{
    public $order, $order_id, $order_details=[], $order_detail_id, $menu_items;
    public $menu_item_id, $quantity, $price;
    public $total_price = 0;

    public function mount() {
        if (Auth::user()->role == 'admin') {
            return redirect()->to(route('accounts'));
        }
        $this->order = Order::create([ 
        ]);
        $this->order_id = $this->order->id;
    }

    public function render()
    {
        $this->order_details = OrderDetail::where('order_id', $this->order->id)->get();
        $this->menu_items = MenuItem::all();
        return view('livewire.order-details-create.page');
    }

    public function resetInputs() {
        $this->menu_item_id = null;
        $this->quantity = null;
        $this->price = null;
    }

    public function create() {
        $this->resetInputs();
    }

    public function store() {
        $this->validate([
            'menu_item_id' => 'required',
            'quantity' => 'required|numeric|min:1',
        ]);

        $menu_item = MenuItem::find($this->menu_item_id);
        $this->price = $menu_item->price * $this->quantity;
        OrderDetail::create([
            'order_id' => $this->order->id,
            'menu_item_id' => $this->menu_item_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
        ]);
        $this->total_price = OrderDetail::where('order_id', $this->order->id)->sum('price');
        $this->resetInputs();
    }

    public function edit($id) {
        $this->order_detail_id = $id;
        $order_detail = OrderDetail::find($id);
        $this->menu_item_id = $order_detail->menu_item_id;
        $this->quantity = $order_detail->quantity;
        $this->price = $order_detail->price;
    }

    public function update() {
        $order_detail = OrderDetail::find($this->order_detail_id);
        $menu_item = MenuItem::find($this->menu_item_id);
        $this->price = $menu_item->price * $this->quantity;
        $order_detail->update([
            'menu_item_id' => $this->menu_item_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
        ]);
        $this->total_price = OrderDetail::where('order_id', $this->order->id)->sum('price');
    }

    public function delete($id) {
        $this->order_detail_id = $id;
    }

    public function destroy() {
        $order_detail = OrderDetail::find($this->order_detail_id);
        $this->total_price -= $order_detail->price;
        $order_detail->delete();
        $this->total_price = OrderDetail::where('order_id', $this->order->id)->sum('price');
    }

    public function placeOrder() {
        $this->order->update([
            'total_price' => $this->total_price,
            'taken_by' => auth()->user()->id,
            'completed' => true,
        ]);

        // reduce stock from inventory item batches based on ingredients of menu item
        // $order_details = OrderDetail::where('order_id', $this->order->id)->get();
        // foreach ($order_details as $order_detail) {
        //     $menu_item = MenuItem::find($order_detail->menu_item_id);
        //     foreach ($menu_item->ingredients as $ingredient) {
        //         $inventory_item_batch = $ingredient->inventoryItemBatch;
        //         $inventory_item_batch->quantity -= $order_detail->quantity * $ingredient->quantity;
        //         $inventory_item_batch->save();
        //     }
        // }
        // redirect with success message
        return redirect()->route('orders')->with('success', 'Order placed successfully.');
    }
}
