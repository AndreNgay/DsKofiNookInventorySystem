<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if($role == 'employee' || $role == 'owner' || $role == 'supplier') {    
            return view('livewire.home.page');
        }
        else if($role == 'account admin') {
            return redirect()->route('account-admin.dashboard');
        }
        return view('/');
    }
    
}
