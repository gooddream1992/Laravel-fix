@extends('masters.profileMaster')
@section('title', 'Friends List')
@section('content')
      	<form>
          	<div class="clearfix row">
              	<div class="col-md-12 ">
					<div class="friendship-list current-friends">
						<div class="row">
							@foreach ($follows as $follow_details)
							<div class="col-lg-6 col-md-12">
								<div class="friend-rqst-box">
									<div class="profile-img">
										{{-- <img src="images/feed-profile-1.png"> --}}
										@if($follow_details->photo==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width:50px;height: 50px;border-radius: 50%;"> @else <img src="{{asset('public/uploads/'.$follow_details->photo)}}" style="width:50px;height: 50px;border-radius: 50%;">@endif
									</div>
									<div class="profile-content">
											<p><?=date('d.m.Y',strtotime($follow_details->created_at))?></p>
											<h4>{{ $follow_details->name }}</h4>
									</div>
									<button type="button" onclick="unfriend('{{ $follow_details->cust_id }}','{{ $follow_details->escortId }}','{{ $follow_details->name }}')" class="accept-rqst-btn">Unfriend</button>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
	$(document).ready(function () {
		$("#page_header_heading").html('Friend List');
	});
	function unfriend(current_user_id, escort_id, escort_name) 
	{
		Swal.fire(
		{
			title: 'Are you sure? Do you want to unfriend "'+escort_name+'"',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => 
		{
			if (result.isConfirmed) 
			{
				Swal.fire(
					'Deleted!',
					'Your file has been deleted.',
					'success'
				);
				$.ajax({
					type: "POST",
					url: "{{ route('client.unfriend') }}",
					data: {current_user_id:current_user_id,escort_id:escort_id,"_token": "{{ csrf_token() }}"},
					dataType: "JSON",
					success: function (response) {
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