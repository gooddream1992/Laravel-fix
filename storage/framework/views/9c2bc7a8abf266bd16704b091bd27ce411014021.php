<?php $__env->startSection('title', 'Friends Request List'); ?>
<?php $__env->startSection('header_title', 'Friends Request List'); ?>
<?php $__env->startSection('content'); ?>
<form>
	<div class="clearfix row">
		<div class="col-md-12 ">
			<div class="friendship-list">
				<div class="row">
					<?php if(count($follows) > 0): ?>
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
								<button type="button" onclick="change_status('<?php echo e($follow_details->follow_id); ?>','1','<?php echo e($follow_details->name); ?>',)" class="accept-rqst-btn">Accept</button>
								<button type="button" onclick="change_status('<?php echo e($follow_details->follow_id); ?>','2','<?php echo e($follow_details->name); ?>',)" class="deny-rqst-btn">Deny</button>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
						<div class="col-lg-6 col-md-12">
							<div class="friend-rqst-box" style="color: white">
								No requests found
							</div>
						</div>
					<?php endif; ?>
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
					url: "<?php echo e(route('escort.change-request-status')); ?>",
					data: {request_id:request_id,status:status,"_token": "<?php echo e(csrf_token()); ?>"},
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.profileMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/new/friendlist/friendrequestlist.blade.php ENDPATH**/ ?>