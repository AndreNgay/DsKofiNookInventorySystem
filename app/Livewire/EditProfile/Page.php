<?php

namespace App\Livewire\EditProfile;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;



class Page extends Component
{
    public $name, $email, $password, $confirm_password, $current_email;

    //contact
    public $contact_number, $emergency_contact_name, $emergency_contact_relation, $emergency_contact_number;

    //address
    public $house_number, $street, $barangay, $city, $province;

    public function mount() {
        $this->current_email = auth()->user()->email;
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
        $this->email = auth()->user()->email;
    }
    public function render()
    {
        $this->currentUrl = url()->current();
        return view('livewire.edit-profile.page');
    }

    public function update() {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => '',
            'confirm_password' => 'same:password',
            'contact_number' => 'required|numeric',
            'emergency_contact_name' => 'required|string',
            'emergency_contact_relation' => 'required|string',
            'emergency_contact_number' => 'required|numeric',
            'house_number' => 'required',
            'street' => 'required|string',
            'barangay' => 'required|string',
            'city' => 'required|string',
            'province' => 'required|string',
        ]);

        if($this->password == 'kofi-nook') {
            // display message password must not be the default password
            session()->flash('error', 'Password must not be the default password');
        }
        else if($this->password != '' && $this->confirm_password != '') {
            $this->validate([
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password'
            ]);
            $user = User::find(auth()->user()->id);
            $user->update([
                'password' => bcrypt($this->password),
            ]);
        }
        if($this->email != $this->current_email) {
            $this->validate([
                'email' => 'unique:users|email',
            ]);
            $user = User::find(auth()->user()->id);
            $user->update([
                'email' => $this->email,
                'verified' => false,
                'verification_token' => Str::random(40),
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
            ]);
            $this->sendVerificationEmail($user);
            Auth::logout();
            return redirect('/');
        }
        else{
            $user = User::find(auth()->user()->id);
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
            ]);
            session()->flash('message', 'Profile updated successfully');
        }
        $this->password = '';
        $this->confirm_password = '';
    }
    public function sendVerificationEmail($user) {
        Mail::to($user->email)->send(new VerifyEmail($user));
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
