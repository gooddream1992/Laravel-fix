@extends('masters.master')

@section('main')
<style type="text/css">.meter{width:30%;border-radius: 5%;border: 1px solid #8be1d1;} </style>
<div class="content-wrapper">
@if(Auth::user()->roleStatus==1)


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
           
            <div class="row mb-2">
                <div class="col-lg-12">
                    
                    <div class="Feature_main mt-3">
                        <div class="row">




                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link d-block" href="{{url('admin/our/story')}}">
                                        <i class="fas fa-cogs"></i>
                                        <h3>Our Story</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('admin/terms')}}">
                                        <i class="fas fa-money-check-alt"></i>
                                        <h3>Terms & Condition</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('admin/business/etiquete')}}">
                                       <i class="fas fa-donate"></i>
                                        <h3>Business Etiquete</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('admin/faq')}}">
                                        <i class="fas fa-cart-plus"></i>
                                        <h3>FAQ</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('admin/client/relationship')}}">
                                        <i class="fas fa-building"></i>
                                        <h3>Client Relationship</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('new/escort')}}">
                                        <i class="fas fa-chart-line"></i>
                                        <h3>Become Escort</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link d-block" href="{{url('escort/list')}}">
                                        <i class="fas fa-list-ol"></i>
                                        <h3>Members</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="{{url('admin/blog')}}">
                                        <i class="fas fa-receipt"></i>
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
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                
                <!--<div class="row">
                    <div class="col-md-6">
                        
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Hello Chart</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Area Chart</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Pie Chart</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Bar Chart</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Line Chart</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                     
                        </div>
                   
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Stacked Bar Chart</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                   
                        </div>


                   
                    </div>
                 
                </div>-->
             <!--End-->
         
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->

                           
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
                                    <a class="FI_Link w-100 d-block" href="{{url('profile')}}">
                                        <i class="fas fa-info-circle"></i>
                                        <h3>Profile Details Update</h3>
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
                                    <a class="FI_Link w-100 d-block" href="#"  data-toggle="modal" data-target="#modal-xl-assign">
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





    <!-- Modal Start================ -->
       
  <div class="modal fade" id="modal-xl-assign">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Assign Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
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

@else

@endif











        </div>


@endsection
