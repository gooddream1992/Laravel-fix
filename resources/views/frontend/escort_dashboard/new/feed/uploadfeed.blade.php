@extends('masters.profileMaster')
@section('title', 'Feed')
@section('content')
<style>
	.custom-file.gray-upload .custom-file-input:lang(en)~.custom-file-label::after
	{
		content: "Browse Image / Video";
	}
</style>
			<form action="{{ route('escort.feed.store') }}" method="post" enctype="multipart/form-data">
				@csrf
			<div class="clearfix row">
				<div class="col-md-12 ">
					<div class="form-box">
						<div class="box-header">
								<h3>Post An Update</h3>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" name="description"></textarea>
							</div>
							<div class="form-group">
								<label class="d-block w-100">Image / Video</label>
								<div class="custom-file gray-upload large">
									<input type="file" class="custom-file-input" id="customFile" name="imageurl">
									<label class="custom-file-label" for="customFile"></label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-md-12">
					<button class="submit-btn">Submit</button>
				</div>
			</div>
		</form>
<script>
	$(document).ready(function () {
		$("#page_header_heading").html('Feed');
	});

	function likeUnlike(feedId) 
	{
		like_status = $("#like"+feedId).html();
		like_status = like_status.trim();
		if(like_status == 'Like')
		{
			$("#like"+feedId).html('Liked!');
			var old_likes = $("#likecount"+feedId).html();
			new_likes = parseInt(old_likes) + parseInt(1);
			$("#likecount"+feedId).html(new_likes);
		}
		else
		{
			$("#like"+feedId).html('Like');
			var old_likes = $("#likecount"+feedId).html();
			new_likes = parseInt(old_likes) - parseInt(1);
			$("#likecount"+feedId).html(new_likes);
		}
		$.ajax({
			type: "post",
			url: "{{ route('escort.like-unlike') }}",
			data: {feedId:feedId,"_token": "{{ csrf_token() }}"},
			dataType: "json",
			success: function (response) {
				console.log(response);
			}
		});
	}

	function doComment(feedId) 
	{
		comment = $("#comment"+feedId).val();
		if(comment != '')
		{
			$.ajax({
				type: "post",
				url: "{{ route('escort.do-comment') }}",
				data: {feedId:feedId,comment:comment,"_token": "{{ csrf_token() }}"},
				dataType: "json",
				success: function (response) {
					$("#comment"+feedId).val('');
					var old_comments = $("#commentcount"+feedId).html();
					new_comments = parseInt(old_comments) + parseInt(1);
					$("#commentcount"+feedId).html(new_comments);
				}
			});
		}
	}
	$(".comment-box").keyup(function (e) 
	{ 
		var code = (e.keyCode ? e.keyCode : e.which);
		if(code == 13) { //Enter keycode
			doComment($(this).attr('data-id'));
		}
	});
	
</script>
@endsection