@extends('client.master.layouts')
@section('title', 'Notification Lists')
@section('home')
<div class="col-md-9 right-content">
  	<div class="box multi_step_form">
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
												<div class="feed-profile-image">
													{{-- <img src="" /> --}}
													@if($notification_details->photo==NULL)<img src="{{asset('public/blankphoto.png')}}" style="height: 50px;width: 50px;border-radius:50px;" class="img-fluid">@else <img src="{{asset('public/uploads/'.$notification_details->photo)}}" style="height: 50px;width: 50px;border-radius:50px;" class="img-fluid">@endif
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
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	$(document).ready(function () {
		$("#page_header_heading").html('Notifications');
	});
</script>
@endsection