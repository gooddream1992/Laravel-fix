<?php $__env->startSection('title', __('Start Purchase New')); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Start Purchase </h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              
              <form role="form" method="POST" action="<?php echo e(url('purchase')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Others/ <a href="<?php echo e(url('vendor/add')); ?>"><?php echo e(__('Add')); ?></a></label>
                      </div>
                      
                      <?php $vendors=\App\Vendor::all();?>
                      <div class="selct_2_alska">
                        <select name="vendorId" class="form-control select2">
                          <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($vendor->id); ?>"><?php echo e($vendor->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" name="submit" value="<?php echo e(__(' Start Purchase')); ?>">
                      </div>
                    </div>
                  </div>
                  
                </div>
              </form>
            </div>

          </div>
          
        </div>
      </div>
    </section>
  </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pump\resources\views/admin/purchase/startPurchase.blade.php ENDPATH**/ ?>