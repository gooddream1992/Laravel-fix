@extends('client.master.layouts')
@section('title', 'Notification Lists')
@section('home')
<div class="col-md-9 right-content">
  	<div class="box multi_step_form">
      	<form>
			<div class="clearfix row">
				<div class="form-box manage-account-fields ">
					<div class="row">
						<div class="col-lg-12 mb-12">
							<div class="box-header">
								<h3>change passwords</h3>
							</div>
							<div class="box-body">
								<div style="display: none;" class="alert alert-success alert-dismissible fade show" role="alert">
									<strong>Success!</strong> Your password has been set successfully.
								</div>
								<div class="form-group">
									<label>Current Password</label>
									<input type="text" id="old_password" class="form-control" >
									<span id="old_password_empty_err" style="display:none;color: red;">This field is required.</br></span>
									<span id="old_password_no_match_err" style="display:none;color: red;">Please enter correct existing password.</span>
								</div>
								<div class="form-group">
									<label>New Password</label>
									<input type="text" id="new_password" class="form-control" >
									<span id="new_password_empty_err" style="display:none;color: red;">This field is required.</span>
								</div>
								<div class="form-group">
									<label>Confirm New Password</label>
									<input type="text" id="confirm_password" class="form-control" >
									<span id="confirm_password_empty_err" style="display:none;color: red;">This field is required.</br></span>
									<span id="confirm_password_no_match_err" style="display:none;color: red;">New Password and Confirm Password should be same.</span>
								</div>                                                                                  
								<div class="form-group">
									<button type="button" id="change_password" class="submit-btn large mt-2">  Changes</button>
								</div>
							</div>
						</div>
						{{-- <div class="col-lg-4 mb-4">
							<div class="box-header">
								<h3>Change Name</h3>
							</div>
							<div class="box-body">
								<div class="form-group">
									<label>Current Name</label>
									<input type="text" class="form-control" >
								</div>
								<div class="form-group">
									<label>New Name</label>
									<input type="text" class="form-control" >
								</div>
								<div class="form-group">
									<label>Confirm New Name</label>
									<input type="text" class="form-control" >
								</div>
								<div class="form-group">
									<button type="button" id="change_name" class="submit-btn large mt-2">Save Changes</button>
								</div>
							</div>
						</div>
						<div class="col-lg-4 mb-4">
							<div class="box-header">
								<h3>Change Email</h3>
							</div>
							<div class="box-body">
								<div class="form-group">
									<label>Current Email</label>
									<input type="email" class="form-control" >
								</div>
								<div class="form-group">
									<label>New Email</label>
									<input type="email" class="form-control" >
								</div>
								<div class="form-group">
									<label>Confirm New Email</label>
									<input type="email" class="form-control" >
								</div>
								<div class="form-group">
									<button type="button" id="change_email" class="submit-btn large mt-2">Save Changes</button>
								</div>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
			{{-- <div class="clearfix row mt-4">
				<div class="form-box">
					<div class="row">
						<div class="col-lg-12">
							<div class="box-header">
								<h3>Email Notification</h3>
							</div>
							<div class="box-body">
								<div class="form-group">
									<span class="custom-toggle switch">
										<label for="switch-id-2">Enable &nbsp;</label>
										<input type="checkbox" class="switch" id="switch-id-2">
										<label for="switch-id-2">Disable</label>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> --}}
			{{-- <div class="row mt-4">
				<div class="form-box">
					<div class="row">
						<div class="col-lg-12">
							<div class="box-header">
								<h3>Deactivate Account?</h3>
							</div>
						</div>

						<div class="col-md-12">
							<button class="submit-btn large">Yes, Deactivate</button>
						</div>
					</div>
				</div>
			</div> --}}
		</form>
	</div>
</div>
<script>
$(document).ready(function () {
	$("#page_header_heading").html('Manage Account');
});

$("#old_password").keyup(function (e) 
{ 
	var old_password = $("#old_password").val();
	if(old_password != '')
	{
		$.ajax({
			type: "post",
			url: "{{ route('client.check-password') }}",
			data: {old_password:old_password,"_token": "{{ csrf_token() }}"},
			dataType: "json",
			success: function (response) 
			{
				if(response!='same')
				{
					$("#old_password_no_match_err").show();
					$("#change_password").attr('disabled',true);
				}
				else
				{
					$("#old_password_no_match_err").hide();
					$("#change_password").attr('disabled',false);
				}
			}
		});
	}
});

$("#change_password").click(function (e) 
{ 
	var old_password = $("#old_password").val();
	var new_password = $("#new_password").val();
	var confirm_password = $("#confirm_password").val();
	if(old_password == '')
	{
		$("#old_password_empty_err").show();
	}
	else
	{
		$("#old_password_empty_err").hide();
	}
	if(new_password == '')
	{
		$("#new_password_empty_err").show();
	}
	else
	{
		$("#new_password_empty_err").hide();
	}
	if(confirm_password == '')
	{
		$("#confirm_password_empty_err").show();
	}
	else
	{
		$("#confirm_password_empty_err").hide();
	}
	if(new_password !='' && confirm_password!='')
	{
		if(new_password != confirm_password)
		{
			$("#confirm_password_no_match_err").show();
		}
		else
		{
			$("#confirm_password_no_match_err").hide();
			$.ajax({
				type: "post",
				url: "{{ route('client.change-password') }}",
				data: {new_password:new_password,"_token": "{{ csrf_token() }}"},
				dataType: "json",
				success: function (response) 
				{
					if(response>'0')
					{
						$("#old_password").val('');
						$("#new_password").val('');
						$("#confirm_password").val('');
						$(".alert-success").show();
						setTimeout(function(){ $(".alert-success").hide(); }, 3000);
					}
				}
			});
		}
	}
});
</script>
@endsection