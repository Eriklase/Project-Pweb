@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('content')
<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <h1>Register</h1>
            <p>Join SIAKAD Portal</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your Full Name">
                
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com">
                
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="••••••••">
                
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
            </div>

            <button type="submit" class="btn-login">
                {{ __('Register Now') }}
            </button>

            <div class="form-footer">
                <p style="color: var(--text-muted); font-size: 0.875rem;">
                    Already have an account? <a href="{{ route('login') }}" style="color: #818cf8;">Login</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
