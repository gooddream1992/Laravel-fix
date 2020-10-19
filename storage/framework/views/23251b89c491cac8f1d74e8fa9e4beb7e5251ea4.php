<?php $__env->startSection('title', __('Vendor Payment')); ?>



<?php if(Auth::user()->status==1 or Auth::user()->status==2 or Auth::user()->status==3 or Auth::user()->status==4 or Auth::user()->status==5 or Auth::user()->status==6 or Auth::user()->status==8): ?>




<?php $__env->startSection('main'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle"><?php echo e(__('Vendor Payment')); ?>   <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <b> <?php echo e(__('to')); ?> <?php echo e($vendor->company); ?></b><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

    
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row section-container section-with-top-border">
      <!-- begin col-6 -->
      <div class="col-lg-6 form-horizontal">
        <form role="form" method="POST" action="<?php echo e(url('vendor/paymentadd')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <input type="hidden" name="addedBy" value="<?php echo e(Auth::user()->id); ?>">
          <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <input type="hidden" name="vendorId" value="<?php echo e($vendor->id); ?>">
          <div class="form-group m-b-10">
            <label class="col-lg-3 col-form-label"><?php echo e(__('Adv/Due')); ?></label>
            <div class="col-lg-12">
              <input type="hidden" name="vendorDue" value="<?php echo e($vendor->vendorDue); ?>">
              <input type="text" class="form-control" value="<?php echo e($vendor->vendorDue); ?>"  disabled/>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
          <!--Select dynamic value show auto-->
          <script>
          function singleSelectChangeValue() {
          var selObj = document.getElementById("singleSelectValueDDJS");
          var selValue = selObj.options[selObj.selectedIndex].id;
          document.getElementById("textFieldValueJS").value = selValue;
          document.getElementById("textFieldValueJS1").value = selValue;
          }
          </script>
          <!--Select dynamic value show auto end-->
          <div class="form-group m-b-10">
            <label class="col-lg-3 col-form-label"><?php echo e(__('Select account')); ?></label>
            <div class="col-lg-12">
              <select id="singleSelectValueDDJS"  class="form-control select2" data-size="10" data-live-search="true" data-style="btn-warning"
                onchange="singleSelectChangeValue()" name="accId" id="item">
                <?php $acc=\App\Bank::all()->where('addedBy', Auth::user()->id);?>
                <option value ="11"><?php echo e(__('Select')); ?></option>
                <?php $__currentLoopData = $acc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value ="<?php echo e($data->id); ?>" id="<?php echo e($data->income); ?>"><?php echo e($data->accName); ?> </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>
          <div class="form-group m-b-10">
            <label class="col-lg-3 col-form-label"><?php echo e(__('Balance')); ?></label>
            <div class="col-lg-12">
              <input type="hidden" id="textFieldValueJS"  name="income" value="">
              <input type="text" id="textFieldValueJS1" class="form-control" disabled>
              
            </div>
          </div>
          <div class="form-group m-b-10">
            <label class="col-lg-3 col-form-label"><?php echo e(__('Pay Date')); ?></label>
            <div class="col-lg-12">
              <input type="date" id="theDate1" name="paymentDate" class="form-control">
            </div>
          </div>
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
          
          
          
          
          
        </div>
        <!-- begin col-6 -->
        <div class="col-lg-6 form-horizontal">
          <div class="form-group m-b-10">
            <label class="col-lg-3 col-form-label"><?php echo e(__('Amount')); ?></label>
            <div class="col-lg-12">
              <input type="number" name="addAmount" class="form-control" id="exampleInputName">
            </div>
          </div>
          <div class="form-group m-b-10">
            <label class="col-lg-6"><?php echo e(__('If Cheque no.?')); ?></label>
            <div class="col-lg-12">
              <input type="text" name="cheque_no" class="form-control" value="0">
            </div>
          </div>
          <div class="form-group m-b-10">
            <label class="col-lg-6"><?php echo e(__('Particular (Purchase ID)')); ?></label>
            <div class="col-lg-12">
              
              <textarea name="particular" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group m-b-10">
            <label class="col-lg-6"></label>
            <div class="col-lg-12">
              <button type="submit" class="btn btn-success width-100 m-r-5"><?php echo e(__('Pay')); ?> </button>
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



<?php elseif(Auth::user()->status==11 or Auth::user()->status==21 or Auth::user()->status==22 or Auth::user()->status==22 or Auth::user()->status==31 or Auth::user()->status==32 or Auth::user()->status==33 or Auth::user()->status==61 or Auth::user()->status==62 or Auth::user()->status==63): ?>




<?php 

 $child= \App\Admin::all()->where('activation', Auth::user()->activation);
  if($child->count()>0){
     $childs= \App\Admin::where('activation', Auth::user()->activation)->first(); 
         $childid=$childs->id;
  }else{
    $childid=0;
  }


$banks=\App\Bank::where('addedBy', Auth::user()->activation)->orWhere('addedBy', Auth::user()->id)->orWhere('addedBy', $childid)->get();
?>

<?php $__env->startSection('main'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle"><?php echo e(__('Vendor Payment')); ?>   <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <b> <?php echo e(__('to')); ?> <?php echo e($vendor->company); ?></b><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

    
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row section-container section-with-top-border">
      <!-- begin col-6 -->
      <div class="col-lg-6 form-horizontal">
        <form role="form" method="POST" action="<?php echo e(url('vendor/paymentadd')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <input type="hidden" name="addedBy" value="<?php echo e(Auth::user()->id); ?>">
          <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <input type="hidden" name="vendorId" value="<?php echo e($vendor->id); ?>">
          <div class="form-group m-b-10">
            <label class="col-lg-3 col-form-label"><?php echo e(__('Adv/Due')); ?></label>
            <div class="col-lg-12">
              <input type="hidden" name="vendorDue" value="<?php echo e($vendor->vendorDue); ?>">
              <input type="text" class="form-control" value="<?php echo e($vendor->vendorDue); ?>"  disabled/>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
          <!--Select dynamic value show auto-->
          <script>
          function singleSelectChangeValue() {
          var selObj = document.getElementById("singleSelectValueDDJS");
          var selValue = selObj.options[selObj.selectedIndex].id;
          document.getElementById("textFieldValueJS").value = selValue;
          document.getElementById("textFieldValueJS1").value = selValue;
          }
          </script>
          <!--Select dynamic value show auto end-->
          <div class="form-group m-b-10">
            <label class="col-lg-3 col-form-label"><?php echo e(__('Select account')); ?></label>
            <div class="col-lg-12">
              <select id="singleSelectValueDDJS"  class="form-control select2" data-size="10" data-live-search="true" data-style="btn-warning"
                onchange="singleSelectChangeValue()" name="accId" id="item">
                <option value ="11"><?php echo e(__('Select')); ?></option>
                <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value ="<?php echo e($data->id); ?>" id="<?php echo e($data->income); ?>"><?php echo e($data->accName); ?> </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>
          <div class="form-group m-b-10">
            <label class="col-lg-3 col-form-label"><?php echo e(__('Balance')); ?></label>
            <div class="col-lg-12">
              <input type="hidden" id="textFieldValueJS"  name="income" value="">
              <input type="text" id="textFieldValueJS1" class="form-control" disabled>
              
            </div>
          </div>
          <div class="form-group m-b-10">
            <label class="col-lg-3 col-form-label"><?php echo e(__('Pay Date')); ?></label>
            <div class="col-lg-12">
              <input type="date" id="theDate1" name="paymentDate" class="form-control">
            </div>
          </div>
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
          
          
          
          
          
        </div>
        <!-- begin col-6 -->
        <div class="col-lg-6 form-horizontal">
          <div class="form-group m-b-10">
            <label class="col-lg-3 col-form-label"><?php echo e(__('Amount')); ?></label>
            <div class="col-lg-12">
              <input type="number" name="addAmount" class="form-control" id="exampleInputName">
            </div>
          </div>
          <div class="form-group m-b-10">
            <label class="col-lg-6"><?php echo e(__('If Cheque no.?')); ?></label>
            <div class="col-lg-12">
              <input type="text" name="cheque_no" class="form-control" value="0">
            </div>
          </div>
          <div class="form-group m-b-10">
            <label class="col-lg-6"><?php echo e(__('Particular (Purchase ID)')); ?></label>
            <div class="col-lg-12">
              
              <textarea name="particular" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group m-b-10">
            <label class="col-lg-6"></label>
            <div class="col-lg-12">
              <button type="submit" class="btn btn-success width-100 m-r-5"><?php echo e(__('Pay')); ?> </button>
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






<?php endif; ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pump\resources\views/admin/vendor/vendorView.blade.php ENDPATH**/ ?>