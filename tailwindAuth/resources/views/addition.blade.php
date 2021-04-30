@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <div class="jumbotron">
            <h4 class="display-6 text-danger">Want to rent or sell your property quickly?</h4>
            <p class="lead text-muted">Enter your property details to get listed on our website</p>
        </div>
        <form action="/home" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <input class="btn btn-outline-danger" type="file" name="image">
            </div>
            <br>
            <div class="form-row">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-danger active">
                        <input type="radio" name="option" value="0"  autocomplete="off" checked> Rent
                    </label>
                    <label class="btn btn-outline-danger">
                        <input type="radio" name="option" value="1"  autocomplete="off"> Sell
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" value="1" name="inlineRadioOptions" id="inlineRadio1" >
                    <label class="form-check-label" for="inlineRadio1">Residential</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" value="2" type="radio" name="inlineRadioOptions" id="inlineRadio2">
                    <label class="form-check-label" for="inlineRadio2">Commercial</label>
                </div>
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
                    <input type="number" class="form-control" placeholder="8 Marla.." name="area">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" class="form-control"  placeholder="Your asking amount" name="price">
                </div>
            </div>
            <hr>
          
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
        <br>
    </div>
@endsection