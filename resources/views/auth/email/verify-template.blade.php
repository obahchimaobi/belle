@extends('layouts.app')

@section('content')
<!--Body Content-->
<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Login</h1>
            </div>
        </div>
    </div>
    <!--End Page Title-->

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                <div class="mb-4">
                    <form wire:submit.prevent='login' id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerPassword">Enter Code</label>
                                    <input type="text" value="" name="customer[password]" placeholder="" id="CustomerPassword" class="" wire:model='password'>

                                    @error('password')
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

                                    {{-- <span wire:loading.delay>Loading...</span> --}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!--End Body Content-->
@endsection
