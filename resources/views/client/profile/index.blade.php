@extends('client.master.layouts')
@section('title', 'Profile')
@section('header_title', 'Profile')
@section('home')
@foreach($client_profile as $profileValue)
                <div class="col-md-9 right-content">
                    <div class="box multi_step_form">
                        <form method="post" action="{{ route('client.profile.upgrade') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $profileValue->id }}">
                            <div class="clearfix row mb-4">
                                <div class="col-md-12 ">
                                    <div class="form-box">
                                        <div class="box-header">
                                            <h3>Basic Information</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" value="@if(isset($profileValue->name)) {{ $profileValue->name }} @endif" name="name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Age</label>
                                                        <input type="text" class="form-control" name="age" value="{{ $profileValue->age }}"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <select class="form-control" name="country" id="selectCountry">
                                                            <option></option>
                                                            @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                                {{ (!empty($profileValue->country) && $country->id == $profileValue->country) ? 'selected' : '' }}>
                                                                {{ $country->country }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <select class="form-control" name="city" id="selectCity">
                                                            <option>City</option>
                                                        </select>
                                                        <input type="hidden" name="" value="{{ $profileValue->state }}" id="city_name">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label>You Are<!-- Male/female/trans/gay --></label>
                                                            <select class="form-control" name="gender" id="gender">
                                                                <option value="">Gender</option>
                                                                <option value="1" {{ (!empty($profileValue->gender) && $profileValue->gender == 1) ? 'selected' : '' }}>Male</option>
                                                                <option value="2" {{ (!empty($profileValue->gender) && $profileValue->gender == 2) ? 'selected' : '' }}>Female</option>
                                                                <option value="3" {{ (!empty($profileValue->gender) && $profileValue->gender == 3) ? 'selected' : '' }}>Trans gender</option>
                                                                <option value="4" {{ (!empty($profileValue->gender) && $profileValue->gender == 4) ? 'selected' : '' }}>Gay</option>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    @php
                                                        $interested_in = empty($profileValue->interested_in) ? '' : explode(" , ",$profileValue->interested_in);
                                                    @endphp
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label>Interested In<!-- Male/female/trans/gay --></label>
                                                            <bR>
                                                            <label>Male<!-- Male/female/trans/gay --></label>
                                                            <input type="checkbox" name="interested_in_male" value="1" @if(!empty($profileValue->interested_in_male) && $profileValue->interested_in_male == 1) checked @endif>
                                                            <label>Female<!-- Male/female/trans/gay --></label>
                                                            <input type="checkbox" name="interested_in_female" value="2" @if(!empty($profileValue->interested_in_female) && $profileValue->interested_in_female == 2) checked @endif>
                                                            <label>Trans gender<!-- Male/female/trans/gay --></label>
                                                            <input type="checkbox" name="interested_in_trans" value="3" @if(!empty($profileValue->interested_in_trans) && $profileValue->interested_in_trans == 3) checked @endif>
                                                            <label>Gay<!-- Male/female/trans/gay --></label>
                                                            <input type="checkbox" name="interested_in_gay" value="4" @if(!empty($profileValue->interested_in_gay) && $profileValue->interested_in_gay == 4) checked @endif>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" value="@if(isset($profileValue->email)) {{ $profileValue->email }} @endif" name="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Profession</label>
                                                        <input type="text" class="form-control" name="profession" value="@if(isset($profileValue->profession)) {{ $profileValue->profession }} @endif"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Nationality</label>
                                                        <select name="nationality" class="form-control">
                                                            <option value="">Nationality</option>
                                                            @foreach($nationalities as $nationality)
                                                                <option value="{{ $nationality->id }}" @if($nationality->id == $profileValue->nationality) selected @endif>
                                                                    {{ $nationality->dropdownTitle }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Single Couple</label>
                                                        <select class="form-control" name="single_couple">
                                                            <option value="">Please Select</option>
                                                            <option value="1" @if(isset($profileValue->single_couple) && $profileValue->single_couple == 1) selected @endif>Single</option>
                                                            <option value="2" @if(isset($profileValue->single_couple) && $profileValue->single_couple == 2) selected @endif>Couple</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Personality Type</label>
                                                        <input type="text" class="form-control" value="@if(isset($profileValue->personal_type)) {{ $profileValue->personal_type }} @endif" name="personal_type" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Biography</label>
                                                        <textarea class="form-control large" name="biography">
                                                            @if(isset($profileValue->biography)) {{ $profileValue->biography }} @endif
                                                        </textarea>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="cust-profile-upload mt-2 mb-3">
                                                        <label class="text-white">Profile Image</label>
                                                        <br>
                                                        <div class="file btn btn-lg btn-dark w-100">
                                                            <i class="icofont-camera" style="color: eecf;"></i>
                                                            <input type="file" name="imageurl"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mt-2 mb-3 px-5">
                                                        @if(!empty($profileValue->photo))
                                                            <img src="{{asset('public/uploads/'.$profileValue->photo)}}" width="300px" />
                                                            <input type="hidden" name="imageurl" value="@if(isset($profileValue->photo)) {{ $profileValue->photo }} @endif">
                                                        @else
                                                            <img src="{{asset('public/client_library/image/no_image_found.png')}}" width="300px" />
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix row">
                                <div class="col-md-12 ">
                                    <div class="form-box profile-other-info-fields">
                                        <div class="box-header">
                                            <h3>Social Links <span>( Optional )</span></h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Instagram</label>
                                                        <input type="text" class="form-control" name="instagram" value="@if(isset($profileValue->instagram)) {{ $profileValue->instagram }} @endif">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Facebook</label>
                                                        <input type="text" class="form-control" name="facebook" value="@if(isset($profileValue->facebook)) {{ $profileValue->facebook }} @endif">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="submit-btn large">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        @endforeach

        <script>
            $(document).ready(function () {
                $('#selectCountry').on('change',function(){
                    var country = this.value;
                    $.ajax({
                        url: "{{ route('getCity') }}",
                        method: 'POST',
                        data: { "_token": "{{ csrf_token() }}",'country_id':country },
                        success: function (data) {
                            console.log(data);
                             $('#selectCity').html(data);
                        } 
                    });
                });

                var countries = $('#selectCountry').val();
                if(countries != ''){
                    var city_name = $('#city_name').val();
                    $.ajax({
                        url: "{{ route('getCity') }}",
                        method: 'POST',
                        data: { "_token": "{{ csrf_token() }}",'country_id':countries,'city_name':city_name },
                        success: function (data) {
                             $('#selectCity').html(data);
                        } 
                    });    
                }
                
            });
            

            // function getCities() {
            //     $.ajax({
            //         url: "{{ route('get_cities') }}",
            //         method: 'GET',
            //         data: { 'country_id': $('#selectCountry').find(':selected').val() },
            //         success: function (data) {
            //             $('#selectCity').text(' ');
            //             for (var k = 0; k < data.cities.length; k++) {
            //                 $('#selectCity').append('<option value="' + data.cities[k].city + '">' + data.cities[k].city + '</option>');
            //             }
                        
            //             let cityOptions = document.querySelector('#selectCity').options;
            //             for (i = 0; i < cityOptions.length; i++) {
            //                 @if (isset($city_id))
            //                     if (cityOptions[i].value == {{ $city_id }} ) {
            //                         cityOptions[i].setAttribute('selected', true)
            //                     }
            //                 @endif
            //             }
            //         },
            //         error: function (err) {
            //             console.log(err);
            //         }
            //     })
            // }

        </script>
        @endsection