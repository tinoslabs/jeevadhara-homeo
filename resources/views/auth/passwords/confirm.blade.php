@extends('layouts.master-without-nav')

@section('title') {{ __("Confirm Password") }} @endsection

@section('body')
<body>
@endsection

@section('content')
    <div class="home-btn d-none d-sm-block">
        <a href="{{ url('/dashboard') }}" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20 p-2">{{ __("Confirm Password") }}</h5>
                                <img src="{{ URL::asset('build/images/logo-sm.png') }}" height="24" alt="logo">
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class="form-horizontal" method="POST"
                                    action="{{ route('password.confirm') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="userpassword">{{ __("Password") }}</label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required id="userpassword" placeholder="{{ __("Enter password") }}">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 row mb-0">
                                        <div class="col-12 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">{{ __("Confirm Password") }}</button>
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>{{ __("Remember It?") }} <a href="{{ url('login') }}" class="fw-medium text-primary">{{ __("Sign In here") }}</a></p>
                        <p class="mb-0">© {{ date('Y') }} {{ AppSetting('title'); }}. Crafted with <i class="mdi mdi-heart text-danger"></i> {{ __("by Themesbrand") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
