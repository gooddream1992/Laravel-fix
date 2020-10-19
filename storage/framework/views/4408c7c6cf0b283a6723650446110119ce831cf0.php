<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">New Branch</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form role="form" method="POST" action="<?php echo e(url('branches/store')); ?>" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

               
                <input type="hidden" name="addedBy" value="<?php echo e(Auth::user()->id); ?>">

                <input type="hidden" name="paid" value="0">
                <input type="hidden" name="accId" value="11">

                <div class="row">
                
                <div class="col-md-6">
                    <div class="row">

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Brnch Name')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="branchName" class="form-control">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Phone')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="branchPhone">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Email')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="branchEmail">
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
                        <textarea name="branchAddress" class="textarea"></textarea>
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Branch Logo')); ?> </label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="branchLogo" type="file" accept="image/*" value="0">
                        <p class="help-block"><?php echo e(__('Upload image max size 1mb')); ?></p>
                      </div>
                    </div>
                  </div> 


                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                       
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Save">
                      </div>
                    </div>
                  </div> 


                  </div>
                </div>


                </div>
                
                
            </form>
         
     </div>


     <div class="card-body">
 <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><?php echo e(__('ID No.')); ?></th>
                <th><?php echo e(__('Branch Name')); ?></th>
                <th><?php echo e(__('Branch Phone No.')); ?></th>
                <th><?php echo e(__('Branch Email')); ?></th>
                <th><?php echo e(__('Branch Address')); ?></th>
                 <th><?php echo e(__('Branch Logo')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $branches =\App\Branch::all();?>
                 <?php $i=1;?>
              <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>B00<?php echo e($i++); ?></td>
                <td><?php echo e($branch->branchName); ?></td>
                <td><?php echo e($branch->branchPhone); ?></td>
                <td><?php echo e($branch->branchEmail); ?></td>
                <td><?php echo e($branch->branchAddress); ?></td>
                <td><img src="<?php echo e(asset('public/uploads/'.$branch->branchLogo)); ?>" style="width: 60px;"></td>
                <td><a href="<?php echo e(url('branches/edit/'.$branch->id)); ?>" class="btn btn-xs btn-primary">Edit</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </tfoot>
              </table>

     </div>



    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pump\resources\views/admin/branches/branchAdd.blade.php ENDPATH**/ ?>