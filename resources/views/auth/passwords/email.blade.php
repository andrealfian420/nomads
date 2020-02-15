@extends('layouts.login-layout')

@section('title', 'Register Nomads')

@section('content')
<div class="login-container">
    <div class="container">
        <div class="row page-login d-flex align-items-center">
            <div class="section-left col-12 col-md-6">
                <h1 class="mb-4">
                    Forgot your password? <br> Don't worry, we got it covered !
                </h1>
                <img src="{{url('frontend/images/forgot-image.png')}}" alt="Register Gallery"
                    class="w-75 d-none d-sm-flex">
            </div>
            <div class="section-right col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{url("frontend/images/logo.png")}}" alt="Logo Nomads" class="w-50 mb-4">
                        </div>

                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form action="{{ route('password.email') }}" method="POST">
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

                            <button type="submit" class="btn btn-login btn-block">
                                Send Confirmation Link
                            </button>

                            <p class="text-center mt-4">
                                Sudah punya akun? Yuk <a href="{{route('login')}}">Masuk</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection