@extends('masters.frontmaster')
@section('title', 'ModiFy Client')
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
       
        <!-- /.card-header -->
        <div class="card-body">
          <a href="{{url('/home')}}" class="btn btn-primary">Back</a><hr>
          <div class="text-center btn btn-success" style="width: 100%"><h1>Client Profile Setting</h1></div><hr>
          <form role="form" method="POST" action="{{url('client/profile/setting/update')}}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <?php $clients=\App\User::all()->where('id', $id);?>



            @foreach($clients as $escort)

            <input type="hidden" name="id" value="{{$escort->id}}">
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                    
                      <div class="selct_2_alska">
                        <input name="photo" type="file" accept="image/*"  value="{{$escort->photo}}">
                       @if(Auth::user()->photo==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width:50px;height:50px;border-radius: 50%;"> @else <img src="{{asset('public/uploads/'.Auth::user()->photo)}}" style="width: 50px;height:50px;border-radius: 50%;">@endif
                      </div>
                    </div>
                  </div> 
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Name') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="name" class="form-control"  value="{{$escort->name}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Phone') }} *</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="phone" value="{{$escort->phone}}" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Email') }} *</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="email"  value="{{$escort->email}}" class="form-control">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Gender') }} *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="gender" value="{{$escort->gender}}"> 
                          <option value="{{$escort->gender}}">Current @if($escort->gender==1) Male @elseif($escort->gender==2) Female @else None @endif</option>
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                        </select>
                      </div>
                    </div>
                  </div>

                 
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Age') }} *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="age"> 
                          <option value="{{$escort->age}}">Current {{$escort->age}}</option>
                          <option value="18">18</option>
                          <option value="20">20</option>
                           <option value="22">22</option>
                          <option value="24">24</option>
                           <option value="26">26</option>
                          <option value="28">28</option>
                        </select>
                      </div>
                    </div>
                  </div>

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Nationality') }} *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="nationality"> 
                          <option value="{{$escort->nationality}}">@if($escort->nationality==NULL) None @else Current {{\App\EscortDropdown::find($escort->nationality)->dropdownTitle}} @endif</option>
                          <?php $hairs=\App\EscortDropdown::all()->where('status', 4);?> 
                        @foreach($hairs as $hair)
                          <option value="{{$hair->id}}">{{$hair->dropdownTitle}}</option>
                          @endforeach
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
                        <label class="FormLabel1">Whatsapp Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="whatsup" value="{{$escort->whatsup}}" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Snap Chat Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="snapchat" value="{{$escort->snapchat}}" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Instagram Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="instagram" value="{{$escort->instagram}}" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Follow Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="follow_me" value="{{$escort->follow_me}}" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Email Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="email_me" value="{{$escort->email_me}}" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Website Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="website" value="{{$escort->website}}" class="form-control">
                      </div>
                    </div>
                  </div>
                 
                 
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Personal Type</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="personal_type" value="{{$escort->personal_type}}" class="form-control">
                      </div>
                    </div>
                  </div>
                
                 
                

                

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Height') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="height" value="{{$escort->height}}" class="form-control">
                      </div>
                    </div>
                  </div>

                  

                 <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Country') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <select class="form-control" name="country">
                        <?php $cntrycount=\App\Country::all()->where('id', $escort->country);?>
                           <option value="{{$escort->country}}">@if($cntrycount->count()<1) Not Found @else Current {{\App\Country::find($escort->country)->country}} @endif</option>


                        <?php $countries=\App\Country::all();?>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->country}}</option>
                        @endforeach
                      </select>
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('State') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                      <select class="form-control" name="city">
                          <?php $statecount=\App\State::all()->where('id', $escort->city);?>
                           <option value="{{$escort->city}}">@if($statecount->count()<1) Not Found @else Current {{\App\State::find($escort->city)->state}} @endif</option>


                        <?php $states=\App\State::all();?>
                        @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->state}}</option>
                        @endforeach
                          </select>
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('City') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="hidden" name="city_id1" value="{{$escort->suburb}}">
                       <select class="form-control" name="suburb">
                           <?php $citycount=\App\City::all()->where('id', $escort->suburb);?>
                           <option value="{{$escort->suburb}}">@if($citycount->count()<1) Not Found @else Current {{\App\City::find($escort->suburb)->city}} @endif</option>


                        <?php $cities=\App\City::all();?>
                        @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->city}}</option>
                        @endforeach
                          </select>
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Code') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="code" value="{{$escort->code}}" class="form-control">
                      </div>
                    </div>
                  </div>
                
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Update">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           

            @endforeach
            
          </form>
          
        </div>
        
      </div>
    </section>
  </div>
  @endsection