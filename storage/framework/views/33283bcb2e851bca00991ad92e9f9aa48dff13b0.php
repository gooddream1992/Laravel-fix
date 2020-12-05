<?php $__env->startSection('title', 'Escort - Photos'); ?>

<?php $__env->startSection('content'); ?>
<div>
    <a href="<?php echo e(route('profile.photos.index', $id)); ?>" class="submit-btn px-3 py-2">
        <i class="icofont-double-left"></i>
        Go Back
    </a>
    
    <div class="gallery-img-box mt-5">
        <img src="/public/uploads/<?php echo e($image->image); ?>" width="350px" />
    </div>
    
    <div class="mt-5 d-flex justify-content-between">
        <form class="d-flex" method="POST" action="<?php echo e(route('profile.photos.update', $image->id)); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="custom-file" style="width: 300px">
                <input type="file" class="custom-file-input" id="customFile" name="uploaded_image">
                <label class="custom-file-label text-white" for="customFile"></label>
            </div>
        
            <button class="submit-btn px-3 py-0 ml-3" type="submit">Update Image</button>
        </form>

        <form method="POST" action="<?php echo e(route('profile.photos.delete', [$id, $image->id])); ?>">
            <?php echo csrf_field(); ?>
            <button class="submit-btn px-3 py-0" type="submit">Delete Image</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.profileMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/new/profile/profilePhotosUpdate.blade.php ENDPATH**/ ?>