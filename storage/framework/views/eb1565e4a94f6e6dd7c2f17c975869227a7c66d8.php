<?php $__env->startSection('title', 'Location'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Location</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
         
            
            <div class="row">

             

              
              <div class="col-md-4">
                 <form role="form" method="POST" action="<?php echo e(url('country/store')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

                <div class="row">
                     <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Country')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="country">
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                     
                      <div class="selct_2_alska">
                        <input name="image" type="file" accept="image/*" value="0">
                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>">
                        <p class="help-block"><?php echo e(__('Upload Country Thumbnail max 1mb')); ?></p>
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
                 </form>






              </div>

               <div class="col-md-4">
                 <form role="form" method="POST" action="<?php echo e(url('state/store')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

                <div class="row">
                     <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Country ID')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <select class="form-control" name="country_id">
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
                       <input type="text" name="state">
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
                 </form>
              </div>

            <div class="col-md-4">
                 <form role="form" method="POST" action="<?php echo e(url('city/store')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

                <div class="row">
                  
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('State ID')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <select class="form-control" name="state_id">
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
                       <input type="text" name="city">
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
                 </form>
              </div>



            </div>


             <div class="row">
              
              <div class="col-md-4">
                 <table class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><?php echo e(__('ID No.')); ?></th>
                <th><?php echo e(__('Country Name')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $countries =\App\Country::all();?>
             
              <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($country->id); ?></td>
                 <td><?php echo e($country->country); ?></td>
                <td><?php if($country->image==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$country->image)); ?>" style="width: 30px;"><?php endif; ?></td>
               
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-lg<?php echo e($country->id); ?>">Modify</a> <a href="<?php echo e(url('country/delete/'.$country->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </table>
              </div>

              

            <div class="col-md-4">
               <table class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><?php echo e(__('ID No.')); ?></th>
                <th><?php echo e(__('Country Id')); ?></th>
                <th><?php echo e(__('State Name')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                  <?php $states =\App\State::all();?>
             
              <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($state->id); ?></td>
                <td><?php echo e(\App\Country::find($state->country_id)->country); ?></td>
                <td><?php echo e($state->state); ?></td>
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-lg-state<?php echo e($state->id); ?>">Modify</a><a href="<?php echo e(url('state/delete/'.$state->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </table>
              </div>

               <div class="col-md-4">
                <table class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><?php echo e(__('ID No.')); ?></th>
                <th><?php echo e(__('Sate Name')); ?></th>
                <th><?php echo e(__('City Name')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $cities =\App\City::all();?>
             
              <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($city->id); ?></td>
                <td><?php echo e(\App\State::find($city->state_id)->state); ?></td>
                <td><?php echo e($city->city); ?></td>
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-lg-city<?php echo e($city->id); ?>">Modify</a> <a href="<?php echo e(url('city/delete/'.$city->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </table>
              </div>



            </div>
            





<div class="row">
   <div class="col-lg-12">               
<!-- Test========================================= -->

<form role="form" method="get" action="" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

                <div class="row">
                     <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Country ID')); ?>*</label>
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
                        <label class="FormLabel1"><?php echo e(__('State ID')); ?>*</label>
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
                        <label class="FormLabel1"><?php echo e(__('City ID')); ?>*</label>
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
                        
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Save">
                      </div>
                    </div>
                  </div>
                 
                  
                </div>
                 </form>


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
    
 <div style="margin-top: 300px;">dssd</div>
              </div>

</div>
















       
          
        </div>
        
      </div>
    </section>
  </div>














<!--========================== Modal  Start====================================================-->


  <!-- Modal Start================ -->
     <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-lg<?php echo e($country->id); ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="<?php echo e(url('country/update')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            
            <input type="hidden" name="id" value="<?php echo e($country->id); ?>">
            <div class="row">
              
             
              <div class="col-md-12">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Country')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="country" class="form-control" value="<?php echo e($country->country); ?>">
                      </div>
                    </div>
                  </div>


                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                     
                      <div class="selct_2_alska">
                        <input name="image" type="file" accept="image/*" value="<?php echo e($country->image); ?>">
                        <img src="<?php echo e(asset('public/uploads/'.$country->image)); ?>" style="width:200px;">
                        <p class="help-block"><?php echo e(__('Upload Country Thumbnail max 1mb')); ?></p>
                      </div>
                    </div>
                  </div>
                
                  
                  
                  
                  
                  
                </div>
                
              </div>
            </div>
            
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>




        </div>
        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal-dialog -->
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>













  <!-- Modal Start================ -->
     <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-lg-state<?php echo e($state->id); ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="<?php echo e(url('state/update')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            
              <input type="hidden" name="id" value="<?php echo e($state->id); ?>">
            <div class="row">



              
             
              <div class="col-md-12">
                <div class="row">

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Country')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                      
                       <select name="country_id" class="form-control">
                         <option value="<?php echo e($state->country_id); ?>">Current <?php echo e(\App\Country::find($state->country_id)->country); ?></option>
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
                       <input type="text" name="state" class="form-control" value="<?php echo e($state->state); ?>">
                      </div>
                    </div>
                  </div>
                
                  
                  
                  
                  
                  
                </div>
                
              </div>
            </div>
            
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>




        </div>
        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal-dialog -->
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





  <!-- Modal Start================ -->
     <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-lg-city<?php echo e($city->id); ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="<?php echo e(url('city/update')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            
            <input type="hidden" name="id" value="<?php echo e($city->id); ?>">
            <div class="row">
              
             
              <div class="col-md-12">
                <div class="row">



                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('State')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                      
                       <select name="state_id" class="form-control">
                         <option value="<?php echo e($city->state_id); ?>">Current <?php echo e(\App\State::find($city->state_id)->state); ?></option>
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
                        <label class="FormLabel1"><?php echo e(__('city')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="city" class="form-control" value="<?php echo e($city->city); ?>">
                      </div>
                    </div>
                  </div>
                  
                
                  
                  
                  
                  
                  
                </div>
                
              </div>
            </div>
            
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>




        </div>
        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal-dialog -->
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe-front\resources\views/admin/general_setting/locationAdd.blade.php ENDPATH**/ ?>