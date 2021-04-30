@extends('layouts.app')
@section('content')
    <div class="login-dark">
        <header class="container mt-5 text-danger p-4 shadow-lg">
            <center>
                <h5 class="display-5">{{ __('Login') }}</h5>
            </center>
        </header>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="flex flex-wrap">
                <label for="email" class="block text-danger text-sm mb-2">{{ __('E-Mail Address') }}:</label>
                <div class="form-group">
                    <input class="form-control text-danger @error('email') border-outline-danger @enderror" required type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                </div>
                @error('email')
                <p class="text-danger text-xs mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="flex flex-wrap">
                <label for="password" class="block text-danger text-sm font-bold mb-2">{{ __('Password') }}:</label>
                <div class="form-group">
                    <input class="form-control text-danger @error('password') border-outline-danger @enderror" id="password" type="password" name="password" placeholder="Password" required>
                </div>
                @error('password')
                <p class="text-danger text-xs mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex items-center">
                <label class="items-center text-sm text-muted" for="remember">
                    <input type="checkbox" name="remember" id="remember" class="form-checkbox"
                        {{ old('remember') ? 'checked' : '' }}>
                    <span class="ml-2">{{ __('Remember Me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-danger no-underline hover:underline ml-auto"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>

            <div class="flex flex-wrap">
                <button type="submit" class="btn btn-outline-danger">
                    {{ __('Login') }}
                </button>

                @if (Route::has('register'))
                <p class="text-dark text-center lead my-6">
                    {{ __("Don't have an account?") }}
                    <a class="text-danger text-center my-6" href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                </p>
                @endif
            </div>
        </form>
    </div>
@endsection
