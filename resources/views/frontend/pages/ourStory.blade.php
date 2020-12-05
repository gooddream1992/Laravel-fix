@extends('masters.frontmaster')

@section('title', __('Our Story'))
@section('main')

<?php
$slidercnt=\App\Slider::all()->where('category', 5);
$sliders=\App\Slider::orderBy('id','desc')->where('category', 5)->first();
if($slidercnt->count()<1){
$slider1=0;
$slider2=0;
$slider3=0;
$title=0;
$description=0;
}else{
$slider1=$sliders->slider;
$slider2=$sliders->slider1;
$slider3=$sliders->slider2;
$title=$sliders->title;
$description=$sliders->description;  }
?>

 <section class="inner-page-slider">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner right-content">
                    <div class="carousel-item active"  style="background-image: url('{{asset('public/uploads/'.$slider1)}}');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                        <!--<img class="first-slide" src="images/our-story-slide-1.jpg" alt="First slide">-->
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1>{{$title}}</h1>
                                <p>{!! $description!!}</p>
                                <!-- <a class="btn slider-solid-red-btn" href="#" role="button">Explore</a>
                                <a class="btn slider-solid-black-btn" href="#" role="button">Buy Now</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="second-slide" style="background-image: url('{{asset('public/uploads/'.$slider2)}}');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                        <div class="container">
                            <div class="carousel-caption text-left">
                               <h1>{{$title}}</h1>
                                <p>{!! $description!!}</p>
                                <!-- <a class="btn slider-solid-red-btn" href="#" role="button">Explore</a>
                                <a class="btn slider-solid-black-btn" href="#" role="button">Buy Now</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="background-image: url('{{asset('public/uploads/'.$slider3)}}');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                        <!--<img class="third-slide" src="images/our-story-slide-1.jpg" alt="Third slide">-->
                        <div class="container">
                            <div class="carousel-caption text-left">
                               <h1>{{$title}}</h1>
                                <p>{!! $description!!}</p>
                                <!-- <a class="btn slider-solid-red-btn" href="#" role="button">Explore</a>
                                <a class="btn slider-solid-black-btn" href="#" role="button">Buy Now</a> -->
                            </div>
                        </div>
                    </div>
                </div>

               <!--  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only"></span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a> -->
            </div>
        </section>

        <!-- Content -->
        <div id="content">

             <section class="grid-box-sec dark">
                <div class="container">
                    <div class="row">
                        <?php $stories4 =\App\OurStory::all()->where('status', 4);?>
                        @foreach($stories4 as $story4)
                        <div class="col-lg-4 col-md-4 d-flex align-items-center">
                            <div class="sec-side-title dark">
                                <div class="red-label-text"><span>{{ $story4->lable }}</span></div>
                                <h2 class="inner-sec-title">{{ $story4->title }} </h2>
                                <p>{{ $story4->description }}</p>
                            </div>
                        </div>
                        @endforeach
                        <?php $stories5 =\App\OurStory::all()->where('status', 5);?>
                        @foreach($stories5 as $story5)
                        <div class="col-lg-4 col-md-4">
                            <div class="card-box red-bg">
                                <img src="{{ asset('public/uploads/'.$story5->imageurl) }}" />  
                                <h4>{{ $story5->title }} </h4>
                                <p>{{ $story5->description }}</p>
                            </div>
                        </div>
                        @endforeach
                        <?php $stories6 =\App\OurStory::all()->where('status', 6); ?>
                        @foreach($stories6 as $story6)
                        <div class="col-lg-4 col-md-4 ">
                            <div class="card-box black-bg">
                                <img src="{{ asset('public/uploads/'.$story6->imageurl) }}" />
                                <h4>{{ $story6->title }} </h4>
                                <p>{{ $story6->description }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            
            <section class="join-commuunity-sec">
                <div class="container">

                     <?php $stories1 =\App\OurStory::all()->where('status', 1);?>
              @foreach($stories1 as $story1)
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="join-commuunity-video-box video-box mb-4">
                                <img src="{{asset('public/uploads/'.$story1->imageurl)}}" class="w-100" />
                                <!-- <a href="" class="play-btn"><img src="{{asset('public/images/video-play-icon.png')}}" /></a> -->
                            </div>
                            <!-- <a href="#" class="btn join-commuunity-btn">Join Our Community</a> -->
                        </div>
                        <div class="col-lg-6">
                            <div class="sec-side-title join-commuunity-content">
                                <div class="red-label-text"><span>{{ $story1->lable }}</span></div>
                                <h3 class="">{{$story1->title}}</h3>
                                {!! $story1->description !!}
                           
                                <div class="author">
                                    <!-- <img src="{{asset('public/images/signature.png')}}" class="img-fluid"/> -->
                                    <h5>{{ $story1->signature }} <span>- {{ $story1->designation }}</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </section>
            <?php $stories2 =\App\OurStory::all()->where('status', 2);?>
              @foreach($stories2 as $story2)

            <section class="get-body-sec row-am black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="get-body-inner">
                                <div class="large-title box-title dark c-center">
                                   <h2>{{$story2->title}}</h2>
                                <p>{!! $story2->description !!}</p>
                           
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
            <section class="redbox-icon-sec">
                <div class="container">
                    <div class="row">
                        <?php $stories3 =\App\OurStory::all()->where('status', 3);?>
              @foreach($stories3 as $story3)
                        <div class="col-lg-3 c-center">
                            <div class="red-bg-box">
                                <img src="{{asset('public/uploads/'.$story3->imageurl)}}" class="img-fluid" />
                                <a href="#" class="btn box-line-btn">{{$story3->title}}</a>
                            </div>
                           
                            <p class="mb-4"> {!! $story3->description !!}</p>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </section>
        </div>
        <!-- Content END -->
@endsection