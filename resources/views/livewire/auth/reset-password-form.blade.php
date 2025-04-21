<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <form wire:submit.prevent='reset_password' id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">
        @csrf
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="CustomerEmail">New Password</label>
                    <input type="password" name="customer[email]" placeholder="" id="CustomerEmail" class="" autocorrect="off" autocapitalize="off" autofocus="" wire:model='new_password'>

                    @error('new_password')
                        <span class="text-danger mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="CustomerPassword">Confirm Password</label>
                    <input type="password" value="" name="customer[password]" placeholder="" id="CustomerPassword" class="" wire:model='confirm_password'>

                    @error('confirm_password')
                        <span class="text-danger mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                {{-- <input type="submit" class="btn mb-3" value="Sign In"> --}}
                <button type="submit" class="btn mb-3">
                    <span wire:loading.remove.delay>Sign In</span>

                    <span wire:loading.delay>Loading...</span>
                </button>
                <p class="mb-4">
                    <a href="{{ route('forgot.password') }}" id="RecoverPassword">Forgot your password?</a> &nbsp; |
                    &nbsp;
                    <a href="{{ route('register') }}" id="customer_register_link">Create account</a>
                </p>
            </div>
        </div>
    </form>
</div>
