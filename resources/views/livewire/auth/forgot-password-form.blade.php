<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <form wire:submit.prevent='reset_password' class="contact-form">
        @csrf
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="CustomerEmail">Email</label>
                    <input type="email" name="customer[email]" placeholder="" id="CustomerEmail" class="" autocorrect="off" autocapitalize="off" autofocus="" wire:model='email'>

                    @error('email')
                        <span class="text-danger mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                {{-- <input type="submit" class="btn mb-3" value="Reset Password"> --}}
                <button type="submit" class="btn mb-3">
                    <span wire:loading.remove.delay>Reset Password</span>
                    <span wire:loading.delay>Loading...</span>
                </button>
                <p class="mb-4">
                    Remebered your password?
                    <a href="{{ route('login') }}" id="customer_register_link">Login</a>
                </p>
            </div>
        </div>
    </form>
</div>
