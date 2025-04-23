<?php

namespace App\Livewire\Auth;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;
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
            'password' => 'required|min:8',
        ]);

        $name = $validate['first_name'].' '.$validate['last_name'];
        $email = $validate['email'];
        $password = $validate['password'];

        // SETTING A TOKEN FOR THE NEW USER
        $length = 40;
        $token = Str::random($length);
        $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'token' => $token,
            'verification_code' => $code,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'email.verify',
            now()->addMinutes(10),
            ['token' => $token],
        );

        Mail::to($email)->send(new RegisterMail($user, $token, $email, $code));

        // Auth::login($user);

        return redirect()->route('email.verify', ['token' => $token])->with(['success' => 'Registeration Successful', 'message' => 'We sent a code to your email. Use the code and verify your email.']);
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
