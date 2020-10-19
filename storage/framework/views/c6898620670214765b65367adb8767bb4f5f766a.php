<?php $__env->startSection('title', 'Location'); ?>
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
          <h3 class="card-title FormTitle">Manage City</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-borderless">
            <form method="post" action="<?php echo e(route('admin.location.statebulk')); ?>" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <input type="hidden" name="id" value="<?php echo e($id); ?>">
              <tr>
                <td>
                  <a class="btn btn-info" href="/public/uploads/sample_city.csv">Download Sample</a>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="file" name="statelist">                      
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
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/general_setting/locationStateadd.blade.php ENDPATH**/ ?>