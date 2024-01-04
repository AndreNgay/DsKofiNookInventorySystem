<?php

namespace App\Livewire\EditProfile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Password extends Component
{
    public $password, $confirm_password;

    public function mount() {

    }

    public function render()
    {
        return view('livewire.edit-profile.password');
    }

    public function update() {
        if($this->password == 'kofi-nook') {
            session()->flash('error', 'You cannot use the default password');
        }
        else{
            $this->validate([
                'password' => 'required|min:8',
                'confirm_password' => 'required|min:8|same:password'
            ]);

            auth()->user()->update([
                'password' => bcrypt($this->password)
            ]);
    
            session()->flash('message', 'Password updated successfully');
            return redirect()->route('edit-profile-email');
        }
        
    }
}
