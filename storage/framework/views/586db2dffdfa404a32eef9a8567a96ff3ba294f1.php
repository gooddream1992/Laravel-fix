<?php
$seo = array();
if (count($seo_text) > 0) {
    foreach ($seo_text as $value) {
        $val = isset($value->description) && $value->description != '' ? $value->description : '';
        if ($val != '')  {
            $seo = array(
                'seo' => $val
            );
        } else {
            $seo = array(
                'seo' => ''
            );
        }
    }
}
else {
    $seo = array(
        'seo' => ''
    );
}
$sss = $seo['seo'];

$current_url = url()->current();
$trim_url = ltrim($current_url,"https://honeydeve.alakmalak.ca/country");
$ex_url = explode("/",$trim_url);
?>
<?php $__env->startSection('title', __('Index')); ?>
<?php $__env->startSection('footer_description',$sss); ?>

<?php $__env->startSection('main'); ?>
    <section class="home-slider">
        <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <?php

                        $slider = \App\Slider::orderBy('id', 'desc')->where('category', 1)->first();
                        $slider1 = $slider->slider;
                        $slider2 = $slider->slider1;
                        $slider3 = $slider->slider2;

                    ?>
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
                                            <select class="form-control" name="country_id" id="selectCountry" onchange="getCities()">
                                                <?php $countries=\App\Country::all(); ?>
                                                
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($country_details->id); ?>" <?php echo e(($country_details->id == $country_id) ? 'selected' : ''); ?>>
                                                        <?php echo e($country_details->country); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </li> 

                                    
                                    <li>
                                        <div class="form-group">
                                            <select class="form-control" name="city_id" id="citySelect"> 
                                                <?php $cities = \App\State::where('country_id', $country_id)->get(); ?>

                                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($city->id); ?>">
                                                        <?php echo e($city->state); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </li> 

                                    
                                    <li>
                                        <div class="form-group">
                                            <select class="form-control" name="gender">
                                                <option value="">--Select Gender--</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Trans Gender</option>
                                                <option value="4">Gay</option>
                                            </select>
                                        </div>
                                    </li> 

                                    
                                    <li>
                                        <div class="form-group">
                                            
                                            <select class="form-control" name="service_type">
                                                <option value="">--Select Service Type--</option>
                                                <option value="1">Escort</option>
                                                <option value="2">BDSM</option>
                                                <option value="3">Massage</option>
                                            </select>
                                            
                                            
                                        </div>
                                    </li> 

                                    
                                    <li>
                                        <div class="form-group">
                                            <input name="keyword" type="text" class="form-control" placeholder="Keyword" />
                                        </div>
                                    </li> 

                                    
                                    <li class="custom-toggle">
                                        <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="touring_escorts_btn"
                                            onclick="customToggle('touring_escorts', 'touring_escorts_btn');">
                                                Touring Escorts
                                        </button>
                                        <input type="hidden" id="touring_escorts" name="touring_escorts" value="false" />
                                    </li> 

                                    
                                    <li class="custom-toggle">
                                        <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="with_reviews_btn"
                                            onclick="customToggle('with_reviews', 'with_reviews_btn');">
                                                Reviews
                                        </button>
                                        <input type="hidden" id="with_reviews" name="with_reviews" value="false" />
                                    </li> 

                                    
                                    <li class="custom-toggle">
                                        <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="couples_service_btn"
                                            onclick="customToggle('couples_service', 'couples_service_btn');">
                                                Couples Service
                                        </button>
                                        <input type="hidden" id="couples_service" name="couples_service" value="false" />
                                    </li> 

                                    
                                    <li class="custom-toggle">
                                        <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="available_now_btn"
                                            onclick="customToggle('available_now', 'available_now_btn');">
                                                Available Now
                                        </button>
                                        <input type="hidden" id="available_now" name="available_now" value="false" />
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
    <section class="advance-search-section thin m-visible desk-hidden">
        <div class="container">
            <div class="row justify-content-lg-center justify-content-md-center ">
                <div class="col-lg-12">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                    Listing Search <i class="fas fa-chevron-down right"></i>
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="advance-search-sec-form">
                                        <form method="POST" action="<?php echo e(url('filter/search/escort')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-box">
                                                <ul class="fields">
                                                    
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="country_id" id="selectCountry" onchange="getCities()">
                                                                <?php $countries=\App\Country::all(); ?>
                                                                
                                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($country_details->id); ?>" <?php echo e(($country_details->id == $country_id) ? 'selected' : ''); ?>>
                                                                        <?php echo e($country_details->country); ?>

                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </li> 
                                                    
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="city_id" id="citySelectMob"> 
                                                                <?php $cities = \App\State::where('country_id', $country_id)->get(); ?>
                                                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($city->id); ?>">
                                                                        <?php echo e($city->state); ?>

                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </li> 
                                                    
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="gender">
                                                                <option value="">--Select Gender--</option>
                                                                <option value="1">Male</option>
                                                                <option value="2">Female</option>
                                                                <option value="3">Trans Gender</option>
                                                                <option value="4">Gay</option>
                                                            </select>
                                                        </div>
                                                    </li> 
                                                    
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="service_type">
                                                                <option value="">--Select Service Type--</option>
                                                                <option value="1">Escort</option>
                                                                <option value="2">BDSM</option>
                                                                <option value="3">Massage</option>
                                                            </select>
                                                        </div>
                                                    </li> 
                                                    
                                                    <li>
                                                        <div class="form-group">
                                                            <input name="keyword" type="text" class="form-control" placeholder="Keyword" />
                                                        </div>
                                                    </li> 
                                                    
                                                    <li class="custom-toggle">
                                                        <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="touring_escorts_btn_mob"
                                                            onclick="customToggle('touring_escorts', 'touring_escorts_btn_mob');">
                                                                Touring Escorts
                                                        </button>
                                                        <input type="hidden" id="touring_escorts" name="touring_escorts" value="false" />
                                                    </li> 
                                                    
                                                    <li class="custom-toggle">
                                                        <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="with_reviews_btn_mob"
                                                            onclick="customToggle('with_reviews', 'with_reviews_btn_mob');">
                                                                Reviews
                                                        </button>
                                                        <input type="hidden" id="with_reviews" name="with_reviews" value="false" />
                                                    </li> 
                                                    
                                                    <li class="custom-toggle">
                                                        <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="couples_service_btn_mob"
                                                            onclick="customToggle('couples_service', 'couples_service_btn_mob');">
                                                                Couples Service
                                                        </button>
                                                        <input type="hidden" id="couples_service" name="couples_service" value="false" />
                                                    </li> 
                                                    
                                                    <li class="custom-toggle">
                                                        <button type="button" class="btn btn-danger custom-toggle-btn mb-3 w-100" id="available_now_btn_mob"
                                                            onclick="customToggle('available_now', 'available_now_btn_mob');">
                                                                Available Now
                                                        </button>
                                                        <input type="hidden" id="available_now" name="available_now" value="false" />
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
                    </div>
                </div>
            </div>
        </div>
    </section>
      

    
                <?php
                    $escorts = \App\User::where([['roleStatus', 2], ['country', $country_id], ['request', '=', 1]])->get();
                ?>
    <section class="home-escorts m-visible desk-hidden">
        <div class="container">
            <div class="row escort-row">
                <div class="escort-data"></div>
                <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $name = str_replace(" ","-",$escort->name);
                ?>
                <div class="col-lg-3 col-6 escort-hide-show">
                    <div class="our-escort-box is-available" onclick="$('.escort-overview-detail').hide(); $('.'+<?php echo e($escort->id); ?>).show();">
                       <?php
                        $profile_image = NULL;
                        $profile_image_arr = DB::table('profile_images')->where('status','5')->where('escortId',$escort->id)->get();
                        if(count($profile_image_arr) > 0)
                        {
                            $profile_image = $profile_image_arr[0]->image;
                        }
                       ?>
                        <?php if($profile_image==NULL): ?>
                            <img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100 fix-es-box"> 
                        <?php else: ?>  
                            <img src="<?php echo e(asset('public/uploads/'.$profile_image)); ?>" class="w-100 fix-es-box"/><?php endif; ?>

                        <div class="overlay-top">
                            <div class="text">
                                <h4><?php echo e($escort->name); ?></h4>
                                <span class="location">
                                    <?php echo e(isset($escort->state) ? $escort->state : ''); ?>

                                    <!-- <?php if(!isset($escort->city)): ?>
                                        
                                    <?php else: ?>
                                        <?php echo e($escort->state); ?>

                                    <?php endif; ?> -->                                            	
                                    </span>
                            </div>
                        </div>
                        <div class="availability">
                            <?php if(isset($escort->activation) && $escort->activation == 1): ?>
                                <h5>
                                    Available Now
                                </h5>
                            <?php endif; ?>
                        </div>                                
                    </div>
                </div>
                <?php if($key!='0' && $key % 2 != 0): ?>
                    <div class="escort-overview-detail left-detail-arrow <?php echo e($escorts[$key-1]->id); ?>" style="display: none">
                        <div class="escort-box">
                            <div class="box-head">
                                <h4><?php echo e($escorts[$key-1]->name); ?></h4>
                                
                            </div>
                            <table class="escort-profile-details">
                                <tr>
                                    <td>Suburb</td>
                                    <td>
                                        <?php echo e(isset($escorts[$key-1]->city) ? $escorts[$key-1]->city : ''); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Service Area</td>
                                    <td>
                                        <?php if($escorts[$key-1]->serviceArea==1): ?>
                                            In Call
                                        <?php elseif($escorts[$key-1]->serviceArea==2): ?>
                                            Out Call
                                        <?php elseif($escorts[$key-1]->serviceArea==3): ?>
                                            In call & Out Call
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <?php
                                        $profile_Rate_one = \App\ProfileRate::where('escortId','=',$escorts[$key-1]->id)->where('price','!=','')->get();
                                        $profile_Rate_both = \App\ProfileRate::where('escortId','=',$escorts[$key-1]->id)->where('price','!=','')->select('price')->get();
                                        if(!empty($profile_Rate_both->toArray())){
                                            $profile_Rate_both = min(json_decode(json_encode(($profile_Rate_both)),true));
                                        }
                                        
                                    ?>
                                    <td>
                                        <?php if(count($profile_Rate_one) < 2): ?>
                                            <?php $__currentLoopData = $profile_Rate_one; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($val->price); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        
                                        <?php if(count($profile_Rate_one) > 1): ?>
                                            <?php echo e(!empty($profile_Rate_both['price']) ? $profile_Rate_both['price'] : ''); ?>

                                        <?php endif; ?>
                                        PH
                                    </td>
                                </tr>
                                <tr>
                                    <td>Height</td>
                                    <td><?php echo e($escorts[$key-1]->height); ?> "</td>
                                </tr>
                            </table>
                            <div class="profile-action">
                                <a href="<?php echo e('/profile/'.$escorts[$key-1]->id.'/'.str_replace(' ','-',$escorts[$key-1]->name)); ?>" class="btn btn-block red-small mt-2"> Visit Profile </a>
                            </div>
                        </div>
                    </div>
                    <div class="escort-overview-detail right-detail-arrow <?php echo e($escorts[$key]->id); ?>" style="display: none">
                        <div class="escort-box">
                            <div class="box-head">
                                <h4><?php echo e($escorts[$key]->name); ?></h4>
                                
                            </div>
                            <table class="escort-profile-details">
                                <tr>
                                    <td>Suburb</td>
                                    <td>
                                        <?php echo e(isset($escorts[$key]->city) ? $escorts[$key]->city : ''); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Service Area</td>
                                    <td>
                                        <?php if($escorts[$key]->serviceArea==1): ?>
                                            In Call
                                        <?php elseif($escorts[$key]->serviceArea==2): ?>
                                            Out Call
                                        <?php elseif($escorts[$key]->serviceArea==3): ?>
                                            In call & Out Call
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <?php
                                        $profile_Rate_one = \App\ProfileRate::where('escortId','=',$escorts[$key]->id)->where('price','!=','')->get();
                                        $profile_Rate_both = \App\ProfileRate::where('escortId','=',$escorts[$key]->id)->where('price','!=','')->select('price')->get();
                                        if(!empty($profile_Rate_both->toArray())){
                                            $profile_Rate_both = min(json_decode(json_encode(($profile_Rate_both)),true));
                                        }
                                        
                                    ?>
                                    <td>
                                        <?php if(count($profile_Rate_one) < 2): ?>
                                            <?php $__currentLoopData = $profile_Rate_one; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($val->price); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        
                                        <?php if(count($profile_Rate_one) > 1): ?>
                                            <?php echo e(!empty($profile_Rate_both['price']) ? $profile_Rate_both['price'] : ''); ?>

                                        <?php endif; ?>
                                        PH
                                    </td>
                                </tr>
                                <tr>
                                    <td>Height</td>
                                    <td><?php echo e($escorts[$key]->height); ?> "</td>
                                </tr>
                            </table>
                            <div class="profile-action">
                                <a href="<?php echo e('/profile/'.$escorts[$key]->id.'/'.str_replace(' ','-',$escorts[$key]->name)); ?>" class="btn btn-block red-small mt-2"> Visit Profile </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <section class="home-escorts m-hidden">
        <div class="container">
            <div class="row escort-row">
                <div class="escort-data"></div>
                <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $name = str_replace(" ","-",$escort->name);
                ?>
                <div class="col-lg-3 col-6 escort-hide-show">
                     <a href="<?php echo e(url('/profile/'.$escort->id.'/'.$name)); ?>">
                    <div class="our-escort-box is-available">
                       <?php
                        $profile_image = NULL;
                        $profile_image_arr = DB::table('profile_images')->where('status','5')->where('escortId',$escort->id)->get();
                        if(count($profile_image_arr) > 0)
                        {
                            $profile_image = $profile_image_arr[0]->image;
                        }
                       ?>
                        <?php if($profile_image==NULL): ?>
                            <img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100 fix-es-box"> 
                        <?php else: ?>  
                            <img src="<?php echo e(asset('public/uploads/'.$profile_image)); ?>" class="w-100 fix-es-box"/><?php endif; ?>

                        <div class="overlay-top">
                            <div class="text">
                                <h4><?php echo e($escort->name); ?></h4>
                                <span class="location">
                                    <?php echo e(isset($escort->state) ? $escort->state : ''); ?>

                                    <!-- <?php if(!isset($escort->city)): ?>
                                        
                                    <?php else: ?>
                                        <?php echo e($escort->state); ?>

                                    <?php endif; ?> -->                                            	
                                    </span>
                            </div>
                        </div>
                        <div class="overlay-bottom bottom-without-tour">
                            <div class="text">                                        
                                <table class="escort-profile-details">
                                    <tr>
                                        <td>Suburb</td>
                                        <td>
                                            <?php echo e(isset($escort->city) ? $escort->city : ''); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Service Area</td>
                                        <td>
                                            <?php if($escort->serviceArea==1): ?>
                                                In Call
                                            <?php elseif($escort->serviceArea==2): ?>
                                                Out Call
                                            <?php elseif($escort->serviceArea==3): ?>
                                                In call & Out Call
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <?php
                                            $profile_Rate_one = \App\ProfileRate::where('escortId','=',$escort->id)->where('price','!=','')->get();
                                            $profile_Rate_both = \App\ProfileRate::where('escortId','=',$escort->id)->where('price','!=','')->select('price')->get();
                                            if(!empty($profile_Rate_both->toArray())){
                                                $profile_Rate_both = min(json_decode(json_encode(($profile_Rate_both)),true));
                                            }
                                            
                                        ?>
                                        <td>
                                            <?php if(count($profile_Rate_one) < 2): ?>
                                                <?php $__currentLoopData = $profile_Rate_one; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e($val->price); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            
                                            <?php if(count($profile_Rate_one) > 1): ?>
                                                <?php echo e(!empty($profile_Rate_both['price']) ? $profile_Rate_both['price'] : ''); ?>

                                            <?php endif; ?>
                                            PH
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Height</td>
                                        <td><?php echo e($escort->height); ?> "</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        
                        <div class="availability">
                            <?php if(isset($escort->activation) && $escort->activation == 1): ?>
                                <h5>
                                    Available Now
                                </h5>
                            <?php endif; ?>
                        </div>                                
                    </div>
                </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    
    <?php $indpnts= \App\Independent::all(); ?>
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
                                    <li><a href="<?php echo e(url('/client/membership')); ?>" class="btn black-btn">Client register</a></li>
                                    <li><a href="<?php echo e(url('bacome/escort')); ?>" class="btn black-btn">escort register</a></li>
                                    <!-- <li><a href="<?php echo e(url('escort/signup')); ?>" class="btn black-btn">escort register</a></li> -->
                                   <!--  <li><a href="<?php echo e(url('/')); ?>" class="btn black-btn">Find Out More</a></li> -->
                                </ul>
                               <!--  <p><a href="<?php echo e(url('terms/condition')); ?>">Click here</a> to read why you should join with us</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <section class="home-service-provider">
        <div class="container">
            <?php $provresrcs= \App\ProviderResource::all(); ?>
            <div class="row justify-content-lg-center justify-content-md-center ">
                <div class="col-lg-8">
                    <?php $__currentLoopData = $provresrcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resourc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="box-title c-center">
                            <h2><?php echo e($resourc->titleHead); ?></h2>
                            
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

    <?php $professionals= \App\Professional::all(); ?>
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
                            <a href="<?php echo e(url('multi/page?url=mul-reviews&country='.$ex_url[0])); ?>">
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
                            <a href="<?php echo e(url('multi/page?url=mul-tours&country='.$ex_url[0])); ?>">
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
                            <a href="<?php echo e(url('multi/page?url=mul-blogs&country='.$ex_url[0])); ?>">
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
                            <a href="<?php echo e(url('multi/page?url=mul-client-logs&country='.$ex_url[0])); ?>">
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
                            <?php 
                                $hedfoots=\App\HeaderFooter::orderBy('id','desc')->first(); 
                                $footerinfo= $hedfoots->footerInfo;
                                $footerlogo= $hedfoots->footerLogo;
                            ?>

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
                                            <a href="<?php echo e(url('bacome/escort')); ?>" class="btn black-btn">Escort sign up</a>
                                            <a href="<?php echo e(url('client/membership')); ?>" class="btn black-btn">Client sign up</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 c-center">
                                        <div class="red-box-inner">
                                            <img src="<?php echo e(asset('public/uploads/search-xlarge-icon.png')); ?>" />
                                      
                                            <button class="btn black-btn "  data-toggle="modal" data-target="#social-media-popup">Social Media</button>
                                            <button class="btn black-btn"  data-toggle="modal" data-target="#contact-blog">Blog for Us</button>
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
                <?php $abouts= \App\About::all(); ?>
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
    

    
    <section class="home-locations gray-bg">
        <div class="container">
            <div class="row justify-content-lg-center justify-content-md-center ">
                <div class="col-lg-8">
                        <?php $hedfoots = \App\HeaderFooter::orderBy('id', 'desc')->first();
                        $footerinfo = $hedfoots->footerInfo; ?>

                    <div class="box-title c-center">
                        <h2>Locations</h2>
                        <p><?php echo e($footerinfo); ?></p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-lg-center justify-content-md-center justify-content-center">
            <?php // $country=\App\Country::all(); ?>
                <?php $__currentLoopData = $countries_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cntry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="location-box">
                        <?php if($cntry->image==NULL): ?>
                            <img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss>
                        <?php else: ?>
                            <img src="<?php echo e(asset('public/uploads/'.$cntry->image)); ?>" class="w-100"/>
                        <?php endif; ?>
                        <a href="<?php echo e(url('country/'.$country.'/'.str_replace(' ','-',$cntry->state))); ?>" class="city-btn"><?php echo e($cntry->state); ?></a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <div class="col-lg-12 view-more-area c-center ">
                    <button class="btn black-btn"  data-toggle="modal" data-target="#citySearch">view more cities</button> 
                </div>
            </div>
        </div>
    </section> 

    
        
    
    <script>
        $(document).ready(function(){
            var selectCountry = $("#selectCountry").val();
            $.ajax({
                url:"<?php echo e(route('country.list.escort.statelist')); ?>",
                    type:"POST",
                    data:{
                                "_token": "<?php echo e(csrf_token()); ?>",
                                country:selectCountry,
                    },
                        success: function(data) {
                            $("#state").html(data); 
                        }
            });
            $('#selectCountry').on('change', function(country) {
                var selectCountry =  this.value; 
                $.ajax({
                    url:"<?php echo e(route('country.list.escort.statelist')); ?>",
                    type:"POST",
                    data:{
                                "_token": "<?php echo e(csrf_token()); ?>",
                                country:selectCountry,
                    },
                        success: function(data) {
                            $("#state").html(data); 
                        }
                });
            });

            $("#state").on('change',function(city){
                var state = this.value;
                $.ajax({
                    url:"<?php echo e(route('country.list.escort.citylist')); ?>",
                    type:"POST",
                    data:{
                                "_token": "<?php echo e(csrf_token()); ?>",
                                state:state,
                    },
                        success: function(data) {
                            $("#city").html(data); 
                        }
                });
            });
        });
    </script>       
<?php $__env->stopSection(); ?>

<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/pages/countryListEscort.blade.php ENDPATH**/ ?>