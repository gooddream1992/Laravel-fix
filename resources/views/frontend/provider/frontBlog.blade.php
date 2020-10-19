@extends('masters.frontmaster')

@section('title', __('Blog'))
@section('main')

  <?php 
  $blogs=\App\Blog::orderBy('id', 'desc')->where('status', 1)->first();

   $slider=$blogs->imageurl;
   $title=$blogs->title;

  ?>
          
 <section class=" innerpage-banner">
            <img src="{{asset('public/uploads/'.$slider)}}" class="w-100 inner-ban-img" alt="banner image" />
            <div class="container">
                <div class="ban-text text-content">
                    <h1>{{$title}}</h1>
                </div>
            </div>
        </section>
  
        <!-- Content -->
        <div id="content">
            <section class="search-city-bar blogs-search-bar mb-0 mt-0 b-r-0 ">
                <div class="container">
                    <form method="POST" action="{{ url('search/blog') }}">
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
                </div>
            </section>
            <section class="profile-blogs row-am">
                <div class="container">
                    <div class="row">
                         <?php $blogs2 =\App\Blog::all()->where('status', 2);?>
          @foreach($blogs2 as $blog2)
                        <div class="col-lg-4 col-md-6">
                            <div class="my-blog-box">
                                <div class="blog-img">
                                    <img src="{{asset('public/uploads/'.$blog2->imageurl)}}" class="w-100" alt="blog-img"/>
                                </div>
                                <div class="blog-overview">
                                    <p class="post-date">{{$blog2->created_at}}</p>
                                    <h5>{{$blog2->title}}</h5>
                                    <a href="{{url('blog/details/'.$blog2->id)}}" class="read-fblog">read full blog »</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <ul class="pagination paginationC">
                                <li><a href="#" class="previous"><i class="fas fa-chevron-left"></i></a></li>
                                <li><a href="#" class="active">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#" class="next"><i class="fas fa-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- Content END -->
@endsection