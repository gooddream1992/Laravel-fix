<?php $__env->startSection('title', 'New Profiles'); ?>
<?php $__env->startSection('header_title', 'New Profiles'); ?>

<?php $__env->startSection('content'); ?>
      	<form>
          	<div class="clearfix row">
              	<div class="col-md-12 ">
					<div class="profile-list">
						<div class="row">
							<?php $__currentLoopData = $new_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-lg-3 col-md-6">
								<div class="profile-box">
									<a href="<?php echo e(route('profile-guest',$profile_details->id)); ?>">
										<?php if($profile_details->photo==NULL): ?>
											<img style="height: 522px;" class="w-100" src="<?php echo e(asset('public/blankphoto.png')); ?>"> 
										<?php else: ?> 
											<img style="height: 522px;" class="w-100" src="<?php echo e(asset('public/uploads/'.$profile_details->photo)); ?>">
										<?php endif; ?>
										<p><?php echo e($profile_details->name); ?></p>
									</a>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
				</div>
			</div>
		</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
	$(document).ready(function () {
		$("#page_header_heading").html('New Profiles');
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
					url: "<?php echo e(route('client.unfriend')); ?>",
					data: {current_user_id:current_user_id,escort_id:escort_id,"_token": "<?php echo e(csrf_token()); ?>"},
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.profileMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/new/newprofiles/newprofiles.blade.php ENDPATH**/ ?>