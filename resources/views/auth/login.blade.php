@extends('layouts.master-without-nav')
@section('title') {{ __("Login") }} @endsection
@section('body')
<body>
@endsection
@section('content')
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary-subtle">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">{{ __("Welcome Back !") }}</h5>
                                        <p>Sign in to continue to {{ AppSetting('title') }}.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ URL::asset('build/images/profile-img.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="{{ url('/dashboard') }}" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ URL::asset('build/images/logo-light.svg') }}" alt=""
                                                class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                                <a href="{{ url('/dashboard') }}" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ URL::asset('build/images/logo.svg') }}" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form class="form-horizontal" method="POST" action="{{ url('login') }}">
                                    @csrf
                                    @if ($msg = Session::get('error'))
                                        <div class="alert alert-danger">
                                            <span> {{ $msg }} </span>
                                        </div>
                                    @endif
                                    @if ($msg = Session::get('success'))
                                        <div class="alert alert-success">
                                            <span> {{ $msg }} </span>
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <label for="username">{{ __("Username") }} <span class="text-danger">*</span></label>
                                        <input name="email" type="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            @if (old('email')) value="{{ old('email') }}" @else value="admin@themesbrand.website" @endif id="username" placeholder="Enter username"
                                            autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="userpassword">{{ __("Password") }} <span class="text-danger">*</span></label>
                                        <input type="password" name="password" id="pass"
                                            class="form-control  @error('password') is-invalid @enderror"
                                            id="userpassword" @if (old('password')) value="{{ old('password') }}" @else value="admin@123456" @endif placeholder="Enter password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="remember"
                                            id="customControlInline">
                                        <label class="form-check-label" for="customControlInline">{{ __("Remember me") }}</label>
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light"
                                            type="submit">{{ __("Log In") }}</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <a href="{{ url('forgot-password') }}" class="text-muted"><i
                                                class="mdi mdi-lock me-1"></i> {{ __("Forgot your password?") }}</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>{{ __("Don't have an account ?") }} <a href="{{ url('register') }}"
                                class="fw-medium text-primary"> {{ __("Sign Up here") }}</a> </p>
                        <p>© {{ date('Y') }} {{ AppSetting('title'); }}. Crafted with <i class="mdi mdi-heart text-danger"></i> {{ __("by Themesbrand") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
@endsection
