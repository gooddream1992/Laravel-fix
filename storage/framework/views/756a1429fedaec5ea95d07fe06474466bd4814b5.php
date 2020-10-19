<?php $__env->startSection('title', __('Purchase Marketing')); ?>
<?php $__env->startSection('main'); ?>

  <?php $marketings1 =\App\PurchaseMarketing::all()->where('status', 1);?>
                 <?php $i=1;?>
              <?php $__currentLoopData = $marketings1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $market1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

 <section class=" innerpage-banner">
            <img src="<?php echo e(asset('public/uploads/'.$market1->imageurl)); ?>" class="w-100 inner-ban-img" alt="banner image" />
            <div class="container">
                <div class="ban-text c-center">
                    <h1><?php echo e($market1->title); ?></h1>
                    <?php echo $market1->description; ?>

                </div>
            </div>
        </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!-- Content -->
        <div id="content">
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

             <?php $marketings2 =\App\PurchaseMarketing::all()->where('status', 2);?>
              <?php $__currentLoopData = $marketings2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $market2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <section class="dark-zig-zag-sec"  style="background-image: url('<?php echo e(asset('public/uploads/'.$market2->imageurl)); ?>');">
                <div class="container">
                    <div class="zigzag-red-sec">
                        <div class="container-fluid">

                        	<?php $marketings3 =\App\PurchaseMarketing::all()->where('status', 3);?>
              <?php $__currentLoopData = $marketings3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $market3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="row">
                                <div class="col-lg-6 col-md-12 ">
                                    <img src="<?php echo e(asset('public/uploads/'.$market3->imageurl)); ?>" class="zigzag-red-img">
                                </div>
                                <div class="col-lg-6 col-md-12 dark-gray-bg">
                                    <div class="zigzag-red-box">
                                        <h3><?php echo e($market3->title); ?></h3>
                                        <?php echo $market3->description; ?><br><br>
                                        <a href="#" class="btn read-more-btn">read more</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $marketings4 =\App\PurchaseMarketing::all()->where('status', 4);?>
                            <?php $__currentLoopData = $marketings4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $market4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 order-lg-2 ">
                                    <img src="<?php echo e(asset('public/uploads/'.$market4->imageurl)); ?>" class="zigzag-red-img">
                                </div>
                                <div class="col-lg-6 col-md-12  order-lg-1 black-bg">
                                    <div class="zigzag-red-box">
                                       <h3><?php echo e($market4->title); ?></h3>
                                        <?php echo $market4->description; ?><br><br>
                                       <a href="#" class="btn read-more-btn">read more</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                               <?php $marketings5 =\App\PurchaseMarketing::all()->where('status', 5);?>
                            <?php $__currentLoopData = $marketings5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $market5): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 ">
                                    <img src="<?php echo e(asset('public/uploads/'.$market5->imageurl)); ?>" class="zigzag-red-img">
                                </div>
                                <div class="col-lg-6 col-md-12 dark-gray-bg">
                                    <div class="zigzag-red-box">
                                       <h3><?php echo e($market5->title); ?></h3>
                                        <?php echo $market5->description; ?><br><br>
                                        <a href="#" class="btn read-more-btn">read more</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $tops =\App\Faq::all()->where('status', 1);?>
              <?php $__currentLoopData = $tops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="row-am title-video-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 d-flex align-items-center">
                            <div class="sec-side-title">
                                <div class="red-label-text"><span>Lorem Ipsum</span></div>
                                <h2 class="inner-sec-title"><?php echo e($top->title); ?> </h2>
                               <?php echo $top->description; ?>

                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="sec-video-box">
                                <img src="<?php echo e(asset('public/uploads/'.$top->imageurl)); ?>" class="w-100" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <section class="inner-contact row-am">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            <div class="box-title c-center dark">
                                <h2>Contact Us</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem
                                    Ipsum has been the industrys standard dummy text ever since the</p>
                            </div>
                        </div>
                    </div>
                    <form class="mt-2">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Full Name"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone Number" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email Address"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <div class="g-recaptcha"  data-sitekey="6LeHcKYUAAAAAKAOAhKFpG744AX86JmzV58K6d6n"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="submit" value="submit now" class="btn form-submit right">
                                </div>
                            </div>
                        </div> 
                    </form>
                </div>
            </section>
            <section class="payment-method-sec row-am">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="box-title c-center">
                                <h2 class="mb-0">Please select Payment method</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <ul class="payment-method-list">
                                <li class="paymen-btn-box">
                                    <a href="#" class="btn payment-method-btn"><h3>Paypal</h3> <img src="<?php echo e(asset('public/images/paypal-logo.png')); ?>" /></a>
                                </li>
                                <li class="paymen-btn-box">
                                    <a href="#" class="btn payment-method-btn"><h3>Credit Card</h3> <img src="<?php echo e(asset('public/images/credit-card-icon.png')); ?>" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Content END -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe-front\resources\views/frontend/provider/frontPurchaseMarketing.blade.php ENDPATH**/ ?>