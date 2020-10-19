<?php $__env->startSection('title', __('Local Resources')); ?>
<?php $__env->startSection('main'); ?>






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

        	<?php $resources2 =\App\LocalResource::all()->where('status', 2);?>
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
                                <?php echo $res3->description; ?>

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
                    <div class="row justify-content-center">
                        <div class="col-lg-11 ">
                        	 <?php $__currentLoopData = $resources4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="box-title dark c-center">
                                <h2><?php echo e($res4->title); ?></h2>
                                <?php echo $res4->description; ?>

                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div> 
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <form>
                                <div  class="res-search-city-form">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search City" aria-label="Search City" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn red-large" type="button">Search Location</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <ul class="nav nav-pills  mb-3 grid-box-tabs" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">healthcare</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Legal Advice</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Photographers</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-12">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="simplebar res-img-grid" id="myElement" >
                                        <ul class="res-tab-imgs" >
                              <?php $escorts =\App\User::all()->where('roleStatus', 2);?>
                                         <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <div class="img-box">
                                                    <img src="<?php echo e(asset('public/uploads/'.$escort->photo)); ?>" class="img-fluid"/>
                                                    <div class="top-content"><?php echo e($escort->name); ?></div>
                                                    <div class="bottom-content">Hight Park</div>
                                                </div>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="simplebar res-img-grid" id="myElement" >
                                        <ul class="res-tab-imgs" >
                                            <?php $escorts =\App\User::all()->where('roleStatus', 2);?>
                                         <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <div class="img-box">
                                                    <img src="<?php echo e(asset('public/uploads/'.$escort->photo)); ?>" class="img-fluid"/>
                                                    <div class="top-content"><?php echo e($escort->name); ?></div>
                                                    <div class="bottom-content">Hight Park</div>
                                                </div>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <div class="simplebar res-img-grid" id="myElement" >
                                        <ul class="res-tab-imgs" >
                                            <?php $escorts =\App\User::all()->where('roleStatus', 2);?>
                                         <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <div class="img-box">
                                                    <img src="<?php echo e(asset('public/uploads/'.$escort->photo)); ?>" class="img-fluid"/>
                                                    <div class="top-content"><?php echo e($escort->name); ?></div>
                                                    <div class="bottom-content">Hight Park</div>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- Content END -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe-front\resources\views/frontend/provider/frontLocalResources.blade.php ENDPATH**/ ?>