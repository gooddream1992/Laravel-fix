@extends('masters.frontmaster')
@section('title', __('Index'))
@section('main')

 <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@if ($message = Session::get('message'))
<h4 class="alert alert-success">{{$message}}</h4>
@endif
<style>
.alert-success{
text-align: center;
margin-bottom: 0;
}
.ui-autocomplete {
            max-height: 200px;
            overflow-y: auto;
            /* prevent horizontal scrollbar */
            overflow-x: hidden;
            /* add padding to account for vertical scrollbar */
            padding-right: 20px;
        } 
</style>
<div class="modal fade" id="advanceSearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog  modal-lg" role="document">

                <div class="modal-content ">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Advanced Search</h5> {{-- SMPEDIT 15-10-2020 --}}

                        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->

                        <button type="button" class="btn" data-dismiss="modal">&times;</button>

                    </div>
                    
                    <div class="modal-body">

                             <form method="POST" action="{{ url('advance/search/escort') }}">
                                  @csrf


                            <div class="container">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="advance-search-sec-form">

                                            <div class="form-box">

                                                <ul class="fields">

                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="country_id" onchange="getCitiesTwo()" id="selectCountryAdvSearch">
                                                                <option value="">--Select Country--</option>
                                                                    <?php $countries=\App\Country::all();?>
                                                                        @foreach($countries as $country_details)
                                                                            <option value="{{$country_details->id}}">{{$country_details->country}}</option>
                                                                        @endforeach
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="gender">
                                                                <option value="">
                                                                    --Select Gender--
                                                                </option>
                                                                <option value="1">
                                                                    Male
                                                                </option>
                                                                <option value="2">
                                                                    Female
                                                                </option>
                                                                <option value="3">
                                                                    Trans Gender
                                                                </option> {{-- SMPEDIT 19-10-2020 --}}
                                                                <option value="4">
                                                                    Gay
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="height" placeholder="Height">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="dress_size" placeholder="Dress Size">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="age">
                                                                <option value="">
                                                                    --Select Age--
                                                                </option>
                                                                <option value="18">
                                                                    18
                                                                </option>
                                                                <option value="20">
                                                                    20
                                                                </option>
                                                                <option value="22">
                                                                    22
                                                                </option>
                                                                <option value="24">
                                                                    24
                                                                </option>
                                                                <option value="26">
                                                                    26
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="nationality">
                                                                <option value="">--Select Nationality--</option>
                                                                <?php $nationalities=\App\EscortDropdown::all()->where('status', 4);?>
                                                                @foreach($nationalities as $nation)
                                                                    <option value="{{$nation->id}}">{{$nation->dropdownTitle}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="state_id" onchange="selectstate()" id="citySelectAdvSearch">
                                                                <option value="">
                                                                    --Select City--
                                                                </option>
                                                                    <?php // $States=\App\State::all();?>
                                                                    {{-- @foreach($States as $state) --}}
                                                                    {{-- <option value="{{$state->id}}">{{$state->state}}</option> --}}
                                                                {{-- @endforeach --}}
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="sextuality">
                                                                <option value="">
                                                                    --Select Sexuality--
                                                                </option>
                                                                <?php $sextualities=\App\EscortDropdown::all()->where('status', 3); ?>
                                                                @foreach($sextualities as $sex)
                                                                    <option value="{{$sex->id}}">
                                                                        {{$sex->dropdownTitle}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                           <select class="form-control" name="bodyShape">
                                                                <option value="">
                                                                    --Select Body Shape--
                                                                </option>
                                                                <?php $bodyshpaes=\App\EscortDropdown::all()->where('status', 2); ?>
                                                                @foreach($bodyshpaes as $shape)
                                                                    <option value="{{$shape->id}}">
                                                                        {{$shape->dropdownTitle}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="hair">
                                                                <option value="">--Select Hair Type--</option>
                                                                <?php $hairs=\App\EscortDropdown::all()->where('status', 5);?>
                                                                @foreach($hairs as $hair)
                                                                <option value="{{$hair->id}}">{{$hair->dropdownTitle}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                           <select class="form-control" name="eye">
                                                               <option value="">
                                                                    --Select Eye--
                                                                </option>
                                                                <?php $eyes=\App\EscortDropdown::all()->where('status', 1);?>
                                                                @foreach($eyes as $eye)
                                                                <option value="{{$eye->id}}">
                                                                    {{$eye->dropdownTitle}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="keyword" placeholder="Keyword">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-lg-center">
                                    <div class="col-lg-9 c-center">                                        
                                        <div class="search-availability-bar">
                                            {{-- <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Touring Escorts</button> --}}
                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" id="touring_escorts_btn"
                                                onclick="customToggle('touring_escorts','touring_escorts_btn');">
                                                Touring Escorts
                                            </button>
                                            <input type="hidden" id="touring_escorts" name="touring_escorts" value="false" />
                                            {{-- <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >View Available Now</button> --}}
                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" id="available_now_btn"
                                                onclick="customToggle('available_now','available_now_btn');">
                                                View Available Now
                                            </button>
                                            <input type="hidden" id="available_now" name="available_now" value="false" />
                                            {{-- <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >View Available Today    </button> --}}
                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" id="available_today_btn"
                                                onclick="customToggle('available_today','available_today_btn');">
                                                View Available Today
                                            </button>
                                            <input type="hidden" id="available_today" name="available_today" value="false" />
                                            {{-- <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >In Call</button> --}}
                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" id="in_call_btn"
                                                onclick="customToggle('in_call','in_call_btn');">
                                                In Call
                                            </button>
                                            <input type="hidden" id="in_call" name="in_call" value="false" />
                                            {{-- <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Out Call</button> --}}
                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" id="out_call_btn"
                                                onclick="customToggle('out_call','out_call_btn');">
                                                Out Call
                                            </button>
                                            <input type="hidden" id="out_call" name="out_call" value="false" />
                                        </div>
                                    </div>
                                    <div class="col-lg-9 c-center mt-3">
                                        <h4>Services Offered </h4>
                                        <ul class="advance-search-check-list">
                                            <?php $services=\App\ServiceOffer::all();?>
                                            @foreach($services as $service)
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" value="{{$service->service}}" class="custom-control-input" id="customCheck1{{$service->id}}" name="services[]">
                                                    <label class="custom-control-label" for="customCheck1{{$service->id}}">
                                                        {{$service->service}}
                                                    </label>
                                                </div>
                                            </li>
                                            @endforeach                                          
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 c-center">
                                        <div class="search-availability-bar equal-btns">
                                            {{-- <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Agency</button> --}}
                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" id="agency_btn" onclick="customToggle('agency','agency_btn');">
                                                Agency
                                            </button>
                                            <input type="hidden" id="agency" name="agency" value="false" />                                            
                                            {{-- <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Independent</button> --}}
                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" id="independent_btn"
                                                onclick="customToggle('independent','independent_btn');">
                                                Independent
                                            </button>
                                            <input type="hidden" id="independent" name="independent" value="false" />
                                            <!--<button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Establishment</button>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-lg-center">
                                    <div class="col-lg-5 c-center mt-3 mb-3">
                                        <div class="clearfix">
                                            <div class="form-group price-detail left">
                                                <input type="text" class="form-control" name="price_from" placeholder="From" />
                                                <input type="text" class="form-control" name="price_to" placeholder="To" />
                                            </div>
                                            <div class="right ">
                                                <button class="red-small">Filter</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <section class="home-slider">  
            <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                        <?php                            
                            $slider1= isset($slider->slider) ? $slider->slider : null;
                            $slider2= isset($slider->slider1) ? $slider->slider1 : null;
                            $slider3= isset($slider->slider2) ? $slider->slider2 : null;
                         ?>
                    <div class="carousel-item active">
                        <img class="first-slide" src="{{ asset('public/uploads/'.$slider1) }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="second-slide" src="{{asset('public/uploads/'.$slider2)}}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        @php
                            $file_ext = explode(".",$slider3);
                            if(end($file_ext) =="mp4" || end($file_ext) =="3gp")
                            {
                                $path = asset('public/uploads/'.$slider3);
                                @endphp
                                    <video width="1905" height="736" controls autoplay>
                                        <source src="{{ $path }}" type="video/mp4">
                                    </video>
                                @php
                            }
                            else 
                            {
                                @endphp
                                <img class="third-slide" src="{{asset('public/uploads/'.$slider3)}}" alt="Third slide">
                                @php
                            }
                        @endphp
                    </div>
                </div>
            </div>
        </section>
        <!-- Content -->
        <div id="content">
            <section class="search-city-bar">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center">
                        <div class="col-lg-7 col-md-9">
                            <!--  url('search/city/escort')  -->
                                <div class="input-group">
                                    <input type="text" name="city_id" placeholder="Search Your city here" id="city_id" class="form-control">
                                    <!-- <select class="form-control" name="city_id">
                                        <option value="0">Search City</option>
                                            @foreach($States as $state)
                                                <option value="{{$state->id}}">{{$state->state}}</option>
                                            @endforeach
                                    </select> -->
                                    <div class="input-group-append">
                                        <button class="btn btn-dark font-uppercase " style="margin-left: 0 !important;" type="submit" id="searchnow">Search Now</button>
                                        {{-- <button class="btn btn-dark font-uppercase " data-toggle="modal" data-target="#advanceSearch" type="button">Advanced Search</button> --}}
                                         {{-- SMPEDIT 15-10-2020 --}}
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section 3 -->
            <section class="home-escorts m-visible desk-hidden">
                <div class="container">
                    <div class="row escort-row">
                        <div class="escort-data"></div>
                        @foreach($escorts as $key => $escort)
                        @php
                            $name = str_replace(" ","-",$escort->name);
                        @endphp
                        <div class="col-lg-3 col-6 escort-hide-show">
                            <div class="our-escort-box is-available" onclick="$('.escort-overview-detail').hide(); $('.'+{{ $escort->id }}).show();">
                               @php
                                $profile_image = NULL;
                                $profile_image_arr = DB::table('profile_images')->where('status','5')->where('escortId',$escort->id)->get();
                                if(count($profile_image_arr) > 0)
                                {
                                    $profile_image = $profile_image_arr[0]->image;
                                }
                               @endphp
                                @if($profile_image==NULL)
                                    <img src="{{asset('public/blankphoto.png')}}" class="w-100 fix-es-box"> 
                                @else  
                                    <img src="{{asset('public/uploads/'.$profile_image)}}" class="w-100 fix-es-box"/>@endif

                                <div class="overlay-top">
                                    <div class="text">
                                        <h4>{{$escort->name}}</h4>
                                        <span class="location">
                                        	{{ isset($escort->state) ? $escort->state : '' }}
                                            <!-- @if(!isset($escort->city))
                                                {{-- Not Found --}}
                                            @else
                                                {{ $escort->state }}
                                            @endif -->                                            	
                                            </span>
                                    </div>
                                </div>
                                <div class="availability">
                                    @if(isset($escort->activation) && $escort->activation == 1)
                                        <h5>
                                            Available Now
                                        </h5>
                                    @endif
                                </div>                                
                            </div>
                        </div>
                        @if ($key!='0' && $key % 2 != 0)
                            <div class="escort-overview-detail left-detail-arrow {{ $escorts[$key-1]->id }}" style="display: none">
                                <div class="escort-box">
                                    <div class="box-head">
                                        <h4>{{ $escorts[$key-1]->name }}</h4>
                                        {{-- <h5>Melbourn</h5> --}}
                                    </div>
                                    <table class="escort-profile-details">
                                        <tr>
                                            <td>Suburb</td>
                                            <td>
                                                {{ isset($escorts[$key-1]->city) ? $escorts[$key-1]->city : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Service Area</td>
                                            <td>
                                                @if($escorts[$key-1]->serviceArea==1)
                                                    In Call
                                                @elseif($escorts[$key-1]->serviceArea==2)
                                                    Out Call
                                                @elseif($escorts[$key-1]->serviceArea==3)
                                                    In call & Out Call
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Price</td>
                                            @php
                                                $profile_Rate_one = \App\ProfileRate::where('escortId','=',$escorts[$key-1]->id)->where('price','!=','')->get();
                                                $profile_Rate_both = \App\ProfileRate::where('escortId','=',$escorts[$key-1]->id)->where('price','!=','')->select('price')->get();
                                                if(!empty($profile_Rate_both->toArray())){
                                                    $profile_Rate_both = min(json_decode(json_encode(($profile_Rate_both)),true));
                                                }
                                                
                                            @endphp
                                            <td>
                                                @if(count($profile_Rate_one) < 2)
                                                    @foreach($profile_Rate_one as $val)
                                                            {{ $val->price }}
                                                    @endforeach
                                                @endif
                                                
                                                @if(count($profile_Rate_one) > 1)
                                                    {{ !empty($profile_Rate_both['price']) ? $profile_Rate_both['price'] : '' }}
                                                @endif
                                                PH
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Height</td>
                                            <td>{{$escorts[$key-1]->height}} "</td>
                                        </tr>
                                    </table>
                                    <div class="profile-action">
                                        <a href="{{ 'profile/'.$escorts[$key-1]->id.'/'.str_replace(' ','-',$escorts[$key-1]->name) }}" class="btn btn-block red-small mt-2"> Visit Profile </a>
                                    </div>
                                </div>
                            </div>
                            <div class="escort-overview-detail right-detail-arrow {{ $escorts[$key]->id }}" style="display: none">
                                <div class="escort-box">
                                    <div class="box-head">
                                        <h4>{{ $escorts[$key]->name }}</h4>
                                        {{-- <h5>Melbourn</h5> --}}
                                    </div>
                                    <table class="escort-profile-details">
                                        <tr>
                                            <td>Suburb</td>
                                            <td>
                                                {{ isset($escorts[$key]->city) ? $escorts[$key]->city : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Service Area</td>
                                            <td>
                                                @if($escorts[$key]->serviceArea==1)
                                                    In Call
                                                @elseif($escorts[$key]->serviceArea==2)
                                                    Out Call
                                                @elseif($escorts[$key]->serviceArea==3)
                                                    In call & Out Call
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Price</td>
                                            @php
                                                $profile_Rate_one = \App\ProfileRate::where('escortId','=',$escorts[$key]->id)->where('price','!=','')->get();
                                                $profile_Rate_both = \App\ProfileRate::where('escortId','=',$escorts[$key]->id)->where('price','!=','')->select('price')->get();
                                                if(!empty($profile_Rate_both->toArray())){
                                                    $profile_Rate_both = min(json_decode(json_encode(($profile_Rate_both)),true));
                                                }
                                                
                                            @endphp
                                            <td>
                                                @if(count($profile_Rate_one) < 2)
                                                    @foreach($profile_Rate_one as $val)
                                                            {{ $val->price }}
                                                    @endforeach
                                                @endif
                                                
                                                @if(count($profile_Rate_one) > 1)
                                                    {{ !empty($profile_Rate_both['price']) ? $profile_Rate_both['price'] : '' }}
                                                @endif
                                                PH
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Height</td>
                                            <td>{{$escorts[$key]->height}} "</td>
                                        </tr>
                                    </table>
                                    <div class="profile-action">
                                        <a href="{{ 'profile/'.$escorts[$key]->id.'/'.str_replace(' ','-',$escorts[$key]->name) }}" class="btn btn-block red-small mt-2"> Visit Profile </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="home-escorts m-hidden">
                <div class="container">
                    <div class="row escort-row">
                        <div class="escort-data"></div>
                        @foreach($escorts as $escort)
                        @php
                            $name = str_replace(" ","-",$escort->name);
                        @endphp
                        <div class="col-lg-3 col-6 escort-hide-show">
                             <a href="{{ url('profile/'.$escort->id.'/'.$name)}}">
                            <div class="our-escort-box is-available">
                               @php
                                $profile_image = NULL;
                                $profile_image_arr = DB::table('profile_images')->where('status','5')->where('escortId',$escort->id)->get();
                                if(count($profile_image_arr) > 0)
                                {
                                    $profile_image = $profile_image_arr[0]->image;
                                }
                               @endphp
                                @if($profile_image==NULL)
                                    <img src="{{asset('public/blankphoto.png')}}" class="w-100 fix-es-box"> 
                                @else  
                                    <img src="{{asset('public/uploads/'.$profile_image)}}" class="w-100 fix-es-box"/>@endif

                                <div class="overlay-top">
                                    <div class="text">
                                        <h4>{{$escort->name}}</h4>
                                        <span class="location">
                                        	{{ isset($escort->state) ? $escort->state : '' }}
                                            <!-- @if(!isset($escort->city))
                                                {{-- Not Found --}}
                                            @else
                                                {{ $escort->state }}
                                            @endif -->                                            	
                                            </span>
                                    </div>
                                </div>
                                <div class="overlay-bottom bottom-without-tour">
                                    <div class="text">                                        
                                        <table class="escort-profile-details">
                                            <tr>
                                                <td>Suburb</td>
                                                <td>
                                                    {{ isset($escort->city) ? $escort->city : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Service Area</td>
                                                <td>
                                                    @if($escort->serviceArea==1)
                                                        In Call
                                                    @elseif($escort->serviceArea==2)
                                                        Out Call
                                                    @elseif($escort->serviceArea==3)
                                                        In call & Out Call
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Price</td>
                                                @php
                                                    $profile_Rate_one = \App\ProfileRate::where('escortId','=',$escort->id)->where('price','!=','')->get();
                                                    $profile_Rate_both = \App\ProfileRate::where('escortId','=',$escort->id)->where('price','!=','')->select('price')->get();
                                                    if(!empty($profile_Rate_both->toArray())){
                                                        $profile_Rate_both = min(json_decode(json_encode(($profile_Rate_both)),true));
                                                    }
                                                    
                                                @endphp
                                                <td>
                                                    @if(count($profile_Rate_one) < 2)
                                                        @foreach($profile_Rate_one as $val)
                                                                {{ $val->price }}
                                                        @endforeach
                                                    @endif
                                                    
                                                    @if(count($profile_Rate_one) > 1)
                                                        {{ !empty($profile_Rate_both['price']) ? $profile_Rate_both['price'] : '' }}
                                                    @endif
                                                    PH
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Height</td>
                                                <td>{{$escort->height}} "</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="availability">
                                    @if(isset($escort->activation) && $escort->activation == 1)
                                        <h5>
                                            Available Now
                                        </h5>
                                    @endif
                                </div>                                
                            </div>
                        </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <?php ?>
            @foreach($indpnts as $indpnt)
            <section class="home-nofake-profile" style="background-image: url('{{asset('public/uploads/'.$indpnt->bgimage)}}'); background-size:cover;background-position: center;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="{{asset('public/uploads/'.$indpnt->icon)}}" class="verified-symbol">
                            <div class="escort-verification-content">
                                <h4>{{$indpnt->topHead}} <br>for the</h4>
                                <h2>{{$indpnt->title}}</h2>
                               {!!  $indpnt->description  !!}
                                <h4>Join Us</h4>
                                <ul>
                                    <li><a href="{{ url('/client/membership') }}" class="btn black-btn">Client register</a></li>
                                    <li><a href="{{url('bacome/escort')}}" class="btn black-btn">escort register</a></li>
                                    <!-- <li><a href="{{url('escort/signup')}}" class="btn black-btn">escort register</a></li> -->
                                   <!--  <li><a href="{{url('/')}}" class="btn black-btn">Find Out More</a></li> -->
                                </ul>
                               <!--  <p><a href="{{url('terms/condition')}}">Click here</a> to read why you should join with us</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach

            <section class="home-service-provider">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            @foreach($provresrcs as $resourc)
                            <div class="box-title c-center">
                                <h2>{{$resourc->titleHead}}</h2>
                                {{-- {!! $resourc->intro !!} --}}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        @foreach($provresrcs as $resourc)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <a href="{{url('sex/trafficking')}}">
                                <div class="service-provider-box">
                                    @if($resourc->icon1==NULL)
                                        <img src="{{asset('public/blankphoto.png')}}" class="w-100">
                                    @else
                                        <img src="{{asset('public/uploads/'.$resourc->icon1)}}" class="w-100"/>
                                    @endif                                
                                    <h4>
                                        {{$resourc->title1}}
                                    </h4>
                                </div>
                            </a>
                        </div>
                        @endforeach

                        @foreach($provresrcs as $resourc)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <a href="{{url('local/resources')}}">
                                <div class="service-provider-box">
                                    @if($resourc->icon2==NULL)
                                        <img src="{{asset('public/blankphoto.png')}}" class="w-100">
                                    @else
                                        <img src="{{asset('public/uploads/'.$resourc->icon2)}}" class="w-100"/>
                                    @endif                                
                                    <h4>
                                        {{$resourc->title2}}
                                    </h4>
                                </div>
                            </a>
                        </div>
                        @endforeach                       

                        @foreach($provresrcs as $resourc)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <a href="{{url('purchase/marketing')}}">
                                <div class="service-provider-box">
                                    @if($resourc->icon3==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$resourc->icon3)}}" class="w-100"/>@endif
                                    
                                    <h4>{{$resourc->title3}}</h4>
                                </div>
                            </a>
                        </div>
                        @endforeach

                        @foreach($provresrcs as $resourc)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <a href="{{url('bacome/escort')}}">
                                <div class="service-provider-box">
                                    @if($resourc->icon4==NULL)
                                        <img src="{{asset('public/blankphoto.png')}}" class="w-100">
                                    @else
                                        <img src="{{asset('public/uploads/'.$resourc->icon4)}}" class="w-100"/>
                                    @endif                                
                                    <h4>
                                        {{$resourc->title4}}
                                    </h4>
                                </div>
                            </a>
                        </div>
                        @endforeach                        
                    </div>
                </div>
            </section>
             
            @foreach($professionals as $professonal)
            <section class="home-platform " style="background-image: url('{{asset('public/uploads/'.$professonal->bgTop)}}'); background-size:cover;background-position: center;">              
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">                          
                          @foreach($professionals as $professonal)
                            <div class="box-title c-center dark">
                                <h2>{{$professonal->titleHead}}</h2>
                                <p>{!! $professonal->intro !!}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row justify-content-lg-center justify-content-md-center justify-content-center ">
                       @foreach($professionals as $professonal)
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="{{url('multi/page?url=mul-reviews')}}">
                                <div class="platform-box">
                                    <div class="img-area">
                                        @if($professonal->icon1==NULL)
                                            <img src="{{asset('public/blankphoto.png')}}" class="w-100">
                                        @else
                                            <img src="{{asset('public/uploads/'.$professonal->icon1)}}"  class="w-100"/>
                                        @endif
                                        <div class="overlay">
                                            <div class="icon"><img src="{{asset('public/uploads/search-large-icon.png')}}"></div>
                                        </div>
                                    </div>
                                    <h3>{{$professonal->title1}}</h3>
                                </div>
                            </a>
                        </div>
                        @endforeach

                        @foreach($professionals as $professonal)
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="{{url('blog')}}">
                                <div class="platform-box">
                                    <div class="img-area">
                                        @if($professonal->icon2==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon2)}}" class="w-100"/>@endif
                                        <div class="overlay">
                                            <div class="icon"><img src="{{asset('public/uploads/search-large-icon.png')}}"></div>
                                        </div>
                                    </div>
                                    <h3>{{$professonal->title2}}</h3>
                                </div>
                            </a>
                        </div>
                        @endforeach

                        @foreach($professionals as $professonal)
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="{{url('multi/page?url=mul-tours')}}">
                                <div class="platform-box">
                                    <div class="img-area">
                                        @if($professonal->icon3==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon3)}}" class="w-100"/>@endif
                                        <div class="overlay">
                                            <div class="icon"><img src="{{asset('public/uploads/search-large-icon.png')}}"></div>
                                        </div>
                                    </div>
                                    <h3>{{$professonal->title3}}</h3>
                                </div>
                            </a>
                        </div>
                        @endforeach

                        @foreach($professionals as $professonal)
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="{{url('multi/page?url=mul-blogs')}}">
                                <div class="platform-box">
                                    <div class="img-area">
                                        @if($professonal->icon4==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon4)}}" class="w-100"/>@endif
                                        <div class="overlay">
                                            <div class="icon"><img src="{{asset('public/uploads/search-large-icon.png')}}"></div>
                                        </div>
                                    </div>
                                    <h3>{{$professonal->title4}}</h3>
                                </div>
                            </a>
                        </div>
                        @endforeach

                        @foreach($professionals as $professonal)
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="{{url('explore/cities')}}">
                                <div class="platform-box">
                                    <div class="img-area">
                                        @if($professonal->icon5==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon5)}}" class="w-100"/>@endif
                                        <div class="overlay">
                                            <div class="icon"><img src="{{asset('public/uploads/search-large-icon.png')}}"></div>
                                        </div>
                                    </div>
                                    <h3>{{$professonal->title5}}</h3>
                                </div>
                            </a>
                        </div>
                        @endforeach

                        @foreach($professionals as $professonal)
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="{{url('multi/page?url=mul-client-logs')}}">
                                <div class="platform-box">
                                    <div class="img-area">
                                        @if($professonal->icon6==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon6)}}" class="w-100"/>@endif
                                        <div class="overlay">
                                            <div class="icon"><img src="{{asset('public/uploads/search-large-icon.png')}}"></div>
                                        </div>
                                    </div>
                                    <h3>{{$professonal->title6}}</h3>
                                </div>
                            </a>
                        </div>
                        @endforeach

                        @foreach($professionals as $professonal)
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="{{url('business/etiquete')}}">
                                <div class="platform-box">
                                    <div class="img-area">
                                        @if($professonal->icon7==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon7)}}" class="w-100"/>@endif
                                        <div class="overlay">
                                            <div class="icon"><img src="{{asset('public/uploads/search-large-icon.png')}}"></div>
                                        </div>
                                    </div>
                                    <h3>{{$professonal->title7}}</h3>
                                </div>
                            </a>
                        </div>
                        @endforeach

                        @foreach($professionals as $professonal)
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="{{url('faq')}}">
                                <div class="platform-box">
                                    <div class="img-area">
                                        @if($professonal->icon8==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon8)}}" class="w-100"/>@endif
                                        <div class="overlay">
                                            <div class="icon"><img src="{{asset('public/uploads/search-large-icon.png')}}"></div>
                                        </div>
                                    </div>
                                    <h3>{{$professonal->title8}}</h3>
                                </div>
                            </a>
                        </div>
                        @endforeach

                        @foreach($professionals as $professonal)
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="{{url('our/story')}}">
                                <div class="platform-box">
                                    <div class="img-area">
                                        @if($professonal->icon9==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon9)}}" class="w-100"/>@endif
                                        <div class="overlay">
                                            <div class="icon"><img src="{{asset('public/uploads/search-large-icon.png')}}"></div>
                                        </div>
                                    </div>
                                    <h3>{{$professonal->title9}}</h3>
                                </div>
                            </a>
                        </div>
                        @endforeach                       
                    </div>
                </div>
            </section>
            @endforeach

            @foreach($professionals as $professonal)
            <section class="home-signup-search" style="background-image: url('{{asset('public/uploads/'.$professonal->bgBottom)}}'); background-size:cover;background-position: center;">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            <div class="box-title c-center logo-text">
                             <?php 
                             $footerinfo= $hedfoots->footerInfo;
                              $footerlogo= $hedfoots->footerLogo;?>

                                <h3><img src="{{asset('public/uploads/'.$footerlogo)}}" class="title-logo"></h3>
                                <!--<h3>honey<span class="text-red">luxe</span></h3>-->
                                <p>{{$footerinfo}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-7">
                            <div class="red-box">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 c-center">
                                        <div class="red-box-inner">
                                            <img src="{{asset('public/uploads/signup-icon.png')}}" />
                                            <a href="{{ url('bacome/escort') }}" class="btn black-btn">Escort sign up</a>
                                            <a href="{{url('client/membership')}}" class="btn black-btn">Client sign up</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 c-center">
                                        <div class="red-box-inner">
                                            <img src="{{asset('public/uploads/search-xlarge-icon.png')}}" />
                                      
                                            <button class="btn black-btn "  data-toggle="modal" data-target="#social-media-popup">Social Media</button>
                                            <button class="btn black-btn"  data-toggle="modal" data-target="#contact-blog">Blog for Us</button>
                                            <!--<button class="btn black-btn">Full Search</button>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
            <section class="home-about-honey">
                <div class="container">
                    <div class="row  justify-content-lg-center justify-content-md-center ">
                        @foreach($abouts as $abt)
                        <div class="col-lg-8">
                            <div class="box-title c-center">
                                <h2>{{$abt->titleHead}}</h2>
                                <p>{{$abt->intro}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach($abouts as $abt)
                            <div class="text-content">
                               {!! $abt->description !!}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section 4 -->
            <section class="home-locations gray-bg">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            <?php 
                                 $footerinfo= $hedfoots->footerInfo;
                            ?>
                            <div class="box-title c-center">
                                <h2>
                                    Locations
                                </h2>
                                <p>
                                    {{ $footerinfo}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-lg-center justify-content-md-center justify-content-center">
                        @foreach($country as $cntry)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="location-box">
                                @if($cntry->countryImage==NULL)
                                    <img src="{{asset('public/blankphoto.png')}}" class="w-100"sss>
                                @else
                                    <img src="{{asset('public/uploads/'.$cntry->countryImage)}}" class="w-100"/>
                                @endif

                                @php
                                    $url = $cntry->country;
                                    $countries = str_replace(" ","-",$url);
                                @endphp
                                <a href="{{url('country/'.$countries)}}" class="city-btn">{{$cntry->country}}</a> 
                            </div>
                        </div>
                        @endforeach                        
                        <div class="col-lg-12 view-more-area c-center ">
                            <button class="btn black-btn"  data-toggle="modal" data-target="#citySearch">view more cities</button> 
                        </div>
                    </div>
                </div>
            </section>
        </div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.11/jquery.autocomplete.js" integrity="sha512-JwPA+oZ5uRgh1AATPhLKeByWbXcsRnMMSBpvhuAGQp+CWISl/fHecOshbRcPPgKWau9Wy1H5LhiwAa4QFiQKYw==" crossorigin="anonymous"></script>
<script>
           $(document).ready(function(){
             src = "{{ route('suburb') }}";
            $("#city_id").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: src,
                        type : 'POST',
                        dataType: "json",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            query : request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 2,
           
            });

            $("#searchnow").on('click',function(){
                var city_id = $("#city_id").val();
                $.ajax({
                    url : "{{ route('escorts-ajax-data') }}",
                    type : "POST",
                    dataType:"json",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        city_id:city_id
                    },
                    success: function(data) {
                        window.location.href = 'http://'+window.location.hostname+'/country/'+data;
                        /*$(".escort-data").html(data);*/
                        // var html = '<section class="home-escorts"><div class="container"><div class="row justify-content-lg-center justify-content-md-center escort-row"><div class="escort-data"></div>';
                        // for(var count =0; count < data.length; count++){
                        //     html += '<div class="col-lg-3 col-6 ">';
                        //     var ids = data[count].id;
                        //     html += '<a href="<?php echo url('profile-guest/') ?>/'+ids+' " >';
                        //     html += '<div class="our-escort-box is-available">';
                        //     if(data[count].photo == ''){
                        //         html += '<img src="{{asset("public/blankphoto.png")}}" class="w-100">';
                        //     }else{
                        //         html +='<img src="{{asset("public/uploads/")}}/'+data[count].photo+'" class="w-100"/>';
                        //     }
                        //     html += '<div class="overlay-top"><div class="text"><h4>';
                        //     html += data[count].name;
                        //     html += '</h4><span class="location">';
                        //     if(data[count].state == ''){
                        //         html += "Not Found";
                        //     }else{
                        //         html += data[count].state;
                        //     }
                        //     html += '</span></div></div><div class="overlay-bottom"><div class="text"><h3>';
                        //     if(data[count].state == ''){
                        //         html += "Not Found";
                        //     }else{
                        //         html += data[count].state;
                        //     }
                        //     html += ' - {{ date("d") }}<sup>th</sup>{{date("M")}}</h3><table class="escort-profile-details"><tr><td>Suburb</td><td>';
                        //     if(data[count].city == ''){
                        //         html += "Not Found";
                        //     }else{
                        //         html += data[count].city;    
                        //     }
                        //     html += '</td></tr><tr><td>Service Area</td><td>';
                        //     if(data[count].serviceArea == 1){
                        //         html += 'In Call';
                        //     }else{
                        //         html += 'Out Call';
                        //     }
                        //     html += '</td></tr><tr><td>Price</td><td>';
                        //     html += data[count].price;
                        //     html += '</td></tr><tr><td>Height</td><td>';
                        //     if(data[count].height == null){   
                        //         html += '``';
                        //     }else{
                        //         html += data[count].height;
                        //     }
                        //     html += '</td></tr></table></div></div>';
                        //     if(data[count].activation == 1){
                        //         html += '<div class="availability"><h5>Available Now</h5></div>';
                        //     }
                        //     html += '</div></a></div>';
                        // }
                        // html += '</div></div></section>';
                        // $(".escort-data").html(html);
                        // $('.escort-hide-show').hide();
                    }
                });
            });
        });
       </script>
@endsection