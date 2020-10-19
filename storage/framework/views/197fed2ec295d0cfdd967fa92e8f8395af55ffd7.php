<?php $__env->startSection('title', 'Local Resources'); ?>
<?php $__env->startSection('main'); ?>
<<style>
	.pagination{float: right;}
</style>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Local Resources</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          


          <div class="text-center btn btn-success"><h1>Local Resources</h1></div><br><br>
          <a href="<?php echo e(route('local.resources.admin')); ?>" class="btn btn-danger">Add Local Resources</a>
          <hr>
          <table class="table">
            <tr>
              <td>
                <strong><b>#ID</b></strong>
              </td>
              <td>
                <strong><b>Title</b></strong>
              </td>
              <td>
                <strong>
                  <b>
                    Name
                  </b>
                </strong>
              </td>
              <td>
                <strong>
                  <b>
                    Image
                  </b>
                </strong>
              </td>
              <td>
                <strong>
                  <b>
                    Section
                  </b>
                </strong>
              </td>
              <<td>
                <strong>
                  <b>
                    City
                  </b>
                </strong>
              </td>
              <td>
                <strong>
                  <b>
                    Action
                  </b>
                </strong>
              </td>
            </tr>
            <?php $i = 1; ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
                <?php echo e($i++); ?>

              </td>
              <td>
                <?php echo e($value->title); ?>

              </td>
              <td>
                <?php echo e($value->name); ?>

              </td>
              <td>
                <img src="<?php echo e(asset('public/localresources')); ?>/<?php echo e($value->image); ?>" width="50" height="50">
              </td>
              <td>
                <?php echo e($value->section); ?>

              </td>
              <td>
                <?php echo e($value->city); ?>

              </td>
              <td>
                <a href="<?php echo e(route('local.resources.admin.delete',$value->id)); ?>" class="btn btn-xs btn-danger">Delete</a>
                <a href="<?php echo e(route('local.resources.admin.edit',$value->id)); ?>" class="btn btn-xs btn-primary">Modify</a>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
          <?php echo e($data->links()); ?>

        </div>
      </div>

    </div>
  </section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.editormaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/localResources/view.blade.php ENDPATH**/ ?>