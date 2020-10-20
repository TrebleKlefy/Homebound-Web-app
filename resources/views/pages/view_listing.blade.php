@extends('layouts.app')
@section('css')

<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

<link href="{{ asset('css/animate.css') }}" rel="stylesheet">


@endsection

@section('content')
{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"><div class="pd-wrap">
    	<div class="pb-5 pt-5 bg-gradient-default opacity-8 mas " style="min-height: 550px; background-image: url(https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
        <div class="container bg-white mt-5 p-5 card">
	        <div class="heading-section">
	            <h2>{{$advert->buildingtype}} Details</h2>
	        </div>
	        <div class="row">
	        	<div class="col-md-6">
	        		<div id="slider" class="owl-carousel product-slider">
                        @foreach($image as $imagead)
						<div class="item">
                        <img class="img" src="{{$imagead->images}}" />
                        </div>
                        @endforeach
						
					</div>
					<div id="thumb" class="owl-carousel product-thumb">
                        @foreach($image as $imageview)
						<div class="item">
                        <img  src="{{$imageview->images}}" />
                        </div>
                        @endforeach
					
					</div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="product-dtl">
        				<div class="product-info">
                            {{-- @foreach($advert as $ad) --}}
                            <div class="product-name">{{$advert->street}} </div>
                           
                            {{-- @endforeach --}}
		        			<div class="reviews-counter">
								<div class="rate">
								    <input type="radio" id="star5" name="rate" value="5" checked />
								    <label for="star5" title="text">5 stars</label>
								    <input type="radio" id="star4" name="rate" value="4" checked />
								    <label for="star4" title="text">4 stars</label>
								    <input type="radio" id="star3" name="rate" value="3" checked />
								    <label for="star3" title="text">3 stars</label>
								    <input type="radio" id="star2" name="rate" value="2" />
								    <label for="star2" title="text">2 stars</label>
								    <input type="radio" id="star1" name="rate" value="1" />
								    <label for="star1" title="text">1 star</label>
								  </div>
								<span>3 Reviews</span>
							</div>
		        			<div class="product-price-discount"><span>${{$advert->price}}.00</span><span class="line-through">$29.00</span></div>
		        		</div>
                        <p>{{$advert->description}}.</p>

                        <div>
                            <h4 class="pt-2 "><span class><i class="far fa-address-book"></i></span> Address</h4>
                            <hr style="margin-top: 0rem !important; margin-bottom: 1rem !important; ">

                            <div class="row">
                             
                                <div class="col-12 widthy val-2">
                            <h6><span> <i class="fas fa-map-marker-alt"></i></span> {{ $advert->street }},</h6><h6 class="pl-1">{{$advert->apartment_number}},</h6>
                            <h6 class="pl-1">{{$advert->parish}}</h6>
                                </div>

                                {{-- <div class="col-4">
                                    
                                </div> --}}
                            </div>
                        </div>

                        <div>
                            <h4 class="pt-2 "><span class><i class="fas fa-mobile"></i></span> Contact</h4>
                            <hr style="margin-top: 0rem !important; margin-bottom: 1rem !important; ">

                            <div class="row">
                             
                                <div class="col-12 widthy">
                            <h6><span> <i class="fas fa-phone"></span></i> {{ $advert->phone_number }}  </h6>   <h6 class="padl"><span> <i class="far fa-envelope-open"></span></i> {{ $advert->email}}</h6>
                                </div>

                                {{-- <div class="col-4">
                                    
                                </div> --}}
                            </div>
                        </div>

                        <div> 
                        <h4 class="pt-2">Amenities</h4>
                        <hr style="margin-top: 0rem !important; margin-bottom: 1rem !important; ">
						<p> {{$advert->amenity}} </p> 
						@foreach($amenities as $amen)
						<p>{{$amen}}</p>
						@endforeach

                        <div class="row">
                             
                            
                            <div class="col-12 d-flex bg-primari text-white ">
                              
                                <h6 class="pt-1 text-white"><span> <i class="fas fa-bed text-white"></i></span> {{ $advert->rooms }}  </h6>  
                                <h6 class="pl-2 pt-1 text-white"><span> <i class="fas fa-utensils text-white"></span></i> {{ $advert->kitchen_rooms}}</h6>
                                <h6 class="pl-2 pt-1 text-white"><span> <i class="fas fa-bath text-white"></span></i> {{ $advert->bath_rooms}}</h6>
                            
                            </div>
                        
                            {{-- <div class="col-4">
                                
                            </div> --}}
                        </div>
                         </div>
                       
                        <div class=" text-center">
	        				<div class="btn-group">
                                <div class="pr-1" >
                                <a href="#" class="round-black-btn">Contact Realter</a>
                                </div>

                                <div class="pl-1">
                                <a href="/profile/{{$user->id}}" class="round-black-btn">owners's profile</a>
                            </div>
                            </div>
                           
                           
	        			</div>
                        
	        		</div>
	        	</div>
	        </div>
	        <div class="product-info-tabs">
		        <ul class="nav nav-tabs" id="myTab" role="tablist">
				  	<li class="nav-item">
				    	<a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews (0)</a>
				  	</li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  	<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
				  		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
				  	</div>
				  	<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
				  		<div class="review-heading">REVIEWS</div>
				  		<p class="mb-20">There are no reviews yet.</p>
				  		<form class="review-form">
		        			<div class="form-group">
			        			<label>Your rating</label>
			        			<div class="reviews-counter">
									<div class="rate">
									    <input type="radio" id="star5" name="rate" value="5" />
									    <label for="star5" title="text">5 stars</label>
									    <input type="radio" id="star4" name="rate" value="4" />
									    <label for="star4" title="text">4 stars</label>
									    <input type="radio" id="star3" name="rate" value="3" />
									    <label for="star3" title="text">3 stars</label>
									    <input type="radio" id="star2" name="rate" value="2" />
									    <label for="star2" title="text">2 stars</label>
									    <input type="radio" id="star1" name="rate" value="1" />
									    <label for="star1" title="text">1 star</label>
									</div>
								</div>
							</div>
		        			<div class="form-group">
			        			<label>Your message</label>
			        			<textarea class="form-control" rows="10"></textarea>
			        		</div>
			        		<div class="row">
				        		<div class="col-md-6">
				        			<div class="form-group">
					        			<input type="text" name="" class="form-control" placeholder="Name*">
					        		</div>
					        	</div>
				        		<div class="col-md-6">
				        			<div class="form-group">
					        			<input type="text" name="" class="form-control" placeholder="Email Id*">
					        		</div>
					        	</div>
					        </div>
					        <button class="round-black-btn">Submit Review</button>
			        	</form>
				  	</div>
				</div>
			</div>
			
			<div style="text-align:center;font-size:14px;padding-bottom:20px;">Get free icon packs for your next project at <a href="http://iiicons.in/" target="_blank" style="color:#ff5e63;font-weight:bold;">www.iiicons.in</a></div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>







  @include('footer.footer')
<script>
    AOS.init({
 	duration: 800,
 	easing: 'slide',
 	once: true
 });
</script>
@endsection

@section('javascript')
<script src="{{ asset('js/product_details.js') }}"></script>
@endsection