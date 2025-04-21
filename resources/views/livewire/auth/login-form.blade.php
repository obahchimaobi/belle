<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <form method="post" action="#" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="CustomerEmail">Email</label>
                    <input type="email" name="customer[email]" placeholder="" id="CustomerEmail" class=""
                        autocorrect="off" autocapitalize="off" autofocus="">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="CustomerPassword">Password</label>
                    <input type="password" value="" name="customer[password]" placeholder="" id="CustomerPassword"
                        class="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                <input type="submit" class="btn mb-3" value="Sign In">
                <p class="mb-4">
                    <a href="{{ route('forgot.password') }}" id="RecoverPassword">Forgot your password?</a> &nbsp; |
                    &nbsp;
                    <a href="{{ route('register') }}" id="customer_register_link">Create account</a>
                </p>
            </div>
        </div>
    </form>
</div>
