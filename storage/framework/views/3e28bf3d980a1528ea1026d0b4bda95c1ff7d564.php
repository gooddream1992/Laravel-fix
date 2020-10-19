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
            <form method="post" action="<?php echo e(route('admin.social.media.update')); ?>" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <input type="hidden" name="id" value="<?php if(isset($socail[0]->id)): ?> <?php echo e($socail[0]->id); ?> <?php endif; ?>">
              <tr>
                <td>
                  <input type="file" name="icon">
                  <?php if(isset($socail[0]->icon)): ?>
                    <input type="hidden" value="<?php echo e($socail[0]->icon); ?>" name="icon">
                    <img src="<?php echo e(asset('public/icon/'.$socail[0]->icon)); ?>" alt="" width="50" height="50" title="<?php echo e($socail[0]->socail_media_url); ?>">
                    <?php endif; ?>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="social_url" class="form-control" placeholder="Social Media" value="<?php if(isset($socail[0]->socail_media_url)): ?> <?php echo e($socail[0]->socail_media_url); ?> <?php endif; ?>">
                </td>
              </tr>
              <tr>
                <td>
                  <input type="submit" name="submit" value="Save" class="btn btn-success">                      
                </td>
              </tr>                    
            </form>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/socialMedia/edit.blade.php ENDPATH**/ ?>