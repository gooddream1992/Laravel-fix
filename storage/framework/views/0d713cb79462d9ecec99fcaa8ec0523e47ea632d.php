
<?php $__env->startSection('title', 'ModiFy Escort'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">ModiFy Escort</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form role="form" method="POST" action="<?php echo e(url('escort/update')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


            <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <input type="hidden" name="id" value="<?php echo e($escort->id); ?>">
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                    
                      <div class="selct_2_alska">
                        <input name="photo" type="file" accept="image/*"  value="<?php echo e($escort->photo); ?>">
                        <img src="<?php echo e(asset('public/uploads/'.$escort->photo)); ?>" style="width: 60px;">
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
                        <input type="text" name="phone" value="<?php echo e($escort->phone); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Email')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="email"  value="<?php echo e($escort->email); ?>">
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
                        <label class="FormLabel1"><?php echo e(__('Service Area')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="serviceArea" value="<?php echo e($escort->serviceArea); ?>">  <option value="<?php echo e($escort->serviceArea); ?>">Current <?php if($escort->serviceArea==1): ?> In Call <?php elseif($escort->serviceArea==2): ?> Out Call <?php else: ?> None <?php endif; ?></option>
                          <option value="1">In Call</option>
                          <option value="2">Out Call</option>
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

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Sexuality')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="sexuality"> 
                           <option value="<?php echo e($escort->sexuality); ?>"><?php if($escort->sexuality==NULL): ?> None <?php else: ?> Current <?php echo e(\App\EscortDropdown::find($escort->sexuality)->dropdownTitle); ?> <?php endif; ?> </option>
                           <?php $hairs=\App\EscortDropdown::all()->where('status', 3);?> 
                        <?php $__currentLoopData = $hairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($hair->id); ?>"><?php echo e($hair->dropdownTitle); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Eyes')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="eyes"> 
                          <option value="<?php echo e($escort->eyes); ?>"><?php if($escort->eyes==NULL): ?> None <?php else: ?> Current <?php echo e(\App\EscortDropdown::find($escort->eyes)->dropdownTitle); ?> <?php endif; ?> </option>
                          <?php $hairs=\App\EscortDropdown::all()->where('status', 1);?> 
                        <?php $__currentLoopData = $hairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($hair->id); ?>"><?php echo e($hair->dropdownTitle); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Body Shape')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="bodyShape"> 
                           <option value="<?php echo e($escort->bodyShape); ?>"><?php if($escort->bodyShape==NULL): ?> <?php else: ?> Current <?php echo e(\App\EscortDropdown::find($escort->bodyShape)->dropdownTitle); ?> <?php endif; ?> </option>
                           <?php $hairs=\App\EscortDropdown::all()->where('status', 2);?> 
                        <?php $__currentLoopData = $hairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($hair->id); ?>"><?php echo e($hair->dropdownTitle); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Escort Type')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="escortType">
                          <option value="<?php echo e($escort->escortType); ?>">Current <?php if($escort->escortType==1): ?> Agency <?php elseif($escort->escortType==2): ?> Independent <?php elseif($escort->escortType==3): ?> Establishment <?php else: ?> <?php endif; ?></option>
                          <option value="1">Agency</option>
                          <option value="2">Independent</option>
                          <option value="3">Establishment  </option>
                        </select>
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Touring Escort')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="escortTouring">
                           <option value="<?php echo e($escort->escortTouring); ?>">Current <?php if($escort->escortTouring==1): ?> Yes <?php elseif($escort->escortTouring==0): ?> No <?php else: ?> <?php endif; ?></option>
                          
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>
                    </div>
                  </div>


                    <div class="col-lg-12" style="display: none">
                    <div class="form-group sip_mt">
                        <label class="FormLabel1"><?php echo e(__('Service Offer')); ?>*</label><br>
                     
                        <input type="checkbox" name="serviceOffer1" value="Boyfriend Experience"> Boyfriend Experience 
                        <input type="checkbox" name="serviceOffer2" value="Girlfriend Girlfriend"> Girlfriend Girlfriend  
                     <input type="checkbox" name="serviceOffer3" value="Pornstar Girlfriend"> Pornstar Girlfriend  
                     <br> 
                        <input type="checkbox" name="serviceOffer4" value="Overnight"> Overnight 
                        <input type="checkbox" name="serviceOffer5" value="Party Sessions"> Party Sessions

                        <input type="checkbox" name="serviceOffer6" value="Dinner Dates"> Dinner Dates

                        <br> 
                        <input type="checkbox" name="serviceOffer7" value="Couples"> Couples
 
                        <input type="checkbox" name="serviceOffer8" value="Fly me to you"> Fly me to you

                        <input type="checkbox" name="serviceOffer9" value="Message"> Message

                        <br> 
                        <input type="checkbox" name="serviceOffer10" value="Videoing"> Videoing

                        <input type="checkbox" name="serviceOffer11" value="Dress Up"> Dress Up

                        <input type="checkbox" name="serviceOffer12" value="Tantra"> Tantra

                        <br> 
                        <input type="checkbox" name="serviceOffer13" value="Anal"> Anal

 
                        <input type="checkbox" name="serviceOffer14" value="bbj"> bbj


                        <input type="checkbox" name="serviceOffer15" value="Covered bj"> Covered bj
                      
                    </div>
                  </div>

                   

                  
                  
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Hair')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="hair">
                            <option value="<?php echo e($escort->hair); ?>"><?php if($escort->hair==NULL): ?> None <?php else: ?> Current <?php echo e(\App\EscortDropdown::find($escort->hair)->dropdownTitle); ?> <?php endif; ?> </option>
                        <?php $hairs=\App\EscortDropdown::all()->where('status', 5);?> 
                        <?php $__currentLoopData = $hairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($hair->id); ?>"><?php echo e($hair->dropdownTitle); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Whatsapp Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="whatsup" value="<?php echo e($escort->whatsup); ?>">
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Snap Chat Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="snapchat" value="<?php echo e($escort->snapchat); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Instagram Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="instagram" value="<?php echo e($escort->instagram); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Follow Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="follow_me" value="<?php echo e($escort->follow_me); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Email Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="email_me" value="<?php echo e($escort->email_me); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Website Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="website" value="<?php echo e($escort->website); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Straight/Bi/Gay</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="straight" value="<?php echo e($escort->straight); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Bust</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="bust" value="<?php echo e($escort->bust); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Personal Type</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="personal_type" value="<?php echo e($escort->personal_type); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Pet Hate</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="pet" value="<?php echo e($escort->pet); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Favourite Drink</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="drink" value="<?php echo e($escort->drink); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Favourite food</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="food" value="<?php echo e($escort->food); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Service Provider</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="service" value="<?php echo e($escort->service); ?>">
                      </div>
                    </div>
                  </div>

                  

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Activation')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="activation"> 
                          <option value="<?php echo e($escort->activation); ?>">Current <?php if($escort->activation==1): ?> Available Now <?php elseif($escort->activation==0): ?> Not Available <?php else: ?> None <?php endif; ?> </option>
                          <option value="1">Available Now</option>
                          <option value="0">Not Available</option>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Dress')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="dress" value="<?php echo e($escort->dress); ?>">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Height')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="height" value="<?php echo e($escort->height); ?>">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Price')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="price" value="<?php echo e($escort->price); ?>">
                      </div>
                    </div>
                  </div>



                 <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Country')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <select class="form-control" name="country_id" id="country">
                            <?php 
                                /*$cntrycount=\App\Country::all()->where('id', $escort->country);*/ 
                                /*echo "<pre>";
                                print_r($country);
                                exit;*/
                            ?>
                            <option value="">Country</option>
                            <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($value->id); ?>" <?php if(isset($escorts[0]->country_id) && $value->id == $escorts[0]->country_id): ?> selected <?php endif; ?> ><?php echo e($value->country); ?></option>
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
                          <input type="hidden" value="<?php if(isset($escorts[0]->state_id)): ?> <?php echo e($escorts[0]->state_id); ?> <?php endif; ?>" name="state_id" id="state_id">
                      <select class="form-control" name="state" id='state'>
                          <option value="">State</option>
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
                        <input type="hidden" name="city_id" value="<?php if(isset($escorts[0]->city_id)): ?> <?php echo e($escorts[0]->city_id); ?> <?php endif; ?>" id="city_id">
                       <select class="form-control" name="city" id="city">
                           <?php
                            /*$citycount=\App\City::all()->where('id', $escort->suburb);*/
                           ?>
                           <option value="">City</option>
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
                       <input type="text" name="code" value="<?php echo e($escort->code); ?>">
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
  <script>
      $(document).ready(function(){
          var country =  $("#country").val();
          var state_id = $("#state_id").val();
          var city_id = $("#city_id").val();
          if(country != '' && state_id != ''){
                $.ajax({
                   url:"<?php echo e(url('escort/state')); ?>",
                   type:"POST",
                   data:{
                            "_token": "<?php echo e(csrf_token()); ?>",
                            country:country,
                            state_id:state_id,
                   },
                    success: function(data) {
                        $("#state").html(data); 
                    }
                });    
          }
                $('#country').on('change', function() {
                    var country =  this.value;
                    $.ajax({
                       url:"<?php echo e(url('escort/state')); ?>",
                       type:"POST",
                       data:{
                                "_token": "<?php echo e(csrf_token()); ?>",
                                country:country
                       },
                        success: function(data) {
                                  $("#state").html(data); 
                        }
                    });
                });
            if(country != '' && state_id != '' && city_id != ''){
                    $.ajax({
                       url:"<?php echo e(url('escort/city')); ?>",
                       type:"POST",
                       data:{
                                "_token": "<?php echo e(csrf_token()); ?>",
                                state:state_id,
                                city:city_id,
                       },
                        success: function(data) {
                            $("#city").html(data); 
                        }
                    });
            }
                $('#state').on('change', function() {
                    var state =  this.value;
                    $.ajax({
                       url:"<?php echo e(url('escort/city')); ?>",
                       type:"POST",
                       data:{
                                "_token": "<?php echo e(csrf_token()); ?>",
                                state:state
                       },
                        success: function(data) {
                            $("#city").html(data); 
                        }
                    });
                });
      });
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/escorts/escortModify.blade.php ENDPATH**/ ?>