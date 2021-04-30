@extends('layouts.app')
@section('content')
<div class="container">
    <header class="container mt-5 text-danger p-4 shadow-lg">
        <center>
            <h5 class="display-5">Your Searches</h5>
        </center>
    </header>
    <br>
    @foreach ($property as $p)
        <div class="card border border-light rounded shadow-lg">
            <img class="card-img-top" src="{{ asset('images/'.$p->image_path) }}" alt="">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">
                @if ($p->type == 0)
                Residential area of 
                @elseif ($p->type == 1)
                    Commercial area of 
                @else
                    Plot of
                @endif
                {{ $p->area }} marlas is available for
                @if ( $p->result==1 )
                    sell.
                @else
                    rent.
                @endif
                The asking price is {{ $p->price }}.
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>  
        <br>
    @endforeach
</div>
@endsection