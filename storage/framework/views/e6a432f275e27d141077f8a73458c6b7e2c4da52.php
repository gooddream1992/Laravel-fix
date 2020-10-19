<?php $__env->startSection('title', 'Profile Details'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
       
        <!-- /.card-header -->
        <div class="card-body">
          <a href="<?php echo e(url('/home')); ?>" class="btn btn-primary">Back</a><hr>
            <div class="text-center btn btn-success" style="width: 100%"><h1>Profile Description</h1></div><hr>
            <form role="form" method="POST" action="<?php echo e(url('profile/description/store')); ?>" enctype="multipart/form-data">
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
                             <option value="<?php if(isset($profile_descriptions[0]->userid)): ?> <?php echo e($profile_descriptions[0]->userid); ?> <?php endif; ?>"><?php if(isset($profile_descriptions[0]->name)): ?> <?php echo e($profile_descriptions[0]->name); ?> <?php endif; ?></option>
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
                            <option value="1" <?php if(isset($profile_descriptions[0]->status) && $profile_descriptions[0]->status == 1): ?> selected <?php endif; ?>>About Me</option>
                            <option value="2" <?php if(isset($profile_descriptions[0]->status) && $profile_descriptions[0]->status == 2): ?> selected <?php endif; ?>>Service offer</option>
                            <option value="3" <?php if(isset($profile_descriptions[0]->status) && $profile_descriptions[0]->status == 3): ?> selected <?php endif; ?>>Domestic Tours</option>
                            <option value="4" <?php if(isset($profile_descriptions[0]->status) && $profile_descriptions[0]->status == 4): ?> selected <?php endif; ?>>International Tours</option>
                            <option value="5" <?php if(isset($profile_descriptions[0]->status) && $profile_descriptions[0]->status == 5): ?> selected <?php endif; ?>>Interests & Favourite Things</option>
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
                          <label class="FormLabel1"><?php echo e(__('Description')); ?>*</label>
                        </div>
                        <div class="selct_2_alska">
                          <textarea  class="form-control" name="description"><?php if(isset($profile_descriptions[0]->description)): ?> <?php echo e($profile_descriptions[0]->description); ?> <?php endif; ?></textarea>
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
                  <th><?php echo e(__('Escort')); ?></th>
                  <th><?php echo e(__('Status')); ?></th>
                  <th><?php echo e(__('Description')); ?></th>
                  <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $pfdescrs =\App\ProfileDescription::all()->where('escortId', Auth::user()->id);?>
                <?php $i=1;?>
                
                <tr>                  
                  <td><?php if(isset($profile_descriptions[0]->name)): ?> <?php echo e($profile_descriptions[0]->name); ?> <?php endif; ?></td>
                  <td>
                    <?php if(isset($profile_descriptions[0]->status)): ?>
                      <?php echo e(($profile_descriptions[0]->status == 1) ? "About Me" : ""); ?>

                      <?php echo e(($profile_descriptions[0]->status == 2) ? "Service offer" : ""); ?>

                      <?php echo e(($profile_descriptions[0]->status == 3) ? "Domestic Tours" : ""); ?>

                      <?php echo e(($profile_descriptions[0]->status == 4) ? "International Tours" : ""); ?>

                      <?php echo e(($profile_descriptions[0]->status == 5) ? "Interests & Favourite Things" : ""); ?>

                    <?php endif; ?>
                  </td>
                  <td><?php if(isset($profile_descriptions[0]->description)): ?> <?php echo e($profile_descriptions[0]->description); ?> <?php endif; ?></td>
                  
                  
                  <td>
                    <?php if(isset($profile_descriptions[0]->id)): ?>
                    <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfdes<?php echo e($profile_descriptions[0]->id); ?>">Modify</a>
                    <a href="<?php echo e(url('profile/description/delete/'. $profile_descriptions[0]->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
                     <?php endif; ?> 
                  
                  
                </tr>
                
              </table>
              <!--  ==================================Modal Start============================================= -->
              <?php $__currentLoopData = $pfdescrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="modal fade" id="modal-xl-pfdes<?php echo e($profile_descriptions[0]->id); ?>">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header" style="background: #b00404;">
                      <h4 class="modal-title">Modify Information</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form role="form" method="POST" action="<?php echo e(url('profile/description/update')); ?>" enctype="multipart/form-data">
                      <?php echo e(csrf_field()); ?>

                      <div class="modal-body">
                        
                        <input type="hidden" name="id" value="<?php echo e($data1->id); ?>">
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
                                      <option value="<?php echo e($data1->escortId); ?>">Current <?php echo e(\App\User::find($data1->escortId)->name); ?></option>
                                      <option value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->name); ?></option>
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
                                    <label class="FormLabel1"><?php echo e(__('Upload To')); ?>*</label>
                                  </div>
                                  <div class="selct_2_alska">
                                    <select class="form-control" name="status">
                                      <option value="<?php echo e($data1->status); ?>">Current <?php if($data1->status==1): ?> About Me <?php elseif($data1->status==2): ?> Service offer <?php elseif($data1->status==3): ?> Domestic Tour <?php elseif($data1->status==4): ?> International Tours <?php elseif($data1->status==5): ?> Interests & Favourite Things <?php else: ?> None <?php endif; ?> </option>
                                      <option value="1">About Me</option>
                                      <option value="2">Service offer</option>
                                      <option value="3">Domestic Tours</option>
                                      <option value="4">International Tours</option>
                                      <option value="5">Interests & Favourite Things</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="col-lg-12">
                                <div class="selct_2_alska">
                                  <textarea class="textarea" name="description"><?php echo e($data1->description); ?></textarea>
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















                      </div>
                      
                      
                      
                      
                    </div>
                    
                  </div>
                </section>
              </div>
              <?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/profileDescription.blade.php ENDPATH**/ ?>