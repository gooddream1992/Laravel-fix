@extends('masters.frontmaster')

@section('title', __('Sex Trafficking'))
@section('main')

<style type="text/css">
	.col-lg-8{
        max-width:100% !important;

    }
    a{
        color: white !important;
    }
</style>
   <?php $sxtraffics1 =\App\SexTrafficking::all()->where('status', 1); ?>
              @foreach($sxtraffics1 as $trafic1)

<section class=" innerpage-banner">
            <img src="{{asset('public/uploads/'.$trafic1->imageurl)}}" class="w-100 inner-ban-img" alt="banner image" />
            <div class="container">
                <div class="ban-text text-left">
                    <h1>{{$trafic1->title}} <br>    
                        <span class="text-red">{{ $trafic1->red_title }}</span>
                    </h1>
                    <p>{!! $trafic1->description !!}</p>
                    <a class="btn slider-link btn-line" href="#" role="button">Donate Here</a>
                    <!-- <a class="btn slider-link btn-line" href="#" role="button">Donate Here</a> -->
                </div>
            </div>
        </section>
        @endforeach

        <!-- Content -->
        <div id="content">
            <section class="stop-sex-traffic-sec row-am">
                <div class="container">
                	<?php $sxtraffics2 =\App\SexTrafficking::all()->where('status', 2); ?>
              @foreach($sxtraffics2 as $trafic2)
                    <div class="row justify-content-center c-center">
                        <div class="col-lg-12">
                            <div class="large-title box-title">
                                <h2>{{$trafic2->title}}</h2>
                                <p>{!! $trafic2->description !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
                    	<?php $sxtraffics3 =\App\SexTrafficking::all()->where('status', 3); ?>
              @foreach($sxtraffics3 as $trafic3)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="sex-traffic-box c-center">
                                <img src="{{asset('public/uploads/'.$trafic3->imageurl)}}" />
                                <h4>{{$trafic3->title}}</h4>
                               {!! $trafic3->description !!}dsadsa
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="get-body-sec row-am red-bg">
                <div class="container">
                	<?php $sxtraffics4 =\App\SexTrafficking::all()->where('status', 4); ?>
              @foreach($sxtraffics4 as $trafic4)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="large-title box-title dark c-center">
                                <h2>{{$trafic4->title}}</h2>
                               {!! $trafic4->description !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="row justify-content-center mt-4 body-box-grid">
                    	<?php $sxtraffics5 =\App\SexTrafficking::all()->where('status', 5); ?>
              @foreach($sxtraffics5 as $trafic5)
                        <div class="col-lg-4 ">
                            <div class="img-box">
                                <img src="{{asset('public/uploads/'.$trafic5->imageurl)}}" class="body-img img-fluid" />
                            </div>
                        </div>
                       @endforeach
                    </div>
                </div>
            </section>
            <?php $sxtraffics6 =\App\SexTrafficking::all()->where('status', 6); ?>
              @foreach($sxtraffics6 as $trafic6)
            <section class="click-to-donate-sec row-am"  style="background-image: url('{{asset('public/uploads/'.$trafic6->imageurl)}}');">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="box-title dark c-center mb-0">
                                <h2>{{$trafic6->title}} <span style="color: red;">{{ $trafic6->red_title }}</span></h2>
                                <a class="btn slider-link btn-line" href="#" role="button">Click here to donate</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
             @endforeach
              @foreach($sxtraffics6 as $trafic6)
            <section class="testimonial-quote">
                <div class="container">
                    <div class="row justify-content-center c-center">
                        <div class="col-lg-10">
                            <div class="testimonial-quote-box">
                                {!!$trafic6->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
            <?php $sxtraffics7 =\App\SexTrafficking::all()->where('status', 7); ?>
              @foreach($sxtraffics7 as $trafic7)
            <div class="get-lerner-sec row-am"  style="background-image: url('{{asset('public/uploads/'.$trafic7->imageurl)}}');">
                <div class="container">
                	
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="large-title box-title dark c-center mb-6">
                                <h2>{{$trafic7->title}} </h2>
                              
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @foreach($sxtraffics7 as $trafic7)
                    <div class="row">
                    	<?php $sxtraffics8 =\App\SexTrafficking::all()->where('status', 8); ?>
              
                        <div class="col-lg-4 c-center">
                        	@foreach($sxtraffics8 as $trafic8)
                            <img src="{{asset('public/uploads/'.$trafic8->imageurl)}}" class="img-fluid" />
                             @endforeach
                        </div>
                       
                        <div class="col-lg-8">
                            <div class="get-lerner-content text-white">
                                {!!$trafic7->description!!}
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
              @endforeach
            <div class="get-lerner-white row-am">
                <div class="container">
                	<?php $sxtraffics9 =\App\SexTrafficking::all()->where('status', 9); ?>
              @foreach($sxtraffics9 as $trafic9)
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="large-title box-title c-center mb-6">
                                <h2>{{$trafic9->title}}</h2>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                     
                    <div class="row">
                    	
                        <div class="col-lg-4 order-lg-2 c-center">
                        	@foreach($sxtraffics9 as $trafic9)
                            <img src="{{asset('public/uploads/'.$trafic9->imageurl)}}" class="img-fluid" />
                             @endforeach
                        </div>
                       
                        
                        <div class="col-lg-8 order-lg-1">
                            <div class="get-lerner-content">
                            	@foreach($sxtraffics9 as $trafic9)
                               {!!$trafic9->description !!}
                               @endforeach
                            </div>
                        </div>
                        
                    </div>


                    
                </div>
            </div>
        </div>
        <!-- Content END -->
@endsection