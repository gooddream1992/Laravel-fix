<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <meta name="description" content="">

        <meta name="author" content="">

        <link rel="icon" href="favicon.png" />



        <title>HONEYLUXE - HOME</title>



        <!-- Bootstrap core CSS -->

        <link href="<?php echo e(asset('assets/frontend/css/style.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" media="all" type="text/css" href="<?php echo e(asset('assets/frontend/fontawesome-free-5.0.7/css/fontawesome-all.css')); ?>">





    </head>



    <body>



        
 <?php echo $__env->make('frontend.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.includes.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        

        

        <!-- Header END -->

       














   


<?php $slider=\App\Slider::orderBy('id','desc')->where('category', 2)->first(); 
                        $slider1= $slider->slider; 
                        $slider2= $slider->slider1; 
                        $slider3= $slider->slider2;  ?>

   <?php $caroselescorts= \App\User::where('roleStatus', 2)->orderBy('id','desc')->limit(1)->get();?>


                       

        <!-- Content -->

        <div id="content">

             

          <section>

                <div id="listingCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="background-image: url('<?php echo e(asset('public/uploads/'.$slider1)); ?>');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                       
                        </div>
                        <div class="carousel-item" style="background-image: url('<?php echo e(asset('public/uploads/'.$slider2)); ?>');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                        
                        </div>
                        <div class="carousel-item" style="background-image: url('<?php echo e(asset('public/uploads/'.$slider3)); ?>');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                    
                        </div>
                    </div>
                   <?php $__currentLoopData = $caroselescorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="carousel-control-prev" href="#listingCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </a>
                    <a class="carousel-control-next" href="#listingCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <div class="container m-hidden">
                        <a href="<?php echo e(url('profile/'.$caro->id)); ?>" class="btn btn-view-profile">View Profile</a>
                    </div>
                    <div class="group-buttons profile-visiblity-btn">
                        <div class="btn-group-toggle ">
                            <label class="btn btn-secondary">
                              <a href="<?php echo e(url('profile/'.$caro->id)); ?>">  Info</a>
                            </label>
                        </div>
                        <a href="<?php echo e(url('profile/'.$caro->id)); ?>" class="btn btn-view-profile m-visible desk-hidden">View Profile</a>
                    </div>


                    <div class="profile-banner-detail">
                        <h3><?php echo e($caro->name); ?></h3>
                        <h5><?php $citycount=\App\City::all()->where('id', $caro->suburb);?>
                           <?php if($citycount->count()<1): ?> Not Found <?php else: ?> <?php echo e(\App\City::find($caro->suburb)->city); ?> <?php endif; ?></h5>
                        <table class="escort-profile-details">
                            <tr>
                                <td>Age</td>
                                <td><?php echo e($caro->age); ?> Years</td>
                            </tr>
                            <tr>
                                <td>Height</td>
                                <td><?php echo e($caro->height); ?> "</td>
                            </tr>
                            <tr>
                                <td>Eyes</td>
                                <td><?php if($caro->eyes==NULL): ?> None <?php else: ?> <?php echo e(\App\EscortDropdown::find($caro->eyes)->dropdownTitle); ?> <?php endif; ?></td>
                            </tr>
                            <tr>
                                <td>Dress Size</td>
                                <td><?php echo e($caro->dress); ?></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>$<?php echo e($caro->price); ?></td>
                            </tr>
                            <tr>
                                <td>Place of Service</td>
                                <td><?php echo e($caro->service); ?></td>
                            </tr>
                        </table>
                    </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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

                       <select class="form-control" name="country_id" onchange="selectcountry()" id="selectCountry">
                        <?php $countries=\App\Country::all();?>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>"><?php echo e($country->country); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                                </div>

                                            </li> 

                                            <li>

                                                <div class="form-group">

                                                    <select class="form-control" name="gender">

                                                        <option value="1">Male</option>

                                                        <option value="2">Female</option>

                                                    </select>

                                                </div>

                                            </li> 

                                            <li>

                                                <div class="form-group">

                                                    <select class="form-control">

                                                        <option>Escort</option>

                                                        <option>BDSM</option>

                                                        <option>Massage</option>

                                                        <option>Online Only</option>

                                                    </select>

                                                </div>

                                            </li> 

                                            <li>

                                                <div class="form-group">

                                                    <input type="text" class="form-control" placeholder="Touring Escorts" />

                                                </div>

                                            </li> 

                                            <li>

                                                <div class="form-group">

                                                    <input type="text" class="form-control" placeholder="Keyword" />

                                                </div>

                                            </li> 



                                            <li>

                                                <div class="form-group">

                                                    <select class="form-control" name="state_id" onchange="selectstate()" id="stateSelect">
                                          <?php $States=\App\State::all();?>
                        <?php $__currentLoopData = $States; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($state->id); ?>"><?php echo e($state->state); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                                </div>

                                            </li> 

                                            <li>

                                                <div class="form-group">

                                                  <select class="form-control" name="city_id" onchange="selectstate()" id="stateSelect">
                                          <?php $cities=\App\City::all();?>
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($city->id); ?>"><?php echo e($city->city); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                                </div>

                                            </li> 

                                            <li>

                                                <div class="form-group">

                                                    <input type="text" class="form-control" placeholder="Couples Service" />

                                                </div>

                                            </li>

                                            <li>

                                                <div class="form-group">

                                                    <input type="text" class="form-control" placeholder="View Available Now   " />

                                                </div>

                                            </li>



                                            <li>

                                                <div class="form-group">

                                                    <button type="submit" class="btn red-small btn-block">Filter</button>

                                                </div>

                                            </li> 

                                        </ul>

                                        <button type="button" class="btn red-small btn-advance-search" data-toggle="modal" data-target="#advanceSearch">ADvance search</button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </section>















 <!-- Section 3 -->

             <section class="home-escorts">
                <div class="container">
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

            </section>
            <?php $indpnts= \App\Independent::all();?>
            <?php $__currentLoopData = $indpnts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indpnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="home-nofake-profile" style="background-image: url('<?php echo e(asset('public/uploads/'.$indpnt->bgimage)); ?>'); background-size:cover;background-position: center;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="<?php echo e(asset('public/uploads/'.$indpnt->icon)); ?>" class="verified-symbol">
                            <div class="escort-verification-content">
                                <h4><?php echo e($indpnt->topHead); ?> <br>for the</h4>
                                <h2><?php echo e($indpnt->title); ?></h2>
                               <?php echo $indpnt->description; ?>

                                <h4>Join Us</h4>
                                <ul>
                                    <li><a href="#" class="btn black-btn">Client register</a></li>
                                    <li><a href="#" class="btn black-btn">escort register</a></li>
                                    <li><a href="#" class="btn black-btn">Find Out More</a></li>
                                </ul>
                                <p><a href="">Click here</a> to read why you should join with us</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            <section class="home-service-provider">
                <div class="container">
                     <?php $provresrcs= \App\ProviderResource::all();?>
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            <?php $__currentLoopData = $provresrcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resourc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="box-title c-center">
                                <h2><?php echo e($resourc->titleHead); ?></h2>
                                <?php echo e($resourc->intro); ?>

                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="row">
                         
              
                        <?php $__currentLoopData = $provresrcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resourc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <a href="<?php echo e(url('sex/trafficking')); ?>">
                            <div class="service-provider-box">
                                <?php if($resourc->icon1==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$resourc->icon1)); ?>" class="w-100"/><?php endif; ?>
                                
                                <h4><?php echo e($resourc->title1); ?></h4>
                            </div>
                        </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $provresrcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resourc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                             <a href="<?php echo e(url('local/resources')); ?>">
                            <div class="service-provider-box">
                                <?php if($resourc->icon2==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$resourc->icon2)); ?>" class="w-100"/><?php endif; ?>
                                
                                <h4><?php echo e($resourc->title2); ?></h4>
                            </div>
                             </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                       

                          <?php $__currentLoopData = $provresrcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resourc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                             <a href="<?php echo e(url('purchase/marketing')); ?>">
                            <div class="service-provider-box">
                                <?php if($resourc->icon3==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$resourc->icon3)); ?>" class="w-100"/><?php endif; ?>
                                
                                <h4><?php echo e($resourc->title3); ?></h4>
                            </div>
                             </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                           <?php $__currentLoopData = $provresrcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resourc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                             <a href="<?php echo e(url('bacome/escort')); ?>">
                            <div class="service-provider-box">
                                <?php if($resourc->icon4==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$resourc->icon4)); ?>" class="w-100"/><?php endif; ?>
                                
                                <h4><?php echo e($resourc->title4); ?></h4>
                            </div>
                             </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                </div>
            </section>







 <?php $professionals= \App\Professional::all();?>

             
                          <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="home-platform " style="background-image: url('<?php echo e(asset('public/uploads/'.$professonal->bgTop)); ?>'); background-size:cover;background-position: center;">
              
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                           
                          <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="box-title c-center dark">
                                <h2><?php echo e($professonal->titleHead); ?></h2>
                                <p><?php echo e($professonal->intro); ?></p>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div class="row justify-content-lg-center justify-content-md-center justify-content-center ">

                       <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="<?php echo e(url('multi/page')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon1==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon1)); ?>" class="w-100"/><?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($professonal->title1); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                         <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="<?php echo e(url('blog')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon2==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon2)); ?>" class="w-100"/><?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($professonal->title2); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                         <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="<?php echo e(url('multi/page')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon3==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon3)); ?>" class="w-100"/><?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($professonal->title3); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                         <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="<?php echo e(url('multi/page')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon4==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon4)); ?>" class="w-100"/><?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($professonal->title4); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                         <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="<?php echo e(url('explore/cities')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon5==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon5)); ?>" class="w-100"/><?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($professonal->title5); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                         <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="<?php echo e(url('multi/page')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon6==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon6)); ?>" class="w-100"/><?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($professonal->title6); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                         <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="<?php echo e(url('business/etiquete')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon7==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon7)); ?>" class="w-100"/><?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($professonal->title7); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                         <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="<?php echo e(url('terms/condition')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon8==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon8)); ?>" class="w-100"/><?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($professonal->title8); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                         <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="<?php echo e(url('our/story')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon9==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon9)); ?>" class="w-100"/><?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($professonal->title9); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                       
                    </div>
                </div>
            </section>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="home-signup-search" style="background-image: url('<?php echo e(asset('public/uploads/'.$professonal->bgBottom)); ?>'); background-size:cover;background-position: center;">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            <div class="box-title c-center logo-text">
 <?php $hedfoots=\App\HeaderFooter::orderBy('id','desc')->first(); 
 $footerinfo= $hedfoots->footerInfo;
  $footerlogo= $hedfoots->footerLogo;?>

                                <h3><img src="<?php echo e(asset('public/uploads/'.$footerlogo)); ?>" class="title-logo"></h3>
                                <!--<h3>honey<span class="text-red">luxe</span></h3>-->
                                <p><?php echo e($footerinfo); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-7">
                            <div class="red-box">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 c-center">
                                        <div class="red-box-inner">
                                            <img src="<?php echo e(asset('public/uploads/signup-icon.png')); ?>" />
                                            <button class="btn black-btn">Escort sign up</button>
                                            <button class="btn black-btn">Client sign up </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 c-center">
                                        <div class="red-box-inner">
                                            <img src="<?php echo e(asset('public/uploads/search-xlarge-icon.png')); ?>" />
                                            <button class="btn black-btn height-btn"  data-toggle="modal" data-target="#citySearch">City Full<br>Search</button>
                                            <!--<button class="btn black-btn">Full Search</button>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <section class="home-about-honey">
                <div class="container">
                    <div class="row  justify-content-lg-center justify-content-md-center ">
                         <?php $abouts= \App\About::all();?>
            <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-8">
                            <div class="box-title c-center">
                                <h2><?php echo e($abt->titleHead); ?></h2>
                                <p><?php echo e($abt->intro); ?></p>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="text-content">
                               <?php echo $abt->description; ?>

                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section 4 -->
            <section class="home-locations gray-bg">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                              <?php $hedfoots=\App\HeaderFooter::orderBy('id','desc')->first(); 
                                 $footerinfo= $hedfoots->footerInfo; ?>

                            <div class="box-title c-center">
                                <h2>Locations</h2>
                                <p><?php echo e($footerinfo); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-lg-center justify-content-md-center justify-content-center">
                   <?php $country=\App\Country::all();?>
                        <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cntry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="location-box">
                                <?php if($cntry->image==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$cntry->image)); ?>" class="w-100"/><?php endif; ?>
                                <a href="#" class="city-btn"><?php echo e($cntry->country); ?></a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        <div class="col-lg-12 view-more-area c-center ">
                            <button class="btn black-btn"  data-toggle="modal" data-target="#citySearch">view more cities</button> 
                        </div>
                    </div>
                </div>
            </section>


        </div>







        <!-- Modal -->

        <div class="modal fade" id="social-media-popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered modal-md" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title" id="exampleModalLongTitle">&nbsp;</h4>

                        <button type="button" class="btn" data-dismiss="modal">&times;</button>

                    </div>

                    <div class="modal-body">

                        <div class="social-modal-content c-center">

                            <div class="logo c-center"><img src="images/logo.png" /></div>

                            <h3>Don't get caught with your pants down.</h3>

                            <h6>Sign up for 10% off your first order</h6>

                            <ul>

                                <li><a href="#"><img src="images/social-medial-facebook.png"></a></li>

                                <li><a href="#"><img src="images/social-medial-insta.png"></a></li>

                                <li><a href="#"><img src="images/social-medial-youtube.png"></a></li>

                                <li><a href="#"><img src="images/social-medial-twitter.png"></a></li>

                            </ul>

                            <button class="btn red-small ">Click to Follow us </button> 

                        </div> 

                    </div>

                </div>

            </div>

        </div>

        <!-- Modal -->

        <div class="modal fade" id="contact-blog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered modal-md" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title" id="exampleModalLongTitle">Blog For Us</h4>

                        <button type="button" class="btn" data-dismiss="modal">&times;</button>

                    </div>

                    <div class="modal-body c-center">

                        <h3>Contact Us</h3>

                        <h6>Please tell us your experience and why you would be good to blog for Skissr</h6>

                        <form>

                            <div class="form-group">

                                <input type="text" class="form-control" placeholder="Your Name " />

                            </div>

                            <div class="form-group">

                                <input type="email" class="form-control" placeholder="Your Email Id " />

                            </div>

                            <div class="form-group">

                                <textarea class="form-control" placeholder="Your Message"></textarea>

                            </div>

                            <div class="form-group">

                                <button class="btn red-small " type="submit">Submit </button> 

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        <!-- Modal -->



        <!--Full screen search form start--> 

        <div id="search">

            <button type="button" class="close">×</button>

            <form>

                <input type="search" value="" placeholder="Enter to search here..." />

                <button type="submit" class="btn red-small">Search</button>

            </form>

        </div>

        <!--Full screen search form End-->



        <!--Advance search modal start-->



        <div class="modal fade" id="advanceSearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog  modal-lg" role="document">

                <div class="modal-content ">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Advance Search</h5>

                        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->

                        <button type="button" class="btn" data-dismiss="modal">&times;</button>

                    </div>

                    <div class="modal-body">

                             <form method="POST" action="<?php echo e(url('advance/search/escort')); ?>">
                                  <?php echo csrf_field(); ?>


                            <div class="container">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="advance-search-sec-form">

                                            <div class="form-box">

                                                <ul class="fields">

                                                    <li>

                                                        <div class="form-group">

                                                         <select class="form-control" name="country_id" onchange="selectcountry()" id="selectCountry">
                        <?php $countries=\App\Country::all();?>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>"><?php echo e($country->country); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                                        </div>

                                                    </li> 

                                                    <li>

                                                        <div class="form-group">

                                                            <select class="form-control" name="gender">

                                                                <option value="1">Male</option>

                                                                <option value="2">Female</option>

                                                            </select>

                                                        </div>

                                                    </li>

                                                    <li>

                                                        <div class="form-group">

                                                            <input type="text" class="form-control" placeholder="Height">

                                                        </div>

                                                    </li>

                                                    <li>

                                                        <div class="form-group">

                                                            <input type="text" class="form-control" placeholder="Dress Size">

                                                        </div>

                                                    </li>



                                                    <li>

                                                        <div class="form-group">

                                                            <select class="form-control" name="age">

                                                                <option>Age</option>

                                                                <option value="18">18</option>

                                                                <option value="20">20</option>

                                                                <option value="22">22</option>

                                                                <option value="24">24</option>

                                                                <option value="26">26</option>

                                                            </select>

                                                        </div>

                                                    </li> 

                                                    <li>

                                                        <div class="form-group">

                          <select class="form-control" name="nationality">
                        <?php $nationalities=\App\EscortDropdown::all()->where('status', 4);?>
                        <?php $__currentLoopData = $nationalities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($nation->id); ?>"><?php echo e($nation->dropdownTitle); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>


                                                        </div>

                                                    </li> 

                                                    <li>

                                                        <div class="form-group">
 <select class="form-control" name="state_id" onchange="selectstate()" id="stateSelect">
                                          <?php $States=\App\State::all();?>
                        <?php $__currentLoopData = $States; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($state->id); ?>"><?php echo e($state->state); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                                        </div>

                                                    </li> 

                                                    <li>

                                                        <div class="form-group">

                                                            <select class="form-control" name="sextuality">
                        <?php $sextualities=\App\EscortDropdown::all()->where('status', 3);?>
                        <?php $__currentLoopData = $sextualities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sex): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($sex->id); ?>"><?php echo e($sex->dropdownTitle); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                                        </div>

                                                    </li> 

                                                    <li>

                                                        <div class="form-group">

                                                           <select class="form-control" name="bodyShape">
                        <?php $bodyshpaes=\App\EscortDropdown::all()->where('status', 2);?>
                        <?php $__currentLoopData = $bodyshpaes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shape): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($shape->id); ?>"><?php echo e($shape->dropdownTitle); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                                        </div>

                                                    </li> 

                                                    <li>

                                                        <div class="form-group">

                                                            <select class="form-control" name="hair">
                        <?php $hairs=\App\EscortDropdown::all()->where('status', 5);?>
                        <?php $__currentLoopData = $hairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($hair->id); ?>"><?php echo e($hair->dropdownTitle); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                                        </div>

                                                    </li> 

                                                    <li>

                                                        <div class="form-group">

                                                           <select class="form-control" name="eye">
                        <?php $eyes=\App\EscortDropdown::all()->where('status', 1);?>
                        <?php $__currentLoopData = $eyes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eye): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($eye->id); ?>"><?php echo e($eye->dropdownTitle); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                                        </div>

                                                    </li> 

                                                    <li>

                                                        <div class="form-group">

                                                            <input type="text" class="form-control" placeholder="Price">

                                                        </div>

                                                    </li>

                                                </ul>

                                            </div>



                                        </div>

                                    </div>

                                </div>

                                <div class="row justify-content-lg-center">

                                    <div class="col-lg-9 c-center">

                                        <div class="search-availability-bar">

                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Touring Escorts</button>

                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >View Available Now</button>

                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >View Available Today    </button>

                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >In Call</button>

                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Out Call</button>

                                        </div>

                                    </div>

                                    <div class="col-lg-9 c-center mt-3">

                                        <h4>Services Offered </h4>

                                        <ul class="advance-search-check-list">
                                            <?php $services=\App\ServiceOffer::all();?>
                                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <li><div class="custom-control custom-checkbox"><input type="checkbox" value="<?php echo e($service->id); ?>" class="custom-control-input" id="customCheck1<?php echo e($service->id); ?>" name="example1"><label class="custom-control-label" for="customCheck1<?php echo e($service->id); ?>"><?php echo e($service->service); ?></label></div></li>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            

                                        </ul>

                                    </div>

                                    <div class="col-lg-6 c-center">

                                        <div class="search-availability-bar equal-btns">

                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Agency</button>

                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Independent</button>

                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Establishment</button>

                                        </div>

                                    </div>

                                </div>

                                <div class="row justify-content-lg-center">

                                    <div class="col-lg-5 c-center mt-3 mb-3">

                                        <div class="clearfix">

                                            <div class="form-group price-detail left">

                                                <input type="text" class="form-control" placeholder="From" />

                                                <input type="text" class="form-control" placeholder="To" />

                                            </div>

                                            <div class="right ">

                                                <button class="red-small">Filter</button>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        <!--Advance search modal End-->



        <!--City Search Modal start-->

        <!-- Modal -->

        <div class="modal fade" id="citySearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title" id="exampleModalLongTitle">Search By City</h4>

                        <button type="button" class="btn" data-dismiss="modal">&times;</button>

                    </div>

                    <div class="modal-body">

                        <form>

                            <div class="form-group">

                                <select class="form-control">

                                    <option>Country</option> 

                                    <option>Canada</option> 

                                    <option>Australia</option> 

                                    <option>UK</option> 

                                </select>

                            </div>

                            <div class="form-group">

                                <select class="form-control">

                                    <option>City</option> 

                                    <option>City name 1</option> 

                                    <option>City name 2</option> 

                                    <option>City name 3</option> 

                                </select>

                            </div>

                            <div class="form-group">

                                <button class="red-small btn-block">Search</button>

                            </div>



                        </form>

                    </div>

                </div>

            </div>

        </div>

        <!--City Search Modal End-->





 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>



<script>

            $(document).ready(function () {

                $('a[href="#search"]').on("click", function (event) {

                    event.preventDefault();

                    $("#search").addClass("open");

                    $('#search > form > input[type="search"]').focus();

                });



                $("#search, #search .close").on("click keyup", function (event) {

                    if (

                            event.target == this ||

                            event.target.className == "close" ||

                            event.keyCode == 27

                            ) {

                        $(this).removeClass("open");

                    }

                });



                $("form").submit(function (event) {
                     /*
                     alert(1);
                    event.preventDefault();

                    return false;
                       */
                });





                $('#advanceSearch').on('shown.bs.modal', function () {

                    $('#myInput').trigger('focus')

                })



            });



        </script>









        


       

        <!-- Content END -->

        <!--<a href="#" class="advace-search-btn ">Advance Search</a>-->

        <!-- Footer -->
      <?php echo $__env->make('frontend.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Footer END -->

     
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script>window.jQuery || document.write('<script src="<?php echo e(asset('assets/frontend/js/jquery.min.js')); ?>"><\/script>')</script>
        <script src="<?php echo e(asset('assets/frontend/js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/frontend/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/frontend/js/index.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/frontend/js/menu3.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/frontend/js/wow.min.js')); ?>"></script>
        <script src="js/wow.min.js"></script>
        <script>
                        new WOW().init();

        </script>
       


<!--City Search Modal start-->

        <!-- Modal -->

        <div class="modal fade" id="social-media-popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered modal-md" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title" id="exampleModalLongTitle">&nbsp;</h4>

                        <button type="button" class="btn" data-dismiss="modal">&times;</button>

                    </div>

                    <div class="modal-body">

                        <div class="social-modal-content c-center">

                            <div class="logo c-center"><img src="images/logo.png" /></div>

                            <h3>Check out our social channels for all the latest updates</h3>

                            <h6>Our Platforms are here to support you</h6>

                            <ul class="">

                                <li><a href="#"><img src="images/social-medial-facebook.png"></a></li>

                                <li><a href="#"><img src="images/social-medial-insta.png"></a></li>

                                <li><a href="#"><img src="images/social-medial-youtube.png"></a></li>

                                <li><a href="#"><img src="images/social-medial-twitter.png"></a></li>

                            </ul>

                            <button class="btn red-small ">Click to Follow us </button> 

                        </div> 

                    </div>

                </div>

            </div>

        </div>

        <!-- Modal -->

        <div class="modal fade" id="contact-blog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered modal-md" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title" id="exampleModalLongTitle">Blog For Us</h4>

                        <button type="button" class="btn" data-dismiss="modal">&times;</button>

                    </div>

                    <div class="modal-body c-center">

                        <h3>Contact Us</h3>

                        <h6>Please tell us your experience and why you would be good to blog for Skissr</h6>

                        <form>

                            <div class="form-group">

                                <input type="text" class="form-control" placeholder="Your Name " />

                            </div>

                            <div class="form-group">

                                <input type="email" class="form-control" placeholder="Your Email Id " />

                            </div>

                            <div class="form-group">

                                <textarea class="form-control" placeholder="Your Message"></textarea>

                            </div>

                            <div class="form-group">

                                <button class="btn red-small " type="submit">Submit </button> 

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        <!-- Modal -->

        <div class="modal fade" id="citySearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title" id="exampleModalLongTitle">Search By City</h4>

                        <button type="button" class="btn" data-dismiss="modal">&times;</button>

                    </div>

                    <div class="modal-body">

                        <form>

                            <div class="form-group">

                                <select class="form-control">

                                    <option>Country</option> 

                                    <option>Canada</option> 

                                    <option>Australia</option> 

                                    <option>UK</option> 

                                </select>

                            </div>

                            <div class="form-group">

                                <select class="form-control">

                                    <option>City</option> 

                                    <option>City name 1</option> 

                                    <option>City name 2</option> 

                                    <option>City name 3</option> 

                                </select>

                            </div>

                            <div class="form-group">

                                <button class="red-small btn-block">Search</button>

                            </div>



                        </form>

                    </div>

                </div>

            </div>

        </div>

        <!--City Search Modal End-->











        

 <script>

            $(document).ready(function () {

                $('a[href="#search"]').on("click", function (event) {

                    event.preventDefault();

                    $("#search").addClass("open");

                    $('#search > form > input[type="search"]').focus();

                });



                $("#search, #search .close").on("click keyup", function (event) {

                    if (

                            event.target == this ||

                            event.target.className == "close" ||

                            event.keyCode == 27

                            ) {

                        $(this).removeClass("open");

                    }

                });



                $("form").submit(function (event) {
                     
                     /*
                    event.preventDefault();

                    return false;
                       */
                });



            });



            $(".dropdown-menu li a").click(function () {

                $(this).parents(".dropdown").find('.btn').html($(this).text() + '');

                $(this).parents(".dropdown").find('.btn').val($(this).data('value'));

            });

        </script>



        <script type="text/javascript">

            $(document).ready(function () {

                $('a#hamburger-navigation').click(function () {

                    $('.menu4').toggleClass("showmenu1");

                    $('.menu4').toggleClass("showmenu", 500);

                });

            });

        </script>

        <script type="text/javascript">

            jQuery(document).ready(function () {

                $('.menu4 li').click(function () {

                    //show its submenu

                    $('ul', this).slideDown(300);

                }, function () {

                    //hide its submenu

                    $('ul', this).slideUp(300);

                });



            });

        </script>

    </body>

</html><?php /**PATH E:\xampp\htdocs\honeyluxe-front\resources\views/frontend/pages/exploreCities.blade.php ENDPATH**/ ?>