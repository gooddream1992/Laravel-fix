<?php $__env->startSection('title', 'Page Title'); ?>
<?php $__env->startSection('home'); ?>
<div class="col-md-9 right-content">
   <div class="box multi_step_form">
      <form>
         <div class="clearfix row">
            <div class="col-md-12 ">
               <div class="form-group">
                  <label class="d-block">Title</label>
                  <input type="text" class="form-control" />
               </div>
               <div class="form-group">
                  <label class="d-block">Description</label>
                  <img src="<?php echo e(asset('public/client_library/image/large-input-area.png')); ?>" class="w-100" />
               </div>
               <div class="form-group">
                  <label class="d-block">Image</label>
                  <div class="custom-file gray-upload">
                     <input type="file" class="custom-file-input" id="customFile">
                     <label class="custom-file-label" for="customFile"></label>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <button class="submit-btn">Submit</button>
            </div>
         </div>
      </form>
   </div>
   <div class="box">
      <div class="blog-list">
         <div class="row">
            <div class="col-lg-4 col-md-6">
               <div class="my-blog-box">
                  <div class="blog-img">
                     <img src="<?php echo e(asset('public/client_library/image/my-blog-1.jpg')); ?>" class="w-100" alt="blog-img">
                  </div>
                  <div class="blog-overview">
                     <p class="post-date">10.05.2020</p>
                     <h5>Lorem Ipsum is simply dummy text of printing and typesetting industry Lorem Ipsum has.</h5>
                     <a href="#" class="read-fblog">read full blog »</a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6">
               <div class="my-blog-box">
                  <div class="blog-img">
                     <img src="<?php echo e(asset('public/client_library/image/my-blog-2.jpg')); ?>" class="w-100" alt="blog-img">
                  </div>
                  <div class="blog-overview">
                     <p class="post-date">10.05.2020</p>
                     <h5>Lorem Ipsum is simply dummy text of printing and typesetting industry Lorem Ipsum has.</h5>
                     <a href="#" class="read-fblog">read full blog »</a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6">
               <div class="my-blog-box">
                  <div class="blog-img">
                     <img src="<?php echo e(asset('public/client_library/image/my-blog-5.jpg')); ?>" class="w-100" alt="blog-img">
                  </div>
                  <div class="blog-overview">
                     <p class="post-date">10.05.2020</p>
                     <h5>Lorem Ipsum is simply dummy text of printing and typesetting industry Lorem Ipsum has.</h5>
                     <a href="#" class="read-fblog">read full blog »</a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6">
               <div class="my-blog-box">
                  <div class="blog-img">
                     <img src="<?php echo e(asset('public/client_library/image/my-blog-3.jpg')); ?>" class="w-100" alt="blog-img">
                  </div>
                  <div class="blog-overview">
                     <p class="post-date">10.05.2020</p>
                     <h5>Lorem Ipsum is simply dummy text of printing and typesetting industry Lorem Ipsum has.</h5>
                     <a href="#" class="read-fblog">read full blog »</a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6">
               <div class="my-blog-box">
                  <div class="blog-img">
                     <img src="<?php echo e(asset('public/client_library/image/my-blog-4.jpg')); ?>" class="w-100" alt="blog-img">
                  </div>
                  <div class="blog-overview">
                     <p class="post-date">10.05.2020</p>
                     <h5>Lorem Ipsum is simply dummy text of printing and typesetting industry Lorem Ipsum has.</h5>
                     <a href="#" class="read-fblog">read full blog »</a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6">
               <div class="my-blog-box">
                  <div class="blog-img">
                     <img src="<?php echo e(asset('public/client_library/image/my-blog-6.jpg')); ?>" class="w-100" alt="blog-img">
                  </div>
                  <div class="blog-overview">
                     <p class="post-date">10.05.2020</p>
                     <h5>Lorem Ipsum is simply dummy text of printing and typesetting industry Lorem Ipsum has.</h5>
                     <a href="#" class="read-fblog">read full blog »</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</section>
</div>
<!-- Content END -->

      <?php $__env->stopSection(); ?>
<?php echo $__env->make('client.master.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/client/home.blade.php ENDPATH**/ ?>