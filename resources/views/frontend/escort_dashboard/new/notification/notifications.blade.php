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
							@if(count($notifications)>0)
							@foreach ($notifications as $notification_details)
								<li>
								<div class="feed-content-box">
									<div class="left">
										<div class="feed-profile-image">
											<img src="http://design.hire-webdeveloper.com/honey/escort-admin/images/feed-profile-1.png" />
										</div>
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
										<span class="time">{{ $notification_time }}</span>
										<h5>{{ $notification_details->notification_title }}</h5>
										<p>{{ $notification_details->notification_content }}</p>
									</div>
								</div>
							</li>
							@endforeach
							@else
							<li>
								<div class="feed-content-box">
									<div class="right">
										<p>No Notifications Available</p>
									</div>
								</div>
							</li>
							@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
</form>
<script>
	$(document).ready(function () {
		$("#page_header_heading").html('Notifications');
	});
</script>
@endsection