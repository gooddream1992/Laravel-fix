<?php $__env->startSection('title', 'Friends List'); ?>
<?php $__env->startSection('content'); ?>
      	<form>
          	<div class="clearfix row">
              	<div class="col-md-12 ">
					<div class="friendship-list current-friends">
						<div class="row">
							<?php $__currentLoopData = $follows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follow_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-lg-6 col-md-12">
								<div class="friend-rqst-box">
									<div class="profile-img">
										
										<?php if($follow_details->photo==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width:50px;height: 50px;border-radius: 50%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$follow_details->photo)); ?>" style="width:50px;height: 50px;border-radius: 50%;"><?php endif; ?>
									</div>
									<div class="profile-content">
											<p><?=date('d.m.Y',strtotime($follow_details->created_at))?></p>
											<h4><?php echo e($follow_details->name); ?></h4>
									</div>
									<button type="button" onclick="unfriend('<?php echo e($follow_details->cust_id); ?>','<?php echo e($follow_details->escortId); ?>','<?php echo e($follow_details->name); ?>')" class="accept-rqst-btn">Unfriend</button>
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
<?php echo $__env->make('masters.profileMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/new/friendlist/friendlist.blade.php ENDPATH**/ ?>