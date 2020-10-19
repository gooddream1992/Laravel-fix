<?php $__env->startSection('title', __('Privacy Statement')); ?>
<?php $__env->startSection('main'); ?>

 
        <!-- Content -->
<section class="ask-forum-sec" style="background-color: white;">
    <div id="content" class="container">
        <?php $__currentLoopData = $privacy_statement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h1><label><?php echo e($value->titile); ?></label></h1>
           <p><?php echo $value->description; ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
 <!-- <section class="terms-icons-sec">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="terms-icons-list m-hidden">
                                <li>
                                    <div class="icon-box">
                                        <img src="images/terms-icon-1.png" />
                                        <h4>Come See Us</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-box">
                                        <img src="images/terms-icon-2.png" />
                                        <h4>Come See Us</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-box">
                                        <img src="images/terms-icon-3.png" />
                                        <h4>Come See Us</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-box">
                                        <img src="images/terms-icon-4.png" />
                                        <h4>Come See Us</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-box">
                                        <img src="images/terms-icon-5.png" />
                                        <h4>Come See Us</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                    </div>
                                </li>
                            </ul>

                            <div class="mobile-terms-icon m-visible desk-hidden">
                                <div id="multi-item-example" class="carousel slide carousel-multi-item carousel-fade" data-ride="carousel">

                                    <div class="controls-top">
                                        <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                                        <a class="btn-floating right" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                                    </div>
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-1.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                   <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-2.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-3.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                   <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-4.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-5.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section> -->

        <!-- Content END -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/pages/privacystatement.blade.php ENDPATH**/ ?>