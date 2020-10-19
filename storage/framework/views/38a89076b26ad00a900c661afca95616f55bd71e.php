<?php $__env->startSection('title', __('Customer List')); ?>


<?php $__env->startSection('main'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pt-3">
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title Txt_color"><?php echo e(__('Customer List')); ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><?php echo e(__('ID No.')); ?></th>
                <th><?php echo e(__('Customer Name')); ?></th>
                <th><?php echo e(__('Mobile No.')); ?></th>
                <th><?php echo e(__('Adv/Due Balance')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                 <?php $i=1;?>
              <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>C00<?php echo e($customer->id); ?>-<?php echo e($i++); ?></td>
                <td><?php echo e($customer->name); ?></td>
                <td><?php echo e($customer->phone); ?></td>
           
                <td><?php echo e($customer->dueAmount); ?></td>
               
                <td>
                  <a href="<?php echo e(url('customer/edit/'.$customer->id)); ?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                  <a href="#" data-toggle="modal" data-target="#modal-lg<?php echo e($customer->id); ?>" class="btn btn-xs btn-primary"><i class="fa fa-info"></i> <?php echo e(__('View')); ?></a>
                  <a href="<?php echo e(url('customer/statement/'.$customer->id)); ?>" class="btn btn-xs btn-danger"><i class="fa fa-info"></i> <?php echo e(__('Client Statement')); ?></a>
                  
                  
                  <a href="<?php echo e(url('income/payment/'.$customer->id)); ?>" class="btn btn-xs btn-success"><i class="fa fa-usd"></i> <?php echo e(__('Payment')); ?></a>
                  
                </td>
                
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        
      </div>
    </section>
    <!-- /.content -->
  </div>
   <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <!-- modal-dialog -->
  <div class="modal fade" id="modal-lg<?php echo e($customer->id); ?>">
    <div class="modal-dialog modal-lg<?php echo e($customer->id); ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create a New Client</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


         <table class="table table-bordered table-hover">
                <tbody>
                  
                  <tr>
                    <th><?php echo e(__('Client ID')); ?></th>
                    <td><?php echo e($customer->id); ?></td>
                  </tr>
                  <tr>
                    <th><?php echo e(__('Client Name')); ?></th>
                    <td><?php echo e($customer->name); ?></td>
                  </tr>
                  <tr>
                    <tr>
                      <th><?php echo e(__('Gender')); ?></th>
                      <td><?php echo e($customer->gender); ?></td>
                    </tr>
                    <tr>
                      <th><?php echo e(__('Client Company')); ?></th>
                      <td><?php echo e($customer->company); ?></td>
                    </tr>
                   
                    <tr>
                      <th><?php echo e(__('Due Balance')); ?></th>
                      <td><?php echo e($customer->dueAmount); ?></td>
                    </tr>
                   
                    <th><?php echo e(__('Client Phone')); ?></th>
                    <td><?php echo e($customer->phone); ?></td>
                  </tr>
                  <tr>
                    <th><?php echo e(__('Client Email')); ?></th>
                    <td><?php echo e($customer->email); ?></td>
                  </tr>
                  <tr>
                    <th><?php echo e(__('Client Contact')); ?></th>
                    <td><?php echo e($customer->contact); ?></td>
                  </tr>
                  <tr>
                    <th><?php echo e(__('Client Address')); ?></th>
                    <td><?php echo e($customer->address); ?></td>
                  </tr>
                  
                  
                  
                </tbody>
              </table>



        </div>
        
      </div>
    </div>
  </div>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <!-- /.modal-dialog -->







<?php $__env->stopSection(); ?>



<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pump\resources\views/admin/customer/allCustomer.blade.php ENDPATH**/ ?>