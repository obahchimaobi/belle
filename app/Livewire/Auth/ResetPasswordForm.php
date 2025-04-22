<?php

namespace App\Livewire\Auth;

use Hash;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use App\Mail\PasswordChanged;
use Illuminate\Support\Facades\Mail;

class ResetPasswordForm extends Component
{
    #[Url(as: 'token')]
    public $token = '';

    public $new_password;

    public $confirm_password;

    public function reset_password()
    {
        $validate = $this->validate([
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:new_password',
        ]);

        $user = User::where('token', $this->token)->firstOrFail();

        $user->password = Hash::make($validate['new_password']);
        $user->token = Str::random(40);
        $user->save();

        Mail::to($user->email)->send(new PasswordChanged($user));

        return redirect()->route('login')->with('success', 'Password changed successfully');
    }

    public function render()
    {
        return view('livewire.auth.reset-password-form');
    }
}
