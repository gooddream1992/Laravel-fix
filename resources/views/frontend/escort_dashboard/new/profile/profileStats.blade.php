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
                            <option></option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}"
                                    {{ ($country->id == $escort->country) ? 'selected' : '' }}>
                                        {{ $country->country }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <select class="form-control" name="city" id="selectCity">
                            <option></option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}"
                                    {{ ($city->id == $escort->city) ? 'selected' : '' }}>
                                        {{ $city->city }}
                                </option>
                            @endforeach
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
                    <div class="form-group">
                        <label>Whatsapp</label>
                        <input type="text" name="whatsapp" class="form-control" 
                            value="{{ !empty($escort->whatsup) ? $escort->whatsup : '' }}">
                    </div>
                    <div class="form-group">
                        <label>Snapchat</label>
                        <input type="text" name="snapchat" class="form-control" 
                            value="{{ !empty($escort->snapchat) ? $escort->snapchat : '' }}">
                    </div>
                    <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" name="instagram" class="form-control" 
                            value="{{ !empty($escort->instagram) ? $escort->instagram : '' }}">
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
    <div class="clearfix row">
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
                                value="{{ !empty($escort->state) ? $escort->state : '' }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Male/female/trans</label>
                                <select class="form-control" name="gender">
                                    <option></option>
                                    <option value="1" {{ ($escort->gender == 1) ? 'selected' : '' }}>Male</option>
                                    <option value="2" {{ ($escort->gender == 2) ? 'selected' : '' }}>Female</option>
                                    <option value="3" {{ ($escort->gender == 3) ? 'selected' : '' }}>Trans gender</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Straight/bi/gay</label>
                                <select class="form-control" name="straight">
                                    <option></option>
                                    <option value="1" {{ ($escort->straight == 1) ? 'selected' : '' }}>Straight</option>
                                    <option value="2" {{ ($escort->straight == 2) ? 'selected' : '' }}>Bi</option>
                                    <option value="3" {{ ($escort->straight == 3) ? 'selected' : '' }}>Gay</option>
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
                                    <option></option>
                                    @if (array_key_exists('hair', $escort_dropdowns))    
                                        @foreach ($escort_dropdowns['hair'] as $hair)
                                        <option value="{{ $hair->id }}" {{ ($escort->hair == $hair->id) ? 'selected' : '' }}>
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
                                    <option></option>
                                    @if (array_key_exists('eyes', $escort_dropdowns))    
                                        @foreach ($escort_dropdowns['eyes'] as $eyes)
                                        <option value="{{ $eyes->id }}" {{ ($escort->eyes == $eyes->id) ? 'selected' : '' }}>
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
                                <input type="text" name="dress" class="form-control" 
                                    value="{{ !empty($escort->dress) ? $escort->dress : '' }}">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Bust</label>
                                <input type="text" name="bust" class="form-control" 
                                    value="{{ !empty($escort->bust) ? $escort->bust : '' }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Body Shape</label>
                                <select class="form-control" name="body_shape">
                                    <option></option>
                                    @if (array_key_exists('body_shape', $escort_dropdowns))    
                                        @foreach ($escort_dropdowns['body_shape'] as $body_shape)
                                        <option value="{{ $body_shape->id }}" {{ ($escort->body_shape == $body_shape->id) ? 'selected' : '' }}>
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
                                    <option></option>
                                    @if (array_key_exists('nationality', $escort_dropdowns))    
                                        @foreach ($escort_dropdowns['nationality'] as $nationality)
                                        <option value="{{ $nationality->id }}" {{ ($escort->nationality == $nationality->id) ? 'selected' : '' }}>
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
                                    <option></option>
                                    <option value="1" {{ ($escort->pet == 1) ? 'selected' : '' }}>Escort</option>
                                    <option value="2" {{ ($escort->pet == 2) ? 'selected' : '' }}>Massage </option>
                                    <option value="3" {{ ($escort->pet == 3) ? 'selected' : '' }}>BDSM</option>
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
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Favourite Food</label>
                                <input type="text" name="food" class="form-control" 
                                    value="{{ !empty($escort->food) ? $escort->food : '' }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Service Provider </label>
                                <select class="form-control" name="service_provider">
                                    <option></option>
                                    <option value="1" {{ ($escort->service == 1) ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ ($escort->service == 2) ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ ($escort->service == 3) ? 'selected' : '' }}>3</option>
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
                @if (isset($city_id))
                    if (cityOptions[i].value == {{ $city_id }} ) {
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
</script>
@endsection