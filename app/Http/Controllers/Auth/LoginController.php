<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');

        if (auth()->attempt($credentials)) {
            $user = auth()->user();

            // Check if the user's account is archived
            if ($user->archived == 1) {
                auth()->logout();
                throw ValidationException::withMessages([
                    $this->username() => ['Your account is archived. You cannot log in.'],
                ]);
            }

            // Your regular login logic here...
            return redirect()->intended($this->redirectTo);
        }

        // Your regular login error handling...
        return $this->sendFailedLoginResponse($request);
    }
}
