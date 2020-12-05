@extends('masters.master')

@section('title', __('Escort List'))
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Escort List</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
      

     <div class="card-body">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif


 @if(Auth::user()->roleStatus==1)
<table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th>{{ __('ID No.') }}</th>
                <th>{{ __('Picture') }}</th>
                <th>{{ __('User Name') }}</th>
                <th>{{ __('Activation') }}</th>
                <!-- <th>{{ __('Gender') }}</th>
                <th>{{ __('Phone No.') }}</th> -->
                <th>{{ __('Email') }}</th>
                <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>

                   <?php 
                    /*$users =\App\User::all()->where('roleStatus', 2);*/
                   ?>
                 <?php $i=1;?>
              @foreach($users as $user)
              <tr>
                <td>00{{$i++}}</td>
                <td>
                    @if($user->photo==NULL)
                      <img src="{{asset('public/blankphoto.png')}}" style="width: 30px;">
                    @else
                      <img src="{{asset('public/uploads/'.$user->photo)}}" style="width: 30px;">
                    @endif
                </td>
                <td>
                  {{$user->name}}
                </td>
                <td>
                  @if($user->activation==1)
                    <a href="{{ url('escort/activation').'/'.$user->id.'/'.$user->activation}}" class="btn btn-success">Active</a>
                  @else
                    <a href="{{ url('escort/activation').'/'.$user->id.'/'.$user->activation}}" class="btn btn-warning">Deactive</a>
                  @endif
                 </td>
                <!-- <td>
                  @if($user->gender==1)
                    Male
                  @elseif($user->gender==2)
                    Female
                  @else
                    Guy
                  @endif
                </td> 
                <td>
                  {{$user->phone}}
                </td>-->
                <td>
                  {{$user->email}}
                </td>               
                <td>
                    <!-- <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-xl-pfv{{$user->id }}">Profile Preview</a> 
                    <a href="{{url('escort/modify/'.$user->id)}}" class="btn btn-xs btn-primary">Modify</a>-->
                    <a href="{{ route('profile.stats.index', $user->id) }}" class="btn btn-xs btn-primary">Modify Profile</a> {{-- SMPEDIT 19-10-2020 --}}
                    <a href="" class="btn btn-xs btn-danger">Delete</a>
                    <!-- <a href="{{ url('profile/'.$user->id) }}" class="btn btn-xs btn-warning">IMAGE</a>
                    <a href="{{ url('profile/description/admin/'.$user->id) }}" class="btn btn-xs btn-warning">DESCRIPTION</a>
                    <a href="{{ url('profile/list/admin/'.$user->id) }}" class="btn btn-xs btn-warning">LIST LINE</a>
                    <a href="{{ url('profile/rate/admin/'.$user->id) }}" class="btn btn-xs btn-warning">RATE</a>
                    <a href="{{ url('profile/availability/admin/'.$user->id) }}" class="btn btn-xs btn-warning">AVAILABILITY</a>
                    <a href="{{ url('profile/tour/admin/'.$user->id) }}" class="btn btn-xs btn-warning">TOUR</a> -->
                </td>
              </tr>
              @endforeach

              </table>
 @elseif(Auth::user()->roleStatus==2)


                   <?php $users =\App\User::all()->where('roleStatus', 2);?>

   <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
           
            <div class="row mb-2">
                <div class="col-lg-12">
                    
                    <div class="Feature_main mt-3">
                        <div class="row">




                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link d-block" href="{{url('escort/modify/'.Auth::user()->id)}}">
                                        <i class="fas fa-cogs"></i>
                                        <h3>Profile Settings</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('location/add')}}">
                                        <i class="fas fa-map-marker"></i>
                                        <h3>Location Add</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('escort/dropdown')}}">
                                       <i class="fas fa-gift"></i>
                                        <h3>Service Offer Add</h3>
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
                                    <a class="FI_Link w-100 d-block" href="{{url('admin/blog')}}">
                                        <i class="fas fa-blog"></i>
                                        <h3>Blog</h3>
                                    </a>
                                </div>
                            </div>
                            
                           
                           
                        </div>
                    </div>
                </div>
            </div>
        
            </div><!-- /.container-fluid -->
        </section>



@else
@endif







     </div>



    </div>
  </section>
</div>















<!-- Modal Start================ -->
        @foreach($users as $user)
  <div class="modal fade" id="modal-xl-pfv{{$user->id}}">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Escort Profile Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
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




@endsection