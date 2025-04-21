<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <form wire:submit.prevent='save' id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">
        @csrf
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="FirstName">First Name</label>
                    <input type="text" name="customer[first_name]" placeholder="" id="FirstName" autofocus="" wire:model='first_name'>

                    @error('first_name')
                        <span class="text-danger mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="LastName">Last Name</label>
                    <input type="text" name="customer[last_name]" placeholder="" id="LastName" wire:model='last_name'>

                    @error('last_name')
                        <span class="text-danger mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="CustomerEmail">Email</label>
                    <input type="email" name="customer[email]" placeholder="" id="CustomerEmail" class=""
                        autocorrect="off" autocapitalize="off" autofocus="" wire:model='email'>

                        @error('email')
                            <span class="text-danger mt-1">{{ $message }}</span>
                        @enderror
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="CustomerPassword">Password</label>
                    <input type="password" value="" name="customer[password]" placeholder="" id="CustomerPassword" class="" wire:model='password'>

                    @error('password')
                        <span class="text-danger mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                {{-- <input type="submit" class="btn mb-3" value="Create"> --}}
                <button type="submit" class="btn">
                    <span wire:loading.remove>Create</span>

                    <span wire:loading>Loading...</span>
                </button>
            </div>
        </div>
    </form>
</div>
