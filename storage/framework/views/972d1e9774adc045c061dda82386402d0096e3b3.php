<?php $__env->startSection('title', 'Location City'); ?>
<?php $__env->startSection('main'); ?>
<style>
  .pagination{
    float: right;
  }
</style>
<div class="content-wrapper">
<section class="content-header">
   <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
         <div class="card-header">
            <h3 class="card-title FormTitle">Manage Suburb</h3>
            <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
               <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <div class="row">
            </div>
            <div class="row">
               <div class="col-md-12">
                <a href="<?php echo e(route('admin.location.cityadd',$id)); ?>" class="btn btn-xs btn-warning">Add Bulk Suburb</a>
                  <table class="table table-striped table-bordered" style="width:100%">
                     <thead>
                        <tr>
                           <th><?php echo e(__('ID No.')); ?></th>
                           <th><?php echo e(__('City')); ?></th>
                           <th><?php echo e(__('Suburb')); ?></th>
                            <th><?php echo e(__('Action')); ?></th>
                        </tr>
                     </thead>
                     <tbody>
                     	<?php
          						$i = 1
          						?>
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($city->city!=''): ?>
                        <tr>
                           <td><?php echo e($i++); ?></td>
                           <td><?php echo e($city->state); ?></td>
                           <td><?php echo e($city->city); ?></td>
                           <td>
                              <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-lg-city<?php echo e($city->cityId); ?>">Modify</a>
                              <a href="<?php echo e(url('city/delete/'.$city->cityId)); ?>" class="btn btn-xs btn-danger">Delete</a>
                           </td>
                        </tr>
                        <?php else: ?>
                        <tr>
                           <td align="center" colspan="4">No Suburbs Available</td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </table>
                  <?php echo e($cities->links()); ?>

               </div>
            </div>
            
            <div class="row">
               <div class="col-lg-12">
                  <script>
                     function selectcountry(){
                         $.ajax({
                             url:"<?php echo e(route('select_country')); ?>",
                             method:'GET',
                             data:{'country_id':$('#selectCountry').find(':selected').val()},
                             success:function(data){
                                 $('#stateSelect').text(' ');
                                for (var i = 0; i < data.states.length; i++) {
                                    $('#stateSelect').append('<option value="'+data.states[i].id+'">'+data.states[i].state+'</option>');
                                }
                             },
                             error:function(err){
                                 console.log(err);
                             }
                         });
                     }
                     
                     function selectstate(){
                         $.ajax({
                             url:"<?php echo e(route('select_state')); ?>",
                             method:'GET',
                             data:{'state_id':$('#stateSelect').find(':selected').val()},
                             success:function(data){
                                  $('#selectCity').text(' ');
                                 for (var k = 0; k < data.citys.length; k++) {
                                     $('#selectCity').append('<option value="'+data.citys[k].id+'">'+data.citys[k].city+'</option>');
                                 }
                             },
                             error:function(err){
                                 console.log(err);
                             }
                     
                     
                         })
                     }
                  </script>
               </div>
            </div>
         </div>
      </div>
</section>
</div>
<?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="modal-lg-city<?php echo e($city->cityId); ?>">
   <div class="modal-dialog modal-xl">
      <div class="modal-content">
         <div class="modal-header" style="background: #b00404;">
            <h4 class="modal-title">Modify Information</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form role="form" method="POST" action="<?php echo e(url('city/update')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="modal-body">
               <input type="hidden" name="id" value="<?php echo e($city->cityId); ?>">
               <div class="row">
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                 <label class="FormLabel1"><?php echo e(__('City')); ?>*</label>
                              </div>
                              <div class="selct_2_alska">
                                 <select name="state_id" class="form-control">
                                 	<?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>" <?php if($value->id ==$city->state_id): ?> Selected <?php endif; ?> >
                                    	<?php if($value->id ==$city->state_id): ?> Current <?php endif; ?>
                                    	<?php echo e($value->state); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                 <label class="FormLabel1"><?php echo e(__('Suburb')); ?>*</label>
                              </div>
                              <div class="selct_2_alska">
                                 <input type="text" name="city" class="form-control" value="<?php echo e($city->city); ?>">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
               </div>
         </form>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal-dialog -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/general_setting/locationCity.blade.php ENDPATH**/ ?>