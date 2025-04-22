@component('mail::message')

@if(config('app.logo'))
<img src="{{ asset(config('app.logo')) }}" alt="{{ config('app.name') }} Logo" style="max-width: 150px; margin: 0 auto 20px; display: block;">
@endif

# 🔐 Password Changed Successfully

Hello {{ $user->name }},

This is a confirmation that your password for **{{ config('app.name') }}** has been successfully changed.

If you made this change, no further action is required.

---

### 🧾 Change Summary
@component('mail::panel')
- **User:** {{ $user->email }}
- **Date:** {{ now()->format('F j, Y, g:i a') }}
- **IP Address:** {{ request()->ip() }}
@endcomponent

---

### ⚠️ Didn't change your password?
If you did **not** request this change, please reset your password immediately from your account settings or contact our support team for assistance.

Keeping your account secure is our top priority.

Thanks,
The **{{ config('app.name') }}** Team

@component('mail::subcopy')
If you have any questions, feel free to contact our support team at [support@{{ parse_url(config('app.url'), PHP_URL_HOST) }}](mailto:support@{{ parse_url(config('app.url'), PHP_URL_HOST) }}).
@endcomponent

@endcomponent
