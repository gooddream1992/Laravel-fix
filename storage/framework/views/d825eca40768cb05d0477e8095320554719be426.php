<?php $__env->startSection('title', 'Escort - Tours'); ?>
<?php $__env->startSection('header_title', 'Tours'); ?>
<?php $__env->startSection('content'); ?>
<style>
	label, h3{
		color: white;
	}	
</style>
<?php $__errorArgs = ['domestic_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="alert alert-danger"><?php echo e($message); ?></div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <div class="clearfix row">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="form-box tour-detail-fields">
                    <div class="box-header">
                        <h3 >DOMESTIC TOURS</h3>
										</div>
										
                    <div class="box-body">
                        <div class="row main-row">
                            <?php $description = array();
                                $tour_ChekeboxId = 123456; 
                            ?>                            
                            <?php if(count($dom_profile_tours) > 0): ?>
                                <?php $__currentLoopData = $profile_tours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tour_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($tour_value->status == "1"): ?>
                                <form action="<?php echo e(route('escort.tour.update',$tour_value->id)); ?>" method="get" class="w-100">
                                    <div class="col-lg-12">
                                        <div class="tours-fields-row">
                                            <div class="form-group">
                                                <label >City</label>
                                                <select class="form-control" name="domestic_city">
                                                    <option value="">--Select City--</option>
                                                    <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value->id); ?>" <?php echo e($tour_value->city == $value->id ? 'selected' : ''); ?>><?php echo e($value->state); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label >From</label>
                                                <div class="custom-date-picker">
                                                    <input class="form-control" type="date" name="domestic_from" value="<?php echo e($tour_value->startDate); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label >To</label>
                                                <div class="custom-date-picker">
                                                    <input class="form-control" name="domestic_to" value="<?php echo e($tour_value->endDate); ?>" type="date">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label >Fully Booked</label>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" value="1" class="custom-control-input" id="check-<?php echo $num = ($tour_ChekeboxId++)+1; ?>" name="domestic_booked" <?php if($tour_value->booked == 1): ?> checked <?php endif; ?>>
                                                    <label class="custom-control-label" for="check-<?php echo $num; ?>">&nbsp;</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="d-block" >Delete</label>
                                                <a href="<?php echo e(route('escort.tour.delete',$tour_value->id)); ?>" class="btn delete-dash-button"><i class="icofont-trash"></i></a>
                                                <!-- <button class="btn delete-dash-button"><i class="icofont-trash"></i></button> -->
                                                <button type="submit" class="btn delete-dash-button"><i class="icofont-edit"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                <?php $description['description'] = $tour_value->description; ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <form action="<?php echo e(route('escort.tour.store')); ?>" method="post" class="w-100">    
                            <?php else: ?>                           
                            <form action="<?php echo e(route('escort.tour.store')); ?>" method="post" class="w-100">
                                <div class="col-lg-12">
                                    <div class="tours-fields-row">
                                        <div class="form-group">
                                            <label >City</label>
                                            <input type="hidden" name="status" value="1">
                                            <select class="form-control" name="domestic_city[]">
                                                <option value="">--Select City--</option>
                                                <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->state); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label >From</label>
                                            <div class="custom-date-picker">
                                                <input class="form-control" type="date" name="domestic_from[]">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label >To</label>
                                            <div class="custom-date-picker">
                                                <input class="form-control" name="domestic_to[]" type="date">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label >Fully Booked</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check-<?php echo $num = ($tour_ChekeboxId++)+1; ?>" name="domestic_booked_two[]" value="1">
                                                <label class="custom-control-label" for="check-<?php echo $num; ?>">&nbsp;</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                			<!-- Add More Fields in html Code Start's Here  -->
                			
        					<?php echo csrf_field(); ?>
		                	<div id="newRow" class="col-lg-12"></div>
			                <!-- <div class="col-lg-12">
			                    <div class="form-group" id="description-hide">
			                        <label>Description</label>
			                        <textarea class="form-control" name="domestic_description_two"></textarea>
			                    </div>
			                </div> -->
			                
										<!-- Add More Fields in html Code End's Here  -->            
										
										<div class="col-lg-12">
											<div class="form-group">
                                    <label>Description *</label>
                                    <textarea class="form-control" name="domestic_description"> <?php if(isset($description['description'])): ?> <?php echo e($description['description']); ?> <?php endif; ?></textarea>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-2">
                	<div class="col-lg-12">
                    <button class="submit-btn" type="submit">Submit</button>

                </form>
                &nbsp;
                &nbsp;
                <button id="addRow" type="button" class="btn btn-success dash-button">Add Row <i class="icofont-plus"></i></button>
                </div>    
                </div>
            </div>


            <div class="col-lg-12 col-md-12 mt-4">
                <div class="form-box tour-detail-fields">
                    <div class="box-header">
                        <h3>INTERNATIONAL TOURS</h3>
                    </div>
                    <div class="box-body">

                        <div class="row">
                            <?php $description2 = array(); $i = 1; $j = 1; ?>
                                <?php $__currentLoopData = $int_profile_tours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tour_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <form action="<?php echo e(route('escort.tour.update',$tour_value->id)); ?>" method="get" class="w-100">

                                <input type="hidden" id="is_int_tour" value="yes">
                                <div class="col-lg-12">
                                    <div class="tours-fields-row">
                                        <div class="form-group">
                                            <label>Country</label>
                                        <select class="form-control" name="domestic_country" id="selectCountry<?php echo $tour_value->id; ?>">
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>" <?php echo e($tour_value->country == $value->id ? 'selected' : ''); ?> ><?php echo e($value->country); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="hidden" name="" value="<?php echo e($tour_value->city); ?>" id="city_name<?php echo $tour_value->id; ?>">
                                            <select class="form-control" name="domestic_city" id="selectCity<?php echo $tour_value->id; ?>">
                                            <option value="">--Select City--</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>From</label>
                                            <div class="custom-date-picker">
                                                <input type="date" class="form-control" name="domestic_from" value="<?php echo e($tour_value->startDate); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>To</label>
                                            <div class="custom-date-picker">
                                                <input type="date" class="form-control" name="domestic_to" value="<?php echo e($tour_value->endDate); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Fully Booked</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="domestic_booked" value="1" class="custom-control-input" id="check-<?php echo $tour_value->id+2; ?>" <?php if($tour_value->booked == 1): ?> checked <?php endif; ?>>
                                                <label class="custom-control-label" for="check-<?php echo $tour_value->id+2; ?>">&nbsp;</label>
                                            </div>
                                        </div>
                                    <!--   <div class="form-group">
                                            <label class="d-block">Edit</label>
                                            <button class="btn edit-dash-button"><i class="icofont-ui-edit"></i></button>
                                        </div> -->
                                        <div class="form-group">
                                            <label class="d-block">Delete</label>
                                            <a href="<?php echo e(route('escort.tour.delete',$tour_value->id)); ?>" class="btn delete-dash-button"><i class="icofont-trash"></i></a>
                                            <!-- <button class="btn delete-dash-button"><i class="icofont-trash"></i></button> -->
                                            <button type="submit" class="btn delete-dash-button"><i class="icofont-edit"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <?php $description2['description'] = $tour_value->description; ?>
                                </form>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <!-- Add More Fields in html Code Start's Here  -->
                			<form action="<?php echo e(route('escort.tour.store')); ?>" method="post" class="w-100">
        					<?php echo csrf_field(); ?>
		                	<div id="newRow-internation" class="col-lg-12" ></div>
			                <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description *</label>
                                    <textarea class="form-control" name="domestic_description"><?php if(isset($description2['description'])): ?> <?php echo e($description2['description']); ?> <?php endif; ?></textarea>
                                </div>
                            </div>
			                
			            	<!-- Add More Fields in html Code End's Here  -->            
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <button class="submit-btn submit-inter" type="submit">Submit</button>
                        </form>
                    &nbsp;
                    &nbsp;
                    <button id="addRow_internation" type="button" class="btn btn-success dash-button">Add Row <i class="icofont-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>
	$(document).ready(function() {
        if($("#is_int_tour").val()==undefined)
        {
            setTimeout(function () {
                $("#addRow_internation").trigger('click');
            },300);
        }
	    var addButton = $('#addRow');
	    var check_key = Math.random();
	    var maxField = 10;
	    var wrapper = $('#newRow');
	    var x = 0;	    
	    $(addButton).click(function() {
	        $('#description-hide').show();
	        $('.submit-btn').show();

	        if (x < maxField) {
	        	x++;
                var jj = (x++)+1
				var html = '<div class="tours-fields-row copy-column">';
				html += '<input type="hidden" name="status" value="1">';
				html += '<div class="form-group">';
				html += '<label>City *</label>';
				html += '<select class="form-control" name="domestic_city[]">';
				html += '<option value="">--Select City--</option>';
				html += '<?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>';
				html += '<option value="<?php echo e($value->id); ?>"><?php echo e($value->state); ?></option>';
				html += '<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>';
				html += '</select>';
				html += '</div>';
				html += '<div class="form-group">';
				html += '<label>From *</label>';
				html += '<div class="custom-date-picker">';
				html += '<input class="form-control" type="date" name="domestic_from[]">';
				html += '</div>';
				html += '</div>';
				html += '<div class="form-group">';
				html += '<label>To *</label>';
				html += '<div class="custom-date-picker">';
				html += '<input class="form-control" name="domestic_to[]" type="date">';
				html += '</div>';
				html += '</div>';
				html += '<div class="form-group">';
				html += '<label>Fully Booked</label>';
				html += '<div class="custom-control custom-checkbox">';
				html += '<input type="checkbox" class="custom-control-input" id="check-'+jj+'" name="domestic_booked_two[]" value="1">';
				html += '<label class="custom-control-label" for="check-'+jj+'">&nbsp;</label>';
				html += '</div>';
				html += '</div>';
				html += '<div class="form-group">';
				html += '<label class="d-block">Remove Row</label>';
				html += '<button id="removeRow" type="button" class="btn btn-warning dash-button"><i class="icofont-ui-remove"></i></button>';
				html += '</div>';
				html += '</div>';
	            
	            $(wrapper).append(html);

	        }
	    });

	    $('#newRow').on('click', '#removeRow', function(e) {
	        e.preventDefault();
	        $(this).closest('.copy-column').remove();
	        x--;
	        if (x == 0) {
	            $('#description-hide').hide();
	            $('.submit-btn').hide();
	        }
	    });
	});

	$(document).ready(function() {
	    var addButton = $('#addRow_internation');
	    var check_key = Math.random();
	    var maxField = 10;
	    var wrapper = $('#newRow-internation');
	    var x = 0;
	    $(addButton).click(function() {
	        $('#domestic_description_inter').show();
	        $('.submit-inter').show();
	        if (x < maxField) {
	            x++;
				var html = '<div class="tours-fields-row copy-column_international">';
				html += '<input type="hidden" name="status" value="2">';
                html += '<div class="form-group">';
                html += '<label>Country *</label>';
                html += '<select class="form-control" name="domestic_country[]" id="domestic_country_js'+x+'">';
                html += '<option value="">Country</option>'
                html += '<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>';
                html += '<option value="<?php echo e($value->id); ?>"><?php echo e($value->country); ?></option>';
                html += '<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>';
                html += '</select>';
                html += '</div>';

				html += '<div class="form-group">';
				html += '<label>City *</label>';
				html += '<select class="form-control selectCity'+ x +'" name="domestic_city[]" id="selectCity'+ x +'">';
				html += '<option></option>';
				
				html += '</select>';
				html += '</div>';

				html += '<div class="form-group">';
				html += '<label>From *</label>';
				html += '<div class="custom-date-picker">';
				html += '<input class="form-control" type="date" name="domestic_from[]">';
				html += '</div>';
				html += '</div>';

				html += '<div class="form-group">';
				html += '<label>To *</label>';
				html += '<div class="custom-date-picker">';
				html += '<input class="form-control" name="domestic_to[]" type="date">';
				html += '</div>';
				html += '</div>';

				html += '<div class="form-group">';
				html += '<label>Fully Booked</label>';
				html += '<div class="custom-control custom-checkbox">';
				html += '<input type="checkbox" class="custom-control-input" id="check-'+x+'" name="domestic_booked_two[]" value="1">';
				html += '<label class="custom-control-label" for="check-'+x+'">&nbsp;</label>';
				html += '</div>';
				html += '</div>';

				html += '<div class="form-group">';
				html += '<label class="d-block">Remove Row</label>';
				html += '<button id="removeRowinternational" type="button" class="btn btn-warning dash-button"><i class="icofont-ui-remove"></i></button>';
				html += '</div>';
				html += '</div>';
                var y = x;
	            $(wrapper).append(html);
                $('#domestic_country_js'+x).on('change', function() {
                    var country =  this.value;
                    $.ajax({
                        url: "<?php echo e(route('getCity')); ?>",
                        method: 'POST',
                        data: {"_token": "<?php echo e(csrf_token()); ?>", 'country_id': country },
                        success: function (data) {
                            $("#selectCity"+ y).html(data);
                        }
                    })
                   
                });
	        }
	    });

	    $('#newRow-internation').on('click', '#removeRowinternational', function(e) {
	        e.preventDefault();
	        $(this).closest('.copy-column_international').remove();
	        x--;
	        if (x == 0) {
	           $('#domestic_description_inter').hide();
	            $('.submit-inter').hide();
	        }
	    });
	});

<?php $i = 1; foreach($int_profile_tours as $tour_value){ ?>
$(document).ready(function() {
    $('#selectCountry<?php echo $tour_value->id; ?>').on('change', function() {
        var country = this.value;
        console.log(country);
        $.ajax({
            url: "<?php echo e(route('getCity')); ?>",
            method: 'POST',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                'country_id': country
            },
            success: function(data) {
                
                $('#selectCity<?php echo $tour_value->id; ?>').html(data);
            }
        });
    });

    var countries = $('#selectCountry<?php echo $tour_value->id; ?>').val();
    if (countries != '') {
        var city_name = $('#city_name<?php echo $tour_value->id; ?>').val();
        $.ajax({
            url: "<?php echo e(route('getCity')); ?>",
            method: 'POST',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                'country_id': countries,
                'city_name': city_name
            },
            success: function(data) {
                $('#selectCity<?php echo $tour_value->id; ?>').html(data);
            }
        });
    }

});
<?php } ?>    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.profileMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/new/tour/index.blade.php ENDPATH**/ ?>