@extends('masters.frontmaster')

@section('title', __('Purchase Marketing'))
@section('main')

  <?php $marketings1 =\App\PurchaseMarketing::all()->where('status', 1);?>
                 <?php $i=1;?>
              @foreach($marketings1 as $market1)

     <!-- Header END -->
        <section class=" innerpage-banner">
            <img src="{{asset('public/uploads/'.$market1->imageurl)}}" class="w-100 inner-ban-img" alt="banner image" />
            <div class="container">
                <div class="ban-text c-center">
                    <h1>{{$market1->title}}</h1>
                    <p>{!! $market1->description !!}</p>
                </div>
            </div>
        </section>
        @endforeach
        <!-- Content -->
        <div id="content">
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

             <?php $marketings2 =\App\PurchaseMarketing::all()->where('status', 2);?>
              @foreach($marketings2 as $market2)

            <section class="dark-zig-zag-sec"  style="background-image: url('{{asset('public/uploads/'.$market2->imageurl)}}');">
                <div class="container">
                    <div class="zigzag-red-sec">
                        <div class="container-fluid">

                        	<?php
                            /*$marketings3 =\App\PurchaseMarketing::all()->where('status', 3);*/
                            ?>
                            @foreach($data as $key => $market3)

                            @if($key%2==0)
                            <?php $out = strlen($market3->description) > 450 ? substr($market3->description,0,450)."..." : $market3->description; ?> 
                            <div class="row">
                                <div class="col-lg-6 col-md-12 ">
                                    <img src="{{asset('public/purchasemarketing/'.$market3->image)}}" class="zigzag-red-img">
                                </div>
                                <div class="col-lg-6 col-md-12 dark-gray-bg">
                                    <div class="zigzag-red-box">
                                        <h3 style="color: white;">{{$market3->title}}</h3>
                                        <p style="color: white;">{{ $out }}</p>
                                        <a href="{{ route('readmore_purchase',$market3->id) }}" class="btn read-more-btn">read more</a>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-lg-6 col-md-12 order-lg-2 ">
                                    <img src="{{asset('public/purchasemarketing/'.$market3->image)}}" class="zigzag-red-img">
                                </div>
                                <div class="col-lg-6 col-md-12  order-lg-1 black-bg">
                                    <div class="zigzag-red-box">
                                       <h3 style="color: white;">{{$market3->title}}</h3>
                                        <p style="color: white;">{{ $out }}</p>
                                       <a href="{{ route('readmore_purchase',$market3->id) }}" class="btn read-more-btn">read more</a>
                                    </div>
                                </div>
                            </div>
                           @endif
                            
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
            <?php $tops =\App\Faq::all()->where('status', 1);?>
              @foreach($tops as $top)
            <section class="row-am title-video-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 d-flex align-items-center">
                            <div class="sec-side-title">
                                <div class="red-label-text"><span>Lorem Ipsum</span></div>
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
            <section class="inner-contact row-am">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            <div class="box-title c-center dark">
                                <h2>Contact Us</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem
                                    Ipsum has been the industrys standard dummy text ever since the</p>
                            </div>
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
            <section class="payment-method-sec row-am">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="box-title c-center">
                                <h2 class="mb-0">Please select Payment method</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <ul class="payment-method-list">
                                <li class="paymen-btn-box">
                                    <a href="#" class="btn payment-method-btn"><h3>Paypal</h3> <img src="{{asset('public/images/paypal-logo.png')}}" /></a>
                                </li>
                                <li class="paymen-btn-box">
                                    <a href="#" class="btn payment-method-btn"><h3>Credit Card</h3> <img src="{{asset('public/images/credit-card-icon.png')}}" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Content END -->
@endsection