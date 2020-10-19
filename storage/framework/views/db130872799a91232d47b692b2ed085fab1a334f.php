<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Edit Branch</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form role="form" method="POST" action="<?php echo e(url('branches/update')); ?>" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>



              <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               
                <input type="hidden" name="id" value="<?php echo e($branch->id); ?>">

                <div class="row">
                
                <div class="col-md-6">
                    <div class="row">

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Brnch Name')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="branchName" class="form-control"  value="<?php echo e($branch->branchName); ?>">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Phone')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="branchPhone" value="<?php echo e($branch->branchPhone); ?>">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Email')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="branchEmail" value="<?php echo e($branch->branchEmail); ?>">
                      </div>
                    </div>
                  </div>

                
                  
                </div>
                </div>


                 <div class="col-md-6">
                    <div class="row">

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Address')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea name="branchAddress" class="textarea"><?php echo e($branch->branchAddress); ?></textarea>
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Branch Logo')); ?> </label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="branchLogo" type="file" accept="image/*"  value="<?php echo e($branch->branchLogo); ?>">
                        <p class="help-block"><img src="<?php echo e(asset('public/uploads/'.$branch->branchLogo)); ?>" style="width: 60px;">
                        <?php echo e(__('Upload image max size 1mb')); ?></p>
                      </div>
                    </div>
                  </div> 

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                       
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Update">
                      </div>
                    </div>
                  </div> 


                  </div>
                </div>


                </div>
                
                
            </form>
         
     </div>


  



    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pump\resources\views/admin/branches/branchEdit.blade.php ENDPATH**/ ?>