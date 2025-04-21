<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <form wire:submit.prevent='save' id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">
        @csrf
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="FirstName">First Name</label>
                    <input type="text" name="customer[first_name]" placeholder="" id="FirstName"
                        autofocus="">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="LastName">Last Name</label>
                    <input type="text" name="customer[last_name]" placeholder="" id="LastName">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="CustomerEmail">Email</label>
                    <input type="email" name="customer[email]" placeholder="" id="CustomerEmail"
                        class="" autocorrect="off" autocapitalize="off" autofocus="">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="CustomerPassword">Password</label>
                    <input type="password" value="" name="customer[password]" placeholder=""
                        id="CustomerPassword" class="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                <input type="submit" class="btn mb-3" value="Create">
            </div>
        </div>
    </form>
</div>
