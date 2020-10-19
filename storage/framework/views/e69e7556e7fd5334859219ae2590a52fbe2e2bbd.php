<?php $__env->startSection('title', 'Purchase Marketing Blog'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Purchase Marketing Blog</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          


          <div class="text-center btn btn-success"><h1>Purchase Marketing Blog</h1></div><br><br>
          <a href="<?php echo e(route('purchase.marketing.admin')); ?>" class="btn btn-danger">Add Purchase Marketing Blog</a>
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
                    Description
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
                <?php echo e($value->description); ?>

              </td>
              <td>
                <img src="<?php echo e(asset('public/purchasemarketing')); ?>/<?php echo e($value->image); ?>" width="50" height="50">
              </td>
              <td>
                <a href="<?php echo e(route('purchase.marketing.admin.delete',$value->id)); ?>" class="btn btn-xs btn-danger">Delete</a>
                <a href="<?php echo e(route('purchase.marketing.admin.edit',$value->id)); ?>" class="btn btn-xs btn-primary">Modify</a>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
        </div>
        
        
        
        
      </div>

    </div>
  </section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.editormaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/purchasemarketing/view.blade.php ENDPATH**/ ?>