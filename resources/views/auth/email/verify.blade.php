@component('mail::message')

@if(config('app.logo'))
<img src="{{ asset(config('app.logo')) }}" alt="{{ config('app.name') }} Logo" style="max-width: 150px; margin: 0 auto 20px; display: block;">
@endif

# 👋 Welcome, {{ $user->name }}!

Thanks for signing up for **{{ config('app.name') }}** — we’re excited to have you on board.

To activate your account, please verify your email address by entering the code below in the verification field.

---

### ✅ Your Verification Code:
@component('mail::panel')
<h2 style="text-align: center; font-size: 28px; letter-spacing: 3px;">{{ $code }}</h2>
@endcomponent

---

This code will expire in **10 minutes**, so be sure to complete your verification as soon as possible.

### 🔒 Why is email verification important?
- Ensures your account is secure
- Unlocks full access to our features
- Keeps you in the loop with important updates

---

If you didn't sign up for a {{ config('app.name') }} account, feel free to ignore this email — no further action is required.

Thanks again for joining us!
— The **{{ config('app.name') }}** Team

@component('mail::subcopy')
Need help? Contact our support team or visit our help center anytime.
@endcomponent

@endcomponent
