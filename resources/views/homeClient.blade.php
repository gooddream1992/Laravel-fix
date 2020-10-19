@extends('masters.frontmaster')

@section('title', __('Index'))
@section('main')
<style type="text/css">
  
.fas{font-size: 3em;
     color: #f8060a;}
h1{background:#f8060a;width: 100%;padding:10px;color: white; }
.Feature_Item{border:1px solid red;margin:5px;padding: 10px;}
.Feature_Item:hover{border:1px solid gray;margin:5px;padding: 10px;background: #f7f7f7;}

/*Modal Section*/
.modal-dialog{max-width:none;}
</style>
 <!-- Content Header (Page header) -->

<center><h1>@if(Auth::user()->photo==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width:50px;height:50px;border-radius: 50%;"> @else <img src="{{asset('public/uploads/'.Auth::user()->photo)}}" style="width: 50px;height:50px;border-radius: 50%;">@endif {{Auth::user()->name}}</h1></center>


  
    <section class="content-header">
        <div class="container-fluid">
           
            <div class="row mb-2">
                <div class="col-lg-12">
                    
                    <div class="Feature_main mt-3">
                        <div class="row">




                               <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link d-block" href="{{url('client/profile/setting/'.Auth::user()->id)}}">
                                        <i class="fas fa-cogs"></i>
                                        <h3>Profile Settings</h3>
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
                                    <a class="FI_Link w-100 d-block" href="{{ route('admin.logout') }}">
                                        <i class="fas fa-key"></i>
                                        <h3>Logout</h3>
                                    </a>
                                </div>
                            </div>
                            <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                             <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('escort/updates')}}">
                                        <i class="fas fa-users"></i>
                                        <h3> {{$escorts->count()}} Escort Updates</h3>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('3hours/available')}}">
                                        <i class="fas fa-users"></i>
                                        <h3> Available Now For 3 hours</h3>
                                    </a>
                                </div>
                            </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('notification')}}">
                                        <i class="fas fa-heart"></i>
                        <?php $follows=\App\Follow::all()->where('custId', Auth::user()->id)->where('status', 1);?>
                                        <h3>Following Escorts <span style="background-color: red;border-radius: 5px;padding:2px 10px; color: white;font-size: 12px;">{{$follows->count()}}</span></h3> 
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="">
                                        <i class="fas fa-bell"></i>
                        
                                        <h3>Notification <span style="background-color: red;border-radius: 5px;padding:2px 10px; color: white;font-size: 12px;">0</span></h3> 
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
 
  <div class="modal fade" id="modal-xl-pfv{{Auth::user()->id}}">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Client Profile Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <button type="button" class="btn btn-default" data-dismiss="modal">&times;</button>
          </button>
        </div>



             <div class="modal-body">
           
            <div class="row">
              
              <div class="col-md-6">
              <table class="table table-striped table-bordered" style="width:100%">
                <tr><td colspan="2">@if(Auth::user()->photo==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width:100%;"> @else <img src="{{asset('public/uploads/'.Auth::user()->photo)}}" style="width: 100%;">@endif</td></tr>
              
                <tr><th>{{ __('ID No.') }}</th><td>ESC00{{Auth::user()->id}}</td></tr>
                <tr><th>{{ __('Name') }}</th><td>{{Auth::user()->name}}</td></tr>
                <tr><th>{{ __('Contact No') }}</th><td>{{Auth::user()->phone}}</td></tr>
                <tr><th>{{ __('Email') }}</th><td>{{Auth::user()->email}}</td></tr>
                
             
              
                
              </table>
              </div>
              <div class="col-md-6">
                 <table class="table table-striped table-bordered" style="width:100%">

              <tr><th>Whatsup</th><td>{{Auth::user()->whatsup}}</td></tr>
              <tr><th>Snapchat</th><td>{{Auth::user()->snapchat}}</td></tr>
              <tr><th>Instagram</th><td>{{Auth::user()->instagram}}</td></tr>
              <tr><th>Follow_me</th><td>{{Auth::user()->follow_me}}</td></tr>
              <tr><th>Email_me</th><td>{{Auth::user()->email_me}}</td></tr>
              <tr><th>Website</th><td>{{Auth::user()->website}}</td></tr>
              <tr><th>Straight</th><td>{{Auth::user()->straight}}</td></tr>

              <tr><th>Personal_type</th><td>{{Auth::user()->personal_type}}</td></tr>
              <tr><th>Age</th><td>{{Auth::user()->age}}</td></tr>
              <tr><th>Nationality</th><td>@if(Auth::user()->nationality==NULL) None @else {{\App\EscortDropdown::find(Auth::user()->nationality)->dropdownTitle}} @endif</td></tr>
     
              
              <tr><th>Height</th><td>{{Auth::user()->height}}</td></tr>
              
              <tr><th>Gender</th><td>@if(Auth::user()->gender==1) Male @elseif(Auth::user()->gender==2) Female @else None @endif</td></tr>

              <tr><th>Country</th><td> <?php $cntrycount=\App\Country::all()->where('id', Auth::user()->country);?> @if($cntrycount->count()<1) Not Found @else  {{\App\Country::find(Auth::user()->country)->country}} @endif </td></tr>
              <tr><th>City</th><td><?php $statecount=\App\State::all()->where('id', Auth::user()->city);?>@if($statecount->count()<1) Not Found @else {{\App\State::find(Auth::user()->city)->state}} @endif </td></tr>
              <tr><th>Suburb</th><td> <?php $citycount=\App\City::all()->where('id', Auth::user()->suburb);?>
                           @if($citycount->count()<1) Not Found @else {{\App\City::find(Auth::user()->suburb)->city}} @endif </td></tr>
              <tr><th>Code</th><td>{{Auth::user()->code}}</td></tr>


                
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

@endsection