@extends('masters.frontmaster')
@section('title', 'Profile Details')
@section('main')
<style>
  a{
        text-decoration: none;
    color: #f3f5f7;
}

</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="content-wrapper">
 
   <section class="content-header">
      <div class="container-fluid">
         <!-- SELECT2 EXAMPLE -->
         <div class="card card-default">
            <!-- /.card-header -->
            <div class="card-body">
              <a href="{{url('/home')}}" class="btn btn-primary">Back</a><hr>
               <div class="text-center btn btn-success" style="width: 100%">
                  <h3>
                       <a href="{{ url('escort/profile/image') }}" class="btn btn-light">Gallery</a>
                     <a href="{{ route('escort.slider') }}" class="btn btn-light">Slider</a>
                     <a href="{{ route('escort.video') }}" class="btn btn-light">Video</a>
                     <a href="{{ route('escort.selfie') }}" class="btn btn-light">Selfie Gallery</a>  <!-- Profile Images -->
                  </h3>
               </div>
               <hr>
               <!-- Slider Start's Here -->
               <form role="form" method="POST" action="{{ url('profile/image/store') }}" enctype="multipart/form-data">
                   {{ csrf_field() }}
                   <div class="row">
                      <div class="col-md-6">
                         <div class="row">
                            <div class="col-lg-12">
                               <div class="form-group sip_mt">
                                  <div class="select_2_alska2">
                                     <label class="FormLabel1">{{ __('Escort') }}*</label>
                                  </div>
                                  <div class="selct_2_alska">
                                     <input type="hidden" name="escortId" value="@if(isset($users[0]->id)) {{ $users[0]->id }} @endif" class="form-control">
                                     <input type="text" name="name" value="@if(isset($users[0]->name)) {{ $users[0]->name }} @endif" class="form-control" readonly>
                                  </div>
                               </div>
                            </div>
                            <div class="col-lg-12">
                               <div class="form-group sip_mt">
                                  <div class="select_2_alska2">
                                     <label class="FormLabel1"> {{ __('Profile Image') }}*</label>
                                  </div>
                                  <div class="selct_2_alska">
                                     <input name="image" type="file" accept="image/*" value="0">
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-md-6">
                         <div class="row">
                            <div class="col-lg-12">
                               <div class="form-group sip_mt">
                                  <div class="select_2_alska2">
                                     <label class="FormLabel1">{{ __('Upload To') }}*</label>
                                  </div>
                                  <div class="selct_2_alska">
                                    <input type="hidden" name="status" value="1">
                                    <input type="text" name="Slider" value="Slider" class="form-control" readonly>
                                  </div>
                               </div>
                            </div>
                            <div class="col-lg-12">
                               <div class="form-group sip_mt">
                                  <div class="select_2_alska2">
                                  </div>
                                  <div class="selct_2_alska">
                                     <input type="submit" class="btn btn-success" value="Save">
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </form>
               <!-- Slider End's Here -->
            </div>
         </div>
      </div>
   </section>
</div>
@endsection