<?php $__env->startSection('title', __('Client Membership')); ?>
<?php $__env->startSection('main'); ?>
<?php
$slidercnt=\App\Slider::all()->where('category', 7);
$sliders=\App\Slider::orderBy('id','desc')->where('category', 7)->first();
if($slidercnt->count()<1){
$slider1=0;
$slider2=0;
$slider3=0;
$title=0;
$description=0;
}else{
$slider1=$sliders->slider;
$slider2=$sliders->slider1;
$slider3=$sliders->slider2;
$title=$sliders->title;
$description=$sliders->description;  }
?>
 <section class=" innerpage-banner">
            <img src="<?php echo e(asset('public/uploads/'.$slider1)); ?>" class="w-100 inner-ban-img" alt="banner image" />
            <div class="container">
                <div class="ban-text text-left">
                     <h1><?php echo e($title); ?></h1>
                   <?php echo $description; ?><br><br>
                    <a class="btn slider-link btn-line" href="#" role="button">search for provide</a>
                </div>
            </div>
        </section>

        <!-- Content -->
        <div id="content">
            <section class="large-video-sec ">
                <div class="container-fluid">


                     <?php $crelations1 =\App\ClientRelationship::all()->where('status', 1);?>
              <?php $__currentLoopData = $crelations1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row ">
                        
                        <div class="col-lg-6 col-md-12 p-0 order-lg-1 order-md-2 order-2">
                            <img src="<?php echo e(asset('public/uploads/'.$relation1->imageurl)); ?>" class="w-100" />
                        </div>
                        <div class="col-lg-6 col-md-12 p-0 dark-gray-bg  d-flex align-items-center order-lg-2 order-md-1 order-1">
                            <div class="inner-text-content text-white">
                                <h2><?php echo e($relation1->title); ?></h2>
                                <div class="simplebar text-white"  id="myElement">
                                    <?php echo $relation1->description; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div> 
            </section>
            <section class="red-tab-sec">
                <div class="group-red-box">
                    <div class="container">

                         <?php $crelations2 =\App\ClientRelationship::all()->where('status', 2);?>
              <?php $__currentLoopData = $crelations2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="box-title dark c-center">
                                    <h2><?php echo e($relation2->title); ?></h2>
                                    <?php echo $relation2->description; ?>

                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <ul class="red-icon-list">

                                     <?php $business3 =\App\BusinessEtiquete::all()->where('status', 3);?>
               
                                <?php $__currentLoopData = $business3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <div class="icon-box">
                                                    <div class="circle-icon"><img src="<?php echo e(asset('public/uploads/'.$data3->imageurl)); ?>" class="img-fluid"/></div>
                                                    <h4><?php echo e($data3->title); ?></h4>
                                                </div>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

             <?php $crelations3 =\App\ClientRelationship::all()->where('status', 3);?>
              <?php $__currentLoopData = $crelations3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <section class="left-img-text-content gym-guy" style="background-image: url('<?php echo e(asset('public/uploads/'.$relation3->imageurl)); ?>'); background-size:cover;background-position: center;">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center">

                        <div class="col-lg-8 col-md-12 d-flex align-items-center order-lg-2 order-md-1">
                            <div class="inner-text-content text-white">
                                <h2><?php echo e($relation3->title); ?></h2>
                                <?php echo $relation3->description; ?>

                                <button class="btn red-small">Read More</button>

                            </div>
                        </div>
                        <?php $crelations4 =\App\ClientRelationship::all()->where('status', 4);?>
              <?php $__currentLoopData = $crelations4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-12  order-lg-1 order-md-2">
                            <img src="<?php echo e(asset('public/uploads/'.$relation4->imageurl)); ?>" class="img-fluid" />
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

             <?php $crelations5 =\App\ClientRelationship::all()->where('status', 5);?>
              <?php $__currentLoopData = $crelations5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation5): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="left-img-text-content">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center">

                        <div class="col-lg-8 col-md-12 d-flex align-items-center ">
                            <div class="inner-text-content ">
                              <h2><?php echo e($relation5->title); ?></h2>
                                <?php echo $relation5->description; ?>

                                <button class="btn red-small">Read More</button>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12  ">
                            <img src="<?php echo e(asset('public/uploads/'.$relation5->imageurl)); ?>" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php $crelations6 =\App\ClientRelationship::all()->where('status', 6);?>
              <?php $__currentLoopData = $crelations6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation6): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="resources-ban-sec" style="background-image: url('<?php echo e(asset('public/uploads/'.$relation6->imageurl)); ?>'); background-size:cover;background-position: center;">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-11 c">
                            <div class="large-title box-title dark c-center">
                                <h2><?php echo e($relation6->title); ?></h2>
                                <?php echo $relation6->description; ?>

                            </div>
                        </div> 
                    </div>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php $business6 =\App\BusinessEtiquete::all()->where('status', 6);?>
               
                                <?php $__currentLoopData = $business6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data6): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="know-the-rules row-am">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center">
                        <div class="col-lg-6 col-md-12  d-flex align-items-center">
                            <img src="<?php echo e(asset('public/uploads/'.$data6->imageurl)); ?>" class="img-fluid" />
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="inner-text-content">
                                <h2><?php echo e($data6->title); ?></h2>

                                <ul class="rules-list">
           <?php $businesslist1 =\App\BusinessQuestionEtiquete::all()->where('status', 1);?>
             
              <?php $__currentLoopData = $businesslist1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li><?php echo $list1->description; ?></li>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

             <?php $crelations7 =\App\ClientRelationship::all()->where('status', 7);?>
              <?php $__currentLoopData = $crelations7; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation7): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="terms-agree-ban-sec" style="background-image: url('<?php echo e(asset('public/uploads/'.$relation7->imageurl)); ?>');">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 c">
                            <div class="large-title box-title dark c-center">
                                <h2><?php echo e($relation7->title); ?></h2>
                               <?php echo $relation7->description; ?><br><br>

                                <button class="btn red-small mt-3">I agree</button>
                            </div>
                        </div> 
                    </div>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- Content END -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe-front\resources\views/frontend/pages/clientMembership.blade.php ENDPATH**/ ?>