@extends('masters.profileMaster')

@section('title', 'Escort - Profile Stats')

@section('content')

<form method="POST" action="{{ route('profile.stats.update', $id) }}">
    @csrf

    @include('partials._profileSteps')

    <div class="clearfix row">
        <div class="col-md-6 ">
            <div class="form-box">
                <div class="box-header">
                    <h3>Basic Information</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" 
                            value="{{ !empty($escort->name) ? $escort->name : '' }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" 
                            value="{{ !empty($escort->email) ? $escort->email : '' }}">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" 
                            value="{{ !empty($escort->phone) ? $escort->phone : '' }}">
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <select class="form-control" name="country" id="selectCountry" onchange="getCities()">
                            <option value="">Country</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}"
                                {{ (!empty($escort->country) && $country->id == $escort->country) ? 'selected' : '' }}>
                                {{ $country->country }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <select class="form-control" name="city" id="selectCity">
                            <option value="">Select City</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="form-box">
                <div class="box-header">
                    <h3>Social Information</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Social Media</label>
                                <select id="social-media1" class="form-control social-media" name="social_mediaVal1">
                                    <option value="">Social Media</option>
                                    @foreach($social_media as $value)
                                    <option value="{{ $value->socail_media_url }}" @if($escort->sm_label_one == $value->socail_media_url) selected @endif>
                                        {{ $value->socail_media_url }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group social-media-url">
                                <label id="socail-media-url1">Socail Media Url</label>
                                <input type="text" name="social1" class="form-control" value="{{ $escort->snapchat  }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Social Media</label>
                                <select id="social-media2" class="form-control social-media" name="social_mediaVal2">
                                    <option value="">Social Media</option>
                                    @foreach($social_media as $value)
                                    <option value="{{ $value->socail_media_url }}"  @if($escort->sm_label_two == $value->socail_media_url) selected @endif>
                                        {{ $value->socail_media_url }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group social-media-url">
                                <label id="socail-media-url2">Socail Media Url</label>
                                <input type="text" name="social2" class="form-control" value="{{ $escort->facebook  }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Social Media</label>
                                <select id="social-media3" class="form-control social-media" name="social_mediaVal3">
                                    <option value="">Social Media</option>
                                    @foreach($social_media as $value)
                                    <option value="{{ $value->socail_media_url }}" @if($escort->sm_label_three == $value->socail_media_url) selected @endif>
                                        {{ $value->socail_media_url }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group social-media-url">
                                <label id="socail-media-url3">Socail Media Url</label>
                                <input type="text" name="social3" class="form-control" value="{{ $escort->whatsup  }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" name="website" class="form-control" 
                            value="{{ !empty($escort->website) ? $escort->website : '' }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix row" style="margin: 25px -15px 20px;">
        <div class="col-md-12 ">
            <div class="form-box">
                <div class="box-header">
                    <h3>Other Information</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Suburb</label>
                                <input type="text" name="suburb" class="form-control" 
                                value="{{ !empty($escort->city) ? $escort->city : '' }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Male/female/trans/gay</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="">Gender</option>
                                    <option value="1" {{ (!empty($escort->gender) && $escort->gender == 1) ? 'selected' : '' }}>Male</option>
                                    <option value="2" {{ (!empty($escort->gender) && $escort->gender == 2) ? 'selected' : '' }}>Female</option>
                                        <option value="3" {{ (!empty($escort->gender) && $escort->gender == 3) ? 'selected' : '' }}>Trans gender</option>
                                    <option value="4" {{ (!empty($escort->gender) && $escort->gender == 4) ? 'selected' : '' }}>Gay</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Straight/bi/gay</label>
                                <select class="form-control" name="straight">
                                    <option value="">Straight/bi/gay</option>
                                    <option value="1" {{ (!empty($escort->straight) && $escort->straight == 1) ? 'selected' : '' }}>Straight</option>
                                    <option value="2" {{ (!empty($escort->straight) && $escort->straight == 2) ? 'selected' : '' }}>Bi</option>
                                    <option value="3" {{ (!empty($escort->straight) && $escort->straight == 3) ? 'selected' : '' }}>Gay</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Height</label>
                                <input type="text" name="height" class="form-control" 
                                    value="{{ !empty($escort->height) ? $escort->height : '' }}">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Age</label>
                                <input type="text" name="age" class="form-control" 
                                    value="{{ !empty($escort->age) ? $escort->age : '' }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Hair</label>
                                <select class="form-control" name="hair">
                                    <option value="">Hair</option>
                                    @if (array_key_exists('hair', $escort_dropdowns))    
                                        @foreach ($escort_dropdowns['hair'] as $hair)
                                        <option value="{{ $hair->id }}" {{ (!empty($escort->hair) && $escort->hair == $hair->id) ? 'selected' : '' }}>
                                            {{ $hair->dropdownTitle }}
                                        </option>
                                        @endforeach
                                    @endif
                                </select> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Eyes</label>
                                <select class="form-control" name="eyes">
                                    <option value="">Eyes</option>
                                    @if (array_key_exists('eyes', $escort_dropdowns))    
                                        @foreach ($escort_dropdowns['eyes'] as $eyes)
                                        <option value="{{ $eyes->id }}" {{ (!empty($escort->eyes) && $escort->eyes == $eyes->id) ? 'selected' : '' }}>
                                            {{ $eyes->dropdownTitle }}
                                        </option>
                                        @endforeach
                                    @endif
                                </select> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Dress</label>
                                <input type="text" name="dress" class="form-control" id="dress"
                                    value=" {{ !empty($escort->dress) ? $escort->dress : '' }}">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Bust</label>
                                <input type="text" name="bust" class="form-control" 
                                    value="{{ !empty($escort->bust) ? $escort->bust : '' }}" id="bust">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Body Shape</label>
                                <select class="form-control" name="body_shape">
                                    <option value="">Body Shape</option>
                                    @if (array_key_exists('body_shape', $escort_dropdowns))    
                                        @foreach ($escort_dropdowns['body_shape'] as $body_shape)
                                        <option value="{{ $body_shape->id }}" {{ (!empty($escort->bodyShape) && $escort->bodyShape == $body_shape->id) ? 'selected' : '' }}>
                                            {{ $body_shape->dropdownTitle }}
                                        </option>
                                        @endforeach
                                    @endif
                                </select> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Nationality</label>
                                <select class="form-control" name="nationality">
                                    <option value="">Nationality</option>
                                    @if (array_key_exists('nationality', $escort_dropdowns))    
                                        @foreach ($escort_dropdowns['nationality'] as $nationality)
                                        <option value="{{ $nationality->id }}" {{ (!empty($escort->nationality) && $escort->nationality == $nationality->id) ? 'selected' : '' }}>
                                            {{ $nationality->dropdownTitle }}
                                        </option>
                                        @endforeach
                                    @endif
                                </select> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Personality Type</label>
                                <input type="text" name="personality_type" class="form-control" 
                                    value="{{ !empty($escort->personal_type) ? $escort->personal_type : '' }}">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Service Offering</label>
                                <!--<input type="text" class="form-control" >-->
                                <select class="form-control" name="services_offering">
                                    <option value="">Service Offering</option>
                                    <option value="1" {{ (!empty($escort->pet) && $escort->pet == 1) ? 'selected' : '' }}>Escort</option>
                                    <option value="2" {{ (!empty($escort->pet) && $escort->pet == 2) ? 'selected' : '' }}>Massage </option>
                                    <option value="3" {{ (!empty($escort->pet) && $escort->pet == 3) ? 'selected' : '' }}>BDSM</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Favourite Drink</label>
                                <input type="text" name="drink" class="form-control" 
                                    value="{{ !empty($escort->drink) ? $escort->drink : '' }}">
                            </div>
                        </div>
                        <!-- <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Favourite Food</label>
                                <input type="text" name="food" class="form-control" 
                                    value="{{ !empty($escort->food) ? $escort->food : '' }}">
                            </div>
                        </div> -->

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Service Area</label>
                                <select class="form-control" name="serviceArea">
                                    <option value="">Service Area</option>
                                    <option value="1" @if($escort->serviceArea == 1) selected @endif>Incall</option>
                                    <option value="2" @if($escort->serviceArea == 2) selected @endif>Outcall</option>
                                    <option value="3" @if($escort->serviceArea == 3) selected @endif>Both</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Couples Service </label>
                                <select class="form-control" name="service_provider">
                                    <option value="">Couples Service</option>
                                    <option value="1" {{ (!empty($escort->service) && $escort->service == 1) ? 'selected' : '' }}>Yes</option>
                                    <option value="2" {{ (!empty($escort->service) && $escort->service == 2) ? 'selected' : '' }}>No</option>
                                </select> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Submit --}}
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="submit-btn">Submit</button>
        </div>
    </div>

</form>

<script>
$(document).ready(function () {
    getCities()    
});

function getCities() {
    $.ajax({
        url: "{{ route('get_cities') }}",
        method: 'GET',
        data: { 'country_id': $('#selectCountry').find(':selected').val() },
        success: function (data) {
            $('#selectCity').text(' ');
            for (var k = 0; k < data.cities.length; k++) {
                $('#selectCity').append('<option value="' + data.cities[k].id + '">' + data.cities[k].city + '</option>');
            }
            
            let cityOptions = document.querySelector('#selectCity').options;
            for (i = 0; i < cityOptions.length; i++) {
                @if (isset($escort->state))
                    if (cityOptions[i].value == {{ $escort->state }} ) {
                        cityOptions[i].setAttribute('selected', true)
                    }
                @endif
            }
        },
        error: function (err) {
            console.log(err);
        }
    })
}

$(document).ready(function(){
    if($("#gender").val() == 1)
    {
        $('#dress').val('N/A');
        $('#dress').attr('readonly',true);
        $('#bust').val('N/A');
        $('#bust').attr('readonly',true);
    }else{
        //$('#dress').val('');
        $('#dress').attr('readonly',false);
        //$('#bust').val('');
        $('#bust').attr('readonly',false);
    }
    // $("#social-media1").on('change',function(){
    //     $("#socail-media-url1").empty();
    //     $("#socail-media-url1").append(this.value);
    //     //$("#socail-media-url1").val(this.value);
    // });
    // $("#social-media2").on('change',function(){
    //     $("#socail-media-url2").empty();
    //     $("#socail-media-url2").append(this.value);
    //     //$("#socail-media-url1").val(this.value);
    // });
    // $("#social-media3").on('change',function(){
    //     $("#socail-media-url3").empty();
    //     $("#socail-media-url3").append(this.value);
    //     //$("#socail-media-url1").val(this.value);
    // });

    $('#gender').on('change',function(){
        if(this.value == 1){
            $('#dress').val('N/A');
            $('#dress').attr('readonly',true);
            $('#bust').val('N/A');
            $('#bust').attr('readonly',true);
        }else{
            $('#dress').val('');
            $('#bust').val('');
            $('#bust').attr('readonly',false);
            $('#dress').attr('readonly',false);
        }
    });
});
</script>
@endsection