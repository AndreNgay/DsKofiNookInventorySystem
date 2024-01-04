<?php

namespace App\Livewire\Accounts;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Page extends Component
{   
    public $users;
    public $account_id, $amount, $password, $role, $archived_users=[];
    
    public function render()
    {
        $this->users=User::where('archived', false)->get();
        return view('livewire.accounts.page');
    }
    
    public function setArchivedUsers() {
        $this->archived_users = User::where('archived', true)->get();
    }

    public function recover($id) {
        $this->account_id = $id;
        $user = User::find($this->account_id);
        $user->update([
            'archived' => false,
        ]);
        $this->setArchivedUsers();
        session()->flash('message', 'Account recovered successfully');
    }

    public function resetInputs() {
        $this->amount=null;
        $this->password=null;
    }
    public function create() {
        $this->resetInputs();
    }

    public function store() {
        $this->validate([
            'amount' => 'required',
            'password' => 'required',
        ]);

        // check if password matches
        if (!Hash::check($this->password, auth()->user()->password)) {
            return session()->flash('error', 'Incorrect password');
        }
        else {
            if(Auth::user()->role == 'owner') {
                $this->role = 'employee';
            
            }
            for ($i = 0; $i < $this->amount; $i++) {
                $maxUserId = $this->users->max('id');
                $username = 'kofi-nook' . ($maxUserId + 1 + $i);
                $password = 'kofi-nook';
    
                User::create([
                    'username' => $username,
                    'password' => Hash::make($password),
                    'role' => $this->role,
                    'verification_token' => Str::random(60),
                ]);
            }
        }
        session()->flash('message', 'Accounts created successfully');
        $this->resetInputs();
    }

    public function resetPassword($id){
        $this->account_id = $id;
        $account = User::find($this->account_id);
        $account->update([
            'password' => Hash::make('kofi-nook')
        ]);
        session()->flash('message', 'Password reset successfully');
    }

    public function delete($id) {
        $this->account_id = $id;
    }

    public function archive() {
        $user = User::find($this->account_id);
        $user->archived = true;
        $user->save();
        session()->flash('message', 'Account archived successfully');
    }

    public function destroy() {
        User::destroy($this->account_id);
        session()->flash('message', 'Account deleted successfully');
        $this->resetInputs();
    }
}
