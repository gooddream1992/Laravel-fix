<?php $__env->startSection('title', 'Escort - Blog'); ?>
<?php $__env->startSection('header_title', 'Blog'); ?>
<?php $__env->startSection('content'); ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<div class="col-md-9 right-content">
   <div class="box multi_step_form">
      <form action="<?php echo e(route('escort.blog.update')); ?>" method="post" enctype="multipart/form-data">
           <?php echo csrf_field(); ?>
           <input type="hidden" name="id" value="<?php echo e($blog_details->id); ?>">
         <div class="clearfix row">
            <div class="col-md-12 ">
               <div class="form-group">
                  <label class="d-block">Title</label>
                  <input type="text" class="form-control" name="title" value="<?php if(isset($blog_details->title)): ?><?php echo e($blog_details->title); ?><?php endif; ?>">
               </div>
               <div class="form-group">
                  <label class="d-block">Description</label> 
                  <textarea name="description" id="editor" style="height: 200px;"><?php if(isset($blog_details->description)): ?><?php echo e($blog_details->description); ?><?php endif; ?></textarea>
               </div>
               <div class="form-group">
                  <label class="d-block">Image</label>
                  <div class="custom-file gray-upload">
                     <input type="file" class="custom-file-input" id="customFile" name="imageurl">
                     <label class="custom-file-label" for="customFile"></label>
                     <br><br>
                     <input type="hidden" name="imageurl" value="<?php if(isset($blog_details->image)): ?><?php echo e($blog_details->image); ?><?php endif; ?>">
                     <?php if(isset($blog_details->image)): ?>
                     <img src="<?php echo e(asset('public/client_library/upload/blog/'.$blog_details->image)); ?>" alt="" style="width: 100px !important; height:100px !important; ">
                     <?php else: ?>
                     <img src="<?php echo e(asset('public/client_library/image/no_image_found.png')); ?>" alt="" style="width: 100px !important; height:100px !important; ">
                     <?php endif; ?>
                  </div>
               </div>
            </div>
         </div><br><br>
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
         </div>
      </div>
   </div>
</div>
<script>
   ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .catch( error => {
      console.error( error );
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.profileMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/new/blog/blog_edit.blade.php ENDPATH**/ ?>