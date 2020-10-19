<?php $__env->startSection('title', 'Location'); ?>
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
            <h3 class="card-title FormTitle">Manage City</h3>
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
                  <a href="<?php echo e(route('admin.location.stateadd',$id)); ?>" style="margin-bottom: 1%" class="btn btn-xs btn-warning">Add Bulk City</a>
                  <table class="table table-striped table-bordered" style="width:100%">
                     <thead>
                        <tr>
                           <th><?php echo e(__('ID No.')); ?></th>
                           <th><?php echo e(__('Country Id')); ?></th>
                           <th><?php echo e(__('City Name')); ?></th>
                           <th><?php echo e(__('Photo')); ?></th>
                           <th><?php echo e(__('Action')); ?></th>
                        </tr>
                     </thead>
                     <tbody>
                     	<?php
          						$i = 1
          						?>
                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           <td><?php echo e($i++); ?></td>
                           <td><?php echo e($state->country); ?></td>
                           <td><?php echo e($state->state); ?></td>
                           <td><?php if($state->image==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$state->image)); ?>" style="width: 30px;"><?php endif; ?></td>
                           <td>
                              <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-lg-state<?php echo e($state->stateid); ?>">Modify</a>
                              <a href="<?php echo e(url('state/delete/'.$state->stateid)); ?>" class="btn btn-xs btn-danger">Delete</a>
                              <a href="<?php echo e(route('admin.location.city',$state->stateid)); ?>" class="btn btn-xs btn-secondary">Manage Suburb</a>
                           </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </table>
                  <?php echo e($states->links()); ?>

               </div>
            </div>
            <!-- Modal Start================ -->
<?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="modal-lg-state<?php echo e($state->stateid); ?>">
   <div class="modal-dialog modal-xl">
      <div class="modal-content">
         <div class="modal-header" style="background: #822d2d;">
            <h4 class="modal-title">Modify Information</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form role="form" method="POST" action="<?php echo e(url('state/update')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="modal-body">
               <input type="hidden" name="id" value="<?php echo e($state->stateid); ?>">
               <div class="row">
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                 <label class="FormLabel1"><?php echo e(__('Country')); ?>*</label>
                              </div>
                              <div class="selct_2_alska">
                                 <select name="country_id" class="form-control">
                                    <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option value="<?php echo e($value->id); ?>" <?php if($value->id == $state->country_id): ?> Selected <?php endif; ?> >
                                        <?php if($value->id == $state->country_id): ?> Current <?php endif; ?> <?php echo e($value->country); ?>

                                      </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                 <label class="FormLabel1"><?php echo e(__('City')); ?>*</label>
                              </div>
                              <div class="selct_2_alska">
                                 <input type="text" name="state" class="form-control" value="<?php echo e($state->state); ?>">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="selct_2_alska">
                                 <input name="image" type="file" accept="image/*" value="<?php echo e($state->image); ?>">
                                 <img src="<?php echo e(asset('public/uploads/'.$state->image)); ?>" style="width:200px;">
                                 <p class="help-block"><?php echo e(__('Upload City Thumbnail max 1mb')); ?></p>
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
<!-- Modal Start================ -->

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/general_setting/locationState.blade.php ENDPATH**/ ?>