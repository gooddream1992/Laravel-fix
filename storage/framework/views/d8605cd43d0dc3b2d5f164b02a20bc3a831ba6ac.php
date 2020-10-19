<?php $__env->startSection('title', __('New Customer')); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Create New Customer</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          
          
          <form role="form" method="POST" action="<?php echo e(url('add/customer')); ?>" enctype="multipart/form-data">
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
                        <label class="FormLabel1"><?php echo e(__('Name')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="name">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Company')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="company">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Phone')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="phone">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Address')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea  name="address" class="textarea"></textarea>
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
                        <input type="text" name="email" class="<?php echo e($errors->has('email') ? ' has-error' : ''); ?>" id="exampleInputEmail1" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('example@domain.com')); ?>"  required autofocus>
                        <?php if($errors->has('email')): ?>
                        <span class="help-block">
                          <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                       
                        <label class="FormLabel1"><?php echo e(__('Advance/(-Due)')); ?></label>
                        
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="dueAmount" value="0">
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
                        <input type="submit" class="btn btn-success" name="submit" value="<?php echo e(__('Save')); ?>">
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              
            </div>
          </form>

          
          
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pump\resources\views/admin/customer/newCustomer.blade.php ENDPATH**/ ?>