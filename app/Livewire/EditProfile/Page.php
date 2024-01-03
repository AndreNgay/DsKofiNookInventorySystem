<?php

namespace App\Livewire\EditProfile;

use Livewire\Component;
use App\Models\User;

class Page extends Component
{
    public $name, $email, $password, $confirm_password, $currentUrl;
    public function mount() {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }
    public function render()
    {
        $this->currentUrl = url()->current();
        return view('livewire.edit-profile.page');
    }

    public function store() {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password',
        ]);
        if($this->password == 'kofi-nook') {
            // display message password must not be the default password
            session()->flash('error', 'Password must not be the default password');
        }
        else {
            $user = User::find(auth()->user()->id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
            ]);
    
            return redirect()->route('edit-profile-personal-info');
        }
        
    }

    public function profile_made_store() {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => '',
            'confirm_password' => 'same:password',
        ]);
        if($this->password == 'kofi-nook') {
            // display message password must not be the default password
            session()->flash('error', 'Password must not be the default password');
        }
        else {
            $user = User::find(auth()->user()->id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
            ]);
    
            return redirect()->route('edit-profile-personal-info');
        }
        
    }
}
