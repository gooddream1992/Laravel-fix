@extends('masters.frontmaster')
@section('title', __('Index'))
@section('main')
       <style type="text/css">
  
.fas{font-size: 3em;
     color: #f8060a;}
h1{background:#f8060a;width: 100%;padding:10px;color: white; }
.Feature_Item{border:1px solid red;margin:5px;padding: 10px;}
.Feature_Item:hover{border:1px solid gray;margin:5px;padding: 10px;background: #f7f7f7;}

.table, div{color:red;}
/*Modal Section*/
.modal-dialog{max-width:none;}

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<?php $users =\App\User::all()->where('roleStatus', 2);?>
<h1 align="center">
  @if(Auth::user()->photo==NULL)
    <img src="{{asset('public/blankphoto.png')}}" style="width:50px;height:50px;border-radius: 50%;">
  @else
    <img src="{{asset('public/uploads/'.Auth::user()->photo)}}" style="width: 50px;height:50px;border-radius: 50%;">
  @endif {{Auth::user()->name}}
</h1>
   <!-- Content Header (Page header) -->
     <div class="container">
      <b>Availability</b>
        <input type="hidden" name="profile_id" value="{{ Auth::user()->id }}" id="profile_id">
        <label class="switch">
          <input type="checkbox" name="availability" value="availability" id="togBtn" @if(Auth::user()->timerStatus == 1)checked @endif>
          <span class="slider round"></span>
        </label>
        <?php
            $startTime = date("Y-m-d H:i:s");
            $cenvertedTime = date('Y-m-d H:i:s',strtotime('+6 hour',strtotime($startTime)));
         ?>
        <input type="hidden" name="todayDT" value="<?php echo $cenvertedTime; ?>" id="todayDT">
          <input type="hidden" name="datetime" value="{{ Auth::user()->timer }}" id='datetime'>
        <div id="timer"></div>
     </div>
    <section class="content-header">
        <div class="container-fluid">            
            <div class="row mb-2">
                <div class="col-lg-12">
                    <div class="Feature_main mt-3">
                      <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link d-block" href="{{url('escort/profile/setting/'.Auth::user()->id)}}">
                                        <i class="fas fa-cogs"></i>
                                        <h3>Profile Settings</h3>
                                        
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('escort/profile/image')}}">
                                        <i class="fas fa-info-circle"></i>
                                        <h3>Profile Image</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('escort/profile/description')}}">
                                        <i class="fas fa-info-circle"></i>
                                        <h3>Profile Description</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('escort/profile/list/line')}}">
                                        <i class="fas fa-info-circle"></i>
                                        <h3>Profile List Line</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('escort/profile/rates')}}">
                                        <i class="fas fa-info-circle"></i>
                                        <h3>Profile Rates</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('escort/profile/availability')}}">
                                        <i class="fas fa-info-circle"></i>
                                        <h3>Profile Availability</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('escort/profile/tour')}}">
                                        <i class="fas fa-info-circle"></i>
                                        <h3>Profile Tour</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('escort/profile/blog')}}">
                                        <i class="fas fa-info-circle"></i>
                                        <h3>Profile Blog</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6" style="display: none">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('location/add')}}">
                                        <i class="fas fa-map-marker"></i>
                                        <h3>Location Add</h3>
                                    </a>
                                </div>
                            </div>
 
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{ route('escort-services-Offer-add',Auth::user()->id) }}">
                                      <!-- <a class="FI_Link w-100 d-block" href="escort-services-Offer-add"  data-toggle="modal" data-target="#modal-xl-assign"> -->
                                       <i class="fas fa-gift"></i>
                                        <h3>Service Offer Add</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{ route('escort-service-location',Auth::user()->id) }}">
                                       <i class="fas fa-location-arrow"></i>
                                        <h3>Service Location</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="#" data-toggle="modal" data-target="#modal-xl-pfv{{Auth::user()->id}}">
                                        <i class="fas fa-user"></i>
                                        <h3>Profile Preview</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('home')}}">
                                        <i class="fas fa-lock"></i>
                                        <h3>Password Setting</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('escort/profile/escort/blog')}}">
                                        <i class="fas fa-rss-square"></i>
                                        <h3>Blog</h3>
                                    </a>
                                </div>
                            </div>

                              <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('escort/feeds')}}">
                                        <i class="fas fa-rss-square"></i>
                                        <h3>Feeds</h3>
                                    </a>
                                </div>
                            </div>

                             <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{ route('admin.logout') }}">
                                        <i class="fas fa-key"></i>
                                        <h3>Logout</h3>
                                    </a>
                                </div>
                            </div>
                            
                           
                           
                        </div>
                    </div>
                </div>
            </div>
        
            </div><!-- /.container-fluid -->
        </section>




<!-- Modal Start================ -->
        @foreach($users as $user)
  <div class="modal fade" id="modal-xl-pfv{{$user->id}}">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Escort Profile Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <button type="button" class="btn btn-default" data-dismiss="modal">&times;</button>
          </button>
        </div>



          <div class="modal-body">
           
            <div class="row">
              
              <div class="col-md-6">
              <table class="table table-striped table-bordered" style="width:100%">
                <tr><td colspan="2">@if($user->photo==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width:100%;"> @else <img src="{{asset('public/uploads/'.$user->photo)}}" style="width: 100%;">@endif</td></tr>
              
                <tr><th>{{ __('ID No.') }}</th><td>ESC00{{$user->id}}</td></tr>
                <tr><th>{{ __('Name') }}</th><td>{{$user->name}}</td></tr>
                <tr><th>{{ __('Contact No') }}</th><td>{{$user->phone}}</td></tr>
                <tr><th>{{ __('Email') }}</th><td>{{$user->email}}</td></tr>
                
             
              
                
              </table>
              </div>
              <div class="col-md-6">
                 <table class="table table-striped table-bordered" style="width:100%">

              <tr><th>Availability</th><td> @if($user->activation==1) Available Now @elseif($user->activation==0) Not Available @else None @endif</td></tr>
              <tr><th>Service Area</th><td>@if($user->serviceArea==1) In Call @elseif($user->serviceArea==2) Out Call @else None @endif</td></tr>
              <tr><th>Whatsup</th><td>{{$user->whatsup}}</td></tr>
              <tr><th>Snapchat</th><td>{{$user->snapchat}}</td></tr>
              <tr><th>Instagram</th><td>{{$user->instagram}}</td></tr>
              <tr><th>Follow_me</th><td>{{$user->follow_me}}</td></tr>
              <tr><th>Email_me</th><td>{{$user->email_me}}</td></tr>
              <tr><th>Website</th><td>{{$user->website}}</td></tr>
              <tr><th>Straight</th><td>{{$user->straight}}</td></tr>
              <tr><th>Hair</th><td>@if($user->hair==NULL) None @else {{\App\EscortDropdown::find($user->hair)->dropdownTitle}} @endif</td></tr>

              <tr><th>Bust</th><td>{{$user->bust}}</td></tr>
              <tr><th>Personal_type</th><td>{{$user->personal_type}}</td></tr>
              <tr><th>Pet</th><td>{{$user->pet}}</td></tr>
              <tr><th>Drink</th><td>{{$user->drink}}</td></tr>
              <tr><th>Food</th><td>{{$user->food}}</td></tr>
              <tr><th>Service</th><td>{{$user->service}}</td></tr>
              <tr><th>Age</th><td>{{$user->age}}</td></tr>
              <tr><th>Nationality</th><td>@if($user->nationality==NULL) None @else {{\App\EscortDropdown::find($user->nationality)->dropdownTitle}} @endif</td></tr>
              <tr><th>Sexuality</th><td>@if($user->sexuality==NULL) None @else {{\App\EscortDropdown::find($user->sexuality)->dropdownTitle}} @endif</td></tr>
              <tr><th>Eyes</th><td>@if($user->eyes==NULL) None @else {{\App\EscortDropdown::find($user->eyes)->dropdownTitle}} @endif</td></tr>

              <tr><th>BodyShape</th><td>@if($user->bodyShape==NULL) @else  {{\App\EscortDropdown::find($user->bodyShape)->dropdownTitle}} @endif</td></tr>
              <tr><th>EscortType</th><td>@if($user->escortType==1) Agency @elseif($user->escortType==2) Independent @elseif($user->escortType==3) Establishment @else None @endif</td></tr>
              <tr><th>escortTouring</th><td>@if($user->escortTouring==1) Yes @elseif($user->escortTouring==0) No @else None @endif</td></tr>
              <tr><th>Dress</th><td>{{$user->dress}}</td></tr>
              <tr><th>Height</th><td>{{$user->height}}</td></tr>
              <tr><th>Price</th><td>{{$user->price}}</td></tr>
              <tr><th>Gender</th><td>@if($user->gender==1) Male @elseif($user->gender==2) Female @else None @endif</td></tr>

              <tr><th>Country</th><td> <?php $cntrycount=\App\Country::all()->where('id', $user->country);?> @if($cntrycount->count()<1) Not Found @else  {{\App\Country::find($user->country)->country}} @endif </td></tr>
              <tr><th>City</th><td><?php $statecount=\App\State::all()->where('id', $user->city);?>@if($statecount->count()<1) Not Found @else {{\App\State::find($user->city)->state}} @endif </td></tr>
              <tr><th>Suburb</th><td> <?php $citycount=\App\City::all()->where('id', $user->suburb);?>
                           @if($citycount->count()<1) Not Found @else {{\App\City::find($user->suburb)->city}} @endif </td></tr>
              <tr><th>Code</th><td>{{$user->code}}</td></tr>


                
              </table>
                
              </div>
            </div>
            
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancel</button>
            </div>
 




        </div>
        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal-dialog -->
  @endforeach





    <!-- Modal Start================ -->
       
  <div class="modal fade" id="modal-xl-assign">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Assign Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <button type="button" class="btn btn-default" data-dismiss="modal">&times;</button>
          </button>
        </div>





        <form role="form" method="POST" action="{{url('service/offer/assign/store')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-body">
            
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
                         
                          <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                        
                        </select>
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
                        <label class="FormLabel1">{{ __('Offer') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                         <?php $services=\App\ServiceOffer::all();?>
                        @foreach($services as $servic)
                        <input type="checkbox" name="service[]" value="{{$servic->service}}"> {{$servic->service}} <br>
                        @endforeach
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
                
              </div>
            </div>
            
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Assign Confirm</button>
            </div>
          </form>




        </div>
        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal-dialog -->
   
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <script>
<?php 
  if(Auth::user()->activation == 1){  ?>
      var datetime = $("#datetime").val();
      var deadline = new Date(datetime).getTime(); 
      var x = setInterval(function() { 
      var now = new Date().getTime();
      var t = deadline - now; 
      var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
      var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
      var seconds = Math.floor((t % (1000 * 60)) / 1000); 
      document.getElementById("timer").innerHTML =hours + "h " + minutes + "m " + seconds + "s "; 
          if (t < 0) { 
              clearInterval(x); 
              document.getElementById("timer").innerHTML = "EXPIRED"; 
              /*$.ajax({
                url:"{{ route('cron-job') }}",
                type: "POST",
                data:{
                  "_token": "{{ csrf_token() }}",
                  id:"{{Auth::user()->id}}"
                },
                success: function(dataResult){
                  alert(dataResult)
                }
              });*/
          } 
      }, 1000); 

  <?php } ?>


    $(function(){
    	var switchStatus = false;
    	var profile_id = $("#profile_id").val();
      var todayDT = $("#todayDT").val();

     $("#togBtn").on('change', function() {
     	  if ($(this).is(':checked') == true) {
		    switchStatus = 1;
		    var text = "Now Your Profile will Be Available!";
		  } else {
		  	var text = "Now Your Profile will Be Not Available!";
		     switchStatus = 0;
		  }

	     	$.ajax({
		     		url:"{{ route('escort.profile.activation.ajax') }}",
		     		type:"POST",
		     		data:{
		     			"_token": "{{ csrf_token() }}",
			     		'profile_id':profile_id,
			     		'switchStatus':switchStatus,
              'todayDT':todayDT
		     		},success: function(data){
		   				swal({

				     		title: "Are you sure?",
				     		text: text,
		            type: "success",
		            showCancelButton: true,
		            confirmButtonColor: "#DD6B55",
						    confirmButtonText: "Yes, delete it!",
						    cancelButtonText: "No, cancel please!",
						    closeOnConfirm: true,
						    closeOnCancel: true
				     	});
              setTimeout(function () {
                location.reload(true);
              }, 5000);

		     		}
	     	});

      });
    })
  </script>
  @endsection