<?php $__env->startSection('title', __('Sex Trafficking')); ?>
<?php $__env->startSection('main'); ?>

<style type="text/css">
	.col-lg-8{max-width:100% !important;}
</style>
   <?php $sxtraffics1 =\App\SexTrafficking::all()->where('status', 1); ?>
              <?php $__currentLoopData = $sxtraffics1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trafic1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<section class=" innerpage-banner">
            <img src="<?php echo e(asset('public/uploads/'.$trafic1->imageurl)); ?>" class="w-100 inner-ban-img" alt="banner image" />
            <div class="container">
                <div class="ban-text text-left">
                    <h1><?php echo e($trafic1->title); ?> </h1>
                    <?php echo $trafic1->description; ?><br><br>
                    <a class="btn slider-link btn-line" href="#" role="button">Donate Here</a>
                </div>
            </div>
        </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!-- Content -->
        <div id="content">
            <section class="stop-sex-traffic-sec row-am">
                <div class="container">
                	<?php $sxtraffics2 =\App\SexTrafficking::all()->where('status', 2); ?>
              <?php $__currentLoopData = $sxtraffics2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trafic2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row justify-content-center c-center">
                        <div class="col-lg-12">
                            <div class="large-title box-title">
                                <h2><?php echo e($trafic2->title); ?></h2>
                                <?php echo $trafic2->description; ?>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                    	<?php $sxtraffics3 =\App\SexTrafficking::all()->where('status', 3); ?>
              <?php $__currentLoopData = $sxtraffics3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trafic3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="sex-traffic-box c-center">
                                <img src="<?php echo e(asset('public/uploads/'.$trafic3->imageurl)); ?>" />
                                <h4><?php echo e($trafic3->title); ?></h4>
                               <?php echo $trafic3->description; ?>

                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
            <section class="get-body-sec row-am red-bg">
                <div class="container">
                	<?php $sxtraffics4 =\App\SexTrafficking::all()->where('status', 4); ?>
              <?php $__currentLoopData = $sxtraffics4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trafic4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="large-title box-title dark c-center">
                                <h2><?php echo e($trafic4->title); ?></h2>
                               <?php echo $trafic4->description; ?>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="row justify-content-center mt-4 body-box-grid">
                    	<?php $sxtraffics5 =\App\SexTrafficking::all()->where('status', 5); ?>
              <?php $__currentLoopData = $sxtraffics5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trafic5): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 ">
                            <div class="img-box">
                                <img src="<?php echo e(asset('public/uploads/'.$trafic5->imageurl)); ?>" class="body-img img-fluid" />
                            </div>
                        </div>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
            <?php $sxtraffics6 =\App\SexTrafficking::all()->where('status', 6); ?>
              <?php $__currentLoopData = $sxtraffics6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trafic6): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="click-to-donate-sec row-am"  style="background-image: url('<?php echo e(asset('public/uploads/'.$trafic6->imageurl)); ?>');">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="box-title dark c-center mb-0">
                                <h2><?php echo e($trafic6->title); ?></h2>
                                <a class="btn slider-link btn-line" href="#" role="button">Click here to donate</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php $__currentLoopData = $sxtraffics6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trafic6): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="testimonial-quote row-am">
                <div class="container">
                    <div class="row justify-content-center c-center">
                        <div class="col-lg-10">
                            <div class="testimonial-quote-box">
                                <?php echo $trafic6->description; ?>

                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $sxtraffics7 =\App\SexTrafficking::all()->where('status', 7); ?>
              <?php $__currentLoopData = $sxtraffics7; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trafic7): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="get-lerner-sec row-am"  style="background-image: url('<?php echo e(asset('public/uploads/'.$trafic7->imageurl)); ?>');">
                <div class="container">
                	
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="large-title box-title dark c-center mb-6">
                                <h2><?php echo e($trafic7->title); ?> </h2>
                              
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $sxtraffics7; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trafic7): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                    	<?php $sxtraffics8 =\App\SexTrafficking::all()->where('status', 8); ?>
              
                        <div class="col-lg-4 c-center">
                        	<?php $__currentLoopData = $sxtraffics8; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trafic8): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img src="<?php echo e(asset('public/uploads/'.$trafic8->imageurl)); ?>" class="img-fluid" />
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                       
                        <div class="col-lg-8">
                            <div class="get-lerner-content text-white">
                                <?php echo $trafic7->description; ?>

                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="get-lerner-white row-am">
                <div class="container">
                	<?php $sxtraffics9 =\App\SexTrafficking::all()->where('status', 9); ?>
              <?php $__currentLoopData = $sxtraffics9; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trafic9): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="large-title box-title c-center mb-6">
                                <h2><?php echo e($trafic9->title); ?></h2>
                                
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     
                    <div class="row">
                    	
                        <div class="col-lg-4 order-lg-2 c-center">
                        	<?php $__currentLoopData = $sxtraffics9; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trafic9): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img src="<?php echo e(asset('public/uploads/'.$trafic9->imageurl)); ?>" class="img-fluid" />
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                       
                        
                        <div class="col-lg-8 order-lg-1">
                            <div class="get-lerner-content">
                            	<?php $__currentLoopData = $sxtraffics9; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trafic9): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <?php echo $trafic9->description; ?>

                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        
                    </div>


                    
                </div>
            </div>
        </div>
        <!-- Content END -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe-front\resources\views/frontend/provider/frontSexTrafficking.blade.php ENDPATH**/ ?>