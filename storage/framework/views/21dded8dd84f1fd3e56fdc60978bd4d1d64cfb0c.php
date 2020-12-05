<?php $__env->startSection('title', 'Escort - Services'); ?>

<?php $__env->startSection('content'); ?>
<form method="POST" action="<?php echo e(route('profile.services.update', $id)); ?>">
    <?php echo csrf_field(); ?>

    <?php echo $__env->make('partials._profileSteps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="clearfix row">
        <div class="col-md-12 ">
            <div class="form-box">
                <div class="box-header">
                    <h3>Avaialability</h3>
                </div>
                <div class="box-body">
                    <div class="table-step3-wishlist availability-table table-responsive">
                        <table class="table w-100">
                            <thead>
                                <tr>
                                    <th scope="col">Weekly</th>
                                    <th scope="col">Avail 24hrs</th>
                                    <th scope="col">From</th>
                                    <th scope="col">To</th>
                                    <th scope="col" id="important-information">Important Information (Optional)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $week_days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $week_day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td data-label="Weekly"><?php echo e(Str::ucfirst($week_day)); ?></td>
                                    <td data-label="Avail 24hrs">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input weekday-check-field" id="check-<?php echo e($week_day); ?>" 
                                                name="availability[<?php echo e($week_day); ?>][available24]" onchange="toggleFields('<?php echo e($week_day); ?>')"
                                                <?php echo e((!empty($availability[$week_day]->available24) && $availability[$week_day]->available24) ? 'checked' : ''); ?>>
                                            <label class="custom-control-label" for="check-<?php echo e($week_day); ?>">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td data-label="From">
                                        <div class="form-group mb-0 custom-time-pick">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <input type="text" class="form-control <?php echo e($week_day . '-field'); ?>"
                                                        name="availability[<?php echo e($week_day); ?>][from]"
                                                        value="<?php echo e(!empty($availability[$week_day]->fromDate) ? $availability[$week_day]->fromDate : ''); ?>"/>
                                                </div>
                                                <select class="form-control <?php echo e($week_day . '-field'); ?>" name="availability[<?php echo e($week_day); ?>][from_indicator]">
                                                    <option style="color:black" value="AM" 
                                                        <?php echo e((!empty($availability[$week_day]->fromIndicator) && $availability[$week_day]->fromIndicator == 'AM') 
                                                            ? 'selected' : ''); ?>>
                                                            AM
                                                    </option>

                                                    <option style="color:black" value="PM" 
                                                        <?php echo e((!empty($availability[$week_day]->fromIndicator) && $availability[$week_day]->fromIndicator == 'PM') 
                                                            ? 'selected' : ''); ?>>
                                                            PM
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="To">
                                        <div class="form-group mb-0 custom-time-pick">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <input type="text" class="form-control <?php echo e($week_day . '-field'); ?>"
                                                        name="availability[<?php echo e($week_day); ?>][until]"
                                                        value="<?php echo e(!empty($availability[$week_day]->untilDate) ? $availability[$week_day]->untilDate : ''); ?>" />
                                                </div>
                                                <select class="form-control <?php echo e($week_day . '-field'); ?>" name="availability[<?php echo e($week_day); ?>][until_indicator]">
                                                    <option style="color:black" value="AM" 
                                                        <?php echo e((!empty($availability[$week_day]->untilIndicator) && $availability[$week_day]->untilIndicator == 'AM') 
                                                            ? 'selected' : ''); ?>>
                                                            AM
                                                    </option>

                                                    <option style="color:black" value="PM" 
                                                        <?php echo e((!empty($availability[$week_day]->untilIndicator) && $availability[$week_day]->untilIndicator == 'PM') 
                                                            ? 'selected' : ''); ?>>
                                                            PM
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Description">
                                        <div class="custom-desc-box alert">
                                            <input type="text" class="form-control"
                                                name="availability[<?php echo e($week_day); ?>][description]"
                                                value="<?php echo e(!empty($availability[$week_day]->description) ? $availability[$week_day]->description : ''); ?>" />
                                        </div>
                                    </td>
                                </tr>    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix row">
        <div class="col-md-12 mt-4">
            <div class="form-box">
                <div class="box-header">
                    <h3>SERVICES I OFFER</h3>
                </div>
                <div class="box-body">
                    <ul class="list-check-grid">
                        <?php $__currentLoopData = $services_available; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check-<?php echo e($index + 1); ?>" 
                                    name="services_selected[<?php echo e($service->service); ?>]" 
                                    <?php echo e($services_offered->contains($service->service) ? 'checked' : ''); ?>>
                                <label class="custom-control-label" for="check-<?php echo e($index + 1); ?>">&nbsp; <?php echo e($service->service); ?></label>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <div class="keywords-tag-area mt-2">
                        <label>Create your own service keywords</label>
                        <div class="form-group">
                            <input type="text" name="service_tags" data-role="tagsinput" class="form-control" 
                                placeholder="Service keywords as tags" 
                                value="<?php echo e(!empty($service_tags) ? $service_tags : ''); ?>">
                            <textarea class="form-control mt-1" placeholder="Would you like to add any information about the services you offer..." name="tags_description"><?php echo e($tags_description); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix row">
        <div class="col-md-12 mt-4">
            <div class="form-box">
                <div class="box-header">
                    <h3>Rates</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        
                        <div class="col-lg-6 col-md-6 mb-4">
                            <h4>In Call</h4>

                            <div id="in_call_wrapper">
                                <?php if(array_key_exists('in_call', $rates)): ?>
                                    <?php $__currentLoopData = $rates['in_call']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row justify-content-between mt-4 in_call_fields" id="in_call_field_<?php echo e($index); ?>">
                                        <input type="hidden" name="rates[in_call][<?php echo e($index); ?>][id]" value="<?php echo e($rate->id); ?>">
                                        <input type="hidden" name="rates[in_call][<?php echo e($index); ?>][status]" value="<?php echo e($rate->status); ?>">
                                        <div class="col-lg-4 align-self-end">
                                            <div class="form-group">
                                                <label>Hours</label>
                                                <select class="form-control select-for-rates" name="rates[in_call][<?php echo e($index); ?>][hours]" onchange="loadWyo($(this))">
                                                    <option <?php echo e(!empty($rate->hours) && $rate->hours == "" ? 'selected' : ''); ?> style="color:black" value="">-- Select Hours --</option>
                                                    <option <?php echo e(!empty($rate->hours) && $rate->hours == "1 Hours" ? 'selected' : ''); ?> style="color:black" value="1 Hours">1 Hours</option>
                                                    <option <?php echo e(!empty($rate->hours) && $rate->hours == "2 Hours" ? 'selected' : ''); ?> style="color:black" value="2 Hours">2 Hours</option>
                                                    <option <?php echo e(!empty($rate->hours) && $rate->hours == "3 Hours" ? 'selected' : ''); ?> style="color:black" value="3 Hours">3 Hours</option>
                                                    <option <?php echo e(!empty($rate->hours) && $rate->hours == "4 Hours" ? 'selected' : ''); ?> style="color:black" value="4 Hours">4 Hours</option>
                                                    <option <?php echo e(!empty($rate->hours) && $rate->hours == "5 Hours" ? 'selected' : ''); ?> style="color:black" value="5 Hours">5 Hours</option>
                                                    <option <?php echo e(!empty($rate->hours) && $rate->hours == "wyo" ? 'selected' : ''); ?> style="color:black" value="wyo">Write Your Own</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 align-self-end">
                                            <div class="form-group">
                                                <label>Create Your Own Service</label>
                                                <input type="text" class="form-control" name="rates[in_call][<?php echo e($index); ?>][hours_own]" value="<?php echo e(!empty($rate->hours) ? $rate->hours : ''); ?>" maxlength="15">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 align-self-end">
                                            <div class="form-group d-flex align-items-end">
                                                <div>
                                                    <label class="text-white">Rate </label>
                                                    <input type="number" name="rates[in_call][<?php echo e($index); ?>][price]" class="form-control" placeholder="0"
                                                        value="<?php echo e(!empty($rate->price) ? $rate->price : ''); ?>">
                                                </div>

                                                <button class="btn remove-btn ml-3" type="button" 
                                                    onclick="removeFields('in_call', 'in_call_field_<?php echo e($index); ?>')">
                                                        <i class="icofont-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group custom-desc-box">
                                                <label>Description</label>
                                                <input type="text" class="form-control" name="rates[in_call][<?php echo e($index); ?>][description]"
                                                    value="<?php echo e(!empty($rate->description) ? $rate->description : ''); ?>"  minlength="30" maxlength="50"/>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?> 
                                <div class="row justify-content-between mt-4 in_call_fields" id="in_call_field_0">
                                    <input type="hidden" name="rates[in_call][0][status]" value="1">
                                    <div class="col-lg-4 align-self-end">
                                        <div class="form-group">
                                            <label>Hours</label>
                                            <select class="form-control select-for-rates" name="rates[in_call][0][hours]" onchange="loadWyo($(this))">
                                                <option <?php echo e(!empty($rate->hours) && $rate->hours == "" ? 'selected' : ''); ?>  style="color:black" value="">-- Select Hours --</option>
                                                <option <?php echo e(!empty($rate->hours) && $rate->hours == "1 Hours" ? 'selected' : ''); ?>  style="color:black" value="1 Hours">1 Hours</option>
                                                <option <?php echo e(!empty($rate->hours) && $rate->hours == "2 Hours" ? 'selected' : ''); ?>  style="color:black" value="2 Hours">2 Hours</option>
                                                <option <?php echo e(!empty($rate->hours) && $rate->hours == "3 Hours" ? 'selected' : ''); ?>  style="color:black" value="3 Hours">3 Hours</option>
                                                <option <?php echo e(!empty($rate->hours) && $rate->hours == "4 Hours" ? 'selected' : ''); ?>  style="color:black" value="4 Hours">4 Hours</option>
                                                <option <?php echo e(!empty($rate->hours) && $rate->hours == "5 Hours" ? 'selected' : ''); ?>  style="color:black" value="5 Hours">5 Hours</option>
                                                <option <?php echo e(!empty($rate->hours) && $rate->hours == "wyo" ? 'selected' : ''); ?>  style="color:black" value="wyo">Write Your Own</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 align-self-end">
                                        <div class="form-group">
                                            <label>Create Your Own Service</label>
                                            <input type="text" class="form-control" name="rates[in_call][0][hours_own]" value="<?php echo e(!empty($rate->hours) ? $rate->hours : ''); ?>" maxlength="15">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 align-self-end">
                                        <div class="form-group d-flex align-items-end">
                                            <div>
                                                <label class="text-white">Rate </label>
                                                <input type="number" name="rates[in_call][0][price]" class="form-control" placeholder="0">
                                            </div>
                
                                            <button class="btn remove-btn ml-3" type="button" 
                                                onclick="removeFields('in_call', 'in_call_field_0')">
                                                    <i class="icofont-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group custom-desc-box">
                                            <label>Description</label>
                                            <input type="text" class="form-control" name="rates[in_call][0][description]" minlength="30" maxlength="50" >
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <button class="btn-add-field" type="button" onclick="addFields('in_call', 1)">Add More</button>
                                </div>
                            </div>
                        </div> 

                        
                        <div class="col-lg-6 col-md-6 mb-4">
                            <h4>Out Call</h4>

                            <div  id="out_call_wrapper">
                                <?php if(array_key_exists('out_call', $rates)): ?>
                                    <?php $__currentLoopData = $rates['out_call']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row justify-content-between mt-4 out_call_fields" id="out_call_field_<?php echo e($index); ?>">
                                        <input type="hidden" name="rates[out_call][<?php echo e($index); ?>][id]" value="<?php echo e($rate->id); ?>">
                                        <input type="hidden" name="rates[out_call][<?php echo e($index); ?>][status]" value="<?php echo e($rate->status); ?>">
                                        <div class="col-lg-4 align-self-end">
                                            <div class="form-group">
                                                <label>Hours</label>
                                                <select class="form-control select-for-rates" name="rates[out_call][<?php echo e($index); ?>][hours]" onchange="loadWyo($(this))">
                                                    <option <?php echo e(!empty($rate->hours) && $rate->hours == "" ? 'selected' : ''); ?>  style="color:black" value="">-- Select Hours --</option>
                                                    <option <?php echo e(!empty($rate->hours) && $rate->hours == "1 Hours" ? 'selected' : ''); ?>  style="color:black" value="1 Hours">1 Hours</option>
                                                    <option <?php echo e(!empty($rate->hours) && $rate->hours == "2 Hours" ? 'selected' : ''); ?>  style="color:black" value="2 Hours">2 Hours</option>
                                                    <option <?php echo e(!empty($rate->hours) && $rate->hours == "3 Hours" ? 'selected' : ''); ?>  style="color:black" value="3 Hours">3 Hours</option>
                                                    <option <?php echo e(!empty($rate->hours) && $rate->hours == "4 Hours" ? 'selected' : ''); ?>  style="color:black" value="4 Hours">4 Hours</option>
                                                    <option <?php echo e(!empty($rate->hours) && $rate->hours == "5 Hours" ? 'selected' : ''); ?>  style="color:black" value="5 Hours">5 Hours</option>
                                                    <option <?php echo e(!empty($rate->hours) && $rate->hours == "wyo" ? 'selected' : ''); ?>  style="color:black" value="wyo">Write Your Own</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 align-self-end">
                                            <div class="form-group">
                                                <label>Create Your Own Service</label>
                                                <input type="text" class="form-control" name="rates[out_call][<?php echo e($index); ?>][hours_own]" value="<?php echo e(!empty($rate->hours) ? $rate->hours : ''); ?>" maxlength="15">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 align-self-end">
                                            <div class="form-group d-flex align-items-end">
                                                <div>
                                                    <label class="text-white">Rate</label>
                                                    <input type="number" name="rates[out_call][<?php echo e($index); ?>][price]" class="form-control" placeholder="0"
                                                        value="<?php echo e(!empty($rate->price) ? $rate->price : ''); ?>">
                                                </div>

                                                <button class="btn remove-btn ml-3" type="button" 
                                                    onclick="removeFields('out_call', 'out_call_field_<?php echo e($index); ?>')">
                                                        <i class="icofont-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group custom-desc-box">
                                                <label>Description</label>
                                                <input type="text" class="form-control" name="rates[out_call][<?php echo e($index); ?>][description]"
                                                    value="<?php echo e(!empty($rate->description) ? $rate->description : ''); ?>" minlength="30" maxlength="50"/>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <div class="row justify-content-between mt-4 out_call_fields" id="out_call_field_0">
                                    <input type="hidden" name="rates[out_call][0][status]" value="2">
                                    <div class="col-lg-4 align-self-end">
                                        <div class="form-group">
                                            <label>Hours</label>
                                            <select class="form-control select-for-rates" name="rates[out_call][0][hours]" onchange="loadWyo($(this))">
                                                <option <?php echo e(!empty($rate->hours) && $rate->hours == "" ? 'selected' : ''); ?>  style="color:black" value="">-- Select Hours --</option>
                                                <option <?php echo e(!empty($rate->hours) && $rate->hours == "1 Hours" ? 'selected' : ''); ?>  style="color:black" value="1 Hours">1 Hours</option>
                                                <option <?php echo e(!empty($rate->hours) && $rate->hours == "2 Hours" ? 'selected' : ''); ?>  style="color:black" value="2 Hours">2 Hours</option>
                                                <option <?php echo e(!empty($rate->hours) && $rate->hours == "3 Hours" ? 'selected' : ''); ?>  style="color:black" value="3 Hours">3 Hours</option>
                                                <option <?php echo e(!empty($rate->hours) && $rate->hours == "4 Hours" ? 'selected' : ''); ?>  style="color:black" value="4 Hours">4 Hours</option>
                                                <option <?php echo e(!empty($rate->hours) && $rate->hours == "5 Hours" ? 'selected' : ''); ?>  style="color:black" value="5 Hours">5 Hours</option>
                                                <option <?php echo e(!empty($rate->hours) && $rate->hours == "wyo" ? 'selected' : ''); ?>  style="color:black" value="wyo">Write Your Own</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 align-self-end">
                                        <div class="form-group">
                                            <label>Create Your Own Service</label>
                                            <input type="text" class="form-control" name="rates[out_call][0][hours_own]" value="<?php echo e(!empty($rate->hours) ? $rate->hours : ''); ?>" maxlength="15">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 align-self-end">
                                        <div class="form-group d-flex align-items-end">
                                            <div>
                                                <label class="text-white">Rate </label>
                                                <input type="number" name="rates[out_call][0][price]" class="form-control" placeholder="0">
                                            </div>
                
                                            <button class="btn remove-btn ml-3" type="button" 
                                                onclick="removeFields('out_call', 'out_call_field_0')">
                                                    <i class="icofont-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group custom-desc-box">
                                            <label>Description</label>
                                            <input type="text" class="form-control" name="rates[out_call][0][description]" minlength="30" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <button class="btn-add-field" type="button" onclick="addFields('out_call', 2)">Add More</button>
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
            <button class="submit-btn" type="submit">Submit</button>
        </div>
    </div>
</form>

<script>

    $(document).ready(function () {
        $('.select-for-rates').each(function(i, obj) 
        {
            loadWyo($(this));
        });
    });

    function toggleCustomRates(id) 
    { 
        if($('#check_custom_time-'+id).prop('checked'))
        {
            $('.check_custom_time-'+id).parent().show();
        }
        else
        {
            $('.check_custom_time-'+id).parent().hide();
        }
    }

    function addFields(callType, status) {
        var index = $(`.${callType}_fields`).length;

        var item = $(`
            <div class="row justify-content-between mt-4 ${callType}_fields" id="${callType}_field_${index}">
                <input type="hidden" name="rates[${callType}][${index}][status]" value="${status}">
                
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Hours</label>
                        <select class="form-control" name="rates[${callType}][${index}][hours]" onchange="loadWyo($(this))">
                            <option style="color:black" value="">-- Select Hours --</option>
                            <option style="color:black" value="1 Hours">1 Hours</option>
                            <option style="color:black" value="2 Hours">2 Hours</option>
                            <option style="color:black" value="3 Hours">3 Hours</option>
                            <option style="color:black" value="4 Hours">4 Hours</option>
                            <option style="color:black" value="5 Hours">5 Hours</option>
                            <option style="color:black" value="wyo">Write Your Own</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4" style="display:none">
                    <div class="form-group">
                        <label>Create Your Own Service</label>
                        <input type="text" class="form-control" name="rates[${callType}][${index}][hours_own]" maxlength="15">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group d-flex align-items-end">
                        <div>
                            <label class="text-white">Rate </label>
                            <input type="number" name="rates[${callType}][${index}][price]" class="form-control" placeholder="0">
                        </div>

                        <button class="btn remove-btn ml-3" type="button" 
                            onclick="removeFields('${callType}', '${callType}_field_${index}')">
                                <i class="icofont-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group custom-desc-box">
                        <label>Description</label>
                        <input type="text" class="form-control" name="rates[${callType}][${index}][description]" minlength="30" maxlength="50">
                    </div>
                </div>
            </div>
        `)

        $(`#${callType}_wrapper`).append(item);
    }

    function removeFields(callType, id) {
        if ($(`.${callType}_fields`).length == 1) {
            var item = $(`
                <div class="row justify-content-between mt-4 ${callType}_fields" id="${callType}_field_0">
                    <input type="hidden" name="rates[${callType}][0][status]" value="${status}">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Hours</label>
                            <select class="form-control" name="rates[${callType}][0][hours]" onchange="loadWyo($(this))">
                                <option style="color:black" value="">-- Select Hours --</option>
                                <option style="color:black" value="1 Hours">1 Hours</option>
                                <option style="color:black" value="2 Hours">2 Hours</option>
                                <option style="color:black" value="3 Hours">3 Hours</option>
                                <option style="color:black" value="4 Hours">4 Hours</option>
                                <option style="color:black" value="5 Hours">5 Hours</option>
                                <option style="color:black" value="wyo">Write Your Own</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4" style="display:none">
                        <div class="form-group">
                            <label>Create Your Own Service</label>
                            <input type="text" class="form-control" name="rates[${callType}][0][hours_own]" maxlength="15">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group d-flex align-items-end">
                            <div>
                                <label class="text-white">Rate </label>
                                <input type="number" name="rates[${callType}][0][price]" class="form-control" placeholder="0">
                            </div>

                            <button class="btn remove-btn ml-3" type="button" 
                                onclick="removeFields('${callType}', '${callType}_field_0')">
                                    <i class="icofont-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group custom-desc-box">
                            <label>Description</label>
                            <input type="text" class="form-control" name="rates[${callType}][0][description]" minlength="30" maxlength="50">
                        </div>
                    </div>
                </div>
            `)

            $(`#${callType}_wrapper`).append(item);
        }

        $(`#${id}`).remove();
    }

    function loadWyo(element)
    {
        // console.log(element.parent().parent().next('div').next('input[type=text]'));
        if(element.val() == null || element.val() == '1 Hours' || element.val() == '2 Hours' || element.val() == '3 Hours' || element.val() == '4 Hours' || element.val() == '5 Hours' )
        {
            element.parent().parent().next('div').hide();
        }
        else
        {
            element.parent().parent().next('div').show();
            element.val('wyo');
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('masters.profileMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/new/profile/profileServices.blade.php ENDPATH**/ ?>