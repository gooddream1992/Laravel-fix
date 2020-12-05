<?php $__env->startSection('title', __('Profile')); ?>
<?php $__env->startSection('main'); ?>

<style type="text/css">

    .profile-container {
        margin: 0px -0.5em;
    }
    .wmark{
        position: absolute;
        top:50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
/*    button{
        font-size: small !important;
    }*/
    .wmark{
        opacity: 30%;
    }

    .custom-ul-class li:before
    {
        background: none !important;
    }


    .item {
  border-radius: 5px;
  padding: 0.5em;
  /* margin: 0 auto 1em auto; */
  overflow: hidden;
  z-index: 1;
  text-decoration: none;
  transition: all 120ms ease;
}
.item h3 {
  color: #000;
}
.item p {
  color: #5b5b5b;
}
.item:before {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #f9f9f9;
  z-index: -1;
  transform: scale(0);
  opacity: 0;
  transition: all 100ms ease;
}
.item:hover {
  opacity: 0.75;
}
.item:hover::before {
  transform: scale(1);
  opacity: 1;
}
.item img {
  width: 100%;
  height: auto;
  display: block;
}

.grid-sizer, .item {
  width: 33%;
}

@media  screen and (max-width: 750px) {
  .grid-sizer, .item {
    width: 45%;
  }
}
@media  screen and (max-width: 500px) {
  grid-sizer, .item {
    width: 90%;
  }
}

button{background-color: white;
      width:100%;
      color: black;
      border:none;
      font-weight: bold;}
button:hover{background-color: red;
      width:100%;
      color: white;
      border:none;
      font-weight: bold;}
  /*.flw{margin-left: -18px;margin-top: -1px;}*/
    #cross-x {
        color: red;
        padding-right: 27px;
    }

    /* SMPEDIT 15-10-2020 */
    /* .custom-btn-link > a {
        width: 100%;
        text-decoration: none !important;
        font-size: 1.2rem !important;
        font-weight: 500 !important;
        color: white !important;
        border-radius: 5px !important;
    } */
    /* SMPEDIT 15-10-2020 END */
</style>
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
                            <div class="carousel-inner" style="text-align: center;">
                                <?php
                                    $pflinetours = \App\ProfileTour::where([
                                        ['escortId', $id],
                                        ['endDate','>=',date('Y-m-d')],
                                        ['status', 1]
                                        ])
                                    ->select()
                                    ->orderBy('startDate','ASC')
                                    ->first();
                                    $city = isset($pflinetours->city) ? $pflinetours->city : '';
                                        $toursCity = \App\State::where('id', $city)
                                        ->select('*')
                                        ->first();
                                        $p_start  = $pflinetours->startDate ?? '';
                                        $p_start_date = date_create($p_start);
                                        $p_starts_date = date_format($p_start_date,"d");

                                        $p_starting_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                        if (($p_starts_date %100) >= 11 && ($p_starts_date%100) <= 13) {
                                           $p_abbreviation = $p_starts_date. 'th';
                                        } else {
                                           $p_abbreviation = $p_starts_date. $p_starting_date[$p_starts_date % 10];
                                        }

                                        $p_end = $pflinetours->endDate ?? '';
                                        $p_end_date = date_create($p_end);
                                        $p_ends_date = date_format($p_end_date,"d");

                                        $p_ending_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                        if (($p_ends_date %100) >= 11 && ($p_ends_date%100) <= 13) {
                                           $p_abbreviations = $p_ends_date. 'th';
                                        } else {
                                           $p_abbreviations = $p_ends_date. $p_ending_date[$p_ends_date % 10];
                                        }
                                    ?>
                                    <?php if(isset($toursCity->state) && $toursCity->state!=''): ?>
                                    <div class="slider-over-content">
                                        Touring <?php echo e($toursCity->state); ?>

                                        <?php echo e($p_abbreviation); ?> <?php echo e(date_format($p_start_date,"M")); ?>

                                        -
                                        <?php echo e($p_abbreviations); ?> <?php echo e(date_format($p_end_date,"M")); ?>                                            
                                    </div>
                                    <?php endif; ?>
                                    
                               <?php if($pfsliders->count()<1): ?>

                                <div class="carousel-item active">
                                  <h1> Have not Uploaded any Slider</h1>
                                </div>
                               <?php else: ?>
                                <div style="background: black" class="carousel-item active"> 
                                    <img class="first-slide" src="<?php echo e(asset('public/uploads/'.$slider1)); ?>" alt="First slide">
                                </div>
                                
                                <?php $__currentLoopData = $pfsliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div style="background: black" class="carousel-item">
                                    <img class="second-slide" src="<?php echo e(asset('public/uploads/'.$slider->image)); ?>" alt="Second slide">
                                    
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $pfsliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div style="background: black" class="carousel-item">
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
                            <h2><?php echo e($escort->name); ?>

                                <?php if($escort->type_IA): ?>
                                   <?php echo e(($escort->type_IA == 1) ? 'Independent' : 'Agency'); ?>

                                <?php endif; ?>
                            </h2>
                            
                            <?php
                                if($escort->state!='')
                                {
                                    $city_name_esc = DB::table('states')->where('id',$escort->state)->get();
                                }
                            ?>
                            <h5><?php if(isset($city_name_esc[0])): ?> <?php echo e($city_name_esc[0] ? $city_name_esc[0]->state : 'Not Found'); ?> <?php endif; ?></h5>
                            <!-- <h2>
                                <?php if($escort->type_IA): ?>
                                    <?php echo e(($escort->type_IA == 1) ? 'Independent' : 'Agency'); ?>

                                <?php endif; ?>
                            </h2> -->
                            
                            <!--<label class="profession-label">Professional Escort</label>-->
                            
                            <?php if($escort->activation==1): ?>
                               <label class="availability-label">Available Right Now</label>
                            <?php endif; ?>
                            
                            <div class="custom-btn-link">
                                <a href="<?php echo e(url('/business/etiquete')); ?>" class="btn btn-dark">READ BEFORE CONTACTING</a>
                            </div>
                            
                            <a href="tel:<?php echo e($escort->phone); ?>" class="profile-call m-hidden"><img src="<?php echo e(asset('public/images/prodile-mobile-icon.png')); ?>" /> Call Me: <?php echo e($escort->phone); ?></a>
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
                                    <?php $__currentLoopData = $social_media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($escort->sm_label_one == $value->socail_media_url): ?>
                                    <li class="whatsapp-box">
                                        
                                        <a href="<?php if($escort->sm_label_one == "whatsapp"): ?> https://api.whatsapp.com/send?phone=<?php echo e($escort->snapchat); ?> <?php else: ?> <?php echo $escort->snapchat; ?> <?php endif; ?>" target="_blank">
                                             
                                              <img src="<?php echo e(asset('public/icon/'.$value->icon)); ?>" alt="" style="width: 54px;"> <br>
                                            
                                            <?php echo e($value->socail_media_url); ?>

                                        </a>
                                        
                                    </li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <?php $__currentLoopData = $social_media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($escort->sm_label_two == $value->socail_media_url): ?>
                                    <li class="snapchat-box">                                        
                                        <a href="<?php if($escort->sm_label_two == "whatsapp"): ?> https://api.whatsapp.com/send?phone=<?php echo e($escort->snapchat); ?> <?php else: ?> <?php echo e($escort->facebook); ?>"  <?php endif; ?>" target="_blank">
                                            
                                            <img src="<?php echo e(asset('public/icon/'.$value->icon)); ?>" alt="" style="width: 54px;"> <br>
                                            
                                            
                                            <?php echo e($value->socail_media_url); ?>

                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $social_media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($escort->sm_label_three == $value->socail_media_url): ?>
                                    <li class="insta-box">                                        
                                        <a href="<?php if($escort->sm_label_three == "whatsapp"): ?> https://api.whatsapp.com/send?phone=<?php echo e($escort->snapchat); ?> <?php else: ?> <?php echo e($escort->whatsup); ?> <?php endif; ?>" target="_blank">
                                            
                                            <img src="<?php echo e(asset('public/icon/'.$value->icon)); ?>" alt="" style="width: 54px;"> <br>
                                            
                                            
                                            <?php echo e($value->socail_media_url); ?>

                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="profile-actions">
                                <ul>
                                    <li>
                                        <?php if(Auth::check()): ?>
                                            <?php
                                                $fllwcnt=\App\Follow::all()->where('escortId', $id)->where('custId',Auth::user()->id)->where('status', 1)->first();
                                            ?>
                                            <?php if(empty($fllwcnt)): ?>
                                                <form role="form" method="POST" action="<?php echo e(url('follow/store')); ?>">
                                                    <?php echo e(csrf_field()); ?>

                                                    <input type="hidden" name="escortId" value="<?php echo e($id); ?>">
                                                    <input type="hidden" name="custId" value="<?php echo e(Auth::user()->id); ?>">
                                                    <input type="hidden" name="status" value="1">
                                                    <button><span class="follow-sprint flw"></span> Follow Me</button>
                                                </form>
                                            <?php else: ?>
                                                <?php 
                                                    $followid=$fllwcnt->id;
                                                ?>
                                                <form role="form" method="POST" action="<?php echo e(url('follow/update')); ?>">
                                                    <?php echo e(csrf_field()); ?>

                                                    <input type="hidden" name="id" value="<?php echo e($followid); ?>">
                                                    <input type="hidden" name="status" value="0">
                                                    <button><span class="follow-sprint flw"></span> Unfollow </button>
                                                    <!--<a href=""><button><span class="follow-sprint flw"></span> Unfollow </button></a>-->
                                                </form>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a href="<?php echo e(url('client/login')); ?>"><span class="follow-sprint"></span> Follow Me</a>
                                        <?php endif; ?>
                                       </li>
                                    <li>
                                    	<a href="<?php echo e(route('profile.email',$id)); ?>" target="_blank"><span class="email-sprint"></span> Email Me</a>
                                        <!-- <button type="" data-toggle="modal" data-target="#contact-blog"><span class="email-sprint"></span> Email Me</button> -->
                                        <!-- <a href="<?php echo e($escort->email_me); ?>"><span class="email-sprint"></span> Email Me</a></li> -->
                                </ul> 

                            </div>
                            <a href="<?php echo e($escort->website); ?>" class="personal-site"><?php echo e($escort->website); ?></a>
                            <!-- <a href="<?php echo e($escort->website); ?>" class="personal-site">Website Link</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Content -->
        <div id="content">
            <div class="m-hidden">

                 <section class="video-sec">
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
                                <?php $galleries= \App\ProfileImage::all()->where('escortId', $id)->where('status', 2); ?>
                                <div class="profile-container">
                                    <div class="grid-sizer"></div>
                                    <div class="gutter-sizer"></div>
                                    <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="item" href="#">
                                        <img src="<?php echo e(asset('public/uploads/'.$gallery->image)); ?>">
                                    </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
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
                                            <?php
                                                $ext = pathinfo( asset('public/uploads/'.$video->image), PATHINFO_EXTENSION);
                                            ?>
                                            <?php if($ext == 'mp4' || $ext == 'webm'): ?>
                                                <video controls>
                                                    <source src="<?php echo e(asset('public/uploads/'.$video->image)); ?>" type="video/mp4">
                                                </video>
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('public/uploads/'.$video->image)); ?>" class="w-100"/>
                                                
                                                <a href="" class="wmark"><img src="<?php echo e(asset('public/wmark.png')); ?>"  style="width:150px"/></a>
                                                <a href="" class="wmark" style="top:20%;left:20%;"><img src="<?php echo e(asset('public/wmark.png')); ?>" style="width:150px"/></a>
                                                <a href="" class="wmark" style="top:80%;left:70%;"><img src="<?php echo e(asset('public/wmark.png')); ?>"  style="width:150px"/></a>
                                            <?php endif; ?>
                                            
                                            
                                             
                                        </div>
                                    </li>
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
                                    <h3>Selfie Gallery</h3>
                                </div>
                            </div>
                        </div>
     
                        <div class="row">
                            <div class="col-lg-12">
                                <?php $galleries= \App\ProfileImage::all()->where('escortId', $id)->where('status', 4); ?>
                                <div class="selfie-container">
                                    <div class="grid-sizer"></div>
                                    <div class="gutter-sizer"></div>
                                    <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="item" href="#">
                                        <img src="<?php echo e(asset('public/uploads/'.$gallery->image)); ?>"/>
                                    </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>


                    </div>
                </section>
            </div>
            <div class="mob-profile-tab-section m-visible desk-hidden">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" onclick="return false;" id="profilephotos">
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
                                                <?php $galleries= \App\ProfileImage::all()->where('escortId', $id)->where('status', 2); ?>
                                                <div class="profile-container">
                                                    <div class="grid-sizer"></div>
                                                    <div class="gutter-sizer"></div>
                                                    <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a class="item" href="#">
                                                    <img src="<?php echo e(asset('public/uploads/'.$gallery->image)); ?>">
                                                    </a>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
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
                                                            <?php
                                                                $ext = pathinfo( asset('public/uploads/'.$video->image), PATHINFO_EXTENSION);
                                                            ?>
                                                            <?php if($ext == 'mp4' || $ext == 'webm'): ?>
                                                                <video controls>
                                                                    <source src="<?php echo e(asset('public/uploads/'.$video->image)); ?>" type="video/mp4">
                                                                </video>
                                                            <?php else: ?>
                                                                <img src="<?php echo e(asset('public/uploads/'.$video->image)); ?>" class="w-100"/>
                                                                
                                                                <a href="" class="wmark"><img src="<?php echo e(asset('public/wmark.png')); ?>"  style="width:150px"/></a>
                                                                <a href="" class="wmark" style="top:20%;left:20%;"><img src="<?php echo e(asset('public/wmark.png')); ?>" style="width:150px"/></a>
                                                                <a href="" class="wmark" style="top:80%;left:70%;"><img src="<?php echo e(asset('public/wmark.png')); ?>"  style="width:150px"/></a>
                                                            <?php endif; ?>
                                                            
                                                            
                                                            
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
                                                    <h3>Selfie Gallery</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php $galleries= \App\ProfileImage::all()->where('escortId', $id)->where('status', 4); ?>
                                                <div class="selfie-container">
                                                    <div class="grid-sizer"></div>
                                                    <div class="gutter-sizer"></div>
                                                    <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a class="item" href="#">
                                                        <img src="<?php echo e(asset('public/uploads/'.$gallery->image)); ?>"/>
                                                    </a>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <section class="profile-feeds">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>Live Updates</h3>
                                    <a href="<?php echo e(route('show-feed',$id)); ?>" class="read-all">view All screen »</a>
                                    
                                        
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                    <div class="col-lg-12 desktop-feed-sec">
                        <?php if((count($friends_data) > 0 && $friends_data[0]->status=='1') ||(Auth::check() && $id==Auth::user()->id)): ?>
                        <a href="#" class="red-small red-smalls feed-send-request-btn">Friends</a></br></br></br>
                        <!-- <a href="/client/unfriend/<?php echo e($id); ?>" class="red-small">Friends</a></br></br></br> -->
                        <?php elseif(count($friends_data) > 0 && $friends_data[0]->status=='0'): ?>
                            <a disabled class="red-small red-smalls feed-send-request-btn">Friend Request Sent</a>
                        <?php else: ?>
                            <?php if(@Auth::user()->roleStatus == ''): ?>
                                <a href="<?php echo e(url('client/login')); ?>" class="red-small feed-send-request-btn">Send Friend Request</a>
                            <?php elseif(isset(Auth::user()->roleStatus) && Auth::user()->roleStatus != ''): ?>
                                <a href="<?php echo e(route('client.send-friend-request', $id )); ?>" class="red-small feed-send-request-btn">Send Friend Request</a>
                            <?php endif; ?>
                        <?php endif; ?>
                                        </div>
                                    </div>



                        <div class="row">
                            <div class="col-lg-12">
                                <div class="feeds-outer simplebar" id="myElement">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="profile-feed-inner">
                    <?php $__currentLoopData = $feed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feed_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $since_start = new DateTime($feed_details->created_at);
                        $start_date = $since_start->diff(new DateTime(now()));
                        $notification_time = "";
                        if($start_date->s!='0') {
                            $notification_time = $start_date->s.' seconds ago';
                        }
                        if($start_date->i!='0') {
                            $notification_time = $start_date->i.' minutes ago';
                        }
                        if($start_date->h!='0') {
                            $notification_time = $start_date->h.' hours ago';
                        }
                        if($start_date->d!='0') {
                            $notification_time = $start_date->d.' days ago';
                        }
                        if($start_date->m!='0') {
                            $notification_time = $start_date->m.' months ago';
                        }
                        if($start_date->y!='0') {
                            $notification_time = $start_date->y.' years ago';
                        }
                    ?>
                    <li class="media-feed" id="<?php echo e($feed_details->id); ?>">
                        <div class="row">
                            <div class="offset-md-3 col-lg-6">
                                <div class="feed-content">
                                    <div class="feed-author">
                                        <div class="author-img">
                                            <img src="<?php echo e($escort_prodile_image_path); ?>" class="img-fluid" style="height: 56px;width: 56px;">
                                        </div>

                                        <div class="author-detail">
                                            <h5><?php echo e($feed_details->title); ?></h5>
                                            <p><?php echo e($notification_time); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-feed-area">
                                    
                                            <?php if($feed_details->image==NULL): ?>
                                                        <?php else: ?> 
                                                <?php
                                                    $ext = pathinfo( asset('public/uploads/'.$feed_details->image), PATHINFO_EXTENSION);
                                                ?>
                                                <?php if($ext == 'mp4' || $ext == 'webm'): ?>
                                                    <video width="" height="" controls>
                                                        <source src="<?php echo e(asset('public/uploads/'.$feed_details->image)); ?>" type="video/mp4">
                                                    </video>
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('public/uploads/'.$feed_details->image)); ?>" class="w-100" style="height: auto !important;width: 100% !important;margin-bottom: 2%;">
                                                <?php endif; ?>
                                                  <?php endif; ?>
                                        </div>
                                    </div>
                                                        <div class="offset-md-3 col-lg-6">
                                        <div class="feed-content">
                                            <div class="feed-text">
                                                    <p><?php echo $feed_details->description; ?></p>
                                                </div>
                                                <div class="feed-action">
                                                    <ul>
                                                        <li>
                                                            <div class="clearfix">
                                                                <div style="width: auto;" class="left">
                                                                    <p><span id="likecount<?php echo e($feed_details->id); ?>"><?php echo isset($like_data[$feed_details->id]) ? count($like_data[$feed_details->id]) : '0'; ?></span> Likes</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>

                                                            <div style="width: auto;" class="right">
                                                                <p><span id="commentcount<?php echo e($feed_details->id); ?>"><?php echo isset($comment_data[$feed_details->id]) ? count($comment_data[$feed_details->id]) : '0'; ?></span> Comment</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <?php if(Auth::check()): ?>

                                                    <?php if((count($friends_data) > 0 && $friends_data[0]->status=='1') ||(Auth::check() && $id==Auth::user()->id)): ?>
                                                        <ul style="padding: 6px 40px;">
                                                            <li>
                                                                <div class="clearfix">
                                                                    <div style="width: auto;" class="left">
                                                                        <a id="like<?php echo e($feed_details->id); ?>" class="feed-content-action like-action" onclick="likeUnlike(<?php echo e($feed_details->id); ?>)"> 
                                                                            <?php
                                                                            if(isset($like_data[$feed_details->id]) && in_array(Auth::user()->id,$like_data[$feed_details->id]) && Auth::check())
                                                                            {
                                                                            echo "Liked!";
                                                                            }
                                                                            else {
                                                                            echo "Like";
                                                                            }
                                                                            ?>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div style="width: auto;" class="right">
                                                                    <a  onclick="doComment( <?php echo e($feed_details->id); ?> )" class="feed-content-action comment-action">Comment</a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <form>
                                                        <?php if((count($friends_data) > 0 && $friends_data[0]->status=='1') ||(Auth::check() && $id==Auth::user()->id)): ?>
                                                        <div class="form-group">
                                                            <div class="comment-feed-img">
                                                                

                                                                    <?php
                                                                    if(Auth::user()->photo!='')
                                                                    {
                                                                        $image = Auth::user()->photo;
                                                                    }
                                                                    else
                                                                    {
                                                                        $image = DB::table('profile_images')->where('escortId',Auth::user()->id)->where('status','5')->first()->image;
                                                                    }
                                                                ?>
                                                                <img src="<?php echo e(asset('public/uploads/'.$image)); ?>" style="height: 45px;width: 45px;" class="img-fluid"> 
                                                            </div>
                                                            <div class="comment-box">
                                                                <input type="text" id="comment<?php echo e($feed_details->id); ?>" data-id="<?php echo e($feed_details->id); ?>" class="form-control comment-box comment-box-input" placeholder="Write a Comment">
                                                            </div>
                                                            <div class="do-comment">
                                                                <a onclick="doComment( <?php echo e($feed_details->id); ?> )" class="red-small do-comment">&#10003;</a>
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>


                                                        <div id="<?php echo e($feed_details->id); ?>">
                                                            <?php                                                               
                                                                if(isset($comment_text[$feed_details->id]) && count($comment_text[$feed_details->id]) > 0) {
                                                                foreach ($comment_text[$feed_details->id] as $key => $comment) {                                                                    
                                                            ?>
                                                            <div class="form-group comment-row">
                                                                <div class="comment-feed-img">
                                                                    <?php if($comment_photo[$feed_details->id][$key]==NULL): ?>
                                                                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height: 45px;width: 45px;" class="img-fluid">
                                                                    <?php else: ?>
                                                                        <img src="<?php echo e(asset('public/uploads/'.$comment_photo[$feed_details->id][$key])); ?>" style="height: 45px;width: 45px;" class="img-fluid">
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="comment-box" style="color: gray;min-width: 9%;border-radius: 10px;float: left;height: auto;padding-left: 15px;">
                                                                    <b style="color: gray;">
                                                                        <?php echo e($comment_name[$feed_details->id][$key]); ?>

                                                                    </b>
                                                                    </br>
                                                                    <?php echo e($comment); ?>

                                                                </div>

                                                            <div class="delete-comment">
                                                                <?php if(isset($comment_data[$feed_details->id]) && Auth::check() && Auth::user()->id==$comment_data[$feed_details->id][$key]): ?>
                                                                    <a href="<?php echo e(route('delete-comment',$comment_id[$feed_details->id][$key])); ?>" class="red-small">&times;</a>
                                                                <?php endif; ?>
                                                            </div>
                                                            </div>
                                                            <?php
                                                            } }
                                                            else {
                                                                ?>
                                                                <div class="form-group comment-row">
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
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

                <div class="m-hidden">
                <section class="profile-overview-table-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="overview-table">
                                    
                                    <table>
                                        <tr>
                                            <td>
                                                <p>Suburb</p>
                                                <h4><?php  $citycount=\App\City::all()->where('id', $escort->city);?>
                                                <?php if($escort->city==''): ?> Not Found <?php else: ?> <?php echo e($escort->city); ?> <?php endif; ?></h4>
                                            </td>
                                            <td>
                                                <p>Type</p>
                                                <h4><?php if($escort->gender==1): ?> Male <?php elseif($escort->gender==2): ?> Female <?php else: ?> None <?php endif; ?></h4>
                                            </td>
                                            <td>
                                                <p>Straight/bi/gay</p>
                                                <h4>
                                                    
                                                    <?php if($escort->straight == 1): ?>
                                                        Straight
                                                    <?php elseif($escort->straight == 2): ?>
                                                        Bi
                                                    <?php elseif($escort->straight == 3): ?>
                                                        Gay
                                                    <?php endif; ?>
                                                </h4>
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
                                                <h4><?php if($escort->hair==NULL): ?> None <?php else: ?> <?php echo e(\App\EscortDropdown::find($escort->hair)->dropdownTitle); ?> <?php endif; ?></h4>
                                            </td>
                                            <td>
                                                <p>Eyes</p>
                                                <h4><?php if($escort->eyes==NULL): ?> None <?php else: ?> <?php echo e(\App\EscortDropdown::find($escort->eyes)->dropdownTitle); ?> <?php endif; ?></h4>
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
                                                <h4><?php if($escort->bodyShape==NULL): ?> <?php else: ?>  <?php echo e(\App\EscortDropdown::find($escort->bodyShape)->dropdownTitle); ?> <?php endif; ?></h4>
                                            </td>
                                            <td>
                                                <p>Nationality</p>
                                                <h4><?php if($escort->nationality==NULL): ?> None <?php else: ?> <?php echo e(\App\EscortDropdown::find($escort->nationality)->dropdownTitle); ?> <?php endif; ?></h4>
                                            </td>
                                            <td>
                                                <p>Personality Type</p>
                                                <h4><?php echo e($escort->personal_type); ?></h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Couples</p>
                                                <h4>
                                                    <?php if(isset($escort->service) && $escort->service == 1): ?>
                                                        YES
                                                    <?php elseif(isset($escort->service) && $escort->service == 2): ?>
                                                        NO
                                                    <?php else: ?>
                                                    <?php endif; ?>
                                                </h4>
                                            </td>
                                            <td>
                                                <p>Favourite Drink</p>
                                                <h4><?php echo e($escort->drink); ?></h4>
                                            </td>
                                            <td>
                                                <p>Service Area</p>
                                                <h4>
                                                    <?php if(isset($escort->serviceArea)): ?>
                                                        <?php if($escort->serviceArea == 1): ?>
                                                            Incall
                                                        <?php elseif($escort->serviceArea == 2): ?>
                                                            OutCall
                                                        <?php elseif($escort->serviceArea == 3): ?>
                                                            Both
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </h4>
                                            </td>
                                            <td>
                                                <p>Verified User </p>
                                                <h4>Yes</h4>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            <?php 
            $aboutcnt=\App\ProfileDescription::all()->where('escortId', $id)->where('status', 1);
        $pfabouts=\App\ProfileDescription::orderBy('updated_at', 'desc')->where('escortId', $id)->where('status', 2)->first();
             
// echo "<pre>";
//             print_r($pfabouts);
//             exit; 
             if(!isset($aboutcnt)){
                $pfabout="Not Upload";
             }else{
                /*echo "hello";
                exit;*/
                $pfabout= isset($pfabouts->description) ? "$pfabouts->description" : "" ;
             }
            
             ?>
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
                                <div class="profile-about-contebnt" style="word-break: break-all">
            <?php echo $pfabout; ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="service-offer-sec green-tick">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>Services I offer</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">

        <?php 
       $serviceoffs=\App\ServiceOfferAssign::all()->where('escortId', $id);
            
          
      ?>  
                                <ul>

                                    <?php $__currentLoopData = $serviceoffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <li>
                                        <?php if(Str::contains($service->service, ';T;')): ?>
                                        <?php
                                            $extra_service = explode(';T;', $service->service)
                                        ?>
                                        <?php else: ?>
                                            <?php echo e($service->service); ?>

                                        <?php endif; ?>
                                    </li>
                                    <?php if(isset($extra_service) && !empty($extra_service)): ?>
                                        <?php $__currentLoopData = $extra_service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <?php echo e($service_details); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </ul>
                            </div>

       <?php 
       $srvccnt=\App\ServiceOfferAssign::all()->where('escortId', $id);
             $pfservices=\App\ServiceOfferAssign::orderBy('id', 'desc')->where('escortId', $id)->first();
           if($srvccnt->count()<1){
            $pfservice="No Upload";
           }else {
             $pfservice=$pfservices->description;
           }
      ?>        
                            <div class="col-lg-12">
                                <div class="profile-about-contebnt" style="word-break: break-all">
                                    <?php echo $pfservice; ?>

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

                                             <?php 
                                            $pfratesincalls=\App\ProfileRate::all()->where('escortId', $id)->where('status', 1);
                                            ?>       
                                            <tbody>
                                                <?php $__currentLoopData = $pfratesincalls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rincall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($rincall->time); ?></td>
                                                    <td><?php echo e($rincall->price); ?></td>
                                                    <td><?php echo e($rincall->description); ?></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <table class="rates-table mb-4">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Out Call</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php 
       $pfratesoutcalls=\App\ProfileRate::all()->where('escortId', $id)->where('status', 2);
      ?>       
                                            <tbody>
                                                <?php $__currentLoopData = $pfratesoutcalls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routcall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($routcall->time); ?></td>
                                                    <td><?php echo e($routcall->price); ?></td>
                                                    <td><?php echo e($routcall->description); ?></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                            </tbody>
                                        </table>
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

                                               <?php 

                                               $pflineavails=\App\ProfileAvailability::all()->where('escortId', $id);

                                              ?>       
                                                           
                                                                
                                                                
                                                    <?php $__currentLoopData = $pflineavails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pflineavail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>           
                                                    
                                                    <tr>
                                                        <td><?php echo e($pflineavail->weekday); ?></td>
                                                        <td><?php echo e($pflineavail->fromDate); ?></td>
                                                        <td><?php echo e($pflineavail->untilDate); ?></td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck11" name="example1" <?php if($pflineavail->available24 == 1): ?>checked <?php endif; ?> disabled>
                                                                <label class="custom-control-label" for="customCheck11">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <!-- Section 3 -->
                <section class="profile-tours-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="sec-title">
                                    <h3>Domestic tours</h3>
                                </div>


                                <?php 
                                $dtourcnt=\App\ProfileDescription::all()->where('escortId', $id)->where('status', 3);
                                      $pfdtours=\App\ProfileDescription::orderBy('id', 'desc')->where('escortId', $id)->where('status', 3)->first();

                                      $pflinetours=\App\ProfileTour::all()->where('escortId', $id)->where('endDate','>=',date('Y-m-d'))->where('status', 1);
           if(count($pflinetours)>0){
      ?>       
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

                                            <?php $__currentLoopData = $pflinetours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pftour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <?php
                                                    $state_name = DB::table('states')->where('id',$pftour->city)->get();
                                                ?>
                                                <td><?php echo e($state_name[0]->state); ?></td>
                                                <td>
                                                    <?php
                                                            $start  = $pftour->startDate ?? '';
                                                            $start_date = date_create($start);
                                                            $starts_date = date_format($start_date,"d");

                                                            $starting_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                            if (($starts_date %100) >= 11 && ($starts_date%100) <= 13) {
                                                               $abbreviation = $starts_date. 'th';
                                                            } else {
                                                               $abbreviation = $starts_date. $starting_date[$starts_date % 10];
                                                            }

                                                            $end = $pftour->endDate ?? '';
                                                            $end_date = date_create($end);
                                                            $ends_date = date_format($end_date,"d");

                                                            $ending_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                            if (($ends_date %100) >= 11 && ($ends_date%100) <= 13) {
                                                               $abbreviations = $ends_date. 'th';
                                                            } else {
                                                               $abbreviations = $ends_date. $ending_date[$ends_date % 10];
                                                            }

                                                        ?>
                                                    <?php echo e($abbreviation); ?> <?php echo e(date_format($start_date,"M")); ?>

                                                        -
                                                        <?php echo e($abbreviations); ?> <?php echo e(date_format($end_date,"M")); ?></td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <?php if($pftour->booked == "1"): ?>
                                                        <span id="cross-x">&#10006;</span>
                                                        <?php else: ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </tbody>
                                    </table>
                                    </div>
                                    <?php
                                }
      ?>        


                            </div>
                            <div class="col-lg-6">
                                <div class="sec-title">
                                    <h3>International tours</h3>
                                </div>
                                <?php
                                        $inttourcnt=\App\ProfileDescription::all()->where('escortId', $id)->where('status', 4);
             $pfinttours=\App\ProfileDescription::orderBy('id', 'desc')->where('escortId', $id)->where('status', 4)->first();
             $pflineinttours=\App\ProfileTour::all()->where('escortId', $id)->where('endDate','>=',date('Y-m-d'))->where('status', 2);
           if(count($pflineinttours)>0){
                                ?>
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
                                         <?php $__currentLoopData = $pflineinttours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pfintlinetour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <?php
                                                    $state_name = DB::table('states')->where('id',$pfintlinetour->city)->get();
                                                ?>
                                                <td><?php echo e($state_name[0]->state); ?></td>
                                                <td>
                                                    <?php
                                                            $i_start  = $pfintlinetour->startDate ?? '';
                                                            $i_start_date = date_create($i_start);
                                                            $i_starts_date = date_format($i_start_date,"d");

                                                            $i_starting_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                            if (($i_starts_date %100) >= 11 && ($i_starts_date%100) <= 13) {
                                                               $i_abbreviation = $i_starts_date. 'th';
                                                            } else {
                                                               $i_abbreviation = $i_starts_date. $i_starting_date[$i_starts_date % 10];
                                                            }

                                                            $i_end = $pfintlinetour->endDate ?? '';
                                                            $i_end_date = date_create($i_end);
                                                            $i_ends_date = date_format($i_end_date,"d");

                                                            $i_ending_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                            if (($i_ends_date %100) >= 11 && ($i_ends_date%100) <= 13) {
                                                               $i_abbreviations = $i_ends_date. 'th';
                                                            } else {
                                                               $i_abbreviations = $i_ends_date. $i_ending_date[$i_ends_date % 10];
                                                            }

                                                        ?>
                                                    <?php echo e($i_abbreviation); ?> <?php echo e(date_format($i_start_date,"M")); ?>

                                                        -
                                                        <?php echo e($i_abbreviations); ?> <?php echo e(date_format($i_end_date,"M")); ?></td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <?php if($pfintlinetour->booked == 1): ?>
                                                        <span id="cross-x">&#10006;</span>
                                                        <?php else: ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <?php 
           }
      ?>        

                                </div>
                            </div>
                        </div>
                </section>
                <section class="profile-blogs">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>My Blogs</h3>
                                    <a href="<?php echo e(route('profile-guest.blogs.index', $id)); ?>" class="read-all">Read All Blogs »</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php $blogs=\App\Blog::where('publishBy', $id)->limit(6)->orderBy('created_at', 'desc')->get(); ?>                 
                            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-4">
                                <div class="my-blog-box" style="height: 250px;">
                                    <div class="blog-img">
                                        <?php if($blog->imageurl): ?>
                                            <img src="<?php echo e(asset('public/client_library/upload/blog/' . $blog->imageurl)); ?>" class="w-100" />
                                        <?php else: ?> 
                                            <img src="<?php echo e(asset('public/client_library/upload/blog/blankphoto.png')); ?>" class="w-100" />
                                        <?php endif; ?>
                                    </div>
                                    <div class="blog-overview">
                                        <p class="post-date"><?php echo e($blog->created_at); ?></p>
                                        <h5><?php echo e($blog->title); ?></h5>
                                        <a href="<?php echo e(route('multi.blog.details', $blog->id)); ?>" class="read-fblog">Read full blog »</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </section>
                <section class="interest-favthings">
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
                                    <!-- SMPEDIT 15-10-2020 -->
                                    <?php if(!empty($profile_favourites)): ?>   
                                        <?php $__currentLoopData = $profile_favourites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($tag); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <!-- / SMPEDIT 15-10-2020 END -->
                                </ul>
                                <div class="container" style="word-break: break-all">
                                    <?php $__currentLoopData = $favourites_decription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($value->description); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <div class="wishlist-gallery">
                                <ul class="wishlist-items ">
                                    <!-- SMPEDIT 15-10-2020 -->
                                    <?php if($wish_lists->count() > 0): ?>
                                        <?php $__currentLoopData = $wish_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wish_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li style=" " class="img-holder"> 
                                            <a href="<?php echo e($wish_list->image_url); ?>">
                                            <img src="<?php echo e(asset('public/profile/'. $wish_list->image)); ?>"  />
                                            </a>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <!-- / SMPEDIT 15-10-2020 END -->
                                </ul> 
                            </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="mob-profile-tab-section m-visible desk-hidden">
    <div id="accordion">
        <div class="card">
            <div class="card-header" onclick="return false;" id="profileBiography">
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
									<div class="overview-table">
										
										<table>
											<tr>
												<td>
													<p>Suburb</p>
													<h4><?php  $citycount=\App\City::all()->where('id', $escort->city);?>
													<?php if($escort->city==''): ?> Not Found <?php else: ?> <?php echo e($escort->city); ?> <?php endif; ?></h4>
												</td>
												<td>
													<p>Type</p>
													<h4><?php if($escort->gender==1): ?> Male <?php elseif($escort->gender==2): ?> Female <?php else: ?> None <?php endif; ?></h4>
												</td>
												<td>
													<p>Straight/bi/gay</p>
													<h4>
														
														<?php if($escort->straight == 1): ?>
															Straight
														<?php elseif($escort->straight == 2): ?>
															Bi
														<?php elseif($escort->straight == 3): ?>
															Gay
														<?php endif; ?>
													</h4>
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
													<h4><?php if($escort->hair==NULL): ?> None <?php else: ?> <?php echo e(\App\EscortDropdown::find($escort->hair)->dropdownTitle); ?> <?php endif; ?></h4>
												</td>
												<td>
													<p>Eyes</p>
													<h4><?php if($escort->eyes==NULL): ?> None <?php else: ?> <?php echo e(\App\EscortDropdown::find($escort->eyes)->dropdownTitle); ?> <?php endif; ?></h4>
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
													<h4><?php if($escort->bodyShape==NULL): ?> <?php else: ?>  <?php echo e(\App\EscortDropdown::find($escort->bodyShape)->dropdownTitle); ?> <?php endif; ?></h4>
												</td>
												<td>
													<p>Nationality</p>
													<h4><?php if($escort->nationality==NULL): ?> None <?php else: ?> <?php echo e(\App\EscortDropdown::find($escort->nationality)->dropdownTitle); ?> <?php endif; ?></h4>
												</td>
												<td>
													<p>Personality Type</p>
													<h4><?php echo e($escort->personal_type); ?></h4>
												</td>
											</tr>
											<tr>
												<td>
													<p>Couples</p>
													<h4>
														<?php if(isset($escort->service) && $escort->service == 1): ?>
															YES
														<?php elseif(isset($escort->service) && $escort->service == 2): ?>
															NO
														<?php else: ?>
														<?php endif; ?>
													</h4>
												</td>
												<td>
													<p>Favourite Drink</p>
													<h4><?php echo e($escort->drink); ?></h4>
												</td>
												<td>
													<p>Service Area</p>
													<h4>
														<?php if(isset($escort->serviceArea)): ?>
															<?php if($escort->serviceArea == 1): ?>
																Incall
															<?php elseif($escort->serviceArea == 2): ?>
																OutCall
															<?php elseif($escort->serviceArea == 3): ?>
																Both
															<?php endif; ?>
														<?php endif; ?>
													</h4>
												</td>
												<td>
													<p>Verified User </p>
													<h4>Yes</h4>
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
									<div class="profile-about-contebnt" style="word-break: break-all">
									<?php echo $pfabout; ?> 
									</div>
								</div>
							</div>
						</div>
                    </section>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" onclick="return false;" id="headingRates">
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
                                        <table class="rates-table mb-4">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">In Call</th>
                                                </tr>
                                            </thead>

                                             <?php 
                                            $pfratesincalls=\App\ProfileRate::all()->where('escortId', $id)->where('status', 1);
                                            ?>       
                                            <tbody>
                                                <?php $__currentLoopData = $pfratesincalls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rincall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($rincall->time); ?></td>
                                                    <td><?php echo e($rincall->price); ?></td>
                                                    <td><?php echo e($rincall->description); ?></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <table class="rates-table mb-4">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Out Call</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $pfratesoutcalls=\App\ProfileRate::all()->where('escortId', $id)->where('status', 2);
                                                ?>       
                                            <tbody>
                                                <?php $__currentLoopData = $pfratesoutcalls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routcall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($routcall->time); ?></td>
                                                    <td><?php echo e($routcall->price); ?></td>
                                                    <td><?php echo e($routcall->description); ?></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                        
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
            <div class="card-header" onclick="return false;" id="headingAvailable">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseAvailable" aria-expanded="false" aria-controls="collapseAvailable">
                        Availability <i class="fas fa-chevron-down right"></i>
                    </button>
                </h5>
            </div>
            <div id="collapseAvailable" class="collapse" aria-labelledby="headingAvailable" data-parent="#accordion" style="">
                <div class="card-body">
                    <section class="rates-n-availablity-sec">
                        <div class="container">
                            <div class="row">
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
    
                                                   <?php 
    
                                                   $pflineavails=\App\ProfileAvailability::all()->where('escortId', $id);
    
                                                  ?>       
                                                               
                                                                    
                                                                    
                                                        <?php $__currentLoopData = $pflineavails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pflineavail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>           
                                                        
                                                        <tr>
                                                            <td><?php echo e($pflineavail->weekday); ?></td>
                                                            <td><?php echo e($pflineavail->fromDate); ?></td>
                                                            <td><?php echo e($pflineavail->untilDate); ?></td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="customCheck11" name="example1" <?php if($pflineavail->available24 == 1): ?>checked <?php endif; ?> disabled>
                                                                    <label class="custom-control-label" for="customCheck11">&nbsp;</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                       
                                                    </tbody>
                                                </table>
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
            <div class="card-header" onclick="return false;" id="headingServices">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseServices" aria-expanded="false" aria-controls="collapseServices">
                    Services <i class="fas fa-chevron-down right"></i>
                    </button>
                </h5>
            </div>
            <div id="collapseServices" class="collapse" aria-labelledby="headingServices" data-parent="#accordion">
                <div class="card-body">
                    <section class="service-offer-sec green-tick">
                        <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title">
                                    <h3>Services I offer</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">

        <?php 
       $serviceoffs=\App\ServiceOfferAssign::all()->where('escortId', $id);
            
          
      ?>  
                                <ul>

                                    <?php $__currentLoopData = $serviceoffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <li>
                                        <?php if(Str::contains($service->service, ';T;')): ?>
                                        <?php
                                            $extra_service = explode(';T;', $service->service)
                                        ?>
                                        <?php else: ?>
                                            <?php echo e($service->service); ?>

                                        <?php endif; ?>
                                    </li>
                                    <?php if(isset($extra_service) && !empty($extra_service)): ?>
                                        <?php $__currentLoopData = $extra_service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <?php echo e($service_details); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </ul>
                            </div>

       <?php 
       $srvccnt=\App\ServiceOfferAssign::all()->where('escortId', $id);
             $pfservices=\App\ServiceOfferAssign::orderBy('id', 'desc')->where('escortId', $id)->first();
           if($srvccnt->count()<1){
            $pfservice="No Upload";
           }else {
             $pfservice=$pfservices->description;
           }
      ?>        
                            <div class="col-lg-12">
                                <div class="profile-about-contebnt" style="word-break: break-all">
                                    <?php echo $pfservice; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" onclick="return false;" id="headingBlogs">
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
										<a href="<?php echo e(route('profile-guest.blogs.index', $id)); ?>" class="read-all">Read All Blogs »</a>
									</div>
								</div>
							</div>
							<div class="row">
								<?php $blogs=\App\Blog::where('publishBy', $id)->limit(6)->orderBy('created_at', 'desc')->get(); ?>                 
								<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-lg-4 col-md-4">
									<div class="my-blog-box" style="height: 250px;">
										<div class="blog-img">
											<?php if($blog->imageurl): ?>
												<img src="<?php echo e(asset('public/client_library/upload/blog/' . $blog->imageurl)); ?>" class="w-100" />
											<?php else: ?> 
												<img src="<?php echo e(asset('public/client_library/upload/blog/blankphoto.png')); ?>" class="w-100" />
											<?php endif; ?>
										</div>
										<div class="blog-overview">
											<p class="post-date"><?php echo e($blog->created_at); ?></p>
											<h5><?php echo e($blog->title); ?></h5>
											<a href="<?php echo e(route('multi.blog.details', $blog->id)); ?>" class="read-fblog">Read full blog »</a>
										</div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div>
                    </section>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" onclick="return false;" id="headingTours">
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
                                <?php 
                                    $dtourcnt=\App\ProfileDescription::all()->where('escortId', $id)->where('status', 3);
                                    $pfdtours=\App\ProfileDescription::orderBy('id', 'desc')->where('escortId', $id)->where('status', 3)->first();

                                    $pflinetours=\App\ProfileTour::all()->where('escortId', $id)->where('endDate','>=',date('Y-m-d'))->where('status', 1);
                                    if(count($pflinetours)>0){
                                ?>       
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

                                            <?php $__currentLoopData = $pflinetours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pftour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php
                                                        $state_name = DB::table('states')->where('id',$pftour->city)->get();
                                                    ?>
                                                    <?php echo e($state_name[0]->state); ?>

                                                </td>
                                                <td>
                                                    <?php
                                                            $dM_start  = $pftour->startDate ?? '';
                                                            $dM_start_date = date_create($dM_start);
                                                            $dM_starts_date = date_format($dM_start_date,"d");

                                                            $dM_starting_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                            if (($dM_starts_date %100) >= 11 && ($dM_starts_date%100) <= 13) {
                                                               $dM_abbreviation = $dM_starts_date. 'th';
                                                            } else {
                                                               $dM_abbreviation = $dM_starts_date. $dM_starting_date[$starts_date % 10];
                                                            }

                                                            $dM_end = $pftour->endDate ?? '';
                                                            $dM_end_date = date_create($dM_end);
                                                            $dM_ends_date = date_format($dM_end_date,"d");

                                                            $dM_ending_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                            if (($dM_ends_date %100) >= 11 && ($dM_ends_date%100) <= 13) {
                                                               $dM_abbreviations = $dM_ends_date. 'th';
                                                            } else {
                                                               $dM_abbreviations = $dM_ends_date. $dM_ending_date[$dM_ends_date % 10];
                                                            }

                                                        ?>
                                                    <span class="tour-date-from"><?php echo e($dM_abbreviation); ?> <?php echo e(date_format($dM_start_date,"M")); ?></span><br>
                                                    <span class="tour-date-to"><?php echo e($dM_abbreviations); ?> <?php echo e(date_format($dM_end_date,"M")); ?></span>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <?php if($pftour->booked == "1"): ?>
                                                        <span id="cross-x">&#10006;</span>
                                                        <?php else: ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </tbody>
                                    </table>
                                    </div>

                            </div>
                                    <?php
                                }
                                ?>        
                                <?php
                                        $inttourcnt=\App\ProfileDescription::all()->where('escortId', $id)->where('status', 4);
             $pfinttours=\App\ProfileDescription::orderBy('id', 'desc')->where('escortId', $id)->where('status', 4)->first();
             $pflineinttours=\App\ProfileTour::all()->where('escortId', $id)->where('endDate','>=',date('Y-m-d'))->where('status', 2);
           if(count($pflineinttours)>0){
                                ?>
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
                                         <?php $__currentLoopData = $pflineinttours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pfintlinetour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php
                                                        $state_name_in = DB::table('states')->where('id',$pfintlinetour->city)->get();
                                                    ?>
                                                    <?php echo e($state_name_in[0]->state); ?>

                                                </td>
                                                <td>
                                                     <?php
                                                            $iM_start  = $pftour->startDate ?? '';
                                                            $iM_start_date = date_create($iM_start);
                                                            $iM_starts_date = date_format($iM_start_date,"d");

                                                            $iM_starting_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                            if (($iM_starts_date %100) >= 11 && ($iM_starts_date%100) <= 13) {
                                                               $iM_abbreviation = $iM_starts_date. 'th';
                                                            } else {
                                                               $iM_abbreviation = $iM_starts_date. $iM_starting_date[$iM_starts_date % 10];
                                                            }

                                                            $iM_end = $pftour->endDate ?? '';
                                                            $iM_end_date = date_create($iM_end);
                                                            $iM_ends_date = date_format($iM_end_date,"d");

                                                            $iM_ending_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                            if (($iM_ends_date %100) >= 11 && ($iM_ends_date%100) <= 13) {
                                                               $iM_abbreviations = $iM_ends_date. 'th';
                                                            } else {
                                                               $iM_abbreviations = $iM_ends_date. $iM_ending_date[$iM_ends_date % 10];
                                                            }

                                                        ?>
                                                    <span class="tour-date-from"><?php echo e($iM_abbreviation); ?> <?php echo e(date_format($iM_start_date,"M")); ?></span><br>
                                                    <span class="tour-date-to"><?php echo e($iM_abbreviations); ?> <?php echo e(date_format($iM_end_date,"M")); ?></span>
                                                    
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <?php if($pfintlinetour->booked == 1): ?>
                                                        <span id="cross-x">&#10006;</span>
                                                        <?php else: ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    
                                    </div>
                                    </div>
                                    <?php 
           }
      ?>        
                        </div>
                    </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" onclick="return false;" id="headingInterest">
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
										<!-- SMPEDIT 15-10-2020 -->
										<?php if(!empty($profile_favourites)): ?>   
											<?php $__currentLoopData = $profile_favourites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<li><?php echo e($tag); ?></li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										<!-- / SMPEDIT 15-10-2020 END -->
									</ul>
									<div class="container" style="word-break: break-all">
										<?php $__currentLoopData = $favourites_decription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php echo e($value->description); ?>

										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
									
								</div>
							</div>
						</div>
                    </section>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" onclick="return false;" id="headingwishlist">
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
									<div class="wishlist-gallery">
									<ul class="wishlist-items ">
										<!-- SMPEDIT 15-10-2020 -->
										<?php if($wish_lists->count() > 0): ?>
											<?php $__currentLoopData = $wish_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wish_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<li style=" " class="img-holder"> 
												<a target="_blank" href="<?php echo e($wish_list->image_url); ?>">
												<img src="<?php echo e(asset('public/profile/'. $wish_list->image)); ?>"  />
												</a>
											</li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
										<!-- / SMPEDIT 15-10-2020 END -->
									</ul> 
								</div>
								</div>
							</div>
						</div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
          
            <section class="testimonials profile-testimonials">
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
                                        <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <div class="testimonial-profile">
                                                <img src="<?php echo e(asset('public/uploads/'.$testimonial_details->photo)); ?>" class="img-fluid">
                                            </div>
                                            <div class="testimonial-content">
                                                <p style="word-break: break-all"><?php echo $testimonial_details->testimonial; ?></p>
                                                <div class="testimonial-author">
                                                    <p><?php echo e($testimonial_details->name); ?></p>
                                                    <p>Jan 06, 2020 at 2:45 pm</p>
                                                </div>
                                            </div>
                                        </li>                                        
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <div class="tab-pane container fades store_testimonial" id="menu1">
                                        
                                      <!-- <form id="store_testimonial" action="<?php echo e(route('store.testimonial')); ?>" method="post">
                                        <?php echo csrf_field(); ?> -->
                                        <input type="hidden" name="escort_id" value="<?php echo e($id); ?>" id="escort_id">
                                        <textarea name="testimonial" class="form-control" style="background: black;color: #909090;margin-top: 25px;" id="testimoninal_text"></textarea>
                                        <div class="col-md-1">                                        	
                                            <button class="red-btn testimonial-submit-btn" style="padding: 8px !important;border-radius: 6px;margin-top: 13px;width: 100px;margin-left: -15px;" type="submit">
                                                Submit
                                            </button>
                                        <!-- </form> -->
                                        </div>
                                </div>
                            </div>                       
                        </div>
                    </div>
                </div>
            </section>
            <section class="home-service-provider">
                <div class="container">
                      <?php $provresrcs= \App\ProviderResource::all();?>
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            <?php $__currentLoopData = $provresrcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resourc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="box-title c-center">
                                <h2><?php echo e($resourc->titleHead); ?></h2>
                                <?php echo $resourc->intro; ?>

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
                    <?php
                        $fllwcnt=\App\Follow::all()->where('escortId', $id)->where('status', 1);
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="subscription-mail-box">
                                <div class="subscription-icon">
                                    <img src="<?php echo e(asset('public/images/subscription-mail.png')); ?>" class="img-fluid" alt="subscribe mail"/> 
                                </div>
                                <div class="subscription-content">
                                    <h3>subscribe to all my updates</h3>
                                    <p>Be notified when Belle Summars becomes availables on short notice, updates photos, goes on tour....</p>
                                    <?php if(Auth::check()): ?>
                                        <?php if($fllwcnt->count()==0): ?>
                                            <form role="form" method="POST" action="<?php echo e(url('follow/store')); ?>">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="escortId" value="<?php echo e($id); ?>">
                                                <input type="hidden" name="custId" value="<?php echo e(Auth::user()->id); ?>">
                                                <input type="hidden" name="status" value="1">
                                                <button class="btn subscription-btn">Subscribe now</button>
                                            </form>
                                        <?php elseif($fllwcnt->count()>0): ?>
                                            <?php 
                                                $followids=\App\Follow::orderBy('id', 'desc')->where('escortId', $id)->where('status', 1)->first();
                                                $followid=$followids->id;
                                            ?>
                                            <form role="form" method="POST" action="<?php echo e(url('follow/update')); ?>">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="id" value="<?php echo e($followid); ?>">
                                                <input type="hidden" name="status" value="0">
                                                <button class="btn subscription-btn">Unsubscribe</button>
                                                <!--<a href=""><button><span class="follow-sprint flw"></span> Unfollow </button></a>-->
                                            </form>
                                        <?php endif; ?>
                                    <?php else: ?>
                                    <a href="<?php echo e(url('client/login')); ?>" class="btn subscription-btn">Subscribe now</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



        </div>
        <!-- Content END -->

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        

          <!-- Modal -->
<div class="modal fade" id="contact-blog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLongTitle">Email Me</h4>
            <button type="button" class="btn" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body c-center">
            <!-- <h3>Email Me</h3>
               <h6>Please tell us your experience and why you would be good to blog for Skissr</h6> -->
            <form action="<?php echo e(route('profile-guest-mail')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                  <input type="hidden" class="form-control" name="id" value="<?php echo e($id); ?>" />
               </div>
               <div class="form-group">
                  <input type="text" class="form-control" placeholder="Your Name" name="name" />
               </div>
               <div class="form-group">
                  <input type="email" class="form-control" placeholder="Your Email Id " name="email" />
               </div>
               <div class="form-group">
                  <textarea class="form-control" placeholder="Your Message" name="message"></textarea>
               </div>
               <div class="form-group">
                  <button class="btn red-small " type="submit">Submit</button> 
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/pages/profile.blade.php ENDPATH**/ ?>