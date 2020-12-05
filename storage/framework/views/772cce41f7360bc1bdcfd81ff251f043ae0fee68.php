<?php $__env->startSection('title', __('Multi page')); ?>

<?php $__env->startSection('main'); ?>
<!-- Content -->
<?php 
    // echo $_REQUEST['url'];
    // if(!isset($_REQUEST['url']) || $_REQUEST['url'] == '' || $tabValue!='') {
    //     $tabs = 'mul-reviews';
    // }
?>

<div id="content">    
    <section class="multipage-inner-tab-sec row-am">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    <ul class="nav nav-tabs nav-pills nav-fill" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link <?php if(($tabValue != '' && $tabValue == 'mul-reviews') || (isset($_REQUEST['url']) && $_REQUEST['url'] == 'mul-reviews') ): ?> active <?php endif; ?>" id="mul-reviews-tab" data-toggle="tab" href="#mul-reviews" role="tab" aria-controls="reviews" aria-selected="true">
                                <img src="<?php echo e(asset('public/images/multi-page-tab-1.png')); ?>">
                                <img src="<?php echo e(asset('public/images/multi-page-tab-1-gray.png')); ?>">
                                Reviews
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($tabValue == 'mul-blogs' || isset($_REQUEST['url']) && $_REQUEST['url'] == 'mul-blogs'): ?> active <?php endif; ?>" id="mul-blogs-tab" data-toggle="tab" href="#mul-blogs" role="tab" aria-controls="blogs" aria-selected="false">
                                <img src="<?php echo e(asset('public/images/multi-page-tab-2.png')); ?>">
                                <img src="<?php echo e(asset('public/images/multi-page-tab-2-gray.png')); ?>">
                                Blogs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($tabValue == 'mul-tours' || isset($_REQUEST['url']) && $_REQUEST['url'] == 'mul-tours'): ?> active <?php endif; ?>" id="mul-tours-tab" data-toggle="tab" href="#mul-tours" role="tab" aria-controls="tours" aria-selected="false">
                                <img src="<?php echo e(asset('public/images/multi-page-tab-3.png')); ?>">
                                <img src="<?php echo e(asset('public/images/multi-page-tab-3-gray.png')); ?>">
                                Tours
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($tabValue == 'mul-client-logs' || isset($_REQUEST['url']) && $_REQUEST['url'] == 'mul-client-logs'): ?> active <?php endif; ?>" id="mul-client-logs-tab" data-toggle="tab" href="#mul-client-logs" role="tab" aria-controls="contact" aria-selected="false">
                                <img src="<?php echo e(asset('public/images/multi-page-tab-2.png')); ?>">
                                <img src="<?php echo e(asset('public/images/multi-page-tab-2-gray.png')); ?>">
                                Clients
                            </a>
                        </li>
                    </ul> 
                    
                    <section class="search-city-bar blogs-search-bar ">
                        <form method="POST" action="<?php echo e(route('multi.page.search')); ?>">
                            <?php echo csrf_field(); ?>               
                            <input type="hidden" name="tabs" value="<?php if(isset($tabValue)){ echo $tabValue; } ?>" id="tabs">             
                            <div class="row justify-content-lg-center justify-content-md-center">
                                
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        
                                        <select class="form-control" name="country_id" id="selectCountry">
                                            <option value="">Select Country</option>
                                            <?php if($countries->count() > 0): ?>
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($country->id); ?>"
                                                    <?php echo e((!empty($country_id) && $country_id == $country->id) ? 'selected' : ''); ?>>
                                                    <?php echo e($country->country); ?>

                                                </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>   
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="" id="city_name" value="<?php echo isset($city_id) ? $city_id : NULL; ?>">
                                        <select class="form-control" name="city_id" id="citySelects">
                                            <option value="">City</option>
                                        </select>   
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="1" <?php echo e((!empty($gender) && $gender == 1) ? 'selected' : ''); ?>>Male</option>
                                            <option value="2" <?php echo e((!empty($gender) && $gender == 2) ? 'selected' : ''); ?>>Female</option>
                                            <option value="3" <?php echo e((!empty($gender) && $gender == 3) ? 'selected' : ''); ?>>Trans Gender</option>
                                            <option value="4" <?php echo e((!empty($gender) && $gender == 4) ? 'selected' : ''); ?>>Gay</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <button class="btn red-small btn-block">search</button>
                                </div>
                            </div>
                        </form>
                    </section>
                    
                    
                    <div class="tab-content text-white" id="myTabContent">
                        
                        <div class="tab-pane fade <?php if(($tabValue != '' && $tabValue == 'mul-reviews') || (isset($_REQUEST['url']) && $_REQUEST['url'] == 'mul-reviews') ): ?> show active <?php endif; ?>" id="mul-reviews" role="tabpanel" aria-labelledby="mul-reviews-tab">
                            <div class="escorts-grid">
                                <?php if($reviews && $reviews->count() > 0): ?>
                                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="w-100 pb-5 mt-5" style="border-bottom: 1px solid #e2e8f0">
                                        <a href="<?php echo e(route('multi.review.details', $review->id)); ?>">
                                            <div class="d-flex justify-content-between">
                                                <div class="w-25">
                                                    <?php
                                                        $escortPhoto = \App\ProfileImage::where([
                                                                ['escortId','=',$review->escort_id],
                                                                ['status','=',5]
                                                            ])->first();                                                        
                                                    ?>                                                    
                                                    <?php if(isset($escortPhoto->image)): ?>
                                                        <img src="<?php echo e(asset('public/uploads/' . $escortPhoto->image)); ?>" class="w-100" style="border-radius: 10px" />
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100" style="border-radius: 10px" />
                                                    <?php endif; ?>                                                  
                                                </div>
                                                <div class="w-75 d-flex flex-column justify-content-between pt-2"
                                                    style="padding-left: 5%">
                                                    <div style="text-overflow: ellipsis; word-break: break-all;">
                                                    <!-- <div style="text-overflow: ellipsis; height: 100px; word-break: break-all;"> -->
                                                        <?php echo e(strip_tags($review->testimonial)); ?>

                                                    </div>
                                                    <div class="pt-2">
                                                        from
                                                        <span class="h6 px-1 font-weight-bold"><?php echo e($review->clientName); ?></span>
                                                        to
                                                        <span class="h6 px-1 font-weight-bold"><?php echo e($review->escortName); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div> 
                        
                        <div class="tab-pane <?php if($tabValue == 'mul-blogs' || isset($_REQUEST['url']) && $_REQUEST['url'] == 'mul-blogs'): ?> show active <?php endif; ?> fade mt-5" id="mul-blogs" role="tabpanel" aria-labelledby="mul-blogs-tab">
                            <div class="escorts-grid">
                                <div class="row">
                                <?php if($blogs && $blogs->count() > 0): ?>
                                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $string = strip_tags($blog->description);
                                        $string = strip_tags($string);
                                        if(strlen($string) > 70) {
                                            // truncate string
                                            $stringCut = substr($string, 0, 70);
                                            $endPoint = strrpos($stringCut, ' ');
                                            //if the string doesn't contain any space then it will cut without word basis.
                                            $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                            $string .= '...';
                                        }                                    
                                    ?>
                                    <div class="col-lg-3 col-md-4">
                                        <a href="<?php echo e(route('multi.blog.details', $blog->id)); ?>">
                                            <div class="escort-box d-flex flex-column justify-content-between"
                                                style="min-height: 350px">
                                                <div class="box-img">
                                                    <?php if($blog->imageurl): ?>
                                                        <img src="<?php echo e(asset('public/client_library/upload/blog/' . $blog->imageurl)); ?>" class="w-100" />
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('public/client_library/upload/blog/blankphoto.png')); ?>" class="w-100" />
                                                    <?php endif; ?>
                                                </div>
                                                <div class="box-content">
                                                    <h3><?php echo e(@\App\User::find($blog->publishBy)->name); ?></h3>
                                                    <p style="text-overflow: ellipsis; height: 80px; overflow: hidden">
                                                        <?php echo e($string); ?>

                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div> 
                        
                        <div class="tab-pane <?php if($tabValue == 'mul-tours' || isset($_REQUEST['url']) && $_REQUEST['url'] == 'mul-tours'): ?> show active <?php endif; ?> fade home-escorts mt-5" id="mul-tours" role="tabpanel" aria-labelledby="mul-tours-tab">
                            <div class="row justify-content-lg-center justify-content-md-center escort-row">
                            <?php if(isset($tour_new) && count($tour_new) > 0): ?>

                                <?php $__currentLoopData = $tour_new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php
                                    $name = str_replace(" ","-",$escort->name);
                                ?>
                                <?php    
                                    $touring = \App\ProfileTour::where([
                                            ['escortId', $escort->escortId],
                                            ['city',$escort->city]
                                        ])
                                        ->where('endDate', '>=', date('Y-m-d'))
                                        ->orderBy('endDate')
                                        ->first();
                                    $profile_images = \App\ProfileImage::where([
                                                        ['escortId','=',$escort->escortId],
                                                        ['status','=',5]
                                                    ])->get();
                                ?>
                                <div class="col-lg-3 col-6">
                                    <a href="<?php echo e(url('profile/' . $escort->escortId.'/'.$name)); ?>">
                                        <div class="our-escort-box is-available">
                                                <?php $__currentLoopData = $profile_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($value->image) && !empty($value->image) ): ?>
                                                        <img src="<?php echo e(asset('public/uploads/' . $value->image)); ?>" class="w-100" />
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100" />
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <div class="overlay-top">
                                                <div class="text">
                                                    <h4><?php echo e($escort->name); ?></h4>
                                                    <?php $state_name = \App\State::find($escort->state) ?>
                                                    <span class="location"><?php echo e($state_name ? $state_name->state : 'Not Found'); ?></span>
                                                </div>
                                            </div>
                                            <div class="overlay-bottom">
                                                <div class="text">
                                                    <h5 class="text-light border-bottom text-center pb-2">
                                                        <?php if(isset($touring->status)): ?>                                                        
                                                            <?php echo e($touring->status == 2 ? "Touring " :  "Touring "); ?>                                                        
                                                        <?php endif; ?>
                                                        <?php
                                                            $tour_cities = isset($touring->city) ? $touring->city : NULL;
                                                            $state_name = DB::table('states')->where('id',$tour_cities)->get();
                                                            $state = isset($state_name[0]->state) ? $state_name[0]->state : '';
                                                            echo $state;
                                                        ?>
                                                            
                                                            
                                                        <br>
                                                        <?php
                                                            $start  = $touring->startDate ?? '';
                                                            $start_date = date_create($start);
                                                            $starts_date = date_format($start_date,"d");
                                                            $starting_date = array('th','st','nd','rd','th','th','th','th','th','th');
                                                            if (($starts_date %100) >= 11 && ($starts_date%100) <= 13) {
                                                               $abbreviation = $starts_date. 'th';
                                                            } else {
                                                               $abbreviation = $starts_date. $starting_date[$starts_date % 10];
                                                            }

                                                            $end = $touring->endDate ?? '';
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
                                                        <?php echo e($abbreviations); ?> <?php echo e(date_format($end_date,"M")); ?>


                                                    </h5>

                                                    <table class="escort-profile-details">
                                                        <tr>
                                                            <td>Suburb</td>
                                                            <td><?php echo e($escort->userCity); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Service Area</td>
                                                            <td><?php if($escort->serviceArea==1): ?>
                                                        In Call
                                                    <?php elseif($escort->serviceArea==2): ?>
                                                        Out Call
                                                    <?php elseif($escort->serviceArea==3): ?>
                                                        In call & Out Call
                                                    <?php endif; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Price</td>
                                                                <?php
                                                                    $profile_Rate_one = \App\ProfileRate::where('escortId','=',$escort->escortId)
                                                                        ->where('price','!=','')
                                                                        ->get();
                                                                    $profile_Rate_both = \App\ProfileRate::where('escortId','=',$escort->escortId)
                                                                        ->where('price','!=','')
                                                                        ->select('price')
                                                                        ->get();
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

                                            <?php if(isset($escort->activation) && $escort->activation == 1): ?>
                                            <div class="availability">
                                                <h5>Available Now</h5>
                                            </div>
                                            <?php endif; ?>

                                        </div>
                                    </a>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            </div>
                        </div> 
                        
                        <div class="tab-pane <?php if($tabValue == 'mul-client-logs' || isset($_REQUEST['url']) && $_REQUEST['url'] == 'mul-client-logs'): ?> show active <?php endif; ?> fade" id="mul-client-logs" role="tabpanel" aria-labelledby="mul-client-logs-tab">
                            <div class="escorts-grid">
                                <div class="row">
                                <?php if($client_blogs && $client_blogs->count() > 0): ?>
                                    <?php $__currentLoopData = $client_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <?php
                                        $cl_blog = strip_tags($blog->description);
                                        $cl_blog = strip_tags($cl_blog);
                                        if(strlen($cl_blog) > 70) {
                                            // truncate cl_blog
                                            $stringCut = substr($cl_blog, 0, 70);
                                            $endPoint = strrpos($stringCut, ' ');
                                            //if the string doesn't contain any space then it will cut without word basis.
                                            $cl_blog = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                            $cl_blog .= '...';
                                        }                                    
                                    ?>
                                    <div class="col-lg-3 col-md-4">
                                        <a href="<?php echo e(route('multi.blog.details', $blog->id)); ?>"> 
                                            <div class="escort-box d-flex flex-column justify-content-between"
                                                style="min-height: 350px">
                                                <div class="box-img">
                                                    <?php if($blog->imageurl): ?>
                                                        <img src="<?php echo e(asset('public/client_library/upload/blog/' . $blog->imageurl)); ?>" class="w-100" />
                                                    <?php else: ?> 
                                                        <img src="<?php echo e(asset('public/client_library/upload/blog/blankphoto.png')); ?>" class="w-100" />
                                                    <?php endif; ?>
                                                </div>
                                                <div class="box-content">
                                                    <h3><?php echo e(\App\User::find($blog->publishBy)->name); ?></h3>
                                                    <p style="text-overflow: ellipsis; height: 80px; overflow: hidden;">
                                                        <?php echo e($cl_blog); ?>

                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
            </div>            
        </div>
    </section>
</div> <!-- / Content END -->
<?php $__env->stopSection(); ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('.nav-link').on('click',function(){
            var href = $(this).attr('href');
             var newString = href.replace('#', '');
             console.log(newString);
            $("#tabs").val(newString);
        });        
    });

    $(document).ready(function () {
                $('#selectCountry').on('change',function(){
                    var country = this.value;
                    $.ajax({
                        url: "<?php echo e(route('get.city.ajax')); ?>",
                        method: 'POST',
                        data: { "_token": "<?php echo e(csrf_token()); ?>",'country_id':country },
                        success: function (data) {
                            console.log(data);
                             $('#citySelects').html(data);
                        } 
                    });
                });

                var countries = $('#selectCountry').val();
                if(countries != ''){
                    var city_name = $('#city_name').val();
                    
                    $.ajax({
                        url: "<?php echo e(route('get.city.ajax')); ?>",
                        method: 'POST',
                        data: { "_token": "<?php echo e(csrf_token()); ?>",'country_id':countries,'city_name':city_name },
                        success: function (data) {
                             $('#citySelects').html(data);
                        } 
                    });    
                }
                
            });
</script>

<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/provider/multiPage.blade.php ENDPATH**/ ?>