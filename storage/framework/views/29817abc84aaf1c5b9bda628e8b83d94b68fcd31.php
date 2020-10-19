

<?php $__env->startSection('title', __('User List')); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">User List</h3>
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
                <th><?php echo e(__('User Name')); ?></th>
                <th><?php echo e(__('Activation')); ?></th>
                
                <th><?php echo e(__('Role')); ?></th>
                <th><?php echo e(__('Gender')); ?></th>
                <th><?php echo e(__('Phone No.')); ?></th>
                <th><?php echo e(__('Email')); ?></th>
                <th><?php echo e(__('Address')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $users =\App\User::all();?>
                 <?php $i=1;?>
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>00<?php echo e($i++); ?></td>
                <td><?php echo e($user->name); ?></td>
                <td><?php if($user->activation==1): ?> <a href="" class="btn btn-success">Active</a> <?php else: ?> <a href="" class="btn btn-warning">Deactive</a> <?php endif; ?></td>
                <td><?php if($user->roleStatus==1): ?> Admin <?php elseif($user->roleStatus==2): ?> Escort <?php else: ?> User <?php endif; ?></td>
                 <td><?php if($user->gender==1): ?> Male <?php elseif($user->gender==2): ?> Female <?php else: ?> Guy <?php endif; ?></td>
                <td><?php echo e($user->phone); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td><?php echo e($user->country); ?>, <?php echo e($user->city); ?>, <?php echo e($user->suburb); ?>, <?php echo e($user->code); ?></td>

               
                <td><a href="<?php echo e(url('escort/modify/'.$user->id)); ?>" class="btn btn-xs btn-primary">Modify</a> <a href="<?php echo e(url('branches/edit/'.$user->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </tfoot>
              </table>

     </div>



    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/general_setting/userList.blade.php ENDPATH**/ ?>