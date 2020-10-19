@extends('masters.frontmaster')
@section('title', 'Profile Details')
@section('main')
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
          <div class="text-center btn btn-success" style="width: 100%"><h3>
             <a href="{{ url('escort/profile/image') }}" class="btn btn-light">Gallery</a>
                     <a href="{{ route('escort.slider') }}" class="btn btn-light">Slider</a>
                     <a href="{{ route('escort.video') }}" class="btn btn-light">Video</a>
                     <a href="{{ route('escort.selfie') }}" class="btn btn-light">Selfie Gallery</a> <!-- Profile Images -->
              
            </h3>
          </div>
          <br><br>
          
          <a href="{{ route('addgallery') }}" class="btn btn-success">Add Gallery Image</a>
          <hr>
            

          <!-- Gallert Start's Here -->
            <div class="row">
              <div class="col-md-12">
                <div id="mdb-lightbox-ui"></div>
                <div class="mdb-lightbox no-margin">
                  @foreach($gallery as $value)
                    <figure class="col-md-4">
                      <a href="{{ route('escort.profile-image-gallery',$value->id) }}" data-size="1600x1067" title="Edit Image Gallery">
                        <img alt="picture" src="{{ asset('public/uploads/'.$value->image) }} " class="img-fluid" style=" border-radius: 8px; width: 500px; height: 300px;"><br><br>
                      </a>
                     </figure>
                  @endforeach
                </div>
              </div>
            </div>
            <!-- Gallert End's Here -->

       <!--    <form role="form" method="POST" action="{{url('profile/image/store')}}" enctype="multipart/form-data">
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
                        <select class="form-control" name="escortId">
                         <option value="@if(isset($profile_images[0]->userid)) {{$profile_images[0]->userid }} @endif">@if(isset($profile_images[0]->name)) {{$profile_images[0]->name }} @endif</option>
                        </select>
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
                        <img src="@if(isset($profile_images[0]->image) && !empty($profile_images[0]->image)) {{ asset('public/uploads/'.$profile_images[0]->image) }} @else {{ asset('public/blankphoto.png') }} @endif" style="width: 100%;">
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
                          <option value="1" @if(isset($profile_images[0]->slider) && $profile_images[0]->slider == 1) Selected @endif >Slider</option>
                          <option value="2" @if(isset($profile_images[0]->slider) && $profile_images[0]->slider == 2) Selected @endif >Gallery</option>
                          <option value="3" @if(isset($profile_images[0]->slider) && $profile_images[0]->slider == 3) Selected @endif >Video </option>
                          <option value="4" @if(isset($profile_images[0]->slider) && $profile_images[0]->slider == 4) Selected @endif >Selfie Gallery</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Image Url') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="url" class="form-control" value="@if(isset($profile_images[0]->url)) {{ $profile_images[0]->url }} @endif">
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
            
          </form> -->
         <!--  <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>{{ __('Picture') }}</th>
                <th>{{ __('Escort') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Url') }}</th>
                <th>{{ __('Action') }}</th>
              </tr>
            </thead>
            <tbody>
              <?php
              /*  $pfimages =\App\ProfileImage::all()->where('escortId', Auth::user()->id );*/
              ?>
              <?php $i=1;?>
              <tr>
                <td>
                  <img src="@if(isset($profile_images[0]->image) && !empty($profile_images[0]->image)) {{ asset('public/uploads/'.$profile_images[0]->image) }} @else {{ asset('public/blankphoto.png') }} @endif" style="width: 30px;">
                </td>
                <td>
                  @if(isset($profile_images[0]->name)) {{$profile_images[0]->name }} @endif
                </td>
                <td>
                  @if(isset($profile_images[0]->slider))
                    {{ ($profile_images[0]->slider ==1) ? "Slider" : "" }}
                    {{ ($profile_images[0]->slider ==2) ? "Gallery" : "" }}
                    {{ ($profile_images[0]->slider ==3) ? "Video" : "" }}
                    {{ ($profile_images[0]->slider ==4) ? "Selfie Gallery" : "" }}
                  @endif
                </td>
                <td>
                  @if(isset($profile_images[0]->url)) {{ $profile_images[0]->url }} @endif
                </td>
                
                
                <td>
                  @if(isset($profile_images[0]->id))
                  <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl{{$profile_images[0]->id }}">Modify</a>
                  <a href="{{url('profile/image/delete/'.$profile_images[0]->id)}}" class="btn btn-xs btn-danger">Delete</a>
                   @endif
                </td>
                
                
                
              </tr>
              
            </table> -->
            <?php
                $pfimages =\App\ProfileImage::all()->where('escortId', Auth::user()->id );
              ?>
            <!--  ==================================Modal Start============================================= -->
            @foreach($pfimages as $data)
            <div class="modal fade" id="modal-xl{{$profile_images[0]->id}}">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header" style="background: #b00404;">
                    <h4 class="modal-title">Modify Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form role="form" method="POST" action="{{url('profile/image/update')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                      
                      <input type="hidden" name="id" value="{{$data->id}}">
                      <div class="row">
                        
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                <div class="select_2_alska2">
                                  <label class="FormLabel1">{{ __('Escort') }}*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <select class="form-control" name="escortId">
                                    <option value="{{$data->escortId}}">Current {{\App\User::find($data->escortId)->name}}</option>
                                    <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                <div class="select_2_alska2">
                                  <label class="FormLabel1">{{ __('Profile Image') }}*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <input name="image" type="file" accept="image/*" value="{{$data->image}}">
                                  @if($data->image==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width: 30px;"> @else <img src="{{asset('public/uploads/'.$data->image)}}" style="width: 30px;">@endif
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
                                    <option value="{{$data->status}}">Current @if($data->status==1) Slider @elseif($data->status==2) Gallery @elseif($data->status==3) Video @elseif($data->status==4) Selfie Gallery @else None @endif </option>
                                    <option value="1">Slider</option>
                                    <option value="2">Gallery</option>
                                    <option value="3">Video </option>
                                    <option value="4">Selfie Gallery</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            
                            <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                <div class="select_2_alska2">
                                  <label class="FormLabel1">{{ __('Image Url') }}*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <input type="text" name="url"  value="{{$data->url}}">
                                </div>
                              </div>
                            </div>
                            
                            
                            
                            
                            
                          </div>
                          
                        </div>
                      </div>
                      
                      
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                  
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal-dialog -->
            @endforeach


                      </div>
                      
                      
                      
                      
                    </div>
                    
                  </div>
                </section>
              </div>
              @endsection