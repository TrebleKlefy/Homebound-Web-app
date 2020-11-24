@extends('layouts.app')

@section('content')
@section('css')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
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
                  <img src="https://demos.creative-tim.com/argon-dashboard/assets/img/theme/team-4.jpg" class="rounded-circle">
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
                      <a href='/listings/{{$user->id}}/create' class="btn btn-sm btn-info mr-4">Create Advertisment</a>
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
                      <a href='#' class="btn btn-sm btn-info mr-4">View Advertisments</a>
                      <a href='#' class="btn btn-sm btn-default float-right">Message</a>
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
                    <span class="heading">89</span>
                    <span class="description">Reviews</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
                <h3>
                    {{$user->fullname()}} <span class="font-weight-light">, 27</span>
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
              <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>
              <a href="#">Show more</a>
            </div>
          </div>
        </div>
      </div>


      </div>

    </div>
  </div>
</div>



@endsection
@section('javascript')


@endsection
