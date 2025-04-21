@component('mail::message')
{{-- Optional Logo --}}
@if(config('app.logo'))
<img src="{{ asset(config('app.logo')) }}" alt="{{ config('app.name') }} Logo" style="max-width: 200px; margin: 0 auto; display: block; margin-bottom: 20px;">
@endif

{{-- Greeting --}}
# Hello {{ $name }},

We received a request to reset your password. Click the button below to reset your password securely:

@component('mail::button', ['url' => $resetUrl])
Reset Password
@endcomponent

This link will expire in 60 minutes. If you didn’t request a password reset, no further action is required.

---

### Need Help?
If you did not initiate this request or believe this is an error, please contact our support team immediately.

---

{{-- Footer Section --}}
Thank you for choosing {{ config('app.name') }}!

{{ config('app.name') }} Team

@component('mail::subcopy')
If you’re having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:
[{{ $resetUrl }}]({{ $resetUrl }})
@endcomponent
@endcomponent
