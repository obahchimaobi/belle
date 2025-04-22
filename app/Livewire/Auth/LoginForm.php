<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginForm extends Component
{
    public $email;

    public $password;

    public function login()
    {
        $validate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $validate['email'])->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Account not found!');
        }

        if ($user && is_null($user->email_verified_at)) {
            return redirect()->route('login')->with('error', 'Email not verified');
        }

        if ($user && !Hash::check($validate['password'], $user->password)) {
            return redirect()->route('login')->with('error', 'Incorrect email or password combination');
        }

        Auth::login($user);
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
