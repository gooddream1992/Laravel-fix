<style type="text/css">
    .ask-forum-inner p
    {
        color: white !important;
    }
</style>

<?php $__env->startSection('title', __('Terms & Condition')); ?>
<?php $__env->startSection('main'); ?>
<?php
    /*$counttops =\App\Term::all()->where('status', 2);
    $tops =\App\Term::orderBy('id','desc')->where('status', 2)->first();
    if($counttops->count()<1){
        $toptitle=0;
    }else {
        $toptitle=$tops->title;
    }
    $bottoms =\App\Term::all()->where('status', 1);
    $slidercnt=\App\Slider::all()->where('category', 3);
    
    $slider=\App\Slider::orderBy('id','desc')->where('category', 3)->first();
    if($slidercnt->count()<1) {
        $slider1=0;
        $title=0;
        $description=0;
    } else {
        $slider1=$slider->slider;
        $title=$slider->title;
        $description=$slider->description;
    }*/
?>
<section class=" innerpage-banner">
  <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
  <?php if($value->status == 1): ?>
            <img src="<?php echo e(asset('public/uploads/'.$value->imageurl)); ?>" class="w-100 inner-ban-img" alt="banner image" />
            <div class="container">
              
                <div class="ban-text text-left">
                    <h1><?php echo e($value->title); ?></h1>
                    <!-- <a class="btn slider-link btn-line" href="#" role="button">Advertising Rules</a> -->
                    <p><?php echo $value->description ?></p>
                </div>
              

                
            </div>
            
        </section>
        <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- Content -->
        <div id="content">
<section class="ask-forum-sec">
                <div class="container">
                    <div class="ask-forum-inner">
                        <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($value->status==2): ?>
                            <p><?php echo $value->description ?></p>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section> 
                        <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($value->status==3): ?>
           <section class="ask-forum-sec" style="background-color: black;">
            <div class="container">
                    <div class="ask-forum-inner">
                            <p><?php echo $value->description ?></p>
                    </div>
                </div>
           </section>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

        </div>
        <!-- Content END -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/pages/termsCondition.blade.php ENDPATH**/ ?>