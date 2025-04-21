<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class RegisterForm extends Component
{
    public $first_name;

    public $last_name;

    public $email;

    public $password;

    public function save()
    {
        $validate = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        $name = $validate['first_name'] . ' ' . $validate['last_name'];
        $email = $validate['email'];
        $password = $validate['password'];

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        return redirect()->route('login')->with(['success' => 'Registeration Successful', 'message' => 'We sent you a verification link to your email. Verify your email']);
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
