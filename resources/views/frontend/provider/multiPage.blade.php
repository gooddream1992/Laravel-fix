@extends('masters.frontmaster')

@section('title', __('Multi page'))
@section('main')

     <?php $blogs3 =\App\Blog::all()->where('status', 3);?>
          @foreach($blogs3 as $blog3)
<section class=" innerpage-banner">
            <img src="{{asset('public/uploads/'.$blog3->imageurl)}}" class="w-100 inner-ban-img" alt="banner image" />
            <div class="container">
                <div class="ban-text text-left">
                    <h1>{{$blog3->title}}</h1>
                    <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry </p>-->
                </div>
            </div>
        </section>
        @endforeach

        <!-- Content -->
        <div id="content">
            <section class="multipage-text-sec row-am black-bg">
                <?php $blogs4 =\App\Blog::all()->where('status', 4);?>
          @foreach($blogs4 as $blog4)
                <div class="container">
                    <div class="row justify-content-center c-left">
                        <div class="col-lg-12">
                            <div class="large-title box-title ">
                                <h2>{{$blog4->title}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="text-content dark">
                                {!! $blog4->description !!}
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </section>
                <?php $blogs5 =\App\Blog::all()->where('status', 5);?>
          @foreach($blogs5 as $blog5)
            <section class="multipage-inner-img-sec" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 p-0">
                            <img src="{{asset('public/uploads/'.$blog5->imageurl)}}" class="w-100" />
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
            <section class="multipage-inner-tab-sec row-am " >
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav nav-tabs nav-pills nav-fill" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="mul-reviews-tab" data-toggle="tab" href="#mul-reviews" role="tab" aria-controls="reviews" aria-selected="true"><img src="{{asset('public/images/multi-page-tab-1.png')}}"><img src="{{asset('public/images/multi-page-tab-1-gray.png')}}"> Reviews</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="mul-blogs-tab" data-toggle="tab" href="#mul-blogs" role="tab" aria-controls="blogs" aria-selected="false"><img src="{{asset('public/images/multi-page-tab-2.png')}}"><img src="{{asset('public/images/multi-page-tab-2-gray.png')}}"> Blogs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="mul-tours-tab" data-toggle="tab" href="#mul-tours" role="tab" aria-controls="tours" aria-selected="false"><img src="{{asset('public/images/multi-page-tab-3.png')}}"><img src="{{asset('public/images/multi-page-tab-3-gray.png')}}"> Tours</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="mul-client-logs-tab" data-toggle="tab" href="#mul-client-logs" role="tab" aria-controls="contact" aria-selected="false"><img src="{{asset('public/images/multi-page-tab-4.png')}}"><img src="{{asset('public/images/multi-page-tab-4-gray.png')}}"> Client logs</a>
                                </li>
                            </ul>
                            <div class="tab-content text-white" id="myTabContent">
                                <div class="tab-pane fade show active" id="mul-reviews" role="tabpanel" aria-labelledby="mul-reviews-tab">
                                 
                                    <section class="search-city-bar blogs-search-bar ">
                                        <form method="POST" action="{{ url('search/multi/page/blog') }}">
                                  @csrf

                                            <div class="row justify-content-lg-center justify-content-md-center">
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                          <select class="form-control" name="country_id" onchange="selectcountry()" id="selectCountry">
                                     <?php $countries=\App\Country::all();?>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->country}}</option>
                        @endforeach
                                </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                         <select class="form-control" name="state_id" onchange="selectstate()" id="stateSelect">
                                      <?php $states=\App\State::all();?>
                        @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->state}}</option>
                        @endforeach
                                </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <select class="form-control">
                                                            <option>Male </option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <button class="btn red-small btn-block">search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                    <div class="escorts-grid">
                                        <div class="row">

                                             <?php $blogs2 =\App\Blog::all()->where('status', 2);?>
                                              @foreach($blogs2 as $blog2)
                                            <div class="col-lg-3 col-md-4">
                                                <div class="escort-box">
                                                    <div class="box-img">
                                                        <img src="{{asset('public/uploads/'.$blog2->imageurl)}}" class="w-100" />
                                                    </div>
                                                    <div class="box-content">
                                                        <h3>@if($blog2->publishBy==0) Unknown @else {{\App\User::find($blog2->publishBy)->name}} @endif</h3>
                                                        <h6>{{$blog2->created_at}}</h6>  
                                                        <p>{{$blog2->title}}<a href="{{url('blog/details/'.$blog2->id)}}" class="read-more-link">Read More »</a></p>

                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            

                                        </div>

                                    </div>

                                </div>
                                <div class="tab-pane fade" id="mul-blogs" role="tabpanel" aria-labelledby="mul-blogs-tab">
                                    <section class="search-city-bar blogs-search-bar ">
                                      <form method="POST" action="{{ url('search/multi/page/blog') }}">
                                  @csrf

                                            <div class="row justify-content-lg-center justify-content-md-center">
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                          <select class="form-control" name="country_id" onchange="selectcountry()" id="selectCountry">
                                     <?php $countries=\App\Country::all();?>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->country}}</option>
                        @endforeach
                                </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                         <select class="form-control" name="state_id" onchange="selectstate()" id="stateSelect">
                                      <?php $states=\App\State::all();?>
                        @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->state}}</option>
                        @endforeach
                                </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <select class="form-control">
                                                            <option>Male </option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <button class="btn red-small btn-block">search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                    <div class="escorts-grid">
                                        <div class="row">
                                            <?php $blogs2 =\App\Blog::all()->where('status', 2);?>
                                              @foreach($blogs2 as $blog2)
                                            <div class="col-lg-3 col-md-4">
                                                <div class="escort-box">
                                                    <div class="box-img">
                                                        <img src="{{asset('public/uploads/'.$blog2->imageurl)}}" class="w-100" />
                                                    </div>
                                                    <div class="box-content">
                                                        <h3>@if($blog2->publishBy==0) Unknown @else {{\App\User::find($blog2->publishBy)->name}} @endif</h3>
                                                        <h6>{{$blog2->created_at}}</h6>  
                                                        <p>{{$blog2->title}}<a href="{{url('blog/details/'.$blog2->id)}}" class="read-more-link">Read More »</a></p>

                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade home-escorts" id="mul-tours" role="tabpanel" aria-labelledby="mul-tours-tab">
                                    <section class="search-city-bar blogs-search-bar ">
                                       <form method="POST" action="{{ url('search/multi/page/blog') }}">
                                  @csrf

                                            <div class="row justify-content-lg-center justify-content-md-center">
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                          <select class="form-control" name="country_id" onchange="selectcountry()" id="selectCountry">
                                     <?php $countries=\App\Country::all();?>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->country}}</option>
                        @endforeach
                                </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                         <select class="form-control" name="state_id" onchange="selectstate()" id="stateSelect">
                                      <?php $states=\App\State::all();?>
                        @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->state}}</option>
                        @endforeach
                                </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <select class="form-control">
                                                            <option>Male </option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <button class="btn red-small btn-block">search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
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
                                <div class="tab-pane fade" id="mul-client-logs" role="tabpanel" aria-labelledby="mul-client-logs-tab">
                                    <section class="search-city-bar blogs-search-bar ">
                                       <form method="POST" action="{{ url('search/multi/page/blog') }}">
                                  @csrf

                                            <div class="row justify-content-lg-center justify-content-md-center">
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                          <select class="form-control" name="country_id" onchange="selectcountry()" id="selectCountry">
                                     <?php $countries=\App\Country::all();?>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->country}}</option>
                        @endforeach
                                </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                         <select class="form-control" name="state_id" onchange="selectstate()" id="stateSelect">
                                      <?php $states=\App\State::all();?>
                        @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->state}}</option>
                        @endforeach
                                </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <select class="form-control">
                                                            <option>Male </option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <button class="btn red-small btn-block">search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                    <div class="escorts-grid">
                                        <div class="row">
                                             <?php $blogs2 =\App\Blog::all()->where('status', 2);?>
                                              @foreach($blogs2 as $blog2)
                                            <div class="col-lg-3 col-md-4">
                                                <div class="escort-box">
                                                    <div class="box-img">
                                                        <img src="{{asset('public/uploads/'.$blog2->imageurl)}}" class="w-100" />
                                                    </div>
                                                    <div class="box-content">
                                                       <h3>@if($blog2->publishBy==0) Unknown @else {{\App\User::find($blog2->publishBy)->name}} @endif</h3>
                                                        <h6>{{$blog2->created_at}}</h6>  
                                                        <p>{{$blog2->title}}<a href="{{url('blog/details/'.$blog2->id)}}" class="read-more-link">Read More »</a></p>

                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- Content END -->
@endsection