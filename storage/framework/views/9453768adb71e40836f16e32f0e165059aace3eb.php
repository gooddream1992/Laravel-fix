<?php $__env->startSection('title', __('Vendor List')); ?>


<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Vendor List</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
    <!-- end page-header -->
   <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th><?php echo e(__('ID')); ?></th>
          <th><?php echo e(__('Name')); ?></th>
          <th><?php echo e(__('Company')); ?></th>
          <th><?php echo e(__('Date')); ?></th>
          <th><?php echo e(__('Adv/Due')); ?></th>
          <th><?php echo e(__('Setting')); ?></th>
          <th><?php echo e(__('Action')); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($vendor->id); ?></td>
          <td><?php echo e($vendor->name); ?></td>
          <td><?php echo e($vendor->company); ?></td>
          <td><?php echo e($vendor->date); ?></td>
          <td><?php echo e($vendor->vendorDue); ?></td>
          <td>
            <a href="<?php echo e(url('vendor/edit/'.$vendor->id)); ?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> <?php echo e(__('Edit')); ?></a>
            <a href="<?php echo e(url('vendor/view/'.$vendor->id)); ?>" class="btn btn-xs btn-success"><i class="fa fa-usd"></i> <?php echo e(__('Payment')); ?></a>
            <a href="#" data-toggle="modal" data-target="#modal-lg<?php echo e($vendor->id); ?>" class="btn btn-xs btn-warning"><i class="fa fa-info"></i> <?php echo e(__('View')); ?></a>
            <a href="<?php echo e(url('vendor/statement/'.$vendor->id)); ?>" class="btn btn-xs btn-primary"><i class="fa fa-info"></i> <?php echo e(__('Vendor Statement')); ?></a>
          </td>
          <td>
            <?php if($vendor->status==1): ?>
            <form role="form" method="POST" action="<?php echo e(url('vendor/status')); ?>" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <input type="hidden" name="id" value="<?php echo e($vendor->id); ?>" />
              
              
              <input type="hidden" name="status" value="0" />
              <button type="submit" class="btn btn-xs btn-danger"><?php echo e(__('Deactive')); ?></button>
              
              
            </form>
            <?php else: ?>
            <form role="form" method="POST" action="<?php echo e(url('vendor/status')); ?>" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <input type="hidden" name="id" value="<?php echo e($vendor->id); ?>" />
              
              
              
              <input type="hidden" name="status" value="1" />
              <button type="submit" class="btn btn-xs btn-success"><?php echo e(__('Active')); ?></button>
              
            </form>
            
            <?php endif; ?>
            
          </td>
        </tr>
        
        <!--Modal box BY ID end-->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
   </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
</div>
<!--Modal box BY ID Paid Salary-->
<?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="modal fade" id="modal-lg<?php echo e($vendor->id); ?>">
    <div class="modal-dialog modal-lg<?php echo e($vendor->id); ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Vendor Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


       <table class="table table-hover">
              <tbody>
                <tr>
                  <th><?php echo e(__('Vendor ID')); ?></th>
                  <td><?php echo e($vendor->id); ?></td>
                </tr>
                <tr>
                  <th><?php echo e(__('Vendor Name')); ?></th>
                  <td><?php echo e($vendor->name); ?>

                  </td>
                </tr>
                <tr>
                  <th><?php echo e(__('Vendor Company')); ?></th>
                  <td><?php echo e($vendor->company); ?>

                  </td>
                </tr>
                <tr>
                  <th><?php echo e(__('Adv/Due Balance')); ?></th>
                  <td><?php echo e($vendor->vendorDue); ?></td>
                </tr>
                <tr>
                  <th><?php echo e(__('Gender')); ?></th>
                  <td><?php echo e($vendor->gender); ?></td>
                </tr>
                <tr>
                  <th><?php echo e(__('Vendor Email')); ?></th>
                  <td><?php echo e($vendor->email); ?>

                  </td>
                </tr>
                <tr>
                  <th><?php echo e(__('Vendor Phone')); ?></th>
                  <td><?php echo e($vendor->phone); ?>

                  </td>
                </tr>
                <tr>
                  <th><?php echo e(__('Date')); ?></th>
                  <td><?php echo e($vendor->date); ?>

                  </td>
                </tr>
                <tr>
                  <th><?php echo e(__('Address')); ?></th>
                  <td><?php echo e($vendor->address); ?>

                  </td>
                </tr>
                
              </tbody>
            </table>



        </div>
        
      </div>
    </div>
  </div>



<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--Modal box BY ID -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pump\resources\views/admin/vendor/vendorList.blade.php ENDPATH**/ ?>