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
              <?php $i=1;?>
              <?php $__currentLoopData = $servicesassigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>00<?php echo e($i++); ?></td>
                
                <td><?php echo e($servicass->escortName); ?></td> 
                <td>
                    <input type="checkbox" name="">
                    <?php echo e(implode(', ', explode(';T;', $servicass->service))); ?>

                </td>
                
              
              
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-servicass<?php echo e($servicass->id); ?>">Modify</a> <a href="<?php echo e(url('service/offer/assign/delete/'.$servicass->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </table>











        </div>
        
        
        
        
      </div>
      
    </div>
  </section>
</div>














<!-- Modal Start================ -->
      <?php $__currentLoopData = $servicesassigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-xl-servicass<?php echo e($servicass->id); ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Assign Updatate Modify Information</h4>
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

                           <option value="<?php echo e($servicass->escortId); ?>">Current <?php if($servicass->escortId==NULL): ?> None <?php else: ?> <?php echo e($servicass->escortName); ?> <?php endif; ?></option> 

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
                        
                        <input type="checkbox" name="service" value="<?php echo e($servicass->service); ?>" checked> <?php echo e($servicass->service); ?> <br>
                      
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
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/escorts/serviceOfferAssignList.blade.php ENDPATH**/ ?>