<?php

namespace App\Livewire\Auth;

use App\Mail\ResetMail;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordForm extends Component
{
    public $email;

    public function reset_password()
    {
        $validate = $this->validate([
            'email' => 'required',
        ]);

        // get the user
        $user = User::where('email', $validate['email'])->first();

        if (!$user) {
            return redirect()->route('forgot.password')->with('error', 'Email not found.');
        }

        $name = $user->name;
        $token = $user->token;
        $resetUrl = URL::temporarySignedRoute(
            'password.reset',
            now()->addMinutes(10),
            ['token' => $token],
        );

        Mail::to($validate['email'])->send(new ResetMail($name, $token, $resetUrl));

        return redirect()->route('forgot.password')->with('success', 'Password reset link sent');
    }

    public function render()
    {
        return view('livewire.auth.forgot-password-form');
    }
}
