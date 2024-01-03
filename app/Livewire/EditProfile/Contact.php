<?php

namespace App\Livewire\EditProfile;

use Livewire\Component;

class Contact extends Component
{
    public $currentUrl, $contact_number, $emergency_contact_name, $emergency_contact_relation, $emergency_contact_number;
    public function mount() {
        $this->currentUrl = url()->current();
        $this->contact_number = auth()->user()->contact_number;
        $this->emergency_contact_name = auth()->user()->emergency_contact_name;
        $this->emergency_contact_relation = auth()->user()->emergency_contact_relation;
        $this->emergency_contact_number = auth()->user()->emergency_contact_number;
    }

    public function render()
    {

        return view('livewire.edit-profile.contact');
    }

    public function store() {
        $this->validate([
            // contact_number starts with '09' and must be 11 characters long
            'contact_number' => 'required|regex:/^09[0-9]{9}$/',
            'emergency_contact_name' => 'required',
            'emergency_contact_relation' => 'required',
            'emergency_contact_number' => 'required|regex:/^09[0-9]{9}$/',
        ]);
        $user = auth()->user();
        $user->update([
            'contact_number' => $this->contact_number,
            'emergency_contact_name' => $this->emergency_contact_name,
            'emergency_contact_relation' => $this->emergency_contact_relation,
            'emergency_contact_number' => $this->emergency_contact_number,
            'profile_made' => 1,
        ]);

        return redirect()->route('home');
    }
        
}
