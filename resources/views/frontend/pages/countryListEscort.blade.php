@extends('masters.frontmaster')
<?php
$seo = array();
if (count($seo_text) > 0) {
    foreach ($seo_text as $value) {
        $val = isset($value->description) && $value->description != '' ? $value->description : '';
        if ($val != '')  {
            $seo = array(
                'seo' => $val
            );
        } else {
            $seo = array(
                'seo' => ''
            );
        }
    }
}
else {
    $seo = array(
        'seo' => ''
    );
}
$sss = $seo['seo'];

$current_url = url()->current();
$trim_url = ltrim($current_url,"https://honeydeve.alakmalak.ca/country");
$ex_url = explode("/",$trim_url);
?>
@section('title', __('Index'))
@section('footer_description',$sss)

@section('main')
    <section class="home-slider">
        <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <?php

                        $slider = \App\Slider::orderBy('id', 'desc')->where('category', 1)->first();
                        $slider1 = $slider->slider;
                        $slider2 = $slider->slider1;
                        $slider3 = $slider->slider2;

                    ?>
                    <img class="first-slide" src="{{asset('public/uploads/'.$slider1)}}" alt="First slide">
                </div>
                <div class="carousel-item">
            <img class="second-slide" src="{{asset('public/uploads/'.$slider2)}}" alt="Second slide">
                </div>
                <div class="carousel-item">
            <img class="third-slide" src="{{asset('public/uploads/'.$slider3)}}" alt="Third slide">
                </div>
            </div>
        </div>
    </section>

    {{-- Search Section --}} {{-- SMPEDIT 30-09-2020 --}} 
    <section class="advance-search-section m-hidden">
        <div class="container">
            <div class="row justify-content-lg-center justify-content-md-center ">
                <div class="col-lg-12">
                    <div class="advance-search-sec-form">

                        <form method="POST" action="{{ url('filter/search/escort') }}">
                            @csrf

                            <div class="form-box">

                                <ul class="fields">

                                    {{-- Country --}}
                                    <li>
                                        <div class="form-group">
                                            <select class="form-control" name="country_id" id="selectCountry" onchange="getCities()">
                                                @php $countries=\App\Country::all(); @endphp
                                                
                                                @foreach($countries as $country_details)
                                                    <option value="{{ $country_details->id }}" {{ ($country_details->id == $country_id) ? 'selected' : '' }}>
                                                        {{ $country_details->country }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li> 

                                    {{-- City --}}
                                    <li>
                                        <div class="form-group">
                                            <select class="form-control" name="city_id" id="citySelect"> 
                                                @php $cities = \App\State::where('country_id', $country_id)->get(); @endphp

                                                @foreach($cities as $city)
                                                    <option value="{{$city->id}}">
                                                        {{$city->state}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li> 

                                    {{-- Gender --}}
                                    <li>
                                        <div class="form-group">
                                            <select class="form-control" name="gender">
                                                <option value="">--Select Gender--</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Trans Gender</option>
                                                <option value="4">Gay</option>
                                            </select>
                                        </div>
                                    </li> 

                                    {{-- Service Type --}}
                                    <li>
                                        <div class="form-group">
                                            {{-- SMPEDIT 15-10-2020 --}}
                                            <select class="form-control" name="service_type">
                                                <option value="">--Select Service Type--</option>
                                                <option value="1">Escort</option>
                                                <option value="2">BDSM</option>
                                                <option value="3">Massage</option>
                                            </select>
                                            {{-- <div class="form-group">
                                                <input name="service_type" type="text" class="form-control" placeholder="Service Type" />
                                            </div> --}}
                                            {{-- / SMPEDIT 15-10-2020 END --}}
                                        </div>
                                    </li> 

                                    {{-- Keyword --}}
                                    <li>
                                        <div class="form-group">
                                            <input name="keyword" type="text" class="form-control" placeholder="Keyword" />
                                        </div>
                                    </li> 

                                    {{-- Touring Escorts --}}
                                    <li class="custom-toggle">
                                        <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="touring_escorts_btn"
                                            onclick="customToggle('touring_escorts', 'touring_escorts_btn');">
                                                Touring Escorts
                                        </button>
                                        <input type="hidden" id="touring_escorts" name="touring_escorts" value="false" />
                                    </li> 

                                    {{-- Reviews --}}
                                    <li class="custom-toggle">
                                        <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="with_reviews_btn"
                                            onclick="customToggle('with_reviews', 'with_reviews_btn');">
                                                Reviews
                                        </button>
                                        <input type="hidden" id="with_reviews" name="with_reviews" value="false" />
                                    </li> 

                                    {{-- Couples Service --}}
                                    <li class="custom-toggle">
                                        <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="couples_service_btn"
                                            onclick="customToggle('couples_service', 'couples_service_btn');">
                                                Couples Service
                                        </button>
                                        <input type="hidden" id="couples_service" name="couples_service" value="false" />
                                    </li> 

                                    {{-- Available Now --}}
                                    <li class="custom-toggle">
                                        <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="available_now_btn"
                                            onclick="customToggle('available_now', 'available_now_btn');">
                                                Available Now
                                        </button>
                                        <input type="hidden" id="available_now" name="available_now" value="false" />
                                    </li> 

                                    {{-- Search --}}
                                    <li>
                                        <div class="form-group">
                                            <button type="submit" class="btn custom-red-small btn-block">Search</button>
                                        </div>
                                    </li> 
                                </ul>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <section class="advance-search-section thin m-visible desk-hidden">
        <div class="container">
            <div class="row justify-content-lg-center justify-content-md-center ">
                <div class="col-lg-12">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                    Listing Search <i class="fas fa-chevron-down right"></i>
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="advance-search-sec-form">
                                        <form method="POST" action="{{ url('filter/search/escort') }}">
                                            @csrf
                                            <div class="form-box">
                                                <ul class="fields">
                                                    {{-- Country --}}
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="country_id" id="selectCountry" onchange="getCities()">
                                                                @php $countries=\App\Country::all(); @endphp
                                                                
                                                                @foreach($countries as $country_details)
                                                                    <option value="{{ $country_details->id }}" {{ ($country_details->id == $country_id) ? 'selected' : '' }}>
                                                                        {{ $country_details->country }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </li> 
                                                    {{-- City --}}
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="city_id" id="citySelectMob"> 
                                                                @php $cities = \App\State::where('country_id', $country_id)->get(); @endphp
                                                                @foreach($cities as $city)
                                                                    <option value="{{$city->id}}">
                                                                        {{$city->state}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </li> 
                                                    {{-- Gender --}}
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="gender">
                                                                <option value="">--Select Gender--</option>
                                                                <option value="1">Male</option>
                                                                <option value="2">Female</option>
                                                                <option value="3">Trans Gender</option>
                                                                <option value="4">Gay</option>
                                                            </select>
                                                        </div>
                                                    </li> 
                                                    {{-- Service Type --}}
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="service_type">
                                                                <option value="">--Select Service Type--</option>
                                                                <option value="1">Escort</option>
                                                                <option value="2">BDSM</option>
                                                                <option value="3">Massage</option>
                                                            </select>
                                                        </div>
                                                    </li> 
                                                    {{-- Keyword --}}
                                                    <li>
                                                        <div class="form-group">
                                                            <input name="keyword" type="text" class="form-control" placeholder="Keyword" />
                                                        </div>
                                                    </li> 
                                                    {{-- Touring Escorts --}}
                                                    <li class="custom-toggle">
                                                        <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="touring_escorts_btn_mob"
                                                            onclick="customToggle('touring_escorts', 'touring_escorts_btn_mob');">
                                                                Touring Escorts
                                                        </button>
                                                        <input type="hidden" id="touring_escorts" name="touring_escorts" value="false" />
                                                    </li> 
                                                    {{-- Reviews --}}
                                                    <li class="custom-toggle">
                                                        <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="with_reviews_btn_mob"
                                                            onclick="customToggle('with_reviews', 'with_reviews_btn_mob');">
                                                                Reviews
                                                        </button>
                                                        <input type="hidden" id="with_reviews" name="with_reviews" value="false" />
                                                    </li> 
                                                    {{-- Couples Service --}}
                                                    <li class="custom-toggle">
                                                        <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="couples_service_btn_mob"
                                                            onclick="customToggle('couples_service', 'couples_service_btn_mob');">
                                                                Couples Service
                                                        </button>
                                                        <input type="hidden" id="couples_service" name="couples_service" value="false" />
                                                    </li> 
                                                    {{-- Available Now --}}
                                                    <li class="custom-toggle">
                                                        <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="available_now_btn_mob"
                                                            onclick="customToggle('available_now', 'available_now_btn_mob');">
                                                                Available Now
                                                        </button>
                                                        <input type="hidden" id="available_now" name="available_now" value="false" />
                                                    </li> 
                                                    {{-- Search --}}
                                                    <li>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn custom-red-small btn-block">Search</button>
                                                        </div>
                                                    </li> 
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- / Search Section End --}} {{-- / SMPEDIT 30-09-2020 End --}} 

    {{-- Escorts --}}
                <?php
                    $escorts = \App\User::where([['roleStatus', 2], ['country', $country_id], ['request', '=', 1]])->get();
                ?>
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
                                <a href="{{ '/profile/'.$escorts[$key-1]->id.'/'.str_replace(' ','-',$escorts[$key-1]->name) }}" class="btn btn-block red-small mt-2"> Visit Profile </a>
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
                                <a href="{{ '/profile/'.$escorts[$key]->id.'/'.str_replace(' ','-',$escorts[$key]->name) }}" class="btn btn-block red-small mt-2"> Visit Profile </a>
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
                     <a href="{{ url('/profile/'.$escort->id.'/'.$name)}}">
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

    {{-- SMPEDIT 01-10-2020 --}}
    @php $indpnts= \App\Independent::all(); @endphp
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
            @php $provresrcs= \App\ProviderResource::all(); @endphp
            <div class="row justify-content-lg-center justify-content-md-center ">
                <div class="col-lg-8">
                    @foreach($provresrcs as $resourc)
                        <div class="box-title c-center">
                            <h2>{{$resourc->titleHead}}</h2>
                            {{-- {!! $resourc->intro!!} --}}
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row">
                @foreach($provresrcs as $resourc)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <a href="{{url('sex/trafficking')}}">
                            <div class="service-provider-box">
                                @if($resourc->icon1==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$resourc->icon1)}}" class="w-100"/>@endif
                                <h4>{{$resourc->title1}}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach

                @foreach($provresrcs as $resourc)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <a href="{{url('local/resources')}}">
                            <div class="service-provider-box">
                                @if($resourc->icon2==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$resourc->icon2)}}" class="w-100"/>@endif
                                
                                <h4>{{$resourc->title2}}</h4>
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
                                @if($resourc->icon4==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$resourc->icon4)}}" class="w-100"/>@endif
                                
                                <h4>{{$resourc->title4}}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @php $professionals= \App\Professional::all(); @endphp
    @foreach($professionals as $professonal)
        <section class="home-platform " style="background-image: url('{{asset('public/uploads/'.$professonal->bgTop)}}'); background-size:cover;background-position: center;">
            <div class="container">
                <div class="row justify-content-lg-center justify-content-md-center ">
                    <div class="col-lg-8">   
                        @foreach($professionals as $professonal)
                            <div class="box-title c-center dark">
                                <h2>{{$professonal->titleHead}}</h2>
                                <p>{{$professonal->intro}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="row justify-content-lg-center justify-content-md-center justify-content-center ">
                    @foreach($professionals as $professonal)
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="{{url('multi/page?url=mul-reviews&country='.$ex_url[0])}}">
                                <div class="platform-box">
                                    <div class="img-area">
                                        @if($professonal->icon1==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon1)}}" class="w-100"/>@endif
                                        <div class="overlay">
                                            <div class="icon"><img src="{{asset('public/uploads/search-icon.png')}}"></div>
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
                                            <div class="icon"><img src="{{asset('public/uploads/search-icon.png')}}"></div>
                                        </div>
                                    </div>
                                    <h3>{{$professonal->title2}}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach

                    @foreach($professionals as $professonal)
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="{{url('multi/page?url=mul-tours&country='.$ex_url[0])}}">
                                <div class="platform-box">
                                    <div class="img-area">
                                        @if($professonal->icon3==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon3)}}" class="w-100"/>@endif
                                        <div class="overlay">
                                            <div class="icon"><img src="{{asset('public/uploads/search-icon.png')}}"></div>
                                        </div>
                                    </div>
                                    <h3>{{$professonal->title3}}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach

                    @foreach($professionals as $professonal)
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="{{url('multi/page?url=mul-blogs&country='.$ex_url[0])}}">
                                <div class="platform-box">
                                    <div class="img-area">
                                        @if($professonal->icon4==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon4)}}" class="w-100"/>@endif
                                        <div class="overlay">
                                            <div class="icon"><img src="{{asset('public/uploads/search-icon.png')}}"></div>
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
                                            <div class="icon"><img src="{{asset('public/uploads/search-icon.png')}}"></div>
                                        </div>
                                    </div>
                                    <h3>{{$professonal->title5}}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach

                    @foreach($professionals as $professonal)
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="{{url('multi/page?url=mul-client-logs&country='.$ex_url[0])}}">
                                <div class="platform-box">
                                    <div class="img-area">
                                        @if($professonal->icon6==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon6)}}" class="w-100"/>@endif
                                        <div class="overlay">
                                            <div class="icon"><img src="{{asset('public/uploads/search-icon.png')}}"></div>
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
                                            <div class="icon"><img src="{{asset('public/uploads/search-icon.png')}}"></div>
                                        </div>
                                    </div>
                                    <h3>{{$professonal->title7}}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach

                    @foreach($professionals as $professonal)
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="{{url('terms/condition')}}">
                                <div class="platform-box">
                                    <div class="img-area">
                                        @if($professonal->icon8==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon8)}}" class="w-100"/>@endif
                                        <div class="overlay">
                                            <div class="icon"><img src="{{asset('public/uploads/search-icon.png')}}"></div>
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
                                            <div class="icon"><img src="{{asset('public/uploads/search-icon.png')}}"></div>
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
                            @php 
                                $hedfoots=\App\HeaderFooter::orderBy('id','desc')->first(); 
                                $footerinfo= $hedfoots->footerInfo;
                                $footerlogo= $hedfoots->footerLogo;
                            @endphp

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
                @php $abouts= \App\About::all(); @endphp
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
    {{-- / SMPEDIT 01-10-2020 END --}}

    {{-- Locations --}}
    <section class="home-locations gray-bg">
        <div class="container">
            <div class="row justify-content-lg-center justify-content-md-center ">
                <div class="col-lg-8">
                        <?php $hedfoots = \App\HeaderFooter::orderBy('id', 'desc')->first();
                        $footerinfo = $hedfoots->footerInfo; ?>

                    <div class="box-title c-center">
                        <h2>Locations</h2>
                        <p>{{$footerinfo}}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-lg-center justify-content-md-center justify-content-center">
            <?php // $country=\App\Country::all(); ?>
                @foreach($countries_list as $cntry)
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="location-box">
                        @if($cntry->image==NULL)
                            <img src="{{asset('public/blankphoto.png')}}" class="w-100"sss>
                        @else
                            <img src="{{asset('public/uploads/'.$cntry->image)}}" class="w-100"/>
                        @endif
                        <a href="{{url('country/'.$country.'/'.str_replace(' ','-',$cntry->state))}}" class="city-btn">{{$cntry->state}}</a>
                    </div>
                </div>
                @endforeach
                
                <div class="col-lg-12 view-more-area c-center ">
                    <button class="btn black-btn"  data-toggle="modal" data-target="#citySearch">view more cities</button> 
                </div>
            </div>
        </div>
    </section> {{-- Locations End --}}

    {{-- SMPEDIT 01-10-2020 --}}
        {{-- <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script> --}}
    {{-- / SMPEDIT END 01-10-2020 --}}
    <script>
        $(document).ready(function(){
            var selectCountry = $("#selectCountry").val();
            $.ajax({
                url:"{{ route('country.list.escort.statelist') }}",
                    type:"POST",
                    data:{
                                "_token": "{{ csrf_token() }}",
                                country:selectCountry,
                    },
                        success: function(data) {
                            $("#state").html(data); 
                        }
            });
            $('#selectCountry').on('change', function(country) {
                var selectCountry =  this.value; 
                $.ajax({
                    url:"{{ route('country.list.escort.statelist') }}",
                    type:"POST",
                    data:{
                                "_token": "{{ csrf_token() }}",
                                country:selectCountry,
                    },
                        success: function(data) {
                            $("#state").html(data); 
                        }
                });
            });

            $("#state").on('change',function(city){
                var state = this.value;
                $.ajax({
                    url:"{{ route('country.list.escort.citylist') }}",
                    type:"POST",
                    data:{
                                "_token": "{{ csrf_token() }}",
                                state:state,
                    },
                        success: function(data) {
                            $("#city").html(data); 
                        }
                });
            });
        });
    </script>       
@endsection
