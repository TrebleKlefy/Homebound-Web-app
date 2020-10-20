@extends('layouts.app')

@section('content')
<div class="backgroundStyle ">


<div class="modal-dialog pt-55" role="document">
    <!--Content-->
    <div class="modal-content  form-elegant text-white">
      <!--Header-->
      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong> <img src="./img/LogoMakr.png" class="img-fluid w-25" alt="logo"></strong></h3>

        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         
        </button> --}}

        <a href="{{ route('/') }}" class="btn close">
            <span aria-hidden="true">&times;</span>

        </a>
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
@endsection
