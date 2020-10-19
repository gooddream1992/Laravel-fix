<?php $__env->startSection('title', __('Index')); ?>
<?php $__env->startSection('main'); ?>

<section class="home-slider">
            <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <?php $slider=\App\Slider::orderBy('id','desc')->first(); 
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
        <!-- Content -->
        <div id="content">
            <section class="search-city-bar">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center">
                        <div class="col-lg-6 col-md-9">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Your city here" aria-label="Search Your city here" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-dark font-uppercase " type="button">Search Now</button>
                                        <button class="btn btn-dark font-uppercase " type="button">Advance Search</button>
                                    </div>
                                </div>
                            </form>
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
                                        <span class="location"><?php echo e($escort->city); ?></span>
                                    </div>
                                </div>
                                <div class="overlay-bottom">
                                    <div class="text">
                                        <h3>Melb 5<sup>th</sup> - 9<sup>th</sup> June</h3>
                                        <table class="escort-profile-details">
                                            <tr>
                                                <td>Suburb</td>
                                                <td><?php echo e($escort->suburb); ?></td>
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
            <section class="home-nofake-profile" style="background-image: url('<?php echo e(asset('public/uploads/'.$slider1)); ?>'); background-size:cover;background-position: center;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="<?php echo e(asset('public/uploads/'.$slider1)); ?>" class="verified-symbol">
                            <div class="escort-verification-content">
                                <h4>A sensual Directory <br>for the</h4>
                                <h2>Independent Escort</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industrys standard dummy text ever since the.</p>
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
            <section class="home-service-provider">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            <div class="box-title c-center">
                                <h2>Service provider resources</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem
                                    Ipsum has been the industrys standard dummy text ever since the</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                          <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="service-provider-box">
                                <?php if($escort->photo==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$escort->photo)); ?>" class="w-100"/><?php endif; ?>
                                
                                <h4><?php echo e($escort->name); ?></h4>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                </div>
            </section>
            <section class="home-platform ">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            <div class="box-title c-center dark">
                                <h2>A Platform Built for Professionals</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem
                                    Ipsum has been the industrys standard dummy text ever since the</p>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-lg-center justify-content-md-center justify-content-center ">

                          <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="#">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($escort->photo==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$escort->photo)); ?>" class="w-100"/><?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($escort->name); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                    </div>
                </div>
            </section>
            <section class="home-signup-search">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            <div class="box-title c-center logo-text">
                                <h3><img src="<?php echo e(asset('public/uploads/logo.png')); ?>" class="title-logo"></h3>
                                <!--<h3>honey<span class="text-red">luxe</span></h3>-->
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem
                                    Ipsum has been the industrys standard dummy text ever since the</p>
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
            <section class="home-about-honey">
                <div class="container">
                    <div class="row  justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            <div class="box-title c-center">
                                <h2>about honey Luxe</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem
                                    Ipsum has been the industrys standard dummy text ever since the</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-content">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC.</p> This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section 4 -->
            <section class="home-locations gray-bg">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            <div class="box-title c-center">
                                <h2>Locations</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem
                                    Ipsum has been the industrys standard dummy text ever since the</p>
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





       
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/welcome.blade.php ENDPATH**/ ?>