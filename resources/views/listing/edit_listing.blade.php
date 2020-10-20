@extends('layouts.app')

@section('content')
@section('css')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
<link href="{{ asset('css/tagsinput.css') }}" rel="stylesheet">
{{-- <link href="{{ asset('css/profileinput.css') }}" rel="stylesheet"> --}}
{{-- <link rel="stylesheet" href="{{ asset('css/image-uploader.css') }}"> --}}

@endsection

 <script type="text/javascript" src="{{ asset('js/image-uploader.js')}}"></script>

 {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
 
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script> --}}
 
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
  
 
  <style type="text/css">
 
 .dropzoneDragArea {
		    background-color: #fbfdff;
		    border: 1px dashed #c0ccda;
		    border-radius: 6px;
		    padding: 60px;
		    text-align: center;
		    margin-bottom: 15px;
		    cursor: pointer;
		}
		.dropzone{
			box-shadow: 0px 2px 20px 0px #f2f2f2;
			border-radius: 10px;
        }
        .dz-preview .dz-image img{
            width: 100% !important; 
            height: 100% !important;
            object-fit: cover;
        }
        .dropzone .dz-preview .dz-details .dz-size {
        /* margin-bottom: 1em;
        font-size: 16px; */
        display: none !important;
}
 
  </style>
  

    
<!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
<!-- Mask -->
<span class="mask bg-gradient-default opacity-8"></span>
<!-- Header container -->
<div class="container-fluid d-flex align-items-center  mb-5">
  
    <div class=" col-md-10 mb-5">
    <h1 class="display-2 text-white ">Hello {{$user->first_name}}</h1>
      <p class="text-white mt-0 mb-5">This is your create Advertisment pahe. You can create ad's here and upload up to 10 HD images.</p>
    </div>
 
</div>
</div>

<!-- Page content -->
<div class="container-fluid mtop-23">
<div class="row">

{{-- <div class="col-xl-12 order-xl-1"></div> --}}
  <div class="col-md-12 order-xl-1 ">
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
       
        <form id = "form" method="post" name="formdata"  action= "/listings/store/update" enctype="multipart/form-data">
            @method('PATCH')
          @csrf
          <h6 class="heading-small text-muted mb-4">Building Details</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="">
                    <h3 class="page-title">Description</h3>
                    <div class="form-group">
                        <input class="form-control" type="text" name="title" value= "{{$advert->description}}" placeholder="Listing Title">
                    </div><!-- /.form-group -->
                
                    <div class="form-group">
                    <textarea class="form-control"  maxlength="255" placeholder="Listing Description" value= "{{$advert->description}}"  name="description" rows="8">{{$advert->description}}
                    </textarea>
                    </div><!-- /.form-group -->
                </div><!-- /.box -->
                
                <div class="form-row">
                  
                <div class="input-group  mb-3 col-4 ">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input type="text" class="form-control" placeholder="Price" value= "{{$advert->price}}" name="price" aria-label="Amount (to the nearest dollar)">
                  <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                  </div>
                </div>

                <div class="input-group col-4">
                  <select id="inputState" class="form-control" name="buildingtype">
                      <option value="Apartment">Apartment</option>
                      <option value="House">House</option>
                      <option value="Villa">Villa</option>
                    </select>
                </div>

                <div class="input-group col-4">
                 
                  <select id="inputState" class="form-control" name="contract">
                    <option value="Rental">Rental</option>
                    <option value="Lease">Lease</option>
                    </select>
                </div>
                
              
              </div>
              </div>

              <div class="col-lg-6">
                <div class=" form-group ">
                    <h3 class="page-title">Amenities</h3>
                
                    <div class="row">
                        {{-- <select multiple data-role="tagsinput" name="amenity[]"  id="amenity-1" >
                            @foreach($amenities as $ami)
                        <option value="{{$ami}}">{{$ami}}</option>
                  
                            @endforeach
                        </select> --}}

                        <input type="text" data-role="tagsinput" id="tags" name="amenity[]"  value="{{$advert->amenity}}" >
                   
                    {{-- <ul class="amenities float-right pl-3 ">
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-1" value="Air conditioning"> <label for="amenity-1">Air conditioning</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-2" value="Balcony"> <label for="amenity-2">Balcony</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-3" value="Bedding"> <label for="amenity-3">Bedding</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-4" value="Cable TV"> <label for="amenity-4">Cable TV</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-5" value="Cleaning after exit"> <label for="amenity-5">Cleaning after exit</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-6" value="Cofee Pot"> <label for="amenity-6">Cofee pot</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-7" value="Computer"> <label for="amenity-7">Computer</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-8" value="Cot"> <label for="amenity-8">Cot</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-9" value="Dishwasher"> <label for="amenity-9">Dishwasher</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-10" value="DVD"> <label for="amenity-10">DVD</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-11" value="Fan"> <label for="amenity-11">Fan</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-12" value="Fridge"> <label for="amenity-12">Fridge</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-13" value="Grill"> <label for="amenity-13">Grill</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-14" value="Hairdryer"> <label for="amenity-14">Hairdryer</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-15" value="Heating"> <label for="amenity-15">Heating</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-16" value="Wifi"> <label for="amenity-16">Hi-fi</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-17" value="Internet"> <label for="amenity-17">Internet</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-18" value="Iron"> <label for="amenity-18">Iron</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-19" value="Juicer"> <label for="amenity-19">Juicer</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-20" value="Lift"> <label for="amenity-20">Lift</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-21" value="Microwave"> <label for="amenity-21">Microwave</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-22" value="Oven"> <label for="amenity-22">Oven</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-23" value="Parking"> <label for="amenity-23">Parking</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-24" value="Parquet"> <label for="amenity-24">Parquet</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-25" value="Pool"> <label for="amenity-25">Pool</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-26" value="Radio"> <label for="amenity-26">Radio</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-27" value="Roof Terrace"> <label for="amenity-27">Roof terrace</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-28" value="NO Smooking"> <label for="amenity-28">Smoking not allowed</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-29" value="Terrace"> <label for="amenity-29">Terrace</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-30" value="Toaster"> <label for="amenity-30">Toaster</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-31" value="Towelwes"> <label for="amenity-31">Towelwes</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-32" value="Use of Pool"> <label for="amenity-32">Use of pool</label></li>
                        <li class="checkbox"><input type="checkbox" name="amenity[]"  id="amenity-33" value="Furnished"> <label for="amenity-33">Furnished</label></li>
                    </ul> --}}
                    <input type="hidden" class="adid" name="userid" id="adid" value="{{$advert->id}}">
                    <input type="hidden" class="adid" name="add_id" id="adid" value="{{$advert->id}}">
                   
                    {{-- <input type="hidden" class="userid" name="userid" id="userid" value=""> --}}
                    
                </div>
                
              </div>
              <div class="row morginb">
                <div class="col-12">
                    <label class="form-control-label" for="input-address">Number of Rooms</label>
                  <input type="number" class="form-control" name="rooms" value= "{{$advert->rooms}}">
                </div>
                <div class="col-12">
                    <label class="form-control-label" for="input-address">Number of Bathrooms</label>
                  <input type="number" class="form-control" name="bath_rooms" value= "{{$advert->bath_rooms}}" >
                </div>
                <div class="col-12">
                    <label class="form-control-label" for="input-address">Number of Kitchens</label>
                  <input type="number" class="form-control" name="kitchen_rooms" value= "{{$advert->kitchen_rooms}}" >
                </div>
              </div>
            </div>
            
          </div>
         
          <hr class="my-4">
          <!-- Address -->
          <h6 class="heading-small text-muted mb-4">Contact information</h6>
          <div class="">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group focused">
                  <label class="form-control-label" for="input-address">Address</label>
                  <input id="input-address"  name='street' value= "{{$advert->street}}" class="form-control form-control-alternative" placeholder="Bld Mihail Kogalniceanu, nr. 8 Bl 1," type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group focused">
                  <label class="form-control-label" for="input-city">?</label>
                  <input type="text" id="input-city" name='?' class="form-control form-control-alternative" placeholder="33 Myway View" >
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group focused">
                  <label class="form-control-label" for="input-country">Apartment Number</label>
                  <input type="text" id="input-country" name="apartment_number" value= "{{$advert->apartment_number}}" class="form-control form-control-alternative" placeholder="Apt 33">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="input-country">Parish</label>
                  <input type="text" id="input-postal-code" name="parish" value= "{{$advert->parish}}" class="form-control form-control-alternative" placeholder="Parish">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group focused">
                  <label class="form-control-label" for="input-city">City</label>
                  <input type="text" id="input-city" name="" value= " " class="form-control form-control-alternative" placeholder="Mandeville">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group focused">
                  <label class="form-control-label" for="input-country">Phone Number</label>
                  <input type="text"  id="input-country" name="phone_number" value= "{{$advert->phone_number}}" class="form-control form-control-alternative" placeholder="(876)-343-5312">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="input-country">Email Address</label>
                  <input type="email" id="input-postal-code" name="email"  value= "{{$advert->email}}" class="form-control form-control-alternative" placeholder="Postal code">
                </div>
              </div>
            </div>
          </div>
          <hr class="my-4">
        
        <div class="row">
           
        
            <div class="col-sm-12 dropzone mb-4 ">
                <div class="background-white p30 mb30">            
                    <h3 class="page-title">Gallery</h2>
                       
                      
                      <div class="container" id="containers" >
                        <label class="label" for="input">Please upload a picture to be the face of your Advertisment, this is the first photo 
                          everyone will see on the listing page. This is required.</label>
                          <div id="containeers"  class="text-center">

                          </div>
                      
                        <div class="input form-group">
                          <input name="images" class="form-control form-control-alternative" id="file" type="file">
                        </div>
                      </div>
                            {{-- <div class="input-field">
                                <input type="text" name="photo_name" id="name-1">
                                <label for="name-1" placeholder="Give photos a name"></label>
                            </div>
                        
                            <div class="input-field mb-3">
                                <input type="text" name="photo_description" id="description-1">
                                <label for="description-1" placeholder="Description"></label>
                            </div> --}}
                          
                            
                            <div class="form-group">
                            <div id="imageUpload" class="dz-default dz-message dropzoneDragArea stylezone mb-4">
                              <span class="text-danger text-center">Listing Images</span>
                              <br>
                                <span>Drag and drop file to upload or click here. </span>
                            </div>
                            <div class="dropzone-previews"></div>
                            </div>

                            
                            
                
                      @if($errors->any())
                    <div class="alert alert-danger"> 
                      <ul>
                          @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                    </div>
                      @endif
                      
                      <button  class="btn btn-primary btn-block "  id="subi">Upload & Submit</button>
                </div><!-- /.box -->
                
        </div><!-- /.row -->
        </form>
        
      </div>
    
    </div>
  </div>
</div>
</div>
</div>
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/paymentform.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/tagsinput.js')}}"></script>
        {{-- <script type="text/javascript" src="{{ asset('js/images.js')}}"></script> --}}

  <script>
      
      Dropzone.autoDiscover = false;
// Dropzone.options.demoform = false;	
let token = $('meta[name="csrf-token"]').attr('content');

// var imgs = $('#uploadImgs');	



$(function() {


var myDropzone = new Dropzone("div#imageUpload", { 
	paramName: "file",
	url: "{{ url('/listings/storeimage') }}",
	previewsContainer: 'div.dropzone-previews',
	addRemoveLinks: true,
    autoProcessQueue: false,
  
	parallelUploads: 100,
    maxFiles: 10,
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
	params: {
        _token: token
    },
   
	 // The setting up of the dropzone
	init: function() {
        var myDropzone = this;
        
        // Get images
            var myDropzones = this;
            var adid = $('#adid').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
            url: "/imageapi",
            type: 'post',
            data: {request: 2, adi:adid},
            dataType: 'json',
            success: function(data){
                imagepath = data.imageloca;
                $("#uploadImg").attr("src", imagepath);
            
            $.each(data.datas, function (key, value) {

                
            var file = {name: value.name, size:value.size};
            myDropzones.options.addedfile.call(myDropzone, file);
            myDropzones.options.thumbnail.call(myDropzone, file, value.path);
            myDropzones.emit("complete", file);

            });
            }
            });
	    //form submission code goes here
	    $("form[name='formdata']").submit(function(event) {
	    	//Make sure that the form isn't actully being sent.
	    	event.preventDefault();
               var id = $('#adid').val();
	    	URL = $("#form").attr('action');
	    	formData = $('#form').serialize();
	    	$.ajax({
	    		type: 'POST',
	    		url: `/listings/store/${id}/update`,
	    		data:  new FormData(this),
                contentType:false,
                processData:false,
	    		success: function(result){
	    			if(result.status == "success"){
	    				// fetch the useid 
	    				var userid = result.ad_id;
                        $("#adid").val(userid); // inseting userid into hidden input field
          
                        //process the queue
                            console.log(userid);
              myDropzone.processQueue();
             if(myDropzone.processQueue())
             location.reload();
	    			}else{
	    				console.log("error");
	    			}
	    		}
	    	});
	    });
        
	    //Gets triggered when we submit the image.
	    this.on('sending', function(file, xhr, formData){
	    //fetch the user id from hidden input field and send that userid with our image
          let adid = document.getElementById('adid').value;
        //   let user_id = document.getElementById('userid').value;
		   formData.append('adid', adid);
		});
		
	    this.on("success", function (file, response) {
            //reset the form
            $('#form')[0].reset();
            //reset dropzone
            $('.dropzone-previews').empty();
        });

        this.on("queuecomplete", function () {
          
        });
		
        // Listen to 462the sendingmultiple event. In this case, it's the sendingmultiple event instead
	    // of the sending event because  uploadMultiple is set to true.
	    this.on("sendingmultiple", function() {
	      // Gets triggered when the form is actually being sent.
	      // Hide the success button or the complete form.
	    });
		
	    this.on("successmultiple", function(files, response) {
	      // Gets triggered when the files have successfully been sent.
	      // Redirect user or notify of 3657 success.
	    });
		
	    this.on("errormultiple", function(files, response) {
	      // Gets triggered when there was an error sending the files.
	      // Maybe show form again, and notify user of error
	    });
	}, removedfile: function(file) 
        {
            if (this.options.dictRemoveFile) {
              return Dropzone.confirm("Are You Sure to "+this.options.dictRemoveFile, function() {
                if(file.previewElement.id != ""){
                    var name = file.previewElement.id;
                }else{
                    var name = file.name;
                }
                //console.log(name);
                $.ajax({
                    headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                    type: 'POST',
                    url: "/listingimage/delete",
                    data: {filename: name},
                    success: function (data){
                        alert(data.success +" File has been successfully removed!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
               });
            }		
        },
  });


//   $(document).ready(function(){


// // Get images
// var myDropzone = this;
// var adid = $('#adid').val();

// $.ajax({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
// url: "/imageapi",
// type: 'post',
// data: {request: 2, adi:adid},
// dataType: 'json',
// success: function(data){
//     imagepath = data.imageloca;
//     $("#uploadImg").attr("src", imagepath);
 
// $.each(data.datas, function (key, value) {

    
//   var file = {name: value.name, size:value.size};
//   myDropzone.options.addedfile.call(myDropzone, file);
//   myDropzone.options.thumbnail.call(myDropzone, file, value.path);
//   myDropzone.emit("complete", file);

// });
// }
// });

//   });

  var container = $('#containers'),containers = $('#containeers'),inputFile = $('#file'), img,  btn, txt = 'Browse', txtAfter = 'Browse another pic';
 
	if(!container.find('#upload').length){
		container.find('.input').append('<input type="button" value="'+txt+'" id="upload" class="btn btn-primary btn-block ">');
        btn = $('#upload');
    

    containers.prepend( `<img  src="" class=" imgs" alt="Uploaded file" id="uploadImg" width="100">`);
        img = $('#uploadImg');
      
	}
			
	btn.on('click', function(){
        img.animate({opacity: 0}, 300);
        inputFile.click();
      val =1;
	});

	inputFile.on('change', function(e){
		container.find('label').html( 'Remember this is what customers will see first. Please select the best image' );
    // container.find('label').html( inputFile.val() );
    // console.log(inputFile.val())
		var i = 0;
		for(i; i < e.originalEvent.srcElement.files.length; i++) {
			var file = e.originalEvent.srcElement.files[i], 
				reader = new FileReader();

			reader.onloadend = function(){
				img.attr('src', reader.result).animate({opacity: 1}, 700);
			}
            reader.readAsDataURL(file);
            
            img.removeClass('hidden');
            console.log(val);
            console.log(imagepath);
		}
		
		btn.val( txtAfter );
    });
    


 
});


// var imgs = $('#uploadImgs');	




  </script>
    
              
@endsection
@section('javascript')


@endsection


