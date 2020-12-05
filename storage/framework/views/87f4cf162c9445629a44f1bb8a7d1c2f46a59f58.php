<?php $__env->startSection('title', 'Escort - Profile Stats'); ?>

<?php $__env->startSection('content'); ?>

<form method="POST" action="<?php echo e(route('profile.stats.update', $id)); ?>">
    <?php echo csrf_field(); ?>

    <?php echo $__env->make('partials._profileSteps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="clearfix row">
        <div class="col-md-6 ">
            <div class="form-box">
                <div class="box-header">
                    <h3>Basic Information</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" 
                            value="<?php echo e(!empty($escort->name) ? $escort->name : ''); ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" 
                            value="<?php echo e(!empty($escort->email) ? $escort->email : ''); ?>">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" 
                            value="<?php echo e(!empty($escort->phone) ? $escort->phone : ''); ?>">
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <select class="form-control" name="country" id="selectCountry" onchange="getCities()">
                            <option value="">Country</option>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($country->id); ?>"
                                <?php echo e((!empty($escort->country) && $country->id == $escort->country) ? 'selected' : ''); ?>>
                                <?php echo e($country->country); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <select class="form-control" name="city" id="selectCity">
                            <option value="">Select City</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="form-box">
                <div class="box-header">
                    <h3>Social Information</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Social Media</label>
                                <select id="social-media1" class="form-control social-media" name="social_mediaVal1">
                                    <option value="">Social Media</option>
                                    <?php $__currentLoopData = $social_media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->socail_media_url); ?>" <?php if($escort->sm_label_one == $value->socail_media_url): ?> selected <?php endif; ?>>
                                        <?php echo e($value->socail_media_url); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group social-media-url">
                                <label id="socail-media-url1">Socail Media Url</label>
                                <input type="text" name="social1" class="form-control" value="<?php echo e($escort->snapchat); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Social Media</label>
                                <select id="social-media2" class="form-control social-media" name="social_mediaVal2">
                                    <option value="">Social Media</option>
                                    <?php $__currentLoopData = $social_media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->socail_media_url); ?>"  <?php if($escort->sm_label_two == $value->socail_media_url): ?> selected <?php endif; ?>>
                                        <?php echo e($value->socail_media_url); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group social-media-url">
                                <label id="socail-media-url2">Socail Media Url</label>
                                <input type="text" name="social2" class="form-control" value="<?php echo e($escort->facebook); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Social Media</label>
                                <select id="social-media3" class="form-control social-media" name="social_mediaVal3">
                                    <option value="">Social Media</option>
                                    <?php $__currentLoopData = $social_media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->socail_media_url); ?>" <?php if($escort->sm_label_three == $value->socail_media_url): ?> selected <?php endif; ?>>
                                        <?php echo e($value->socail_media_url); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group social-media-url">
                                <label id="socail-media-url3">Socail Media Url</label>
                                <input type="text" name="social3" class="form-control" value="<?php echo e($escort->whatsup); ?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" name="website" class="form-control" 
                            value="<?php echo e(!empty($escort->website) ? $escort->website : ''); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix row" style="margin: 25px -15px 20px;">
        <div class="col-md-12 ">
            <div class="form-box">
                <div class="box-header">
                    <h3>Other Information</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Suburb</label>
                                <input type="text" name="suburb" class="form-control" 
                                value="<?php echo e(!empty($escort->city) ? $escort->city : ''); ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Male/female/trans/gay</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="">Gender</option>
                                    <option value="1" <?php echo e((!empty($escort->gender) && $escort->gender == 1) ? 'selected' : ''); ?>>Male</option>
                                    <option value="2" <?php echo e((!empty($escort->gender) && $escort->gender == 2) ? 'selected' : ''); ?>>Female</option>
                                        <option value="3" <?php echo e((!empty($escort->gender) && $escort->gender == 3) ? 'selected' : ''); ?>>Trans gender</option>
                                    <option value="4" <?php echo e((!empty($escort->gender) && $escort->gender == 4) ? 'selected' : ''); ?>>Gay</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Straight/bi/gay</label>
                                <select class="form-control" name="straight">
                                    <option value="">Straight/bi/gay</option>
                                    <option value="1" <?php echo e((!empty($escort->straight) && $escort->straight == 1) ? 'selected' : ''); ?>>Straight</option>
                                    <option value="2" <?php echo e((!empty($escort->straight) && $escort->straight == 2) ? 'selected' : ''); ?>>Bi</option>
                                    <option value="3" <?php echo e((!empty($escort->straight) && $escort->straight == 3) ? 'selected' : ''); ?>>Gay</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Height</label>
                                <input type="text" name="height" class="form-control" 
                                    value="<?php echo e(!empty($escort->height) ? $escort->height : ''); ?>">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Age</label>
                                <input type="text" name="age" class="form-control" 
                                    value="<?php echo e(!empty($escort->age) ? $escort->age : ''); ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Hair</label>
                                <select class="form-control" name="hair">
                                    <option value="">Hair</option>
                                    <?php if(array_key_exists('hair', $escort_dropdowns)): ?>    
                                        <?php $__currentLoopData = $escort_dropdowns['hair']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($hair->id); ?>" <?php echo e((!empty($escort->hair) && $escort->hair == $hair->id) ? 'selected' : ''); ?>>
                                            <?php echo e($hair->dropdownTitle); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Eyes</label>
                                <select class="form-control" name="eyes">
                                    <option value="">Eyes</option>
                                    <?php if(array_key_exists('eyes', $escort_dropdowns)): ?>    
                                        <?php $__currentLoopData = $escort_dropdowns['eyes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eyes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($eyes->id); ?>" <?php echo e((!empty($escort->eyes) && $escort->eyes == $eyes->id) ? 'selected' : ''); ?>>
                                            <?php echo e($eyes->dropdownTitle); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Dress</label>
                                <input type="text" name="dress" class="form-control" id="dress"
                                    value=" <?php echo e(!empty($escort->dress) ? $escort->dress : ''); ?>">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Bust</label>
                                <input type="text" name="bust" class="form-control" 
                                    value="<?php echo e(!empty($escort->bust) ? $escort->bust : ''); ?>" id="bust">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Body Shape</label>
                                <select class="form-control" name="body_shape">
                                    <option value="">Body Shape</option>
                                    <?php if(array_key_exists('body_shape', $escort_dropdowns)): ?>    
                                        <?php $__currentLoopData = $escort_dropdowns['body_shape']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $body_shape): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($body_shape->id); ?>" <?php echo e((!empty($escort->bodyShape) && $escort->bodyShape == $body_shape->id) ? 'selected' : ''); ?>>
                                            <?php echo e($body_shape->dropdownTitle); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Nationality</label>
                                <select class="form-control" name="nationality">
                                    <option value="">Nationality</option>
                                    <?php if(array_key_exists('nationality', $escort_dropdowns)): ?>    
                                        <?php $__currentLoopData = $escort_dropdowns['nationality']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($nationality->id); ?>" <?php echo e((!empty($escort->nationality) && $escort->nationality == $nationality->id) ? 'selected' : ''); ?>>
                                            <?php echo e($nationality->dropdownTitle); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Personality Type</label>
                                <input type="text" name="personality_type" class="form-control" 
                                    value="<?php echo e(!empty($escort->personal_type) ? $escort->personal_type : ''); ?>">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Service Offering</label>
                                <!--<input type="text" class="form-control" >-->
                                <select class="form-control" name="services_offering">
                                    <option value="">Service Offering</option>
                                    <option value="1" <?php echo e((!empty($escort->pet) && $escort->pet == 1) ? 'selected' : ''); ?>>Escort</option>
                                    <option value="2" <?php echo e((!empty($escort->pet) && $escort->pet == 2) ? 'selected' : ''); ?>>Massage </option>
                                    <option value="3" <?php echo e((!empty($escort->pet) && $escort->pet == 3) ? 'selected' : ''); ?>>BDSM</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Favourite Drink</label>
                                <input type="text" name="drink" class="form-control" 
                                    value="<?php echo e(!empty($escort->drink) ? $escort->drink : ''); ?>">
                            </div>
                        </div>
                        <!-- <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Favourite Food</label>
                                <input type="text" name="food" class="form-control" 
                                    value="<?php echo e(!empty($escort->food) ? $escort->food : ''); ?>">
                            </div>
                        </div> -->

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Service Area</label>
                                <select class="form-control" name="serviceArea">
                                    <option value="">Service Area</option>
                                    <option value="1" <?php if($escort->serviceArea == 1): ?> selected <?php endif; ?>>Incall</option>
                                    <option value="2" <?php if($escort->serviceArea == 2): ?> selected <?php endif; ?>>Outcall</option>
                                    <option value="3" <?php if($escort->serviceArea == 3): ?> selected <?php endif; ?>>Both</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label>Couples Service </label>
                                <select class="form-control" name="service_provider">
                                    <option value="">Couples Service</option>
                                    <option value="1" <?php echo e((!empty($escort->service) && $escort->service == 1) ? 'selected' : ''); ?>>Yes</option>
                                    <option value="2" <?php echo e((!empty($escort->service) && $escort->service == 2) ? 'selected' : ''); ?>>No</option>
                                </select> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="submit-btn">Submit</button>
        </div>
    </div>

</form>

<script>
$(document).ready(function () {
    getCities()    
});

function getCities() {
    $.ajax({
        url: "<?php echo e(route('get_cities')); ?>",
        method: 'GET',
        data: { 'country_id': $('#selectCountry').find(':selected').val() },
        success: function (data) {
            $('#selectCity').text(' ');
            for (var k = 0; k < data.cities.length; k++) {
                $('#selectCity').append('<option value="' + data.cities[k].id + '">' + data.cities[k].city + '</option>');
            }
            
            let cityOptions = document.querySelector('#selectCity').options;
            for (i = 0; i < cityOptions.length; i++) {
                <?php if(isset($escort->state)): ?>
                    if (cityOptions[i].value == <?php echo e($escort->state); ?> ) {
                        cityOptions[i].setAttribute('selected', true)
                    }
                <?php endif; ?>
            }
        },
        error: function (err) {
            console.log(err);
        }
    })
}

$(document).ready(function(){
    if($("#gender").val() == 1)
    {
        $('#dress').val('N/A');
        $('#dress').attr('readonly',true);
        $('#bust').val('N/A');
        $('#bust').attr('readonly',true);
    }else{
        //$('#dress').val('');
        $('#dress').attr('readonly',false);
        //$('#bust').val('');
        $('#bust').attr('readonly',false);
    }
    // $("#social-media1").on('change',function(){
    //     $("#socail-media-url1").empty();
    //     $("#socail-media-url1").append(this.value);
    //     //$("#socail-media-url1").val(this.value);
    // });
    // $("#social-media2").on('change',function(){
    //     $("#socail-media-url2").empty();
    //     $("#socail-media-url2").append(this.value);
    //     //$("#socail-media-url1").val(this.value);
    // });
    // $("#social-media3").on('change',function(){
    //     $("#socail-media-url3").empty();
    //     $("#socail-media-url3").append(this.value);
    //     //$("#socail-media-url1").val(this.value);
    // });

    $('#gender').on('change',function(){
        if(this.value == 1){
            $('#dress').val('N/A');
            $('#dress').attr('readonly',true);
            $('#bust').val('N/A');
            $('#bust').attr('readonly',true);
        }else{
            $('#dress').val('');
            $('#bust').val('');
            $('#bust').attr('readonly',false);
            $('#dress').attr('readonly',false);
        }
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.profileMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/new/profile/profileStats.blade.php ENDPATH**/ ?>