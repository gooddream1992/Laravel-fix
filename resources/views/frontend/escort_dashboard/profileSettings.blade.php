@extends('masters.frontmaster')
@section('title', 'ModiFy Escort')
@section('main')
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
       
        <!-- /.card-header -->
        <div class="card-body">
          <a href="{{url('/home')}}" class="btn btn-primary">Back</a><hr>
          <div class="text-center btn btn-success" style="width: 100%"><h1>Profile Setting</h1></div><hr>
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
                        <label class="FormLabel1">Straight/Bi/Gay</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="straight" value="{{$escort->straight}}" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Bust</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="bust" value="{{$escort->bust}}" class="form-control">
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
                        <label class="FormLabel1">Pet Hate</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="pet" value="{{$escort->pet}}" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Favourite Drink</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="drink" value="{{$escort->drink}}" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Favourite food</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="food" value="{{$escort->food}}" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Service Provider</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="service" value="{{$escort->service}}" class="form-control">
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
                          <option value="{{$escort->activation}}">Current @if($escort->activation==1) Available Now @elseif($escort->activation==0) Not Available @else None @endif </option>
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
                       <input type="text" name="dress" value="{{$escort->dress}}" class="form-control">
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
                        <label class="FormLabel1">{{ __('Price') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="price" value="{{$escort->price}}" class="form-control">
                      </div>
                    </div>
                  </div>



                 <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Country') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                       <select class="form-control" name="country" id="country">
                        <option value="">Country</option>
                        @foreach($countries as $country)
                          <option value="{{ $country->id }}" @if($escort->country == $country->id) selected @endif >{{$country->country}}</option>
                        @endforeach
                      </select>
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Home Location') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="hidden" name="state_id" value="{{$escort->state}}" id="state_id">
                      <select class="form-control" name="city" id="state">
                        <option value="">Home Location</option>
                      </select>
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">{{ __('Suburb') }}*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="hidden" name="city_id1" value="{{$escort->city}}" >
                        <input type="text" name="suburb" id="suburb" class="form-control">
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
  <style>
    *{box-sizing: border-box;}
html{height: 100%;margin: 0;}
body{min-height: 100%;font-family: 'Roboto';margin: 0;background-color: #fafafa;}
.container { margin: 150px auto; max-width: 960px;}
label{display: block;padding: 20px 0 5px 0;}
.tagsinput,.tagsinput *{box-sizing:border-box}
.tagsinput{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;background:#fff;font-family:sans-serif;font-size:14px;line-height:20px;color:#556270;padding:5px 5px 0;border:1px solid #e6e6e6;border-radius:2px}
.tagsinput.focus{border-color:#ccc}
.tagsinput .tag{position:relative;background:#556270;display:block;max-width:100%;word-wrap:break-word;color:#fff;padding:5px 30px 5px 5px;border-radius:2px;margin:0 5px 5px 0}
.tagsinput .tag .tag-remove{position:absolute;background:0 0;display:block;width:30px;height:30px;top:0;right:0;cursor:pointer;text-decoration:none;text-align:center;color:#ff6b6b;line-height:30px;padding:0;border:0}
.tagsinput .tag .tag-remove:after,.tagsinput .tag .tag-remove:before{background:#ff6b6b;position:absolute;display:block;width:10px;height:2px;top:14px;left:10px;content:''}
.tagsinput .tag .tag-remove:before{-webkit-transform:rotateZ(45deg);transform:rotateZ(45deg)}
.tagsinput .tag .tag-remove:after{-webkit-transform:rotateZ(-45deg);transform:rotateZ(-45deg)}
.tagsinput div{-webkit-box-flex:1;-webkit-flex-grow:1;-ms-flex-positive:1;flex-grow:1}
.tagsinput div input{background:0 0;display:block;width:100%;font-size:14px;line-height:20px;padding:5px;border:0;margin:0 5px 5px 0}
.tagsinput div input.error{color:#ff6b6b}
.tagsinput div input::-ms-clear{display:none}
.tagsinput div input::-webkit-input-placeholder{color:#ccc;opacity:1}
.tagsinput div input:-moz-placeholder{color:#ccc;opacity:1}
.tagsinput div input::-moz-placeholder{color:#ccc;opacity:1}
.tagsinput div input:-ms-input-placeholder{color:#ccc;opacity:1}

  </style>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.11/jquery.autocomplete.js" integrity="sha512-JwPA+oZ5uRgh1AATPhLKeByWbXcsRnMMSBpvhuAGQp+CWISl/fHecOshbRcPPgKWau9Wy1H5LhiwAa4QFiQKYw==" crossorigin="anonymous"></script>
<script src="{{ asset('assets/frontend/newjs/autocomplete.js') }}"></script>
<script>
/*  $(function() {
 

$("#state").on('change',function(){
    var src = "{{ route('profile-suburb-name') }}";
    var state = this.value;
    $('#suburb').tagsInput({
        'autocomplete':          {
            source:function(request, response){
                 $.ajax({
                  url: src,
                  type :"POST",
                  data:{
                    "_token": "{{ csrf_token() }}",
                    state:state,
                    query : request.term
                  },
                  success: function(data) {
                  response(data);

                }
              });
            },minLength: 2,
          }
        });
    });
});
*/

</script>
  <script>
    $(document).ready(function(){
      $('#country').on('change',function(){
        var country = this.value;
        $.ajax({
          url : "{{ route('profile-country-name') }}",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            country:country
          },
          success: function(data) {
            $("#state").html(data);
          }
        });
      });

      $("#state").on('change',function(){
        var src = "{{ route('profile-suburb-name') }}";
        var state = this.value;
          $("#suburb").autocomplete({
            source: function(request, response) {
              $.ajax({
                url: src,
                type :"POST",
                data:{
                  "_token": "{{ csrf_token() }}",
                  state:state,
                  query : request.term
                },
                success: function(data) {
                  response(data);
                }
              });
            },
            minLength: 2,
            
          });
      });


      var country = $("#country").val();
        var state_id = $("#state_id").val();
        if(country != '' && state_id != ''){
          $.ajax({
            url : "{{ route('profile-country-name') }}",
            type:"POST",
            data:{
              "_token": "{{ csrf_token() }}",
              country:country,
              state_id:state_id
            },
            success: function(data) {
              $("#state").html(data);
            }
          });

        }
    });
  </script>
  @endsection