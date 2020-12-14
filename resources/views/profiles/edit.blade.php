@extends('layouts.app')

@section('content')
@section('css')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endsection
{{-- <script src="https://www.codechief.org/plugin/jquery.js"></script> --}}

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
  <div class="main-content">


        <!-- Form -->


    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello Jesse</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
            {{-- <a href="#!" class="btn btn-info">Edit profile</a> --}}
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    @if($user->profile_photo != null)
                    <img  src=" {{$user->profile_photo}}"  class="rounded-circle">
                      @else
                      <img src="https://demos.creative-tim.com/argon-dashboard/assets/img/theme/team-4.jpg" class="rounded-circle">
                      @endif
                  </a>
                </div>
              </div>
            </div>

            {{-- mgt-0   --}}
            <div class="card-body pt-0  ">
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0  ">

                    <div class="d-flex justify-content-center pta-2">

                            <a href='/listings/{{$user->id}}/create' class="btn btn-sm btn-info mr-2">Create Advertisment</a>
                            <a href='/profile/{{$user->id}}/edit' class="btn btn-sm btn-default float-right">Edit Profile</a>
                            <a href='/profile/{{$user->id}}/alladverts'  class="btn btn-sm btn-default float-right">View Adverts</a>

                    </div>
                    <div class="card-profile-stats d-flex justify-content-center ">
                        <div>
                        <span class="heading">{{$user->advertisments->count()}}</span>
                          <span class="description">Advertisments</span>
                        </div>
                        <div>

                        <span class="heading">{{$review}}</span>
                          <span class="description">Reviews</span>
                        </div>
                        <div>
                        <span class="heading">{{$user->gender}}</span>
                          <span class="description">Gender</span>
                        </div>
                      </div>
                  </div>
              <div class="row pt-3">
                <div class="col">

                </div>
              </div>
              <div class="text-center">
                <h3>
                  {{$user->first_name}} {{$user->last_name}}<span class="font-weight-light"></span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>{{$user->address->streetline}}, {{$user->address->city}},{{$user->address->country}},{{$user->address->postOffice}}
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Account Type - {{$user->usertype}}
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i> Email Address: {{$user->email}}
                </div>
                <div>
                    <i class="ni education_hat mr-2"></i> Contact Number: {{$user->contacts->primary_number}}, {{$user->contacts->secondary_number}}
                  </div>
                <hr class="my-4">
                <p>
                    {{$user->aboutuser}}
                </p>

                <hr>
                {{-- <img src="" alt="" class="preview"> --}}
                <img src="" alt="" class="preview preview--rounded">


              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1 mb-5">
          @if($errors->any())
          <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div>
            @endif
            @if(session()->has('message'))
                <div class="alert alert-success pb-2">
                    {{ session()->get('message') }}
                </div>
            @endif
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div>
              </div>
            </div>
            <div class="card-body">


                <h6 class="heading-small text-muted mb-4">User information</h6>

                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-md-12 text-center pb-3">
                            <div id="upload-demo"></div>
                        </div>


                            <div class="col-12 text-right">


                              <div class="d-flex justify-content-center  ">
                            <div class="pr-1">
                                <div class="fileUpload ">
                                    <input type="file" id="upload" class="upload">
                                    <label for="file" class="pt-1 ">Choose an Image</label>
                                </div>
                            </div>
                                <button href="#" id="uploadBtn" class="btn btn-sm btn-default float-right upload-result ">Upload Image</button>
                              </div>
                            </div>
                            <div class="d-flex  col-md-12 justify-content-center pb-3 ">

                                {{-- <button href="#" id="previewBtn" class="btn btn-sm btn-info mr-4">Select Image --}}

                                {{-- </button> --}}
                                {{-- <button href="#"  class="btn btn-sm btn-default float-right upload-result">Upload Image</button> --}}
                            </div>

                    </div>
                    <form action="/profile/{{$user->id}}" method="post">

                        @method('PATCH'){{--Patch request--}}
                        @csrf
                    <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-first-name">First name</label>
                            <input type="text" id="input-first-name" name="first_name" class="form-control form-control-alternative" placeholder="First Name" value="{{$user->first_name}}" >
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-last-name">Last name</label>
                            <input type="text" id="input-last-name" name="last_name" class="form-control form-control-alternative" placeholder="Last Name" value="{{$user->last_name}}">
                          </div>
                        </div>
                      </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Trn</label>
                        <input type="text" id="input-username" name="trn" class="form-control form-control-alternative" placeholder="124-232-121" value="{{$user->trn}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Gender</label>
                        <input type="text" id="input-email" name="gender" class="form-control form-control-alternative" placeholder="jesse@example.com" value="{{$user->gender}}">
                      </div>
                    </div>
                  </div>

                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" name="streetline" class="form-control form-control-alternative" placeholder="Home Address" value="{{$user->address->streetline}}" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" name="city" class="form-control form-control-alternative" placeholder="City" value="{{$user->address->city}}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" name="country" class="form-control form-control-alternative" placeholder="Country" value="{{$user->address->country}}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="text" id="input-postal-code" name="postOffice" class="form-control form-control-alternative" placeholder="Postal code" value="{{$user->address->postOffice}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Phone Number</label>
                        <input type="text" id="input-city" name="primary_number" class="form-control form-control-alternative" placeholder="(876) 382-1212" value="{{$user->contacts->primary_number}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Secondary Number</label>
                        <input type="text" id="input-country" name="secondary_number" class="form-control form-control-alternative" placeholder="(876) 382-1212" value="{{$user->contacts->secondary_number}}" >
                      </div>
                    </div>

                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>About Me</label>
                    <textarea rows="4" class="form-control form-control-alternative" name="aboutuser" value=" {{$user->aboutuser}}" placeholder="A few words about you in 255 words or less..." ></textarea>
                  </div>
                </div>
                <div class="col-12 text-right">
                    <button  type="submit" class="btn btn-sm btn-primary">Submit</button>
                  </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
  <script type="text/javascript" src="{{ asset('js/ajaxforprofile_edit.js')}}"></script>

@endsection
@section('javascript')


@endsection
