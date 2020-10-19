

@extends('masters.frontmaster')

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

                            <form method="POST" action="{{ url('filter/search/escort') }}">
                                @csrf

                                <div class="form-box">
                                    <ul class="fields">

                                        {{-- Country --}}
                                        <li>
                                            <div class="form-group">
                                                <select class="form-control" name="country_id" onchange="getCities()" id="selectCountry">
                                                    @php $countries = \App\Country::all(); @endphp
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}" {{ ($country->id == $country_id) ? 'selected' : '' }}>
                                                            {{ $country->country }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </li> 
                                        
                                        {{-- City --}}
                                        <li>
                                            <div class="form-group">
                                                <select class="form-control" name="city_id" id="citySelect"> {{-- SMPEDIT 29-09-2020 --}}
                                                    @php $cities = \App\City::all(); @endphp
                                                    @foreach($cities as $city)
                                                        <option value="{{ $city->id }}">
                                                            {{ $city->city }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </li> 

                                        {{-- Gender --}}
                                        <li>
                                            <div class="form-group">
                                                <select class="form-control" name="gender">
                                                    <option value="1" {{ ($gender == 1) ? 'selected' : '' }}>Male</option>
                                                    <option value="2" {{ ($gender == 2) ? 'selected' : '' }}>Female</option>
                                                    <option value="3" {{ ($gender == 3) ? 'selected' : '' }}>Trans Gender</option> {{-- SMPEDIT 15-10-2020 --}}
                                                </select>
                                            </div>
                                        </li> 

                                        {{-- Service Type --}}
                                        <li>
                                            <div class="form-group">
                                                {{-- SMPEDIT 15-10-2020 --}}
                                                {{-- <div class="form-group">
                                                    <input name="service_type" type="text" class="form-control" placeholder="Service Type" 
                                                        value="{{ isset($service_type) ? $service_type : '' }}"/>
                                                </div> --}}
                                                <select class="form-control" name="service_type">
                                                    <option value="1" {{ $service_type == 1 ? 'selected' : '' }}>Escort</option>
                                                    <option value="2" {{ $service_type == 2 ? 'selected' : '' }}>BDSM</option>
                                                    <option value="3" {{ $service_type == 3 ? 'selected' : '' }}>Massage</option>
                                                </select>
                                                {{-- / SMPEDIT 15-10-2020 END --}}
                                            </div>
                                        </li> 

                                        {{-- Keyword --}}
                                        <li>
                                            <div class="form-group">
                                                <input name="keyword" type="text" class="form-control" placeholder="Keyword" 
                                                    value="{{ isset($keyword) ? $keyword : '' }}"/>
                                            </div>
                                        </li> 

                                        {{-- Touring Escorts --}}
                                        <li class="custom-toggle">
                                            <button type="button" class="custom-toggle-btn btn btn-danger mb-3 w-100" data-toggle="button" aria-pressed="false"
                                                id="touring_escorts_btn" onclick="customToggle('touring_escorts', 'touring_escorts_btn');">
                                                Touring Escorts
                                            </button>
                                            <input type="hidden" id="touring_escorts" name="touring_escorts"
                                                value="{{ isset($touring_escorts) ? $touring_escorts : false }}" />
                                        </li> 

                                        {{-- Reviews --}}
                                        <li class="custom-toggle">
                                            <button type="button" class="custom-toggle-btn btn btn-danger mb-3 w-100" data-toggle="button" aria-pressed="false"
                                                id="with_reviews_btn" onclick="customToggle('with_reviews', 'with_reviews_btn');">
                                                Reviews
                                            </button>
                                            <input type="hidden" id="with_reviews" name="with_reviews"
                                                value="{{ isset($with_reviews) ? $with_reviews : false }}" />
                                        </li> 

                                        {{-- Couples Service --}}
                                        <li class="custom-toggle">
                                            <button type="button" class="custom-toggle-btn btn btn-danger mb-3 w-100" data-toggle="button" aria-pressed="false" 
                                                id="couples_service_btn" onclick="customToggle('couples_service', 'couples_service_btn');">
                                                Couples Service
                                            </button>
                                            <input type="hidden" id="couples_service" name="couples_service" 
                                                value="{{ isset($couples_service) ? $couples_service : false }}" />
                                        </li> 

                                        {{-- Available Now --}}
                                        <li class="custom-toggle">
                                            <button type="button" class="custom-toggle-btn btn btn-danger mb-3 w-100" data-toggle="button" aria-pressed="false" 
                                                id="available_now_btn" onclick="customToggle('available_now', 'available_now_btn');">
                                                Available Now
                                            </button>
                                            <input type="hidden" id="available_now" name="available_now" 
                                                value="{{ isset($available_now) ? $available_now : false }}" />
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
        {{-- / Search Section End --}} {{-- / SMPEDIT 30-09-2020 End --}}









            <section class="home-escorts">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center escort-row">

                        {{-- SMPEDIT 01-10-2020 --}}
                        @php
                            $users = new \App\User;
                            $results = $users->newQuery();

                            $results->where('roleStatus', 2);
                            $results->where('country', $country_id);
                            $results->where('city', $city_id);
                            $results->where('gender', $gender);
                            if ($touring_escorts == 'true') $results->where('escortTouring', 1); // Touring Escort
                            if ($available_now == 'true') $results->where('activation', 1); // Available Now
                            if ($service_type) $results->where('pet', $service_type); // Service Type
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
                            if ($with_reviews == 'true') { // With Reviews
                                $reviews = \App\ProfileBlog::whereIn('escortId', $results->pluck('id'))
                                    ->distinct()->pluck('escortId');
                                $results->whereIn('id', $reviews);
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
                             <a href="{{ url('profile-guest/'.$escort->id) }}">
                            <div class="our-escort-box is-available">
                               
                                @if($escort->photo==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$escort->photo)}}" class="w-100"/>@endif

                                <div class="overlay-top">
                                    <div class="text">
                                        <h4>{{$escort->name}}</h4>
                                        <span class="location"><?php $statecount=\App\State::all()->where('id', $escort->city);?>@if($statecount->count()<1) Not Found @else {{\App\State::find($escort->city)->state}} @endif</span>
                                    </div>
                                </div>
                                <div class="overlay-bottom">
                                    <div class="text">
                                        <h3><?php $statecount=\App\State::all()->where('id', $escort->city);?>@if($statecount->count()<1) Not Found @else {{\App\State::find($escort->city)->state}} @endif  - {{date('d')}}<sup>th</sup> {{date('M')}}</h3>
                                        <table class="escort-profile-details">
                                            <tr>
                                                <td>Suburb</td>
                                                <td><?php $citycount=\App\City::all()->where('id', $escort->suburb);?>
                           @if($citycount->count()<1) Not Found @else {{\App\City::find($escort->suburb)->city}} @endif</td>
                                            </tr>
                                            <tr>
                                                <td>Service Area</td>
                                                <td>@if($escort->serviceArea==1) In Call @else Out Call @endif</td>
                                            </tr>
                                            <tr>
                                                <td>Price</td>
                                                <td>${{$escort->price}}</td>
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

             








                    </div>
                </div>

            </section>
           
          


        </div>





       
@endsection