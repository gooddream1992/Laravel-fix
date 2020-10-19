<?php $__env->startSection('title', __('Cashier List')); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Cashier List</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
      

     <div class="card-body">
 <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><?php echo e(__('ID No.')); ?></th>
                <th><?php echo e(__('Cashier Name')); ?></th>
                <th><?php echo e(__('Phone No.')); ?></th>
                <th><?php echo e(__('Email')); ?></th>
                <th><?php echo e(__('Address')); ?></th>
                 <th><?php echo e(__('Shift')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $branches =\App\User::all()->where('roleStatus', 3);?>
                 <?php $i=1;?>
              <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>00<?php echo e($i++); ?></td>
                <td><?php echo e($branch->name); ?></td>
                <td><?php echo e($branch->phone); ?></td>
                <td><?php echo e($branch->email); ?></td>
                <td><?php echo e($branch->address); ?></td>
                <td><?php echo e($branch->shift); ?></td>
               
                <td><a href="<?php echo e(url('branches/edit/'.$branch->id)); ?>" class="btn btn-xs btn-primary">Statement</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </tfoot>
              </table>

     </div>



    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/admin/cashiers/cashierList.blade.php ENDPATH**/ ?>