<?php

namespace App\Livewire\Auth;

use App\Mail\RegisterMail;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use URL;

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

        // SETTING A TOKEN FOR THE NEW USER
        $length = 40;
        $token = Str::random($length);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'token' => $token,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'email.verify',
            now()->addMinutes(10),
            ['token' => $token, ],
        );

        Mail::to($email)->send(new RegisterMail($user, $token, $email, $verificationUrl));

        return redirect()->route('login')->with(['success' => 'Registeration Successful', 'message' => 'We sent you a verification link to your email. Verify your email']);
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
