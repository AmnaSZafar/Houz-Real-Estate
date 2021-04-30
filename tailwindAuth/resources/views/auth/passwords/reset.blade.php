@extends('layouts.app')

@section('content')
    <div class="login-dark">
        <header class="container mt-5 text-danger p-4 shadow-lg">
            <center>
                <h5 class="display-5">{{ __('Reset Password') }}</h5>
            </center>
        </header>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="flex flex-wrap">
                <label for="email" class="block text-danger text-sm mb-2">
                    {{ __('E-Mail Address') }}:
                </label>

                <input id="email" type="email"
                    class="form-control text-danger @error('email') border-outline-danger @enderror" name="email"
                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                <label for="password-confirm" class="block text-danger text-sm mb-2">
                    {{ __('Confirm Password') }}:
                </label>

                <input id="password-confirm" type="password" class="form-control text-danger"
                    name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="flex flex-wrap pb-8 sm:pb-10">
                <button type="submit"
                class="btn btn-outline-danger">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
@endsection
