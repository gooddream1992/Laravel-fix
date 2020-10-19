<?php $__env->startSection('title', 'Escort - Blog'); ?>
<?php $__env->startSection('header_title', 'Blog'); ?>
<?php $__env->startSection('content'); ?>
<style>
   .ck-editor__editable p{
      height: 250px;
   }
</style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<div class="col-md-9 right-content">
   <div class="box multi_step_form">
      <form action="<?php echo e(route('escort.blog.store')); ?>" method="post" enctype="multipart/form-data">
           <?php echo csrf_field(); ?>
         <div class="clearfix row">
            <div class="col-md-12 ">
               <div class="form-group">
                  <label class="d-block">Title</label>
                  <input type="text" class="form-control" name="title">
               </div>
               <div class="form-group">
                  <label class="d-block">Description</label> 
                  <textarea name="description" id="editor"></textarea>
               </div>
               <div class="form-group">
                  <label class="d-block">Image</label>
                  <div class="custom-file gray-upload">
                     <input type="file" class="custom-file-input" id="customFile" name="imageurl">
                     <label class="custom-file-label" for="customFile"></label>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <input type="submit" name="submit" class="submit-btn">
            </div>
         </div>
      </form>
   </div>
   <div class="box">
      <div class="blog-list">
         <div class="row">
            <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6">
               <div class="my-blog-box">
                  <div class="blog-img">
                     <?php if(isset($blogs->imageurl)): ?>
                     <img src="<?php echo e(asset('/public/client_library/upload/blog/'.$blogs->imageurl)); ?>" class="w-100" alt="blog-img">
                     <?php else: ?>
                     <img src="<?php echo e(asset('public/client_library/image/no_image_found.png')); ?>" class="w-100" alt="blog-img">
                     <?php endif; ?>
                  </div>
                  <div class="blog-overview">
                     <?php
                        $date = date('Y-m-d', strtotime($blogs->created_at));
                        $out = strlen($blogs->description) > 50 ? substr($blogs->description,0,50).".." : $blogs->description;
                     ?>
                     <p class="post-date"><b><?php echo e($date); ?></b></p>
                     <h5><?php echo $out; ?></h5>
                     <a href="<?php echo e(route('escort.blog.details',$blogs->id)); ?>" class="read-fblog">read full blog »</a>
                  </div>
               </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
      </div>
   </div>
</div>

<!-- Content END -->
<script>
   ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .catch( error => {
      console.error( error );
   });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.profileMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/new/blog/index.blade.php ENDPATH**/ ?>