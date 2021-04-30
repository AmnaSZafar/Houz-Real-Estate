@extends('layouts.app')

@section('content')
    <div class="login-dark">
        @if (session('status'))
            <div role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="container mt-5 text-danger p-4 shadow-lg">
            <center>
                <h5 class="display-5">{{ __('Reset Password') }}</h5>
            </center>
        </div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <label for="email" class="block text-danger text-sm mb-2">{{ __('E-Mail Address') }}:</label>
            <div class="form-group">
                <input class="form-control text-danger @error('email') border-outline-danger @enderror" autocomplete="email" autofocus required type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>
            @error('email')
            <p class="text-danger text-xs mt-4">
                {{ $message }}
            </p>
            @enderror

            <div class="flex flex-wrap justify-center items-center pb-6">
                <button type="submit"
                class="btn btn-outline-danger">
                    {{ __('Send Password Reset Link') }}
                </button>

                <p class="mt-4 text-xs text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline hover:underline sm:text-sm sm:order-0 sm:m-0">
                    <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
                        {{ __('Back to login') }} 
                    </a>
                </p>
            </div>
        </form>
    </div>
@endsection
