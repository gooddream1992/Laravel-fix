<?php $__env->startSection('title', 'Escort - Blog'); ?>
<?php $__env->startSection('header_title', 'Blog'); ?>
<?php $__env->startSection('content'); ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<style>
* {
  box-sizing: border-box;
}
.leftcolumn {   
  float: left;
  width: 100%;
  margin-left: 20px;
  margin-right: 20px;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  width: 100%;
  padding: 20px;
  align-self: flex-end;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   padding-left: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media  screen and (max-width: 800px) {
  .leftcolumn {   
    width: 100%;
    padding: 0;
  }
}
</style>
<div class="col-md-9 right-content">

<div class="row">
  <div class="leftcolumn">
  	<?php $__currentLoopData = $blog_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card">
      <h2><?php echo e($blog->title); ?></h2>
      <?php 
      	$date = date('Y-m-d', strtotime($blog->created_at));
      ?>
      <h5>Author <?php echo e($blog->name); ?>, <?php echo e($date); ?></h5>
      <div class="fakeimg" style="">
        <?php if(isset($blog->image)): ?>
      	<img src="<?php echo e(asset('public/client_library/upload/blog/'.$blog->image)); ?>" alt="" class="fakeimg" style="height:65%;">
        <?php else: ?>
        <img src="<?php echo e(asset('public/client_library/image/no_image_found.png')); ?>" alt="" class="fakeimg" style="height:65%;">
        <?php endif; ?>
      <p><?php echo e($blog->description); ?></p>
    </div>
    <div class="row">
    <a href="<?php echo e(route('escort.blog.edit',$blog->id)); ?>" class="btn btn-primary" style="width: 140px; align-content: center;">
        <img src="<?php echo e(asset('public/client_library/image/edit.png')); ?>" width="20" height="20">
          Edit Blog
    </a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo e(route('escort.blog.delete',$blog->id)); ?>" class="btn btn-primary" style="width: 140px; align-content: center;">
      <img src="<?php echo e(asset('public/client_library/image/delete.png')); ?>" width="20" height="20">
        Delete Blog
    </a>
  </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('masters.profileMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/new/blog/blog_details.blade.php ENDPATH**/ ?>