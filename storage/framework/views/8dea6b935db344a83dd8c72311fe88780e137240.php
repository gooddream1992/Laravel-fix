<?php $__env->startSection('title', __('Profile')); ?>
<?php $__env->startSection('main'); ?>

<style type="text/css">
    .wmark{
        position: absolute;
        top:50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
    button{
        font-size: small !important;
    }
    .wmark{
        opacity: 0.8;
    }



.grid {
  background: #fff;
  height: 75%; /* inherit height from body */
}

/* clear fix */
.grid:after {
  content: '';
  display: block;
  clear: both;
}

/* ---- .grid-item ---- */

.grid-item {
  float: left;
  width: 432px;
  height: 673px;
}

.grid-item-h-w {

  width: 432px !important;
  height: 673px !important;
}
.grid-item-h-w-div {

  width: 432px !important;
  height: 673px !important;
}
.grid-item-mid-h-w {

  width: 633px !important;
  height: 673px !important;
}

.grid-item-mid-h-w-div {

  width: 633px !important;
  height: 673px !important;
}

.grid-item-2-h-w{
 width: 831px !important;
 height: 673px !important;
}
.grid-item-2-h-w-div{
 width: 831px !important;
 height: 673px !important;
}
.grid-item--width2 { width: 831px !important;height: 673px;}
.grid-item--height2 { height: 200px; }

.gal-image {
    padding-right: 10px;
    padding-bottom: 10px;
    border-radius: 21px;
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
  .flw{margin-left: -18px;
    margin-top: -1px;}
    #cross-x {
        color: red;
        padding-right: 27px;
    }

    /* SMPEDIT 15-10-2020 */
    .custom-btn-link > a {
        width: 100%;
        text-decoration: none !important;
        font-size: 1.4rem !important;
        font-weight: 500 !important;
        color: white !important;
        border-radius: 5px !important;
    }
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
                            
                            <h5>
                                <?php if(isset($escort->city)): ?>
                                <?php $city = \App\City::find($escort->city)->city ?>
                                <?php echo e($city ? $city : 'Not Found'); ?>

                                <?php endif; ?>
                            </h5>
                            <h2>
                                <?php if($escort->service): ?>
                                    <?php echo e(($escort->service == 1) ? 'Independent' : 'Agency - '); ?>

                                <?php endif; ?>
                            </h2>
                            
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
                            <?php endif; ?>
                            
                            <div class="custom-btn-link">
                                <a href="<?php echo e(url('/business/etiquete')); ?>" class="btn btn-dark">READ BEFORE CONTACTING</a>
                            </div>
                            
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
                                    <li>
                           <?php $fllwcnt=\App\Follow::all()->where('escortId', $id)->where('status', 1);?>
                        <?php if($fllwcnt->count()==0): ?>
                        <?php if(Auth::check()): ?>
                <form role="form" method="POST" action="<?php echo e(url('follow/store')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="escortId" value="<?php echo e($id); ?>">
                    <input type="hidden" name="custId" value="<?php echo e(Auth::user()->id); ?>">
                    <input type="hidden" name="status" value="1">
                                  
                <a href=""><button><span class="follow-sprint flw"></span> Follow Me</button></a>
                  
                </form>
                <?php endif; ?>
                <a href="<?php echo e(url('client/login')); ?>"><span class="follow-sprint"></span> Follow Me</a>

                 <?php elseif($fllwcnt->count()>0): ?>
                        <?php if(Auth::check()): ?>
            <?php 
                 $followids=\App\Follow::orderBy('id', 'desc')->where('escortId', $id)->where('status', 1)->first();
                  $followid=$followids->id;
            ?>

  <form role="form" method="POST" action="<?php echo e(url('follow/update')); ?>">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="id" value="<?php echo e($followid); ?>">
            <input type="hidden" name="status" value="0">
                                  
                <a href=""><button><span class="follow-sprint flw"></span> Unfollow </button></a>
                  
                </form>
                <?php endif; ?>
                <a href=""><span class="follow-sprint"></span> Following</a>
                <?php else: ?>

                
                <?php endif; ?>
                                       </li>
                                    <li><a href="<?php echo e($escort->email_me); ?>"><span class="email-sprint"></span> Email Me</a></li>
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
                                <div class="grid">
                                 <?php $galleries= \App\ProfileImage::all()->where('escortId', $id)->where('status', 2); ?>
                                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php 
                                    $details = getimagesize( asset('public/uploads/'.$gallery->image) ); 
                                    $height = $details[1];
                                    $width = $details[0];
                                    if($width>801)
                                    {
                                        $class_div = " grid-item--width2";
                                        $class_img = " grid-item-2-h-w";
                                    }
                                    else
                                    {
                                        if($width < 700 && $width > 600)
                                        {
                                            $class_div = " grid-item-mid-h-w-div";
                                            $class_img = " grid-item-mid-h-w";
                                        }
                                        else
                                        {
                                            $class_div = " grid-item-h-w-div";
                                            $class_img = " grid-item-h-w";
                                        }
                                    }
                                ?>
                                
                                <div class="grid-item <?=$class_div?> <?=$width?> video-box ">
                                    <img src="<?php echo e(asset('public/uploads/'.$gallery->image)); ?>"  class="gal-image <?=$class_img?>"/>
                                    <a href="" class="wmark"><img src="<?php echo e(asset('public/wmark.png')); ?>"  style="width:150px"/></a>
                                    <a href="" class="wmark" style="top:20%;left:20%;"><img src="<?php echo e(asset('public/wmark.png')); ?>" style="width:150px"/></a>
                                    <a href="" class="wmark" style="top:80%;left:70%;"><img src="<?php echo e(asset('public/wmark.png')); ?>"  style="width:150px"/></a>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                             <a href="" class="wmark"><img src="<?php echo e(asset('public/wmark.png')); ?>"  style="width:150px"/></a>
                                            <a href="" class="wmark" style="top:20%;left:20%;"><img src="<?php echo e(asset('public/wmark.png')); ?>" style="width:150px"/></a>
                                            <a href="" class="wmark" style="top:80%;left:70%;"><img src="<?php echo e(asset('public/wmark.png')); ?>"  style="width:150px"/></a>
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
                                <ul class="video-gallary">
                                    <?php $galleries= \App\ProfileImage::all()->where('escortId', $id)->where('status', 4); ?>
                                    <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li style="margin-left: 0px;width: 32.2%;">
                                        <div class="video-box">
                                            <img src="<?php echo e(asset('public/uploads/'.$gallery->image)); ?>" class="w-100"/>
                                            <a href="" class="wmark"><img src="<?php echo e(asset('public/wmark.png')); ?>"  style="width:150px"/></a>
                                            <a href="" class="wmark" style="top:20%;left:20%;"><img src="<?php echo e(asset('public/wmark.png')); ?>" style="width:150px"/></a>
                                            <a href="" class="wmark" style="top:80%;left:70%;"><img src="<?php echo e(asset('public/wmark.png')); ?>"  style="width:150px"/></a>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   
                                </ul>
                            </div>
                        </div>


                    </div>
                </section>


                <?php if(Auth::check()): ?>
                    <section class="profile-feeds">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="sec-title">
                                        <h3>Live Updates</h3>
                                        
                                    </div>
                                </div>
                            </div>
                            <?php if(count($friends_data) > 0 && $friends_data[0]->status=='1'): ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="feeds-outer simplebar" id="myElement">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="profile-feed-inner">
                                                    <?php $__currentLoopData = $feed_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feed_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="media-feed">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="media-feed-area">
                                                                        
                                                                        <?php if( isset($feed_details->image) && $feed_details->image==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"><?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$feed_details->image)); ?>" class="w-100"><?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="feed-content">
                                                                        <div class="feed-author">
                                                                            <div class="author-img">
                                                                                <img src="images/feed-author.jpg" class="img-fluid" />
                                                                            </div>
                                                                            <div class="author-detail">
                                                                                
                                                                                <?php
                                                                                    $since_start = new DateTime($feed_details->created_at);
                                                                                    $start_date = $since_start->diff(new DateTime(now()));
                                                                                    if($start_date->s!='0')
                                                                                    {
                                                                                        $notification_time = $start_date->s.' seconds ago';
                                                                                    }
                                                                                    if($start_date->i!='0')
                                                                                    {
                                                                                        $notification_time = $start_date->i.' minutes ago';
                                                                                    }
                                                                                    if($start_date->h!='0')
                                                                                    {
                                                                                        $notification_time = $start_date->h.' hours ago';
                                                                                    }
                                                                                    if($start_date->d!='0')
                                                                                    {
                                                                                        $notification_time = $start_date->d.' days ago';
                                                                                    }
                                                                                    if($start_date->m!='0')
                                                                                    {
                                                                                        $notification_time = $start_date->m.' months ago';
                                                                                    }
                                                                                    if($start_date->y!='0')
                                                                                    {
                                                                                        $notification_time = $start_date->y.' years ago';
                                                                                    }
                                                                                ?>
                                                                                <h5><?php echo e($escort->name); ?></h5>
                                                                                <p><?php echo e($notification_time); ?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="feed-text">
                                                                            <p><?php echo $feed_details->description; ?></p>
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
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php elseif(count($friends_data) > 0 && $friends_data[0]->status=='0'): ?>
                        <a disabled class="red-small">Friend Request Sent</a></br></br></br>
                    <?php else: ?>
                        <a href="<?php echo e(route('client.send-friend-request', $id )); ?>" class="red-small">Send Friend Request</a></br></br></br>
                    <?php endif; ?>
                <?php endif; ?>
                
                <section class="profile-overview-table-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="overview-table">
                                    
                                    <table>
                                        <tr>
                                            <td>
                                                <p>Suburb</p>
                                                <h4><?php $citycount=\App\City::all()->where('id', $escort->suburb);?>
                           <?php if($citycount->count()<1): ?> Not Found <?php else: ?> <?php echo e(\App\City::find($escort->suburb)->city); ?> <?php endif; ?></h4>
                                            </td>
                                            <td>
                                                <p>Male/female/trans/gay</p>
                                                <h4><?php if($escort->gender==1): ?> Male <?php elseif($escort->gender==2): ?> Female <?php else: ?> None <?php endif; ?></h4>
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
                                                <h4>Yes</h4>
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
             $pfabouts=\App\ProfileDescription::orderBy('id', 'desc')->where('escortId', $id)->where('status', 1)->first();

             if($aboutcnt->count()<1){
                $pfabout="Not Upload";
             }else{
                $pfabout=$pfabouts->description;
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
                                <div class="profile-about-contebnt">
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
                                            <?php echo e(implode(', ', explode(';T;', $service->service))); ?>

                                        <?php else: ?>
                                            <?php echo e($service->service); ?>

                                        <?php endif; ?>
                                    </li>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </ul>
                            </div>

       <?php 
       $srvccnt=\App\ProfileDescription::all()->where('escortId', $id)->where('status', 2);
             $pfservices=\App\ProfileDescription::orderBy('id', 'desc')->where('escortId', $id)->where('status', 2)->first();
           if($srvccnt->count()<1){
            $pfservice="No Upload";
           }else {
             $pfservice=$pfservices->description;
           }
      ?>        
                            <div class="col-lg-12">
                                <div class="profile-about-contebnt">
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
                                                    <td>$<?php echo e($rincall->price); ?></td>
                                                    <td><?php echo e($rincall->description); ?></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
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
     <?php 
       $pfincalls=\App\ProfileList::all()->where('escortId', $id)->where('status', 2);
      ?>       
                                                            <ul>
                                                                <?php $__currentLoopData = $pfincalls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $incall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><?php echo e($incall->description); ?> </li> 
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                               
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
                                                    <?php 
       $pfratesoutcalls=\App\ProfileRate::all()->where('escortId', $id)->where('status', 2);
      ?>       
                                            <tbody>
                                                <?php $__currentLoopData = $pfratesoutcalls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routcall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($routcall->time); ?></td>
                                                    <td>$<?php echo e($routcall->price); ?></td>
                                                    <td><?php echo e($routcall->description); ?></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
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
                                                         <?php 
       $pfoutcalls=\App\ProfileList::all()->where('escortId', $id)->where('status', 3);
      ?>       
                                                            <ul>
                                                                <?php $__currentLoopData = $pfoutcalls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $outcall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><?php echo e($outcall->description); ?> </li> 
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                               
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
                                                                <input type="checkbox" class="custom-control-input" id="customCheck11" name="example1" <?php if($pflineavail->available24 == 1): ?>checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck11">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
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
                                                            <?php 
                                                                $pfavails=\App\ProfileAvailability::get()->where('escortId', $id);
                                                            ?>
                                                            <ul>
                                                                <?php $__currentLoopData = $pfavails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $avail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><?php echo $avail->description; ?> </li> 
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                               
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


 

















                <section class="profile-tours-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="sec-title">
                                    <h3>Domestic tours</h3>
                                </div>


    <?php 
       $pflinetours=\App\ProfileTour::all()->where('escortId', $id)->where('status', 1);
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
                                                <td><?php echo e($pftour->city); ?></td>
                                                <td><?php echo e($pftour->startDate); ?> - <?php echo e($pftour->endDate); ?></td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <?php if($pftour->booked == "1"): ?>
                                                        <span id="cross-x">&#10006;</span>
                                                        <?php else: ?>
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="example1">
                                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </tbody>
                                    </table>
  <?php 
       $dtourcnt=\App\ProfileDescription::all()->where('escortId', $id)->where('status', 3);
             $pfdtours=\App\ProfileDescription::orderBy('id', 'desc')->where('escortId', $id)->where('status', 3)->first();
           if($dtourcnt->count()<1){
            $pfdtour="No Upload";
           }else {
             $pfdtour=$pfdtours->description;
           }
      ?>        

                                    <?php echo $pfdtour; ?>


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

    <?php 
       $pflineinttours=\App\ProfileTour::all()->where('escortId', $id)->where('status', 2);
      ?>       
                                             <?php $__currentLoopData = $pflineinttours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pfintlinetour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($pfintlinetour->city); ?></td>
                                                <td><?php echo e($pfintlinetour->startDate); ?> - <?php echo e($pfintlinetour->endDate); ?></td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <?php if($pfintlinetour->booked == 1): ?>
                                                        <span id="cross-x">&#10006;</span>
                                                        <?php else: ?>
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="example1">
                                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <?php 
       $inttourcnt=\App\ProfileDescription::all()->where('escortId', $id)->where('status', 4);
             $pfinttours=\App\ProfileDescription::orderBy('id', 'desc')->where('escortId', $id)->where('status', 4)->first();
           if($inttourcnt->count()<1){
            $pfinttour="No Upload";
           }else {
             $pfinttour=$pfinttours->description;
           }
      ?>        

                                    <?php echo $pfinttour; ?>

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

   <?php 
       $blogs=\App\Blog::all()->where('publishBy', $id)->where('status', 1);
      ?>                 <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="my-blog-box">
                                    <div class="blog-img">
                                        <img src="<?php echo e(asset('public/uploads/'.$blog->imageurl)); ?>" class="w-100" alt="blog-img"/>
                                    </div>
                                    <div class="blog-overview">
                                        <p class="post-date"><?php echo e($blog->created_at); ?></p>
                                        <h5><?php echo e($blog->title); ?></h5>
                                        
                                        <a href="#" class="read-fblog">Read full blog »</a>
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
                                    <!-- SMPEDIT 15-10-2020 -->
                                    <?php if($wish_lists->count() > 0): ?>
                                        <?php $__currentLoopData = $wish_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wish_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <img src="<?php echo e(asset('public/profile/'. $wish_list->image)); ?>" width="315px" />
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <!-- / SMPEDIT 15-10-2020 END -->
                                </ul> 
                            </div>
                        </div>
                    </div>
                </section>
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


                                     <?php 
       $testiminials=\App\ProfileBlog::all()->where('escortId', $id)->where('status', 3);
      ?>                          <?php $__currentLoopData = $testiminials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <li>
                                            <div class="testimonial-profile">
                          <img src="<?php echo e(asset('public/uploads/'.$testi->image)); ?>"class="img-fluid"/>
                                            </div>
                                            <div class="testimonial-content">
                                               <?php echo e($testi->title); ?><br>
                                                <a href="<?php echo e($testi->url); ?>" class="more-testimonial">Click here to read the full testimonials</a>
                                                <div class="testimonial-author">
                                                    <p>John, Sydny</p>
                                                    <p><?php echo e($testi->created_at); ?></p>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="subscription-mail-box">
                                <div class="subscription-icon">
                                    <img src="<?php echo e(asset('public/images/subscription-mail.png')); ?>" class="img-fluid" alt="subscribe mail"/> 
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

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.grid').isotope({
          layoutMode: 'masonryHorizontal',
          itemSelector: '.grid-item',
          masonryHorizontal: {
            rowHeight: 100
          }
        });

    });
</script>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/pages/profile.blade.php ENDPATH**/ ?>