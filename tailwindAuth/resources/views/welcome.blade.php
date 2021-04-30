@extends('layouts.head')
@section('head')
    <div class="bg-image"></div>
    <div class="bg-text">
        <div class="container">
            <h2><bold><i class="fab fa-accusoft"></i>Houz.com</bold></h2>
            <p class="text-white lead">Pakistan's best market place for real estate</p>
            <form action="/search" method="POST" class="">
                @csrf
                <div class="form-row d-flex justify-content-center">
                   
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-outline-danger active">
                            <input type="radio" name="result" value="0"  autocomplete="off"> Rent
                            </label>
                            <label class="btn btn-outline-danger">
                            <input type="radio" name="result" value="1"  autocomplete="off"> Sell
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" value="1" name="categories" id="inlineRadio1" >
                            <label class="form-check-label" for="inlineRadio1">Residential</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="2" type="radio" name="categories" id="inlineRadio2">
                            <label class="form-check-label" for="inlineRadio2">Commercial</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="3" type="radio" id="inlineRadio3" name="categories">
                            <label class="form-check-label" for="inlineCheckbox2">Plot</label>
                        </div>
                    
                    
                </div>
                <br>
                <div class="form-row ff d-flex justify-content-center">
                    <div class="form-group">
                        <label>Land Area in Marla</label>
                        <input type="number" class="form-control" placeholder="8 Marla.." name="area">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control"  placeholder="Your asking amount" name="price">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">submit</button>
            </form>
        </div>
    </div>
    <div class="container text-muted mt-3 d-flex justify-content-center">
        <center>
            <h3 class="">Best Investment Projects</h3>
            <h6 class="">100% refundable, safe and secure investments</h6>
            <ul class=" text-danger list-group d-flex justify-content-center list-group-horizontal-sm">
                <li class="list-group-item border border-top-0 border-right-0 border-danger rounded-circle">&nbsp; Your Demand &nbsp;</li>
                <li class="list-group-item border border-top-0 border-left-0 border-right-0 border-danger rounded-circle">&nbsp; Our Delivery &nbsp;</li>
                <li class="list-group-item border border-top-0 border-left-0 border-danger rounded-circle">&nbsp; Your Ownership &nbsp</li>
            </ul>
            <p class="text-info btn  seeMore">See More</p>
            <div class=" btn text-muted seeMoreText">
                <h5>Ownership & Approvals</h5>
                Real estate dealings may be fraught with difficulties and legal concerns based on various factors. Before making an investment, it is critical to verify that the land has been properly and completely acquired, and all necessary approvals have been processed. At Imarat, we focus on risk assessment and mitigation through intensive due diligence that drives the highest levels of compliance in the industry - our trademark.
                
                <h5>Demand & Delivery</h5>
                The secret to success in commercial projects is straightforward - hosting the right mix of brands to best satisfy the flourishing appetites of Pakistan’s fast-growing & increasingly prosperous population. To maximise the revenue potential of each project, a thorough commercial feasibility, including market analysis and space planning, is critical. Our Group has been delivering real estate excellence in the UK and Pakistan for more than 15 years and our expertise lies in real estate development, leasing and management. Our local and international corporate leasing teams begin working on a project while it is still at the concept stage, in order to attract the very best blend of local & international brands. 
                Our aim is to create iconic commercial projects that become desirable destinations with an enduring appeal.
            </div>
        </center>
    </div>
    <div class="container">
        <div class="container mt-5 text-muted p-4 shadow-sm">
            <center>
                <h5 class="display-5">Fresh Listings</h5>
            </center>
        </div>
    </div> 
    
    <div class="wrapper">
        <div class="carousel owl-carousel">
            @foreach ($property as $p)
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/'.$p->image_path) }}" alt="" width="150" height="200">
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
                    @if ( $p->result )
                        sell.
                    @else
                        rent.
                    @endif
                    The asking price is {{ $p->price }}.
                    </p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        $(".carousel").owlCarousel({
          margin: 20,
          loop: true,
          autoplay: true,
          autoplayTimeout: 2000,
          autoplayHoverPause: true,
          responsive: {
            0:{
              items:1,
              nav: false
            },
            600:{
              items:2,
              nav: false
            },
            1000:{
              items:3,
              nav: false
            }
          }
        });
      </script>
@endsection
