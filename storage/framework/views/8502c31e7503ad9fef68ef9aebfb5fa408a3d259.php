<?php $__env->startSection('title', 'New Escort'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">New Escort</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form role="form" method="POST" action="<?php echo e(url('escort/store')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                     
                      <div class="selct_2_alska">
                        <input name="photo" type="file" accept="image/*" value="0">
                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>">
                        <p class="help-block"><?php echo e(__('Upload Profile Photo max 1mb')); ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Name')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="name" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Phone')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="phone">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Email')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="email">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Gender')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="gender"> 
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
                        <select class="form-control" name="serviceArea"> 
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
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>
                    </div>
                  </div>


                    <div class="col-lg-12" style="display: none">
                    <div class="form-group sip_mt">
                        <label class="FormLabel1"><?php echo e(__('Service Offer')); ?>*</label><br>

                        <?php $services=\App\ServiceOffer::all();?>
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input type="checkbox" name="name[]" value="<?php echo e($servic->service); ?>"> <?php echo e($servic->service); ?> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     
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
                        <input type="text" name="whatsup">
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Snap Chat Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="snapchat">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Instagram Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="instagram">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Follow Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="follow_me">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Email Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="email_me">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Website Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="website">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Straight/Bi/Gay</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="straight">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Bust</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="bust">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Personal Type</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="personal_type">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Pet Hate</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="pet">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Favourite Drink</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="drink">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Favourite food</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="food">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Service Provider</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="service">
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
                       <input type="text" name="dress">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Height')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="height">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Price')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="price">
                      </div>
                    </div>
                  </div>

                


  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Country')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <select class="form-control" name="country_id" onchange="selectcountry()" id="selectCountry">
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
                      <select class="form-control" name="state_id" onchange="selectstate()" id="stateSelect">

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
                       <select class="form-control" name="city_id" id="selectCity">

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
                       <input type="text" name="code">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Save">
                      </div>
                    </div>
                  </div>
                 
                  
                </div>
               


    <script>
        function selectcountry(){
            $.ajax({
                url:"<?php echo e(route('select_country')); ?>",
                method:'GET',
                data:{'country_id':$('#selectCountry').find(':selected').val()},
                success:function(data){
                    $('#stateSelect').text(' ');
                   for (var i = 0; i < data.states.length; i++) {
                       $('#stateSelect').append('<option value="'+data.states[i].id+'">'+data.states[i].state+'</option>');
                   }
                },
                error:function(err){
                    console.log(err);
                }
            });
        }

        function selectstate(){
            $.ajax({
                url:"<?php echo e(route('select_state')); ?>",
                method:'GET',
                data:{'state_id':$('#stateSelect').find(':selected').val()},
                success:function(data){
                     $('#selectCity').text(' ');
                    for (var k = 0; k < data.citys.length; k++) {
                        $('#selectCity').append('<option value="'+data.citys[k].id+'">'+data.citys[k].city+'</option>');
                    }
                },
                error:function(err){
                    console.log(err);
                }


            })
        }
    </script>








                </div>
              </div>
            </div>
            
            
          </form>
          
        </div>
        
      </div>
    </section>
  </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/admin/escorts/newEscort.blade.php ENDPATH**/ ?>