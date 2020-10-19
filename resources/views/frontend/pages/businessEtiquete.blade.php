@extends('masters.frontmaster')

@section('title', __('Business Etiquete'))
@section('main')
<?php
$slidercnt=\App\Slider::all()->where('category', 4);
$sliders=\App\Slider::orderBy('id','desc')->where('category', 4)->first();
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
                <div class="carousel-inner">
                    <div class="carousel-item active" style="background-image: url('{{asset('public/uploads/'.$slider1)}}');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                      
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1>{{$title}}</h1>
                                <p>{!! $description !!}</p>
                                <!--<a class="btn slider-link btn-line" href="#" role="button">Search For Provide</a>-->
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="background-image: url('{{asset('public/uploads/'.$slider2)}}');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                       
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1>{{$title}}</h1>
                                <p>{!! $description !!}</p>
                                <!--<a class="btn slider-link btn-line" href="#" role="button">Search For Provide</a>-->
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="background-image: url('{{asset('public/uploads/'.$slider3)}}');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                      
                        <div class="container">
                            <div class="carousel-caption text-left">
                                  <h1>{{$title}}</h1>
                                <p>{!! $description !!}</p>
                                <!--<a class="btn slider-link btn-line" href="#" role="button">Search For Provide</a>-->
                            </div>
                        </div>
                    </div>
                </div>

<!--                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only"></span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>-->
            </div>
        </section>

        <!-- Content -->
        <div id="content">
            <section class="umbrella-man">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center">
                        
            <?php $business =\App\BusinessEtiquete::all()->where('status', 1);?>
               
              @foreach($business as $data)

                        <div class="col-lg-7 col-md-12  order-lg-2 order-md-1">
                            <div class="inner-text-content">
                                <h2>{{$data->title}}</h2>
                                {!! $data->description !!}
                            </div>
                        </div>
                       
                        <div class="col-lg-5 col-md-12 d-flex align-items-center order-lg-1 order-md-2">
                            <img src="{{asset('public/uploads/'.$data->imageurl)}}" class="img-fluid" />
                        </div>
                         @endforeach
                    </div>
                </div>
            </section>
            <section class="red-tab-sec">
                <ul class="nav nav-pills  nav-pills nav-justified" id="pills-tab" role="tablist">
                    @foreach($business_etiquetes as $key => $value)
                    @if(!empty($value->toggle))
                        @if($key%2==0)
                    <li class="nav-item">
                        <a class="nav-link single active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><span class="sprint-user-icons"></span>{{ $value->toggle }}</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link multiple" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><span class="sprint-user-icons"></span>{{ $value->toggle }}</a>
                    </li>
                    @endif
                    @endif
                    @endforeach
                    <!-- <li class="nav-item">
                        <a class="nav-link multiple" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><span class="sprint-user-icons"></span>Some Title Here</a>
                    </li> -->
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="group-red-box">
                            <div class="container">

                                <?php $business2 =\App\BusinessEtiquete::all()->where('status', 2);?>
               
              @foreach($business2 as $data2)
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="box-title dark c-center">
                                            <h2>{{$data2->title}}</h2>
                                            {{$data2->description}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="row justify-content-center">
                                    <div class="col-lg-10">
                                        <ul class="red-icon-list">

                   <?php $business3 =\App\BusinessEtiquete::all()->where('status', 3);?>
               
                                @foreach($business3 as $data3)
                                            <li>
                                                <div class="icon-box">
                                                    <div class="circle-icon"><img src="{{asset('public/uploads/'.$data3->imageurl)}}" class="img-fluid"/></div>
                                                    <h4>{{$data3->title}}</h4>
                                                </div>
                                            </li>
                                            @endforeach
                                          
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="group-red-box">
                            <div class="container">
                                <div class="row">
           <?php $business4 =\App\BusinessEtiquete::all()->where('status', 4);?>
               
                                @foreach($business4 as $data4)
                                    <div class="col-lg-12">
                                        <div class="box-title dark c-center">
                                             <h2>{{$data4->title}}</h2>
                                            {{$data4->description}}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-10">
                                        <ul class="red-icon-list">

                            <?php $business5 =\App\BusinessEtiquete::all()->where('status', 5);?>
               
                                @foreach($business5 as $data5)
                                            <li>
                                                <div class="icon-box">
                                                    <div class="circle-icon"><img src="{{asset('public/uploads/'.$data5->imageurl)}}" class="img-fluid"/></div>
                                                    <h4>{{$data5->title}}</h4>
                                                </div>
                                            </li>
                                          @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

              <?php $business6 =\App\BusinessEtiquete::all()->where('status', 6);?>
               
                                @foreach($business6 as $data6)
            <section class="know-the-rules row-am">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center">
                        <div class="col-lg-6 col-md-12  d-flex align-items-center">
                            <img src="{{asset('public/uploads/'.$data6->imageurl)}}" class="img-fluid" />
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="inner-text-content">
                                <h2>{{$data6->title}}</h2>

                                <ul class="rules-list">
           <?php $businesslist1 =\App\BusinessQuestionEtiquete::all()->where('status', 1);?>
             
              @foreach($businesslist1 as $list1)

                                    <li>{!! $list1->description !!}</li>
                                   @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
            <!-- Section 3 -->



            <section class="zigzag-red-sec">
                <div class="container-fluid">

                     <?php $business7 =\App\BusinessEtiquete::all()->where('status', 7);?>
               
                                @foreach($business7 as $data7)
                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-12 ">
                            <img src="{{asset('public/uploads/'.$data7->imageurl)}}" class="zigzag-red-img" />
                        </div>
                        <div class="col-lg-6 col-md-12 red-bg">
                            <div class="zigzag-red-box text-white">
                                <h3>{{$data7->title}}</h3>
                                {!! $data7->description !!}
                            </div>
                        </div>
                    </div>
                    @endforeach

                     <?php $business8 =\App\BusinessEtiquete::all()->where('status', 8);?>
               
                                @foreach($business8 as $data8)
                    <div class="row mb-3">
                       
                        <div class="col-lg-6 col-md-12 order-lg-2 ">
                            <img src="{{asset('public/uploads/'.$data8->imageurl)}}" class="zigzag-red-img" />
                        </div>
                         <div class="col-lg-6 col-md-12  order-lg-1 red-bg">
                            <div class="zigzag-red-box text-white">
                                <h3>{{$data8->title}}</h3>
                                {!! $data8->description !!}
                            </div>
                        </div>
                    </div>
                    @endforeach

                      <?php $business9 =\App\BusinessEtiquete::all()->where('status', 9);?>
               
                                @foreach($business9 as $data9)
                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-12 ">
                            <img src="{{asset('public/uploads/'.$data9->imageurl)}}" class="zigzag-red-img" />
                        </div>
                        <div class="col-lg-6 col-md-12 red-bg">
                            <div class="zigzag-red-box text-white">
                               <h3>{{$data9->title}}</h3>
                                <!-- <ul class="rules-list"> -->
                                    <?php $businesslist2 =\App\BusinessQuestionEtiquete::all()->where('status', 2);?>
                                    @foreach($businesslist2 as $list2)
                                        <?php echo $list2->description; ?>
                                    @endforeach
                                <!-- </ul> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            <section class="grid-box-sec dark">
                <div class="container">
                    <div class="row">
                          <?php $business10 =\App\BusinessEtiquete::all()->where('status', 10);?>
               
                                @foreach($business10 as $data10)

                        <div class="col-lg-4 col-md-4 d-flex align-items-center">
                            <div class="sec-side-title dark">
                                @if(!empty($data10->toggle))
                                <div class="red-label-text"><span>{{ $data10->toggle }}</span></div>
                                @endif
                                <h2 class="inner-sec-title">{{$data10->title}}</h2>
                                {!! $data10->description !!}
                            </div>
                        </div>
                        @endforeach

                          <?php $business11 =\App\BusinessEtiquete::all()->where('status', 11);?>
               
                                @foreach($business11 as $data11)
                        <div class="col-lg-4 col-md-4">
                            <div class="card-box red-bg">
                                <img src="{{asset('public/uploads/'.$data11->imageurl)}}" />  
                                <h4>{{$data11->title}}</h4>
                               {!! $data11->description !!}
                            </div>
                        </div>
                        @endforeach
                          <?php $business12 =\App\BusinessEtiquete::all()->where('status', 12);?>
               
                                @foreach($business12 as $data12)
                        <div class="col-lg-4 col-md-4 ">
                            <div class="card-box black-bg">
                                <img src="{{asset('public/uploads/'.$data12->imageurl)}}" />
                                <h4>{{$data12->title}}</h4>
                               {!! $data12->description !!}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>


        </div>
        <!-- Content END -->
@endsection