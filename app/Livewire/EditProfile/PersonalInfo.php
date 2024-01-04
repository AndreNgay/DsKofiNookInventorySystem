<?php

namespace App\Livewire\EditProfile;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use App\Models\User;

class PersonalInfo extends Component
{
    // name
    public $name;

    //contact
    public $contact_number, $emergency_contact_name, $emergency_contact_relation, $emergency_contact_number;

    //address
    public $house_number, $street, $barangay, $city, $province;
    public function mount() {
        $this->name = auth()->user()->name;
        $this->contact_number = auth()->user()->contact_number;
        $this->emergency_contact_name = auth()->user()->emergency_contact_name;
        $this->emergency_contact_relation = auth()->user()->emergency_contact_relation;
        $this->emergency_contact_number = auth()->user()->emergency_contact_number;
        $this->house_number = auth()->user()->house_number;
        $this->street = auth()->user()->street;
        $this->barangay = auth()->user()->barangay;
        $this->city = auth()->user()->city;
        $this->province = auth()->user()->province;
    }
    public function render()
    {
        return view('livewire.edit-profile.personal-info');
    }

    public function store() {
        $this->validate([
            'name' => 'required',
            'contact_number' => 'required|regex:/^09[0-9]{9}$/',
            'emergency_contact_name' => 'required',
            'emergency_contact_relation' => 'required',
            'emergency_contact_number' => 'required|regex:/^09[0-9]{9}$/',
            'house_number' => 'required',
            'street' => 'required',
            'barangay' => 'required',
            'city' => 'required',
            'province' => 'required',
        ]);

        $user = auth()->user();
        $user->update([
            'name' => $this->name,
            'contact_number' => $this->contact_number,
            'emergency_contact_name' => $this->emergency_contact_name,
            'emergency_contact_relation' => $this->emergency_contact_relation,
            'emergency_contact_number' => $this->emergency_contact_number,
            'house_number' => $this->house_number,
            'street' => $this->street,
            'barangay' => $this->barangay,
            'city' => $this->city,
            'province' => $this->province,
            'profile_made' => 1
        ]);
        return redirect()->route('home');
    }
}
