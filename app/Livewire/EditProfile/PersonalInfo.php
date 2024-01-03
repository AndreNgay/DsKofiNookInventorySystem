<?php

namespace App\Livewire\EditProfile;

use Livewire\Component;

class PersonalInfo extends Component
{
    public $house_number, $street, $barangay, $city, $province;
    public function render()
    {
        $this->house_number = auth()->user()->house_number;
        $this->street = auth()->user()->street;
        $this->barangay = auth()->user()->barangay;
        $this->city = auth()->user()->city;
        $this->province = auth()->user()->province;
        return view('livewire.edit-profile.personal-info');
    }

    public function store() {
        $this->validate([
            'house_number' => 'required',
            'street' => 'required',
            'barangay' => 'required',
            'city' => 'required',
            'province' => 'required',
        ]);

        $user = auth()->user();
        $user->update([
            'house_number' => $this->house_number,
            'street' => $this->street,
            'barangay' => $this->barangay,
            'city' => $this->city,
            'province' => $this->province,

        ]);
        return redirect()->route('edit-profile-contact');
    }
}
