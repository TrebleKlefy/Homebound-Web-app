<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('HomeBound', 'HomeBound') }}</title>
    <link rel = "icon" href = "./img/LogoMakr.png" type = "image/x-icon"> 

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    
    <script src="https://jacoblett.github.io/bootstrap4-latest/bootstrap-4-latest.min.js" defer></script>
   @yield('javascript')
   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/iconmoon.css')}}"  rel="stylesheet" >
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">
    <link href="{{ asset('css/indexCss.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    @yield('css')

   
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light  fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/img/LogoMakr.png" class="img-fluid logoim" alt="logo">    {{ config('HomeBound', 'HomeBound') }}
                </a>
              

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('/') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('listings') }}">{{ __('listing') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('aboutus') }}">{{ __('AboutUs') }}</a>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="#" data-toggle="modal" data-target="#elegantModalForm">{{ __('Login') }}</a>
                            </li>
                           
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    {{-- <a class="nav-link" href="#" data-toggle="modal" data-target="#elegantModalForm2">{{ __('SignUp') }}</a> --}}
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('/') }}">{{ __('Home') }}</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('listings') }}">{{ __('listing') }}</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('aboutus') }}">{{ __('AboutUs') }}</a>
                      </li>
                      <li class="nav-item">
                      <a class="nav-link" href="/profile/{{Auth::user()->id}}">{{ __('Profile') }}</a>
                    </li>

                    {{-- <li class="dropdown nav-item">
                      <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="notification d-none d-lg-block d-xl-block"></div>
                        <i class="fas fa-inbox"></i>
                        <p class="d-lg-none">
                          Notifications
                        </p>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                        <li class="nav-link"><a href="#" class="nav-item dropdown-item">Mike John responded to your email</a></li>
                        <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">You have 5 more tasks</a></li>
                        <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Your friend Michael is in town</a></li>
                        <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another notification</a></li>
                        <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another one</a></li>
                      </ul>
                    </li> --}}

                    <div class="dropdown" style="float: right; padding: 13px">
                      <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                          <i class="fas fa-bell text-white" style="font-size: 18px; float: left; color: black">
                          </i>
                      </a>
                      <span class="badge badge-danger">  {{Auth::user()->unreadNotifications->count()}}</span>
                      <ul class="dropdown-menu dropdown-menu-left pull-right" role="menu" aria-labelledby="dropdownMenu1">
                          <li role="presentation">
                              <a href="#" class="text-center">Notifications</a>
                          </li>
                          <ul class="timeline timeline-icons timeline-sm" style="margin:10px;width:210px">
                            @if (Auth::user()->unreadNotifications->slice(0,5) != null && Auth::user()->unreadNotifications->count() >0 )
                            <div class="list-group ">
                                @foreach (Auth::user()->unreadNotifications as $notification)
                                
                                <a href="/inbox/message/read/{{$notification->id}}" class="list-group-item list-group-item-action border-0 p-0 m-0">
                                <div class="d-flex bd-highlight m-0">
                                  <div class="p-3 bd-highlight">
                                    
                                      <h6 class="small"> {{$notification['data']['greeting']}}</h6>
                                     
                                  </div>
                                  <div class="p-2 bd-highlight small"><small>{{\Carbon\Carbon::createFromTimeStamp(strtotime($notification->created_at))->diffForHumans()}}</small></div>
                                </div>
                                </a>
                                @endforeach
                              </div>
                
                
                            @else
                            <div class="text-center">
                              <img src="{{asset('svg/undraw_mail_box_kd5i.svg')}}" class="img-fluid" style="max-width:200px" alt="" srcset="">
                            <p class="p-3">You have no notfications</p>
                            </div>
                            @endif
                          
                      </ul>
                  </div>

                    
                    
                    {{-- <li class="dropdown nav-item">
                      <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="photo">
                        <img src="/uploads/images/{{auth::user()->profile_photo}}" alt="Profile Photo">
                        </div>
                        <b class="caret d-none d-lg-block d-xl-block"></b>
                        <p class="d-lg-none">
                          Log out
                        </p>
                      </a>
                      <ul class="dropdown-menu dropdown-navbar">
                        <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Profile</a></li>
                        <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a></li>
                        <li class="dropdown-divider"></li>
                        <li class="nav-link">
                          <div class="" aria-labelledby="navbarDropdown">
                              <a class=" nav-item dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>
  
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div></li>
                      </ul>
                    </li> --}}

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
<!-- Modal -->
<div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content form-elegant text-white">
      <!--Header-->
      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong> <img src="/img/LogoMakr.png" class="img-fluid w-25" alt="logo"></strong></h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body modalstyle mx-4">
        <!--Body-->

        <form method="POST" action="{{ route('login') }}">
            @csrf


            <div class="md-form ">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
      
              <div class="md-form pb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
               
                @if (Route::has('password.request'))
                <p class="font-small blue-text d-flex justify-content-end">Forgot <a href="{{ route('password.request') }}" class="blue-text ml-1">
                Password?</a></p>
                @endif
              </div>
            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="text-center mb-3 ">
                <button type="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a text-white">Sign in</button>
               
              </div>
        </form>
        <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign in
          with:</p>

        <div class="row my-3 d-flex justify-content-center">
          <!--Facebook-->
          <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fab fa-facebook-f text-center"></i></button>
          <!--Twitter-->
          <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fab fa-twitter"></i></button>
          <!--Google +-->
          <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i class="fab fa-google-plus-g"></i></button>
        </div>
      </div>
      <!--Footer-->
      <div class="modal-footer mx-5 pt-3 mb-1">
        <p class="font-small grey-text d-flex justify-content-end">Not a member? 
          <a  href="#" data-toggle="modal" data-target="#elegantModalForm2" data-dismiss="modal" aria-label="Close"> Sign Up</a></p>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal -->

<!-- Modal signup  -->
<div class="modal fade" id="elegantModalForm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content form-elegant text-white">
      <!--Header-->
      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong> <img src="/img/LogoMakr.png" class="img-fluid w-25" alt="logo"></strong></h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body mx-4">
        <!--Body-->



        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="md-form pb-2">
          
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>

          
          <div class="md-form ">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
          </div>
  
          <div class="md-form pb-1">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="md-form">
            
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
              
          </div>

          
          <div class="text-center mb-3 ">
            <button type="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a text-white">Sign Up</button>
           
          </div>
      </form>

      
        <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign up
          with:</p>

        <div class="row my-3 d-flex justify-content-center">
          <!--Facebook-->
          <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fab fa-facebook-f text-center"></i></button>
          <!--Twitter-->
          <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fab fa-twitter"></i></button>
          <!--Google +-->
          <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i class="fab fa-google-plus-g"></i></button>
        </div>
      </div>
      <!--Footer-->
      <div class="modal-footer mx-5 pt-3 mb-1">
        <p class="font-small grey-text d-flex justify-content-end">Already a member?  
        <a  href="#" data-toggle="modal" data-target="#elegantModalForm" data-dismiss="modal" aria-label="Close"> Login</a></p>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> --}}

<script>
    $(document).ready(function() {


$(window).scroll(function() {
    var scroll = $(window).scrollTop();

    //>=, not <=
    if (scroll >= 60) {
        //clearHeader, not clearheader - caps H
        $(".navbar").addClass("bg-light");
    } else {
        $(".navbar").removeClass("bg-light");
    }
}); //missing );

// document ready
});
</script>


{{-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
@yield('javascript')
</html>