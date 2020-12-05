<?php $__env->startSection('title', 'Escort - Photos'); ?>

<?php $__env->startSection('content'); ?>

<style>
.remove-img-btn
{
    position: absolute;
    top: 50%;
    left: 50%;
    background-color: #f8060a;
    color: #fff;
    transform: translate(-50%,-50%);
    line-height: normal;
    height: 38px;
    width: 38px;
    text-align: center;
    line-height: 38px;
    border-radius: 4px;
    box-shadow: 0px 0px 15px 2px rgba(0,0,0,0.8);
    display: none;
}
</style>

<form method="POST" action="<?php echo e(route('profile.photos.store', $id)); ?>" enctype="multipart/form-data" id="imageFormProfile">
    <?php echo csrf_field(); ?>

    <?php echo $__env->make('partials._profileSteps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="clearfix row">
        <div class="col-md-12">
            <div class="form-box">
                <div class="box-body">
                    <div class="gallery-grid-box">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#photo-gallery" onclick="setStatus(2)">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#slider" onclick="setStatus(1)">Slider</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#video" onclick="setStatus(3)">Video</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#selfie-gallery" onclick="setStatus(4)">Selfie Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#thumbnail-gallery" onclick="setStatus('thumbnail')">Thumbnail Photo</a>
                            </li>
                        </ul>
    
<?php
    $user = \app\User::where('id','=',$id)->get();    
    // echo Auth::user()->roleStatus; exit;
?>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            
                            <div class="tab-pane  active" id="photo-gallery">
                                <div class="gallery-image-grid">
                                    <div class="row">
                                        
                                        <!-- Capture Verfication Image Show Below -->
                                        <?php if(Session::has('main_login_type') && Auth::user()->parent_id == ''): ?>
                                            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                <?php if(!empty($value->verification_photo)): ?>
                                                <div class="col-lg-12 col-md-12 gallery-img-box" style="padding-left: 40%;">
                                                    <a href="#">
                                                        <img src="<?php echo e(asset('public/verification/'.$value->verification_photo)); ?>">   
                                                    </a>
                                                </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <!-- Capture Verfication Image Show Above -->

                                        <?php if(array_key_exists('gallery', $images)): ?>
                                            <?php $__currentLoopData = $images['gallery']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-3 col-md-6 gallery-img-box">
                                                    <a href="<?php echo e(route('profile.photos.show', [$id, $image->id])); ?>" >
                                                        <img src="/public/uploads/<?php echo e($image->image); ?>" class="w-100" />
                                                    </a>
                                                     <a href="<?php echo e(route('profile.delete',[$id,$image->id,$image->image])); ?>" class="remove-img-btn"><i class="icofont-close"></i></a>
                                                </div>                                                
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div> 
                            
                            
                            <div class="tab-pane  fade" id="slider">
                                <div class="gallery-image-grid">
                                    <div class="row">
                                        <?php if(array_key_exists('slider', $images)): ?>
                                            <?php $__currentLoopData = $images['slider']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="gallery-img-box col-lg-3 col-md-6">
                                                <a href="<?php echo e(route('profile.photos.show', [$id, $image->id])); ?>">
                                                        <img src="/public/uploads/<?php echo e($image->image); ?>" class="w-100" />
                                                    </a>
                                                    <a href="<?php echo e(route('profile.delete',[$id,$image->id,$image->image])); ?>" class="remove-img-btn"><i class="icofont-close"></i></a>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
    
                            
                            <div class="tab-pane  fade" id="video">
                                <div class="gallery-image-grid">
                                    <div class="row">
                                    <?php if(array_key_exists('video', $images)): ?>
                                        <?php $__currentLoopData = $images['video']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="gallery-img-box col-lg-3 col-md-6">
                                            <a class="" href="<?php echo e(route('profile.photos.show', [$id, $image->id])); ?>">
                                                    
                                                    <?php
                                                        $ext = pathinfo( asset('public/uploads/'.$image->image), PATHINFO_EXTENSION);
                                                    ?>
                                                    <?php if($ext == 'mp4' || $ext == 'webm'): ?>
                                                        <video width="358" height="268" controls>
                                                            <source src="<?php echo e(asset('public/uploads/'.$image->image)); ?>" type="video/mp4">
                                                        </video>
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('public/uploads/'.$image->image)); ?>" class="w-100">
                                                    <?php endif; ?>

                                                </a>
                                                    <a href="<?php echo e(route('profile.delete',[$id,$image->id,$image->image])); ?>" class="remove-img-btn"><i class="icofont-close"></i></a>
                                                </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>    
                                    </div>
                                </div>
                            </div>
    
                            
                            <div class="tab-pane  fade" id="selfie-gallery">
                                <div class="gallery-image-grid">
                                    <div class="row">
                                        <?php if(array_key_exists('selfie', $images)): ?>
                                            <?php $__currentLoopData = $images['selfie']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="gallery-img-box col-lg-3 col-md-6">
                                                    <a href="<?php echo e(route('profile.photos.show', [$id, $image->id])); ?>">
                                                        <img src="/public/uploads/<?php echo e($image->image); ?>" class="w-100" />
                                                    </a>
                                                    <a href="<?php echo e(route('profile.delete',[$id,$image->id,$image->image])); ?>" class="remove-img-btn"><i class="icofont-close"></i></a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
    
                            <div class="tab-pane  fade" id="thumbnail-gallery">
                                <div class="gallery-image-grid">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="gallery-img-box">
                                                <?php if(array_key_exists('thumbnail', $images)): ?>
                                                    <?php $__currentLoopData = $images['thumbnail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <input type="hidden" name="old_photo" value="<?php echo e($image->image); ?>">
                                                        <img src="/public/uploads/<?php echo e($image->image); ?>" class="w-100" />
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="status" id="status" value="2">

    <div class="d-flex mt-4">
        <div class="custom-file w-25">
            <input type="file" class="custom-file-input" id="customFile" name="uploaded_image[]" multiple="multiple">
            <label class="custom-file-label text-white" for="customFile"></label>
        </div>
        <!-- <button class="submit-btn px-3 py-0 ml-3">Upload Image</button> -->
    </div>
    <p style="color: red;padding: 18px 0px;display:none;" id="thumbnail_err">*Add Portrait side (best fit size 320 x 470 pixel)</p>
</form>

<script>
    function setStatus(status) {
        if(status=='thumbnail')
        {
            $("#thumbnail_err").show();
        }
        else
        {
            $("#thumbnail_err").hide();
        }
        if(status==3)
        {
            $("#customFile").attr('accept','video/*');
        }
        else{
            $("#customFile").attr('accept','');
        }
        $('#status').val(status);
    }

    $("#customFile").change(function(){
        $("#imageFormProfile").submit();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.profileMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/new/profile/profilePhotos.blade.php ENDPATH**/ ?>