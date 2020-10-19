<?php $__env->startSection('title', __('Become Escort')); ?>
<?php $__env->startSection('main'); ?>

    
    <?php if($section[1]): ?>
    <section class="innerpage-banner">
        <img src="<?php echo e(asset('public/uploads/' . $section[1]->imageurl)); ?>" class="w-100 inner-ban-img" alt="banner image" />
        <div class="container">
            <div class="ban-text text-left">
                <h1><?php echo e($section[1]->title); ?></h1>
                <?php echo $section[1]->description; ?>

                <a class="btn slider-link btn-line" href="#" role="button">search for provide</a>
            </div>
        </div>
    </section>
    <?php endif; ?> 

    <!-- Content -->
    <div id="content">

        
        <?php if($section[2]): ?>
        <section class="large-video-sec">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-12 p-0  order-lg-1 order-md-2 order-2">
                        <img src="<?php echo e(asset('public/uploads/' . $section[2]->imageurl)); ?>" class="w-100" />
                    </div>
                    <div class="col-lg-6 col-md-12 p-0 dark-gray-bg d-flex align-items-center  order-lg-2 order-md-1 order-1">
                        <div class="inner-text-content text-white">
                            <h1><?php echo e($section[2]->title); ?></h1>
                            <div class="simplebar text-white mt-5" id="myElement">
                               <?php echo $section[2]->description; ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </section>
        <?php endif; ?> 
        
        
        <?php if($section[3]): ?>
        <section class="left-img-text-content gym-guy"
            style="background-image: url(<?php echo e(asset('public/images/left-image-content-img-bg.jpg')); ?>); background-size: cover; background-position: center;">
            <div class="container">
                <div class="row justify-content-lg-center justify-content-md-center">

                    <div class="col-lg-8 col-md-12 d-flex align-items-center order-lg-2 order-md-1">
                        <div class="inner-text-content text-white">
                            <h1><?php echo e($section[3]->title); ?></h1>
                            <p><?php echo $section[3]->description; ?></p>
                            <button class="btn red-small">Read More</button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12  order-lg-1 order-md-2">
                        <img src="<?php echo e(asset('public/uploads/' . $section[3]->imageurl)); ?>" class="img-fluid" />
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?> 

        
        <section class="zigzag-red-sec">
            <div class="container-fluid">
                <?php if($section[4]): ?>
                <div class="row ">
                    <div class="col-lg-6 col-md-12 ">
                        <img src="<?php echo e(asset('public/uploads/' . $section[4]->imageurl)); ?>" class="zigzag-red-img" />
                    </div>
                    <div class="col-lg-6 col-md-12 ">
                        <div class="zigzag-red-box ">
                            <h3><?php echo e($section[4]->title); ?></h3>
                            <p><?php echo $section[4]->description; ?></p> 

                            <button class="btn red-small">Read More</button>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if($section[5]): ?>
                <div class="row">
                    <div class="col-lg-6 col-md-12 order-lg-2 ">
                        <img src="<?php echo e(asset('public/uploads/' . $section[5]->imageurl)); ?>" class="zigzag-red-img" />
                    </div>
                    <div class="col-lg-6 col-md-12  order-lg-1 ">
                        <div class="zigzag-red-box">
                            <h3><?php echo e($section[5]->title); ?></h3>
                            <p><?php echo $section[5]->description; ?></p> 
                            <button class="btn red-small">Read More</button>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section> 

        
        <?php if($section[6]): ?>
        <section class="red-tab-sec">
            <div class="group-red-box">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box-title dark c-center">
                                <h2><?php echo e($section[6]->title); ?></h2>
                                <p><?php echo $section[6]->description; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <ul class="red-icon-list">
                                <li>
                                    <div class="icon-box">
                                        <div class="circle-icon"><img src="<?php echo e(asset('public/images/red-circle-icon-1.png')); ?>" class="img-fluid"/></div>
                                        <h4>Some Title Here</h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-box">
                                        <div class="circle-icon"><img src="<?php echo e(asset('public/images/red-circle-icon-2.png')); ?>" class="img-fluid"/></div>
                                        <h4>Some Title Here</h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-box">
                                        <div class="circle-icon"><img src="<?php echo e(asset('public/images/red-circle-icon-3.png')); ?>" class="img-fluid"/></div>
                                        <h4>Some Title Here</h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-box">
                                        <div class="circle-icon"><img src="<?php echo e(asset('public/images/red-circle-icon-4.png')); ?>" class="img-fluid"/></div>
                                        <h4>Some Title Here</h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-box">
                                        <div class="circle-icon"><img src="<?php echo e(asset('public/images/red-circle-icon-5.png')); ?>" class="img-fluid"/></div>
                                        <h4>Some Title Here</h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-box">
                                        <div class="circle-icon"><img src="<?php echo e(asset('public/images/red-circle-icon-6.png')); ?>" class="img-fluid"/></div>
                                        <h4>Some Title Here</h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?> 

        
        <?php if($section[7]): ?>
        <section class="know-the-rules row-am">
            <div class="container">
                <div class="row justify-content-lg-center justify-content-md-center">
                    <div class="col-lg-6 col-md-12  d-flex align-items-center">
                        <img src="<?php echo e(asset('public/uploads/' . $section[7]->imageurl)); ?>" class="img-fluid" />
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="inner-text-content">
                            <h1 class="ml-4 font-weight-bold"><?php echo e($section[7]->title); ?></h1>

                            <ul class="rules-list mt-3">
                                <?php echo $section[7]->description; ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
            
        
        <?php if($section[8]): ?>
        <section class="terms-agree-ban-sec"
            style="background-image: url(<?php echo e(asset('public/uploads/' . $section[8]->imageurl)); ?>); background-size: cover; padding: 60px 0px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-11 c">
                        <div class="large-title box-title dark c-center">
                            <h2><?php echo e($section[8]->title); ?></h2>
                            <p><?php echo $section[8]->description; ?></p>

                            <button class="btn red-small mt-3">I agree</button>
                        </div>
                    </div> 
                </div>
            </div>
        </section>
        <?php endif; ?>
            
    </div> <!-- / Content END -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/provider/frontBecomeEscort.blade.php ENDPATH**/ ?>