<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use Livewire\Component;

class VerifyTemplateForm extends Component
{
    #[Url(as: 'token')]
    public $token = '';

    public $code_digits = [];

    public function getCodeProperty()
    {
        return implode('', $this->code_digits);
    }

    public function verify_email()
    {
        $this->validate([
            'code_digits' => 'array|size:6',
            'code_digits.*' => 'required|string|size:1',
        ]);
        
        // get user based on the token
        $user = User::where('token', $this->token)->firstOrFail();

        // update the db
        $user->email_verified_at = now();
        $user->token = Str::random(40);
        $user->verification_code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $user->save();

        return redirect()->route('login')->with('success', 'Email verified successfully');
    }

    public function verify_code()
    {
    }

    public function render()
    {
        return view('livewire.auth.verify-template-form');
    }
}
