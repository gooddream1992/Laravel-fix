@extends('masters.frontmaster')

@section('title', __('Explore Cities'))
@section('main')






<?php $slider=\App\Slider::orderBy('id','desc')->where('category', 2)->first(); 
                        $slider1= $slider->slider; 
                        $slider2= $slider->slider1; 
                        $slider3= $slider->slider2;  ?>

   <?php $caroselescorts= \App\User::where('roleStatus', 2)->orderBy('id','desc')->limit(1)->get();?>

                       
        <!-- Content -->
        <div id="content">
             
            <section>

                <div id="listingCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="background-image: url('{{asset('public/uploads/'.$slider1)}}');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                       
                        </div>
                        <div class="carousel-item" style="background-image: url('{{asset('public/uploads/'.$slider2)}}');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                        
                        </div>
                        <div class="carousel-item" style="background-image: url('{{asset('public/uploads/'.$slider3)}}');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                    
                        </div>
                    </div>
                   @foreach($caroselescorts as $caro)
                    <a class="carousel-control-prev" href="#listingCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </a>
                    <a class="carousel-control-next" href="#listingCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <div class="container m-hidden">
                        <a href="{{url('profile/'.$caro->id)}}" class="btn btn-view-profile">View Profile</a>
                    </div>
                    <div class="group-buttons profile-visiblity-btn">
                        <div class="btn-group-toggle " data-toggle="buttons">
                            <label class="btn btn-secondary">
                                <input type="checkbox" checked autocomplete="off"> Info
                            </label>
                        </div>
                        <a href="{{url('profile/'.$caro->id)}}" class="btn btn-view-profile m-visible desk-hidden">View Profile</a>
                    </div>


                    <div class="profile-banner-detail">
                        <h3>{{$caro->name}}</h3>
                        <h5><?php $citycount=\App\City::all()->where('id', $caro->suburb);?>
                           @if($citycount->count()<1) Not Found @else {{\App\City::find($caro->suburb)->city}} @endif</h5>
                        <table class="escort-profile-details">
                            <tr>
                                <td>Age</td>
                                <td>{{$caro->age}} Years</td>
                            </tr>
                            <tr>
                                <td>Height</td>
                                <td>{{$caro->height}} "</td>
                            </tr>
                            <tr>
                                <td>Eyes</td>
                                <td>@if($caro->eyes==NULL) None @else {{\App\EscortDropdown::find($caro->eyes)->dropdownTitle}} @endif</td>
                            </tr>
                            <tr>
                                <td>Dress Size</td>
                                <td>{{$caro->dress}}</td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>${{$caro->price}}</td>
                            </tr>
                            <tr>
                                <td>Place of Service</td>
                                <td>{{$caro->service}}</td>
                            </tr>
                        </table>
                    </div>
                     @endforeach

                </div>

            </section>
           
           
            <section class="advance-search-section m-hidden">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-12">
                            <div class="advance-search-sec-form">
                               <form method="POST" action="{{ url('filter/search/escort') }}">
                                  @csrf

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
                                                    <select class="form-control">
                                                        <option>Escort</option>
                                                        <option>BDSM</option>
                                                        <option>Massage</option>
                                                        <option>Online Only</option>
                                                    </select>
                                                </div>
                                            </li> 
                                            <li>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Touring Escorts" />
                                                </div>
                                            </li> 
                                            <li>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Keyword" />
                                                </div>
                                            </li> 

                                            <li>
                                                 <div class="form-group">
                                <select class="form-control" name="state_id" onchange="selectstate()" id="stateSelect">
                                </select>
                            </div>

                                            </li> 
                                            <li>
                                                <div class="form-group">
                                                    <select class="form-control" name="city_id" id="selectCity">

                                                    </select>
                                                </div>
                                            </li> 
                                            <li>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Couples Service" />
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="View Available Now   " />
                                                </div>
                                            </li>

                                            <li>
                                                <div class="form-group">
                                                    <button type="submit" class="btn red-small btn-block">Filter</button>
                                                </div>
                                            </li> 
                                        </ul>
                                        <button type="submit" class="btn red-small btn-advance-search" data-toggle="modal" data-target="#advanceSearch">ADvance search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

 


 <!-- Section 3 -->
            <section class="home-escorts">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center escort-row">


                        <?php $escorts= \App\User::all()->where('roleStatus', 2);?>

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
                     <?php $provresrcs= \App\ProviderResource::all();?>
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







 <?php $professionals= \App\Professional::all();?>

             
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
                         <?php $abouts= \App\About::all();?>
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
                                <a href="#" class="city-btn">{{$cntry->country}}</a>
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





        <!-- Modal -->
        <div class="modal fade" id="social-media-popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">&nbsp;</h4>
                        <button type="button" class="btn" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="social-modal-content c-center">
                            <div class="logo c-center"><img src="images/logo.png" /></div>
                            <h3>Don't get caught with your pants down.</h3>
                            <h6>Sign up for 10% off your first order</h6>
                            <ul>
                                <li><a href="#"><img src="images/social-medial-facebook.png"></a></li>
                                <li><a href="#"><img src="images/social-medial-insta.png"></a></li>
                                <li><a href="#"><img src="images/social-medial-youtube.png"></a></li>
                                <li><a href="#"><img src="images/social-medial-twitter.png"></a></li>
                            </ul>
                            <button class="btn red-small ">Click to Follow us </button> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="contact-blog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">Blog For Us</h4>
                        <button type="button" class="btn" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body c-center">
                        <h3>Contact Us</h3>
                        <h6>Please tell us your experience and why you would be good to blog for Skissr</h6>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name " />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email Id " />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Your Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn red-small " type="submit">Submit </button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->

        <!--Full screen search form start--> 
        <div id="search">
            <button type="button" class="close">×</button>
            <form>
                <input type="search" value="" placeholder="Enter to search here..." />
                <button type="submit" class="btn red-small">Search</button>
            </form>
        </div>
        <!--Full screen search form End-->

        <!--Advance search modal start-->

        <div class="modal fade" id="advanceSearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Advance Search</h5>
                        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                        <button type="button" class="btn" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="ff.php">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="advance-search-sec-form">
                                            <div class="form-box">
                                                <ul class="fields">
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control">
                                                                <option>ss Country</option>
                                                                <option>Country 1</option>
                                                                <option>Country 2</option>
                                                                <option>Country 3</option>
                                                            </select>
                                                        </div>
                                                    </li> 
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control">
                                                                <option>Sex</option>
                                                                <option>Male</option>
                                                                <option>Female</option>
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
                                                            <select class="form-control">
                                                                <option>Age</option>
                                                                <option>18</option>
                                                                <option>20</option>
                                                                <option>22</option>
                                                                <option>24</option>
                                                                <option>26</option>
                                                            </select>
                                                        </div>
                                                    </li> 
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control">
                                                                <option>Nationality</option>
                                                                <option>Canadian </option>
                                                                <option>USA</option>
                                                                <option>UK</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </li> 
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control">
                                                                <option>City</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                            </select>
                                                        </div>
                                                    </li> 
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control">
                                                                <option>Sexuality</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                            </select>
                                                        </div>
                                                    </li> 
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control">
                                                                <option>Body Shape</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                            </select>
                                                        </div>
                                                    </li> 
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control">
                                                                <option>Hair</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                            </select>
                                                        </div>
                                                    </li> 
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control">
                                                                <option>Eyes</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
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
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck1" name="example1"><label class="custom-control-label" for="customCheck1">Boyfriend Experience</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck2" name="example1"><label class="custom-control-label" for="customCheck2">Girlfriend Girlfriend</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck3" name="example1"><label class="custom-control-label" for="customCheck3">Pornstar Girlfriend</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck4" name="example1"><label class="custom-control-label" for="customCheck4">Overnight</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck5" name="example1"><label class="custom-control-label" for="customCheck5">Party Sessions</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck6" name="example1"><label class="custom-control-label" for="customCheck6">Dinner Dates</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck7" name="example1"><label class="custom-control-label" for="customCheck7">Couples</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck8" name="example1"><label class="custom-control-label" for="customCheck8">Fly me to you</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck9" name="example1"><label class="custom-control-label" for="customCheck9">Message</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck10" name="example1"><label class="custom-control-label" for="customCheck10">Videoing</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck11" name="example1"><label class="custom-control-label" for="customCheck11">Dress Up</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck12" name="example1"><label class="custom-control-label" for="customCheck12">Tantra</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck13" name="example1"><label class="custom-control-label" for="customCheck13">Anal</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck14" name="example1"><label class="custom-control-label" for="customCheck14">bbj</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck15" name="example1"><label class="custom-control-label" for="customCheck15">Covered bj</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck16" name="example1"><label class="custom-control-label" for="customCheck16">Covered bj</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck17" name="example1"><label class="custom-control-label" for="customCheck17">Boyfriend Experience</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck18" name="example1"><label class="custom-control-label" for="customCheck18">Girlfriend Girlfriend</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck19" name="example1"><label class="custom-control-label" for="customCheck19">Pornstar Girlfriend</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck20" name="example1"><label class="custom-control-label" for="customCheck20">Overnight</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck21" name="example1"><label class="custom-control-label" for="customCheck21">Party Sessions</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck22" name="example1"><label class="custom-control-label" for="customCheck22">Dinner Dates</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck23" name="example1"><label class="custom-control-label" for="customCheck23">Couples</label></div></li>
                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck24" name="example1"><label class="custom-control-label" for="customCheck24">Fly me to you</label></div></li>
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
        </div>
        <!--Advance search modal End-->

        <!--City Search Modal start-->
        <!-- Modal -->
        <div class="modal fade" id="citySearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">Search By City</h4>
                        <button type="button" class="btn" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <select class="form-control">
                                    <option>Country</option> 
                                    <option>Canada</option> 
                                    <option>Australia</option> 
                                    <option>UK</option> 
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control">
                                    <option>City</option> 
                                    <option>City name 1</option> 
                                    <option>City name 2</option> 
                                    <option>City name 3</option> 
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="red-small btn-block">Search</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--City Search Modal End-->

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>



<script>

            $(document).ready(function () {

                $('a[href="#search"]').on("click", function (event) {

                    event.preventDefault();

                    $("#search").addClass("open");

                    $('#search > form > input[type="search"]').focus();

                });



                $("#search, #search .close").on("click keyup", function (event) {

                    if (

                            event.target == this ||

                            event.target.className == "close" ||

                            event.keyCode == 27

                            ) {

                        $(this).removeClass("open");

                    }

                });



                $("form").submit(function (event) {
                     /*
                     alert(1);
                    event.preventDefault();

                    return false;
                       */
                });





                $('#advanceSearch').on('shown.bs.modal', function () {

                    $('#myInput').trigger('focus')

                })



            });



        </script>









        





        
@endsection