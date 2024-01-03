<?php

namespace App\Livewire\OrderDetailsCreate;

use App\Models\InventoryItem;
use App\Models\InventoryItemBatch;
use App\Models\MenuItemIngredient;
use Livewire\Component;
use App\Models\OrderDetail;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\Unit;
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

        // update inventory stock levels
        $order_details = OrderDetail::where('order_id', $this->order->id)->get();
        foreach ($order_details as $order_detail) {
            $menu_item = MenuItem::find($order_detail->menu_item_id);
            $menu_item_ingredients = MenuItemIngredient::where('menu_item_id', $menu_item->id)->get();
            foreach ($menu_item_ingredients as $menu_item_ingredient) {
                $menu_item_ingredient_default_unit = Unit::where('category_id', $menu_item_ingredient->category_id)->where('default_unit', 1)->first();
                $total_amount = $menu_item_ingredient->amount * $menu_item_ingredient_default_unit->default_unit * $order_detail->quantity;
                // reduce stock based on expiration date (items near expiration date gets used first)
                $inventory_item_batches = InventoryItemBatch::where('inventory_item_id', $menu_item_ingredient->inventory_item_id)->orderBy('expiration_date', 'asc')->get();
                foreach ($inventory_item_batches as $inventory_item_batch) {
                    // inventory_item_batch default unit conversion
                    $inventory_item_batch_unit = Unit::find($inventory_item_batch->unit_id);
                    $inventory_item_batch_default_unit = Unit::where('category_id', $inventory_item_batch_unit->category_id)->where('default_unit', 1)->first();
                    $inventory_item_batch_stock = $inventory_item_batch->stock * $inventory_item_batch_default_unit->unit_conversion;
                    if ($total_amount <= $inventory_item_batch_stock) {
                        $inventory_item_batch->update([
                            'stock' => $inventory_item_batch_stock - $total_amount
                        ]);
                        break;
                    }
          
                    else if($total_amount > $inventory_item_batch_stock) {
                        $inventory_item_batch->update([
                            'stock' => $total_amount - $inventory_item_batch_stock
                        ]);
                        $total_amount -= $inventory_item_batch_stock;
                    }
                    
                    // if not enough stock, display error message revert changes
                    // else {
                    //     $this->dispatchBrowserEvent('alert', [
                    //         "message" => "Not enough stock",
                    //         "type" => "error",
                    //     ]);
                    // }
                    
                }

            }
        }

        // update inventory item total stock
        foreach ($menu_item_ingredients as $menu_item_ingredient) {
            $total_stock = 0;
            $inventory_item_batches = InventoryItemBatch::where('inventory_item_id', $menu_item_ingredient->inventory_item_id)->get();
            foreach ($inventory_item_batches as $inventory_item_batch) {
                $total_stock += $inventory_item_batch->stock;
            }
            $inventory_item = InventoryItem::find($menu_item_ingredient->inventory_item_id);
            $inventory_item->update([
                'total_stock' => $total_stock
            ]);
        }
       


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
