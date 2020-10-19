<?php $__env->startSection('title', __('Copy Right')); ?>
<?php $__env->startSection('main'); ?>

 
        <!-- Content -->
<section class="ask-forum-sec" style="background-color: white;">
    <div id="content" class="container">
        <?php $__currentLoopData = $copyright; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <p><?php echo $value->copyright; ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/pages/copyright.blade.php ENDPATH**/ ?>