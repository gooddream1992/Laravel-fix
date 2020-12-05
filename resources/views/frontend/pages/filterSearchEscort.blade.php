@extends('masters.frontmaster')
<?php 
$seo = array('seo'=>'');
foreach ($seo_text as $value) {
    $seo['seo'] = $value->description;
}
$sss = $seo['seo'];

?>
@section('title', __('Index'))
{{-- @section('footer_description',$sss) --}}
@section('title', __('Index'))
@section('main')
<section class="home-slider">
            <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <?php $slider=\App\Slider::orderBy('id','desc')->where('category', 1)->first(); 
                        $slider1= $slider->slider; 
                        $slider2= $slider->slider1; 
                        $slider3= $slider->slider2;  ?>
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

                    <form method="POST" action="{{ url('filter/search/escort') }}" id="formId">
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
                                            <option {{ $gender=='1' ? 'selected' : '' }} value="1">Male</option>
                                            <option {{ $gender=='2' ? 'selected' : '' }} value="2">Female</option>
                                            <option {{ $gender=='3' ? 'selected' : '' }} value="3">Trans Gender</option>
                                            <option {{ $gender=='4' ? 'selected' : '' }} value="4">Gay</option>
                                        </select>
                                    </div>
                                </li> 

                                {{-- Service Type --}}
                                <li>
                                    <div class="form-group">
                                        {{-- SMPEDIT 15-10-2020 --}}
                                        <select class="form-control" name="service_type" id="service_type">
                                            <option value="">--Select Service Type--</option>
                                            <option {{  $service_type == '1' ? 'selected' : '' }} value="1">Escort</option>
                                            <option  {{  $service_type == '2' ? 'selected' : '' }}  value="2">BDSM</option>
                                            <option {{  $service_type == '3' ? 'selected' : '' }}  value="3">Massage</option>
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
                                    <input type="hidden" id="touring_escorts" name="touring_escorts"/>
                                    {{-- <input type="hidden" id="touring_escorts" name="touring_escorts" value="{{ isset($touring_escorts) ? $touring_escorts : false }}" /> --}}
                                </li> 

                                {{-- Reviews --}}
                                <li class="custom-toggle">
                                    <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="with_reviews_btn"
                                        onclick="customToggle('with_reviews', 'with_reviews_btn');">
                                            Reviews
                                    </button>
                                    <input type="hidden" id="with_reviews" name="with_reviews" value="{{ isset($with_reviews) ? $with_reviews : false }}" />
                                </li> 

                                {{-- Couples Service --}}
                                <li class="custom-toggle">
                                    <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="couples_service_btn"
                                        onclick="customToggle('couples_service', 'couples_service_btn');">
                                            Couples Service
                                    </button>
                                    <input type="hidden" id="couples_service" name="couples_service" value="{{ isset($couples_service) ? $couples_service : false }}" />
                                </li> 

                                {{-- Available Now --}}
                                <li class="custom-toggle">
                                    <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="available_now_btn"
                                        onclick="customToggle('available_now', 'available_now_btn');">
                                            Available Now
                                    </button>
                                    <input type="hidden" id="available_now" name="available_now" value="{{ isset($available_now) ? $available_now : false }}" />
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
                                    <form method="POST" action="{{ url('filter/search/escort') }}" >
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
                                                            <option {{ $gender=='1' ? 'selected' : '' }} value="1">Male</option>
                                                            <option {{ $gender=='2' ? 'selected' : '' }} value="2">Female</option>
                                                            <option {{ $gender=='3' ? 'selected' : '' }} value="3">Trans Gender</option>
                                                            <option {{ $gender=='4' ? 'selected' : '' }} value="4">Gay</option>
                                                        </select>
                                                    </div>
                                                </li> 
                                                {{-- Service Type --}}
                                                <li>
                                                    <div class="form-group">
                                                        <select class="form-control" name="service_type" id="service_type">
                                                            <option value="">--Select Service Type--</option>
                                                            <option {{  $service_type == '1' ? 'selected' : '' }} value="1">Escort</option>
                                                            <option  {{  $service_type == '2' ? 'selected' : '' }}  value="2">BDSM</option>
                                                            <option {{  $service_type == '3' ? 'selected' : '' }}  value="3">Massage</option>
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
                                                        onclick="customToggle('touring_escorts_mob', 'touring_escorts_btn_mob');">
                                                            Touring Escorts
                                                    </button>
                                                    <input type="hidden" id="touring_escorts_mob" name="touring_escorts_mob" value="{{ isset($touring_escorts) ? $touring_escorts : false }}"/>
                                                    {{-- <input type="hidden" id="touring_escorts_mob" name="touring_escorts_mob" value="{{ isset($touring_escorts) ? $touring_escorts : false }}" /> --}}
                                                </li> 
                                                {{-- Reviews --}}
                                                <li class="custom-toggle">
                                                    <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="with_reviews_btn_mob"
                                                        onclick="customToggle('with_reviews_mob', 'with_reviews_btn_mob');">
                                                            Reviews
                                                    </button>
                                                    <input type="hidden" id="with_reviews_mob" name="with_reviews_mob" value="{{ isset($with_reviews) ? $with_reviews : false }}" />
                                                </li> 
                                                {{-- Couples Service --}}
                                                <li class="custom-toggle">
                                                    <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="couples_service_btn_mob"
                                                        onclick="customToggle('couples_service_mob', 'couples_service_btn_mob');">
                                                            Couples Service
                                                    </button>
                                                    <input type="hidden" id="couples_service_mob" name="couples_service_mob" value="{{ isset($couples_service) ? $couples_service : false }}" />
                                                </li> 
                                                {{-- Available Now --}}
                                                <li class="custom-toggle">
                                                    <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="available_now_btn_mob"
                                                        onclick="customToggle('available_now_mob', 'available_now_btn_mob');">
                                                            Available Now
                                                    </button>
                                                    <input type="hidden" id="available_now_mob" name="available_now_mob" value="{{ isset($available_now) ? $available_now : false }}" />
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

            <section class="home-escorts">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center escort-row">
                        {{-- SMPEDIT 01-10-2020 --}}
                        @php
                            $users = new \App\User;
                            $results = $users->newQuery();
                            $results->where('roleStatus', 2);
                            $results->where('request', 1);
                            $results->where('country', $country_id);
                            if($city_id!='')  {
                                $results->where('state', $city_id);
                            }
                            if($gender!='')                            {
                                $results->where('gender', $gender);
                            }
                            if ($available_now == 'true') $results->where('activation', 1); // Available Now
                            if ($service_type != '') $results->where('pet', $service_type); // Service Type
                            if ($couples_service == 'true') $results->where('service', 1); // Couple Service
                            $escort_ids = array();
                            // if ($touring_escorts == 'true')
                            // {
                            //     $tour_esc = DB::table('profile_tours')->select('escortId')->groupBy('escortId')->get();
                            //     if(count($tour_esc) > 0)
                            //     {
                            //         foreach ($tour_esc as $esc_id) 
                            //         {
                            //             $escort_ids[] = $esc_id->escortId;
                            //         }
                            //         $ids = array();
                            //         $touring_escorts = DB::table('users')->join('profile_tours','profile_tours.escortId','users.id')->whereIn('users.id', $escort_ids)->where('profile_tours.country', $country_id)->where('profile_tours.city', $city_id)->select('users.id')->groupBy('users.id')->get();
                            //         foreach ($touring_escorts as $tesc_id) 
                            //         {
                            //             $ids[] = $tesc_id->id;
                            //         }
                            //         $touring_escorts = DB::table('users')->whereIn('id',$ids)->get();
                            //     }
                            // }
                            
                            if ($with_reviews == 'true')
                            {
                                $review_esc = DB::table('testimonials')->select('escort_id')->groupBy('escort_id')->get();
                                if(count($review_esc) > 0)
                                {
                                    foreach ($review_esc as $rev_esc_id) 
                                    {
                                        $escort_ids[] = $rev_esc_id->escort_id;
                                    }
                                    $results->whereIn('id', $escort_ids);
                                }
                            }
                            if(count($escort_ids) > 0)
                            {
                                $escort_ids = array_unique($escort_ids);
                            }
                            // if ($service_type) $results->where('pet', $service_type); // Service Type
                            if ($keyword) { // Keyword Search
                                $results->where(function ($query) use ($keyword) {
                                    $query->where('name', 'LIKE', '%' . $keyword . '%') // Name
                                    ->orWhere('email_me', 'LIKE', '%' . $keyword . '%') // Email Me
                                    ->orWhere('website', 'LIKE', '%' . $keyword . '%') // Website
                                    ->orWhere('price', 'LIKE', '%' . $keyword . '%') // Price
                                    ->orWhere('phone', 'LIKE', '%' . $keyword . '%') // Phone
                                        ->orWhere('email', 'LIKE', '%' . $keyword . '%'); // Email
                                    });
                                }
                                if ($couples_service == 'true') { // Couples Service
                                    $service = \App\ServiceOfferAssign::whereIn('escortId', $results->pluck('id'))
                                    ->where('service', 'Couples')->pluck('escortId');
                                    $results->whereIn('id', $service);
                                }
                                $escorts = $results->get();
                        @endphp
                        {{-- / SMPEDIT 01-10-2020 END --}}

                        @foreach($escorts as $escort)
                        <div class="col-lg-3 col-6">
                            <a href="{{ url('profile/'.$escort->id.'/'.str_replace(' ','-',$escort->name)) }}">
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
                                    <img src="{{asset('public/blankphoto.png')}}" class="w-100"> 
                                @else  
                                    <img src="{{asset('public/uploads/'.$profile_image)}}" class="w-100"/>@endif

                                <div class="overlay-top">
                                    <div class="text">
                                        <h4>{{$escort->name}}</h4>
                                        <span class="location">
                                            <?php
                                                $statecount=\App\State::all()->where('id', $escort->state);
                                            ?>
                                                @if($statecount->count()<1)
                                                    Not Found
                                                @else
                                                    {{\App\State::find($escort->state)->state}}
                                                @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="overlay-bottom {{ $escort->state==$city_id ? 'bottom-without-tour' : '' }}">
                                    <div class="text">
                                        <?php
                                            $getmonths= \App\ProfileTour::
                                                where([['escortId','=',$escort->id],
                                                    ['city','=',$city_id],
                                                    ['endDate','>=',date('Y-m-d')]
                                                ])
                                                ->select('id','startDate','endDate','city')
                                                ->limit(1)
                                                ->get();
                                        ?>
                                        @foreach($getmonths as $value)
                                        @php
                                            if($escort->state!=$city_id)
                                            {
                                        @endphp
                                        <h3>
                                            <?php
                                                $start  = $value->startDate ?? '';
                                                $start_date = date_create($start);
                                                $end = $value->endDate ?? '';
                                                $end_date = date_create($end);                                                            
                                            ?>
                                             {{ date_format($start_date,"d") }}th {{ date_format($start_date,"M") }}
                                             -
                                             {{ date_format($end_date,"d") }}th {{ date_format($end_date,"M") }}
                                        </h3>
                                        @php
                                    }
                                        @endphp
                                        @endforeach
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
                                                    if(!empty($profile_Rate_both->toArray()))
                                                    {
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
                                @if($escort->activation==1)
                                <div class="availability">
                                    <h5>Available Now</h5>
                                </div>
                                @else
                                @endif
                            </div>
                        </a>
                        </div>
                        @endforeach
                        
                            @foreach($user as $value)
                            <div class="col-lg-3 col-6">
                                
                                <a href="{{ url('profile/'.$value->id.'/'.str_replace(' ','-',$value->name)) }}">
                                <div class="our-escort-box is-available">
                                    @php
                                    $profile_image = NULL;
                                    $profile_image_arr = DB::table('profile_images')->where('status','5')->where('escortId',$value->id)->get();
                                    if(count($profile_image_arr) > 0)
                                    {
                                        $profile_image = $profile_image_arr[0]->image;
                                    }                                
                                   @endphp
                                    @if($profile_image==NULL)
                                        <img src="{{asset('public/blankphoto.png')}}" class="w-100"> 
                                    @else  
                                        <img src="{{asset('public/uploads/'.$profile_image)}}" class="w-100"/>@endif
                                    <div class="overlay-top">
                                        <div class="text">
                                            <h4>{{$value->name}}</h4>
                                            <span class="location">
                                                @php
                                                    $statecount =\App\State::where('id', $value->state)->first();
                                                @endphp
                                                {{ $statecount->state }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="overlay-bottom">
                                        <div class="text">
                                            @if(!empty($touring))
                                            <h3>
                                                
                                                    @if(isset($touring->status))                                                        
                                                        {{ $touring->status == 2 ? "Touring " :  "Touring " }}                                                        
                                                    @endif
                                                    @php
                                                        $tour_cities = isset($touring->city) ? $touring->city : NULL;
                                                        $state_name = DB::table('states')->where('id',$tour_cities)->get();
                                                        $state = isset($state_name[0]->state) ? $state_name[0]->state : '';
                                                        echo $state;
                                                    @endphp
                                                <br>
                                                            <?php
                                                                $start  = $touring->startDate ?? '';
                                                                $start_date = date_create($start);
                                                                $starts_date = date_format($start_date,"d");
                                                                $starting_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                                if (($starts_date %100) >= 11 && ($starts_date%100) <= 13) {
                                                                   $abbreviation = $starts_date. 'th';
                                                                } else {
                                                                   $abbreviation = $starts_date. $starting_date[$starts_date % 10];
                                                                }

                                                                $end = $touring->endDate ?? '';
                                                                $end_date = date_create($end);
                                                                $ends_date = date_format($end_date,"d");

                                                                $ending_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                                if (($ends_date %100) >= 11 && ($ends_date%100) <= 13) {
                                                                   $abbreviations = $ends_date. 'th';
                                                                } else {
                                                                   $abbreviations = $ends_date. $ending_date[$ends_date % 10];
                                                                }

                                                            ?>
                                                            {{ $abbreviation }} {{ date_format($start_date,"M") }}
                                                            -
                                                            {{ $abbreviations }} {{ date_format($end_date,"M") }}
                                            </h3>
                                                @endif
                                            <table class="escort-profile-details">
                                                <tr>
                                                    <td>Suburb</td>
                                                    <td>
                                                        {{ isset($value->city) ? $value->city : '' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Service Area</td>
                                                    <td>
                                                         @if($value->serviceArea==1)
                                                            In Call
                                                        @elseif($value->serviceArea==2)
                                                            Out Call
                                                        @elseif($value->serviceArea==3)
                                                            In call & Out Call
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Price</td>
                                                    @php
                                                        $profile_Rate_one = \App\ProfileRate::where('escortId','=',$value->id)->where('price','!=','')->get();
                                                        $profile_Rate_both = \App\ProfileRate::where('escortId','=',$value->id)->where('price','!=','')->select('price')->get();
                                                        if(!empty($profile_Rate_both->toArray()))
                                                        {
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
                                                    <td>{{$value->height}}"</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    @if($value->activation==1)
                                    <div class="availability">
                                        <h5>Available Now</h5>
                                    </div>
                                   @else
                                    @endif
                                </div>
                            </a>
                            </div>
                            @endforeach
                       
                       


                    </div>
                </div>
            </section>
            <?php $indpnts= \App\Independent::all();?>
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
                                    <!-- <li><a href="#" class="btn black-btn">Find Out More</a></li> -->
                                </ul>
                                <!-- <p><a href="">Click here</a> to read why you should join with us</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach

            <section class="home-service-provider">
                <div class="container">
                     <?php $provresrcs= \App\ProviderResource::all();?>
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

            <?php $professionals= \App\Professional::all();?>
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
                            <a href="{{url('multi/page?url=mul-reviews&country='.$country_id.'&city='.$city_id.'&gender='.$gender)}}">
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
                            <a href="{{url('multi/page?url=mul-tours&country='.$country_id.'&city='.$city_id.'&gender='.$gender)}}">
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
                            <a href="{{url('multi/page?url=mul-blogs&country='.$country_id.'&city='.$city_id.'&gender='.$gender)}}">
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
                            <a href="{{url('multi/page?url=mul-client-logs&country='.$country_id.'&city='.$city_id.'&gender='.$gender)}}">
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
                            <a href="{{url('faq')}}">
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
                                <?php $hedfoots=\App\HeaderFooter::orderBy('id','desc')->first(); 
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
                                            <!-- <button class="btn black-btn">Escort sign up</button> -->
                                            <!-- <button class="btn black-btn">Client sign up </button> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 c-center">
                                        <div class="red-box-inner">
                                            <img src="{{asset('public/uploads/search-xlarge-icon.png')}}" />
                                            <!-- <button class="btn black-btn height-btn"  data-toggle="modal" data-target="#citySearch">City Full<br>Search</button> -->
                                            <button class="btn black-btn " data-toggle="modal" data-target="#social-media-popup">Social Media</button>
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
        </div>
    </section>
                  

            <section class="home-about-honey">
                <div class="container">
                    @if ($sss !='')
                        <div class="row  justify-content-lg-center justify-content-md-center ">
                            @php $abouts= \App\About::all(); @endphp
                            <div class="col-lg-8">
                                <div class="box-title c-center">
                                    <h2>{{$abouts[0]->titleHead}}</h2>
                                    {!! $sss !!}
                                </div>
                            </div>
                        </div>
                    @else
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
                    @endif
                </div>
            </section> 



@endsection
