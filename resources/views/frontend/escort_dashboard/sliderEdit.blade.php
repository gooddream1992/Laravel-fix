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
            <div class="text-center btn btn-success" style="width: 100%">
               <h3>
                  <a href="{{ url('escort/profile/image') }}" class="btn btn-light">Gallery</a>
                     <a href="{{ route('escort.slider') }}" class="btn btn-light">Slider</a>
                     <a href="{{ route('escort.video') }}" class="btn btn-light">Video</a>
                     <a href="{{ route('escort.selfie') }}" class="btn btn-light">Selfie Gallery</a>  <!-- Profile Images -->
               </h3>
            </div>
            <hr>
            <!-- Gallert Start's Here -->

                  <div class="modal-content">
                     
                     <form role="form" method="POST" action="{{url('profile/image/update')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                           <input type="hidden" name="id" value="">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group sip_mt">
                                          <div class="select_2_alska2">
                                             <label class="FormLabel1">{{ __('Escort') }}*</label>
                                          </div>
                                          <div class="selct_2_alska">
                                             <!-- <select class="form-control" name="escortId">
                                                <option value=""></option>
                                                <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                                             </select> -->
                                             <input type="hidden" name="id" value="@if(isset($slider[0]->id)) {{ $slider[0]->id }} @endif" class="form-control">
                                             <input type="hidden" name="escortId" value="@if(isset($slider[0]->escortId)) {{ $slider[0]->escortId }} @endif" class="form-control">
                                             <input type="text" name="name" value="@if(isset($slider[0]->escortname)) {{ $slider[0]->escortname }} @endif" class="form-control" readonly>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group sip_mt">
                                          <div class="select_2_alska2">
                                             <label class="FormLabel1">{{ __('Profile Image') }}*</label>
                                          </div>
                                          <div class="selct_2_alska">
                                             <input name="image" type="file" accept="image/*" value="@if(isset($slider[0]->image)){{ $slider[0]->image }}@endif">
                                             @if(isset($slider[0]->image) && !empty($slider[0]->image))
                                             <img src="{{asset('public/uploads/'.$slider[0]->image)}}" style="width: 200px; height: 100px;">
                                              @else
                                             <img src="{{asset('public/blankphoto.png')}}" style="width: 30px;">
                                              @endif
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
                                             <select class="form-control" name="status">
                                                <option value="1" @if(isset($slider[0]->status) && $slider[0]->status ==1 ) selected @endif>Slider</option>
                                                <option value="2"  @if(isset($slider[0]->status) && $slider[0]->status ==2 ) selected @endif>Gallery</option>
                                                <option value="3"  @if(isset($slider[0]->status) && $slider[0]->status ==3 ) selected @endif>Video </option>
                                                <option value="4"  @if(isset($slider[0]->status) && $slider[0]->status ==4 ) selected @endif>Selfie Gallery</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                   
                                 </div>
                              </div>
                           </div>
                           <div class="modal-footer justify-content-between">
                              
                              <a href="{{url('profile/image/delete/'.$slider[0]->id)}}" class="btn btn-danger">Delete</a>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                           </div>
                     </form>
                     </div>
                  </div>
               
            <!-- /.modal-dialog -->

            <!-- Gallert End's Here -->
         </div>
      </div>
   </div>
</section>
@endsection