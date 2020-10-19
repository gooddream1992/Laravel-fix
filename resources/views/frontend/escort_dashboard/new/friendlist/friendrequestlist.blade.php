@extends('masters.profileMaster')
@section('title', 'Friends Request List')
@section('header_title', 'Friends Request List')
@section('content')
<form>
	<div class="clearfix row">
		<div class="col-md-12 ">
			<div class="friendship-list">
				<div class="row">
					@if (count($follows) > 0)
						@foreach ($follows as $follow_details)
						<div class="col-lg-6 col-md-12">
							<div class="friend-rqst-box">
								<div class="profile-img">
									{{-- <img src="images/feed-profile-4.png" /> --}}
									@if($follow_details->photo==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width:50px;height: 50px;border-radius: 50%;"> @else <img src="{{asset('public/uploads/'.$follow_details->photo)}}" style="width:50px;height: 50px;border-radius: 50%;">@endif
								</div>
								<div class="profile-content">
									<p><?=date('d.m.Y',strtotime($follow_details->created_at))?></p>
									<h4>{{ $follow_details->name }}</h4>
								</div>
								<button type="button" onclick="change_status('{{ $follow_details->follow_id }}','1','{{ $follow_details->name }}',)" class="accept-rqst-btn">Accept</button>
								<button type="button" onclick="change_status('{{ $follow_details->follow_id }}','2','{{ $follow_details->name }}',)" class="deny-rqst-btn">Deny</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
	function change_status(request_id,status,escort_name) 
	{
		if(status=='1')
		{
			status_val = 'accept';
			icon = 'success';
		}
		else
		{
			status_val = 'deny';
			icon = 'warning';
		}
		Swal.fire(
		{
			title: 'Are you sure? Do you want to '+status_val+' "'+escort_name+'"',
			icon: icon,
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, '+status_val+' it!'
		}).then((result) => 
		{
			if (result.isConfirmed) 
			{
				Swal.fire(
					'Accepted!',
					'Request has been '+status_val+'ed successfully.',
					'success'
				);
				$.ajax({
					type: "POST",
					url: "{{ route('escort.change-request-status') }}",
					data: {request_id:request_id,status:status,"_token": "{{ csrf_token() }}"},
					dataType: "JSON",
					success: function (response) 
					{
						if(response=='1')
						{
							location.reload();
						}
					}
				});
			}
		})
	}
</script>
@endsection