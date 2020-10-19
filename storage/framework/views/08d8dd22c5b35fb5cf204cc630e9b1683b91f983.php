<?php $__env->startSection('title', __('Blog')); ?>
<?php $__env->startSection('main'); ?>

  <?php 
  $blogs=\App\Blog::orderBy('id', 'desc')->where('status', 1)->first();

   $slider=$blogs->imageurl;
   $title=$blogs->title;

  ?>
          
 <section class=" innerpage-banner">
            <img src="<?php echo e(asset('public/uploads/'.$slider)); ?>" class="w-100 inner-ban-img" alt="banner image" />
            <div class="container">
                <div class="ban-text text-content">
                    <h1><?php echo e($title); ?></h1>
                </div>
            </div>
        </section>
  
        <!-- Content -->
        <div id="content">
            <section class="search-city-bar blogs-search-bar mb-0 mt-0 b-r-0 ">
                <div class="container">
                    <form method="POST" action="<?php echo e(url('search/blog')); ?>">
                                  <?php echo csrf_field(); ?>

                        <div class="row justify-content-lg-center justify-content-md-center">
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                   <select class="form-control" name="country_id" onchange="selectcountry()" id="selectCountry">
                                     <?php $countries=\App\Country::all();?>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>"><?php echo e($country->country); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="state_id" onchange="selectstate()" id="stateSelect">
                                      <?php $states=\App\State::all();?>
                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($state->id); ?>"><?php echo e($state->state); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Male </option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <button class="btn red-small btn-block">search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <section class="profile-blogs row-am">
                <div class="container">
                    <div class="row">
                         <?php $blogs2 =\App\Blog::all()->where('status', 2);?>
          <?php $__currentLoopData = $blogs2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="my-blog-box">
                                <div class="blog-img">
                                    <img src="<?php echo e(asset('public/uploads/'.$blog2->imageurl)); ?>" class="w-100" alt="blog-img"/>
                                </div>
                                <div class="blog-overview">
                                    <p class="post-date"><?php echo e($blog2->created_at); ?></p>
                                    <h5><?php echo e($blog2->title); ?></h5>
                                    <a href="<?php echo e(url('blog/details/'.$blog2->id)); ?>" class="read-fblog">read full blog »</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <ul class="pagination paginationC">
                                <li><a href="#" class="previous"><i class="fas fa-chevron-left"></i></a></li>
                                <li><a href="#" class="active">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#" class="next"><i class="fas fa-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- Content END -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/provider/frontBlog.blade.php ENDPATH**/ ?>