<?php $__env->startSection('title', 'Escort Dropdown'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Escort Dropdown</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          


          <div class="text-center btn btn-success"><h1>Escort Dropdown</h1></div><hr>
    
          <form role="form" method="POST" action="<?php echo e(url('escort/dropdown/store')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

           
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">

                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                       <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Dropdown Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="dropdownTitle">
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
                        <label class="FormLabel1"><?php echo e(__('Upload To')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="status">
                          <option value="1">Eyes</option>
                          <option value="2">Body Shape</option>
                          <option value="3">Sexuality </option>
                          <option value="4">Nationality </option>
                          <option value="5">Hair </option>
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
                
              </div>
            </div>
          

          </form>






 <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><?php echo e(__('ID No.')); ?></th>
                <th><?php echo e(__('Title')); ?></th>
                <th><?php echo e(__('Status')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $dropdowns =\App\EscortDropdown::all();?>
                 <?php $i=1;?>
              <?php $__currentLoopData = $dropdowns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>00<?php echo e($i++); ?></td>
                <td><?php echo e($data->dropdownTitle); ?></td>
                <td><?php if($data->status==1): ?> Eyes <?php elseif($data->status==2): ?> Body Shape <?php elseif($data->status==3): ?> Sexuality <?php elseif($data->status==4): ?> Nationality <?php elseif($data->status==5): ?> Hair <?php else: ?> None  <?php endif; ?></td>
              
              
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl<?php echo e($data->id); ?>">Modify</a> <a href="" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </table>

        

 <div class="text-center btn btn-success"><h1>Service Offer</h1></div><hr>
    
          <form role="form" method="POST" action="<?php echo e(url('service/offer/store')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

           
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">

                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                       <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Service')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="service">
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
                        
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Add">
                      </div>
                    </div>
                  </div>


                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        
                      </div>
                      <div class="selct_2_alska">
                        <a href="#"  data-toggle="modal" data-target="#modal-xl-assign" class="btn btn-primary">Assign To</a>
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
                
              </div>
            </div>
          

          </form>





<table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><?php echo e(__('ID No.')); ?></th>
                <th><?php echo e(__('Title')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $services =\App\ServiceOffer::all();?>
                 <?php $i=1;?>
              <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>00<?php echo e($i++); ?></td>
                <td><?php echo e($servic->service); ?></td>
                
              
              
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-servic<?php echo e($servic->id); ?>">Modify</a> <a href="<?php echo e(url('service/offer/delete/'.$servic->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </table>
 <div class="text-center btn btn-success"><h1>Assigned Service Offer</h1></div><hr>
<table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><?php echo e(__('ID No.')); ?></th>
                <th><?php echo e(__('Escort')); ?></th>
                <th><?php echo e(__('Service')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $servicesassigns =\App\ServiceOfferAssign::all();?>
                 <?php $i=1;?>
              <?php $__currentLoopData = $servicesassigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>00<?php echo e($i++); ?></td>
                 <td><?php echo e(\App\User::find($servicass->escortId)->name); ?></td>
                <td><input type="checkbox" name=""> <?php echo e($servicass->service); ?></td>
                
              
              
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-servicass<?php echo e($servic->id); ?>">Modify</a> <a href="<?php echo e(url('service/offer/assign/delete/'.$servicass->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </table>











        </div>
        
        
        
        
      </div>
      
    </div>
  </section>
</div>









  <!-- Modal Start================ -->
       <?php $__currentLoopData = $dropdowns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-xl<?php echo e($data->id); ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="<?php echo e(url('escort/dropdown/update')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            
            <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Dropdown Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="dropdownTitle" class="form-control" value="<?php echo e($data->dropdownTitle); ?>">
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
                        <label class="FormLabel1"><?php echo e(__('Upload To')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="status">
                          <option value="<?php echo e($data->status); ?>">Current <?php if($data->status==1): ?> Eyes <?php elseif($data->status==2): ?> Body Shape <?php elseif($data->status==3): ?> Sexuality <?php elseif($data->status==4): ?> Nationality <?php elseif($data->status==5): ?> Hair <?php else: ?> None  <?php endif; ?></option>
                         <option value="1">Eyes</option>
                          <option value="2">Body Shape</option>
                          <option value="3">Sexuality </option>
                          <option value="4">Nationality </option>
                          <option value="5">Hair </option>
                        </select>
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
       <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-xl-servic<?php echo e($servic->id); ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="<?php echo e(url('service/offer/update')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            
            <input type="hidden" name="id" value="<?php echo e($servic->id); ?>">
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Service')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="service" class="form-control" value="<?php echo e($servic->service); ?>">
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                 
                  
                  
                  
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
      <?php $__currentLoopData = $servicesassigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-xl-servicass<?php echo e($servicass->id); ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="<?php echo e(url('service/offer/assign/update')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            
            <input type="hidden" name="id" value="<?php echo e($servicass->id); ?>">
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                  
                 <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Escort')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="escortId">
                          <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                         <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($escort->id); ?>"><?php echo e($escort->name); ?></option>
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
                        <label class="FormLabel1"><?php echo e(__('Offer')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        
                        <input type="checkbox" name="service" value="<?php echo e($servic->service); ?>" checked> <?php echo e($servic->service); ?> <br>
                      
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
       
  <div class="modal fade" id="modal-xl-assign">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Assign Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="<?php echo e(url('service/offer/assign/store')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            
            <input type="hidden" name="id" value="<?php echo e($servic->id); ?>">
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                  
                 <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Escort')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="escortId">
                          <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                         <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($escort->id); ?>"><?php echo e($escort->name); ?></option>
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
                        <label class="FormLabel1"><?php echo e(__('Offer')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                         <?php $services=\App\ServiceOffer::all();?>
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input type="checkbox" name="service[]" value="<?php echo e($servic->service); ?>"> <?php echo e($servic->service); ?> <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
                
              </div>
            </div>
            
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Assign Confirm</button>
            </div>
          </form>




        </div>
        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal-dialog -->
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.editormaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/admin/escorts/escortDropdown.blade.php ENDPATH**/ ?>