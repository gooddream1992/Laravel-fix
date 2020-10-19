<?php $__env->startSection('title', __('Index')); ?>
<?php $__env->startSection('main'); ?>

<section class="home-slider">

            <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <?php $slider=\App\Slider::orderBy('id','desc')->where('category', 1)->first(); 
                        $slider1= $slider->slider; 
                        $slider2= $slider->slider1; 
                        $slider3= $slider->slider2;  ?>
                        <img class="first-slide" src="<?php echo e(asset('public/uploads/'.$slider1)); ?>" alt="First slide">
                    </div>
                    <div class="carousel-item">
                <img class="second-slide" src="<?php echo e(asset('public/uploads/'.$slider2)); ?>" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                <img class="third-slide" src="<?php echo e(asset('public/uploads/'.$slider3)); ?>" alt="Third slide">
                    </div>
                </div>
            </div>
        </section>




         
        <section class="advance-search-section m-hidden">
            <div class="container">
                <div class="row justify-content-lg-center justify-content-md-center ">
                    <div class="col-lg-12">
                        <div class="advance-search-sec-form">

                            <form method="POST" action="<?php echo e(url('filter/search/escort')); ?>">
                                <?php echo csrf_field(); ?>

                                <div class="form-box">
                                    <ul class="fields">

                                        
                                        <li>
                                            <div class="form-group">
                                                <select class="form-control" name="country_id" onchange="getCities()" id="selectCountry">
                                                    <?php $countries = \App\Country::all(); ?>
                                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($country->id); ?>" <?php echo e(($country->id == $country_id) ? 'selected' : ''); ?>>
                                                            <?php echo e($country->country); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </li> 
                                        
                                        
                                        <li>
                                            <div class="form-group">
                                                <select class="form-control" name="city_id" id="citySelect"> 
                                                    <?php $cities = \App\City::all(); ?>
                                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($city->id); ?>">
                                                            <?php echo e($city->city); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </li> 

                                        
                                        <li>
                                            <div class="form-group">
                                                <select class="form-control" name="gender">
                                                    <option value="1" <?php echo e(($gender == 1) ? 'selected' : ''); ?>>Male</option>
                                                    <option value="2" <?php echo e(($gender == 2) ? 'selected' : ''); ?>>Female</option>
                                                    <option value="3" <?php echo e(($gender == 3) ? 'selected' : ''); ?>>Trans Gender</option> 
                                                </select>
                                            </div>
                                        </li> 

                                        
                                        <li>
                                            <div class="form-group">
                                                
                                                
                                                <select class="form-control" name="service_type">
                                                    <option value="1" <?php echo e($service_type == 1 ? 'selected' : ''); ?>>Escort</option>
                                                    <option value="2" <?php echo e($service_type == 2 ? 'selected' : ''); ?>>BDSM</option>
                                                    <option value="3" <?php echo e($service_type == 3 ? 'selected' : ''); ?>>Massage</option>
                                                </select>
                                                
                                            </div>
                                        </li> 

                                        
                                        <li>
                                            <div class="form-group">
                                                <input name="keyword" type="text" class="form-control" placeholder="Keyword" 
                                                    value="<?php echo e(isset($keyword) ? $keyword : ''); ?>"/>
                                            </div>
                                        </li> 

                                        
                                        <li class="custom-toggle">
                                            <button type="button" class="custom-toggle-btn btn btn-danger mb-3 w-100" data-toggle="button" aria-pressed="false"
                                                id="touring_escorts_btn" onclick="customToggle('touring_escorts', 'touring_escorts_btn');">
                                                Touring Escorts
                                            </button>
                                            <input type="hidden" id="touring_escorts" name="touring_escorts"
                                                value="<?php echo e(isset($touring_escorts) ? $touring_escorts : false); ?>" />
                                        </li> 

                                        
                                        <li class="custom-toggle">
                                            <button type="button" class="custom-toggle-btn btn btn-danger mb-3 w-100" data-toggle="button" aria-pressed="false"
                                                id="with_reviews_btn" onclick="customToggle('with_reviews', 'with_reviews_btn');">
                                                Reviews
                                            </button>
                                            <input type="hidden" id="with_reviews" name="with_reviews"
                                                value="<?php echo e(isset($with_reviews) ? $with_reviews : false); ?>" />
                                        </li> 

                                        
                                        <li class="custom-toggle">
                                            <button type="button" class="custom-toggle-btn btn btn-danger mb-3 w-100" data-toggle="button" aria-pressed="false" 
                                                id="couples_service_btn" onclick="customToggle('couples_service', 'couples_service_btn');">
                                                Couples Service
                                            </button>
                                            <input type="hidden" id="couples_service" name="couples_service" 
                                                value="<?php echo e(isset($couples_service) ? $couples_service : false); ?>" />
                                        </li> 

                                        
                                        <li class="custom-toggle">
                                            <button type="button" class="custom-toggle-btn btn btn-danger mb-3 w-100" data-toggle="button" aria-pressed="false" 
                                                id="available_now_btn" onclick="customToggle('available_now', 'available_now_btn');">
                                                Available Now
                                            </button>
                                            <input type="hidden" id="available_now" name="available_now" 
                                                value="<?php echo e(isset($available_now) ? $available_now : false); ?>" />
                                        </li> 
                                        
                                        
                                        <li>
                                            <div class="form-group">
                                                <button type="submit" class="btn custom-red-small btn-block">Search</button>
                                            </div>
                                        </li> 

                                    </ul>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
         









            <section class="home-escorts">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center escort-row">

                        
                        <?php
                            $users = new \App\User;
                            $results = $users->newQuery();

                            $results->where('roleStatus', 2);
                            $results->where('country', $country_id);
                            $results->where('city', $city_id);
                            $results->where('gender', $gender);
                            if ($touring_escorts == 'true') $results->where('escortTouring', 1); // Touring Escort
                            if ($available_now == 'true') $results->where('activation', 1); // Available Now
                            if ($service_type) $results->where('pet', $service_type); // Service Type
                            if ($keyword) { // Keyword Search
                                $results->where(function ($query) use ($keyword) {
                                    $query->where('name', 'LIKE', '%' . $keyword . '%') // Name
                                        ->orWhere('email_me', 'LIKE', '%' . $keyword . '%') // Email Me
                                        ->orWhere('website', 'LIKE', '%' . $keyword . '%') // Website
                                        ->orWhere('price', 'LIKE', '%' . $keyword . '%') // Price
                                        ->orWhere('phone', 'LIKE', '%' . $keyword . '%') // Phone
                                        ->orWhere('email', 'LIKE', '%' . $keyword . '%'); // Email
                                });
                            }
                            if ($with_reviews == 'true') { // With Reviews
                                $reviews = \App\ProfileBlog::whereIn('escortId', $results->pluck('id'))
                                    ->distinct()->pluck('escortId');
                                $results->whereIn('id', $reviews);
                            }   
                            if ($couples_service == 'true') { // Couples Service
                                $service = \App\ServiceOfferAssign::whereIn('escortId', $results->pluck('id'))
                                    ->where('service', 'Couples')->pluck('escortId');
                                $results->whereIn('id', $service);
                            }

                            $escorts = $results->get();
                        ?>
                        


                        <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-6">
                             <a href="<?php echo e(url('profile-guest/'.$escort->id)); ?>">
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

            </section>
           
          


        </div>





       
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/pages/filterSearchEscort.blade.php ENDPATH**/ ?>