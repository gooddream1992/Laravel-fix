<?php $__env->startSection('title', 'Profile Details'); ?>
<?php $__env->startSection('main'); ?>
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

          <div class="text-center btn btn-success" style="width: 100%"><h3>
               <a href="<?php echo e(url('escort/profile/image')); ?>" class="btn btn-light">Gallery</a>
                     <a href="<?php echo e(route('escort.slider')); ?>" class="btn btn-light">Slider</a>
                     <a href="<?php echo e(route('escort.video')); ?>" class="btn btn-light">Video</a>
                     <a href="<?php echo e(route('escort.selfie')); ?>" class="btn btn-light">Selfie Gallery</a> 
              
            </h3>
          </div>
          <br><br>
          <a href="<?php echo e(route('addvideo')); ?>" class="btn btn-success">Add Video</a>
          <hr>
            

          <!-- Gallert Start's Here -->
            <div class="row">
              <div class="col-md-12">
                <div id="mdb-lightbox-ui"></div>
                <div class="mdb-lightbox no-margin">
                  <?php $__currentLoopData = $video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <figure class="col-md-4">
                      <a href="<?php echo e(route('escort.video-edit',$value->id)); ?>" data-size="1600x1067" title="Edit Video">
                        <img alt="picture" src="<?php echo e(asset('public/uploads/'.$value->image)); ?> " class="img-fluid" style=" border-radius: 8px; width: 500px; height: 300px;"><br><br>
                      </a>
                     </figure>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
            <!-- Gallert End's Here -->
</div>
</div>
</div>
</section>
</div>

              <?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/videoView.blade.php ENDPATH**/ ?>