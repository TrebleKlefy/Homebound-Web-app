@extends('layouts.app')

@section('content')
<style>

</style>


<section class="jumbotron jumbotron-fluid ">
    <div class="jumbotron__body  ">
        <div class="container pt-5">
            <h2 style=""><span class="font-weight-bolder">Where </span> to?</h2>
            <h1 style="">Search for houses and Appartments with just a click</h1>
          
                   
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search" style="height: 68px; width: 40px;">
                            <div class="input-group-append">
                              <button class="btn " type="submit btstyle" style="">Go</button>
                            </div>
                          </div>
                   
    </div>

</section>

<section class="section_1 ">
    <div class="d-flex justify-content-center">

        <h1 class="font-xl col-md-10 pt-5">Renting Just Got <span class="section_1__colorit">Easier  </span></h1>
    </div>
	<div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="cs-services top-center">
                        <div class="cs-media"> <i class="material-icons md-48 md-dark">image_search</i> </div>
                        <div class="cs-text">
                            <h6>BRAKE SERVICE</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, velit, eum, delectus aliquid dolore
numquam dolorem assumenda nisi nemo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="cs-services top-center">
                        <div class="cs-media"> <i class="material-icons md-48 md-dark">check</i>  </i> </div>
                        <div class="cs-text">
                            <h6>TRANSMISSION</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, velit, eum, delectus aliquid dolore
numquam dolorem assumenda nisi nemo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="cs-services top-center">
                        <div class="cs-media"> <i class="material-icons md-48 md-dark">connect_without_contact</i>  </i> </div>
                        <div class="cs-text">
                            <h6>TIRE &amp; WHEEL SERVICE</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, velit, eum, delectus aliquid dolore
numquam dolorem assumenda nisi nemo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<section class="section_2">
    <div class="container text-center p-5"> 
    <h2 class="font-l  pb-3">Searching for a new place to call <span>Home?</span> </h2>
    <p class="font-m pb-2">The perfect home is waiting, all it takes is a click. 
        Browse for apartments or homes that matches your budget and 
        communicate with your new landlord right on your laptop or smartphone.</p>
        <button class="btn  btn-secondary btn-lg"> Sign Up for Free</button>
    </div>
</section>

        @include('footer.footer')
@endsection
