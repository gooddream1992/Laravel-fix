@extends('masters.frontmaster')

@section('title', __('Faq'))
@section('main')
<?php
$slidercnt=\App\Slider::all()->where('category', 6);
$sliders=\App\Slider::orderBy('id','desc')->where('category', 6)->first();
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

<section class=" innerpage-banner">
            <img src="{{asset('public/uploads/'.$slider1)}}" class="w-100 inner-ban-img" alt="banner image" />
            <div class="container">
                <div class="ban-text">
                    <h1>{{$title}}</h1>
                   <p>{!! $description !!}</p>
                </div>
            </div>
        </section>

        <!-- Content -->
        <div id="content">

             <?php $tops =\App\Faq::all()->where('status', 1);?>
              @foreach($tops as $top)
            <section class="row-am title-video-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 d-flex align-items-center">
                            <div class="sec-side-title">
                                <!--<div class="red-label-text"><span>Lorem Ipsum</span></div>-->
                                <h2 class="inner-sec-title">{{$top->title}} </h2>
                               {!! $top->description !!}
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="sec-video-box">
                                <img src="{{asset('public/uploads/'.$top->imageurl)}}" class="w-100" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
            <section class="faq-questions row-am">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 d-flex align-items-center">
                            <div id="accordion" class="w-100">
              <?php $leftfaqs =\App\FaqQuestion::all()->where('status', 1);?>
                         @foreach($leftfaqs as $key => $leftfaq)

                                <div class="card">
                                    <div class="card-header" id="heading{{$key}}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                                                <span>{!! $leftfaq->question!!}</span>  <span class="sprint-expand"></span>
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapse{{$key}}" class="collapse" aria-labelledby="heading{{$key}}" data-parent="#accordion">
                                        <div class="card-body">
                                            {!! $leftfaq->answer!!}
                                        </div>
                                    </div>
                                </div>
                           @endforeach

                               
                            </div>
                        </div>

                          <?php $bottoms =\App\Faq::all()->where('status', 2);?>
              @foreach($bottoms as $bottom)
                        <div class="col-lg-4  d-flex align-items-center mt-4 mb-4">
                            <div class="faq-middle-box">
                                <div class="middle-box-head">
                                    <h3>{{$bottom->title}}</h3>
                                </div>
                                <div class="middle-box-body">
                                    {!! $bottom->description !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-4 d-flex align-items-center">
                            <div id="accordion2" class="w-100">

                                  <?php $rightfaqs =\App\FaqQuestion::all()->where('status', 2);?>
                         @foreach($rightfaqs as $new_key => $rightfaq)
                                <div class="card">
                                    <div class="card-header" id="heading{{$new_key}}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$new_key}}" aria-expanded="true" aria-controls="collapse{{$new_key}}">
                                                <span>{!! $rightfaq->question !!}</span>  <span class="sprint-expand"></span>
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapse{{$new_key}}" class="collapse" aria-labelledby="heading{{$new_key}}" data-parent="#accordion2">
                                        <div class="card-body">
                                            {!! $rightfaq->answer !!}
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                




                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="inner-contact row-am">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            <?php $contacts =\App\Faq::all()->where('status', 3);?>
                         @foreach($contacts as $contact)
                            <div class="box-title c-center dark">
                                  <h2>{{$contact->title}} </h2>
                               {!! $contact->description !!}
                              
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <form class="mt-2">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Full Name"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone Number" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email Address"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <div class="g-recaptcha"  data-sitekey="6LeHcKYUAAAAAKAOAhKFpG744AX86JmzV58K6d6n"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="submit" value="submit now" class="btn form-submit right">
                                </div>
                            </div>
                        </div> 
                    </form>
                </div>
            </section>

        </div>
        <!-- Content END -->
@endsection