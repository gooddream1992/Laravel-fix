<?php $__env->startSection('title', 'Profile Details'); ?>
<?php $__env->startSection('main'); ?>
<style>
  a{
        text-decoration: none;
    color: #f3f5f7;
}

</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="content-wrapper">

   <section class="content-header">
      <div class="container-fluid">
         <!-- SELECT2 EXAMPLE -->
         <div class="card card-default">
            <!-- /.card-header -->
            <div class="card-body">
              <a href="<?php echo e(url('/home')); ?>" class="btn btn-primary">Back</a><hr>
               <div class="text-center btn btn-success" style="width: 100%">
                  <h3>
                       <a href="<?php echo e(url('escort/profile/image')); ?>" class="btn btn-light">Gallery</a>
                     <a href="<?php echo e(route('escort.slider')); ?>" class="btn btn-light">Slider</a>
                     <a href="<?php echo e(route('escort.video')); ?>" class="btn btn-light">Video</a>
                     <a href="<?php echo e(route('escort.selfie')); ?>" class="btn btn-light">Selfie Gallery</a> <!-- Profile Images -->
                  </h3>
               </div>
               <hr>
               <!-- Gallert Start's Here -->
               <form role="form" method="POST" action="<?php echo e(url('profile/image/store')); ?>" enctype="multipart/form-data">
                   <?php echo e(csrf_field()); ?>

                   <div class="row">
                      <div class="col-md-6">
                         <div class="row">
                            <div class="col-lg-12">
                               <div class="form-group sip_mt">
                                  <div class="select_2_alska2">
                                     <label class="FormLabel1"><?php echo e(__('Escort')); ?>*</label>
                                  </div>
                                  <div class="selct_2_alska">
                                     <input type="hidden" name="escortId" value="<?php if(isset($users[0]->id)): ?> <?php echo e($users[0]->id); ?> <?php endif; ?>" class="form-control">
                                     <input type="text" name="name" value="<?php if(isset($users[0]->name)): ?> <?php echo e($users[0]->name); ?> <?php endif; ?>" class="form-control" readonly>
                                  </div>
                               </div>
                            </div>
                            <div class="col-lg-12">
                               <div class="form-group sip_mt">
                                  <div class="select_2_alska2">
                                     <label class="FormLabel1"> <?php echo e(__('Profile Image')); ?>*</label>
                                  </div>
                                  <div class="selct_2_alska">
                                     <input name="image" type="file" accept="image/*" value="0">
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-md-6">
                         <div class="row">
                            <div class="col-lg-12">
                               <div class="form-group sip_mt">
                                  <div class="select_2_alska2">
                                     <label class="FormLabel1"><?php echo e(__('Upload To')); ?>*</label>
                                  </div>
                                  <div class="selct_2_alska">
                                    <input type="hidden" name="status" value="2">
                                    <input type="text" name="Gallery" value="Gallery" class="form-control" readonly>
                                  </div>
                               </div>
                            </div>
                            <!-- <div class="col-lg-12">
                               <div class="form-group sip_mt">
                                  <div class="select_2_alska2">
                                     <label class="FormLabel1"><?php echo e(__('Image Url')); ?>*</label>
                                  </div>
                                  <div class="selct_2_alska">
                                     <input type="text" name="url" class="form-control">
                                  </div>
                               </div>
                            </div> -->
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
                      </div>
                   </div>
                </form>
               <!-- Gallert End's Here -->
            </div>
         </div>
      </div>
   </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/addgallery.blade.php ENDPATH**/ ?>