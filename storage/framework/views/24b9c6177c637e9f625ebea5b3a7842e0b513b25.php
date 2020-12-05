<?php $__env->startSection('title', __('Local Resources')); ?>
<?php $__env->startSection('main'); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php $resources1 =\App\LocalResource::all()->where('status', 1);?>
<?php $i=1;?>
<?php $__currentLoopData = $resources1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- Header END -->
<section class=" innerpage-banner">
   <img src="<?php echo e(asset('public/uploads/'.$res1->imageurl)); ?>" class="w-100 inner-ban-img" alt="banner image" />
   <div class="container">
      <div class="ban-text c-center">
         <h1><?php echo e($res1->title); ?></h1>
      </div>
   </div>
</section>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- Content -->
<div id="content">
   <?php $i=1;?>
   <?php $__currentLoopData = $resources2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <section class="ask-forum-sec">
      <div class="container">
         <div class="ask-forum-inner">
            <h4><?php echo e($res2->title); ?> </h4>
            <a href="#" class="btn ask-forum-btn">Ask Our Form</a>
         </div>
      </div>
   </section>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php $resources3 =\App\LocalResource::all()->where('status', 3);?>
   <?php $__currentLoopData = $resources3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <section class="resources-ban-sec"  style="background-image: url('<?php echo e(asset('public/uploads/'.$res3->imageurl)); ?>');">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-11 c">
               <div class="large-title box-title dark c-center">
                  <h2><?php echo e($res3->title); ?></h2>
                  <p ><?php echo $res3->description!= '<p><br><p>' ? $res3->description : ''; ?></p>
               </div>
            </div>
         </div>
      </div>
   </section>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php $resources4 =\App\LocalResource::all()->where('status', 4);?>
   <?php $__currentLoopData = $resources4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <section class="resources-tab-img-grid" style="background-image: url('<?php echo e(asset('public/uploads/'.$res4->imageurl)); ?>');">
      <div class="container">
         <div class="row justify-content-center test">
            <div class="col-lg-11 ">
               <?php $__currentLoopData = $resources4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class="box-title dark c-center">
                  <h2><?php echo e($res4->title); ?></h2>
                  <p style="display: none"><?php echo $res4->description; ?></p>
               </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
         </div>
      <div class="row justify-content-center" >
         <div class="col-lg-7">
               <input type="hidden" name="tab_value" id="tab-value" value="healthcare">
               <div  class="res-search-city-form">
                  <div class="input-group">
                     <input type="text" name="city_id" id="city_id" class="form-control">
                     <div class="input-group-append">
                        <button class="btn btn-danger red-large" type="submit" id="search-location">Search Location</button>
                     </div>
                  </div>
               </div>
         </div>
      </div>
        <div class="row justify-content-center">
         <div class="col-lg-7">
            <ul class="nav nav-pills  mb-3 grid-box-tabs" id="pills-tab" role="tablist">
               <li class="nav-item">
                  <a class="get-data nav-link active" id="pills-home-tab" data-id="healthcare" data-toggle="pill" href="#pills-home" role="tab" onclick="$('#tab-value').val('healthcare');" aria-controls="pills-home" aria-selected="true">healthcare</a>
               </li>
               <li class="nav-item">
                  <a class="get-data nav-link" id="pills-profile-tab" data-id="legel_advice" data-toggle="pill" href="#pills-profile" role="tab" onclick="$('#tab-value').val('Legal Advice');" aria-controls="pills-profile" aria-selected="false"><!-- Legal Advice --> Mentors</a>
               </li>
               <li class="nav-item">
                  <a class="get-data nav-link" id="pills-contact-tab" data-id="photographers" data-toggle="pill" href="#pills-contact" role="tab" onclick="$('#tab-value').val('photographers');" aria-controls="pills-contact" aria-selected="false">Photographers</a>
               </li>
            </ul>
         </div>
         <?php echo $__env->make('frontend/provider/iframe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <div id="new-data"></div>
      </div>
      </div>
</div>
</section>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<style>
   .ui-autocomplete {
   max-height: 200px;
   overflow-y: auto;
   /* prevent horizontal scrollbar */
   overflow-x: hidden;
   /* add padding to account for vertical scrollbar */
   padding-right: 20px;
   } 
   .simplebar, [data-simplebar-direction] {
    position: relative !important;
    overflow-x: hidden !important;
    
    
    -webkit-overflow-scrolling: touch
}

</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/provider/frontLocalResources.blade.php ENDPATH**/ ?>