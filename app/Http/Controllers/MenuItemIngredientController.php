<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuItemIngredientController extends Controller
{
    public function index($menu_item_id) {
        $role = Auth::user()->role;

        if($role == 'employee' || $role == 'owner' || $role == 'supplier') {    
            return view('livewire.menu_item_ingredients.page')->with('menu_item_id', $menu_item_id);
        }

        else if($role == 'account admin') {
            return redirect()->route('account-admin.dashboard');
        }

    }
}
