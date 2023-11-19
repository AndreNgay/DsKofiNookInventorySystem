<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryItemController extends Controller
{
    public function index() {
        $role = Auth::user()->role;

        if($role == 'employee') {    
            return view('pages.employee.inventory-items');
        }
        else if($role == 'owner') {
            return view('pages.owner.inventory-items');
        }
        else if($role == 'supplier') {
            return view('pages.supplier.inventory-items');
        }
        else if($role == 'account admin') {
            return redirect()->route('account-admin.dashboard');
        }
            
    }
}
