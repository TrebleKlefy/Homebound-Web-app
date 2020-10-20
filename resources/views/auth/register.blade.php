<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="colorlib.com">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">
        <link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.css') }}" >
		<!-- STYLE CSS -->
		<link href="{{ asset('css/register.css') }}" rel="stylesheet">
       
        <script src="{{ asset('js/jquery.steps.js')}}" defer></script>
    	<script src="{{ asset('js/main.js')}}" defer></script>
   
 
		
	</head>
	<body>
        <div class="wrapper">
            <form id="wizard"  method="POST" action="{{ route('register') }}">
              @csrf
         
        		<!-- SECTION 1 -->
                <h2></h2>
                <section>
                    <div class="inner flex">
						<div class="image-holder">
							<img src="../img/apartment.jpg" alt="">
						</div>
						<div class="form-content reg" >
							<div class="form-header ">
								<h3>Registration</h3>
							</div>
							<p>Please fill with your details</p>
							<div class="form-row">
								<div class="form-holder">
                                    <input id="firstname" type="text" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="First Name">
								</div>
								<div class="form-holder">
                                    <input id="lastname" type="text" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{ old('name') }}" required autocomplete="name" autofocus  placeholder="Last Name">
								</div>
							</div>
							<div class="form-row">
								<div class="form-holder">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Email">
								</div>
								<div class="form-holder">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  placeholder="Password">
								</div>
							</div>
							<div class="form-row">
								<div class="form-holder">
                                    <input id="confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"  placeholder="Confirm password">
                                    <label id="error" style='font-size:10px; color:red;'></label>
								</div>
								<div class="form-holder" style="align-self: flex-end; transform: translateY(4px);">
									
									  {{-- here --}}
									<div class="checkbox-tick">
										<label class="male">
										
											<input type="radio" name="gender" value="male" checked> Male<br>
							
											<span class="checkmark"></span>
										</label>
										<label class="female">
											<input type="radio" name="gender" value="female"> Female<br>
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
							</div>
							{{-- <div class="checkbox-circle">
								<label>
									<input type="checkbox" checked> Nor again is there anyone who loves or pursues or desires to obtaini.
									<span class="checkmark"></span>
								</label>
							</div> --}}
						</div>
					</div>
                </section>

				<!-- SECTION 2 -->
                <h2></h2>
                <section>
                    <div class="inner">
						<div class="image-holder">
							<img src="../img/skyscraper.jpg" alt="">
						</div>
						<div class="form-content reg">
							<div class="form-header">
								<h3>Registration</h3>
							</div>
							<p>Please fill with additional info</p>
							<div class="form-row">
								<div class="form-holder w-100">
                                    <input id="streetline" type="text" class="form-control @error('streetline') is-invalid @enderror" name="streetline" value="{{ old('name') }}" required autocomplete="name" autofocus  placeholder="Street Line">
								</div>
							</div>
							<div class="form-row">
								<div class="form-holder">
                                    <input id="city" type="text" class="form-control @error('name') is-invalid @enderror" name="city" value="{{ old('name') }}" required autocomplete="name" autofocus  placeholder="City">
								</div>
								<div class="form-holder">
                                    <input id="postoffice" type="text" class="form-control @error('name') is-invalid @enderror" name="postOffice" value="{{ old('postoffice') }}" required autocomplete="postoffice" autofocus  placeholder="Post Office">
								</div>
							</div>

							<div class="form-row">
								<div class="select">
									<div class="form-holder">
                                        <input id="country" type="text" class="form-control @error('name') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="Country" autofocus  placeholder="Country">
									</div>
									
								</div>
								<div class="form-holder">
                                    <input id="trn" type="text" class="form-control @error('name') is-invalid @enderror" name="trn" value="{{ old('trn') }}" required autocomplete="TRN" autofocus  placeholder="TRN">
                                </div>
							</div>
						</div>
					</div>
                </section>

                <!-- SECTION 3 -->
                <h2></h2>
                <section>
                    <div class="inner">
						<div class="image-holder">
							<img src="../img/city.jpg" alt="">
						</div>
						<div class="form-content reg">
							<div class="form-header">
								<h3>Registration</h3>
							</div>
							<p>Send an optional message</p>
							<div class="form-row">
								<div class="form-holder w-100">
                                   
                                    <input id="primary_number" type="text" class="form-control @error('PhoneNumber') is-invalid @enderror" name="primary_number" value="{{ old('name') }}" required autocomplete="name" autofocus  placeholder="Phone Number">
								</div>
							</div>
							<div class="form-row">
								<div class="form-holder">
                                    <input id="secondary_number" type="text" class="form-control @error('PhoneNumber') is-invalid @enderror" name="secondary_number" value="{{ old('name') }}" required autocomplete="name" autofocus  placeholder="Alternative Phone Number">
									
								</div>
								<div class="form-holder">
									<input type="text" name="pos" placeholder="postOffice" class="form-control" required>
								</div>
							</div>
							<div class="checkbox-circle mt-24">
								<label>
									<input type="checkbox" checked >  Please accept <a href="#">terms and conditions ?</a>
									<span class="checkmark"></span>
								</label>
								
                            </div>
							</div>
						</div>
					</div>
                </section>

            </form>
		</div> 

    
    <Script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </Script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

		<!-- JQUERY STEP -->
		
		<!-- Template created and distributed by Colorlib -->
</body>
</html>