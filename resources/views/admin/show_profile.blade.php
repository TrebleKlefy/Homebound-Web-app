@extends('layouts.app')

@section('content')
@section('css')


 <!--     Fonts and icons     -->
 <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
 <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
 <!-- Nucleo Icons -->
 <!-- CSS Just for demo purpose, don't include it in your project -->
 <link href="{{ asset('css/demo.css')}}" rel="stylesheet" />
 <link href="{{ asset('css/black-dashboard.css?v=1.0.0') }}" rel="stylesheet">
 <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet">
 @endsection



 <div class="wrapper" >
   
     
    
    <div class="main-panel">
   
      <div class="content editcontent ">
        <div class="row py-4s">
          
          <div class="col-12">
            <div class="card card-user">
              <div class="card-body">
                <p class="card-text">
                  <div class="author">
                    <div class="block block-one"></div>
                    <div class="block block-two"></div>
                    <div class="block block-three"></div>
                    <div class="block block-four"></div>
                    <a href="javascript:void(0)">


                        {{-- @if($user->profile_photo != null)
                        <img  src="/uploads/images/{{$user->profile_photo}}"  class="rounded-circle">                 
                          @else
                          <img src="https://demos.creative-tim.com/argon-dashboard/assets/img/theme/team-4.jpg" class="rounded-circle">
                          @endif --}}

{{-- 
                      <img class="avatar" src="https://demos.creative-tim.com/argon-dashboard/assets/img/theme/team-4.jpg" alt="..."> --}}
                      @if($user->profile_photo != null)
                      <img  src="/uploads/images/{{$user->profile_photo}}"  class="avatar">                 
                        @else
                        <img src="https://demos.creative-tim.com/argon-dashboard/assets/img/theme/team-4.jpg" class="avatar">
                        @endif


                    <h5 class="title">{{$user->first_name}} {{$user->last_name}}</h5>
                    </a>
                    <p class="description">
                      Ceo/Co-Founder
                    </p>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0  ">
                    
                        <div class="d-flex justify-content-center pta-2"> 
                          <button href="#" id="previewBtn" class="btn btn-sm btn-infos mr-4" style="">Contact</button>
                          <button href="#" id="uploadBtn" class="btn btn-sm btn-default float-right">Make Report</button>
                        </div>
                      </div>
                  </div>
                </p>
                <div class="card-description text-center">
                  Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                </div>
              </div>
              <div class="card-footer">
                <div class="button-container">
                  <button href="javascript:void(0)" class="btn btn-icon btn-round btn-facebook">
                    <i class="fab fa-facebook"></i>
                  </button>
                  <button href="javascript:void(0)" class="btn btn-icon btn-round btn-twitter">
                    <i class="fab fa-twitter"></i>
                  </button>
                  <button href="javascript:void(0)" class="btn btn-icon btn-round btn-google">
                    <i class="fab fa-google-plus"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </div>
  
 



    @endsection