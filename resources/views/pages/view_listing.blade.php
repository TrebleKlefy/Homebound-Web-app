@extends('layouts.app')
@section('css')

<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

<link href="{{ asset('css/animate.css') }}" rel="stylesheet">

<link href="{{ asset('css/contactus.css') }}" rel="stylesheet">

@endsection

@section('content')
{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> --}}
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
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
                                <a href="#" class="round-black-btn"  data-toggle="modal" data-target="#exampleModalCenter">Contact Realter</a>
                                </div>

                                <div class="pl-1">
                                <a href="/profile/{{$user->id}}" class="round-black-btn">Owners's profile</a>
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
				    	<a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews ({{$review->count()}})</a>
				  	</li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  	<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                        {{$advert->description}}
				  	</div>
				  	<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                          <div class="review-heading pb-3">REVIEWS</div>
                          <hr>
                          @if($review->count() == 0)
                          <p class="mb-20">There are no reviews yet.</p>
                          @else
                          @foreach($review as $reviews)
                          {{-- <div class="container"> --}}
                        <div class="bg-md row">

                    <div class="col flex-col">
                        <h3 class="mt-1">{{$reviews->fullname}}</h3>
                    </div>
                    <div class="col flex-col">
                        <h5 class="mt-1">{{$reviews->created_at->diffForHumans()}}</h5>
                    </div>

                     </div>
                    <p class="mb-20">{{$reviews->message}}</p>

                          {{-- </div> --}}
                     <hr>
                          @endforeach

                          @endif
                          <form class="review-form" action="/review" method="post">
                            @csrf
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
			        			<textarea class="form-control" name="message" rows="10"   maxlength="235" required></textarea>
			        		</div>
			        		<div class="row">
				        		<div class="col-md-6">
				        			<div class="form-group">
					        			<input type="text" name="fullname" class="form-control" required placeholder="Name*">
					        		</div>
					        	</div>
				        		<div class="col-md-6">
				        			<div class="form-group">
					        			<input type="text" name="email" class="form-control"  required placeholder="Email Id*">
					        		</div>
                                </div>
                                <input type="hidden" name="advertisment_id" class="form-control"  required placeholder="Id*" value={{$advert->id}}>
					        </div>
					        <button class="round-black-btn">Submit Review</button>
			        	</form>
				  	</div>
				</div>
			</div>


		</div>
	</div>



	<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header text-center">
			<h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong> <img src="/img/LogoMakr.png" class="img-fluid w-25" alt="logo"></strong></h3>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body modal-bodi">


		<div class="container">


			<div class="text-center gifi"  id="gifi">
				<h1>Contact us</h1>
				<p>Planning to visit Indonesia soon? Get insider tips on where to go, things to do and find best deals for your next adventure.</p>
			</div>
			<div class="notification"> </div>
			<div class="container">
			<form id="contact-form" method="post" action="/contactus/{{$user->id}}" name="contactus">
					@csrf
				  <label for="name" class="text-white">Full name</label>
			  <input type="text" id="name" name="name" placeholder="Your Full Name" required>
				  <label for="email" class="text-white">Email Address</label>
			  <input type="email" id="email" name="email" placeholder="Your Email Address" required>
				  <label for="message" class="text-white">Message</label>
			  <textarea rows="6" placeholder="Your Message" id="message" name="message" required></textarea>
				  <!--<a href="javascript:void(0)">--><button type="submit" id="submit" name="submit">Send</button><!--</a>-->
				  <input type="hidden" name="user_id" id="id" value="{{$user->id}}">

				  {{-- <div class="gifi" id="gifi"> </div> --}}
			</form>
			<div id="error"></div>
			<div id="success-msg"></div>
		</div>
		</div>


	  </div>
	</div>
  </div>
</div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



  {{-- @include('footer.footer') --}}
<script type="text/javascript">


	 var id = $('#id').val();
	 $("form[name='contactus']").on('submit',function(event) {
			event.preventDefault();
			gif();
			$.ajax({
				type: 'POST',
				url: `/contactus/${id}`,
				headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
	    		data:  new FormData(this),
                contentType:false,
                processData:false,
	    		success: function(result){
					$("#contact-form")[0].reset()
					document.getElementById("gifi").style.display = "none";
                    const html = `

                   <div class=" pl-3 alert alert-success text-center">
                     <p>Thank you for contacting us, we will get back to you in short order</p>
                   </div>
                    `;
                    const notification = document.querySelector('.notification');
                    notification.innerHTML += html;
				}
			});
		});



		function gif(){

const html = `


			<div class="col-md-12  text-center form-group">
					<img src="https://thumbs.gfycat.com/BlaringWeightyCollie.webp"
					 alt="Sending Message" class="w-25 bg-overlay lazy align-self-center">
			</div>
		`;
const notification = document.querySelector('.gifi');
notification.innerHTML += html;
}


</script>
@endsection

@section('javascript')
<script src="{{ asset('js/product_details.js') }}"></script>
<script src="{{ asset('js/contactus.js') }}"></script>
@endsection
