   @extends('client.master.layouts')
@section('title', 'Profile')
@section('header_title', 'Profile')
@section('home')
@foreach($client_profile as $profileValue)
<?php 
/*echo "<pre>";
print_r($profileValue);
exit;*/
?>
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
                                                        <label>Location</label>
                                                        <input type="text" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="d-block">Sex</label>
                                                        <div class="radiobuttons">
                                                            <div class="rdio rdio-primary radio-inline"> 
                                                                <input value="1" type="radio" name="gender" @if(isset($profileValue->gender) && $profileValue->gender == 1) Checked @endif>
                                                                <label for="radio1">Male</label>
                                                            </div>
                                                            <div class="rdio rdio-primary radio-inline">
                                                                <input value="2" type="radio" name="gender" @if(isset($profileValue->gender) && $profileValue->gender == "2") Checked @endif>
                                                                <label for="radio2">Female</label>
                                                            </div>
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
                                                        <select name="country" class="form-control" id="country">
                                                            <option value="">Nationality</option>
                                                            @foreach($country as $countryValue)
                                                                <option value="{{ $countryValue->id }}" @if($countryValue->id == $profileValue->country) selected @endif>
                                                                    {{ $countryValue->country }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Single Couple</label>
                                                        <select class="form-control" name="single_couple">
                                                            <option>Please Select</option>
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
                                                        <label>Profile Image</label>
                                                        <div class="file btn btn-lg btn-primary">
                                                            <i class="icofont-camera" style="color: eecf;"></i>
                                                            <input type="file" name="imageurl"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="cust-profile-upload mt-2 mb-3">
                                                            @if(!empty($profileValue->photo))
                                                                <img src="{{asset('public/uploads/'.$profileValue->photo)}}" class="w-100" style="width: 50px; height: 300px;" />
                                                                <input type="hidden" name="imageurl" value="@if(isset($profileValue->photo)) {{ $profileValue->photo }} @endif">
                                                            @else
                                                                <img src="{{asset('public/client_library/image/no_image_found.png')}}" class="w-100" style="width: 50px; height: 300px;" />
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
                                    <button class="submit-btn large">Create Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        @endforeach
        @endsection