<?php $__env->startSection('title', __('Our Story')); ?>
<?php $__env->startSection('main'); ?>

<?php
$slidercnt=\App\Slider::all()->where('category', 5);
$sliders=\App\Slider::orderBy('id','desc')->where('category', 5)->first();
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

 <section class="inner-page-slider">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner right-content">
                    <div class="carousel-item active"  style="background-image: url('<?php echo e(asset('public/uploads/'.$slider1)); ?>');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                        <!--<img class="first-slide" src="images/our-story-slide-1.jpg" alt="First slide">-->
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1><?php echo e($title); ?></h1>
                                <p><?php echo $description; ?></p>
                                <!-- <a class="btn slider-solid-red-btn" href="#" role="button">Explore</a>
                                <a class="btn slider-solid-black-btn" href="#" role="button">Buy Now</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="second-slide" style="background-image: url('<?php echo e(asset('public/uploads/'.$slider2)); ?>');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                        <div class="container">
                            <div class="carousel-caption text-left">
                               <h1><?php echo e($title); ?></h1>
                                <p><?php echo $description; ?></p>
                                <!-- <a class="btn slider-solid-red-btn" href="#" role="button">Explore</a>
                                <a class="btn slider-solid-black-btn" href="#" role="button">Buy Now</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="background-image: url('<?php echo e(asset('public/uploads/'.$slider3)); ?>');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                        <!--<img class="third-slide" src="images/our-story-slide-1.jpg" alt="Third slide">-->
                        <div class="container">
                            <div class="carousel-caption text-left">
                               <h1><?php echo e($title); ?></h1>
                                <p><?php echo $description; ?></p>
                                <!-- <a class="btn slider-solid-red-btn" href="#" role="button">Explore</a>
                                <a class="btn slider-solid-black-btn" href="#" role="button">Buy Now</a> -->
                            </div>
                        </div>
                    </div>
                </div>

               <!--  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only"></span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a> -->
            </div>
        </section>

        <!-- Content -->
        <div id="content">

             <section class="grid-box-sec dark">
                <div class="container">
                    <div class="row">
                        <?php $stories4 =\App\OurStory::all()->where('status', 4);?>
                        <?php $__currentLoopData = $stories4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-4 d-flex align-items-center">
                            <div class="sec-side-title dark">
                                <div class="red-label-text"><span>Lorem Ipsum</span></div>
                                <h2 class="inner-sec-title"><?php echo e($story4->title); ?> </h2>
                                <p><?php echo e($story4->description); ?></p>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $stories5 =\App\OurStory::all()->where('status', 5);?>
                        <?php $__currentLoopData = $stories5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story5): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="card-box red-bg">
                                <img src="images/grid-box-icon-1.png" />  
                                <h4><?php echo e($story5->title); ?> </h4>
                                <p><?php echo e($story5->description); ?></p>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $stories6 =\App\OurStory::all()->where('status', 6); ?>
                        <?php $__currentLoopData = $stories6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story6): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-4 ">
                            <div class="card-box black-bg">
                                <img src="images/grid-box-icon-2.png" />
                                <h4><?php echo e($story6->title); ?> </h4>
                                <p><?php echo e($story6->description); ?></p>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
            
            <section class="join-commuunity-sec">
                <div class="container">

                     <?php $stories1 =\App\OurStory::all()->where('status', 1);?>
              <?php $__currentLoopData = $stories1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="join-commuunity-video-box video-box">
                                <img src="<?php echo e(asset('public/uploads/'.$story1->imageurl)); ?>" class="w-100" />
                                <!-- <a href="" class="play-btn"><img src="<?php echo e(asset('public/images/video-play-icon.png')); ?>" /></a> -->
                            </div>
                            <!-- <a href="#" class="btn join-commuunity-btn">Join Our Community</a> -->
                        </div>
                        <div class="col-lg-6">
                            <div class="sec-side-title join-commuunity-content">
                                <div class="red-label-text"><span>Lorem Ipsum</span></div>
                                <h3 class=""><?php echo e($story1->title); ?></h3>
                                <?php echo $story1->description; ?>

                           
                                <div class="author">
                                    <!-- <img src="<?php echo e(asset('public/images/signature.png')); ?>" class="img-fluid"/> -->
                                    <h5><?php echo e($story1->signature); ?> <span>- <?php echo e($story1->designation); ?></span></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>
            <?php $stories2 =\App\OurStory::all()->where('status', 2);?>
              <?php $__currentLoopData = $stories2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <section class="get-body-sec row-am black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="get-body-inner">
                                <div class="large-title box-title dark c-center">
                                   <h2><?php echo e($story2->title); ?></h2>
                                <p><?php echo $story2->description; ?></p>
                           
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <section class="redbox-icon-sec">
                <div class="container">
                    <div class="row">
                        <?php $stories3 =\App\OurStory::all()->where('status', 3);?>
              <?php $__currentLoopData = $stories3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 c-center">
                            <div class="red-bg-box">
                                <img src="<?php echo e(asset('public/uploads/'.$story3->imageurl)); ?>" class="img-fluid" />
                                <a href="#" class="btn box-line-btn"><?php echo e($story3->title); ?></a>
                            </div>
                           
                                <?php echo $story3->description; ?>

                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                </div>
            </section>
        </div>
        <!-- Content END -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/pages/ourStory.blade.php ENDPATH**/ ?>