@extends('layouts.app')

@section('content')
<style>

</style>
@section('css')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endsection

<section class="jumbotron jumbotron-fluid " >
    <div class="jumbotron__body  ">
        <div class="container pt-5"  data-aos="fade-right"  data-aos-duration="3000">
            <h2 style=""><span class="font-weight-bolder">Where </span> to?</h2>
            <h1 style="">Search for houses and Appartments with just a click</h1>

                        <form action="/searchFitler" method="post">
                            @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" placeholder="Search" style="height: 68px; width: 40px;">
                            <div class="input-group-append">
                              <button class="btn " type="submit btstyle" style="">Go</button>
                            </div>
                          </div>
                        </form>

    </div>

</section>

<section class="section_1 ">
    <div class="d-flex justify-content-center">

        <h1 class="font-xl col-md-10 pt-5" data-aos="fade-up"
        data-aos-anchor-placement="center-bottom"   data-aos-duration="1500">Renting Just Got <span class="section_1__colorit">Easier  </span></h1>
    </div>
	<div class="page-section">
        <div class="container">
            <div class="row" >
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-aos="fade-down"
                data-aos-easing="linear"
                data-aos-duration="1200">
                    <div class="cs-services top-center" >
                        <div class="cs-media"> <i class="material-icons md-48 md-dark">image_search</i> </div>
                        <div class="cs-text">
                            <h6>Search Advertisements</h6>
                            <p>Search to find a new place to call home from our trusted listings, the prices are unbeatable. Our adverts has been screened for your safety.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-aos="fade-down"
                data-aos-easing="linear"
                data-aos-duration="1800">
                    <div class="cs-services top-center">
                        <div class="cs-media"> <i class="material-icons md-48 md-dark">check</i>  </i> </div>
                        <div class="cs-text">
                            <h6>Select an Advert</h6>
                            <p>Its Easy , select the advert you like search through the photos, compare prices, if you like it do the next step.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-aos="fade-down"
                data-aos-easing="linear"
                data-aos-duration="2000">
                    <div class="cs-services top-center">
                        <div class="cs-media"> <i class="material-icons md-48 md-dark">connect_without_contact</i>  </i> </div>
                        <div class="cs-text">
                            <h6>Connect With Realter</h6>
                            <p>Contact the Realter by email or call, we provide direct with contact with each realter so feel free to use our service.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<section class="section_2 ">
    <div class="container text-center p-5">
    <h2 class="font-l  pb-3" data-aos="fade-down"
    data-aos-easing="linear"
    data-aos-duration="1500">Searching for a new place to call <span>Home?</span> </h2>
    <p class="font-m pb-2">The perfect home is waiting, all it takes is a click.
        Browse for apartments or homes that matches your budget and
        communicate with your new landlord right on your laptop or smartphone.</p>
        <button class="btn  btn-secondary btn-lg" data-aos="fade-up"
        data-aos-duration="3000"> Sign Up for Free</button>
    </div>
</section>

        @include('footer.footer')
@section('javascript')

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
  </script>
@endsection
@endsection
