<?php $__env->startSection('title', __('Edit Vendor')); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Edit Vendor</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">
            <form role="form" method="POST" action="<?php echo e(url('vendor/update')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" name="id" value="<?php echo e($vendor->id); ?>" />

                <div class="row">
              <?php echo e(csrf_field()); ?>

              <input type="hidden" name="addedBy" value="<?php echo e(Auth::user()->id); ?>">
              <input type="hidden" name="date" id="theDate1">
              <script type="text/javascript">
              var date = new Date();
              var day = date.getDate();
              var month = date.getMonth() + 1;
              var year = date.getFullYear();
              if (month < 10) month = "0" + month;
              if (day < 10) day = "0" + day;
              var today = year + "-" + month + "-" + day;
              document.getElementById('theDate1').value = today;
              </script>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="row">

                 <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Vendor\'s ID')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" value="<?php echo e(__('V0')); ?><?php echo e($vendor->id); ?>" disabled>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Name')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="name" value="<?php echo e($vendor->name); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Company')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="company" value="<?php echo e($vendor->company); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Phone')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="phone" value="<?php echo e($vendor->phone); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Address')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea  name="address" class="textarea"> <?php echo e($vendor->address); ?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col -->
              
              <div class="col-md-6">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Email')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="email"  value="<?php echo e($vendor->email); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                      
                        <label class="FormLabel1"><?php echo e(__('Advance/(-Due)')); ?></label>
                       
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="vendorDue" value="0" value="<?php echo e($vendor->vendorDue); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Source/Contact')); ?></label>
                      </div>
                      <div class="selct_2_alska">
                        <select name="contact" class="form-group select2">
                          <option value="<?php echo e(Auth::user()->name); ?>"><?php echo e(Auth::user()->name); ?></option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Gender')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <div class="form-group clearfix">
                            
                            <input type="hidden" name="gender"  value="<?php echo e($vendor->gender); ?>">
                          <div class="icheck-primary d-inline">

                            <input type="radio" name="gender" value="Male" id="checkboxPrimary1" checked>
                            <label for="checkboxPrimary1">
                            </label>
                          </div>
                          <div class="icheck-primary d-inline">
                            <label for="checkboxPrimary1">
                              Male
                            </label>
                          </div>
                          <div class="icheck-primary d-inline">
                            <input type="radio" name="gender" value="Female" id="checkboxPrimary2">
                            <label for="checkboxPrimary2">
                            </label>
                          </div>
                          <div class="icheck-primary d-inline">
                            <label for="checkboxPrimary2">
                              Female
                            </label>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" name="submit" value="<?php echo e(__('Save Changes')); ?>">
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              
            </div>



                
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </form>
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pump\resources\views/admin/vendor/vendorEdit.blade.php ENDPATH**/ ?>