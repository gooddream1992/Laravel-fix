   @extends('client.master.layouts')
@section('title', 'Submit Ticket')
@section('header_title', 'Submit Ticket')
@section('home')
<div class="col-md-9 right-content">
	<div class="box multi_step_form">
		<form method="post" action="{{ route('client.submit.ticket') }}">
			@csrf
			<input type="hidden" name="id" value="{{ $id }}" class="form-control">
			<div class="clearfix row">
				<div class="col-md-12 ">
					<div class="form-box">
						<div class="box-body">
							<div class="form-group">
								<label>Subject</label>
								<input type="text" class="form-control" name="subject">
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" name="description"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-md-12">
					<button class="submit-btn large">Submit Ticket</button>
				</div>
			</div>
		</form>
	</div>
</div>
</section>
</div>
@endsection