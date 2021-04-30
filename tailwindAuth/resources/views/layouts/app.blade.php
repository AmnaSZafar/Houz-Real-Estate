<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>HOUZ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/download.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    
    
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <div class="container">
            <a class="navbar-brand text-danger" href="{{ url('/') }}" class="scrollto"><i class="fab fa-accusoft"></i> HOUZ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div  class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    
                    
                    @guest
                        <li class="navbar-item">
                            <a class="navbar-link text-danger" href="{{ route('login') }}">&nbsp; {{ __('Login') }} &nbsp;</a>
                        </li>
                        
                    
                    @else
                        @if (Auth::user()->is_admin==1)
                            <li class="navbar-item">
                                <a class="navbar-link text-danger" href="{{ route('admin.view') }}">&nbsp; admin DASHBOARD &nbsp;</a>
                            </li>
                            <li class="navbar-item">
                                <a href="{{ route('logout') }}" class="navbar-link text-danger"onclick="event.preventDefault();document.getElementById('logout-form').submit();">&nbsp; {{ __('Logout') }}&nbsp;</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        @else
                            <li class="navbar-item">
                                <h6 class=" display-6 navbar-link text-danger" href="/home"> &nbsp; Welcome {{ Auth::user()->name }} &nbsp;</h6>
                            </li>
                            
                            <li class="navbar-item">
                                <a class="navbar-link text-danger" href="/home">&nbsp; Home &nbsp;</a>
                            </li>
                            <li class="navbar-item">
                                <a class="navbar-link text-danger" href="/home/create">&nbsp; Add Property &nbsp;</a>
                            </li>
                            <li class="navbar-item">
                                <a href="{{ route('logout') }}" class="navbar-link text-danger"onclick="event.preventDefault();document.getElementById('logout-form').submit();">&nbsp; {{ __('Logout') }}&nbsp;</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        @endif
                    @endguest
                </ul>
                {{-- <h6 class="m-auto display-6 navbar-link text-danger href="/home"> &nbsp; Welcome {{ Auth::user()->name }} &nbsp;</h6> --}}
            </div>
        </div>
    </nav>

    @yield('content')
    
    <br><br>

    @include('layouts.footer')

</body>
</html>
