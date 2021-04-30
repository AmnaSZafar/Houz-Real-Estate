@extends('layouts.app')

@section('content')
                
    <div class="login-dark">
        <header class="container mt-5 text-danger p-4 shadow-lg">
            <center>
                <h5 class="display-5">{{ __('Register') }}</h5>
            </center>
        </header>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex flex-wrap">
                <label for="name" class="block text-danger text-sm mb-2">
                    {{ __('Name') }}:
                </label>
                <input id="name" type="text" class="form-control text-danger @error('name') border-danger @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <p class="text-danger text-xs mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="flex flex-wrap">
                <label for="email" class="block text-danger text-sm mb-2">
                    {{ __('E-Mail Address') }}:
                </label>

                <input id="email" type="email"
                    class="form-control text-danger @error('email') border-outline-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <p class="text-danger text-xs mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex flex-wrap">
                <label for="password" class="block text-danger text-sm mb-2">
                    {{ __('Password') }}:
                </label>

                <input id="password" type="password"
                    class="form-control text-danger @error('password') border-outline-danger @enderror" name="password"
                    required autocomplete="new-password">

                @error('password')
                <p class="text-danger text-xs mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex flex-wrap">
                <label for="password-confirm" class="block text-danger text-sm font-bold mb-2">
                    {{ __('Confirm Password') }}:
                </label>

                <input id="password-confirm" type="password" class="form-control text-danger @error('password') border-outline-danger @enderror"
                    name="password_confirmation" required autocomplete="new-password">
            </div>
            <br>

            <div class="flex flex-wrap">
                <button type="submit"
                    class="btn btn-outline-danger">
                    {{ __('Register') }}
                </button>
                <p class="text-dark text-center lead my-6">
                    {{ __('Already have an account?') }}
                    <a class="text-danger text-center my-6" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                </p>
            </div>
        </form>
    </div>
@endsection
