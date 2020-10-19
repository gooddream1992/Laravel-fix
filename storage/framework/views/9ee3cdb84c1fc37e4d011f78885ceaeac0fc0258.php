<?php $__env->startSection('title', __('Data Entry')); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Data Entry</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              
              <form role="form" method="POST" action="<?php echo e(url('data/entry')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Meter/ <a href="<?php echo e(url('new/useradd')); ?>"><?php echo e(__('Add')); ?></a></label>
                      </div>
                      
                      <?php $cshiers=\App\User::all()->where('roleStatus', 3);?>
                      <div class="selct_2_alska">
                        <select name="cashierId" class="form-control select2">
                          <?php $__currentLoopData = $cshiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cashier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($cashier->id); ?>"><?php echo e($cashier->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" name="submit" value="<?php echo e(__('Meter Start Entry')); ?>">
                      </div>
                    </div>
                  </div>
                  
                </div>
              </form>
            </div>



            <div class="col-lg-6">
              
              <form role="form" method="POST" action="<?php echo e(url('data/entry/others')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Others/ <a href="<?php echo e(url('new/useradd')); ?>"><?php echo e(__('Add')); ?></a></label>
                      </div>
                      
                      <?php $cshiers=\App\User::all()->where('roleStatus', 3);?>
                      <div class="selct_2_alska">
                        <select name="cashierId" class="form-control select2">
                          <?php $__currentLoopData = $cshiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cashier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($cashier->id); ?>"><?php echo e($cashier->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-primary" name="submit" value="<?php echo e(__('Others Start Entry')); ?>">
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
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pump\resources\views/admin/data_entry/dataEntryStart.blade.php ENDPATH**/ ?>