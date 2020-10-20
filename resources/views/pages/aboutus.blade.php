@extends('layouts.app')
@section('css')
<link href="{{ asset('css/listing.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('../img/wall.jpg');">
<div class="container">
  <div class="row align-items-center justify-content-center">
    <div class="col-md-7 text-center" >
      <h1 class="text-white">About Us</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    </div>
  </div>
</div>
</div>

<style>

</style>

  @include('footer.footer')

@endsection

@section('javascript')
<script href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
@endsection