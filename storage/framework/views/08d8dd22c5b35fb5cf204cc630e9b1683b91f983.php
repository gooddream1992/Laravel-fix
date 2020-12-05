<?php $__env->startSection('title', __('Blog')); ?>
<?php $__env->startSection('main'); ?>

  <?php 
  $sblog=\App\Blog::orderBy('id', 'desc')->where([
    ['publishBy','=',1],
    ['publicationStatus','=',1],
    ['role',1],
])->first();
  
   // $slider=isset($sblog->banner_image) ? $sblog->banner_image : '';
   $title=isset($sblog->title) ? $sblog->title : '';

    $slidercnt=\App\Slider::all()->where('category', 8);

    $sliders=\App\Slider::orderBy('id','desc')->where('category', 8)->first();
    if($slidercnt->count()<1){
        $slider1=NULL;
        $slider2=NULL;
        $slider3=NULL;
        $title=NULL;
        $description=NULL;
    }else{
        $slider1=$sliders->slider;
        $slider2=$sliders->slider1;
        $slider3=$sliders->slider2;
        $title=$sliders->title;
        $description=$sliders->description;
    }

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
            <!-- <section class="search-city-bar blogs-search-bar mb-0 mt-0 b-r-0 ">
                <div class="container">
                    <form method="POST" action="<?php echo e(route('front.admin.blog')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row justify-content-lg-center justify-content-md-center">
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                   <select class="form-control" name="country_id" onchange="getCities()" id="selectCountry">
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->id); ?>"
                                            <?php echo e((!empty($country_id) && $country_id == $country->id) ? 'selected' : ''); ?>>
                                                <?php echo e($country->country); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="state_id" id="citySelect">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="gender">
                                        <option value="1" <?php echo e((!empty($gender) && $gender == 1) ? 'selected' : ''); ?>>Male</option>
                                        <option value="2" <?php echo e((!empty($gender) && $gender == 2) ? 'selected' : ''); ?>>Female</option>
                                        <option value="3" <?php echo e((!empty($gender) && $gender == 3) ? 'selected' : ''); ?>>Trans Gender</option>
                                        <option value="4" <?php echo e((!empty($gender) && $gender == 4) ? 'selected' : ''); ?>>Gay</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <button class="btn red-small btn-block">search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section> -->
            <section class="profile-blogs row-am">
                <div class="container">
                    <div class="row">
                        <?php if($blogs->count() > 0): ?>
                            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="my-blog-box" style="height: 250px;">
                                    <div class="blog-img">
                                        <?php if($blog->imageurl): ?>
                                            <img src="<?php echo e(asset('public/uploads/'.$blog->imageurl)); ?>" class="w-100" alt="blog-img"/>
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100" alt="blog-img"/>
                                        <?php endif; ?>
                                    </div>
                                    <div class="blog-overview">
                                        <p class="post-date"><?php echo e($blog->created_at); ?></p>
                                        <h5><?php echo e($blog->title); ?></h5>
                                        <a href="<?php echo e(route('admin.blog.details', $blog->id)); ?>" class="read-fblog">read full blog »</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    <div class="c-pagination w-100">
                        <?php echo e($blogs->links()); ?>

                    </div>
                </div>
            </section>

        </div>
        <!-- Content END -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/provider/frontBlog.blade.php ENDPATH**/ ?>