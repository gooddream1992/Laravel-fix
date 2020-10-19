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
                                            <select class="form-control" name="country_id" id="selectCountry" onchange="getCities()">
                                                @php $countries=\App\Country::all(); @endphp
                                                
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
                                            <select class="form-control" name="city_id" id="citySelect"> 
                                                @php $cities = \App\City::where('country_id', $country_id)->get(); @endphp

                                                @foreach($cities as $city)
                                                    <option value="{{$city->id}}">
                                                        {{$city->city}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li> 

                                    {{-- Gender --}}
                                    <li>
                                        <div class="form-group">
                                            <select class="form-control" name="gender">
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select>
                                        </div>
                                    </li> 

                                    {{-- Service Type --}}
                                    <li>
                                        <div class="form-group">
                                            {{-- SMPEDIT 15-10-2020 --}}
                                            <select class="form-control" name="service_type">
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

                                {{-- Advance Search --}}
                                <button type="button" class="btn custom-red-small btn-advance-search" data-toggle="modal" data-target="#advanceSearch">
                                    Advanced search {{-- SMPEDIT 15-10-2020 --}}
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>
    {{-- / Search Section End --}} {{-- / SMPEDIT 30-09-2020 End --}} 

    <!--Advance search modal start-->
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

                                                        <select class="form-control" name="country_id" onchange="selectcountry()" id="selectCountry">
                    <?php $countries=\App\Country::all();?>
                    @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->country}}</option>
                    @endforeach
                            </select>

                                                    </div>

                                                </li> 

                                                <li>

                                                    <div class="form-group">

                                                        <select class="form-control" name="gender">

                                                            <option value="1">Male</option>

                                                            <option value="2">Female</option>

                                                        </select>

                                                    </div>

                                                </li>

                                                <li>

                                                    <div class="form-group">

                                                        <input type="text" class="form-control" placeholder="Height">

                                                    </div>

                                                </li>

                                                <li>

                                                    <div class="form-group">

                                                        <input type="text" class="form-control" placeholder="Dress Size">

                                                    </div>

                                                </li>



                                                <li>

                                                    <div class="form-group">

                                                        <select class="form-control" name="age">

                                                            <option>Age</option>

                                                            <option value="18">18</option>

                                                            <option value="20">20</option>

                                                            <option value="22">22</option>

                                                            <option value="24">24</option>

                                                            <option value="26">26</option>

                                                        </select>

                                                    </div>

                                                </li> 

                                                <li>

                                                    <div class="form-group">

                        <select class="form-control" name="nationality">
                    <?php $nationalities=\App\EscortDropdown::all()->where('status', 4);?>
                    @foreach($nationalities as $nation)
                    <option value="{{$nation->id}}">{{$nation->dropdownTitle}}</option>
                    @endforeach
                            </select>


                                                    </div>

                                                </li> 

                                                <li>

                                                    <div class="form-group">
        <select class="form-control" name="state_id" onchange="selectstate()" id="stateSelect">
                                                <?php $States=\App\State::all();?>
                    @foreach($States as $state)
                    <option value="{{$state->id}}">{{$state->state}}</option>
                    @endforeach
                            </select>

                                                    </div>

                                                </li> 

                                                <li>

                                                    <div class="form-group">

                                                        <select class="form-control" name="sextuality">
                    <?php $sextualities=\App\EscortDropdown::all()->where('status', 3);?>
                    @foreach($sextualities as $sex)
                    <option value="{{$sex->id}}">{{$sex->dropdownTitle}}</option>
                    @endforeach
                            </select>

                                                    </div>

                                                </li> 

                                                <li>

                                                    <div class="form-group">

                                                        <select class="form-control" name="bodyShape">
                    <?php $bodyshpaes=\App\EscortDropdown::all()->where('status', 2);?>
                    @foreach($bodyshpaes as $shape)
                    <option value="{{$shape->id}}">{{$shape->dropdownTitle}}</option>
                    @endforeach
                            </select>

                                                    </div>

                                                </li> 

                                                <li>

                                                    <div class="form-group">

                                                        <select class="form-control" name="hair">
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
                    <?php $eyes=\App\EscortDropdown::all()->where('status', 1);?>
                    @foreach($eyes as $eye)
                    <option value="{{$eye->id}}">{{$eye->dropdownTitle}}</option>
                    @endforeach
                            </select>
                                                    </div>

                                                </li> 

                                                <li>

                                                    <div class="form-group">

                                                        <input type="text" class="form-control" placeholder="Price">

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

                                        <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Touring Escorts</button>

                                        <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >View Available Now</button>

                                        <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >View Available Today    </button>

                                        <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >In Call</button>

                                        <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Out Call</button>

                                    </div>

                                </div>

                                <div class="col-lg-9 c-center mt-3">

                                    <h4>Services Offered </h4>

                                    <ul class="advance-search-check-list">
                                        <?php $services=\App\ServiceOffer::all();?>
                                        @foreach($services as $service)

                                        <li><div class="custom-control custom-checkbox"><input type="checkbox" value="{{$service->id}}" class="custom-control-input" id="customCheck1{{$service->id}}" name="example1"><label class="custom-control-label" for="customCheck1{{$service->id}}">{{$service->service}}</label></div></li>

                                        @endforeach

                                        

                                    </ul>

                                </div>

                                <div class="col-lg-6 c-center">

                                    <div class="search-availability-bar equal-btns">

                                        <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Agency</button>

                                        <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Independent</button>

                                        <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Establishment</button>

                                    </div>

                                </div>

                            </div>

                            <div class="row justify-content-lg-center">

                                <div class="col-lg-5 c-center mt-3 mb-3">

                                    <div class="clearfix">

                                        <div class="form-group price-detail left">

                                            <input type="text" class="form-control" placeholder="From" />

                                            <input type="text" class="form-control" placeholder="To" />

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

    </div> <!--Advance search modal End-->

    {{-- Escorts --}}
    <section class="home-escorts" style="height: 100% !important;">
        <div class="container">
            <div class="row justify-content-lg-center justify-content-md-center escort-row">


                <?php $escorts= \App\User::all()->where('roleStatus', 2)->where('country', $country_id);?> {{-- SMPEDIT 01-10-2020 --}}

                @foreach($escorts as $escort)
                <div class="col-lg-3 col-6">
                        <a href="{{url('profile/'.$escort->id)}}">
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

    </section> {{-- / Escorts End --}}

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
                                <li><a href="#" class="btn black-btn">Client register</a></li>
                                <li><a href="#" class="btn black-btn">escort register</a></li>
                                <li><a href="#" class="btn black-btn">Find Out More</a></li>
                            </ul>
                            <p><a href="">Click here</a> to read why you should join with us</p>
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
                            {{$resourc->intro}}
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
                            <a href="{{url('multi/page')}}">
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
                            <a href="{{url('multi/page')}}">
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
                            <a href="{{url('multi/page')}}">
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
                            <a href="{{url('multi/page')}}">
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
                                        <button class="btn black-btn">Escort sign up</button>
                                        <button class="btn black-btn">Client sign up </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 c-center">
                                    <div class="red-box-inner">
                                        <img src="{{asset('public/uploads/search-xlarge-icon.png')}}" />
                                        <button class="btn black-btn height-btn"  data-toggle="modal" data-target="#citySearch">City Full<br>Search</button>
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
                        <?php $hedfoots=\App\HeaderFooter::orderBy('id','desc')->first(); 
                            $footerinfo= $hedfoots->footerInfo; ?>

                    <div class="box-title c-center">
                        <h2>Locations</h2>
                        <p>{{$footerinfo}}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-lg-center justify-content-md-center justify-content-center">
            <?php $country=\App\Country::all();?>
                @foreach($country as $cntry)
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="location-box">
                        @if($cntry->image==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$cntry->image)}}" class="w-100"/>@endif
                        <a href="{{url('country/list/escort/'.$cntry->id)}}" class="city-btn">{{$cntry->country}}</a>
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
