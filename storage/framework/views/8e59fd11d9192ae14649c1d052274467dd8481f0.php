   
<?php $__env->startSection('title', 'Profile'); ?>
<?php $__env->startSection('header_title', 'Profile'); ?>
<?php $__env->startSection('home'); ?>
<?php $__currentLoopData = $client_profile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profileValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php 
/*echo "<pre>";
print_r($profileValue);
exit;*/
?>
                <div class="col-md-9 right-content">
                    <div class="box multi_step_form">
                        <form method="post" action="<?php echo e(route('client.profile.upgrade')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($profileValue->id); ?>">
                            <div class="clearfix row mb-4">
                                <div class="col-md-12 ">
                                    <div class="form-box">
                                        <div class="box-header">
                                            <h3>Basic Information</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" value="<?php if(isset($profileValue->name)): ?> <?php echo e($profileValue->name); ?> <?php endif; ?>" name="name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Age</label>
                                                        <input type="text" class="form-control" name="age" value="<?php echo e($profileValue->age); ?>"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Location</label>
                                                        <input type="text" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="d-block">Sex</label>
                                                        <div class="radiobuttons">
                                                            <div class="rdio rdio-primary radio-inline"> 
                                                                <input value="1" type="radio" name="gender" <?php if(isset($profileValue->gender) && $profileValue->gender == 1): ?> Checked <?php endif; ?>>
                                                                <label for="radio1">Male</label>
                                                            </div>
                                                            <div class="rdio rdio-primary radio-inline">
                                                                <input value="2" type="radio" name="gender" <?php if(isset($profileValue->gender) && $profileValue->gender == "2"): ?> Checked <?php endif; ?>>
                                                                <label for="radio2">Female</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" value="<?php if(isset($profileValue->email)): ?> <?php echo e($profileValue->email); ?> <?php endif; ?>" name="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Profession</label>
                                                        <input type="text" class="form-control" name="profession" value="<?php if(isset($profileValue->profession)): ?> <?php echo e($profileValue->profession); ?> <?php endif; ?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Nationality</label>
                                                        <select name="country" class="form-control" id="country">
                                                            <option value="">Nationality</option>
                                                            <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countryValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($countryValue->id); ?>" <?php if($countryValue->id == $profileValue->country): ?> selected <?php endif; ?>>
                                                                    <?php echo e($countryValue->country); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Single Couple</label>
                                                        <select class="form-control" name="single_couple">
                                                            <option>Please Select</option>
                                                            <option value="1" <?php if(isset($profileValue->single_couple) && $profileValue->single_couple == 1): ?> selected <?php endif; ?>>Single</option>
                                                            <option value="2" <?php if(isset($profileValue->single_couple) && $profileValue->single_couple == 2): ?> selected <?php endif; ?>>Couple</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Personality Type</label>
                                                        <input type="text" class="form-control" value="<?php if(isset($profileValue->personal_type)): ?> <?php echo e($profileValue->personal_type); ?> <?php endif; ?>" name="personal_type" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Biography</label>
                                                        <textarea class="form-control large" name="biography">
                                                            <?php if(isset($profileValue->biography)): ?> <?php echo e($profileValue->biography); ?> <?php endif; ?>
                                                        </textarea>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="cust-profile-upload mt-2 mb-3">
                                                        <label>Profile Image</label>
                                                        <div class="file btn btn-lg btn-primary">
                                                            <i class="icofont-camera" style="color: eecf;"></i>
                                                            <input type="file" name="imageurl"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="cust-profile-upload mt-2 mb-3">
                                                            <?php if(!empty($profileValue->photo)): ?>
                                                                <img src="<?php echo e(asset('public/uploads/'.$profileValue->photo)); ?>" class="w-100" style="width: 50px; height: 300px;" />
                                                                <input type="hidden" name="imageurl" value="<?php if(isset($profileValue->photo)): ?> <?php echo e($profileValue->photo); ?> <?php endif; ?>">
                                                            <?php else: ?>
                                                                <img src="<?php echo e(asset('public/client_library/image/no_image_found.png')); ?>" class="w-100" style="width: 50px; height: 300px;" />
                                                            <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix row">
                                <div class="col-md-12 ">
                                    <div class="form-box profile-other-info-fields">
                                        <div class="box-header">
                                            <h3>Social Links <span>( Optional )</span></h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Instagram</label>
                                                        <input type="text" class="form-control" name="instagram" value="<?php if(isset($profileValue->instagram)): ?> <?php echo e($profileValue->instagram); ?> <?php endif; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Facebook</label>
                                                        <input type="text" class="form-control" name="facebook" value="<?php if(isset($profileValue->facebook)): ?> <?php echo e($profileValue->facebook); ?> <?php endif; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="submit-btn large">Create Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('client.master.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/client/profile/index.blade.php ENDPATH**/ ?>