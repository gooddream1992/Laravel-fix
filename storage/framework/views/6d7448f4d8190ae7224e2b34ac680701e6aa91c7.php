   
<?php $__env->startSection('title', 'Submit Ticket'); ?>
<?php $__env->startSection('header_title', 'Submit Ticket'); ?>
<?php $__env->startSection('home'); ?>
<div class="col-md-9 right-content">
	<div class="box multi_step_form">
		<form method="post" action="<?php echo e(route('client.submit.ticket')); ?>">
			<?php echo csrf_field(); ?>
			<input type="hidden" name="id" value="<?php echo e($id); ?>" class="form-control">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.master.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/client/ticket/index.blade.php ENDPATH**/ ?>