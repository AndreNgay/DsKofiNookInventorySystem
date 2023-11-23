<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryItemHistoryController extends Controller
{
    public function index() {
        $role = Auth::user()->role;

        if($role == 'employee' || $role == 'owner' || $role == 'supplier') {    
            return view('livewire.inventory_item_history.page');
        }
        else if($role == 'account admin') {
            return redirect()->route('account-admin.dashboard');
        }
    }
}
