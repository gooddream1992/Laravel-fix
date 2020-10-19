<?php $__env->startSection('title', __('Become Escort')); ?>
<?php $__env->startSection('main'); ?>
<style type="text/css">

.fas{font-size: 3em;
color: #f8060a;}
h1{background:#f8060a;width: 100%;padding:10px;color: white; }
.Feature_Item{border:1px solid red;margin:5px;padding: 10px;}
.Feature_Item:hover{border:1px solid gray;margin:5px;padding: 10px;background: #f7f7f7;}
/*Modal Section*/
.modal-dialog{max-width:none;}
</style>
<!-- Content Header (Page header) -->
<a href="<?php echo e(url('/home')); ?>" class="btn btn-primary">Back</a><hr>
<center><h1>Following All Favourite Escorts</h1></center>
<section class="content-header">
  <div class="container-fluid">
    
    <div class="row mb-2">
      <div class="col-lg-12">
        
        <div class="Feature_main mt-3">
          <div class="row">
          
            <?php $follows=\App\Follow::all()->where('custId', Auth::user()->id)->where('status', 1);?>
            <?php $__currentLoopData = $follows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $photo=\App\User::find($follow->escortId)->photo;
            ?>
            <div class="col-lg-4 col-md-4 col-sm-6">
              <div class="Feature_Item elevation-1 text-center">
                <a class="FI_Link d-block" href="<?php echo e(url('profile/'.$follow->escortId)); ?>">
                  <?php if($photo==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width:50px;height: 50px;border-radius: 50%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$photo)); ?>" style="width:50px;height: 50px;border-radius: 50%;"><?php endif; ?>
                  
                  <h3><?php echo e(\App\User::find($follow->escortId)->name); ?></h3>
                </a>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            
            
          </div>
        </div>
      </div>
    </div>
    
    </div><!-- /.container-fluid -->
  </section>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/client_dashboard/notification.blade.php ENDPATH**/ ?>