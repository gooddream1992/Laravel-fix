@extends('masters.master')
@section('title', 'ModiFy Escort')
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">ModiFy Escort</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form role="form" method="POST" action="{{url('escort/update')}}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <?php $escorts=\App\User::all()->where('id', $id);?>



            @foreach($escorts as $escort)

            <input type="hidden" name="id" value="{{$escort->id}}">
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                    
                      <div class="selct_2_alska">
                        <input name="photo" type="file" accept="image/*"  value="{{$escort->photo}}">
                        <img src="{{asset('public/uploads/'.$escort->photo)}}" style="width: 60px;">
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
                        <input type="text" name="phone" value="{{$escort->phone}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Email') }} *</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="email"  value="{{$escort->email}}">
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
                        <label class="FormLabel1">{{ __('Service Area') }} *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="serviceArea" value="{{$escort->serviceArea}}">  <option value="{{$escort->serviceArea}}">Current @if($escort->serviceArea==1) In Call @elseif($escort->serviceArea==2) Out Call @else None @endif</option>
                          <option value="1">In Call</option>
                          <option value="2">Out Call</option>
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

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Sexuality') }} *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="sexuality"> 
                           <option value="{{$escort->sexuality}}">@if($escort->sexuality==NULL) None @else Current {{\App\EscortDropdown::find($escort->sexuality)->dropdownTitle}} @endif </option>
                           <?php $hairs=\App\EscortDropdown::all()->where('status', 3);?> 
                        @foreach($hairs as $hair)
                          <option value="{{$hair->id}}">{{$hair->dropdownTitle}}</option>
                          @endforeach
                        </select>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Eyes') }} *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="eyes"> 
                          <option value="{{$escort->eyes}}">@if($escort->eyes==NULL) None @else Current {{\App\EscortDropdown::find($escort->eyes)->dropdownTitle}} @endif </option>
                          <?php $hairs=\App\EscortDropdown::all()->where('status', 1);?> 
                        @foreach($hairs as $hair)
                          <option value="{{$hair->id}}">{{$hair->dropdownTitle}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Body Shape') }} *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="bodyShape"> 
                           <option value="{{$escort->bodyShape}}">@if($escort->bodyShape==NULL) @else Current {{\App\EscortDropdown::find($escort->bodyShape)->dropdownTitle}} @endif </option>
                           <?php $hairs=\App\EscortDropdown::all()->where('status', 2);?> 
                        @foreach($hairs as $hair)
                          <option value="{{$hair->id}}">{{$hair->dropdownTitle}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Escort Type') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="escortType">
                          <option value="{{$escort->escortType}}">Current @if($escort->escortType==1) Agency @elseif($escort->escortType==2) Independent @elseif($escort->escortType==3) Establishment @else @endif</option>
                          <option value="1">Agency</option>
                          <option value="2">Independent</option>
                          <option value="3">Establishment  </option>
                        </select>
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Touring Escort') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="escortTouring">
                           <option value="{{$escort->escortTouring}}">Current @if($escort->escortTouring==1) Yes @elseif($escort->escortTouring==0) No @else @endif</option>
                          
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>
                    </div>
                  </div>


                    <div class="col-lg-12" style="display: none">
                    <div class="form-group sip_mt">
                        <label class="FormLabel1">{{ __('Service Offer') }}*</label><br>
                     
                        <input type="checkbox" name="serviceOffer1" value="Boyfriend Experience"> Boyfriend Experience 
                        <input type="checkbox" name="serviceOffer2" value="Girlfriend Girlfriend"> Girlfriend Girlfriend  
                     <input type="checkbox" name="serviceOffer3" value="Pornstar Girlfriend"> Pornstar Girlfriend  
                     <br> 
                        <input type="checkbox" name="serviceOffer4" value="Overnight"> Overnight 
                        <input type="checkbox" name="serviceOffer5" value="Party Sessions"> Party Sessions

                        <input type="checkbox" name="serviceOffer6" value="Dinner Dates"> Dinner Dates

                        <br> 
                        <input type="checkbox" name="serviceOffer7" value="Couples"> Couples
 
                        <input type="checkbox" name="serviceOffer8" value="Fly me to you"> Fly me to you

                        <input type="checkbox" name="serviceOffer9" value="Message"> Message

                        <br> 
                        <input type="checkbox" name="serviceOffer10" value="Videoing"> Videoing

                        <input type="checkbox" name="serviceOffer11" value="Dress Up"> Dress Up

                        <input type="checkbox" name="serviceOffer12" value="Tantra"> Tantra

                        <br> 
                        <input type="checkbox" name="serviceOffer13" value="Anal"> Anal

 
                        <input type="checkbox" name="serviceOffer14" value="bbj"> bbj


                        <input type="checkbox" name="serviceOffer15" value="Covered bj"> Covered bj
                      
                    </div>
                  </div>

                   

                  
                  
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Hair') }} *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="hair">
                            <option value="{{$escort->hair}}">@if($escort->hair==NULL) None @else Current {{\App\EscortDropdown::find($escort->hair)->dropdownTitle}} @endif </option>
                        <?php $hairs=\App\EscortDropdown::all()->where('status', 5);?> 
                        @foreach($hairs as $hair)
                          <option value="{{$hair->id}}">{{$hair->dropdownTitle}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Whatsapp Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="whatsup" value="{{$escort->whatsup}}">
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Snap Chat Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="snapchat" value="{{$escort->snapchat}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Instagram Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="instagram" value="{{$escort->instagram}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Follow Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="follow_me" value="{{$escort->follow_me}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Email Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="email_me" value="{{$escort->email_me}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Website Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="website" value="{{$escort->website}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Straight/Bi/Gay</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="straight" value="{{$escort->straight}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Bust</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="bust" value="{{$escort->bust}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Personal Type</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="personal_type" value="{{$escort->personal_type}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Pet Hate</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="pet" value="{{$escort->pet}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Favourite Drink</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="drink" value="{{$escort->drink}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Favourite food</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="food" value="{{$escort->food}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Service Provider</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="service" value="{{$escort->service}}">
                      </div>
                    </div>
                  </div>

                  

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Activation') }} *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="activation"> 
                          <option value="{{$escort->activation}}">@if($escort->activation==1) Available Now @elseif($escort->activation==0) Not Available @else None @endif </option>
                          <option value="1">Available Now</option>
                          <option value="0">Not Available</option>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Dress') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="dress" value="{{$escort->dress}}">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Height') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="height" value="{{$escort->height}}">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Price') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="price" value="{{$escort->price}}">
                      </div>
                    </div>
                  </div>



                 <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Country') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <select class="form-control" name="country_id" onchange="selectcountry()" id="selectCountry">

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
                        <input type="hidden" name="state_id1" value="{{$escort->city}}">
                      <select class="form-control" name="state_id" onchange="selectstate()" id="stateSelect">

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
                       <select class="form-control" name="city_id" id="selectCity">

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
                       <input type="text" name="code" value="{{$escort->code}}">
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
            <script>
        function selectcountry(){
            $.ajax({
                url:"{{route('select_country')}}",
                method:'GET',
                data:{'country_id':$('#selectCountry').find(':selected').val()},
                success:function(data){
                    $('#stateSelect').text(' ');
                   for (var i = 0; i < data.states.length; i++) {
                       $('#stateSelect').append('<option value="'+data.states[i].id+'">'+data.states[i].state+'</option>');
                   }
                },
                error:function(err){
                    console.log(err);
                }
            });
        }

        function selectstate(){
            $.ajax({
                url:"{{route('select_state')}}",
                method:'GET',
                data:{'state_id':$('#stateSelect').find(':selected').val()},
                success:function(data){
                     $('#selectCity').text(' ');
                    for (var k = 0; k < data.citys.length; k++) {
                        $('#selectCity').append('<option value="'+data.citys[k].id+'">'+data.citys[k].city+'</option>');
                    }
                },
                error:function(err){
                    console.log(err);
                }


            })
        }
    </script>

            @endforeach
            
          </form>
          
        </div>
        
      </div>
    </section>
  </div>
  @endsection