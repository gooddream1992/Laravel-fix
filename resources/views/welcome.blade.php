@extends('masters.frontmaster')
@section('title', __('Index'))
@section('main')
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

                                                         <select class="form-control" name="country_id" onchange="selectcountry()" id="selectCountry">
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

                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" value="{{$service->id}}" class="custom-control-input" id="customCheck1{{$service->id}}" name="example1">
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

                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Agency</button>

                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Independent</button>

                                            <!--<button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Establishment</button>-->

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

        </div>
<section class="home-slider">

  
            <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <?php                            
                            $slider1= isset($slider->slider) ? $slider->slider : null;
                            $slider2= isset($slider->slider1) ? $slider->slider1 : null;
                            $slider3= isset($slider->slider2) ? $slider->slider2 : null;
                         ?>
                        <img class="first-slide" src="{{ asset('public/uploads/'.$slider1) }}" alt="First slide">
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
                                        <button class="btn btn-dark font-uppercase " data-toggle="modal" data-target="#advanceSearch" type="button">Advanced Search</button> {{-- SMPEDIT 15-10-2020 --}}
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- Section 3 -->
            <section class="home-escorts">
                <div class="container">
                    <div class="row escort-row">
                        <div class="escort-data"></div>
                        @foreach($escorts as $escort)
                        <div class="col-lg-3 col-6 escort-hide-show">
                             <a href="{{ url('profile/'.$escort->id)}}">
                            <div class="our-escort-box is-available">
                               
                                @if($escort->photo==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100 fix-es-box"> @else  <img src="{{asset('public/uploads/'.$escort->photo)}}" class="w-100 fix-es-box"/>@endif

                                <div class="overlay-top">
                                    <div class="text">
                                        <h4>{{$escort->name}}</h4>
                                        <span class="location">
                                            @if(!isset($escort->state))
                                                {{-- Not Found --}}
                                            @else
                                                {{ $escort->state }}
                                            @endif</span>
                                    </div>
                                </div>
                                <div class="overlay-bottom">
                                    <div class="text">
                                        <h3>
                                            @if(!isset($escort->state))
                                                {{-- Not Found  --}}
                                            @else
                                                - {{ $escort->state }}
                                            @endif
                                            {{ date('d') }}
                                            <sup>th</sup>
                                            {{date('M')}}
                                        </h3>

                                        <table class="escort-profile-details">
                                            <tr>
                                                <td>Suburb</td>
                                                <td>
                                                    @if(!isset($escort->city)) Not Found @else {{ $escort->city }} @endif</td>
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
                                @if(isset($escort->activation))
                                <div class="availability">
                                    <h5>Available Now</h5>
                                </div>
                                @endif
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
                                @if($resourc->icon1==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$resourc->icon1)}}" style="height:235px;" class="w-100"/>@endif
                                
                                <h4>{{$resourc->title1}}</h4>
                            </div>
                        </a>
                        </div>
                        @endforeach

                        @foreach($provresrcs as $resourc)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                             <a href="{{url('local/resources')}}">
                            <div class="service-provider-box">
                                @if($resourc->icon2==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$resourc->icon2)}}" style="height:235px;" class="w-100"/>@endif
                                
                                <h4>{{$resourc->title2}}</h4>
                            </div>
                             </a>
                        </div>
                        @endforeach

                       

                          @foreach($provresrcs as $resourc)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                             <a href="{{url('purchase/marketing')}}">
                            <div class="service-provider-box">
                                @if($resourc->icon3==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$resourc->icon3)}}" style="height:235px;" class="w-100"/>@endif
                                
                                <h4>{{$resourc->title3}}</h4>
                            </div>
                             </a>
                        </div>
                        @endforeach

                           @foreach($provresrcs as $resourc)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                             <a href="{{url('bacome/escort')}}">
                            <div class="service-provider-box">
                                @if($resourc->icon4==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$resourc->icon4)}}" style="height:235px;" class="w-100"/>@endif
                                
                                <h4>{{$resourc->title4}}</h4>
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
                                        @if($professonal->icon1==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon1)}}" style="height:235px;" class="w-100"/>@endif
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
                                        @if($professonal->icon2==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon2)}}" style="height:235px;" class="w-100"/>@endif
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
                            <a href="{{url('multi/page')}}">
                                <div class="platform-box">
                                    <div class="img-area">
                                        @if($professonal->icon3==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon3)}}" style="height:235px;" class="w-100"/>@endif
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
                            <a href="{{url('multi/page')}}">
                                <div class="platform-box">
                                    <div class="img-area">
                                        @if($professonal->icon4==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon4)}}" style="height:235px;" class="w-100"/>@endif
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
                                        @if($professonal->icon5==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon5)}}" style="height:235px;" class="w-100"/>@endif
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
                            <a href="{{url('multi/page')}}">
                                <div class="platform-box">
                                    <div class="img-area">
                                        @if($professonal->icon6==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon6)}}" style="height:235px;" class="w-100"/>@endif
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
                                        @if($professonal->icon7==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon7)}}" style="height:235px;" class="w-100"/>@endif
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
                            <a href="{{url('terms/condition')}}">
                                <div class="platform-box">
                                    <div class="img-area">
                                        @if($professonal->icon8==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon8)}}" style="height:235px;" class="w-100"/>@endif
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
                                        @if($professonal->icon9==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$professonal->icon9)}}" style="height:235px;" class="w-100"/>@endif
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
                                            <a href="{{ url('/client/membership') }}" class="btn black-btn">Escort sign up</a>
                                            <a href="{{url('bacome/escort')}}" class="btn black-btn">Client sign up</a>
                                            <!-- <a href="{{url('escort/signup')}}" class="btn black-btn">Escort sign up</a>
                                            <a href="{{url('client/signup')}}" class="btn black-btn">Client sign up </a> -->
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
                                 $footerinfo= $hedfoots->footerInfo; ?>

                            <div class="box-title c-center">
                                <h2>Locations</h2>
                                <p>{{ $footerinfo}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-lg-center justify-content-md-center justify-content-center">
                   <?php ?>
                        @foreach($country as $cntry)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="location-box">
                                @if($cntry->image==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$cntry->image)}}" class="w-100"/>@endif
                                <a href="{{url('country/list/escort/'.$cntry->country_id)}}" class="city-btn">{{$cntry->state}}</a>
                                {{-- <a href="{{url('country/list/escort/'.$cntry->id)}}" class="city-btn">{{$cntry->country}}</a> --}}
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
                        /*$(".escort-data").html(data);*/
                        var html = '<section class="home-escorts"><div class="container"><div class="row justify-content-lg-center justify-content-md-center escort-row"><div class="escort-data"></div>';
                        for(var count =0; count < data.length; count++){
                            html += '<div class="col-lg-3 col-6 ">';
                            var ids = data[count].id;
                            html += '<a href="<?php echo url('profile-guest/') ?>/'+ids+' " >';
                            html += '<div class="our-escort-box is-available">';
                            if(data[count].photo == ''){
                                html += '<img src="{{asset("public/blankphoto.png")}}" class="w-100">';
                            }else{
                                html +='<img src="{{asset("public/uploads/")}}/'+data[count].photo+'" class="w-100"/>';
                            }
                            html += '<div class="overlay-top"><div class="text"><h4>';
                            html += data[count].name;
                            html += '</h4><span class="location">';
                            if(data[count].state == ''){
                                html += "Not Found";
                            }else{
                                html += data[count].state;
                            }
                            html += '</span></div></div><div class="overlay-bottom"><div class="text"><h3>';
                            if(data[count].state == ''){
                                html += "Not Found";
                            }else{
                                html += data[count].state;
                            }
                            html += ' - {{ date("d") }}<sup>th</sup>{{date("M")}}</h3><table class="escort-profile-details"><tr><td>Suburb</td><td>';
                            if(data[count].city == ''){
                                html += "Not Found";
                            }else{
                                html += data[count].city;    
                            }
                            html += '</td></tr><tr><td>Service Area</td><td>';
                            if(data[count].serviceArea == 1){
                                html += 'In Call';
                            }else{
                                html += 'Out Call';
                            }
                            html += '</td></tr><tr><td>Price</td><td>';
                            html += data[count].price;
                            html += '</td></tr><tr><td>Height</td><td>';
                            if(data[count].height == null){   
                                html += '``';
                            }else{
                                html += data[count].height;
                            }
                            html += '</td></tr></table></div></div>';
                            if(data[count].activation == 1){
                                html += '<div class="availability"><h5>Available Now</h5></div>';
                            }
                            html += '</div></a></div>';
                        }
                        html += '</div></div></section>';
                        $(".escort-data").html(html);
                        $('.escort-hide-show').hide();
                    }
                });
            });
        });
       </script>
@endsection