<?php $__env->startSection('title', __('Index')); ?>
<?php $__env->startSection('main'); ?>
<center><h1>Dashboard of <?php echo e(Auth::user()->name); ?></h1></center>
 <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="<?php echo e(route('admin.logout')); ?>">
                                        <i class="fas fa-key"></i>
                                        <h3>Logout</h3>
                                    </a>
                                </div>
                            </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe-front\resources\views/homeClient.blade.php ENDPATH**/ ?>