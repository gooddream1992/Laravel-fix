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



        
        <style>
            .custom-toggle > button {
                border-radius: 4px !important;
                padding: 9px 15px !important;
                background: #f8150a !important;
                color: white !important;
                font-weight: 600 !important;
                text-transform: uppercase !important;
                font-size: 14px !important;
            }
            .custom-toggle > .active {
                background: white !important;
                color: #f8150a !important; 
            }
            /* SMPEDIT 15-10-2020 */
            .carousel-control-prev,
            .carousel-control-next {
                padding: 0px !important;
                border: none !important;
                background: transparent;
            }
            .carousel-control-prev-icon,
            .carousel-control-next-icon {
                /* margin-top: 2px; */
            }
            /* SMPEDIT 15-10-2020 END */
        </style>
        

        
        <script>
            function customToggle(field) {
                let inputField = document.getElementById(field)
                inputField.value = (inputField.value == 'false') ? true : false
            }

            document.addEventListener("DOMContentLoaded", function(){
                getCities()
                getCities2()
            })

            function getCities() {
                $.ajax({
                    url: "<?php echo e(route('get_cities')); ?>",
                    method: 'GET',
                    data: {
                        'country_id': $('#selectCountry').find(':selected').val()
                    },
                    success: function (data) {
                        let cityId = undefined
                        <?php if(session()->has('city_id')): ?>
                            cityId = <?php echo e(session()->get('city_id')); ?>

                        <?php endif; ?>
                        $('#citySelect').text(' ');
                        $('#citySelect').append('<option value="" selected>--Select City--</option>');
                        for (var k = 0; k < data.cities.length; k++) {
                            if (cityId == undefined) {
                                $('#citySelect').append('<option value="' + data.cities[k].id + '">' + data.cities[k].city + '</option>');
                            } else {
                                // let selected = ''
                                // if (cityId == data.cities[k].id) {
                                //     selected = 'selected'
                                // } 
                                $('#citySelect').append('<option value="' + data.cities[k].id + '" >' + data.cities[k].city + '</option>');
                                // $('#citySelect').append('<option value="' + data.cities[k].id + '"' + selected +'>' + data.cities[k].city + '</option>');
                            }
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                })
            } 

            function getCities2() {
                $.ajax({
                    url: "<?php echo e(route('get_cities')); ?>",
                    method: 'GET',
                    data: {
                        'country_id': $('#selectCountry2').find(':selected').val()
                    },
                    success: function (data) {
                        let cityId = undefined
                        <?php if(session()->has('city_id')): ?>
                            cityId = <?php echo e(session()->get('city_id')); ?>

                        <?php endif; ?>
                        $('#citySelect2').text(' ');
                        $('#citySelect2').append('<option value="">--Select City--</option>');
                        for (var k = 0; k < data.cities.length; k++) {
                            if (cityId == undefined) {
                                $('#citySelect2').append('<option value="' + data.cities[k].id + '">' + data.cities[k].city + '</option>');
                            } else {
                                // let selected = ''
                                // if (cityId == data.cities[k].id) {
                                //     selected = 'selected'
                                // } 
                                $('#citySelect2').append('<option value="' + data.cities[k].id + '">' + data.cities[k].city + '</option>');
                                // $('#citySelect2').append('<option value="' + data.cities[k].id + '"' + selected +'>' + data.cities[k].city + '</option>');
                            }
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                })
            } 
        </script>
        
    </head>



    <body>



        
 <?php echo $__env->make('frontend.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.includes.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        

        

        <!-- Header END -->

       














   



   <?php
            $caroselescorts= \App\User::
            join('profile_images','users.id','profile_images.escortId')
            ->select('*')
            ->where('users.roleStatus', 2)
            ->where('profile_images.status', 1)
            ->orderBy('users.id','desc')
            ->get()
            ->unique('id');
   ?>


                       

        <!-- Content -->

        <div id="content">

             

          <section>

                <div id="listingCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php $__currentLoopData = $caroselescorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caro_key_img => $caro_img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item <?=($caro_key_img==0) ? 'active' : ''?>" style="background-image: url('<?php echo e(asset('public/uploads/'.$caro_img->image)); ?>');background-size: cover;background-position: center center;background-repeat: no-repeat;">
                       
                        </div>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php 
                    $total_caro = count($caroselescorts);
                    $count = 1;
                    ?>
                    <?php $__currentLoopData = $caroselescorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caro_key => $caro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div id="<?php echo e($caro->id); ?>" class="whole-table">
                        <?php
                        $data_id_next = ($count < $total_caro) ? $caroselescorts[$count]->id : $caroselescorts[0]->id;
                        $data_id_prev_next = isset($data_id_prev_next) && $data_id_prev_next !='' ? $data_id_prev_next : $caroselescorts[$total_caro-1]->id;
                        ?>
                        <button class="carousel-control-prev" href="#listingCarousel" data-id="<?=$data_id_prev_next?>" onclick="changeInfo(<?=$data_id_prev_next?>)" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only"></span>
                        </button>
                        <?php
                        $data_id_prev_next = ($count-1 < $total_caro) ? $caroselescorts[$count-1]->id : $caroselescorts[$total_caro-1]->id;
                        ?>
                        <button class="carousel-control-next" href="#listingCarousel" data-id="<?=$data_id_next?>" onclick="changeInfo(<?=$data_id_next?>);" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                        <div class="container m-hidden">
                             
                            <a href="<?php echo e(url('profile-guest/'.$caro->id)); ?>" class="btn btn-view-profile">View Profile</a> 
                        </div>
                        <div class="group-buttons profile-visiblity-btn">
                            <div class="btn-group-toggle">
                                
                                <label class="btn btn-secondary info info-btn pb-2" data-id="<?php echo e($caro->id); ?>" style="height: 45px">Info</label>
                            </div>
                            <a href="<?php echo e(url('profile/'.$caro->id)); ?>" class="btn btn-view-profile m-visible desk-hidden">View Profile</a>
                        </div>


                        <div class="profile-banner-detail" style="display: none;" id="profileBanner<?php echo e($caro->id); ?>">
                            <h3><?php echo e($caro->name); ?></h3>
                            <h5><?php // $citycount=\App\City::all()->where('id', $caro->suburb);?>
                               <?php if($caro->suburb==''): ?> Not Found <?php else: ?> <?php echo e($caro->suburb); ?> <?php endif; ?></h5>
                            <table class="escort-profile-details" >
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
                    </div>
                     <?php $count++; ?>
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
                                                    <select class="form-control" name="country_id" onchange="getCities()" id="selectCountry">
                                                        <?php 
                                                            $countries = \App\Country::all(); 
                                                            $country_id = null;
                                                            if (session()->has('country_id')) $country_id = session()->get('country_id');
                                                        ?>

                                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($country->id); ?>"
                                                                <?php echo e((!is_null($country_id) && $country_id == $country->id) ? 'selected' : ''); ?>>
                                                                <?php echo e($country->country); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </li> 

                                            
                                            <li>
                                                <div class="form-group">
                                                    <select class="form-control" name="city_id" id="citySelect" value="2807"> 
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </li> 

                                            
                                            <li>
                                                <?php
                                                    $gender = '';
                                                    if(session()->has('gender')) $gender = session()->get('gender');
                                                ?>
                                                <div class="form-group">
                                                    <select class="form-control" name="gender">
                                                        <option value="">--Select Gender--</option>
                                                        <option value="1" <?php echo e((!empty($gender) && $gender == 1) ? 'selected' : ''); ?>>Male</option>
                                                        <option value="2" <?php echo e((!empty($gender) && $gender == 2) ? 'selected' : ''); ?>>Female</option>
                                                        <option value="3" <?php echo e((!empty($gender) && $gender == 3) ? 'selected' : ''); ?>>Trans Gender</option> 
                                                        <option value="4" <?php echo e((!empty($gender) && $gender == 4) ? 'selected' : ''); ?>>Gay</option>
                                                    </select>
                                                </div>
                                            </li> 

                                            
                                            <li>
                                                <div class="form-group">
                                                    
                                                    
                                                    <select class="form-control" name="service_type">
                                                        <option value="">--Select Service--</option>
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
                                                <button type="button" class="btn btn-danger mb-3 w-100" data-toggle="button" aria-pressed="false" 
                                                    onclick="customToggle('touring_escorts');">
                                                    Touring Escorts
                                                </button>
                                                <input type="hidden" id="touring_escorts" name="touring_escorts" value="false" />
                                            </li> 

                                            
                                            <li class="custom-toggle">
                                                <button type="button" class="btn btn-danger mb-3 w-100" data-toggle="button" aria-pressed="false" 
                                                    onclick="customToggle('with_reviews');">
                                                    Reviews
                                                </button>
                                                <input type="hidden" id="with_reviews" name="with_reviews" value="false" />
                                            </li> 
   
                                            
                                            <li class="custom-toggle">
                                                <button type="button" class="btn btn-danger mb-3 w-100" data-toggle="button" aria-pressed="false"
                                                    onclick="customToggle('couples_service');">
                                                    Couples Service
                                                </button>
                                                <input type="hidden" id="couples_service" name="couples_service" value="false" />
                                            </li> 

                                            
                                            <li class="custom-toggle">
                                                <button type="button" class="btn btn-danger mb-3 w-100" data-toggle="button" aria-pressed="false"
                                                    onclick="customToggle('available_now');">
                                                    Available Now
                                                </button>
                                                <input type="hidden" id="available_now" name="available_now" value="false" />
                                            </li> 

                                            
                                            <li>
                                                <div class="form-group">
                                                    <button type="submit" class="btn red-small btn-block">Search</button>
                                                </div>
                                            </li> 

                                        </ul>

                                        
                                        <button type="button" class="btn red-small btn-advance-search" data-toggle="modal" data-target="#advanceSearch">
                                            Advanced search 
                                        </button>

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
                             
                            <a href="<?php echo e(url('profile-guest/'.$escort->id)); ?>"> 
                            <div class="our-escort-box is-available">
                               
                                <?php if($escort->photo==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height:235px;" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$escort->photo)); ?>" style="height: auto;" class="w-100"/><?php endif; ?>

                                <div class="overlay-top">
                                    <div class="text">
                                        <h4><?php echo e($escort->name); ?></h4>
                                        <span class="location"><?php $statecount=\App\State::all()->where('id', $escort->state);?><?php if($statecount->count()<1): ?> Not Found <?php else: ?> <?php echo e(\App\State::find($escort->state)->state); ?> <?php endif; ?></span>
                                    </div>
                                </div>
                                <div class="overlay-bottom">
                                    <div class="text">
                                        <table class="escort-profile-details">
                                            <tr>
                                                <td>Suburb</td>
                                                <td>
                                                    <?php // $citycount=\App\City::all()->where('id', $escort->suburb);?>
                           <?php if($escort->city==''): ?> Not Found <?php else: ?> <?php echo e($escort->city); ?> <?php endif; ?></td>
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
                                    <li><a href="<?php echo e(url('/client/membership')); ?>" class="btn black-btn">Client register</a></li>
                                    <li><a href="<?php echo e(url('bacome/escort')); ?>" class="btn black-btn">escort register</a></li>
                                    <!-- <li><a href="#" class="btn black-btn">Find Out More</a></li> -->
                                </ul>
                                <!-- <p><a href="">Click here</a> to read why you should join with us</p> -->
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
                                <?php if($resourc->icon1==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height:235px;" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$resourc->icon1)); ?>" style="height:235px;" class="w-100"/><?php endif; ?>
                                
                                <h4><?php echo e($resourc->title1); ?></h4>
                            </div>
                        </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $provresrcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resourc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                             <a href="<?php echo e(url('local/resources')); ?>">
                            <div class="service-provider-box">
                                <?php if($resourc->icon2==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height:235px;" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$resourc->icon2)); ?>" style="height:235px;" class="w-100"/><?php endif; ?>
                                
                                <h4><?php echo e($resourc->title2); ?></h4>
                            </div>
                             </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                       

                          <?php $__currentLoopData = $provresrcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resourc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                             <a href="<?php echo e(url('purchase/marketing')); ?>">
                            <div class="service-provider-box">
                                <?php if($resourc->icon3==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height:235px;" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$resourc->icon3)); ?>" style="height:235px;" class="w-100"/><?php endif; ?>
                                
                                <h4><?php echo e($resourc->title3); ?></h4>
                            </div>
                             </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                           <?php $__currentLoopData = $provresrcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resourc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                             <a href="<?php echo e(url('bacome/escort')); ?>">
                            <div class="service-provider-box">
                                <?php if($resourc->icon4==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height:235px;" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$resourc->icon4)); ?>" style="height:235px;" class="w-100"/><?php endif; ?>
                                
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
                                <p><?php echo $professonal->intro; ?></p>
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
                                        <?php if($professonal->icon1==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height:235px;" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon1)); ?>" style="height:235px;" class="w-100"/><?php endif; ?>
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
                                        <?php if($professonal->icon2==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height:235px;" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon2)); ?>" style="height:235px;" class="w-100"/><?php endif; ?>
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
                                        <?php if($professonal->icon3==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height:235px;" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon3)); ?>" style="height:235px;" class="w-100"/><?php endif; ?>
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
                                        <?php if($professonal->icon4==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height:235px;" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon4)); ?>" style="height:235px;" class="w-100"/><?php endif; ?>
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
                                        <?php if($professonal->icon5==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height:235px;" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon5)); ?>" style="height:235px;" class="w-100"/><?php endif; ?>
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
                                        <?php if($professonal->icon6==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height:235px;" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon6)); ?>" style="height:235px;" class="w-100"/><?php endif; ?>
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
                                        <?php if($professonal->icon7==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height:235px;" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon7)); ?>" style="height:235px;" class="w-100"/><?php endif; ?>
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
                            <a href="<?php echo e(url('faq')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon8==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height:235px;" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon8)); ?>" style="height:235px;" class="w-100"/><?php endif; ?>
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
                                        <?php if($professonal->icon9==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height:235px;" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon9)); ?>" style="height:235px;" class="w-100"/><?php endif; ?>
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
                                            <a href="<?php echo e(url('/client/membership')); ?>" class="btn black-btn">Escort sign up</a>
                                            <a href="<?php echo e(url('bacome/escort')); ?>" class="btn black-btn">Client sign up</a>
                                            <!-- <button class="btn black-btn">Escort sign up</button> -->
                                            <!-- <button class="btn black-btn">Client sign up </button> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 c-center">
                                        <div class="red-box-inner">
                                            <img src="<?php echo e(asset('public/uploads/search-xlarge-icon.png')); ?>" />
                                            <!-- <button class="btn black-btn height-btn"  data-toggle="modal" data-target="#citySearch">City Full<br>Search</button> -->
                                            <button class="btn black-btn " data-toggle="modal" data-target="#social-media-popup">Social Media</button>
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
                   <?php $state=\App\State::limit(50)->get();?>
                        <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="location-box">
                                <?php if($state->image==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$state->image)); ?>" class="w-100"/><?php endif; ?>
                                <a href="<?php echo e(url('country/list/escort/'.$state->country_id)); ?>" class="state-btn"><?php echo e($state->state); ?></a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        
                    </div>
                </div>
            </section>


        </div>







        <!-- Modal -->

      <!--   <div class="modal fade" id="social-media-popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

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

        </div> -->

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

                        <h5 class="modal-title" id="exampleModalLabel">Advanced Search</h5> 

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

                                                        <select class="form-control" name="country_id" onchange="getCities2()" id="selectCountry2">
                                                        <?php $countries=\App\Country::all();?>
                                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($country->id); ?>"
                                                                <?php echo e((!is_null($country_id) && $country_id == $country->id) ? 'selected' : ''); ?>>
                                                                <?php echo e($country->country); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>

                                                        </div>

                                                    </li> 

                                                    <li>

                                                        <?php
                                                        $gender = '';
                                                            if(session()->has('gender')) $gender = session()->get('gender');
                                                        ?>
                                                        <div class="form-group">
                                                            <select class="form-control" name="gender">
                                                                <option value="">--Select Gender--</option>
                                                                <option value="1" <?php echo e((!empty($gender) && $gender == 1) ? 'selected' : ''); ?>>Male</option>
                                                                <option value="2" <?php echo e((!empty($gender) && $gender == 2) ? 'selected' : ''); ?>>Female</option>
                                                                <option value="3" <?php echo e((!empty($gender) && $gender == 3) ? 'selected' : ''); ?>>Trans Gender</option> 
                                                                <option value="4" <?php echo e((!empty($gender) && $gender == 4) ? 'selected' : ''); ?>>Gay</option>
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
                                                    <select class="form-control" name="state_id" onchange="selectstate()" id="citySelect2">
                                                        <option></option>
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

                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" value="<?php echo e($service->id); ?>" class="custom-control-input" id="customCheck1<?php echo e($service->id); ?>" name="example1">
                                                    <label class="custom-control-label" for="customCheck1<?php echo e($service->id); ?>">
                                                        <?php echo e($service->service); ?>

                                                    </label>
                                                </div>
                                            </li>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            

                                        </ul>

                                    </div>

                                    <div class="col-lg-6 c-center">

                                        <div class="search-availability-bar equal-btns ">

                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Agency</button>

                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Independent</button>

                                            <!--<button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Establishment</button>--> 

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
                    <?php $hedfoots=\App\HeaderFooter::orderBy('id','desc')->first(); 
                                 $footerlogo= $hedfoots->footerLogo;
                                 $facebook= $hedfoots->facebook;
                                 $facebookurl= $hedfoots->facebookurl;
                                 $youtube= $hedfoots->youtube;
                                 $youtubeurl= $hedfoots->youtubeurl;
                                 $linkedin= $hedfoots->linkedin;
                                 $linkedinurl= $hedfoots->linkedinurl;
                                 $instagram= $hedfoots->instagram;
                                 $instagramurl= $hedfoots->instagramurl;
                                 $tweeter= $hedfoots->tweeter;
                                 $tweeterurl= $hedfoots->tweeterurl;
                                 $footerinfo= $hedfoots->footerInfo;
                                 $copyrights= $hedfoots->copyrights;

                                 ?>
                    <div class="modal-body">
                        <div class="social-modal-content c-center">
                            <div class="logo c-center"><img src="<?php echo e(asset('public/uploads/'.$footerlogo)); ?>" /></div>
                            <h3><?php echo e($footerinfo); ?></h3>
                            <h6>Our Platforms are here to support you</h6>
                            <ul class="">
                                <li><a href="<?php echo e($facebookurl); ?>"><img src="<?php echo e(asset('public/uploads/'.$facebook)); ?>" /></a></li>
                            <li><a href="<?php echo e($tweeterurl); ?>"><img src="<?php echo e(asset('public/uploads/'.$tweeter)); ?>" /></a></li>
                            <li><a href="<?php echo e($linkedinurl); ?>"><img src="<?php echo e(asset('public/uploads/'.$linkedin)); ?>" /></a></li>
                            <li><a href="<?php echo e($youtubeurl); ?>"><img src="<?php echo e(asset('public/uploads/'.$youtube)); ?>" /></a></li>
                            <li><a href="<?php echo e($instagramurl); ?>"><img src="<?php echo e(asset('public/uploads/'.$instagram)); ?>" /></a></li>
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
            $(document).ready(function(){
                $(".info-btn").click(function(){
                    $("#profileBanner"+$(this).attr('data-id')).fadeIn("slow");
                });
                
            });

            function changeInfo(next_id)
            {
                $(".whole-table").hide();
                    $("#"+next_id).show();
                    $(".profile-banner-detail").show();
            }
        </script>

    </body>

</html><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/pages/exploreCities.blade.php ENDPATH**/ ?>