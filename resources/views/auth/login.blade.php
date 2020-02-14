@extends('layouts.login-layout')

@section('title', 'Login Nomads')

@section('content')
<div class="login-container">
    <div class="container">
        <div class="row page-login d-flex align-items-center">
            <div class="section-left col-12 col-md-6">
                <h1 class="mb-4">
                    We explore the new <br> life much better
                </h1>
                <img src="{{url('frontend/images/login-image.png')}}" alt="Login Gallery" class="w-75 d-none d-sm-flex">
            </div>
            <div class="section-right col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{url("frontend/images/logo.png")}}" alt="Logo Nomads" class="w-50 mb-4">
                        </div>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="text" class="form-control @error('email') is-invalid
                                    @enderror" name="email" value="{{ old('email') }}" id="email" required>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password" required>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember" class="form-check-label">Remember Me</label>
                            </div>

                            <button type="submit" class="btn btn-login btn-block">Sign In</button>

                            @if (Route::has('password.request'))
                            <p class="forgot-pwd text-center mt-4">
                                <a href="{{ route('password.request') }}">Lupa password kamu?</a>
                            </p>
                            @endif

                            <p class="text-center mt-4">
                                Belum punya akun? <a href="{{route('register')}}">Daftar</a> Sekarang!
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection