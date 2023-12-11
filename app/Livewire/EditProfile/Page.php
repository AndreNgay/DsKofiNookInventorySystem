<?php

namespace App\Livewire\EditProfile;

use Livewire\Component;

class Page extends Component
{
    public $name, $address, $email, $contact_number, $emergency_contact_name, $emergency_contact_relation, $emergency_contact_number, $password;
    public function mount() {
        $this->name = auth()->user()->name;
        $this->address = auth()->user()->address;
        $this->email = auth()->user()->email;
        $this->contact_number = auth()->user()->contact_number;
        $this->emergency_contact_name = auth()->user()->emergency_contact_name;
        $this->emergency_contact_relation = auth()->user()->emergency_contact_relation;
        $this->emergency_contact_number = auth()->user()->emergency_contact_number;
        $this->password = auth()->user()->password;
    }
    public function render()
    {
        return view('livewire.edit-profile.page');
    }

    public function updateProfile() {
        $this->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required',
            'emergency_contact_name' => 'required',
            'emergency_contact_relation' => 'required',
            'emergency_contact_number' => 'required',
        ]);

        // check if default password
        if($this->password == 'kofi-nook'){
            session()->flash('error', 'Please enter a new password');
        }
        $user = auth()->user();
        $user->name = $this->name;
        $user->address = $this->address;
        $user->email = $this->email;
        $user->contact_number = $this->contact_number;
        $user->emergency_contact_name = $this->emergency_contact_name;
        $user->emergency_contact_relation = $this->emergency_contact_relation;
        $user->emergency_contact_number = $this->emergency_contact_number;
        $user->password = $this->password;
        $user->profile_made = true;
        $user->save();
        return redirect()->route('home');
    }
}
