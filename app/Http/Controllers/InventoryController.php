<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index() {
        $role = Auth::user()->role;

        if($role == 'employee' || $role == 'owner' || $role == 'supplier') {    
            return view('pages.inventory');
        }
        else if($role == 'account admin') {
            return redirect()->route('account-admin.dashboard');
        }
    }
}
