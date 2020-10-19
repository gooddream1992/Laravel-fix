<?php $__env->startSection('title', __('Purchase Marketing')); ?>
<?php $__env->startSection('main'); ?>

        <section class=" innerpage-banner">
            <img src="<?php if(isset($data[0]->image)): ?><?php echo e(asset('public/purchasemarketing/'.$data[0]->image)); ?> <?php endif; ?>" class="w-100 inner-ban-img" alt="banner image" />
            <div class="container">
                <div class="ban-text c-center">
                </div>
            </div>
        </section>
        <!-- Content -->
        <div id="content">
           <section class="get-body-sec row-am">
            <div class="container">
            <?php if(isset($data[0]->title)): ?>
              <h1 align="center"><?php echo e($data[0]->title); ?></h1>
              <?php endif; ?>
            <?php if(isset($data[0]->description)): ?>
              <?php echo e($data[0]->description); ?>

              <?php endif; ?>
            </div>
            </section>
        </div>
        <!-- Content END -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/provider/readmore_purchase.blade.php ENDPATH**/ ?>