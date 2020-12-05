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

                       <select class="form-control" name="country_id" onchange="selectcountry()" id="selectCountry">
                        <?php $countries=\App\Country::all();?>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e($country_details->id == $country ? 'selected' : ''); ?> value="<?php echo e($country_details->id); ?>"><?php echo e($country_details->country); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                                </div>

                                            </li> 

                                            <li>

                                                <div class="form-group">

                                                    <select class="form-control" name="gender">
                                                        <option value="">--Select Gender--</option>
                                                        <option <?php echo e($gender == '1' ? 'selected' : ''); ?> value="1">Male</option>
                                                        <option <?php echo e($gender == '2' ? 'selected' : ''); ?> value="2">Female</option>
                                                        <option <?php echo e($gender == '3' ? 'selected' : ''); ?> value="3">Trans Gender</option>
                                                        <option <?php echo e($gender == '4' ? 'selected' : ''); ?> value="4">Gay</option>

                                                    </select>

                                                </div>

                                            </li> 

                                            <li>

                                                <div class="form-group">

                                                    <select class="form-control">
                                                        <option value="">-- Select Service Type --</option>

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
                                          <option value="">--Select City--</option>                  
                        <?php $__currentLoopData = $States; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e($state->id == $city ? 'selected' : ''); ?> value="<?php echo e($state->id); ?>"><?php echo e($state->state); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                                </div>

                                            </li> 

                                            <li>

                                                <div class="form-group">

                                                  <select class="form-control" name="city_id" onchange="selectstate()" id="stateSelect">
                                          <?php $cities=\App\City::all();?>
                                          <option value="">--Select Suburb--</option>
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e($city_details->id == $suburb ? 'selected' : ''); ?> value="<?php echo e($city_details->id); ?>"><?php echo e($city_details->city); ?></option>
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
                        $where = array();

                        if ($country!='') 
                        {
                            $where[] = array('country','=',$country);
                        }
                        if ($city!='') 
                        {
                            $where[] = array('state','=',$city);
                        }
                        if ($gender!='') 
                        {
                            $where[] = array('gender','=',$gender);
                        }
                        if ($post_data['sexuality']!='') 
                        {
                            $where[] = array('sexuality','=',$post_data['sexuality']);
                        }
                        if ($post_data['height']!='') 
                        {
                            $where[] = array('height','=',$post_data['height']);
                        }
                        if ($post_data['bodyShape']!='') 
                        {
                            $where[] = array('bodyShape','=',$post_data['bodyShape']);
                        }
                        if ($post_data['dress']!='') 
                        {
                            $where[] = array('dress','=',$post_data['dress']);
                        }
                        if ($post_data['hair']!='') 
                        {
                            $where[] = array('hair','=',$post_data['hair']);
                        }
                        if ($post_data['age']!='') 
                        {
                            $where[] = array('age','=',$post_data['age']);
                        }
                        if ($post_data['nationality']!='') 
                        {
                            $where[] = array('nationality','=',$post_data['nationality']);
                        }
                        if ($post_data['escortTouring']!='' && $post_data['escortTouring']!='0') 
                        {
                            $where[] = array('escortTouring','=',$post_data['escortTouring']);
                        }
                        if ($post_data['activation']!='' && $post_data['activation']!='0') 
                        {
                            $where[] = array('activation','=',$post_data['activation']);
                        }
                        if ($post_data['agency']!='') 
                        {
                            $where[] = array('type_IA','=',($post_data['agency']) == '0' ? null : '1');
                        }
                        // if ($post_data['independent']!='') 
                        // {
                        //     $where[] = array('type_IA','=',$post_data['independent']);
                        // }
                        if ($post_data['price_to']!='') 
                        {
                            $where[] = array('price','<',$post_data['price_to']);
                        }
                        if ($post_data['price_from']!='') 
                        {
                            $where[] = array('price','>',$post_data['price_from']);
                        }
                        DB::enableQueryLog();
                        $escorts= \App\User::where([['roleStatus', 2],['request','=',1]])
                        ->where($where)
                        // ->where('city', $city)
                        // ->where('gender', $gender)
                        // ->where('sexuality', $post_data['sexuality'])    
                        // ->where('height',$post_data['height'])
                        // ->where('bodyShape',$post_data['bodyShape'])
                        // ->where('dress',$post_data['dress'])
                        // ->where('hair',$post_data['hair'])
                        // ->where('age',$post_data['age'])
                        // ->where('nationality',$post_data['nationality'])
                        // ->where('escortTouring',$post_data['escortTouring'])
                        // ->where('activation',$post_data['activation'])
                        // ->where('type_IA',$post_data['agency'])
                        // ->where('type_IA',$post_data['independent'])
                        // ->where('price','<',$post_data['price_to'])
                        // ->where('price','>',$post_data['price_from'])
                        ->get();
                        // dd(DB::getQueryLog());
                        ?>

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
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/pages/advanceSearchEscort.blade.php ENDPATH**/ ?>