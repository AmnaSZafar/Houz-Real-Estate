@extends('layouts.app')

@section('content')
        @if (session('status'))
            <div class="text-sm border border--8 rounded text-danger bg-light px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="container">
            <header class="container mt-5 text-danger p-4 shadow-lg">
                <center>
                    <h5 class="display-5">Your Property Listing</h5>
                </center>
            </header>
            <br>
        
            <div class="card-columns">
                @foreach ($property as $p)
                    @if($p->user_id==auth()->id())
                        <div class="card border border-light rounded shadow-lg text-danger">
                            <img class="card-img-top" src="{{ asset('images/'.$p->image_path) }}" alt="" width="150" height="200">
                            <div class="card-body text-center">
                                
                            <p class="card-text">@if ($p->type == 0)
                                Residential area of 
                            @elseif ($p->type == 1)
                                Commercial area of 
                            @else
                                Plot of
                            @endif
                            {{ $p->area }} marlas is available for
                            @if ( $p->result )
                                sell.
                            @else
                                rent.
                            @endif
                            The asking price is {{ $p->price }}.</p>
                            </div>
                            <hr>
                            <div class="container my-2">
                                <a href="/home/{{ $p->id }}/edit"> edit &rarr;
                                </a>
                                <form action="/home/{{ $p->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">delete &rarr;</button>
                                </form>
                            </div>
                            
                        </div>
                    
                    @endif
                @endforeach
            </div>
        </div>
        @if ($errors->any())
            @foreach($errors->any() as $err)
                <ul>
                    <li>
                        {{ $err }}
                    </li>
                </ul>
            @endforeach
        @endif
@endsection
