<?php $__env->startSection('title', 'Social Media'); ?>
<?php $__env->startSection('main'); ?>
<style>
.pagination{
float: right;
}
</style>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Social Media</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-borderless">
            <form method="post" action="<?php echo e(route('admin.social.media.store')); ?>" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              
              <tr>
                <td>
                  <input type="file" name="icon">
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="social_url" class="form-control" placeholder="Social Media">
                </td>
              </tr>
              <tr>
                <td>
                  <input type="submit" name="submit" value="Save" class="btn btn-success">                      
                </td>
              </tr>                    
            </form>
          </table>
		<table class="table">
			<thead>
				<tr>
					<th>ID#</th>
					<th>Social Media</th>
					<th>Social Media Icon</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1  ?>
				<?php $__currentLoopData = $socail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td>
						<?php echo e($i++); ?>

					</td>
					<td>
						<?php echo e($value->socail_media_url); ?>

					</td>
					<td>
						<img src="<?php echo e(asset('public/icon/'.$value->icon)); ?>" alt="" width="50" height="50" title="<?php echo e($value->socail_media_url); ?>">
					</td>
					<td>
						<a href="<?php echo e(route('admin.social.media.edit',$value->id)); ?>" class="btn btn-xs btn-primary">Modify</a>
						<a href="<?php echo e(route('admin.social.media.delete',$value->id)); ?>" class="btn btn-xs btn-danger">Delete</a>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
        
		</table>
    <?php echo e($socail->links()); ?>

        </div>
      </div>
    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/socialMedia/index.blade.php ENDPATH**/ ?>