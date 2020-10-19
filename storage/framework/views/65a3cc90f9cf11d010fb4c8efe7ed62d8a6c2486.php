<?php $__env->startSection('title', 'Profile'); ?>
<?php $__env->startSection('header_title', 'Profile'); ?>
<?php $__env->startSection('home'); ?>
 <div class="col-md-9 right-content">
                    <div class="box multi_step_form">
                        <form method="post" enctype="multipart/form-data" action="<?php echo e(route('client.profile.image.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($user[0]->id); ?>">
                            <div class="clearfix row ">
                                <div class="col-md-12">
                                    <ul id="progressbar">
                                        <li class="active icon-1"><a href="profile-step-1.html"><span>Profile Stats</span></a></li>  
                                        <!-- <li class="active icon-2"><a href="profile-step-2.html"><span>Biography</span></a></li> 
                                        <li class="active icon-3"><a href="profile-step-3.html"><span>Services</span></a></li> -->
                                        <li class="active icon-4"><a href="profile-step-4.html"><span>Photos</span></a></li>
                                        <li class="icon-5"><a href="profile-step-5.html"><span>Verification</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix row">
                                <div class="col-md-12">
                                    <div class="form-box">
                                        <div class="box-body">
                                            <div class="gallery-grid-box">
<!--                                                 <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#photo-gallery">Gallery</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#slider">Slider</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#video">Video</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#selfie-gallery">Selfie Gallery</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#thumbnail-gallery">Thumbnail Photo</a>
                                                    </li>
                                                </ul> -->

                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div class="tab-pane  active" id="photo-gallery">
                                                        <div class="gallery-image-grid">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-6">
                                                                	<div class="gallery-img-box">
														                  <div class="custom-file gray-upload">
														                     <input type="file" class="custom-file-input" id="customFile" name="imageurl">
                                                                             <input type="hidden" name="imageurl" value="<?php if(isset($user[0]->photo)): ?> <?php echo e($user[0]->photo); ?> <?php endif; ?>">
														                     <label class="custom-file-label" for="customFile"></label>
														                  </div>
                                                                	</div>
                                                                </div>
                                                                <div class="col-lg-3 col-md-6">
                                                                	<div class="gallery-img-box">
                                                                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php if(!empty($userValue->photo)): ?>
                                                                		        <img src="<?php echo e(asset('public/uploads/'.$userValue->photo)); ?>" class="w-100" style="width: 100px; height: 300px;" />
                                                                            <?php else: ?>
                                                                                <img src="<?php echo e(asset('public/client_library/image/no_image_found.png')); ?>" class="w-100" style="width: 100px; height: 300px;" />
                                                                            <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="submit-btn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <!-- Content END -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.master.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/client/profile/profileImage.blade.php ENDPATH**/ ?>