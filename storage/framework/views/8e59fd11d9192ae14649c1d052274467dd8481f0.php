<?php $__env->startSection('title', 'Profile'); ?>
<?php $__env->startSection('header_title', 'Profile'); ?>
<?php $__env->startSection('home'); ?>
<?php $__currentLoopData = $client_profile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profileValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                        <label>Country</label>
                                                        <select class="form-control" name="country" id="selectCountry">
                                                            <option></option>
                                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($country->id); ?>"
                                                                <?php echo e((!empty($profileValue->country) && $country->id == $profileValue->country) ? 'selected' : ''); ?>>
                                                                <?php echo e($country->country); ?>

                                                            </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <select class="form-control" name="city" id="selectCity">
                                                            <option>City</option>
                                                        </select>
                                                        <input type="hidden" name="" value="<?php echo e($profileValue->state); ?>" id="city_name">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label>You Are<!-- Male/female/trans/gay --></label>
                                                            <select class="form-control" name="gender" id="gender">
                                                                <option value="">Gender</option>
                                                                <option value="1" <?php echo e((!empty($profileValue->gender) && $profileValue->gender == 1) ? 'selected' : ''); ?>>Male</option>
                                                                <option value="2" <?php echo e((!empty($profileValue->gender) && $profileValue->gender == 2) ? 'selected' : ''); ?>>Female</option>
                                                                <option value="3" <?php echo e((!empty($profileValue->gender) && $profileValue->gender == 3) ? 'selected' : ''); ?>>Trans gender</option>
                                                                <option value="4" <?php echo e((!empty($profileValue->gender) && $profileValue->gender == 4) ? 'selected' : ''); ?>>Gay</option>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <?php
                                                        $interested_in = empty($profileValue->interested_in) ? '' : explode(" , ",$profileValue->interested_in);
                                                    ?>
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label>Interested In<!-- Male/female/trans/gay --></label>
                                                            <bR>
                                                            <label>Male<!-- Male/female/trans/gay --></label>
                                                            <input type="checkbox" name="interested_in_male" value="1" <?php if(!empty($profileValue->interested_in_male) && $profileValue->interested_in_male == 1): ?> checked <?php endif; ?>>
                                                            <label>Female<!-- Male/female/trans/gay --></label>
                                                            <input type="checkbox" name="interested_in_female" value="2" <?php if(!empty($profileValue->interested_in_female) && $profileValue->interested_in_female == 2): ?> checked <?php endif; ?>>
                                                            <label>Trans gender<!-- Male/female/trans/gay --></label>
                                                            <input type="checkbox" name="interested_in_trans" value="3" <?php if(!empty($profileValue->interested_in_trans) && $profileValue->interested_in_trans == 3): ?> checked <?php endif; ?>>
                                                            <label>Gay<!-- Male/female/trans/gay --></label>
                                                            <input type="checkbox" name="interested_in_gay" value="4" <?php if(!empty($profileValue->interested_in_gay) && $profileValue->interested_in_gay == 4): ?> checked <?php endif; ?>>
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
                                                        <select name="nationality" class="form-control">
                                                            <option value="">Nationality</option>
                                                            <?php $__currentLoopData = $nationalities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($nationality->id); ?>" <?php if($nationality->id == $profileValue->nationality): ?> selected <?php endif; ?>>
                                                                    <?php echo e($nationality->dropdownTitle); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Single Couple</label>
                                                        <select class="form-control" name="single_couple">
                                                            <option value="">Please Select</option>
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
                                                        <label class="text-white">Profile Image</label>
                                                        <br>
                                                        <div class="file btn btn-lg btn-dark w-100">
                                                            <i class="icofont-camera" style="color: eecf;"></i>
                                                            <input type="file" name="imageurl"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mt-2 mb-3 px-5">
                                                        <?php if(!empty($profileValue->photo)): ?>
                                                            <img src="<?php echo e(asset('public/uploads/'.$profileValue->photo)); ?>" width="300px" />
                                                            <input type="hidden" name="imageurl" value="<?php if(isset($profileValue->photo)): ?> <?php echo e($profileValue->photo); ?> <?php endif; ?>">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('public/client_library/image/no_image_found.png')); ?>" width="300px" />
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
                                    <button class="submit-btn large">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <script>
            $(document).ready(function () {
                $('#selectCountry').on('change',function(){
                    var country = this.value;
                    $.ajax({
                        url: "<?php echo e(route('getCity')); ?>",
                        method: 'POST',
                        data: { "_token": "<?php echo e(csrf_token()); ?>",'country_id':country },
                        success: function (data) {
                            console.log(data);
                             $('#selectCity').html(data);
                        } 
                    });
                });

                var countries = $('#selectCountry').val();
                if(countries != ''){
                    var city_name = $('#city_name').val();
                    $.ajax({
                        url: "<?php echo e(route('getCity')); ?>",
                        method: 'POST',
                        data: { "_token": "<?php echo e(csrf_token()); ?>",'country_id':countries,'city_name':city_name },
                        success: function (data) {
                             $('#selectCity').html(data);
                        } 
                    });    
                }
                
            });
            

            // function getCities() {
            //     $.ajax({
            //         url: "<?php echo e(route('get_cities')); ?>",
            //         method: 'GET',
            //         data: { 'country_id': $('#selectCountry').find(':selected').val() },
            //         success: function (data) {
            //             $('#selectCity').text(' ');
            //             for (var k = 0; k < data.cities.length; k++) {
            //                 $('#selectCity').append('<option value="' + data.cities[k].city + '">' + data.cities[k].city + '</option>');
            //             }
                        
            //             let cityOptions = document.querySelector('#selectCity').options;
            //             for (i = 0; i < cityOptions.length; i++) {
            //                 <?php if(isset($city_id)): ?>
            //                     if (cityOptions[i].value == <?php echo e($city_id); ?> ) {
            //                         cityOptions[i].setAttribute('selected', true)
            //                     }
            //                 <?php endif; ?>
            //             }
            //         },
            //         error: function (err) {
            //             console.log(err);
            //         }
            //     })
            // }

        </script>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('client.master.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/client/profile/index.blade.php ENDPATH**/ ?>