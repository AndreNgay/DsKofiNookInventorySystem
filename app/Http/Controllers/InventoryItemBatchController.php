<?php

namespace App\Http\Controllers;
use App\Models\InventoryItem;
use Illuminate\Support\Facades\Auth;

class InventoryItemBatchController extends Controller
{

    public function index($inventory_item_id) {
        $role = Auth::user()->role;

        if($role == 'employee' || $role == 'owner' || $role == 'supplier') {    
            return view('livewire.inventory_item_batch.page')->with('inventory_item_id', $inventory_item_id);
        }

        else if($role == 'account admin') {
            return redirect()->route('account-admin.dashboard');
        }
    }
}
