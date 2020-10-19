@extends('masters.frontmaster')

@section('title', __('Client Membership'))
@section('main')
<?php
$slidercnt=\App\Slider::all()->where('category', 7);
$sliders=\App\Slider::orderBy('id','desc')->where('category', 7)->first();
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
                <div class="ban-text text-left">
                     <h1>{{$title}}</h1>
                   {!! $description !!}<br><br>
                    <!--<a class="btn slider-link btn-line" href="#" role="button">search for provide</a>-->
                </div>
            </div>
        </section>

        <!-- Content -->
        <div id="content">
            <section class="large-video-sec ">
                <div class="container-fluid">


                     <?php $crelations1 =\App\ClientRelationship::all()->where('status', 1);?>
              @foreach($crelations1 as $relation1)
                    <div class="row ">
                        
                        <div class="col-lg-6 col-md-12 p-0 order-lg-1 order-md-2 order-2">
                            <img src="{{asset('public/uploads/'.$relation1->imageurl)}}" class="w-100" />
                        </div>
                        <div class="col-lg-6 col-md-12 p-0   d-flex align-items-center order-lg-2 order-md-1 order-1">
                            <div class="inner-text-content">
                                <h2>{{$relation1->title}}</h2>
                                <div class="simplebar"  id="myElement">
                                    {!! $relation1->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                </div> 
            </section>
            <section class="red-tab-sec">
                
                    <div class="container">

                         <?php $crelations2 =\App\ClientRelationship::all()->where('status', 2);?>
              @foreach($crelations2 as $relation2)
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="box-title dark c-center">
                                    <h2>{{$relation2->title}}</h2>
                                    {!! $relation2->description !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                

            </section>

             <?php $crelations3 =\App\ClientRelationship::all()->where('status', 3);?>
              @foreach($crelations3 as $relation3)

            <section class="left-img-text-content gym-guy" style="background-image: url('{{asset('public/uploads/'.$relation3->imageurl)}}'); background-size:cover;background-position: center;">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center">

                        <div class="col-lg-8 col-md-12 d-flex align-items-center order-lg-2 order-md-1">
                            <div class="inner-text-content text-white">
                                <h2>{{$relation3->title}}</h2>
                                {!!$relation3->description !!}
                                <button class="btn red-small">Read More</button>

                            </div>
                        </div>
                        <?php $crelations4 =\App\ClientRelationship::all()->where('status', 4);?>
              @foreach($crelations4 as $relation4)
                        <div class="col-lg-4 col-md-12  order-lg-1 order-md-2">
                            <img src="{{asset('public/uploads/'.$relation4->imageurl)}}" class="img-fluid" />
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @endforeach

            {{-- SMPEDIT 15-10-2020 --}}
            <section class="red-tab-sec">
                <div class="group-red-box">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="box-title dark c-center">
                                    <h2>What do you want to Ensure ?</h2>
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <ul class="red-icon-list">
                                    <li>
                                        <div class="icon-box">
                                            <div class="circle-icon"><img src="{{ asset('public/images/red-circle-icon-1.png') }}" class="img-fluid"/></div>
                                            <h4>Some Title Here</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon-box">
                                            <div class="circle-icon"><img src="{{ asset('public/images/red-circle-icon-2.png') }}" class="img-fluid"/></div>
                                            <h4>Some Title Here</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon-box">
                                            <div class="circle-icon"><img src="{{ asset('public/images/red-circle-icon-3.png') }}" class="img-fluid"/></div>
                                            <h4>Some Title Here</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon-box">
                                            <div class="circle-icon"><img src="{{ asset('public/images/red-circle-icon-4.png') }}" class="img-fluid"/></div>
                                            <h4>Some Title Here</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon-box">
                                            <div class="circle-icon"><img src="{{ asset('public/images/red-circle-icon-5.png') }}" class="img-fluid"/></div>
                                            <h4>Some Title Here</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon-box">
                                            <div class="circle-icon"><img src="{{ asset('public/images/red-circle-icon-6.png') }}" class="img-fluid"/></div>
                                            <h4>Some Title Here</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- / SMPEDIT 15-10-2020 END --}}


             <?php $crelations5 =\App\ClientRelationship::all()->where('status', 5);?>
              @foreach($crelations5 as $relation5)
            <section class="left-img-text-content">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center">

                        <div class="col-lg-8 col-md-12 d-flex align-items-center ">
                            <div class="inner-text-content ">
                              <h2>{{$relation5->title}}</h2>
                                {!!$relation5->description !!}
                                <button class="btn red-small">Read More</button>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12  ">
                            <img src="{{asset('public/uploads/'.$relation5->imageurl)}}" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </section>
            @endforeach

            <?php $crelations6 =\App\ClientRelationship::all()->where('status', 6);?>
              @foreach($crelations6 as $relation6)
            <section class="resources-ban-sec" style="background-image: url('{{asset('public/uploads/'.$relation6->imageurl)}}'); background-size:cover;background-position: center;">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-11 c">
                            <div class="large-title box-title dark c-center">
                                <h2>{{$relation6->title}}</h2>
                                {!! $relation6->description !!}
                            </div>
                        </div> 
                    </div>
                </div>
            </section>
            @endforeach

            {{-- SMPEDIT 15-10-2020 --}}
            <section class="know-the-rules row-am">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center">
                        <div class="col-lg-6 col-md-12  d-flex align-items-center">
                            <img src="{{ asset('public/images/know-rules.jpg') }}" class="img-fluid" />
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="inner-text-content">
                                <h2>Follow Rules</h2>
                                <ul class="rules-list">
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</li>
                                    <li>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </li>
                                    <li>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</li>
                                    <li>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </li>
                                    <li>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- SMPEDIT 15-10-2020 END --}}

             <?php $crelations7 =\App\ClientRelationship::all()->where('status', 7);?>
              @foreach($crelations7 as $relation7)
            <section class="terms-agree-ban-sec" style="background-image: url('{{asset('public/uploads/'.$relation7->imageurl)}}');">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 c">
                            <div class="large-title box-title dark c-center">
                                <h2>{{$relation7->title}}</h2>
                               {!! $relation7->description !!}<br><br>
                               <a href="{{url('client/signup')}}" class="btn red-small mt-3">I agree</a>
                                <!-- <button class="btn red-small mt-3">I agree</button> -->
                            </div>
                        </div> 
                    </div>
                </div>
            </section>
            @endforeach
        </div>
        <!-- Content END -->
@endsection