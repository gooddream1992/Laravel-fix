<?php $__env->startSection('title', __('Role Setup')); ?>
<?php $__env->startSection('main'); ?>
<style type="text/css">
.table.dataTable.no-footer{border-bottom: none; }

</style>
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<!-- SELECT2 EXAMPLE -->
			<div class="card card-default">
				<div class="card-header">
					<h3 class="card-title FormTitle">Role Setup</h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
						<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
					</div>
				</div>
				<!-- /.card-header -->
				
				<form role="form" method="POST" action="<?php echo e(url('branches/store')); ?>" enctype="multipart/form-data">
					<?php echo e(csrf_field()); ?>

					<div class="card-body">
						<table id="example" class="table" style="width:100%">
							
							<tr>
								<th rowspan="3">Customer Management</th>
								<td><input type="checkbox" name=""  id="selectall1"></td>
								<td>New Customer</td>
								<td><input type="checkbox" name="" class="case1"></td>
							</tr>
							<tr>
								<td></td>
								<td> Customer List</td>
								<td><input type="checkbox" name="" class="case1"></td>
							</tr>
							<tr>
								<td></td>
								<td> Customer View</td>
								<td><input type="checkbox" name=""class="case1"></td>
							</tr>

                           <tr><td colspan="4"></td></tr>

							<tr>
								<th rowspan="6">Invoice Management</th>
								<td><input type="checkbox" name="" id="selectall"></td>
								<td>New Customer</td>
								<td><input type="checkbox" name="" class="case"></td>
							</tr>
							<tr>
								<td></td>
								<td> Customer List</td>
								<td><input type="checkbox" name="" class="case"></td>
							</tr>
							<tr>
								<td></td>
								<td> Customer View</td>
								<td><input type="checkbox" name="" class="case"></td>
							</tr>
							<tr>
								<td></td>
								<td> Customer View</td>
								<td><input type="checkbox" name="" class="case"></td>
							</tr>
							<tr>
								<td></td>
								<td> Customer View</td>
								<td><input type="checkbox" name="" class="case"></td>
							</tr>
							<tr>
								<td></td>
								<td> Customer View</td>
								<td><input type="checkbox" name="" class="case"></td>
							</tr>


<SCRIPT language="javascript">
$(function(){

	// Role 01
	$("#selectall").click(function () {
		  $('.case').attr('checked', this.checked);
	});

	
	//Role 01
	$(".case").click(function(){

		if($(".case").length == $(".case:checked").length) {
			$("#selectall").attr("checked", "checked");
		} else {
			$("#selectall").removeAttr("checked");
		}

	});


	// Role 02
	$("#selectall1").click(function () {
		  $('.case1').attr('checked', this.checked);
	});

	
	//Role 02
	$(".case1").click(function(){

		if($(".case1").length == $(".case1:checked").length) {
			$("#selectall1").attr("checked", "checked");
		} else {
			$("#selectall1").removeAttr("checked");
		}

	});



});
</SCRIPT>

							
							<tr>
								<td colspan="4"><a href="" class="btn btn-primary">Update</a></td>
							</tr>
							
							
						</table>
					</div>
				</form>
			</div>
		</section>
	</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/admin/roles/roleSetupManage.blade.php ENDPATH**/ ?>