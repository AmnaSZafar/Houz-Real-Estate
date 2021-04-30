@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <div class="jumbotron">
            <h4 class="display-6 text-danger">Want to rent or sell your property quickly?</h4>
            <p class="lead text-muted">Enter your property details to get listed on our website</p>
        </div>
        <center>
            <h5 class="display-5 lead text-danger m-5">
                UPDATE
            </h5>
        </center>
        
        <form action="/home/{{ $property->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <input class="btn btn-outline-danger" type="file" name="image" value="{{ $property->image_path }}">
            </div>
            <div class="form-row">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-danger">
                    <input type="radio" name="option" value="0"> Rent
                    </label>
                    <label class="btn btn-outline-danger">
                    <input type="radio" name="option" value="1"> Sell
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" value="0" name="inlineRadioOptions" id="inlineRadio1" >
                    <label class="form-check-label" for="inlineRadio1">Residential</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" value="1" type="radio" name="inlineRadioOptions" id="inlineRadio2">
                    <label class="form-check-label" for="inlineRadio2">Commercial</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" value="3" type="radio" id="inlineRadio3" name="inlineRadioOptions">
                    <label class="form-check-label" for="inlineCheckbox2">Plot</label>
                </div>
            </div>
            <br>
            <hr> 
            <div class="form-row">
                <div class="form-group">
                    <label>Land Area in Marla</label>
                    <input type="number" class="form-control" placeholder="8 Marla.." name="area" value="{{ $property->area }}">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" class="form-control"  placeholder="Your asking amount" name="price" value="{{ $property->price }}">
                </div>
            </div>
            <hr>
          
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
        <br>
    </div>
@endsection