<!DOCTYPE html>
<html>
<head>
	<title>Honey Luxe</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div id="datainsert"></div>
	<h1>AVAILABILITY</h1>
	<hr>
	<table class="table table">
		<tr>
			<td>
				<b>Weekday</b>
			</td>
			<td>
				<b>Avail 24hrs</b>
			</td>
			<td>
				<b>From</b>
			</td>
			<td>
				<b>TO</b>
			</td>
		</tr>
		<form action="<?php echo e(route('add-escort-profile-availability')); ?>" method="post" id="form1">
			<?php echo csrf_field(); ?>
		<tr>
			<td>
				Monday
			</td>
			<td>
				<input type="checkbox" name="avail[]" value="Monday" id="mon">
			</td>
			<td>
				<input type="hidden" name="mon[]" value="Monday" id="mon">
				<select name="hour_from[]" class="form-control" id="mon_hour_from">
					<option value="">Select Hour</option>
					<option>1 Hour</option>
					<option>2 Hour</option>
					<option>3 Hour</option>
					<option>4 Hour</option>
					<option>5 Hour</option>
					<option>6 Hour</option>
					<option>7 Hour</option>
					<option>8 Hour</option>
					<option>9 Hour</option>
					<option>10 Hour</option>
					<option>11 Hour</option>
					<option>12 Hour</option>
				</select>
			</td>
			<td>
				<select name="hour_to[]" class="form-control"  id="mon_hour_to">
					<option value="">Select Hour</option>
					<option>1 Hour</option>
					<option>2 Hour</option>
					<option>3 Hour</option>
					<option>4 Hour</option>
					<option>5 Hour</option>
					<option>6 Hour</option>
					<option>7 Hour</option>
					<option>8 Hour</option>
					<option>9 Hour</option>
					<option>10 Hour</option>
					<option>11 Hour</option>
					<option>12 Hour</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Tuesday
			</td>
			<td>
				<input type="checkbox" name="avail[]" value="Tuesday" id="tue">
			</td>
				<td>
				<input type="hidden" name="mon[]" value="Tuesday" id="tue">	
				<select name="hour_from[]" class="form-control" id="tue_hour_from">
					<option value="">Select Hour</option>
					<option>1 Hour</option>
					<option>2 Hour</option>
					<option>3 Hour</option>
					<option>4 Hour</option>
					<option>5 Hour</option>
					<option>6 Hour</option>
					<option>7 Hour</option>
					<option>8 Hour</option>
					<option>9 Hour</option>
					<option>10 Hour</option>
					<option>11 Hour</option>
					<option>12 Hour</option>
				</select>
			</td>
			<td>
				<select name="hour_to[]" class="form-control"  id="tue_hour_to">
					<option value="">Select Hour</option>
					<option>1 Hour</option>
					<option>2 Hour</option>
					<option>3 Hour</option>
					<option>4 Hour</option>
					<option>5 Hour</option>
					<option>6 Hour</option>
					<option>7 Hour</option>
					<option>8 Hour</option>
					<option>9 Hour</option>
					<option>10 Hour</option>
					<option>11 Hour</option>
					<option>12 Hour</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Wednesday
			</td>
			<td>
				<input type="checkbox" name="avail[]" value="Wednesday" id="wed">
			</td>
				<td>
					<input type="hidden" name="mon[]" value="Wednesday" id="wed">
				<select name="hour_from[]" class="form-control" id="wed_hour_from">
					<option value="">Select Hour</option>
					<option>1 Hour</option>
					<option>2 Hour</option>
					<option>3 Hour</option>
					<option>4 Hour</option>
					<option>5 Hour</option>
					<option>6 Hour</option>
					<option>7 Hour</option>
					<option>8 Hour</option>
					<option>9 Hour</option>
					<option>10 Hour</option>
					<option>11 Hour</option>
					<option>12 Hour</option>
				</select>
			</td>
			<td>
				<select name="hour_to[]" class="form-control"  id="wed_hour_to">
					<option value="">Select Hour</option>
					<option>1 Hour</option>
					<option>2 Hour</option>
					<option>3 Hour</option>
					<option>4 Hour</option>
					<option>5 Hour</option>
					<option>6 Hour</option>
					<option>7 Hour</option>
					<option>8 Hour</option>
					<option>9 Hour</option>
					<option>10 Hour</option>
					<option>11 Hour</option>
					<option>12 Hour</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Thrusday
			</td>
			<td>
				<input type="checkbox" name="avail[]" value="Thrusday" id="thr">
			</td>
				<td>
					<input type="hidden" name="mon[]" value="Thrusday" id="thr">
				<select name="hour_from[]" class="form-control" id="thr_hour_from">
					<option value="">Select Hour</option>
					<option>1 Hour</option>
					<option>2 Hour</option>
					<option>3 Hour</option>
					<option>4 Hour</option>
					<option>5 Hour</option>
					<option>6 Hour</option>
					<option>7 Hour</option>
					<option>8 Hour</option>
					<option>9 Hour</option>
					<option>10 Hour</option>
					<option>11 Hour</option>
					<option>12 Hour</option>
				</select>
			</td>
			<td>
				<select name="hour_to[]" class="form-control"  id="thr_hour_to">
					<option value="">Select Hour</option>
					<option>1 Hour</option>
					<option>2 Hour</option>
					<option>3 Hour</option>
					<option>4 Hour</option>
					<option>5 Hour</option>
					<option>6 Hour</option>
					<option>7 Hour</option>
					<option>8 Hour</option>
					<option>9 Hour</option>
					<option>10 Hour</option>
					<option>11 Hour</option>
					<option>12 Hour</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Friday
			</td>
			<td>
				<input type="checkbox" name="avail[]" value="Friday" id="fri">
			</td>
				<td>
					<input type="hidden" name="mon[]" value="Friday" id="fri">
				<select name="hour_from[]" class="form-control" id="fri_hour_from">
					<option value="">Select Hour</option>
					<option>1 Hour</option>
					<option>2 Hour</option>
					<option>3 Hour</option>
					<option>4 Hour</option>
					<option>5 Hour</option>
					<option>6 Hour</option>
					<option>7 Hour</option>
					<option>8 Hour</option>
					<option>9 Hour</option>
					<option>10 Hour</option>
					<option>11 Hour</option>
					<option>12 Hour</option>
				</select>
			</td>
			<td>
				<select name="hour_to[]" class="form-control"  id="fri_hour_to">
					<option value="">Select Hour</option>
					<option>1 Hour</option>
					<option>2 Hour</option>
					<option>3 Hour</option>
					<option>4 Hour</option>
					<option>5 Hour</option>
					<option>6 Hour</option>
					<option>7 Hour</option>
					<option>8 Hour</option>
					<option>9 Hour</option>
					<option>10 Hour</option>
					<option>11 Hour</option>
					<option>12 Hour</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Saturday
			</td>
			<td>
				<input type="checkbox" name="avail[]" value="Saturday" id="sat">
			</td>
				<td>
					<input type="hidden" name="mon[]" value="Saturday" id="sat">
				<select name="hour_from[]" class="form-control" id="sat_hour_from">
					<option value="">Select Hour</option>
					<option>1 Hour</option>
					<option>2 Hour</option>
					<option>3 Hour</option>
					<option>4 Hour</option>
					<option>5 Hour</option>
					<option>6 Hour</option>
					<option>7 Hour</option>
					<option>8 Hour</option>
					<option>9 Hour</option>
					<option>10 Hour</option>
					<option>11 Hour</option>
					<option>12 Hour</option>
				</select>
			</td>
			<td>
				<select name="hour_to[]" class="form-control"  id="sat_hour_to">
					<option value="">Select Hour</option>
					<option>1 Hour</option>
					<option>2 Hour</option>
					<option>3 Hour</option>
					<option>4 Hour</option>
					<option>5 Hour</option>
					<option>6 Hour</option>
					<option>7 Hour</option>
					<option>8 Hour</option>
					<option>9 Hour</option>
					<option>10 Hour</option>
					<option>11 Hour</option>
					<option>12 Hour</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Sunday
			</td>
			<td>
				<input type="checkbox" name="avail[]" value="Sunday" id="sun">
			</td>
				<td>
					<input type="hidden" name="mon[]" value="Sunday" id="sun">
				<select name="hour_from[]" class="form-control" id="sun_hour_from">
					<option value="">Select Hour</option>
					<option>1 Hour</option>
					<option>2 Hour</option>
					<option>3 Hour</option>
					<option>4 Hour</option>
					<option>5 Hour</option>
					<option>6 Hour</option>
					<option>7 Hour</option>
					<option>8 Hour</option>
					<option>9 Hour</option>
					<option>10 Hour</option>
					<option>11 Hour</option>
					<option>12 Hour</option>
				</select>
			</td>
			<td>
				<select name="hour_to[]" class="form-control"  id="sun_hour_to">
					<option value="">Select Hour</option>
					<option>1 Hour</option>
					<option>2 Hour</option>
					<option>3 Hour</option>
					<option>4 Hour</option>
					<option>5 Hour</option>
					<option>6 Hour</option>
					<option>7 Hour</option>
					<option>8 Hour</option>
					<option>9 Hour</option>
					<option>10 Hour</option>
					<option>11 Hour</option>
					<option>12 Hour</option>
				</select>
			</td>
		</tr>
		</form>
	</table>
	<hr>
</div>
<div class="container">
	<h1>Service I Offer</h1>
	<hr>
	<table class="table table">

		<form action="<?php echo e(route('add-escort-profile-offer')); ?>" method="post" id="form2">
			<?php echo csrf_field(); ?>
		<tr>
			<td>
			<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            	<input type="checkbox" name="service[]" value="<?php echo e($servic->service); ?>"> <?php echo e($servic->service); ?> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
		</tr>
		</form>
	</table>
</div>
		<input type="submit" name="submit" id="submit">
<div class="container">
	<h1>Rates</h1>
	<hr>
	<table class="table table">
		<tr>
			<td>
				<b>In Call</b>				
			</td>
			<td>
				<b>Out Call</b>
			</td>
		</tr>
		<tr>
			<td>Hours</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="hour" class="form-control">				
			</td>
			<td>
				<input type="text" name="hour" class="form-control">				
			</td>
		</tr>
		<tr>
			<td>
				Rates
			</td>
		</tr>
		<tr>
			<td>
			<input type="text" name="rate" class="form-control">				
			</td>
			<td>
			<input type="text" name="rate" class="form-control">				
			</td>
			<td>
				<textarea class="form-control"></textarea>
			</td>
		</tr>
	</table>
</div>
<script>
	$(document).ready(function(){
		$("#mon").click(function(){
			var mon = $("#mon").val();
			if($(this).prop("checked") == true){
	            $('#mon_hour_from').attr('disabled', 'disabled');
				$('#mon_hour_to').attr('disabled', 'disabled');
            }else if($(this).prop("checked") == false){
            	$('#mon_hour_from').removeAttr('disabled');
            	$('#mon_hour_to').removeAttr('disabled');
            }
		});
		$("#tue").click(function(){
			var tue = $("#tue").val();
			if($(this).prop("checked") == true){
	            $('#tue_hour_from').attr('disabled', 'disabled');
				$('#tue_hour_to').attr('disabled', 'disabled');
            }else if($(this).prop("checked") == false){
            	$('#tue_hour_from').removeAttr('disabled');
            	$('#tue_hour_to').removeAttr('disabled');
            }
		});
		$("#wed").click(function(){
			var wed = $("#wed").val();
			if($(this).prop("checked") == true){
	            $('#wed_hour_from').attr('disabled', 'disabled');
				$('#wed_hour_to').attr('disabled', 'disabled');
            }else if($(this).prop("checked") == false){
            	$('#wed_hour_from').removeAttr('disabled');
            	$('#wed_hour_to').removeAttr('disabled');
            }
		});
		$("#thr").click(function(){
			var thr = $("#thr").val();
			if($(this).prop("checked") == true){
	            $('#thr_hour_from').attr('disabled', 'disabled');
				$('#thr_hour_to').attr('disabled', 'disabled');
            }else if($(this).prop("checked") == false){
            	$('#thr_hour_from').removeAttr('disabled');
            	$('#thr_hour_to').removeAttr('disabled');
            }
		});
		$("#fri").click(function(){
			var fri = $("#fri").val();
			if($(this).prop("checked") == true){
	            $('#fri_hour_from').attr('disabled', 'disabled');
				$('#fri_hour_to').attr('disabled', 'disabled');
            }else if($(this).prop("checked") == false){
            	$('#fri_hour_from').removeAttr('disabled');
            	$('#fri_hour_to').removeAttr('disabled');
            }
		});
		$("#sat").click(function(){
			var sat = $("#sat").val();
			if($(this).prop("checked") == true){
	            $('#sat_hour_from').attr('disabled', 'disabled');
				$('#sat_hour_to').attr('disabled', 'disabled');
            }else if($(this).prop("checked") == false){
            	$('#sat_hour_from').removeAttr('disabled');
            	$('#sat_hour_to').removeAttr('disabled');
            }
		});
		$("#sun").click(function(){
			var sun = $("#sun").val();
			if($(this).prop("checked") == true){
	            $('#sun_hour_from').attr('disabled', 'disabled');
				$('#sun_hour_to').attr('disabled', 'disabled');
            }else if($(this).prop("checked") == false){
            	$('#sun_hour_from').removeAttr('disabled');
            	$('#sun_hour_to').removeAttr('disabled');
            }
		});
	});
	$("#submit").click(function() {
		var formurl = $('#form1').attr('action');
		var postdata = $("#form1").serialize();
		var formurl2 = $('#form2').attr('action');
		var postdata2 = $("#form2").serialize();

        ajax(formurl,postdata)
        ajax(formurl2,postdata2)

        function ajax(url, data){
			var loaded = false;
        	 jQuery(loaded).show();
        	$.ajax( {
				url : url,
				type: "POST",
				dataType: "json",
				data : data,
				success:function(data, textStatus) {
					$("#datainsert").html('<div class="btn btn-success" style="float:right;">Data Recorde Successfully<div>').hide(5000, function() { $('#datainsert'); });
				}
			});	
        }
        $("#form1").trigger("reset");
        $("#form2").trigger("reset");
	});
</script>
</body>
</html><?php /**PATH /home/honeydevealakmal/public_html/resources/views/escort/profile.blade.php ENDPATH**/ ?>