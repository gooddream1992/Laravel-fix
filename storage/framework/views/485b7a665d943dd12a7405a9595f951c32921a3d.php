<?php $__env->startSection('title', 'ModiFy Client'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
       
        <!-- /.card-header -->
        <div class="card-body">
          <a href="<?php echo e(url('/home')); ?>" class="btn btn-primary">Back</a><hr>
          <div class="text-center btn btn-success" style="width: 100%"><h1>Client Profile Setting</h1></div><hr>
          <form role="form" method="POST" action="<?php echo e(url('client/profile/setting/update')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


            <?php $clients=\App\User::all()->where('id', $id);?>



            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <input type="hidden" name="id" value="<?php echo e($escort->id); ?>">
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                    
                      <div class="selct_2_alska">
                        <input name="photo" type="file" accept="image/*"  value="<?php echo e($escort->photo); ?>">
                       <?php if(Auth::user()->photo==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width:50px;height:50px;border-radius: 50%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.Auth::user()->photo)); ?>" style="width: 50px;height:50px;border-radius: 50%;"><?php endif; ?>
                      </div>
                    </div>
                  </div> 
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Name')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="name" class="form-control"  value="<?php echo e($escort->name); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Phone')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="phone" value="<?php echo e($escort->phone); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Email')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="email"  value="<?php echo e($escort->email); ?>" class="form-control">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Gender')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="gender" value="<?php echo e($escort->gender); ?>"> 
                          <option value="<?php echo e($escort->gender); ?>">Current <?php if($escort->gender==1): ?> Male <?php elseif($escort->gender==2): ?> Female <?php else: ?> None <?php endif; ?></option>
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                        </select>
                      </div>
                    </div>
                  </div>

                 
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Age')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="age"> 
                          <option value="<?php echo e($escort->age); ?>">Current <?php echo e($escort->age); ?></option>
                          <option value="18">18</option>
                          <option value="20">20</option>
                           <option value="22">22</option>
                          <option value="24">24</option>
                           <option value="26">26</option>
                          <option value="28">28</option>
                        </select>
                      </div>
                    </div>
                  </div>

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Nationality')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="nationality"> 
                          <option value="<?php echo e($escort->nationality); ?>"><?php if($escort->nationality==NULL): ?> None <?php else: ?> Current <?php echo e(\App\EscortDropdown::find($escort->nationality)->dropdownTitle); ?> <?php endif; ?></option>
                          <?php $hairs=\App\EscortDropdown::all()->where('status', 4);?> 
                        <?php $__currentLoopData = $hairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($hair->id); ?>"><?php echo e($hair->dropdownTitle); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>
                  </div>

                
                 
                 

                
                  



                   

                  
                  
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">

                 

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Whatsapp Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="whatsup" value="<?php echo e($escort->whatsup); ?>" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Snap Chat Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="snapchat" value="<?php echo e($escort->snapchat); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Instagram Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="instagram" value="<?php echo e($escort->instagram); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Follow Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="follow_me" value="<?php echo e($escort->follow_me); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Email Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="email_me" value="<?php echo e($escort->email_me); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Website Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="website" value="<?php echo e($escort->website); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                 
                 
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Personal Type</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="personal_type" value="<?php echo e($escort->personal_type); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                
                 
                

                

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Height')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="height" value="<?php echo e($escort->height); ?>" class="form-control">
                      </div>
                    </div>
                  </div>

                  

                 <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Country')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <select class="form-control" name="country">
                        <?php $cntrycount=\App\Country::all()->where('id', $escort->country);?>
                           <option value="<?php echo e($escort->country); ?>"><?php if($cntrycount->count()<1): ?> Not Found <?php else: ?> Current <?php echo e(\App\Country::find($escort->country)->country); ?> <?php endif; ?></option>


                        <?php $countries=\App\Country::all();?>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>"><?php echo e($country->country); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('State')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                      <select class="form-control" name="city">
                          <?php $statecount=\App\State::all()->where('id', $escort->city);?>
                           <option value="<?php echo e($escort->city); ?>"><?php if($statecount->count()<1): ?> Not Found <?php else: ?> Current <?php echo e(\App\State::find($escort->city)->state); ?> <?php endif; ?></option>


                        <?php $states=\App\State::all();?>
                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($state->id); ?>"><?php echo e($state->state); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('City')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="hidden" name="city_id1" value="<?php echo e($escort->suburb); ?>">
                       <select class="form-control" name="suburb">
                           <?php $citycount=\App\City::all()->where('id', $escort->suburb);?>
                           <option value="<?php echo e($escort->suburb); ?>"><?php if($citycount->count()<1): ?> Not Found <?php else: ?> Current <?php echo e(\App\City::find($escort->suburb)->city); ?> <?php endif; ?></option>


                        <?php $cities=\App\City::all();?>
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($city->id); ?>"><?php echo e($city->city); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Code')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="code" value="<?php echo e($escort->code); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Update">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
          </form>
          
        </div>
        
      </div>
    </section>
  </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/client_dashboard/clientProfileSettings.blade.php ENDPATH**/ ?>