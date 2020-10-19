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
            <h3 class="card-title FormTitle">Location</h3>
            <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
               <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <div class="row">
               <div class="col-md-4">
                  <form role="form" method="POST" action="<?php echo e(url('country/store')); ?>" enctype="multipart/form-data">
                     <?php echo e(csrf_field()); ?>

                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                 <label class="FormLabel1"><?php echo e(__('Country')); ?>*</label>
                              </div>
                              <div class="selct_2_alska">
                                 <input type="text" name="country">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                              </div>
                              <div class="selct_2_alska">
                                 <input type="submit" class="btn btn-success" value="Save">
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-4">
                  <form role="form" method="POST" action="<?php echo e(url('state/store')); ?>" enctype="multipart/form-data">
                     <?php echo e(csrf_field()); ?>

                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                 <label class="FormLabel1"><?php echo e(__('Country')); ?>*</label>
                              </div>
                              <div class="selct_2_alska">
                                 <select class="form-control" name="country_id">
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->id); ?>"><?php echo e($country->country); ?></option>
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
                                 <input type="text" name="state">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="selct_2_alska">
                                 <input name="image" type="file" accept="image/*" value="0">
                                 <img src="<?php echo e(asset('public/blankphoto.png')); ?>">
                                 <p class="help-block"><?php echo e(__('Upload City Thumbnail max 1mb')); ?></p>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                              </div>
                              <div class="selct_2_alska">
                                 <input type="submit" class="btn btn-success" value="Save">
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-4">
                  <form role="form" method="POST" action="<?php echo e(url('city/store')); ?>" enctype="multipart/form-data">
                     <?php echo e(csrf_field()); ?>

                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                 <label class="FormLabel1"><?php echo e(__('City')); ?>*</label>
                              </div>
                              <div class="selct_2_alska">
                                 <select class="form-control" name="state_id">
                                    <?php $states=\App\State::all();?>
                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($state->id); ?>"><?php echo e($state->state); ?></option>
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
                                 <input type="text" name="city">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                              </div>
                              <div class="selct_2_alska">
                                 <input type="submit" class="btn btn-success" value="Save">
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <table class="table table-striped table-bordered" style="width:100%">
                     <thead>
                        <tr>
                           <th><?php echo e(__('ID No.')); ?></th>
                           <th><?php echo e(__('Country Name')); ?></th>
                           
                           <th><?php echo e(__('Action')); ?></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php ?>
                        <?php $__currentLoopData = $countries_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           <td><?php echo e($country->id); ?></td>
                           <td><?php echo e($country->country); ?></td>
                           
                           <td>
                              <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-lg<?php echo e($country->id); ?>">Modify</a>
                              <a href="<?php echo e(url('country/delete/'.$country->id)); ?>" class="btn btn-xs btn-danger">Delete</a>
                              <a href="<?php echo e(route('admin.location.state',$country->id)); ?>" class="btn btn-xs btn-secondary">Manage Cities</a>
                           </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </table>
                  <?php echo e($countries_table->links()); ?>

               </div>
            </div>
         </div>
      </div>
</section>
</div>
<!--========================== Modal  Start====================================================-->
<!-- Modal Start================ -->
<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="modal-lg<?php echo e($country->id); ?>">
   <div class="modal-dialog modal-xl">
      <div class="modal-content">
         <div class="modal-header" style="background: #b00404;">
            <h4 class="modal-title">Modify Information</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form role="form" method="POST" action="<?php echo e(url('country/update')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="modal-body">
               <input type="hidden" name="id" value="<?php echo e($country->id); ?>">
               <div class="row">
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                 <label class="FormLabel1"><?php echo e(__('Country')); ?>*</label>
                              </div>
                              <div class="selct_2_alska">
                                 <input type="text" name="country" class="form-control" value="<?php echo e($country->country); ?>">
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
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/general_setting/locationAdd.blade.php ENDPATH**/ ?>