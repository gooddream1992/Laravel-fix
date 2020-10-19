<?php $__env->startSection('title', 'Profile Details'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
       
        <!-- /.card-header -->
        <div class="card-body">
          




<?php if(Auth::user()->roleStatus==2): ?>

<a href="<?php echo e(url('/home')); ?>" class="btn btn-primary">Back</a><hr>
<div class="text-center btn btn-success" style="width: 100%"><h1>Profile Tours</h1></div><hr>
                    <form role="form" method="POST" action="<?php echo e(url('profile/tour/store')); ?>" enctype="multipart/form-data">
                      <?php echo e(csrf_field()); ?>

                      
                      
                      
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
                                    <option value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->name); ?></option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                <div class="select_2_alska2">
                                  <label class="FormLabel1"><?php echo e(__('Upload To')); ?>*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <select class="form-control" name="status">
                                    <option value="1">Domestic tours</option>
                                    <option value="2">International tours</option>
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
                                  <select class="form-control" name="city">
                                    <?php $states=\App\State::all();?>
                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($state->state); ?>"><?php echo e($state->state); ?></option>
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
                                  <label class="FormLabel1"><?php echo e(__('Start Date')); ?>*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <input type="date" name="startDate" class="form-control">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                <div class="select_2_alska2">
                                  <label class="FormLabel1"><?php echo e(__('End Date')); ?>*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <input type="date" name="endDate" class="form-control">
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
                          <th><?php echo e(__('Escort')); ?></th>
                          <th><?php echo e(__('Status')); ?></th>
                          <th><?php echo e(__('City')); ?></th>
                          <th><?php echo e(__('Date')); ?></th>
                          <th><?php echo e(__('Action')); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $pftours =\App\ProfileTour::all()->where('escortId', Auth::user()->id);?>
                        <?php $i=1;?>
                        <?php $__currentLoopData = $pftours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>00<?php echo e($i++); ?></td>
                          
                          <td><?php echo e(\App\User::find($data4->escortId)->name); ?></td>
                          <td><?php if($data4->status==1): ?> Domestic tours <?php elseif($data4->status==2): ?> International tours <?php else: ?> <?php endif; ?></td>
                          <td><?php echo e($data4->city); ?></td>
                          <td><?php echo e($data4->startDate); ?> TO <?php echo e($data4->endDate); ?></td>
                          
                          
                          <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pftours<?php echo e($data4->id); ?>">Modify</a> <a href="<?php echo e(url('profile/tour/delete/'.$data4->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
                          
                          
                          
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                      </table>
                      <!--  ==================================Modal Start============================================= -->
                      <?php $__currentLoopData = $pftours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="modal fade" id="modal-xl-pftours<?php echo e($data4->id); ?>">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header" style="background: #b00404;">
                              <h4 class="modal-title">Modify Information</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form role="form" method="POST" action="<?php echo e(url('profile/tour/update')); ?>" enctype="multipart/form-data">
                              <?php echo e(csrf_field()); ?>

                              <div class="modal-body">
                                
                                <input type="hidden" name="id" value="<?php echo e($data4->id); ?>">
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
                                              <option value="<?php echo e($data4->escortId); ?>">Current <?php echo e(\App\User::find($data4->escortId)->name); ?></option>
                                              <option value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->name); ?></option>
                                          
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-12">
                                        <div class="form-group sip_mt">
                                          <div class="select_2_alska2">
                                            <label class="FormLabel1"><?php echo e(__('Upload To')); ?>*</label>
                                          </div>
                                          <div class="selct_2_alska">
                                            <select class="form-control" name="status">
                                              <option value="<?php echo e($data4->status); ?>">Current <?php if($data4->status==1): ?> Domestic tours <?php elseif($data4->status==2): ?> International tours <?php else: ?> <?php endif; ?></option>
                                              <option value="1">Domestic tours</option>
                                              <option value="2">International tours</option>
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
                                            <select class="form-control" name="city">
                                              <option value="<?php echo e($data4->city); ?>"><?php echo e($data4->city); ?></option>
                                              <?php $states=\App\State::all();?>
                                              <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <option value="<?php echo e($state->state); ?>"><?php echo e($state->state); ?></option>
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
                                            <label class="FormLabel1"><?php echo e(__('Start Date')); ?>*</label>
                                          </div>
                                          <div class="selct_2_alska">
                                            <input type="date" name="startDate" value="<?php echo e($data4->startDate); ?>">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-12">
                                        <div class="form-group sip_mt">
                                          <div class="select_2_alska2">
                                            <label class="FormLabel1"><?php echo e(__('End Date')); ?>*</label>
                                          </div>
                                          <div class="selct_2_alska">
                                            <input type="date" name="endDate" value="<?php echo e($data4->endDate); ?>">
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
                      <!-- ==================================Modal============================================= -->



<?php else: ?>

<?php endif; ?>














                      </div>
                      
                      
                      
                      
                    </div>
                    
                  </div>
                </section>
              </div>
              <?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/profileTour.blade.php ENDPATH**/ ?>