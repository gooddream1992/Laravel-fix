<?php $__env->startSection('title', __('Profile')); ?>
<?php $__env->startSection('main'); ?>

<?php $escorts= \App\User::all()->where('id', $id);?>

<?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<section class="profile-slider">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div id="profileCarousel" class="carousel slide carousel-fade" data-ride="carousel">

<?php $pfsliders= \App\ProfileImage::all()->where('escortId', $id)->where('status', 1); 
$pfsliders1= \App\ProfileImage::orderBy('id', 'desc')->where('escortId', $id)->where('status', 1)->first(); 
if($pfsliders->count()<1){
$slider1=0;
}else{
	$slider1=$pfsliders1->image;
}


?>
                            <div class="carousel-inner">
                            	
                               <?php if($pfsliders->count()<1): ?>

                                <div class="carousel-item active">
                                  <h1> Have not Uploaded any Slider</h1>
                                </div>
                               <?php else: ?>
                                <div class="carousel-item active">
                                    <img class="first-slide" src="<?php echo e(asset('public/uploads/'.$slider1)); ?>" alt="First slide">
                                </div>
                                
                                <?php $__currentLoopData = $pfsliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-item">
                                    <img class="second-slide" src="<?php echo e(asset('public/uploads/'.$slider->image)); ?>" alt="Second slide">
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $pfsliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-item">
                                    <img class="third-slide" src="<?php echo e(asset('public/uploads/'.$slider->image)); ?>" alt="Third slide">
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               <?php endif; ?>
                            </div>
                            <a class="carousel-control-prev" href="#profileCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#profileCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 my-profile-overview">
                        <div class="my-profile-content">
                            <h2><?php echo e($escort->name); ?></h2>
                            <h5><?php echo e(\App\State::find($escort->city)->state); ?></h5>
                            <!--<label class="profession-label">Professional Escort</label>-->
                            <div class="clearfix">
                                <div class="left">
                                    <div class="photos-verified">
                                        <h4>Photo verified</h4>
                                        <p>The Trusted Site</p>
                                    </div>
                                </div>
                            </div>
                            <?php if($escort->activation==1): ?>
                               <label class="availability-label">Available Right Now</label>
                                <?php else: ?>
                                <?php endif; ?>
                            <a href="<?php echo e($escort->phone); ?>" class="profile-call m-hidden"><img src="<?php echo e(asset('public/images/prodile-mobile-icon.png')); ?>" /> Call Me: <?php echo e($escort->phone); ?></a>
                            <ul class="mob-contact-btns desk-hidden m-visible">
                                <li>
                                    <a href="tel:123 456 7890" ><i class="fas fa-phone-volume"></i> Call</a>
                                </li>
                                <li>
                                    <a href="#" ><i class="fas fa-comments"></i> SMS</a>
                                </li>
                            </ul>

                            <div class="social-media-connect">
                                <h4>On Social:</h4>
                                <ul>
                                    <li class="whatsapp-box">
                                        <a href="<?php echo e($escort->whatsup); ?>">
                                            <i class="fab fa-whatsapp"></i>
                                            Whatsapp
                                        </a>
                                    </li>
                                    <li class="snapchat-box">
                                        <a href="<?php echo e($escort->snapchat); ?>">
                                            <i class="fab fa-snapchat-square"></i>
                                            Snapchat
                                        </a>
                                    </li>
                                    <li class="insta-box">
                                        <a href="<?php echo e($escort->instagram); ?>">
                                            <i class="fab fa-instagram"></i>
                                            instagram
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="profile-actions">
                                <ul>
                                    <li><a href="<?php echo e($escort->follow_me); ?>"><span class="follow-sprint"></span> Follow Me</a></li>
                                    <li><a href="<?php echo e($escort->email_me); ?>"><span class="email-sprint"></span> Email Me</a></li>
                                </ul> 

                            </div>
                            <a href="<?php echo e($escort->website); ?>" class="personal-site">Website Link</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Content -->
        <div id="content">
            <div class="m-hidden">
                <section class="photo-gallery-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>Gallery</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul>


<?php $galleries= \App\ProfileImage::all()->where('escortId', $id)->where('status', 2); ?>
                                    <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><img src="<?php echo e(asset('public/uploads/'.$gallery->image)); ?>" class="w-100"></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="video-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>video</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="video-gallary">
                                	<?php $videos= \App\ProfileImage::all()->where('escortId', $id)->where('status', 3); ?>
                                    <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <div class="video-box">
                                            <img src="<?php echo e(asset('public/uploads/'.$video->image)); ?>" class="w-100"/>
                                            <a href="" class="play-btn"><img src="<?php echo e(asset('public/images/video-play-icon.png')); ?>" /></a>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="selfie-gallery-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>selfie gallery</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="selfie-gallery-images">

                                	<?php $galleries= \App\ProfileImage::all()->where('escortId', $id)->where('status', 2); ?>
                                    <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><img src="<?php echo e(asset('public/uploads/'.$gallery->image)); ?>" class="w-100"></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="profile-overview-table-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="overview-table">
                                    <h3>Personal Details</h3>
                                    <table>
                                        <tr>
                                            <td>
                                                <p>Suburb</p>
                                                <h4><?php echo e(\App\City::find($escort->suburb)->city); ?></h4>
                                            </td>
                                            <td>
                                                <p>Male/female/trans</p>
                                                <h4><?php if($escort->gender==1): ?> Male <?php else: ?> Female <?php endif; ?></h4>
                                            </td>
                                            <td>
                                                <p>Straight/bi/gay</p>
                                                <h4><?php echo e($escort->straight); ?></h4>
                                            </td>
                                            <td>
                                                <p>Height</p>
                                                <h4><?php echo e($escort->height); ?></h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Age</p>
                                                <h4><?php echo e($escort->age); ?></h4>
                                            </td>
                                            <td>
                                                <p>Hair</p>
                                                <h4><?php echo e($escort->hair); ?></h4>
                                            </td>
                                            <td>
                                                <p>Eyes</p>
                                                <h4><?php echo e($escort->eyes); ?></h4>
                                            </td>
                                            <td>
                                                <p>Dress</p>
                                                <h4><?php echo e($escort->dress); ?></h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Bust</p>
                                                <h4><?php echo e($escort->bust); ?></h4>
                                            </td>
                                            <td>
                                                <p>Body shape</p>
                                                <h4><?php echo e($escort->bodyShape); ?></h4>
                                            </td>
                                            <td>
                                                <p>Nationality</p>
                                                <h4><?php echo e($escort->country); ?></h4>
                                            </td>
                                            <td>
                                                <p>Personality Type</p>
                                                <h4><?php echo e($escort->personal_type); ?></h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Pet Hate</p>
                                                <h4><?php echo e($escort->pet); ?></h4>
                                            </td>
                                            <td>
                                                <p>Favourite Drink</p>
                                                <h4><?php echo e($escort->drink); ?></h4>
                                            </td>
                                            <td>
                                                <p>Favourite Food</p>
                                                <h4><?php echo e($escort->food); ?></h4>
                                            </td>
                                            <td>
                                                <p>Service Provider </p>
                                                <h4><?php echo e($escort->service); ?></h4>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="profile-about">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>About me</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="profile-about-contebnt">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                                    <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="service-offer-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>Service I offer</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul>
                                    <li>Couples</li>
                                    <li>Roleplay</li>
                                    <li>Online Services</li>
                                    <li>Bisexual</li>
                                    <li>Overnights</li>
                                    <li>Dinner Dates</li>
                                    <li>Fly Me to you</li>
                                    <li>Couples</li>
                                    <li>Roleplay</li>
                                    <li>Online Services</li>
                                    <li>Bisexual</li>
                                    <li>Overnights</li>
                                    <li>Dinner Dates</li>
                                    <li>Fly Me to you</li>
                                </ul>
                            </div>
                            <div class="col-lg-12">
                                <div class="profile-about-contebnt">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="rates-n-availablity-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>Rates</h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <table class="rates-table mb-4">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">In Call</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>12 Hours</td>
                                                    <td>$3500</td>
                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                </tr>
                                                <tr>
                                                    <td>4 Hours</td>
                                                    <td>$1500</td>
                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                </tr>
                                                <tr>
                                                    <td>3 Hours</td>
                                                    <td>$1000</td>
                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                </tr>
                                                <tr>
                                                    <td>2 Hours</td>
                                                    <td>$700</td>
                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                </tr>
                                                <tr>
                                                    <td>1 Hours</td>
                                                    <td>$500</td>
                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="rate-content">
                                            <div id="accordion">
                                                <div class="card">
                                                    <div class="card-header" id="headingOne">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                Important Contact Info <i class="fas fa-chevron-down right"></i>
                                                            </button>
                                                        </h5>
                                                    </div>

                                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>-->
                                                            <ul>
                                                                <li>Lorem Ipsum is simply dummy text of the printing and </li> 
                                                                <li>Typesetting industry. Lorem Ipsum has been the industries  </li> 
                                                                <li>Standard dummy text ever since the  </li> 
                                                                <li>when an unknown printer took a galley of type and  </li> 
                                                                <li>Scrambled it to make a type specimen book It has survived </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <table class="rates-table mb-4">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Out Call</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>12 Hours</td>
                                                    <td>$4000</td>
                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                </tr>
                                                <tr>
                                                    <td>4 Hours</td>
                                                    <td>$2000</td>
                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                </tr>
                                                <tr>
                                                    <td>3 Hours</td>
                                                    <td>$1200</td>
                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                </tr>
                                                <tr>
                                                    <td>2 Hours</td>
                                                    <td>$900</td>
                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                </tr>
                                                <tr>
                                                    <td>1 Hours</td>
                                                    <td>$800</td>
                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="rate-content">
                                            <div id="accordion">
                                                <div class="card">
                                                    <div class="card-header" id="headingTwo">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                Important Contact Info<i class="fas fa-chevron-down right"></i>
                                                            </button>
                                                        </h5>
                                                    </div>

                                                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>-->
                                                            <ul>
                                                                <li>Lorem Ipsum is simply dummy text of the printing and </li> 
                                                                <li>Typesetting industry. Lorem Ipsum has been the industries  </li> 
                                                                <li>Standard dummy text ever since the  </li> 
                                                                <li>when an unknown printer took a galley of type and  </li> 
                                                                <li>Scrambled it to make a type specimen book It has survived </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <div class="sec-title">
                                    <h3>availability</h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="table-responsive International tours mb-3">
                                            <table class="rates-table">
                                                <thead>
                                                    <tr>
                                                        <th>Weekday</th>
                                                        <th>From</th>
                                                        <th>Until</th>
                                                        <th class="c-center">24Hrs</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Monday</td>
                                                        <td>11:00 am</td>
                                                        <td>10:00 pm</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck11" name="example1">
                                                                <label class="custom-control-label" for="customCheck11">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tuesday</td>
                                                        <td>11:00 am</td>
                                                        <td>10:00 pm</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck12" name="example1">
                                                                <label class="custom-control-label" for="customCheck12">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Wednesday</td>
                                                        <td>11:00 am</td>
                                                        <td>10:00 pm</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck13" name="example1">
                                                                <label class="custom-control-label" for="customCheck13">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Friday</td>
                                                        <td>09:00 am</td>
                                                        <td>10:00 pm</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck14" name="example1">
                                                                <label class="custom-control-label" for="customCheck14">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Saturday</td>
                                                        <td>09:00 am</td>
                                                        <td>10:00 pm</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck15" name="example1">
                                                                <label class="custom-control-label" for="customCheck15">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="rate-content">
                                            <div class="rate-content">
                                                <div id="accordion">
                                                    <div class="card">
                                                        <div class="card-header" id="headingThree">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                                    Important Contact Info <i class="fas fa-chevron-down right"></i>
                                                                </button>
                                                            </h5>
                                                        </div>

                                                        <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>-->
                                                                <ul>
                                                                    <li>Lorem Ipsum is simply dummy text of the printing and </li> 
                                                                    <li>Typesetting industry. Lorem Ipsum has been the industries  </li> 
                                                                    <li>Standard dummy text ever since the  </li> 
                                                                    <li>when an unknown printer took a galley of type and  </li> 
                                                                    <li>Scrambled it to make a type specimen book It has survived </li>
                                                                </ul>
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
                    </div>
                </section>
                <!-- Section 3 -->
                <section class="profile-feeds">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>Feeds</h3>
                                    <a href="" class="read-all">view All feed »</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="feeds-outer simplebar" id="myElement">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="profile-feed-inner">
                                                <li class="media-feed">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="media-feed-area">
                                                                <img src="images/profile-feed-img.jpg" class="w-100" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="feed-content">
                                                                <div class="feed-author">
                                                                    <div class="author-img">
                                                                        <img src="images/feed-author.jpg" class="img-fluid" />
                                                                    </div>
                                                                    <div class="author-detail">
                                                                        <h5>Lizza Martin</h5>
                                                                        <p>25 Min ago</p>
                                                                    </div>
                                                                </div>
                                                                <div class="feed-text">
                                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting inustry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book It has survived not only five centuriebut also the leap into electronic typesetting remaved not only five centuries but also the leap into electronic typesetting remaining essentially slso unnged It was popularised.
                                                                        in the 1960s with the release of Lining essentially unchanged It was popularised.</p>
                                                                </div>
                                                                <div class="feed-action">
                                                                    <ul>
                                                                        <li>
                                                                            <div class="clearfix">
                                                                                <div class="left">
                                                                                    <a href="#" class="feed-content-action like-action">Like</a>
                                                                                </div>
                                                                                <div class="right">
                                                                                    <a href="#"  class="feed-content-action comment-action">Comment</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="clearfix">
                                                                                <div class="left">
                                                                                    <p>25 Likes</p>
                                                                                </div>
                                                                                <div class="right">
                                                                                    <p>8 Comment</p>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <div class="comment-feed-img">
                                                                                <img src="images/feed-comment.jpg" class="img-fluid" /> 
                                                                            </div>
                                                                            <div class="comment-box">
                                                                                <input type="text" class="form-control" placeholder="Write a Comment" />
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="media-feed">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="feed-content">
                                                                <div class="feed-author">
                                                                    <div class="author-img">
                                                                        <img src="images/feed-author-1.jpg" class="img-fluid" />
                                                                    </div>
                                                                    <div class="author-detail">
                                                                        <h5>Melika Seravate</h5>
                                                                        <p>25 Min ago</p>
                                                                    </div>
                                                                </div>
                                                                <div class="feed-text">
                                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dumnd typesetting industry Lorem Ipsum has been the industrmy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                                                                </div>
                                                                <div class="feed-action">
                                                                    <ul>
                                                                        <li>
                                                                            <div class="clearfix">
                                                                                <div class="left">
                                                                                    <a href="#" class="feed-content-action like-action">Like</a>
                                                                                </div>
                                                                                <div class="right">
                                                                                    <a href="#"  class="feed-content-action comment-action">Comment</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="clearfix">
                                                                                <div class="left">
                                                                                    <p>25 Likes</p>
                                                                                </div>
                                                                                <div class="right">
                                                                                    <p>8 Comment</p>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <div class="comment-feed-img">
                                                                                <img src="images/feed-comment.jpg" class="img-fluid" /> 
                                                                            </div>
                                                                            <div class="comment-box">
                                                                                <input type="text" class="form-control" placeholder="Write a Comment" />
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="media-feed">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="media-feed-area">
                                                                <img src="images/profile-feed-img.jpg" class="w-100" />
                                                                <a href="#" class="video-play"><img src="images/video-play-icon.png" class="img-fluid" /></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="feed-content">
                                                                <div class="feed-author">
                                                                    <div class="author-img">
                                                                        <img src="images/feed-author.jpg" class="img-fluid" />
                                                                    </div>
                                                                    <div class="author-detail">
                                                                        <h5>Lizza Martin</h5>
                                                                        <p>25 Min ago</p>
                                                                    </div>
                                                                </div>
                                                                <div class="feed-text">
                                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting inustry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book It has survived not only five centuriebut also the leap into electronic typesetting remaved not only five centuries but also the leap into electronic typesetting remaining essentially slso unnged It was popularised.
                                                                        in the 1960s with the release of Lining essentially unchanged It was popularised.</p>
                                                                </div>
                                                                <div class="feed-action">
                                                                    <ul>
                                                                        <li>
                                                                            <div class="clearfix">
                                                                                <div class="left">
                                                                                    <a href="#" class="feed-content-action like-action">Like</a>
                                                                                </div>
                                                                                <div class="right">
                                                                                    <a href="#"  class="feed-content-action comment-action">Comment</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="clearfix">
                                                                                <div class="left">
                                                                                    <p>25 Likes</p>
                                                                                </div>
                                                                                <div class="right">
                                                                                    <p>8 Comment</p>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <div class="comment-feed-img">
                                                                                <img src="images/feed-comment.jpg" class="img-fluid" /> 
                                                                            </div>
                                                                            <div class="comment-box">
                                                                                <input type="text" class="form-control" placeholder="Write a Comment" />
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="profile-tours-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="sec-title">
                                    <h3>Domestic tours</h3>
                                </div>
                                <div class="tour-tables table-responsive">
                                    <table class="">
                                        <thead>
                                            <tr>
                                                <th>City</th>
                                                <th>Date</th>
                                                <th class="c-center">Fully Booked</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Sydney</td>
                                                <td>7th - 8th June</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="example1">
                                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Melbourn</td>
                                                <td>11th - 15 th April</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck2" name="example1">
                                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Darin</td>
                                                <td>22th - 8th May</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck3" name="example1">
                                                        <label class="custom-control-label" for="customCheck3">&nbsp;</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Brisbane</td>
                                                <td>4th - 5th Dec</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck4" name="example1">
                                                        <label class="custom-control-label" for="customCheck4">&nbsp;</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Melbourne</td>
                                                <td>22th - 8th May</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck5" name="example1">
                                                        <label class="custom-control-label" for="customCheck5">&nbsp;</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to 
                                        make a type specimen book. It has survived not.</p>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="sec-title">
                                    <h3>International tours</h3>
                                </div>
                                <div class="tour-tables table-responsive">
                                    <table class="">
                                        <thead>
                                            <tr>
                                                <th>City</th>
                                                <th>Date</th>
                                                <th class="c-center">Fully Booked</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Sydney</td>
                                                <td>7th - 8th June</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck6" name="example1">
                                                        <label class="custom-control-label" for="customCheck6">&nbsp;</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Melbourn</td>
                                                <td>11th - 15 th April</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck7" name="example1">
                                                        <label class="custom-control-label" for="customCheck7">&nbsp;</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Darin</td>
                                                <td>22th - 8th May</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck8" name="example1">
                                                        <label class="custom-control-label" for="customCheck8">&nbsp;</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Brisbane</td>
                                                <td>4th - 5th Dec</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck9" name="example1">
                                                        <label class="custom-control-label" for="customCheck9">&nbsp;</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Melbourne</td>
                                                <td>22th - 8th May</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck10" name="example1">
                                                        <label class="custom-control-label" for="customCheck10">&nbsp;</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to 
                                        make a type specimen book. It has survived not.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="profile-blogs ">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>My Blogs</h3>
                                    <a href="" class="read-all">Read All Blogs »</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="my-blog-box">
                                    <div class="blog-img">
                                        <img src="images/my-blog-1.jpg" class="w-100" alt="blog-img"/>
                                    </div>
                                    <div class="blog-overview">
                                        <p class="post-date">10.05.2020</p>
                                        <h5>Lorem Ipsum is simply dummy text of printing and typesetting industry Lorem Ipsum has.</h5>
                                        <a href="#" class="read-fblog">read full blog »</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="my-blog-box">
                                    <div class="blog-img">
                                        <img src="images/my-blog-2.jpg" class="w-100" alt="blog-img"/>
                                    </div>
                                    <div class="blog-overview">
                                        <p class="post-date">10.05.2020</p>
                                        <h5>Lorem Ipsum is simply dummy text of printing and typesetting industry Lorem Ipsum has.</h5>
                                        <a href="#" class="read-fblog">read full blog »</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="my-blog-box">
                                    <div class="blog-img">
                                        <img src="images/my-blog-3.jpg" class="w-100" alt="blog-img"/>
                                    </div>
                                    <div class="blog-overview">
                                        <p class="post-date">10.05.2020</p>
                                        <h5>Lorem Ipsum is simply dummy text of printing and typesetting industry Lorem Ipsum has.</h5>
                                        <a href="#" class="read-fblog">read full blog »</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="my-blog-box">
                                    <div class="blog-img">
                                        <img src="images/my-blog-4.jpg" class="w-100" alt="blog-img"/>
                                    </div>
                                    <div class="blog-overview">
                                        <p class="post-date">10.05.2020</p>
                                        <h5>Lorem Ipsum is simply dummy text of printing and typesetting industry Lorem Ipsum has.</h5>
                                        <a href="#" class="read-fblog">read full blog »</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="interest-favthings ">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>Interests & Favourite Things  </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="fav-things-list">
                                    <li><p>Music</p></li> 
                                    <li><p>Love</p></li> 
                                    <li><p>Romance</p></li> 
                                    <li><p>Some text</p></li> 
                                    <li><p>Music</p></li> 
                                    <li><p>Love</p></li> 
                                    <li><p>Romance</p></li> 
                                    <li><p>Some text</p></li> 
                                    <li><p>Music</p></li> 
                                    <li><p>Love</p></li> 
                                    <li><p>Romance</p></li> 
                                    <li><p>Some text</p></li>
                                </ul> 

                                <div class="interest-favthings-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknowninter took a galley of type and scrambled it to make a type specimen book my text of the printing and typesetting industry Lorem Ipsum has been Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknowninter took a galley of type and scrambled it to make a type specimen book.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="wishlist">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>wish list</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="wishlist-items">
                                    <li><img src="images/wishlist-1.jpg" /></li>
                                    <li><img src="images/wishlist-2.jpg" /></li>
                                    <li><img src="images/wishlist-3.jpg" /></li>
                                    <li><img src="images/wishlist-4.jpg" /></li>
                                    <li><img src="images/wishlist-1.jpg" /></li>
                                    <li><img src="images/wishlist-2.jpg" /></li>
                                    <li><img src="images/wishlist-3.jpg" /></li>
                                    <li><img src="images/wishlist-4.jpg" /></li>
                                </ul> 
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="mob-profile-tab-section m-visible desk-hidden">

                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="profilephotos">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapsePhoto" aria-expanded="true" aria-controls="collapsePhoto">
                                    Photos <i class="fas fa-chevron-down right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapsePhoto" class="collapse show" aria-labelledby="profilephotos" data-parent="#accordion">
                            <div class="card-body">
                                <section class="photo-gallery-sec">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="sec-title">
                                                    <h3>Gallery</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul>
                                                    <li><img src="images/profile-gallery-1.jpg" class=""></li>
                                                    <li><img src="images/profile-gallery-2.jpg" class=""></li>
                                                    <li><img src="images/profile-gallery-3.jpg" class=""></li>
                                                    <li><img src="images/profile-gallery-4.jpg" class=""></li>
                                                    <li><img src="images/profile-gallery-5.jpg" class=""></li>
                                                    <li><img src="images/profile-gallery-6.jpg" class=""></li>
                                                    <li><img src="images/profile-gallery-7.jpg" class=""></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="video-sec">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="sec-title">
                                                    <h3>video</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="video-gallary">
                                                    <li>
                                                        <div class="video-box">
                                                            <img src="images/profile-video-1.jpg" class="w-100"/>
                                                            <a href="" class="play-btn"><img src="images/video-play-icon.png" /></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="video-box">
                                                            <img src="images/profile-video-2.jpg" class="w-100" />
                                                            <a href="" class="play-btn"><img src="images/video-play-icon.png" /></a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="selfie-gallery-sec">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="sec-title">
                                                    <h3>selfie gallery</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="selfie-gallery-images">
                                                    <li><img src="images/selfi-gallary-1.jpg" class="w-100" /></li>
                                                    <li><img src="images/selfi-gallary-2.jpg" class="w-100" /></li>
                                                    <li><img src="images/selfi-gallary-3.jpg" class="w-100" /></li>
                                                    <li><img src="images/selfi-gallary-4.jpg" class="w-100" /></li>
                                                    <li><img src="images/selfi-gallary-5.jpg" class="w-100" /></li>
                                                    <li><img src="images/selfi-gallary-6.jpg" class="w-100" /></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="profileBiography">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseBiography" aria-expanded="false" aria-controls="collapseBiography">
                                    Biography <i class="fas fa-chevron-down right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseBiography" class="collapse" aria-labelledby="profileBiography" data-parent="#accordion">
                            <div class="card-body">
                                <section class="profile-overview-table-sec">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="sec-title">
                                                    <h3>title here</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="overview-table">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <p>Suburb</p>
                                                                <h4>Melbourn</h4>
                                                            </td>
                                                            <td>
                                                                <p>Male/female/trans</p>
                                                                <h4>Female</h4>
                                                            </td>
                                                            <td>
                                                                <p>Straight/bi/gay</p>
                                                                <h4>Straight</h4>
                                                            </td>
                                                            <td>
                                                                <p>Height</p>
                                                                <h4>5.5</h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>Age</p>
                                                                <h4>22</h4>
                                                            </td>
                                                            <td>
                                                                <p>Hair</p>
                                                                <h4>Black</h4>
                                                            </td>
                                                            <td>
                                                                <p>Eyes</p>
                                                                <h4>Brown</h4>
                                                            </td>
                                                            <td>
                                                                <p>Dress</p>
                                                                <h4>Dress</h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>Bust</p>
                                                                <h4>Hot</h4>
                                                            </td>
                                                            <td>
                                                                <p>Body shape</p>
                                                                <h4>Curvy</h4>
                                                            </td>
                                                            <td>
                                                                <p>Nationality</p>
                                                                <h4>canadian</h4>
                                                            </td>
                                                            <td>
                                                                <p>Personality Type</p>
                                                                <h4>personality</h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>Pet Hate</p>
                                                                <h4>Some Text</h4>
                                                            </td>
                                                            <td>
                                                                <p>Favourite Drink</p>
                                                                <h4>Wine</h4>
                                                            </td>
                                                            <td>
                                                                <p>Favourite Food</p>
                                                                <h4>Pizza</h4>
                                                            </td>
                                                            <td>
                                                                <p>Service Provider </p>
                                                                <h4>Agency</h4>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="profile-about">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="sec-title">
                                                    <h3>About me</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="profile-about-contebnt">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                                                    <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingRates">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseRates" aria-expanded="false" aria-controls="collapseRates">
                                    Rates <i class="fas fa-chevron-down right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseRates" class="collapse" aria-labelledby="headingRates" data-parent="#accordion">
                            <div class="card-body">
                                <section class="rates-n-availablity-sec">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="sec-title">
                                                    <h3>Rates</h3>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <table class="rates-table ">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="3">In Call</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>12 Hours</td>
                                                                    <td>$3500</td>
                                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4 Hours</td>
                                                                    <td>$1500</td>
                                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3 Hours</td>
                                                                    <td>$1000</td>
                                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2 Hours</td>
                                                                    <td>$700</td>
                                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1 Hours</td>
                                                                    <td>$500</td>
                                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="rate-content">
                                                            <div id="accordion">
                                                                <div class="card">
                                                                    <div class="card-header" id="headingOne">
                                                                        <h5 class="mb-0">
                                                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                Important Contact Info <i class="fas fa-chevron-down right"></i>
                                                                            </button>
                                                                        </h5>
                                                                    </div>

                                                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                                        <div class="card-body">
                                                                            <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>-->
                                                                            <ul>
                                                                                <li>Lorem Ipsum is simply dummy text of the printing and </li> 
                                                                                <li>Typesetting industry. Lorem Ipsum has been the industries  </li> 
                                                                                <li>Standard dummy text ever since the  </li> 
                                                                                <li>when an unknown printer took a galley of type and  </li> 
                                                                                <li>Scrambled it to make a type specimen book It has survived </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <table class="rates-table mt-3">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="3">Out Call</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>12 Hours</td>
                                                                    <td>$4000</td>
                                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4 Hours</td>
                                                                    <td>$2000</td>
                                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3 Hours</td>
                                                                    <td>$1200</td>
                                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2 Hours</td>
                                                                    <td>$900</td>
                                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1 Hours</td>
                                                                    <td>$800</td>
                                                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="rate-content">
                                                            <div id="accordion">
                                                                <div class="card">
                                                                    <div class="card-header" id="headingTwo">
                                                                        <h5 class="mb-0">
                                                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                                Important Contact Info<i class="fas fa-chevron-down right"></i>
                                                                            </button>
                                                                        </h5>
                                                                    </div>

                                                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                                        <div class="card-body">
                                                                            <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>-->
                                                                            <ul>
                                                                                <li>Lorem Ipsum is simply dummy text of the printing and </li> 
                                                                                <li>Typesetting industry. Lorem Ipsum has been the industries  </li> 
                                                                                <li>Standard dummy text ever since the  </li> 
                                                                                <li>when an unknown printer took a galley of type and  </li> 
                                                                                <li>Scrambled it to make a type specimen book It has survived </li>
                                                                            </ul>
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
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingServices">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseServices" aria-expanded="false" aria-controls="collapseServices">
                                    Services <i class="fas fa-chevron-down right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseServices" class="collapse" aria-labelledby="headingServices" data-parent="#accordion">
                            <div class="card-body">
                                <section class="service-offer-sec">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="sec-title">
                                                    <h3>Service I offer</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul>
                                                    <li>Couples</li>
                                                    <li>Roleplay</li>
                                                    <li>Online Services</li>
                                                    <li>Bisexual</li>
                                                    <li>Overnights</li>
                                                    <li>Dinner Dates</li>
                                                    <li>Fly Me to you</li>
                                                    <li>Couples</li>
                                                    <li>Roleplay</li>
                                                    <li>Online Services</li>
                                                    <li>Bisexual</li>
                                                    <li>Overnights</li>
                                                    <li>Dinner Dates</li>
                                                    <li>Fly Me to you</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="profile-about-contebnt">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFeeds">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFeed" aria-expanded="false" aria-controls="collapseFeed">
                                    Live Feeds <i class="fas fa-chevron-down right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFeed" class="collapse" aria-labelledby="headingFeeds" data-parent="#accordion">
                            <div class="card-body">
                                <section class="profile-feeds">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="sec-title">
                                                    <h3>Feeds</h3>
                                                    <a href="" class="read-all">view All feed »</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="feeds-outer simplebar" id="myElement">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <ul class="profile-feed-inner">
                                                                <li class="media-feed">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="media-feed-area">
                                                                                <img src="images/profile-feed-img.jpg" class="w-100" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="feed-content">
                                                                                <div class="feed-author">
                                                                                    <div class="author-img">
                                                                                        <img src="images/feed-author.jpg" class="img-fluid" />
                                                                                    </div>
                                                                                    <div class="author-detail">
                                                                                        <h5>Lizza Martin</h5>
                                                                                        <p>25 Min ago</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="feed-text">
                                                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting inustry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book It has survived not only five centuriebut also the leap into electronic typesetting remaved not only five centuries but also the leap into electronic typesetting remaining essentially slso unnged It was popularised.
                                                                                        in the 1960s with the release of Lining essentially unchanged It was popularised.</p>
                                                                                </div>
                                                                                <div class="feed-action">
                                                                                    <ul>
                                                                                        <li>
                                                                                            <div class="clearfix">
                                                                                                <div class="left">
                                                                                                    <a href="#" class="feed-content-action like-action">Like</a>
                                                                                                </div>
                                                                                                <div class="right">
                                                                                                    <a href="#"  class="feed-content-action comment-action">Comment</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                        <li>
                                                                                            <div class="clearfix">
                                                                                                <div class="left">
                                                                                                    <p>25 Likes</p>
                                                                                                </div>
                                                                                                <div class="right">
                                                                                                    <p>8 Comment</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                    </ul>
                                                                                    <form>
                                                                                        <div class="form-group">
                                                                                            <div class="comment-feed-img">
                                                                                                <img src="images/feed-comment.jpg" class="img-fluid" /> 
                                                                                            </div>
                                                                                            <div class="comment-box">
                                                                                                <input type="text" class="form-control" placeholder="Write a Comment" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="media-feed">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="feed-content">
                                                                                <div class="feed-author">
                                                                                    <div class="author-img">
                                                                                        <img src="images/feed-author-1.jpg" class="img-fluid" />
                                                                                    </div>
                                                                                    <div class="author-detail">
                                                                                        <h5>Melika Seravate</h5>
                                                                                        <p>25 Min ago</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="feed-text">
                                                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dumnd typesetting industry Lorem Ipsum has been the industrmy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                                                                                </div>
                                                                                <div class="feed-action">
                                                                                    <ul>
                                                                                        <li>
                                                                                            <div class="clearfix">
                                                                                                <div class="left">
                                                                                                    <a href="#" class="feed-content-action like-action">Like</a>
                                                                                                </div>
                                                                                                <div class="right">
                                                                                                    <a href="#"  class="feed-content-action comment-action">Comment</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                        <li>
                                                                                            <div class="clearfix">
                                                                                                <div class="left">
                                                                                                    <p>25 Likes</p>
                                                                                                </div>
                                                                                                <div class="right">
                                                                                                    <p>8 Comment</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                    </ul>
                                                                                    <form>
                                                                                        <div class="form-group">
                                                                                            <div class="comment-feed-img">
                                                                                                <img src="images/feed-comment.jpg" class="img-fluid" /> 
                                                                                            </div>
                                                                                            <div class="comment-box">
                                                                                                <input type="text" class="form-control" placeholder="Write a Comment" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="media-feed">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="media-feed-area">
                                                                                <img src="images/profile-feed-img.jpg" class="w-100" />
                                                                                <a href="#" class="video-play"><img src="images/video-play-icon.png" class="img-fluid" /></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="feed-content">
                                                                                <div class="feed-author">
                                                                                    <div class="author-img">
                                                                                        <img src="images/feed-author.jpg" class="img-fluid" />
                                                                                    </div>
                                                                                    <div class="author-detail">
                                                                                        <h5>Lizza Martin</h5>
                                                                                        <p>25 Min ago</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="feed-text">
                                                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting inustry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book It has survived not only five centuriebut also the leap into electronic typesetting remaved not only five centuries but also the leap into electronic typesetting remaining essentially slso unnged It was popularised.
                                                                                        in the 1960s with the release of Lining essentially unchanged It was popularised.</p>
                                                                                </div>
                                                                                <div class="feed-action">
                                                                                    <ul>
                                                                                        <li>
                                                                                            <div class="clearfix">
                                                                                                <div class="left">
                                                                                                    <a href="#" class="feed-content-action like-action">Like</a>
                                                                                                </div>
                                                                                                <div class="right">
                                                                                                    <a href="#"  class="feed-content-action comment-action">Comment</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                        <li>
                                                                                            <div class="clearfix">
                                                                                                <div class="left">
                                                                                                    <p>25 Likes</p>
                                                                                                </div>
                                                                                                <div class="right">
                                                                                                    <p>8 Comment</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                    </ul>
                                                                                    <form>
                                                                                        <div class="form-group">
                                                                                            <div class="comment-feed-img">
                                                                                                <img src="images/feed-comment.jpg" class="img-fluid" /> 
                                                                                            </div>
                                                                                            <div class="comment-box">
                                                                                                <input type="text" class="form-control" placeholder="Write a Comment" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingAvailable">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseAvailable" aria-expanded="false" aria-controls="collapseAvailable">
                                    Availability <i class="fas fa-chevron-down right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseAvailable" class="collapse" aria-labelledby="headingAvailable" data-parent="#accordion">
                            <div class="card-body">
                                <section class="rates-n-availablity-sec">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 mt-4">
                                                <div class="sec-title">
                                                    <h3>availability</h3>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="table-responsive International tours ">
                                                            <table class="rates-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Weekday</th>
                                                                        <th>From</th>
                                                                        <th>Until</th>
                                                                        <th>24Hrs</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Monday</td>
                                                                        <td>11:00 am</td>
                                                                        <td>10:00 pm</td>
                                                                        <td>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck11" name="example1">
                                                                                <label class="custom-control-label" for="customCheck11">&nbsp;</label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tuesday</td>
                                                                        <td>11:00 am</td>
                                                                        <td>10:00 pm</td>
                                                                        <td>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck12" name="example1">
                                                                                <label class="custom-control-label" for="customCheck12">&nbsp;</label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Wednesday</td>
                                                                        <td>11:00 am</td>
                                                                        <td>10:00 pm</td>
                                                                        <td>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck13" name="example1">
                                                                                <label class="custom-control-label" for="customCheck13">&nbsp;</label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Friday</td>
                                                                        <td>09:00 am</td>
                                                                        <td>10:00 pm</td>
                                                                        <td>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck14" name="example1">
                                                                                <label class="custom-control-label" for="customCheck14">&nbsp;</label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Saturday</td>
                                                                        <td>09:00 am</td>
                                                                        <td>10:00 pm</td>
                                                                        <td>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck15" name="example1">
                                                                                <label class="custom-control-label" for="customCheck15">&nbsp;</label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="rate-content">
                                                            <div class="rate-content">
                                                                <div id="accordion">
                                                                    <div class="card">
                                                                        <div class="card-header" id="headingThree">
                                                                            <h5 class="mb-0">
                                                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                                                    Important Contact Info <i class="fas fa-chevron-down right"></i>
                                                                                </button>
                                                                            </h5>
                                                                        </div>

                                                                        <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordion">
                                                                            <div class="card-body">
                                                                                <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>-->
                                                                                <ul>
                                                                                    <li>Lorem Ipsum is simply dummy text of the printing and </li> 
                                                                                    <li>Typesetting industry. Lorem Ipsum has been the industries  </li> 
                                                                                    <li>Standard dummy text ever since the  </li> 
                                                                                    <li>when an unknown printer took a galley of type and  </li> 
                                                                                    <li>Scrambled it to make a type specimen book It has survived </li>
                                                                                </ul>
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
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingBlogs">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseBlogs" aria-expanded="false" aria-controls="collapseBlogs">
                                    Blogs <i class="fas fa-chevron-down right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseBlogs" class="collapse" aria-labelledby="headingBlogs" data-parent="#accordion">
                            <div class="card-body">
                                <section class="profile-blogs ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="sec-title">
                                                    <h3>My Blogs</h3>
                                                    <a href="" class="read-all">Read All Blogs »</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="my-blog-box">
                                                    <div class="blog-img">
                                                        <img src="images/my-blog-1.jpg" class="w-100" alt="blog-img"/>
                                                    </div>
                                                    <div class="blog-overview">
                                                        <p class="post-date">10.05.2020</p>
                                                        <h5>Lorem Ipsum is simply dummy text of printing and typesetting industry Lorem Ipsum has.</h5>
                                                        <a href="#" class="read-fblog">read full blog »</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="my-blog-box">
                                                    <div class="blog-img">
                                                        <img src="images/my-blog-2.jpg" class="w-100" alt="blog-img"/>
                                                    </div>
                                                    <div class="blog-overview">
                                                        <p class="post-date">10.05.2020</p>
                                                        <h5>Lorem Ipsum is simply dummy text of printing and typesetting industry Lorem Ipsum has.</h5>
                                                        <a href="#" class="read-fblog">read full blog »</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="my-blog-box">
                                                    <div class="blog-img">
                                                        <img src="images/my-blog-3.jpg" class="w-100" alt="blog-img"/>
                                                    </div>
                                                    <div class="blog-overview">
                                                        <p class="post-date">10.05.2020</p>
                                                        <h5>Lorem Ipsum is simply dummy text of printing and typesetting industry Lorem Ipsum has.</h5>
                                                        <a href="#" class="read-fblog">read full blog »</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="my-blog-box">
                                                    <div class="blog-img">
                                                        <img src="images/my-blog-4.jpg" class="w-100" alt="blog-img"/>
                                                    </div>
                                                    <div class="blog-overview">
                                                        <p class="post-date">10.05.2020</p>
                                                        <h5>Lorem Ipsum is simply dummy text of printing and typesetting industry Lorem Ipsum has.</h5>
                                                        <a href="#" class="read-fblog">read full blog »</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTours">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTours" aria-expanded="false" aria-controls="collapseTours">
                                    Tours <i class="fas fa-chevron-down right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTours" class="collapse" aria-labelledby="headingTours" data-parent="#accordion">
                            <div class="card-body">
                                <section class="profile-tours-sec">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="sec-title">
                                                    <h3>Domestic tours</h3>
                                                </div>
                                                <div class="tour-tables table-responsive">
                                                    <table class="">
                                                        <thead>
                                                            <tr>
                                                                <th>City</th>
                                                                <th>Date</th>
                                                                <th>Fully Booked</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Sydney</td>
                                                                <td>7th - 8th June</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="example1">
                                                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Melbourn</td>
                                                                <td>11th - 15 th April</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck2" name="example1">
                                                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Darin</td>
                                                                <td>22th - 8th May</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck3" name="example1">
                                                                        <label class="custom-control-label" for="customCheck3">&nbsp;</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brisbane</td>
                                                                <td>4th - 5th Dec</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck4" name="example1">
                                                                        <label class="custom-control-label" for="customCheck4">&nbsp;</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Melbourne</td>
                                                                <td>22th - 8th May</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck5" name="example1">
                                                                        <label class="custom-control-label" for="customCheck5">&nbsp;</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to 
                                                        make a type specimen book. It has survived not.</p>

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="sec-title">
                                                    <h3>International tours</h3>
                                                </div>
                                                <div class="tour-tables table-responsive">
                                                    <table class="">
                                                        <thead>
                                                            <tr>
                                                                <th>City</th>
                                                                <th>Date</th>
                                                                <th>Fully Booked</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Sydney</td>
                                                                <td>7th - 8th June</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck6" name="example1">
                                                                        <label class="custom-control-label" for="customCheck6">&nbsp;</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Melbourn</td>
                                                                <td>11th - 15 th April</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck7" name="example1">
                                                                        <label class="custom-control-label" for="customCheck7">&nbsp;</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Darin</td>
                                                                <td>22th - 8th May</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck8" name="example1">
                                                                        <label class="custom-control-label" for="customCheck8">&nbsp;</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brisbane</td>
                                                                <td>4th - 5th Dec</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck9" name="example1">
                                                                        <label class="custom-control-label" for="customCheck9">&nbsp;</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Melbourne</td>
                                                                <td>22th - 8th May</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck10" name="example1">
                                                                        <label class="custom-control-label" for="customCheck10">&nbsp;</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to 
                                                        make a type specimen book. It has survived not.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingInterest">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseInterest" aria-expanded="false" aria-controls="collapseInterest">
                                    Interests <i class="fas fa-chevron-down right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseInterest" class="collapse" aria-labelledby="headingInterest" data-parent="#accordion">
                            <div class="card-body">
                                <section class="interest-favthings ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="sec-title">
                                                    <h3>Interests & Favourite Things  </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="fav-things-list">
                                                    <li><p>Music</p></li> 
                                                    <li><p>Love</p></li> 
                                                    <li><p>Romance</p></li> 
                                                    <li><p>Some text</p></li> 
                                                    <li><p>Music</p></li> 
                                                    <li><p>Love</p></li> 
                                                    <li><p>Romance</p></li> 
                                                    <li><p>Some text</p></li> 
                                                    <li><p>Music</p></li> 
                                                    <li><p>Love</p></li> 
                                                    <li><p>Romance</p></li> 
                                                    <li><p>Some text</p></li>
                                                </ul> 

                                                <div class="interest-favthings-content">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknowninter took a galley of type and scrambled it to make a type specimen book my text of the printing and typesetting industry Lorem Ipsum has been Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknowninter took a galley of type and scrambled it to make a type specimen book.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingwishlist">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseWishlist" aria-expanded="false" aria-controls="collapseWishlist">
                                    Wish List <i class="fas fa-chevron-down right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseWishlist" class="collapse" aria-labelledby="headingwishlist" data-parent="#accordion">
                            <div class="card-body">
                                <section class="wishlist">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="sec-title">
                                                    <h3>wish list</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="wishlist-items">
                                                    <li><img src="images/wishlist-1.jpg" /></li>
                                                    <li><img src="images/wishlist-2.jpg" /></li>
                                                    <li><img src="images/wishlist-3.jpg" /></li>
                                                    <li><img src="images/wishlist-4.jpg" /></li>
                                                    <li><img src="images/wishlist-1.jpg" /></li>
                                                    <li><img src="images/wishlist-2.jpg" /></li>
                                                    <li><img src="images/wishlist-3.jpg" /></li>
                                                    <li><img src="images/wishlist-4.jpg" /></li>
                                                </ul> 
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <section class="testimonials">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title dark">
                                <h3>testimonials </h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Nav pills -->
                            <ul class="nav nav-pills justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#home">view testimonial</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#menu1">Write a testimonial</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    <ul class="testimonial-list">
                                        <li>
                                            <div class="testimonial-profile">
                                                <img src="images/testimonial-profile.jpg" class="img-fluid"/>
                                            </div>
                                            <div class="testimonial-content">
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknowninter took a galley of type and scrambled it to make a type specimen book my text of the printing and typesetting industry Lorem Ipsum has been Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                <a href="#" class="more-testimonial">Click here to read the full testimonials</a>
                                                <div class="testimonial-author">
                                                    <p>John, Sydny</p>
                                                    <p>Jan 06, 2020 at 2:45 pm</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="testimonial-profile">
                                                <img src="images/testimonial-profile.jpg" class="img-fluid"/>
                                            </div>
                                            <div class="testimonial-content">
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknowninter took a galley of type and scrambled it to make a type specimen book my text of the printing and typesetting industry Lorem Ipsum has been Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                <a href="#" class="more-testimonial">Click here to read the full testimonials</a>
                                                <div class="testimonial-author">
                                                    <p>John, Sydny</p>
                                                    <p>Jan 06, 2020 at 2:45 pm</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane container fade" id="menu1">...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="home-service-provider">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-9">
                            <div class="box-title c-center">
                                <h2>Service provider resources</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem
                                    Ipsum has been the industrys standard dummy text ever since the</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <a href="sex-trafficking.html">
                                <div class="service-provider-box">
                                    <img src="images/h-service-provider-1.jpg" class="w-100" />
                                    <h4>Stop sex trafficking</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <a href="resources.html">
                                <div class="service-provider-box">
                                    <img src="images/h-service-provider-2.jpg" class="w-100" />
                                    <h4>free local resources</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <a href="purchase-marketing-material.html">
                                <div class="service-provider-box">
                                    <img src="images/h-service-provider-3.jpg" class="w-100" />
                                    <h4>purchase marketing material</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <a href="become-escort.html">
                                <div class="service-provider-box">
                                    <img src="images/h-service-provider-4.jpg" class="w-100" />
                                    <h4>become an escort</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="subscription-mail-box">
                                <div class="subscription-icon">
                                    <img src="images/subscription-mail.png" class="img-fluid" alt="subscribe mail"/> 
                                </div>
                                <div class="subscription-content">
                                    <h3>subscribe to all my updates</h3>
                                    <p>Be notified when Belle Summars becomes availables on short notice, updates photos, goes on tour....</p>
                                    <button class="btn subscription-btn">Subscribe now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



        </div>
        <!-- Content END -->

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/frontend/pages/profile.blade.php ENDPATH**/ ?>