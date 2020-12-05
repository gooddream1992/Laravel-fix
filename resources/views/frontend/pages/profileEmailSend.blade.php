@extends('masters.frontmaster')
@section('title', __(' Email Me'))
@section('main')
   @if (session()->has('status'))
    <div class="alert alert-info" style="text-align: center;">
        {{ session('status') }}
    </div>
@endif
<div class="container">
   <section class="profile-send-email-sec">
      <div class="row justify-content-center">
         <div class="col-lg-7">
            <div class="sec-title justify-content-center">
               <h3 style="text-align: center;">Send Email</h3>
            </div>
               <form action="{{ route('profile-guest-mail') }}" method="post">
                  @csrf
                  <div class="form-group">
                     <input type="hidden" class="form-control" name="id" value="{{ $id }}" />
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" placeholder="Your Name" name="name" />
                  </div>
                  <div class="form-group">
                     <input type="email" class="form-control" placeholder="Your Email Id " name="email" />
                  </div>
                  <div class="form-group">
                     <textarea class="form-control" placeholder="Your Message" name="message"></textarea>
                  </div>
                  <div class="form-group text-center">
                     <button class="btn red-small " type="submit">Submit</button> 
                  </div>
               </form>
         </div>
      </div>
   </section>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		$('.alert-info').delay(5000).fadeOut(800); 
	});
</script>
@endsection