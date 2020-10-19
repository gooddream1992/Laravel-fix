@extends('masters.frontmaster')
@section('title', __('Terms & Condition'))
@section('main')
<?php
    $counttops =\App\Term::all()->where('status', 2);
    $tops =\App\Term::orderBy('id','desc')->where('status', 2)->first();
    if($counttops->count()<1){
        $toptitle=0;
    }else {
        $toptitle=$tops->title;
    }
    $bottoms =\App\Term::all()->where('status', 1);
    $slidercnt=\App\Slider::all()->where('category', 3);
    
    $slider=\App\Slider::orderBy('id','desc')->where('category', 3)->first();
    if($slidercnt->count()<1) {
        $slider1=0;
        $title=0;
        $description=0;
    } else {
        $slider1=$slider->slider;
        $title=$slider->title;
        $description=$slider->description;
    }
?>
<section class=" innerpage-banner">

            <img src="{{asset('public/uploads/'.$value->imageurl)}}" class="w-100 inner-ban-img" alt="banner image" />
            <div class="container">
              
                <div class="ban-text text-left">
                    <h1>{{ $value->title }}</h1>
                    <a class="btn slider-link btn-line" href="#" role="button">Advertising Rules</a>
                </div>
              

                
            </div>
            
        </section>

        <!-- Content -->
        <div id="content">
            <section class="ask-forum-sec">
                <div class="container">
                    <div class="ask-forum-inner">
                        <h4>{{$toptitle}}</h4>
                        <a href="#" class="btn ask-forum-btn">Ask Our Form</a>
                    </div>
                </div>
            </section> 
            <section class="terms-icons-sec">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                           
                            <div class="mobile-terms-icon m-visible desk-hidden">
                                <div id="multi-item-example" class="carousel slide carousel-multi-item carousel-fade" data-ride="carousel">

                                    <!--Controls-->
                                    <div class="controls-top">
                                        <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                                        <a class="btn-floating right" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                                    </div>
                                    <!--/.Controls-->

                                    <!--Indicators-->
<!--                                    <ol class="carousel-indicators">
                                        <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                                        <li data-target="#multi-item-example" data-slide-to="1"></li>
                                        <li data-target="#multi-item-example" data-slide-to="2"></li>
                                        <li data-target="#multi-item-example" data-slide-to="3"></li>
                                        <li data-target="#multi-item-example" data-slide-to="4"></li>
                                    </ol>-->
                                    <!--/.Indicators-->

                                    <!--Slides-->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-1.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                   <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-2.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-3.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                   <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-4.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-5.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
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