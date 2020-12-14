@extends('layouts.app')

@section('content')
@section('css')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
<link href="{{ asset('css/contactus.css') }}" rel="stylesheet">
@endsection

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">


<div class="main-content">

  <!-- Header -->
  <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 550px; background-image: url(https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->

  </div>
  <!-- Page content -->
  <div class="container-fluid mt--7s">
    <div class="row">
      <div class="col-xl-12 order-xl-2 mb-5 mb-xl-0">
        <div class="card mb_30 card-profile shadow">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a href="#">
                @if($user->profile_photo != null)
                <img  src="{{$user->profile_photo}}"  class="rounded-circle">
                  @else
                  <img src="/images/1606804713.jpeg" class="rounded-circle">
                  @endif
                </a>
              </div>
            </div>
          </div>

          <div class="card-body pt-0 pt-md-4">
            <div class="row">
              <div class="col">

                @auth

                  @if($user->id == auth()->user()->id)
                <div class=" text-center border-0 pt-8 pt-md-4 ">
                    <div class="d-flex justify-content-center pt-8r">
                      <a href='/listings/{{$user->id}}/create' class="btn btn-sm btn-info mr-2">Create Advertisment</a>
                      <a href='/profile/{{$user->id}}/edit' class="btn btn-sm btn-default float-right">Edit Profile</a>
                      <a href='/profile/{{$user->id}}/alladverts'  class="btn btn-sm btn-default float-right">View Adverts</a>
                    </div>
                  </div>
                  @else

                  <div class=" text-center border-0 pt-8 pt-md-4 ">
                    <div class="d-flex justify-content-center pt-8r">
                      <a href='#' class="btn btn-sm btn-info mr-4">View Advertisments</a>
                      <a href='#' class="btn btn-sm btn-default float-right">Message</a>
                    </div>
                  </div>
                  @endif

                  @else
                  <div class=" text-center border-0 pt-8 pt-md-4 ">
                    <div class="d-flex justify-content-center pt-8r">
                      <a href='#' class="btn btn-sm btn-info mr-4" data-toggle="modal" data-target="#exampleModalCenter">Message  {{$user->last_name}} </a>
                      <a href='#' class="btn btn-sm btn-default float-right" onclick="history.back()"><i class="fas fa-arrow-left"></i> Go Back</a>
                    </div>
                  </div>
                  @endauth
                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                  <div>
                  <span class="heading">{{$user->advertisments->count()}}</span>
                    <span class="description">Advertisments</span>
                  </div>
                  <div>

                  <span class="heading">0</span>
                    <span class="description">Reviews</span>
                  </div>
                  <div>
                  <span class="heading">{{$user->gender}}</span>
                    <span class="description">Gender</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
                <h3>
                    {{$user->fullname()}} <span class="font-weight-light"></span>
                  </h3>
                  <div class="h5 font-weight-300">
                    <i class="ni location_pin mr-2"></i>{{$user->addressdetails()}}
                  <div class="h5 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>Account Type - {{$user->usertype}}
                  </div>
                  <div>
                    <i class="ni education_hat mr-2"></i> Email Address: {{$user->email}}
                  </div>
                  <div>
                      <i class="ni education_hat mr-2"></i> Contact Number: {{$user->contactdestails()}}

                    </div>
              <hr class="my-4">
              {{-- @foreach($adds as $advert)
                  <p>{{$advert->first_name}}</p>
              @endforeach --}}
              <p>{{$user->aboutuser}}</p>

            </div>
          </div>
        </div>
      </div>


      </div>

    </div>
  </div>
</div>

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
				<h1>Contact {{$user->fullname()}} </h1>
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



@endsection
@section('javascript')


@endsection
