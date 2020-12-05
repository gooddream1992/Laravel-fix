<?php $__env->startSection('title', __('Business Etiquete')); ?>
<?php $__env->startSection('main'); ?>
<?php
$slidercnt=\App\Slider::all()->where('category', 4);
$sliders=\App\Slider::orderBy('id','desc')->where('category', 4)->first();
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
                <div class="carousel-inner">
                    <div class="carousel-item active" style="background-image: url('<?php echo e(asset('public/uploads/'.$slider1)); ?>');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                      
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1><?php echo e($title); ?></h1>
                                <p><?php echo $description; ?></p>
                                <!--<a class="btn slider-link btn-line" href="#" role="button">Search For Provide</a>-->
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="background-image: url('<?php echo e(asset('public/uploads/'.$slider2)); ?>');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                       
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1><?php echo e($title); ?></h1>
                                <p><?php echo $description; ?></p>
                                <!--<a class="btn slider-link btn-line" href="#" role="button">Search For Provide</a>-->
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="background-image: url('<?php echo e(asset('public/uploads/'.$slider3)); ?>');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                      
                        <div class="container">
                            <div class="carousel-caption text-left">
                                  <h1><?php echo e($title); ?></h1>
                                <p><?php echo $description; ?></p>
                                <!--<a class="btn slider-link btn-line" href="#" role="button">Search For Provide</a>-->
                            </div>
                        </div>
                    </div>
                </div>

<!--                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only"></span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>-->
            </div>
        </section>

        <!-- Content -->
        <div id="content">
            <section class="umbrella-man">
                <div class="container">
                    
                    <?php $business =\App\BusinessEtiquete::all()->where('status', 1);?>
                    
                    <?php $__currentLoopData = $business; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row justify-content-lg-center justify-content-md-center">

                        <div class="col-lg-7 col-md-12  order-lg-2 order-md-1">
                            <div class="inner-text-content">
                                <h2><?php echo e($data->title); ?></h2>
                                <?php echo $data->description; ?>

                            </div>
                        </div>
                       
                        <div class="col-lg-5 col-md-12 d-flex align-items-center order-lg-1 order-md-2">
                            <img src="<?php echo e(asset('public/uploads/'.$data->imageurl)); ?>" class="img-fluid" />
                        </div>
                    </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>
            <section class="red-tab-sec">
                <ul class="nav nav-pills  nav-pills nav-justified" id="pills-tab" role="tablist">
                    <?php $__currentLoopData = $business_etiquetes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty($value->toggle)): ?>
                            <?php if($key%2==0): ?>
                                <li class="nav-item">
                                    <a class="nav-link single active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                                        <span class="sprint-user-icons"></span>
                                        <?php echo e($value->toggle); ?>

                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link multiple" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                                        <span class="sprint-user-icons"></span>
                                        <?php echo e($value->toggle); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- <li class="nav-item">
                        <a class="nav-link multiple" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><span class="sprint-user-icons"></span>Some Title Here</a>
                    </li> -->
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="group-red-box">
                            <div class="container">

                                <?php $business2 =\App\BusinessEtiquete::all()->where('status', 2);?>
               
              <?php $__currentLoopData = $business2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="box-title dark c-center">
                                            <h2><?php echo e($data2->title); ?></h2>
                                            <?php echo e($data2->description); ?>

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
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="group-red-box">
                            <div class="container">
                                <div class="row">
           <?php $business4 =\App\BusinessEtiquete::all()->where('status', 4);?>
               
                                <?php $__currentLoopData = $business4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-12">
                                        <div class="box-title dark c-center">
                                             <h2><?php echo e($data4->title); ?></h2>
                                            <?php echo e($data4->description); ?>

                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-10">
                                        <ul class="red-icon-list">

                            <?php $business5 =\App\BusinessEtiquete::all()->where('status', 5);?>
               
                                <?php $__currentLoopData = $business5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data5): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <div class="icon-box">
                                                    <div class="circle-icon"><img src="<?php echo e(asset('public/uploads/'.$data5->imageurl)); ?>" class="img-fluid"/></div>
                                                    <h4><?php echo e($data5->title); ?></h4>
                                                </div>
                                            </li>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

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
            <!-- Section 3 -->



            <section class="zigzag-red-sec">
                <div class="container-fluid">

                     <?php $business7 =\App\BusinessEtiquete::all()->where('status', 7);?>
               
                                <?php $__currentLoopData = $business7; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data7): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-12 ">
                            <img src="<?php echo e(asset('public/uploads/'.$data7->imageurl)); ?>" class="zigzag-red-img" />
                        </div>
                        <div class="col-lg-6 col-md-12 red-bg">
                            <div class="zigzag-red-box text-white">
                                <h3><?php echo e($data7->title); ?></h3>
                                <?php echo $data7->description; ?>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                     <?php $business8 =\App\BusinessEtiquete::all()->where('status', 8);?>
               
                                <?php $__currentLoopData = $business8; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data8): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row mb-3">
                       
                        <div class="col-lg-6 col-md-12 order-lg-2 ">
                            <img src="<?php echo e(asset('public/uploads/'.$data8->imageurl)); ?>" class="zigzag-red-img" />
                        </div>
                         <div class="col-lg-6 col-md-12  order-lg-1 red-bg">
                            <div class="zigzag-red-box text-white">
                                <h3><?php echo e($data8->title); ?></h3>
                                <?php echo $data8->description; ?>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      <?php $business9 =\App\BusinessEtiquete::all()->where('status', 9);?>
               
                                <?php $__currentLoopData = $business9; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data9): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-12 ">
                            <img src="<?php echo e(asset('public/uploads/'.$data9->imageurl)); ?>" class="zigzag-red-img" />
                        </div>
                        <div class="col-lg-6 col-md-12 red-bg">
                            <div class="zigzag-red-box text-white">
                               <h3><?php echo e($data9->title); ?></h3>
                                <!-- <ul class="rules-list"> -->
                                    <?php $businesslist2 =\App\BusinessQuestionEtiquete::all()->where('status', 2);?>
                                    <?php $__currentLoopData = $businesslist2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo $list2->description; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <!-- </ul> -->
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>
            <section class="grid-box-sec dark">
                <div class="container">
                    <div class="row">
                          <?php $business10 =\App\BusinessEtiquete::all()->where('status', 10);?>
               
                                <?php $__currentLoopData = $business10; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data10): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-lg-4 col-md-4 d-flex align-items-center">
                            <div class="sec-side-title dark">
                                <?php if(!empty($data10->toggle)): ?>
                                <div class="red-label-text"><span><?php echo e($data10->toggle); ?></span></div>
                                <?php endif; ?>
                                <h2 class="inner-sec-title"><?php echo e($data10->title); ?></h2>
                                <?php echo $data10->description; ?>

                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          <?php $business11 =\App\BusinessEtiquete::all()->where('status', 11);?>
               
                                <?php $__currentLoopData = $business11; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data11): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="card-box red-bg">
                                <img src="<?php echo e(asset('public/uploads/'.$data11->imageurl)); ?>" />  
                                <h4><?php echo e($data11->title); ?></h4>
                               <?php echo $data11->description; ?>

                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php $business12 =\App\BusinessEtiquete::all()->where('status', 12);?>
               
                                <?php $__currentLoopData = $business12; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data12): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-4 ">
                            <div class="card-box black-bg">
                                <img src="<?php echo e(asset('public/uploads/'.$data12->imageurl)); ?>" />
                                <h4><?php echo e($data12->title); ?></h4>
                               <?php echo $data12->description; ?>

                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>


        </div>
        <!-- Content END -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/pages/businessEtiquete.blade.php ENDPATH**/ ?>