@extends('layouts.app')
@section('css')
<link href="{{ asset('css/listing.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.css" rel="stylesheet">
<link href="{{ asset('css/cards.css') }}" rel="stylesheet">

<link href="{{ asset('css/new_listing.css') }}" rel="stylesheet">
<link href="{{ asset('css/aos.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('../img/dining-room-medium.jpg');">
<div class="container">
  <div class="row align-items-center justify-content-center ">
    <div class="col-md-7 text-center pt-5 mt-5 " >
      <h1 class="text-white">Apartments</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
      
      


      <form id="" action="/listings/filtered" method="post" > 
        @csrf
    
          <!-- Actual search box -->
          <div class="form-group has-search input-field-text-white">
            <span class="fa fa-search form-control-feedback"></span>
            <input type="text" class="form-control " name="search" placeholder="Search" >
          </div>  
          
          <label for="exampleFormControlSelect2" style="color:white">Search by prices</label>
          <div class=" rowsize " style="  margin-right: -15px !important;
          margin-left: -15px !important;">  
          <div class="form-group col-6 text-white">
             
              <select class="form-control" id="exampleFormControlSelect2" name= "price1" style="    color: white !important;">
                <option >From</option>
                
            @foreach($advertisments as $adds)
               
                <option> {{$adds->price }}</option>
            @endforeach
              </select>
          </div>
  
          <div class="form-group col-6 text-white">
            
              <select class="form-control" id="exampleFormControlSelect2" name= "price2"  style="    color: white !important;">
                <option>To</option>
              @foreach($advertisments as $addprice)
               
                <option> {{$addprice->price }}</option>
              @endforeach
              </select>
          </div>
            
          </div>
          <div class=" text-center">
            <button  class ="btn btn-dark btn-sm  btn-block" type="submit">
              search
            </button>
          </div>
        </form>
      
    </div>
  </div>
</div>
</div>



<div class="row rowchange">

<aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12 pt-4 pb-4" >
   
    
  <form id="" action="/listings/filtered" method="post" > 
      @csrf
  
        <!-- Actual search box -->
        <div class="form-group has-search">
          <span class="fa fa-search form-control-feedback"></span>
          <input type="text" class="form-control" name="search" placeholder="Search">
        </div>  

        <label for="exampleFormControlSelect2">Search by prices</label>
        <div class="row" style="  margin-right: -15px !important;
        margin-left: -15px !important;">  
        <div class="form-group col-6">
           
            <select class="form-control" id="exampleFormControlSelect2" name= "price1">
              <option>From</option>
              
          @foreach($advertisments as $adds)
             
              <option> {{$adds->price }}</option>
          @endforeach
            </select>
        </div>

        <div class="form-group col-6">
          
            <select class="form-control" id="exampleFormControlSelect2" name= "price2">
              <option>To</option>
            @foreach($advertisments as $addprice)
             
              <option> {{$addprice->price }}</option>
            @endforeach
            </select>
        </div>
        </div>
        <div class=" text-center">
          <button  class ="btn btn-dark btn-sm  btn-block" type="submit">
            search
          </button>
        </div>
      </form>

 </aside>

<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
   
{{-- @include('layouts.cards') --}}
{{-- <div class="container">
  <div class="row"> --}}
 
<div class="site-secion pt-4">
  <div class="container">
    <!-- <div class="row">
      <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
        <h2 class="mb-5">Browse Apartments</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, fugit nam obcaecati fuga itaque deserunt
          officia, error reiciendis ab quod?</p>
      </div>
    </div> -->
    <div class="row">
      @foreach($advertisments as $add)
      <div class="col-md-6 col-lg-3 mb-5" data-aos="fade-up" data-aos-delay="100">
      <a href="/listingsextra/{{$add->id}}" class="unit-9">
          <div class="image" style="background-image: url('{{$add->images}}');"></div>
          <div class="unit-9-content">
            <h2>{{$add->street}}</h2>
            <span>${{$add->price}}/night</span>
            <!-- <span>with Wendy Matos</span> -->
          </div>
        </a>
      </div>

      
      @endforeach
      {{$advertisments->links()}} 
    </div>
  </div>
</div>



{{-- 

@foreach($advertisments as $add)


<div class="r_card ">
  <div class="r_car">
      <div class="r_ca">

<div class="imagecontainer">
  <div class="r_card_header" role="img" style=" background: url('http://www.2oceansvibe.com/wp-content/uploads/2011/07/man4.jpg') 50% 0% no-repeat;" >   
  </div>
</div>
<div class="contentcontainer">
  <div class="r_card_content">
      <div class="adress">
          <i class="fa fa-map-marker" aria-hidden="true"></i>
          {{$add->street}}

      </div>
      <div class="text_info">
        {{$add->description}}
          <div class="text_info_shade"></div>
      </div>
  </div>
  <div class="price_info">
      <span class="price_w">Price:</span>
      <span class="price_v">$ {{$add->price}}</span>
  </div>
  <div class="r_card_footer">
      <div class="icon area pr-2">
      {{$add->kitchen_rooms}} <i class="fas fa-utensils"></i>
          
      </div>
     
      <div class="icon bath pr-1">
        {{$add->bath_rooms}} <i class="fa fa-bath" aria-hidden="true"></i>
      </div>
       <div class="icon area ">
        {{$add->rooms}} <i class="fa fa-bed" aria-hidden="true"></i> 
      </div>
  </div>
</div>
</div>
</div>
</div>

@endforeach
{{$advertisments->links()}} --}}
  {{-- </div>
</div> --}}

<script>
  $(document).ready(function(){

  $('.r_card').click(function(){
      $('.text_info').toggleClass('active');
      $('.text_info_shade').toggleClass('active_shade');
  });
});
AOS.init({
 	duration: 800,
 	easing: 'slide',
 	once: true
 });
</script>
</div>

</div>
  @include('footer.footer')

@endsection

@section('javascript')
<script src="{{ asset('js/aos.js') }}"></script>
@endsection