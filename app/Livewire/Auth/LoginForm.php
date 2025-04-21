<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

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
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
