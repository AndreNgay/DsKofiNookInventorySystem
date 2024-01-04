<?php

namespace App\Livewire\EditProfile;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
class Email extends Component
{
    public $email, $user;
    public function mount() {
        $this->email = auth()->user()->email;
        $this->user = auth()->user();
    }
    public function render()
    {
        return view('livewire.edit-profile.email');
    }

    public function update() {
        $this->validate([
            'email' => 'required|email|unique:users,email,' . $this->user->id,
        ]);
        $this->user->update([
            'email' => $this->email,
        ]);
        $this->sendVerificationEmail($this->user);
        session()->flash('message', 'Verification email sent, please check your email');
    }

    public function sendVerificationEmail($user) {
        Mail::to($user->email)->send(new VerifyEmail($user));
    }
    
}
