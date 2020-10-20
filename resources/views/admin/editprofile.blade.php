@extends('admin.nav')

@section('content')
@section('css')

 @endsection

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">


      
        <div class="row">
          <div class="col-md-8">
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
            <div class="card">
              <div class="card-header pt-2">
                <h5 class="title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-center">
                      <div id="upload-demo"></div>
                  </div>
                    
                      {{-- <strong>Select Image:</strong>
                      <br/>
                      <input type="file" id="upload">
                      <br/> --}}
                      {{-- <button class="btn btn-success upload-result">Upload Image</button> --}}
                      <div class="col-12 text-right">
                       
                     
                        <div class="d-flex justify-content-center "> 
                      <div class="pr-1">
                          <div class="fileUpload  ">
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
                    <div class="col-md-5 pr-md-1">
                      <div class="form-group">
                        <label>Company (disabled)</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" value="Creative Code Inc.">
                      </div>
                    </div>
                    <div class="col-md-3 px-md-1">
                      <div class="form-group">
                        <label>Gender</label>
                      <input type="text" class="form-control" placeholder="Gender" name="gender" value="{{$user->gender}}" >
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">TRN</label>
                        <input type="text" class="form-control"  placeholder="12345" name="trn" value="{{$user->trn}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{$user->first_name}}" >
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name"  placeholder="Last Name" value="{{$user->last_name}}" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Street Line"  name="streetline" value="{{$user->address->streetline}}" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control"  name="city" placeholder="City" value="{{$user->address->city}}">
                      </div>
                    </div>
                    <div class="col-md-4 px-md-1">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" placeholder="Country"  name="country" value="{{$user->address->country}}">
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label>Postal</label>
                        <input type="text" class="form-control" name="postOffice" placeholder="Postal" value="{{$user->address->postOffice}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Phone number</label>
                        <input type="text" class="form-control"  name="primary_number"  placeholder="(876) 393-5612" value="{{$user->contacts->primary_number}}">
                      </div>
                    </div>
                    <div class="col-md-6 px-md-1">
                      <div class="form-group">
                        <label>Alternative Number</label>
                        <input type="text" class="form-control" name="secondary_number" placeholder="(876) 393-5612" value="{{$user->contacts->secondary_number}}" >
                      </div>
                    </div>
                   
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>About Me</label>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                      </div>
                    </div>
                  </div>
                
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary">Save</button>
              </div>
            </form>
            </div>
           
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="card-body">
                <p class="card-text">
                  <div class="author">
                    <div class="block block-one"></div>
                    <div class="block block-two"></div>
                    <div class="block block-three"></div>
                    <div class="block block-four"></div>
                    <a href="javascript:void(0)">
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
                  </div>
                </p>
                <div class="card-description">
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
    
    
   
 
 




   {{-- <script src="https://www.codechief.org/plugin/croppie.js"></script> --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
   {{-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>  --}}
  
   {{-- <script type="text/javascript" src="{{ asset('js/uploadimage.js')}}"></script> --}}
 
   <script>
 
 
 $.ajaxSetup({
 headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 }
 });
 
 
 // 
 // $('.preview').show().attr('src',1600246527.jpeg);  
 $uploadCrop = $('#upload-demo').croppie({
     enableExif: true,
     viewport: {
         width: 200,
         height: 200,
         type: 'circle'
     },
     boundary: {
         width: 200,
         height: 200
     }
 });
 
 
 $('#upload').on('change', function () { 
   var reader = new FileReader();
     reader.onload = function (e) {
       $uploadCrop.croppie('bind', {
         url: e.target.result
       }).then(function(){
         console.log('jQuery bind complete');
       });
     }
     reader.readAsDataURL(this.files[0]);
 });
 
 
 $('.upload-result').on('click', function (ev) {
     // ev.preventDefault();
   $uploadCrop.croppie('result', {
     type: 'canvas',
     size: 'viewport'
   }).then(function (resp) {
     $.ajax({
       url: "/profile/storeimage",
       type: "POST",
       data: {"image":resp},
       success: function (data) {
                 $('.card-profile')[0].reset();
         html = '<img src="' + resp + '" />';
         $("#upload-demo-i").html(html);
       }
     });
   });
 });
  </script>

    @endsection