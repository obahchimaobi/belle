<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <form wire:submit.prevent='verify_email' id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">
        @csrf
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="CustomerPassword">Enter Code</label>
                    <input type="text" value="" name="customer[password]" placeholder="" id="CustomerPassword" class="" wire:model='code' required>

                    @error('code')
                        <span class="text-danger mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                {{-- <input type="submit" class="btn mb-3" value="Sign In"> --}}
                <button type="submit" class="btn mb-3">
                    <span wire:loading.remove.delay>Verify</span>

                    <span wire:loading.delay>Loading...</span>
                </button>
            </div>
        </div>
    </form>
</div>
