@extends('layouts.app')

@section('title')
    Login
@endsection

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
                        <livewire:auth.login-form />
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--End Body Content-->
@endsection
