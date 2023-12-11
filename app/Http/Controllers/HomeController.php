<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;
        if(Auth::user()->profile_made == false) {
            return redirect()->route('edit-profile');
        }

        if($role == 'employee' || $role == 'owner' || $role == 'supplier') {    
            return view('livewire.home.page');
        }
        else if($role == 'admin') {
            return redirect()->route('accounts');
        }
        return view('/');
    }
    
}
