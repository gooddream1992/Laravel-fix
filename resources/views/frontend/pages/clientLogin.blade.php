@extends('masters.loginFrontMaster')

@section('title', __('Client Login'))
@section('main')
<?php
$hedfoots = \App\HeaderFooter::orderBy('id', 'desc')->first();
$footerlogo = $hedfoots->footerLogo;
?>
<style>
    nav.navbar-inverse {
    display: none;
}
footer .footer1 {
    display: none;
}
footer .footer2 {
    display: none;
}

.top-header-bar .header nav.menu .hamburger {
    display: none;
}
</style>

<section class="auth-page sign-in-page auth-signin-page" style="background-image: url('{{asset('public/uploads/no-fake-profile-bg.jpg')}}'); background-size:cover;background-position: center;">
    @if (session('status'))
    <div class="container">
        <div class="alert alert-success" align="center">
            {{ session('status') }}
        </div>
    </div>
    @endif
    <div class="container">
        <div class="auth-box">
            <div class="row">
                <div class="col-lg-12">
                    <img src="{{asset('public/uploads/'.$footerlogo)}}" class="auth-logo" />




                    <form method="POST" action="{{ route('login') }}" >
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email ID" required="">
                            @if ($errors->has('email'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ __('Oh snap!') }}</strong> {{ $errors->first('email') }}
                            </div>

                            @endif
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required="">
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="auth-remember-part">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                    <label class="custom-control-label" for="customCheck">Remember me</label>
                                </div>
                                <a href="{{ url('forgotpassword') }}">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn red-small btn-block c-center" value="Login">
                        </div>
                        <div class="form-group mb-0">
                            <div class="new-account-user">
                                <b style="color:white">New Client? </b>
                                <a class="btn red-small c-center" href="{{url('client/signup')}}" style="margin-left: 10px;">Signup</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection