<?php $__env->startSection('title', __('Multi page')); ?>
<?php $__env->startSection('main'); ?>

	 <?php $blogs3 =\App\Blog::all()->where('status', 3);?>
          <?php $__currentLoopData = $blogs3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<section class=" innerpage-banner">
            <img src="<?php echo e(asset('public/uploads/'.$blog3->imageurl)); ?>" class="w-100 inner-ban-img" alt="banner image" />
            <div class="container">
                <div class="ban-text text-left">
                    <h1><?php echo e($blog3->title); ?></h1>
                    <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry </p>-->
                </div>
            </div>
        </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

       
            <section class="multipage-inner-tab-sec row-am " >
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav nav-tabs nav-pills nav-fill" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="mul-reviews-tab" data-toggle="tab" href="#mul-reviews" role="tab" aria-controls="reviews" aria-selected="true"><img src="<?php echo e(asset('public/images/multi-page-tab-1.png')); ?>"><img src="<?php echo e(asset('public/images/multi-page-tab-1-gray.png')); ?>"> Reviews</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="mul-blogs-tab" data-toggle="tab" href="#mul-blogs" role="tab" aria-controls="blogs" aria-selected="false"><img src="<?php echo e(asset('public/images/multi-page-tab-2.png')); ?>"><img src="<?php echo e(asset('public/images/multi-page-tab-2-gray.png')); ?>"> Blogs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="mul-tours-tab" data-toggle="tab" href="#mul-tours" role="tab" aria-controls="tours" aria-selected="false"><img src="<?php echo e(asset('public/images/multi-page-tab-3.png')); ?>"><img src="<?php echo e(asset('public/images/multi-page-tab-3-gray.png')); ?>"> Tours</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="mul-client-logs-tab" data-toggle="tab" href="#mul-client-logs" role="tab" aria-controls="contact" aria-selected="false"><img src="<?php echo e(asset('public/images/multi-page-tab-4.png')); ?>"><img src="<?php echo e(asset('public/images/multi-page-tab-4-gray.png')); ?>"> Client logs</a>
                                </li>
                            </ul>
                            <div class="tab-content text-white" id="myTabContent">
                                <div class="tab-pane fade show active" id="mul-reviews" role="tabpanel" aria-labelledby="mul-reviews-tab">
                                 
                                    <section class="search-city-bar blogs-search-bar ">
                                        <form method="POST" action="<?php echo e(url('search/multi/page/blog')); ?>">
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
                                    </section>
                                    <div class="escorts-grid">
                                        <div class="row">

                                        	 <?php $blogs2 =\App\Blog::all()->where('status', 2);?>
                                              <?php $__currentLoopData = $blogs2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="escort-box">
                                                    <div class="box-img">
                                                        <img src="<?php echo e(asset('public/uploads/'.$blog2->imageurl)); ?>" class="w-100" />
                                                    </div>
                                                    <div class="box-content">
                                                      <h3><?php if($blog2->publishBy==0): ?> Unknown <?php else: ?> <?php echo e(\App\User::find($blog2->publishBy)->name); ?> <?php endif; ?></h3>
                                                        <h6><?php echo e($blog2->created_at); ?></h6>  
                                                        <p><?php echo e($blog2->title); ?><a href="<?php echo e(url('blog/details/'.$blog2->id)); ?>" class="read-more-link">Read More »</a>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            

                                        </div>

                                    </div>

                                </div>
                                <div class="tab-pane fade" id="mul-blogs" role="tabpanel" aria-labelledby="mul-blogs-tab">
                                    <section class="search-city-bar blogs-search-bar ">
                                     <form method="POST" action="<?php echo e(url('search/multi/page/blog')); ?>">
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
                                    </section>
                                    <div class="escorts-grid">
                                        <div class="row">
                                            <?php $blogs2 =\App\Blog::all()->where('status', 2);?>
                                              <?php $__currentLoopData = $blogs2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="escort-box">
                                                    <div class="box-img">
                                                        <img src="<?php echo e(asset('public/uploads/'.$blog2->imageurl)); ?>" class="w-100" />
                                                    </div>
                                                    <div class="box-content">
                                                       <h3><?php if($blog2->publishBy==0): ?> Unknown <?php else: ?> <?php echo e(\App\User::find($blog2->publishBy)->name); ?> <?php endif; ?></h3>
                                                        <h6><?php echo e($blog2->created_at); ?></h6>  
                                                        <p><?php echo e($blog2->title); ?><a href="<?php echo e(url('blog/details/'.$blog2->id)); ?>" class="read-more-link">Read More »</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade home-escorts" id="mul-tours" role="tabpanel" aria-labelledby="mul-tours-tab">
                                    <section class="search-city-bar blogs-search-bar ">
                                       <form method="POST" action="<?php echo e(url('search/multi/page/blog')); ?>">
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
                                    </section>
                                    <div class="row justify-content-lg-center justify-content-md-center escort-row">
                                         <?php $escorts= \App\User::all()->where('roleStatus', 2);?>

                        <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-6">
                             <a href="<?php echo e(url('profile/'.$escort->id)); ?>">
                            <div class="our-escort-box is-available">
                               
                                <?php if($escort->photo==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$escort->photo)); ?>" class="w-100"/><?php endif; ?>

                                <div class="overlay-top">
                                    <div class="text">
                                        <h4><?php echo e($escort->name); ?></h4>
                                        <span class="location"><?php $statecount=\App\State::all()->where('id', $escort->city);?><?php if($statecount->count()<1): ?> Not Found <?php else: ?> <?php echo e(\App\State::find($escort->city)->state); ?> <?php endif; ?></span>
                                    </div>
                                </div>
                                <div class="overlay-bottom">
                                    <div class="text">
                                        <h3><?php $statecount=\App\State::all()->where('id', $escort->city);?><?php if($statecount->count()<1): ?> Not Found <?php else: ?> <?php echo e(\App\State::find($escort->city)->state); ?> <?php endif; ?>  - <?php echo e(date('d')); ?><sup>th</sup> <?php echo e(date('M')); ?></h3>
                                        <table class="escort-profile-details">
                                            <tr>
                                                <td>Suburb</td>
                                                <td><?php $citycount=\App\City::all()->where('id', $escort->suburb);?>
                           <?php if($citycount->count()<1): ?> Not Found <?php else: ?> <?php echo e(\App\City::find($escort->suburb)->city); ?> <?php endif; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Service Area</td>
                                                <td><?php if($escort->serviceArea==1): ?> In Call <?php else: ?> Out Call <?php endif; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Price</td>
                                                <td>$<?php echo e($escort->price); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Height</td>
                                                <td><?php echo e($escort->height); ?> "</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <?php if($escort->activation==1): ?>
                                <div class="availability">
                                    <h5>Available Now</h5>
                                </div>
                                <?php else: ?>
                                <?php endif; ?>
                            </div>
                        </a>
                        </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>










                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="mul-client-logs" role="tabpanel" aria-labelledby="mul-client-logs-tab">
                                    <section class="search-city-bar blogs-search-bar ">
                                       <form method="POST" action="<?php echo e(url('search/multi/page/blog')); ?>">
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
                                    </section>
                                    <div class="escorts-grid">
                                        <div class="row">
                                             <?php $blogs2 =\App\Blog::all()->where('status', 2);?>
                                              <?php $__currentLoopData = $blogs2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="escort-box">
                                                    <div class="box-img">
                                                        <img src="<?php echo e(asset('public/uploads/'.$blog2->imageurl)); ?>" class="w-100" />
                                                    </div>
                                                    <div class="box-content">
                                                       <h3><?php if($blog2->publishBy==0): ?> Unknown <?php else: ?> <?php echo e(\App\User::find($blog2->publishBy)->name); ?> <?php endif; ?></h3>
                                                        <h6><?php echo e($blog2->created_at); ?></h6>  
                                                        <p><?php echo e($blog2->title); ?><a href="<?php echo e(url('blog/details/'.$blog2->id)); ?>" class="read-more-link">Read More »</a>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- Content END -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/provider/searchMultiPageBlog.blade.php ENDPATH**/ ?>