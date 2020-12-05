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
                    <!--<a class="btn slider-link btn-line" href="#" role="button">search for provide</a>-->
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
                        <div class="col-lg-6 col-md-12 p-0   d-flex align-items-center order-lg-2 order-md-1 order-1">
                            <div class="inner-text-content">
                                <h2><?php echo e($relation1->title); ?></h2>
                                <div class="simplebar"  id="myElement">
                                    <?php echo $relation1->description; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div> 
            </section>
            <section class="red-tab-sec">
                
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


                            </div>
                        </div>
                        <?php $crelations4 =\App\ClientRelationship::all()->where('status', 4);?>
              <?php $__currentLoopData = $crelations4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-12  order-lg-1 order-md-2 align-self-center"> 
                            <img src="<?php echo e(asset('public/uploads/'.$relation4->imageurl)); ?>" class="img-fluid" />
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php $crelations8 =\App\ClientRelationship::all()->where('status', 8);
            ?>
            
            <section class="red-tab-sec">
                <div class="group-red-box">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="box-title dark c-center">
                                    <?php
                                        $title = array();
                                        $sub_title = array();
                                    ?>
                                    <?php $__currentLoopData = $crelations8; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value8): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $title['title']  = $value8->title;
                                            $sub_title['sub_title'] = $value8->sub_title;
                                        ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <h2><?php echo e($title['title']); ?></h2>
                                    <h2></h2>
                                    
                                    <p><?php echo e($sub_title['sub_title']); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <ul class="red-icon-list">
                                    <?php $__currentLoopData = $crelations8; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation8): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <div class="icon-box">
                                            <div class="circle-icon"><img src="<?php echo asset('public/uploads/'.$relation8->imageurl) ?>" class="img-fluid"/></div>
                                            <h4><?php echo $relation8->description; ?></h4>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            


             <?php $crelations5 =\App\ClientRelationship::all()->where('status', 5);?>
              <?php $__currentLoopData = $crelations5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation5): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="left-img-text-content">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center">

                        <div class="col-lg-8 col-md-12 d-flex align-items-center ">
                            <div class="inner-text-content ">
                              <h2><?php echo e($relation5->title); ?></h2>
                                <?php echo $relation5->description; ?>


                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 align-self-center ">
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

            
            <?php
                $crelations9 =\App\ClientRelationship::all()->where('status', 9);
                $title9 = array();
                $image = array();
            ?>
            <?php $__currentLoopData = $crelations9; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation9): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php 
                    $title9['title'] = $relation9->title;
                    $image['image'] = $relation9->imageurl;
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <section class="know-the-rules row-am">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center">
                        <div class="col-lg-6 col-md-12  d-flex align-items-center">
                            <img src="<?php echo e(asset('public/uploads/'.$image['image'])); ?>" class="img-fluid" />
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="inner-text-content">
                                
                                <h2><?php echo e($title9['title']); ?></h2>
                                <ul class="rules-list">
                                    <?php $__currentLoopData = $crelations9; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation9): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo $relation9->description; ?></li>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            

             <?php $crelations7 =\App\ClientRelationship::all()->where('status', 7);?>
              <?php $__currentLoopData = $crelations7; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation7): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="terms-agree-ban-sec" style="background-image: url('<?php echo e(asset('public/uploads/'.$relation7->imageurl)); ?>');">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 c">
                            <div class="large-title box-title dark c-center">
                                <h2><?php echo e($relation7->title); ?></h2>
                               <?php echo $relation7->description; ?><br><br>
                               <a href="<?php echo e(url('client/signup')); ?>" class="btn red-small mt-3">I agree</a>
                                <!-- <button class="btn red-small mt-3">I agree</button> -->
                            </div>
                        </div> 
                    </div>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- Content END -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/pages/clientMembership.blade.php ENDPATH**/ ?>