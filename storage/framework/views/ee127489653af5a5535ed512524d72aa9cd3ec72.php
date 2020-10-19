<?php $__env->startSection('main'); ?>

<div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Profile Edit')); ?></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(url('profile/update')); ?>">
                        <?php echo csrf_field(); ?>


                       <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                       <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>">
                            </div>
                        </div>

                     
                      <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Shift Status')); ?></label>

                            <div class="col-md-6">
                               <select name="shift" class="form-control"  value="<?php echo e($user->shift); ?>">
                                   <option value="1">1st Shift</option>
                                   <option value="2">2nd Shift</option>
                               </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Phone')); ?></label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" value="<?php echo e($user->phone); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Address')); ?></label>

                            <div class="col-md-6">
                               <textarea name="address" class="textarea"><?php echo e($user->address); ?></textarea>
                            </div>
                        </div>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Update Profile')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/admin/general_setting/userProfileEdit.blade.php ENDPATH**/ ?>