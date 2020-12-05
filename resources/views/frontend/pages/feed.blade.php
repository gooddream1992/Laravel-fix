@extends('masters.frontmaster')

@section('title', __('Profile'))
@section('main')

<section class="profile-feeds">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mobile-feed-sec">
                            @if ((count($friends_data) > 0 && $friends_data[0]->status=='1') ||(Auth::check() && $id==Auth::user()->id))
                            <a href="#" class="red-small red-smalls feed-send-request-btn">Friends</a>
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
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="profile-feed-inner">
            @foreach ($feed as $feed_details)
            @php
            $since_start = new DateTime($feed_details->created_at);
            $start_date = $since_start->diff(new DateTime(now()));
            $notification_time = "";
            if($start_date->s!='0')
            {
            $notification_time = $start_date->s.' seconds ago';
            }
            if($start_date->i!='0')
            {
            $notification_time = $start_date->i.' minutes ago';
            }
            if($start_date->h!='0')
            {
            $notification_time = $start_date->h.' hours ago';
            }
            if($start_date->d!='0')
            {
            $notification_time = $start_date->d.' days ago';
            }
            if($start_date->m!='0')
            {
            $notification_time = $start_date->m.' months ago';
            }
            if($start_date->y!='0')
            {
            $notification_time = $start_date->y.' years ago';
            }
            @endphp
            <li class="media-feed" id="{{ $feed_details->id }}">
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-md-9">
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
                                {{-- <img src="{{asset('public/uploads/'.$feed_details->image)}}" class="w-100" style="width: auto !important; height: 314px;margin-bottom: 2%;"> --}}
                                        @endif
                                          @endif
                                </div>
                            </div>
                                                <div class="col-lg-9 col-md-9">
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
                                                                    if(isset($like_data[$feed_details->id]) && in_array($id,$like_data[$feed_details->id]) && Auth::check())
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
                                            {{-- <form> --}}
                                                @if ((count($friends_data) > 0 && $friends_data[0]->status=='1') ||(Auth::check() && $id==Auth::user()->id))
                                                <div class="form-group">
                                                    <div class="comment-feed-img">
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


        @endsection