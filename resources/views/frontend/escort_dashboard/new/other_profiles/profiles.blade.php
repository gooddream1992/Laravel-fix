@extends('masters.profileMaster')
@section('title', 'Friends Request List')
@section('header_title', 'Friends Request List')
@section('content')
<form>
	<div class="clearfix row">
		<div class="col-md-12 ">
			<div class="friendship-list">
				<div class="row">
					@if (count($my_profiles) > 0)
						@foreach ($my_profiles as $my_profiles_details)
						<div class="col-lg-6 col-md-12">
							<div class="friend-rqst-box">
								<div class="profile-img">
									{{-- <img src="images/feed-profile-4.png" /> --}}
									@if($my_profiles_details->photo==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width:50px;height: 50px;border-radius: 50%;"> @else <img src="{{asset('public/uploads/'.$my_profiles_details->photo)}}" style="width:50px;height: 50px;border-radius: 50%;">@endif
								</div>
								<div class="profile-content">
									<h4>{{ $my_profiles_details->name }}</h4>
								</div>
								<a href="/new/profile/{{ $my_profiles_details->id }}" class="accept-rqst-btn">Modify Profile</a>
							</div>
						</div>
						@endforeach
					@else
						<div class="col-lg-6 col-md-12">
							<div class="friend-rqst-box" style="color: white">
								No requests found
							</div>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</form>
@endsection