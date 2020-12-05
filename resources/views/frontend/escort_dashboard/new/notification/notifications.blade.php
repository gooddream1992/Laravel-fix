@extends('masters.profileMaster')
@section('title', 'Notification Lists')
@section('header_title', 'Notifications')
@section('content')
		<form>
			<div class="clearfix row">
				<div class="col-md-12 ">
						<div class="feed-list-box simplebar" id="myElement">
								<div class="feeds-list">
										<ul>
					@foreach ($notifications as $notification_details)
						<li>
							<div class="feed-content-box">
								<div class="left">
								<a href="/profile/{{ $notification_details->user_id }}">
										<div class="feed-profile-image">
											{{-- <img src="" /> --}}
											@if($notification_details->photo==NULL)<img src="{{asset('public/blankphoto.png')}}" style="height: 50px;width: 50px;border-radius:50px;" class="img-fluid">@else <img src="{{asset('public/uploads/'.$notification_details->photo)}}" style="height: 50px;width: 50px;border-radius:50px;" class="img-fluid">@endif
										</div>
									</a>
								</div>
								<div class="right">
									@php
										$since_start = new DateTime($notification_details->created_on);
										$start_date = $since_start->diff(new DateTime(now()));
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

										<a href="/{{ $notification_details->feed_id !='' ? 'escort/feed#'.$notification_details->feed_id :$notification_details->url }}">
													<span class="time">{{ $notification_time }}</span>
													<h5>{{ $notification_details->notification_title }}</h5>
													<p>{{ $notification_details->notification_content }}</p>
										</a>
								</div>
							</div>
					</li>
					@endforeach
			</ul>
		</div>
	</div>
	
</div>
</div>
</form>
<script src="http://honeydeve.alakmalak.ca/public/client_library/js/simple-sidebar.js" type="text/javascript"></script>
<script>
	$(document).ready(function () {
		$("#page_header_heading").html('Notifications');
	});
</script>
@endsection