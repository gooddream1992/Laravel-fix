

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
                                          <?php $States=\App\State::all();?>
                        @foreach($States as $state)
                        <option value="{{$state->id}}">{{$state->state}}</option>
                        @endforeach
                                </select>
                                                </div>

                                            </li> 

                                            <li>

                                                <div class="form-group">

                                                  <select class="form-control" name="city_id" onchange="selectstate()" id="stateSelect">
                                          <?php $cities=\App\City::all();?>
                        @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->city}}</option>
                        @endforeach
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

                                     
                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

            
            <section class="home-escorts">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center escort-row">

                        <?php $escorts= \App\User::where('roleStatus', 2)->orWhere('country', $country)->orWhere('city', $city)->orWhere('gender', $gender)->get();?>


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
           
          


        </div>





       
@endsection