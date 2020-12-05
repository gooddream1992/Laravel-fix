@extends('masters.frontmaster')

@section('title', __('Profile'))
@section('main')

<style type="text/css">

    .profile-container {
        margin: 0px -0.5em;
    }
    .wmark{
        position: absolute;
        top:50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
/*    button{
        font-size: small !important;
    }*/
    .wmark{
        opacity: 30%;
    }

    .custom-ul-class li:before
    {
        background: none !important;
    }


    .item {
  border-radius: 5px;
  padding: 0.5em;
  /* margin: 0 auto 1em auto; */
  overflow: hidden;
  z-index: 1;
  text-decoration: none;
  transition: all 120ms ease;
}
.item h3 {
  color: #000;
}
.item p {
  color: #5b5b5b;
}
.item:before {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #f9f9f9;
  z-index: -1;
  transform: scale(0);
  opacity: 0;
  transition: all 100ms ease;
}
.item:hover {
  opacity: 0.75;
}
.item:hover::before {
  transform: scale(1);
  opacity: 1;
}
.item img {
  width: 100%;
  height: auto;
  display: block;
}

.grid-sizer, .item {
  width: 33%;
}

@media screen and (max-width: 750px) {
  .grid-sizer, .item {
    width: 45%;
  }
}
@media screen and (max-width: 500px) {
  grid-sizer, .item {
    width: 90%;
  }
}

button{background-color: white;
      width:100%;
      color: black;
      border:none;
      font-weight: bold;}
button:hover{background-color: red;
      width:100%;
      color: white;
      border:none;
      font-weight: bold;}
  /*.flw{margin-left: -18px;margin-top: -1px;}*/
    #cross-x {
        color: red;
        padding-right: 27px;
    }

    /* SMPEDIT 15-10-2020 */
    /* .custom-btn-link > a {
        width: 100%;
        text-decoration: none !important;
        font-size: 1.2rem !important;
        font-weight: 500 !important;
        color: white !important;
        border-radius: 5px !important;
    } */
    /* SMPEDIT 15-10-2020 END */
</style>
<?php $escorts= \App\User::all()->where('id', $id);?>


@foreach($escorts as $escort)
<section class="profile-slider">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div id="profileCarousel" class="carousel slide carousel-fade" data-ride="carousel">

<?php $pfsliders= \App\ProfileImage::all()->where('escortId', $id)->where('status', 1); 
$pfsliders1= \App\ProfileImage::orderBy('id', 'desc')->where('escortId', $id)->where('status', 1)->first(); 
if($pfsliders->count()<1){
$slider1=0;
}else{
    $slider1=$pfsliders1->image;
}


?>
                            <div class="carousel-inner" style="text-align: center;">
                                @php
                                    $pflinetours = \App\ProfileTour::where([
                                        ['escortId', $id],
                                        ['endDate','>=',date('Y-m-d')],
                                        ['status', 1]
                                        ])
                                    ->select()
                                    ->orderBy('startDate','ASC')
                                    ->first();
                                    $city = isset($pflinetours->city) ? $pflinetours->city : '';
                                        $toursCity = \App\State::where('id', $city)
                                        ->select('*')
                                        ->first();
                                        $p_start  = $pflinetours->startDate ?? '';
                                        $p_start_date = date_create($p_start);
                                        $p_starts_date = date_format($p_start_date,"d");

                                        $p_starting_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                        if (($p_starts_date %100) >= 11 && ($p_starts_date%100) <= 13) {
                                           $p_abbreviation = $p_starts_date. 'th';
                                        } else {
                                           $p_abbreviation = $p_starts_date. $p_starting_date[$p_starts_date % 10];
                                        }

                                        $p_end = $pflinetours->endDate ?? '';
                                        $p_end_date = date_create($p_end);
                                        $p_ends_date = date_format($p_end_date,"d");

                                        $p_ending_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                        if (($p_ends_date %100) >= 11 && ($p_ends_date%100) <= 13) {
                                           $p_abbreviations = $p_ends_date. 'th';
                                        } else {
                                           $p_abbreviations = $p_ends_date. $p_ending_date[$p_ends_date % 10];
                                        }
                                    @endphp
                                    @if (isset($toursCity->state) && $toursCity->state!='')
                                    <div class="slider-over-content">
                                        Touring {{ $toursCity->state }}
                                        {{ $p_abbreviation }} {{ date_format($p_start_date,"M") }}
                                        -
                                        {{ $p_abbreviations }} {{ date_format($p_end_date,"M") }}                                            
                                    </div>
                                    @endif
                                    
                               @if($pfsliders->count()<1)

                                <div class="carousel-item active">
                                  <h1> Have not Uploaded any Slider</h1>
                                </div>
                               @else
                                <div style="background: black" class="carousel-item active"> 
                                    <img class="first-slide" src="{{asset('public/uploads/'.$slider1)}}" alt="First slide">
                                </div>
                                
                                @foreach($pfsliders as $slider)

                                <div style="background: black" class="carousel-item">
                                    <img class="second-slide" src="{{asset('public/uploads/'.$slider->image)}}" alt="Second slide">
                                    
                                </div>
                                @endforeach
                                @foreach($pfsliders as $slider)
                                <div style="background: black" class="carousel-item">
                                    <img class="third-slide" src="{{asset('public/uploads/'.$slider->image)}}" alt="Third slide">
                                </div>
                                @endforeach
                               @endif
                            </div>
                            <a class="carousel-control-prev" href="#profileCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#profileCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 my-profile-overview">
                        <div class="my-profile-content">
                            <h2>{{$escort->name}}
                                @if ($escort->type_IA)
                                   {{ ($escort->type_IA == 1) ? 'Independent' : 'Agency' }}
                                @endif
                            </h2>
                            {{-- SMPEDIT 15-10-2020 --}}
                            @php
                                if($escort->state!='')
                                {
                                    $city_name_esc = DB::table('states')->where('id',$escort->state)->get();
                                }
                            @endphp
                            <h5>@if(isset($city_name_esc[0])) {{ $city_name_esc[0] ? $city_name_esc[0]->state : 'Not Found' }} @endif</h5>
                            <!-- <h2>
                                @if ($escort->type_IA)
                                    {{ ($escort->type_IA == 1) ? 'Independent' : 'Agency' }}
                                @endif
                            </h2> -->
                            {{-- / SMPEDIT 15-10-2020 END --}}
                            <!--<label class="profession-label">Professional Escort</label>-->
                            {{-- <div class="clearfix">
                                <div class="left">
                                    <div class="photos-verified">
                                        <h4>Photo verified</h4>
                                        <p>The Trusted Site</p>
                                    </div>
                                </div>
                            </div> --}}
                            @if($escort->activation==1)
                               <label class="availability-label">Available Right Now</label>
                            @endif
                            {{-- SMPEDIT 15-10-2020 --}}
                            <div class="custom-btn-link">
                                <a href="{{ url('/business/etiquete') }}" class="btn btn-dark">READ BEFORE CONTACTING</a>
                            </div>
                            {{-- / SMPEDIT 15-10-2020 END --}}
                            <a href="tel:{{$escort->phone}}" class="profile-call m-hidden"><img src="{{asset('public/images/prodile-mobile-icon.png')}}" /> Call Me: {{$escort->phone}}</a>
                            <ul class="mob-contact-btns desk-hidden m-visible">
                                <li>
                                    <a href="tel:123 456 7890" ><i class="fas fa-phone-volume"></i> Call</a>
                                </li>
                                <li>
                                    <a href="#" ><i class="fas fa-comments"></i> SMS</a>
                                </li>
                            </ul>

                            <div class="social-media-connect">
                                <h4>On Social:</h4>
                                <ul>
                                    @foreach($social_media as $value)
                                        @if($escort->sm_label_one == $value->socail_media_url)
                                    <li class="whatsapp-box">
                                        
                                        <a href="@if($escort->sm_label_one == "whatsapp") https://api.whatsapp.com/send?phone={{$escort->snapchat}} @else {!! $escort->snapchat !!} @endif" target="_blank">
                                             {{-- <i class="fab fa-whatsapp"></i> --}}
                                              <img src="{{ asset('public/icon/'.$value->icon) }}" alt="" style="width: 54px;"> <br>
                                            {{-- Whatsapp --}}
                                            {{ $value->socail_media_url }}
                                        </a>
                                        
                                    </li>
                                    @endif
                                    @endforeach
                                    
                                    @foreach($social_media as $value)
                                    @if($escort->sm_label_two == $value->socail_media_url)
                                    <li class="snapchat-box">                                        
                                        <a href="@if($escort->sm_label_two == "whatsapp") https://api.whatsapp.com/send?phone={{$escort->snapchat}} @else {{$escort->facebook}}"  @endif" target="_blank">
                                            {{-- <i class="fab fa-snapchat-square"></i> --}}
                                            <img src="{{ asset('public/icon/'.$value->icon) }}" alt="" style="width: 54px;"> <br>
                                            {{-- <img src="{{ asset('public/icon/'.$value->icon) }}" alt=""> --}}
                                            {{-- Snapchat --}}
                                            {{ $value->socail_media_url }}
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                    @foreach($social_media as $value)
                                    @if($escort->sm_label_three == $value->socail_media_url)
                                    <li class="insta-box">                                        
                                        <a href="@if($escort->sm_label_three == "whatsapp") https://api.whatsapp.com/send?phone={{$escort->snapchat}} @else {{$escort->whatsup}} @endif" target="_blank">
                                            {{-- <i class="fab fa-instagram"></i> --}}
                                            <img src="{{ asset('public/icon/'.$value->icon) }}" alt="" style="width: 54px;"> <br>
                                            {{-- <img src="{{ asset('public/icon/'.$value->icon) }}" alt=""> --}}
                                            {{-- instagram --}}
                                            {{ $value->socail_media_url }}
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="profile-actions">
                                <ul>
                                    <li>
                                        @if(Auth::check())
                                            <?php
                                                $fllwcnt=\App\Follow::all()->where('escortId', $id)->where('custId',Auth::user()->id)->where('status', 1)->first();
                                            ?>
                                            @if(empty($fllwcnt))
                                                <form role="form" method="POST" action="{{url('follow/store')}}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="escortId" value="{{$id}}">
                                                    <input type="hidden" name="custId" value="{{Auth::user()->id}}">
                                                    <input type="hidden" name="status" value="1">
                                                    <button><span class="follow-sprint flw"></span> Follow Me</button>
                                                </form>
                                            @else
                                                <?php 
                                                    $followid=$fllwcnt->id;
                                                ?>
                                                <form role="form" method="POST" action="{{url('follow/update')}}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{$followid}}">
                                                    <input type="hidden" name="status" value="0">
                                                    <button><span class="follow-sprint flw"></span> Unfollow </button>
                                                    <!--<a href=""><button><span class="follow-sprint flw"></span> Unfollow </button></a>-->
                                                </form>
                                            @endif
                                        @else
                                            <a href="{{url('client/login')}}"><span class="follow-sprint"></span> Follow Me</a>
                                        @endif
                                       </li>
                                    <li>
                                    	<a href="{{ route('profile.email',$id) }}" target="_blank"><span class="email-sprint"></span> Email Me</a>
                                        <!-- <button type="" data-toggle="modal" data-target="#contact-blog"><span class="email-sprint"></span> Email Me</button> -->
                                        <!-- <a href="{{$escort->email_me}}"><span class="email-sprint"></span> Email Me</a></li> -->
                                </ul> 

                            </div>
                            <a href="{{$escort->website}}" class="personal-site">{{$escort->website}}</a>
                            <!-- <a href="{{$escort->website}}" class="personal-site">Website Link</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Content -->
        <div id="content">
            <div class="m-hidden">

                 <section class="video-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>Gallery</h3>
                                </div>
                            </div>
                        </div>
     
                        <div class="row">
                            <div class="col-lg-12">
                                <?php $galleries= \App\ProfileImage::all()->where('escortId', $id)->where('status', 2); ?>
                                <div class="profile-container">
                                    <div class="grid-sizer"></div>
                                    <div class="gutter-sizer"></div>
                                    @foreach($galleries as $gallery)
                                    <a class="item" href="#">
                                        <img src="{{asset('public/uploads/'.$gallery->image)}}">
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                    </div>
                </section>


                <section class="video-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>video</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="video-gallary">
                                    <?php $videos= \App\ProfileImage::all()->where('escortId', $id)->where('status', 3); ?>
                                    @foreach($videos as $video)
                                    <li>
                                        <div class="video-box">
                                            @php
                                                $ext = pathinfo( asset('public/uploads/'.$video->image), PATHINFO_EXTENSION);
                                            @endphp
                                            @if($ext == 'mp4' || $ext == 'webm')
                                                <video controls>
                                                    <source src="{{ asset('public/uploads/'.$video->image) }}" type="video/mp4">
                                                </video>
                                            @else
                                                <img src="{{asset('public/uploads/'.$video->image)}}" class="w-100"/>
                                                {{-- <a href="" class="play-btn"><img src="{{asset('public/images/video-play-icon.png')}}" /></a> --}}
                                                <a href="" class="wmark"><img src="{{asset('public/wmark.png')}}"  style="width:150px"/></a>
                                                <a href="" class="wmark" style="top:20%;left:20%;"><img src="{{asset('public/wmark.png')}}" style="width:150px"/></a>
                                                <a href="" class="wmark" style="top:80%;left:70%;"><img src="{{asset('public/wmark.png')}}"  style="width:150px"/></a>
                                            @endif
                                            {{-- <img src="{{asset('public/uploads/'.$video->image)}}" class="w-100"/> --}}
                                            {{-- <a href="" class="play-btn"><img src="{{asset('public/images/video-play-icon.png')}}" /></a> --}}
                                             {{-- <a href="" class="wmark"><img src="{{asset('public/wmark.png')}}"  style="width:150px"/></a>
                                            <a href="" class="wmark" style="top:20%;left:20%;"><img src="{{asset('public/wmark.png')}}" style="width:150px"/></a>
                                            <a href="" class="wmark" style="top:80%;left:70%;"><img src="{{asset('public/wmark.png')}}"  style="width:150px"/></a> --}}
                                        </div>
                                    </li>
                                    @endforeach
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                  <section class="video-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>Selfie Gallery</h3>
                                </div>
                            </div>
                        </div>
     
                        <div class="row">
                            <div class="col-lg-12">
                                <?php $galleries= \App\ProfileImage::all()->where('escortId', $id)->where('status', 4); ?>
                                <div class="selfie-container">
                                    <div class="grid-sizer"></div>
                                    <div class="gutter-sizer"></div>
                                    @foreach($galleries as $gallery)
                                    <a class="item" href="#">
                                        <img src="{{asset('public/uploads/'.$gallery->image)}}"/>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                    </div>
                </section>
            </div>
            <div class="mob-profile-tab-section m-visible desk-hidden">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" onclick="return false;" id="profilephotos">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapsePhoto" aria-expanded="true" aria-controls="collapsePhoto">
                                Photos <i class="fas fa-chevron-down right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapsePhoto" class="collapse show" aria-labelledby="profilephotos" data-parent="#accordion">
                            <div class="card-body">
                                <section class="photo-gallery-sec">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="sec-title">
                                                    <h3>Gallery</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php $galleries= \App\ProfileImage::all()->where('escortId', $id)->where('status', 2); ?>
                                                <div class="profile-container">
                                                    <div class="grid-sizer"></div>
                                                    <div class="gutter-sizer"></div>
                                                    @foreach($galleries as $gallery)
                                                    <a class="item" href="#">
                                                    <img src="{{asset('public/uploads/'.$gallery->image)}}">
                                                    </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="video-sec">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="sec-title">
                                                    <h3>video</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="video-gallary">
                                                    <?php $videos= \App\ProfileImage::all()->where('escortId', $id)->where('status', 3); ?>
                                                    @foreach($videos as $video)
                                                    <li>
                                                        <div class="video-box">
                                                            @php
                                                                $ext = pathinfo( asset('public/uploads/'.$video->image), PATHINFO_EXTENSION);
                                                            @endphp
                                                            @if($ext == 'mp4' || $ext == 'webm')
                                                                <video controls>
                                                                    <source src="{{ asset('public/uploads/'.$video->image) }}" type="video/mp4">
                                                                </video>
                                                            @else
                                                                <img src="{{asset('public/uploads/'.$video->image)}}" class="w-100"/>
                                                                {{-- <a href="" class="play-btn"><img src="{{asset('public/images/video-play-icon.png')}}" /></a> --}}
                                                                <a href="" class="wmark"><img src="{{asset('public/wmark.png')}}"  style="width:150px"/></a>
                                                                <a href="" class="wmark" style="top:20%;left:20%;"><img src="{{asset('public/wmark.png')}}" style="width:150px"/></a>
                                                                <a href="" class="wmark" style="top:80%;left:70%;"><img src="{{asset('public/wmark.png')}}"  style="width:150px"/></a>
                                                            @endif
                                                            {{-- <img src="{{asset('public/uploads/'.$video->image)}}" class="w-100"/> --}}
                                                            {{-- <a href="" class="play-btn"><img src="{{asset('public/images/video-play-icon.png')}}" /></a> --}}
                                                            {{-- <a href="" class="wmark"><img src="{{asset('public/wmark.png')}}"  style="width:150px"/></a>
                                                            <a href="" class="wmark" style="top:20%;left:20%;"><img src="{{asset('public/wmark.png')}}" style="width:150px"/></a>
                                                            <a href="" class="wmark" style="top:80%;left:70%;"><img src="{{asset('public/wmark.png')}}"  style="width:150px"/></a> --}}
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="selfie-gallery-sec">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="sec-title">
                                                    <h3>Selfie Gallery</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php $galleries= \App\ProfileImage::all()->where('escortId', $id)->where('status', 4); ?>
                                                <div class="selfie-container">
                                                    <div class="grid-sizer"></div>
                                                    <div class="gutter-sizer"></div>
                                                    @foreach($galleries as $gallery)
                                                    <a class="item" href="#">
                                                        <img src="{{asset('public/uploads/'.$gallery->image)}}"/>
                                                    </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <section class="profile-feeds">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>Live Updates</h3>
                                    <a href="{{ route('show-feed',$id) }}" class="read-all">view All screen »</a>
                                    {{-- @if(isset(Auth::user()->roleStatus) && Auth::user()->roleStatus == 2) --}}
                                        {{-- <a href="{{ route('escort.feed') }}" class="read-all">view All screen »</a> --}}
                                    {{-- @elseif(isset(Auth::user()->roleStatus) && Auth::user()->roleStatus == 3)
                                        <a href="{{ route('client.feed') }}" class="read-all">view All screen »</a>
                                    @elseif(@Auth::user()->roleStatus == '')
                                        <a href="{{ url('client/login') }}" class="read-all">view All screen »</a>
                                    @endif --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                    <div class="col-lg-12 desktop-feed-sec">
                        @if ((count($friends_data) > 0 && $friends_data[0]->status=='1') ||(Auth::check() && $id==Auth::user()->id))
                        <a href="#" class="red-small red-smalls feed-send-request-btn">Friends</a></br></br></br>
                        <!-- <a href="/client/unfriend/{{ $id }}" class="red-small">Friends</a></br></br></br> -->
                        @elseif (count($friends_data) > 0 && $friends_data[0]->status=='0')
                            <a disabled class="red-small red-smalls feed-send-request-btn">Friend Request Sent</a>
                        @else
                            @if(@Auth::user()->roleStatus == '')
                                <a href="{{ url('client/login') }}" class="red-small feed-send-request-btn">Send Friend Request</a>
                            @elseif(isset(Auth::user()->roleStatus) && Auth::user()->roleStatus != '')
                                <a href="{{ route('client.send-friend-request', $id ) }}" class="red-small feed-send-request-btn">Send Friend Request</a>
                            @endif
                        @endif
                                        </div>
                                    </div>



                        <div class="row">
                            <div class="col-lg-12">
                                <div class="feeds-outer simplebar" id="myElement">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="profile-feed-inner">
                    @foreach ($feed as $feed_details)
                    @php
                        $since_start = new DateTime($feed_details->created_at);
                        $start_date = $since_start->diff(new DateTime(now()));
                        $notification_time = "";
                        if($start_date->s!='0') {
                            $notification_time = $start_date->s.' seconds ago';
                        }
                        if($start_date->i!='0') {
                            $notification_time = $start_date->i.' minutes ago';
                        }
                        if($start_date->h!='0') {
                            $notification_time = $start_date->h.' hours ago';
                        }
                        if($start_date->d!='0') {
                            $notification_time = $start_date->d.' days ago';
                        }
                        if($start_date->m!='0') {
                            $notification_time = $start_date->m.' months ago';
                        }
                        if($start_date->y!='0') {
                            $notification_time = $start_date->y.' years ago';
                        }
                    @endphp
                    <li class="media-feed" id="{{ $feed_details->id }}">
                        <div class="row">
                            <div class="offset-md-3 col-lg-6">
                                <div class="feed-content">
                                    <div class="feed-author">
                                        <div class="author-img">
                                            <img src="{{ $escort_prodile_image_path }}" class="img-fluid" style="height: 56px;width: 56px;">
                                        </div>

                                        <div class="author-detail">
                                            <h5>{{ $feed_details->title }}</h5>
                                            <p>{{ $notification_time }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-feed-area">
                                    {{-- <img src="http://design.hire-webdeveloper.com/honey/escort-admin/images/profile-feed-img.jpg" class="w-100"> --}}
                                            @if($feed_details->image==NULL)
                                                        @else 
                                                @php
                                                    $ext = pathinfo( asset('public/uploads/'.$feed_details->image), PATHINFO_EXTENSION);
                                                @endphp
                                                @if($ext == 'mp4' || $ext == 'webm')
                                                    <video width="" height="" controls>
                                                        <source src="{{ asset('public/uploads/'.$feed_details->image) }}" type="video/mp4">
                                                    </video>
                                                @else
                                                    <img src="{{asset('public/uploads/'.$feed_details->image)}}" class="w-100" style="height: auto !important;width: 100% !important;margin-bottom: 2%;">
                                                @endif
                                                  @endif
                                        </div>
                                    </div>
                                                        <div class="offset-md-3 col-lg-6">
                                        <div class="feed-content">
                                            <div class="feed-text">
                                                    <p>{!! $feed_details->description !!}</p>
                                                </div>
                                                <div class="feed-action">
                                                    <ul>
                                                        <li>
                                                            <div class="clearfix">
                                                                <div style="width: auto;" class="left">
                                                                    <p><span id="likecount{{ $feed_details->id }}">@php echo isset($like_data[$feed_details->id]) ? count($like_data[$feed_details->id]) : '0'; @endphp</span> Likes</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>

                                                            <div style="width: auto;" class="right">
                                                                <p><span id="commentcount{{ $feed_details->id }}">@php echo isset($comment_data[$feed_details->id]) ? count($comment_data[$feed_details->id]) : '0'; @endphp</span> Comment</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    @if(Auth::check())

                                                    @if ((count($friends_data) > 0 && $friends_data[0]->status=='1') ||(Auth::check() && $id==Auth::user()->id))
                                                        <ul style="padding: 6px 40px;">
                                                            <li>
                                                                <div class="clearfix">
                                                                    <div style="width: auto;" class="left">
                                                                        <a id="like{{ $feed_details->id }}" class="feed-content-action like-action" onclick="likeUnlike({{ $feed_details->id }})"> 
                                                                            @php
                                                                            if(isset($like_data[$feed_details->id]) && in_array(Auth::user()->id,$like_data[$feed_details->id]) && Auth::check())
                                                                            {
                                                                            echo "Liked!";
                                                                            }
                                                                            else {
                                                                            echo "Like";
                                                                            }
                                                                            @endphp
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div style="width: auto;" class="right">
                                                                    <a  onclick="doComment( {{ $feed_details->id }} )" class="feed-content-action comment-action">Comment</a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        @endif
                                                    @endif
                                                    <form>
                                                        @if ((count($friends_data) > 0 && $friends_data[0]->status=='1') ||(Auth::check() && $id==Auth::user()->id))
                                                        <div class="form-group">
                                                            <div class="comment-feed-img">
                                                                {{-- <img src="{{ $escort_prodile_image_path }}" class="img-fluid" style="height: 45px;width: 45px;"> --}}

                                                                    @php
                                                                    if(Auth::user()->photo!='')
                                                                    {
                                                                        $image = Auth::user()->photo;
                                                                    }
                                                                    else
                                                                    {
                                                                        $image = DB::table('profile_images')->where('escortId',Auth::user()->id)->where('status','5')->first()->image;
                                                                    }
                                                                @endphp
                                                                <img src="{{asset('public/uploads/'.$image) }}" style="height: 45px;width: 45px;" class="img-fluid"> 
                                                            </div>
                                                            <div class="comment-box">
                                                                <input type="text" id="comment{{ $feed_details->id }}" data-id="{{ $feed_details->id }}" class="form-control comment-box comment-box-input" placeholder="Write a Comment">
                                                            </div>
                                                            <div class="do-comment">
                                                                <a onclick="doComment( {{ $feed_details->id }} )" class="red-small do-comment">&#10003;</a>
                                                            </div>
                                                        </div>
                                                        @endif


                                                        <div id="{{ $feed_details->id }}">
                                                            @php                                                               
                                                                if(isset($comment_text[$feed_details->id]) && count($comment_text[$feed_details->id]) > 0) {
                                                                foreach ($comment_text[$feed_details->id] as $key => $comment) {                                                                    
                                                            @endphp
                                                            <div class="form-group comment-row">
                                                                <div class="comment-feed-img">
                                                                    @if($comment_photo[$feed_details->id][$key]==NULL)
                                                                        <img src="{{asset('public/blankphoto.png')}}" style="height: 45px;width: 45px;" class="img-fluid">
                                                                    @else
                                                                        <img src="{{asset('public/uploads/'.$comment_photo[$feed_details->id][$key])}}" style="height: 45px;width: 45px;" class="img-fluid">
                                                                    @endif
                                                                </div>
                                                                <div class="comment-box" style="color: gray;min-width: 9%;border-radius: 10px;float: left;height: auto;padding-left: 15px;">
                                                                    <b style="color: gray;">
                                                                        {{ $comment_name[$feed_details->id][$key] }}
                                                                    </b>
                                                                    </br>
                                                                    {{ $comment }}
                                                                </div>

                                                            <div class="delete-comment">
                                                                @if(isset($comment_data[$feed_details->id]) && Auth::check() && Auth::user()->id==$comment_data[$feed_details->id][$key])
                                                                    <a href="{{ route('delete-comment',$comment_id[$feed_details->id][$key]) }}" class="red-small">&times;</a>
                                                                @endif
                                                            </div>
                                                            </div>
                                                            @php
                                                            } }
                                                            else {
                                                                @endphp
                                                                <div class="form-group comment-row">
                                                                </div>
                                                                @php
                                                            }
                                                            @endphp
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
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

                <div class="m-hidden">
                <section class="profile-overview-table-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="overview-table">
                                    {{-- <h3>Personal Details</h3> --}}
                                    <table>
                                        <tr>
                                            <td>
                                                <p>Suburb</p>
                                                <h4><?php  $citycount=\App\City::all()->where('id', $escort->city);?>
                                                @if($escort->city=='') Not Found @else {{ $escort->city }} @endif</h4>
                                            </td>
                                            <td>
                                                <p>Type</p>
                                                <h4>@if($escort->gender==1) Male @elseif($escort->gender==2) Female @else None @endif</h4>
                                            </td>
                                            <td>
                                                <p>Straight/bi/gay</p>
                                                <h4>
                                                    {{-- {{$escort->straight}} --}}
                                                    @if($escort->straight == 1)
                                                        Straight
                                                    @elseif($escort->straight == 2)
                                                        Bi
                                                    @elseif($escort->straight == 3)
                                                        Gay
                                                    @endif
                                                </h4>
                                            </td>
                                            <td>
                                                <p>Height</p>
                                                <h4>{{$escort->height}}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Age</p>
                                                <h4>{{$escort->age}}</h4>
                                            </td>
                                            <td>
                                                <p>Hair</p>
                                                <h4>@if($escort->hair==NULL) None @else {{\App\EscortDropdown::find($escort->hair)->dropdownTitle}} @endif</h4>
                                            </td>
                                            <td>
                                                <p>Eyes</p>
                                                <h4>@if($escort->eyes==NULL) None @else {{\App\EscortDropdown::find($escort->eyes)->dropdownTitle}} @endif</h4>
                                            </td>
                                            <td>
                                                <p>Dress</p>
                                                <h4>{{$escort->dress}}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Bust</p>
                                                <h4>{{$escort->bust}}</h4>
                                            </td>
                                            <td>
                                                <p>Body shape</p>
                                                <h4>@if($escort->bodyShape==NULL) @else  {{\App\EscortDropdown::find($escort->bodyShape)->dropdownTitle}} @endif</h4>
                                            </td>
                                            <td>
                                                <p>Nationality</p>
                                                <h4>@if($escort->nationality==NULL) None @else {{\App\EscortDropdown::find($escort->nationality)->dropdownTitle}} @endif</h4>
                                            </td>
                                            <td>
                                                <p>Personality Type</p>
                                                <h4>{{$escort->personal_type}}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Couples</p>
                                                <h4>
                                                    @if(isset($escort->service) && $escort->service == 1)
                                                        YES
                                                    @elseif(isset($escort->service) && $escort->service == 2)
                                                        NO
                                                    @else
                                                    @endif
                                                </h4>
                                            </td>
                                            <td>
                                                <p>Favourite Drink</p>
                                                <h4>{{$escort->drink}}</h4>
                                            </td>
                                            <td>
                                                <p>Service Area</p>
                                                <h4>
                                                    @if(isset($escort->serviceArea))
                                                        @if($escort->serviceArea == 1)
                                                            Incall
                                                        @elseif($escort->serviceArea == 2)
                                                            OutCall
                                                        @elseif($escort->serviceArea == 3)
                                                            Both
                                                        @endif
                                                    @endif
                                                </h4>
                                            </td>
                                            <td>
                                                <p>Verified User </p>
                                                <h4>Yes</h4>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            <?php 
            $aboutcnt=\App\ProfileDescription::all()->where('escortId', $id)->where('status', 1);
        $pfabouts=\App\ProfileDescription::orderBy('updated_at', 'desc')->where('escortId', $id)->where('status', 2)->first();
             
// echo "<pre>";
//             print_r($pfabouts);
//             exit; 
             if(!isset($aboutcnt)){
                $pfabout="Not Upload";
             }else{
                /*echo "hello";
                exit;*/
                $pfabout= isset($pfabouts->description) ? "$pfabouts->description" : "" ;
             }
            
             ?>
                <section class="profile-about">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>About me</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="profile-about-contebnt" style="word-break: break-all">
            {!! $pfabout !!} 
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="service-offer-sec green-tick">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>Services I offer</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">

        <?php 
       $serviceoffs=\App\ServiceOfferAssign::all()->where('escortId', $id);
            
          
      ?>  
                                <ul>

                                    @foreach($serviceoffs as $service)
                                    {{-- SMPEDIT 15-10-2020 --}}
                                    <li>
                                        @if (Str::contains($service->service, ';T;'))
                                        @php
                                            $extra_service = explode(';T;', $service->service)
                                        @endphp
                                        @else
                                            {{ $service->service }}
                                        @endif
                                    </li>
                                    @if (isset($extra_service) && !empty($extra_service))
                                        @foreach($extra_service as $service_details)
                                            <li>
                                                {{ $service_details }}
                                            </li>
                                        @endforeach
                                    @endif
                                    {{-- / SMPEDIT 15-10-2020 --}}
                                    @endforeach
                                    
                                </ul>
                            </div>

       <?php 
       $srvccnt=\App\ServiceOfferAssign::all()->where('escortId', $id);
             $pfservices=\App\ServiceOfferAssign::orderBy('id', 'desc')->where('escortId', $id)->first();
           if($srvccnt->count()<1){
            $pfservice="No Upload";
           }else {
             $pfservice=$pfservices->description;
           }
      ?>        
                            <div class="col-lg-12">
                                <div class="profile-about-contebnt" style="word-break: break-all">
                                    {!! $pfservice !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="rates-n-availablity-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>Rates</h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <table class="rates-table mb-4">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">In Call</th>
                                                </tr>
                                            </thead>

                                             <?php 
                                            $pfratesincalls=\App\ProfileRate::all()->where('escortId', $id)->where('status', 1);
                                            ?>       
                                            <tbody>
                                                @foreach($pfratesincalls as $rincall)
                                                <tr>
                                                    <td>{{$rincall->time}}</td>
                                                    <td>{{$rincall->price}}</td>
                                                    <td>{{$rincall->description}}</td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <table class="rates-table mb-4">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Out Call</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php 
       $pfratesoutcalls=\App\ProfileRate::all()->where('escortId', $id)->where('status', 2);
      ?>       
                                            <tbody>
                                                @foreach($pfratesoutcalls as $routcall)
                                                <tr>
                                                    <td>{{$routcall->time}}</td>
                                                    <td>{{$routcall->price}}</td>
                                                    <td>{{$routcall->description}}</td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <div class="sec-title">
                                    <h3>availability</h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="table-responsive International tours mb-3">
                                            <table class="rates-table">
                                                <thead>
                                                    <tr>
                                                        <th>Weekday</th>
                                                        <th>From</th>
                                                        <th>Until</th>
                                                        <th class="c-center">24Hrs</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                               <?php 

                                               $pflineavails=\App\ProfileAvailability::all()->where('escortId', $id);

                                              ?>       
                                                           
                                                                
                                                                
                                                    @foreach($pflineavails as $pflineavail)           
                                                    
                                                    <tr>
                                                        <td>{{$pflineavail->weekday}}</td>
                                                        <td>{{$pflineavail->fromDate}}</td>
                                                        <td>{{$pflineavail->untilDate}}</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck11" name="example1" @if($pflineavail->available24 == 1)checked @endif disabled>
                                                                <label class="custom-control-label" for="customCheck11">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <!-- Section 3 -->
                <section class="profile-tours-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="sec-title">
                                    <h3>Domestic tours</h3>
                                </div>


                                <?php 
                                $dtourcnt=\App\ProfileDescription::all()->where('escortId', $id)->where('status', 3);
                                      $pfdtours=\App\ProfileDescription::orderBy('id', 'desc')->where('escortId', $id)->where('status', 3)->first();

                                      $pflinetours=\App\ProfileTour::all()->where('escortId', $id)->where('endDate','>=',date('Y-m-d'))->where('status', 1);
           if(count($pflinetours)>0){
      ?>       
                                <div class="tour-tables table-responsive">
                                    <table class="">
                                        <thead>
                                            <tr>
                                                <th>City</th>
                                                <th>Date</th>
                                                <th class="c-center">Fully Booked</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($pflinetours as $pftour)
                                            <tr>
                                                @php
                                                    $state_name = DB::table('states')->where('id',$pftour->city)->get();
                                                @endphp
                                                <td>{{$state_name[0]->state}}</td>
                                                <td>
                                                    <?php
                                                            $start  = $pftour->startDate ?? '';
                                                            $start_date = date_create($start);
                                                            $starts_date = date_format($start_date,"d");

                                                            $starting_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                            if (($starts_date %100) >= 11 && ($starts_date%100) <= 13) {
                                                               $abbreviation = $starts_date. 'th';
                                                            } else {
                                                               $abbreviation = $starts_date. $starting_date[$starts_date % 10];
                                                            }

                                                            $end = $pftour->endDate ?? '';
                                                            $end_date = date_create($end);
                                                            $ends_date = date_format($end_date,"d");

                                                            $ending_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                            if (($ends_date %100) >= 11 && ($ends_date%100) <= 13) {
                                                               $abbreviations = $ends_date. 'th';
                                                            } else {
                                                               $abbreviations = $ends_date. $ending_date[$ends_date % 10];
                                                            }

                                                        ?>
                                                    {{ $abbreviation }} {{ date_format($start_date,"M") }}
                                                        -
                                                        {{ $abbreviations }} {{ date_format($end_date,"M") }}</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        @if($pftour->booked == "1")
                                                        <span id="cross-x">&#10006;</span>
                                                        @else
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                    </div>
                                    <?php
                                }
      ?>        


                            </div>
                            <div class="col-lg-6">
                                <div class="sec-title">
                                    <h3>International tours</h3>
                                </div>
                                @php
                                        $inttourcnt=\App\ProfileDescription::all()->where('escortId', $id)->where('status', 4);
             $pfinttours=\App\ProfileDescription::orderBy('id', 'desc')->where('escortId', $id)->where('status', 4)->first();
             $pflineinttours=\App\ProfileTour::all()->where('escortId', $id)->where('endDate','>=',date('Y-m-d'))->where('status', 2);
           if(count($pflineinttours)>0){
                                @endphp
                                <div class="tour-tables table-responsive">
                                    <table class="">
                                        <thead>
                                            <tr>
                                                <th>City</th>
                                                <th>Date</th>
                                                <th class="c-center">Fully Booked</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($pflineinttours as $pfintlinetour)
                                            <tr>
                                                @php
                                                    $state_name = DB::table('states')->where('id',$pfintlinetour->city)->get();
                                                @endphp
                                                <td>{{$state_name[0]->state}}</td>
                                                <td>
                                                    <?php
                                                            $i_start  = $pfintlinetour->startDate ?? '';
                                                            $i_start_date = date_create($i_start);
                                                            $i_starts_date = date_format($i_start_date,"d");

                                                            $i_starting_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                            if (($i_starts_date %100) >= 11 && ($i_starts_date%100) <= 13) {
                                                               $i_abbreviation = $i_starts_date. 'th';
                                                            } else {
                                                               $i_abbreviation = $i_starts_date. $i_starting_date[$i_starts_date % 10];
                                                            }

                                                            $i_end = $pfintlinetour->endDate ?? '';
                                                            $i_end_date = date_create($i_end);
                                                            $i_ends_date = date_format($i_end_date,"d");

                                                            $i_ending_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                            if (($i_ends_date %100) >= 11 && ($i_ends_date%100) <= 13) {
                                                               $i_abbreviations = $i_ends_date. 'th';
                                                            } else {
                                                               $i_abbreviations = $i_ends_date. $i_ending_date[$i_ends_date % 10];
                                                            }

                                                        ?>
                                                    {{ $i_abbreviation }} {{ date_format($i_start_date,"M") }}
                                                        -
                                                        {{ $i_abbreviations }} {{ date_format($i_end_date,"M") }}</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        @if($pfintlinetour->booked == 1)
                                                        <span id="cross-x">&#10006;</span>
                                                        @else
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <?php 
           }
      ?>        

                                </div>
                            </div>
                        </div>
                </section>
                <section class="profile-blogs">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>My Blogs</h3>
                                    <a href="{{ route('profile-guest.blogs.index', $id) }}" class="read-all">Read All Blogs »</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php $blogs=\App\Blog::where('publishBy', $id)->limit(6)->orderBy('created_at', 'desc')->get(); ?>                 
                            @foreach($blogs as $blog)
                            <div class="col-lg-4 col-md-4">
                                <div class="my-blog-box" style="height: 250px;">
                                    <div class="blog-img">
                                        @if ($blog->imageurl)
                                            <img src="{{ asset('public/client_library/upload/blog/' . $blog->imageurl) }}" class="w-100" />
                                        @else 
                                            <img src="{{ asset('public/client_library/upload/blog/blankphoto.png') }}" class="w-100" />
                                        @endif
                                    </div>
                                    <div class="blog-overview">
                                        <p class="post-date">{{$blog->created_at}}</p>
                                        <h5>{{$blog->title}}</h5>
                                        <a href="{{ route('multi.blog.details', $blog->id) }}" class="read-fblog">Read full blog »</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <section class="interest-favthings">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>Interests & Favourite Things  </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="fav-things-list">
                                    <!-- SMPEDIT 15-10-2020 -->
                                    @if(!empty($profile_favourites))   
                                        @foreach($profile_favourites as $tag)
                                        <li>{{ $tag }}</li>
                                        @endforeach
                                        @endif
                                    <!-- / SMPEDIT 15-10-2020 END -->
                                </ul>
                                <div class="container" style="word-break: break-all">
                                    @foreach($favourites_decription as $value)
                                        {{  $value->description  }}
                                    @endforeach
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </section>
                <section class="wishlist">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>wish list</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="wishlist-gallery">
                                <ul class="wishlist-items ">
                                    <!-- SMPEDIT 15-10-2020 -->
                                    @if($wish_lists->count() > 0)
                                        @foreach($wish_lists as $wish_list)
                                        <li style=" " class="img-holder"> 
                                            <a href="{{ $wish_list->image_url  }}">
                                            <img src="{{ asset('public/profile/'. $wish_list->image) }}"  />
                                            </a>
                                        </li>
                                        @endforeach
                                    @endif
                                    <!-- / SMPEDIT 15-10-2020 END -->
                                </ul> 
                            </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="mob-profile-tab-section m-visible desk-hidden">
    <div id="accordion">
        <div class="card">
            <div class="card-header" onclick="return false;" id="profileBiography">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseBiography" aria-expanded="false" aria-controls="collapseBiography">
                    Biography <i class="fas fa-chevron-down right"></i>
                    </button>
                </h5>
            </div>
            <div id="collapseBiography" class="collapse" aria-labelledby="profileBiography" data-parent="#accordion">
                <div class="card-body">
                    <section class="profile-overview-table-sec">
                        <div class="container">
							<div class="row">
								<div class="col-lg-12">
									<div class="overview-table">
										{{-- <h3>Personal Details</h3> --}}
										<table>
											<tr>
												<td>
													<p>Suburb</p>
													<h4><?php  $citycount=\App\City::all()->where('id', $escort->city);?>
													@if($escort->city=='') Not Found @else {{ $escort->city }} @endif</h4>
												</td>
												<td>
													<p>Type</p>
													<h4>@if($escort->gender==1) Male @elseif($escort->gender==2) Female @else None @endif</h4>
												</td>
												<td>
													<p>Straight/bi/gay</p>
													<h4>
														{{-- {{$escort->straight}} --}}
														@if($escort->straight == 1)
															Straight
														@elseif($escort->straight == 2)
															Bi
														@elseif($escort->straight == 3)
															Gay
														@endif
													</h4>
												</td>
												<td>
													<p>Height</p>
													<h4>{{$escort->height}}</h4>
												</td>
											</tr>
											<tr>
												<td>
													<p>Age</p>
													<h4>{{$escort->age}}</h4>
												</td>
												<td>
													<p>Hair</p>
													<h4>@if($escort->hair==NULL) None @else {{\App\EscortDropdown::find($escort->hair)->dropdownTitle}} @endif</h4>
												</td>
												<td>
													<p>Eyes</p>
													<h4>@if($escort->eyes==NULL) None @else {{\App\EscortDropdown::find($escort->eyes)->dropdownTitle}} @endif</h4>
												</td>
												<td>
													<p>Dress</p>
													<h4>{{$escort->dress}}</h4>
												</td>
											</tr>
											<tr>
												<td>
													<p>Bust</p>
													<h4>{{$escort->bust}}</h4>
												</td>
												<td>
													<p>Body shape</p>
													<h4>@if($escort->bodyShape==NULL) @else  {{\App\EscortDropdown::find($escort->bodyShape)->dropdownTitle}} @endif</h4>
												</td>
												<td>
													<p>Nationality</p>
													<h4>@if($escort->nationality==NULL) None @else {{\App\EscortDropdown::find($escort->nationality)->dropdownTitle}} @endif</h4>
												</td>
												<td>
													<p>Personality Type</p>
													<h4>{{$escort->personal_type}}</h4>
												</td>
											</tr>
											<tr>
												<td>
													<p>Couples</p>
													<h4>
														@if(isset($escort->service) && $escort->service == 1)
															YES
														@elseif(isset($escort->service) && $escort->service == 2)
															NO
														@else
														@endif
													</h4>
												</td>
												<td>
													<p>Favourite Drink</p>
													<h4>{{$escort->drink}}</h4>
												</td>
												<td>
													<p>Service Area</p>
													<h4>
														@if(isset($escort->serviceArea))
															@if($escort->serviceArea == 1)
																Incall
															@elseif($escort->serviceArea == 2)
																OutCall
															@elseif($escort->serviceArea == 3)
																Both
															@endif
														@endif
													</h4>
												</td>
												<td>
													<p>Verified User </p>
													<h4>Yes</h4>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
                    </section>
                    <section class="profile-about">
                        <div class="container">
							<div class="row">
								<div class="col-lg-12">
									<div class="sec-title">
										<h3>About me</h3>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="profile-about-contebnt" style="word-break: break-all">
									{!! $pfabout !!} 
									</div>
								</div>
							</div>
						</div>
                    </section>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" onclick="return false;" id="headingRates">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseRates" aria-expanded="false" aria-controls="collapseRates">
                    Rates <i class="fas fa-chevron-down right"></i>
                    </button>
                </h5>
            </div>
            <div id="collapseRates" class="collapse" aria-labelledby="headingRates" data-parent="#accordion">
                <div class="card-body">
                    <section class="rates-n-availablity-sec">
                        <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>Rates</h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <table class="rates-table mb-4">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">In Call</th>
                                                </tr>
                                            </thead>

                                             <?php 
                                            $pfratesincalls=\App\ProfileRate::all()->where('escortId', $id)->where('status', 1);
                                            ?>       
                                            <tbody>
                                                @foreach($pfratesincalls as $rincall)
                                                <tr>
                                                    <td>{{$rincall->time}}</td>
                                                    <td>{{$rincall->price}}</td>
                                                    <td>{{$rincall->description}}</td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <table class="rates-table mb-4">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Out Call</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $pfratesoutcalls=\App\ProfileRate::all()->where('escortId', $id)->where('status', 2);
                                                ?>       
                                            <tbody>
                                                @foreach($pfratesoutcalls as $routcall)
                                                <tr>
                                                    <td>{{$routcall->time}}</td>
                                                    <td>{{$routcall->price}}</td>
                                                    <td>{{$routcall->description}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" onclick="return false;" id="headingAvailable">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseAvailable" aria-expanded="false" aria-controls="collapseAvailable">
                        Availability <i class="fas fa-chevron-down right"></i>
                    </button>
                </h5>
            </div>
            <div id="collapseAvailable" class="collapse" aria-labelledby="headingAvailable" data-parent="#accordion" style="">
                <div class="card-body">
                    <section class="rates-n-availablity-sec">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 mt-2">
                                    <div class="sec-title">
                                        <h3>availability</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="table-responsive International tours mb-3">
                                                <table class="rates-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Weekday</th>
                                                            <th>From</th>
                                                            <th>Until</th>
                                                            <th class="c-center">24Hrs</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
    
                                                   <?php 
    
                                                   $pflineavails=\App\ProfileAvailability::all()->where('escortId', $id);
    
                                                  ?>       
                                                               
                                                                    
                                                                    
                                                        @foreach($pflineavails as $pflineavail)           
                                                        
                                                        <tr>
                                                            <td>{{$pflineavail->weekday}}</td>
                                                            <td>{{$pflineavail->fromDate}}</td>
                                                            <td>{{$pflineavail->untilDate}}</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="customCheck11" name="example1" @if($pflineavail->available24 == 1)checked @endif disabled>
                                                                    <label class="custom-control-label" for="customCheck11">&nbsp;</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" onclick="return false;" id="headingServices">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseServices" aria-expanded="false" aria-controls="collapseServices">
                    Services <i class="fas fa-chevron-down right"></i>
                    </button>
                </h5>
            </div>
            <div id="collapseServices" class="collapse" aria-labelledby="headingServices" data-parent="#accordion">
                <div class="card-body">
                    <section class="service-offer-sec green-tick">
                        <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>Services I offer</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">

        <?php 
       $serviceoffs=\App\ServiceOfferAssign::all()->where('escortId', $id);
            
          
      ?>  
                                <ul>

                                    @foreach($serviceoffs as $service)
                                    {{-- SMPEDIT 15-10-2020 --}}
                                    <li>
                                        @if (Str::contains($service->service, ';T;'))
                                        @php
                                            $extra_service = explode(';T;', $service->service)
                                        @endphp
                                        @else
                                            {{ $service->service }}
                                        @endif
                                    </li>
                                    @if (isset($extra_service) && !empty($extra_service))
                                        @foreach($extra_service as $service_details)
                                            <li>
                                                {{ $service_details }}
                                            </li>
                                        @endforeach
                                    @endif
                                    {{-- / SMPEDIT 15-10-2020 --}}
                                    @endforeach
                                    
                                </ul>
                            </div>

       <?php 
       $srvccnt=\App\ServiceOfferAssign::all()->where('escortId', $id);
             $pfservices=\App\ServiceOfferAssign::orderBy('id', 'desc')->where('escortId', $id)->first();
           if($srvccnt->count()<1){
            $pfservice="No Upload";
           }else {
             $pfservice=$pfservices->description;
           }
      ?>        
                            <div class="col-lg-12">
                                <div class="profile-about-contebnt" style="word-break: break-all">
                                    {!! $pfservice !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" onclick="return false;" id="headingBlogs">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseBlogs" aria-expanded="false" aria-controls="collapseBlogs">
                    Blogs <i class="fas fa-chevron-down right"></i>
                    </button>
                </h5>
            </div>
            <div id="collapseBlogs" class="collapse" aria-labelledby="headingBlogs" data-parent="#accordion">
                <div class="card-body">
                    <section class="profile-blogs ">
                        <div class="container">
							<div class="row">
								<div class="col-lg-12">
									<div class="sec-title">
										<h3>My Blogs</h3>
										<a href="{{ route('profile-guest.blogs.index', $id) }}" class="read-all">Read All Blogs »</a>
									</div>
								</div>
							</div>
							<div class="row">
								<?php $blogs=\App\Blog::where('publishBy', $id)->limit(6)->orderBy('created_at', 'desc')->get(); ?>                 
								@foreach($blogs as $blog)
								<div class="col-lg-4 col-md-4">
									<div class="my-blog-box" style="height: 250px;">
										<div class="blog-img">
											@if ($blog->imageurl)
												<img src="{{ asset('public/client_library/upload/blog/' . $blog->imageurl) }}" class="w-100" />
											@else 
												<img src="{{ asset('public/client_library/upload/blog/blankphoto.png') }}" class="w-100" />
											@endif
										</div>
										<div class="blog-overview">
											<p class="post-date">{{$blog->created_at}}</p>
											<h5>{{$blog->title}}</h5>
											<a href="{{ route('multi.blog.details', $blog->id) }}" class="read-fblog">Read full blog »</a>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
                    </section>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" onclick="return false;" id="headingTours">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTours" aria-expanded="false" aria-controls="collapseTours">
                    Tours <i class="fas fa-chevron-down right"></i>
                    </button>
                </h5>
            </div>
            <div id="collapseTours" class="collapse" aria-labelledby="headingTours" data-parent="#accordion">
                <div class="card-body">
                    <section class="profile-tours-sec">
                        <div class="container">
                        <div class="row">
                                <?php 
                                    $dtourcnt=\App\ProfileDescription::all()->where('escortId', $id)->where('status', 3);
                                    $pfdtours=\App\ProfileDescription::orderBy('id', 'desc')->where('escortId', $id)->where('status', 3)->first();

                                    $pflinetours=\App\ProfileTour::all()->where('escortId', $id)->where('endDate','>=',date('Y-m-d'))->where('status', 1);
                                    if(count($pflinetours)>0){
                                ?>       
                            <div class="col-lg-6">
                                <div class="sec-title">
                                    <h3>Domestic tours</h3>
                                </div>


                                <div class="tour-tables table-responsive">
                                    <table class="">
                                        <thead>
                                            <tr>
                                                <th>City</th>
                                                <th>Date</th>
                                                <th class="c-center">Fully Booked</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($pflinetours as $pftour)
                                            <tr>
                                                <td>
                                                    @php
                                                        $state_name = DB::table('states')->where('id',$pftour->city)->get();
                                                    @endphp
                                                    {{$state_name[0]->state}}
                                                </td>
                                                <td>
                                                    <?php
                                                            $dM_start  = $pftour->startDate ?? '';
                                                            $dM_start_date = date_create($dM_start);
                                                            $dM_starts_date = date_format($dM_start_date,"d");

                                                            $dM_starting_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                            if (($dM_starts_date %100) >= 11 && ($dM_starts_date%100) <= 13) {
                                                               $dM_abbreviation = $dM_starts_date. 'th';
                                                            } else {
                                                               $dM_abbreviation = $dM_starts_date. $dM_starting_date[$starts_date % 10];
                                                            }

                                                            $dM_end = $pftour->endDate ?? '';
                                                            $dM_end_date = date_create($dM_end);
                                                            $dM_ends_date = date_format($dM_end_date,"d");

                                                            $dM_ending_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                            if (($dM_ends_date %100) >= 11 && ($dM_ends_date%100) <= 13) {
                                                               $dM_abbreviations = $dM_ends_date. 'th';
                                                            } else {
                                                               $dM_abbreviations = $dM_ends_date. $dM_ending_date[$dM_ends_date % 10];
                                                            }

                                                        ?>
                                                    <span class="tour-date-from">{{ $dM_abbreviation }} {{ date_format($dM_start_date,"M") }}</span><br>
                                                    <span class="tour-date-to">{{ $dM_abbreviations }} {{ date_format($dM_end_date,"M") }}</span>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        @if($pftour->booked == "1")
                                                        <span id="cross-x">&#10006;</span>
                                                        @else
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                    </div>

                            </div>
                                    <?php
                                }
                                ?>        
                                @php
                                        $inttourcnt=\App\ProfileDescription::all()->where('escortId', $id)->where('status', 4);
             $pfinttours=\App\ProfileDescription::orderBy('id', 'desc')->where('escortId', $id)->where('status', 4)->first();
             $pflineinttours=\App\ProfileTour::all()->where('escortId', $id)->where('endDate','>=',date('Y-m-d'))->where('status', 2);
           if(count($pflineinttours)>0){
                                @endphp
                            <div class="col-lg-6">
                                <div class="sec-title">
                                    <h3>International tours</h3>
                                </div>
                                <div class="tour-tables table-responsive">
                                    <table class="">
                                        <thead>
                                            <tr>
                                                <th>City</th>
                                                <th>Date</th>
                                                <th class="c-center">Fully Booked</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($pflineinttours as $pfintlinetour)
                                            <tr>
                                                <td>
                                                    @php
                                                        $state_name_in = DB::table('states')->where('id',$pfintlinetour->city)->get();
                                                    @endphp
                                                    {{$state_name_in[0]->state}}
                                                </td>
                                                <td>
                                                     <?php
                                                            $iM_start  = $pftour->startDate ?? '';
                                                            $iM_start_date = date_create($iM_start);
                                                            $iM_starts_date = date_format($iM_start_date,"d");

                                                            $iM_starting_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                            if (($iM_starts_date %100) >= 11 && ($iM_starts_date%100) <= 13) {
                                                               $iM_abbreviation = $iM_starts_date. 'th';
                                                            } else {
                                                               $iM_abbreviation = $iM_starts_date. $iM_starting_date[$iM_starts_date % 10];
                                                            }

                                                            $iM_end = $pftour->endDate ?? '';
                                                            $iM_end_date = date_create($iM_end);
                                                            $iM_ends_date = date_format($iM_end_date,"d");

                                                            $iM_ending_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                            if (($iM_ends_date %100) >= 11 && ($iM_ends_date%100) <= 13) {
                                                               $iM_abbreviations = $iM_ends_date. 'th';
                                                            } else {
                                                               $iM_abbreviations = $iM_ends_date. $iM_ending_date[$iM_ends_date % 10];
                                                            }

                                                        ?>
                                                    <span class="tour-date-from">{{ $iM_abbreviation }} {{ date_format($iM_start_date,"M") }}</span><br>
                                                    <span class="tour-date-to">{{ $iM_abbreviations }} {{ date_format($iM_end_date,"M") }}</span>
                                                    
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        @if($pfintlinetour->booked == 1)
                                                        <span id="cross-x">&#10006;</span>
                                                        @else
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                    </div>
                                    </div>
                                    <?php 
           }
      ?>        
                        </div>
                    </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" onclick="return false;" id="headingInterest">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseInterest" aria-expanded="false" aria-controls="collapseInterest">
                    Interests <i class="fas fa-chevron-down right"></i>
                    </button>
                </h5>
            </div>
            <div id="collapseInterest" class="collapse" aria-labelledby="headingInterest" data-parent="#accordion">
                <div class="card-body">
                    <section class="interest-favthings ">
                        <div class="container">
							<div class="row">
								<div class="col-lg-12">
									<div class="sec-title">
										<h3>Interests & Favourite Things  </h3>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<ul class="fav-things-list">
										<!-- SMPEDIT 15-10-2020 -->
										@if(!empty($profile_favourites))   
											@foreach($profile_favourites as $tag)
											<li>{{ $tag }}</li>
											@endforeach
											@endif
										<!-- / SMPEDIT 15-10-2020 END -->
									</ul>
									<div class="container" style="word-break: break-all">
										@foreach($favourites_decription as $value)
											{{  $value->description  }}
										@endforeach
									</div>
									
								</div>
							</div>
						</div>
                    </section>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" onclick="return false;" id="headingwishlist">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseWishlist" aria-expanded="false" aria-controls="collapseWishlist">
                    Wish List <i class="fas fa-chevron-down right"></i>
                    </button>
                </h5>
            </div>
            <div id="collapseWishlist" class="collapse" aria-labelledby="headingwishlist" data-parent="#accordion">
                <div class="card-body">
                    <section class="wishlist">
                        <div class="container">
							<div class="row">
								<div class="col-lg-12">
									<div class="sec-title">
										<h3>wish list</h3>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="wishlist-gallery">
									<ul class="wishlist-items ">
										<!-- SMPEDIT 15-10-2020 -->
										@if($wish_lists->count() > 0)
											@foreach($wish_lists as $wish_list)
											<li style=" " class="img-holder"> 
												<a target="_blank" href="{{ $wish_list->image_url  }}">
												<img src="{{ asset('public/profile/'. $wish_list->image) }}"  />
												</a>
											</li>
											@endforeach
										@endif
										<!-- / SMPEDIT 15-10-2020 END -->
									</ul> 
								</div>
								</div>
							</div>
						</div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
          
            <section class="testimonials profile-testimonials">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title dark">
                                <h3>testimonials </h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">                            
                            <!-- Nav pills -->
                            <ul class="nav nav-pills justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#home">view testimonial</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#menu1">Write a testimonial</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    <ul class="testimonial-list">
                                        @foreach ($testimonials as $testimonial_details)
                                        <li>
                                            <div class="testimonial-profile">
                                                <img src="{{ asset('public/uploads/'.$testimonial_details->photo) }}" class="img-fluid">
                                            </div>
                                            <div class="testimonial-content">
                                                <p style="word-break: break-all">{!! $testimonial_details->testimonial !!}</p>
                                                <div class="testimonial-author">
                                                    <p>{{ $testimonial_details->name }}</p>
                                                    <p>Jan 06, 2020 at 2:45 pm</p>
                                                </div>
                                            </div>
                                        </li>                                        
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-pane container fades store_testimonial" id="menu1">
                                        
                                      <!-- <form id="store_testimonial" action="{{ route('store.testimonial') }}" method="post">
                                        @csrf -->
                                        <input type="hidden" name="escort_id" value="{{ $id }}" id="escort_id">
                                        <textarea name="testimonial" class="form-control" style="background: black;color: #909090;margin-top: 25px;" id="testimoninal_text"></textarea>
                                        <div class="col-md-1">                                        	
                                            <button class="red-btn testimonial-submit-btn" style="padding: 8px !important;border-radius: 6px;margin-top: 13px;width: 100px;margin-left: -15px;" type="submit">
                                                Submit
                                            </button>
                                        <!-- </form> -->
                                        </div>
                                </div>
                            </div>                       
                        </div>
                    </div>
                </div>
            </section>
            <section class="home-service-provider">
                <div class="container">
                      <?php $provresrcs= \App\ProviderResource::all();?>
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            @foreach($provresrcs as $resourc)
                            <div class="box-title c-center">
                                <h2>{{$resourc->titleHead}}</h2>
                                {!! $resourc->intro !!}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                         
              
                        @foreach($provresrcs as $resourc)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <a href="{{url('sex/trafficking')}}">
                            <div class="service-provider-box">
                                @if($resourc->icon1==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$resourc->icon1)}}" class="w-100"/>@endif
                                
                                <h4>{{$resourc->title1}}</h4>
                            </div>
                        </a>
                        </div>
                        @endforeach

                        @foreach($provresrcs as $resourc)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                             <a href="{{url('local/resources')}}">
                            <div class="service-provider-box">
                                @if($resourc->icon2==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$resourc->icon2)}}" class="w-100"/>@endif
                                
                                <h4>{{$resourc->title2}}</h4>
                            </div>
                             </a>
                        </div>
                        @endforeach

                       

                          @foreach($provresrcs as $resourc)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                             <a href="{{url('purchase/marketing')}}">
                            <div class="service-provider-box">
                                @if($resourc->icon3==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$resourc->icon3)}}" class="w-100"/>@endif
                                
                                <h4>{{$resourc->title3}}</h4>
                            </div>
                             </a>
                        </div>
                        @endforeach

                           @foreach($provresrcs as $resourc)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                             <a href="{{url('bacome/escort')}}">
                            <div class="service-provider-box">
                                @if($resourc->icon4==NULL)<img src="{{asset('public/blankphoto.png')}}" class="w-100"sss> @else  <img src="{{asset('public/uploads/'.$resourc->icon4)}}" class="w-100"/>@endif
                                
                                <h4>{{$resourc->title4}}</h4>
                            </div>
                             </a>
                        </div>
                        @endforeach
                        
                    </div>
                    <?php
                        $fllwcnt=\App\Follow::all()->where('escortId', $id)->where('status', 1);
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="subscription-mail-box">
                                <div class="subscription-icon">
                                    <img src="{{asset('public/images/subscription-mail.png')}}" class="img-fluid" alt="subscribe mail"/> 
                                </div>
                                <div class="subscription-content">
                                    <h3>subscribe to all my updates</h3>
                                    <p>Be notified when Belle Summars becomes availables on short notice, updates photos, goes on tour....</p>
                                    @if(Auth::check())
                                        @if($fllwcnt->count()==0)
                                            <form role="form" method="POST" action="{{url('follow/store')}}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="escortId" value="{{$id}}">
                                                <input type="hidden" name="custId" value="{{Auth::user()->id}}">
                                                <input type="hidden" name="status" value="1">
                                                <button class="btn subscription-btn">Subscribe now</button>
                                            </form>
                                        @elseif($fllwcnt->count()>0)
                                            <?php 
                                                $followids=\App\Follow::orderBy('id', 'desc')->where('escortId', $id)->where('status', 1)->first();
                                                $followid=$followids->id;
                                            ?>
                                            <form role="form" method="POST" action="{{url('follow/update')}}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{$followid}}">
                                                <input type="hidden" name="status" value="0">
                                                <button class="btn subscription-btn">Unsubscribe</button>
                                                <!--<a href=""><button><span class="follow-sprint flw"></span> Unfollow </button></a>-->
                                            </form>
                                        @endif
                                    @else
                                    <a href="{{url('client/login')}}" class="btn subscription-btn">Subscribe now</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



        </div>
        <!-- Content END -->

        @endforeach

        

          <!-- Modal -->
<div class="modal fade" id="contact-blog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLongTitle">Email Me</h4>
            <button type="button" class="btn" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body c-center">
            <!-- <h3>Email Me</h3>
               <h6>Please tell us your experience and why you would be good to blog for Skissr</h6> -->
            <form action="{{ route('profile-guest-mail') }}" method="post">
                @csrf
                <div class="form-group">
                  <input type="hidden" class="form-control" name="id" value="{{ $id }}" />
               </div>
               <div class="form-group">
                  <input type="text" class="form-control" placeholder="Your Name" name="name" />
               </div>
               <div class="form-group">
                  <input type="email" class="form-control" placeholder="Your Email Id " name="email" />
               </div>
               <div class="form-group">
                  <textarea class="form-control" placeholder="Your Message" name="message"></textarea>
               </div>
               <div class="form-group">
                  <button class="btn red-small " type="submit">Submit</button> 
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->

@endsection