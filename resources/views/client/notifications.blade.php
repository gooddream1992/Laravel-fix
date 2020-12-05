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
												<a href="/profile/{{ $notification_details->user_id }}">
														<div class="feed-profile-image">
															{{-- <img src="" /> --}}
															
																<!-- <img src="{{asset('public/blankphoto.png')}}" style="height: 50px;width: 50px;border-radius:50px;" class="img-fluid"> -->

																<?php 
																	if($notification_details->roleStatus == 2){ 
																		$profileImage = \App\ProfileImage::where([
																			['escortId','=',$notification_details->id],
																			['status','=',5]
																		])->get();
																		foreach ($profileImage as $key => $value) { ?>
																			<?php if(!empty($value->image)){ ?>
																				<img src="{{asset('public/uploads/'.$value->image)}}" style="height: 50px;width: 50px;border-radius:50px;" class="img-fluid">	
																			<?php }else { ?>
																				<img src="{{asset('public/blankphoto.png')}}" style="height: 50px;width: 50px;border-radius:50px;" class="img-fluid">
																			<?php } ?>
																		<?php } ?>
																	<?php }else{ if(!empty($notification_details->photo)){ ?>
																		<img src="{{asset('public/uploads/'.$notification_details->photo)}}" style="height: 50px;width: 50px;border-radius:50px;" class="img-fluid">
																	<?php } } ?>
															
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

														<a href="/{{ $notification_details->url }}">
																	<span class="time">{{ $notification_time }}</span>
																	<h5>{{ $notification_details->notification_title }}</h5>
																	<p>{!!  $notification_details->notification_content  !!}</p>
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
	</div>
</div>
<script>
	$(document).ready(function () {
		$("#page_header_heading").html('Notifications');
	});
</script>
@endsection