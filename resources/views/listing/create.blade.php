@extends('layouts.app')

@section('content')
@section('css')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
<link href="{{ asset('css/paymentform.css') }}" rel="stylesheet">


@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script type="text/javascript" src="{{ asset('js/image-uploader.js')}}"></script>



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
            @if(!empty($message))
            <div class="alert alert-danger pb-2 text-center">
                {{ $message }}
            </div>
        @endif
        @if(session()->has('message'))
        <div class="alert alert-success pb-2">
            {{ session()->get('message') }}
        </div>
    @endif
          </div>
          <div class="col-4 text-right">
            <a href="#!" class="btn btn-sm btn-primary">Settings</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form id = "form" method="post" name="formdata"  action= "/listings/store" enctype="multipart/form-data">
          @csrf
          <h6 class="heading-small text-muted mb-4">Building Details</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="">
                    <h3 class="page-title">Description</h3>
                    <div class="form-group">
                        <input class="form-control" type="text" name="title" placeholder="Listing Title: eg, 2 Bed room apartment Furnished ">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <textarea class="form-control" maxlength="235" placeholder="Listing Description"  name="description" rows="8"></textarea>
                    </div><!-- /.form-group -->
                </div><!-- /.box -->

                <div class="row">

                <div class="input-group  mb-3 col-4 pl-3 ">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input type="text" class="form-control" placeholder="Price" name="price" aria-label="Amount (to the nearest dollar)">
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


                    <ul class="amenities float-right pl-3 ">
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
                    </ul>
                    <input type="hidden" class="adid" name="userid" id="adid" value="">
                    <input type="hidden" class="payment" name="payments" id="payment" value="">

                </div>

              </div>
            </div>

          </div>
          <div class="form-row">
            <div class="col-4">
              <input type="number" class="form-control" name="rooms" placeholder="Number of Rooms">
            </div>
            <div class="col-4">
              <input type="number" class="form-control" name="bath_rooms" placeholder="Number of Bathroom">
            </div>
            <div class="col-4">
              <input type="number" class="form-control" name="kitchen_rooms" placeholder="Number of Kitchens">
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
                  <input id="input-address"  name='street' class="form-control form-control-alternative" placeholder="Bld Mihail Kogalniceanu, nr. 8 Bl 1," type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group focused">
                  <label class="form-control-label" for="input-city">Address 2</label>
                  <input type="text" id="input-city" name='street2' class="form-control form-control-alternative" placeholder="33 Myway View" >
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group focused">
                  <label class="form-control-label" for="input-country">Apartment Number</label>
                  <input type="text" id="input-country" name="apartment_number" class="form-control form-control-alternative" placeholder="Apt 33">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="input-country">Parish</label>
                  <input type="text" id="input-postal-code" name="parish" class="form-control form-control-alternative" placeholder="Parish">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group focused">
                  <label class="form-control-label" for="input-city">City</label>
                  <input type="text" id="input-city" name="" class="form-control form-control-alternative" placeholder="Mandeville">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group focused">
                  <label class="form-control-label" for="input-country">Phone Number</label>
                  <input type="text" data-role="tagsinput" id="input-country" name="phone_number" class="form-control form-control-alternative" placeholder="(876)-343-5312">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="input-country">Email Address</label>
                  <input type="email" id="input-postal-code" name="email" class="form-control form-control-alternative" placeholder="Postal code">
                </div>
              </div>
            </div>
          </div>
          <hr class="my-4">

        <div class="row">


            <div class="col-sm-12 dropzone mb-4">
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
            @if(session()->has('message'))
                <div class="alert alert-success pb-2">
                    {{ session()->get('message') }}
                </div>
            @endif

                      <button  class="btn btn-primary btn-block " type ="button" id ="subi" >Upload & Submit</button>
                </div><!-- /.box -->

        </div><!-- /.row -->
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<style>

</style>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLongTitle">Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container py-5">

          <div class="row">
              <div class="col-lg-12 mx-auto">
                  <div class="card ">
                      <div class="card-header">
                          <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                              <!-- Credit card form tabs -->
                              <ul role="tablist" class="nav  nav-pills rounded nav-fill mb-3 text-white">
                                  <li class="nav-item text-white"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                                  <li class="nav-item text-white"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                                  <li class="nav-item text-white"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Net Banking </a> </li>
                              </ul>
                          </div> <!-- End -->
                          <!-- Credit card form content -->
                          <div class="tab-content">
                              <!-- credit card info-->
                              <div id="credit-card" class="tab-pane fade show active pt-3">
                                  <form role="form" method="post" id="paymentData" name="paymentData" action ="/listings/payment" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group"> <label for="username">
                                        <h6>Payment</h6>
                                        <h6>Each advertisement cost $1000 but pay 15,000 to have your advertisement Featured</h6>
                                    </label> <input type="number" name="amount" placeholder="$1000" value="1000.00" required class="form-control "> </div>
                                      <div class="form-group"> <label for="username">
                                              <h6>Card Owner</h6>
                                          </label> <input type="text" name="full_name" placeholder="Card Owner Name" required class="form-control "> </div>
                                      <div class="form-group"> <label for="cardNumber">
                                              <h6>Card number</h6>
                                          </label>
                                          <div class="input-group"> <input type="text" name="card_number" placeholder="Valid card number" class="form-control " required>
                                              <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-sm-8">
                                              <div class="form-group"> <label><span class="hidden-xs">
                                                          <h6>Expiration Date</h6>
                                                      </span></label>
                                                  <div class="input-group"> <input type="date" placeholder="MM/YY" name="experation_date" class="form-control" required> </div>
                                              </div>
                                          </div>
                                          <div class="col-sm-4">
                                              <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                      <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                  </label> <input type="text" name="ccv"required class="form-control">
                                                  <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                                  <input type="hidden" name="payment_id">
                                                  <input type="hidden" name="advert_id">
                                                 </div>

                                          </div>

                                      </div>
                                      <div class="card-footer">
                                         <button type="subnit" class="subscribe btn btn-primary btn-block shadow-sm">
                                            Confirm Payment </button>

                                  </form>
                              </div>
                          </div> <!-- End -->
                          <!-- Paypal info -->
                          <div id="paypal" class="tab-pane fade pt-3">
                              <h6 class="pb-2">Select your paypal account type</h6>
                              <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio" checked> Domestic </label> <label class="radio-inline"> <input type="radio" name="optradio" class="ml-5">International </label></div>
                              <p> <button type="button" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i> Log into my Paypal</button> </p>
                              <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                          </div> <!-- End -->
                          <!-- bank transfer info -->
                          <div id="net-banking" class="tab-pane fade pt-3">
                              <div class="form-group "> <label for="Select Your Bank">
                                      <h6>Select your Bank</h6>
                                  </label> <select class="form-control" id="ccmonth">
                                      <option value="" selected disabled>--Please select your Bank--</option>
                                      <option>Bank 1</option>
                                      <option>Bank 2</option>
                                      <option>Bank 3</option>
                                      <option>Bank 4</option>
                                      <option>Bank 5</option>
                                      <option>Bank 6</option>
                                      <option>Bank 7</option>
                                      <option>Bank 8</option>
                                      <option>Bank 9</option>
                                      <option>Bank 10</option>
                                  </select> </div>
                              <div class="form-group text-center">
                                  <p> <button type="button" class="btn btn-primary " id="subi"><i class="fas fa-mobile-alt mr-2"></i> Proceed Pyment</button> </p>
                              </div>
                              <p class="text-muted">Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                          </div> <!-- End -->
                          <!-- End -->
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-footer" style="justify-content: center !important;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>



        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script>


<script>
  Dropzone.autoDiscover = false;
// Dropzone.options.demoform = false;
let token = $('meta[name="csrf-token"]').attr('content');
var payment_id;
$(function() {

  console.log(  $(".file").val());

var myDropzone = new Dropzone("div#imageUpload", {
	paramName: "images",
	url: "{{ url('/listings/storeimage') }}",
	previewsContainer: 'div.dropzone-previews',
	addRemoveLinks: true,
    autoProcessQueue: false,

	parallelUploads: 100,
    maxFiles: 10,
    acceptedFiles: ".jpeg,.jpg,.png,.gif,",
	params: {
        _token: token
    },

	 // The setting up of the dropzone
	init: function() {
	    var myDropzone = this;
      //form submission code goes here
      $(document).ready(function(){



$("#subi").click(function(){

  $('#exampleModalCenter').modal('show');

  $("form[name='paymentData']").submit(function(event) {
	    	//Make sure that the form isn't actully being sent.
	    	event.preventDefault();

	    	URL = $("#form").attr('action');

	    	$.ajax({
	    		type: 'POST',
	    		url: '/listings/payment',
	    		data:  new FormData(this),
                contentType:false,
                processData:false,
	    		success: function(result){
	    			if(result.status == "success"){

            $('#exampleModalCenter').modal('hide');

            $("#payment_id").val(result.pay_id);
            $("#payment").val(result.amount);
            payment_id =result.pay_id;

	    	$(document).ready(function() {
	    	//Make sure that the form isn't actully being sent.

        formData = $('#form').serialize();

	    	$('#form').ajaxSubmit({
	    	type: 'POST',
	    	url: '/listings/store',

	    	success: function(result){
	    	if(result.status == "success"){
	    	// fetch the useid
	    	var userid = result.ad_id;
            $("#adid").val(userid);
            $("#advert_id").val(userid); // inseting userid into hidden input field
             //process the queue
            console.log(userid);
            myDropzone.processQueue();
            payment( userid);
	    	}else{
	    	console.log("error");
	    	}
	    	}
	    	});
      });
	    			}else{
	    				console.log("error");
	    			}
	    		}
	    	});
      });
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
            // window.location.reload();

            $('.dropzone-previews').empty();
            window.location.reload();
            //reset dropzone

            // window.location.reload();
        });

        this.on("queuecomplete", function () {

        });


	}
  });

  var container = $('#containers'),containers = $('#containeers'),inputFile = $('#file'), img, btn, txt = 'Browse', txtAfter = 'Browse another pic';

	if(!container.find('#upload').length){
		container.find('.input').append('<input type="button" value="'+txt+'" id="upload" class="btn btn-primary btn-block ">');
		btn = $('#upload');
    containers.prepend('<img  src="" class="hidden imgs" alt="Uploaded file" id="uploadImg" width="100">');
    img = $('#uploadImg');

	}

	btn.on('click', function(){
		img.animate({opacity: 0}, 300);
		inputFile.click();
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
		}

		btn.val( txtAfter );
    });




});

  </script>

@endsection
@section('javascript')


@endsection


