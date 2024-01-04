<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Route;

class VerificationController extends Controller
{
    public function verify($token)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            return redirect('/edit-profile-email')->with('error', 'Invalid verification token.');
        }

        $user->update(['verified' => true, 'verification_token' => null]);
        if($user->profile_made) {
            return redirect('/')->with('message', 'Email verified. You may now log in.');
        }
        return redirect('/edit-profile-personal-info')->with('message', 'Email verified. You can now login.');
    }
}
