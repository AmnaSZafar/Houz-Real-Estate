<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}"></script>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
     <script>
        $(window).scroll(function(){
            $('nav').toggleClass('scrolled', $(this).scrollTop()>100);
        });
        $(document).ready(function(){
            $(".seeMoreText").hide();
            $(".seeMore").click(function(){
                var txt = $(".seeMoreText").is(':visible')?'See More' : 'See Less';
                $(".seeMore").text(txt);
                $(this).next('.seeMoreText').slideToggle(200);
            });
        });
        
    </script>
    <style>
        .bg-dark{
            background: transparent !important;
            
        }
        .bg-dark.scrolled{
            background: rgba(255, 255, 255) !important;
            
            
        } 
         
    </style>
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-dark">
            <div class="container">
                <a class="navbar-brand text-danger" style="font-size: 25px; text-decoration:none;" href="/"><i class="fab fa-accusoft"></i> Houz.com</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div  class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="navbar-item">
                            <a class="navbar-link text-danger" style="font-size: 20px;  text-decoration: none;" href="sell"> &nbsp sell &nbsp</a>
                        </li>
                        <li class="navbar-item">
                            <a class="navbar-link text-danger" style="font-size: 20px;  text-decoration: none;" href="rent"> &nbsp rent &nbsp</a>
                        </li>
                        @if(Route::has('login'))
                            @auth
                                @if (Auth::user()->is_admin)
                                    <li class="navbar-item">
                                        <a class="navbar-link text-danger" style="font-size: 20px;  text-decoration: none;" href="{{ route('admin.view') }}"> &nbsp Admin Dashboard &nbsp</a>
                                    </li>
                                @else
                                    <li class="navbar-item">
                                        <a class="navbar-link text-danger" style="font-size: 20px;  text-decoration: none;" href="{{ url('/home') }}"> &nbsp {{ __('Dashboard') }} &nbsp</a>
                                    </li>
                                    <li class="navbar-item">
                                        <a class=" display-6 navbar-link text-danger" style="font-size: 20px;  text-decoration: none;" href="/home"> &nbsp; Welcome {{ Auth::user()->name }} &nbsp;</a>
                                    </li>
                                @endif
                                <li class="navbar-item">
                                    <a href="{{ route('logout') }}" class="navbar-link text-danger"onclick="event.preventDefault();document.getElementById('logout-form').submit();">&nbsp; {{ __('Logout') }}&nbsp;</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            
                            @else
                                
                                <li class="navbar-item">
                                    <a href="{{ route('login') }}" style="font-size: 20px;  text-decoration: none;" class="text-danger navbar-link"> &nbsp {{ __('Login') }} &nbsp </a>
                                </li>  
                                {{-- @if (Route::has('register'))
                                    <li class="navbar-item">
                                        <a href="{{ route('register') }}" class=" navbar-link text-danger">{{ __('Register') }} <span class="sr-only">(current)</span></a>
                                    </li>
                                @endif --}}
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    

    @yield('head')
    <br><br>
    @include('layouts.footer')
</body>
</html>