<?php $__env->startSection('title', 'Profile Details'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Profile Details</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          





<?php if(Auth::user()->roleStatus==1): ?>

<div class="text-center btn btn-success"><h1>Profile Rates</h1></div><hr>
                <form role="form" method="POST" action="<?php echo e(url('profile/rate/store')); ?>" enctype="multipart/form-data">
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
                                <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                                <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($escort->id); ?>"><?php echo e($escort->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <option value="1">Rate(In Call)</option>
                                <option value="2">Rate(Out Call)</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group sip_mt">
                            <div class="select_2_alska2">
                              <label class="FormLabel1"><?php echo e(__('Time')); ?>*</label>
                            </div>
                            <div class="selct_2_alska">
                              <select class="form-control" name="time">
                                <option value="12 Hours">12 Hours</option>
                                <option value="4 Hours">4 Hours</option>
                                <option value="3 Hours">3 Hours</option>
                                <option value="2 Hours">2 Hours</option>
                                <option value="1 Hours">1 Hours</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group sip_mt">
                            <div class="select_2_alska2">
                              <label class="FormLabel1"><?php echo e(__('Price')); ?>*</label>
                            </div>
                            <div class="selct_2_alska">
                              <input type="text" name="price" placeholder="Dollar">
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
                              <textarea class="textarea" name="description"></textarea>
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
                      <th><?php echo e(__('Time')); ?></th>
                      <th><?php echo e(__('Price')); ?></th>
                      <th><?php echo e(__('Description')); ?></th>
                      <th><?php echo e(__('Action')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $pfrates =\App\ProfileRate::all();?>
                    <?php $i=1;?>
                    <?php $__currentLoopData = $pfrates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td>00<?php echo e($i++); ?></td>
                      
                      <td><?php echo e(\App\User::find($data3->escortId)->name); ?></td>
                      <td><?php if($data3->status==1): ?> Rate(In Call) <?php elseif($data3->status==2): ?> Rate(Out Call) <?php else: ?> <?php endif; ?></td>
                      <td><?php echo e($data3->time); ?></td>
                      <td><?php echo e($data3->price); ?></td>
                      <td><?php echo $data3->description; ?></td>
                      
                      
                      <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfrates<?php echo e($data3->id); ?>">Modify</a> <a href="<?php echo e(url('profile/rate/delete/'.$data3->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
                      
                      
                      
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                  </table>
                  <!--  ==================================Modal Start============================================= -->
                  <?php $__currentLoopData = $pfrates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="modal fade" id="modal-xl-pfrates<?php echo e($data3->id); ?>">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header" style="background: #b00404;">
                          <h4 class="modal-title">Modify Information</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form role="form" method="POST" action="<?php echo e(url('profile/rate/update')); ?>" enctype="multipart/form-data">
                          <?php echo e(csrf_field()); ?>

                          <div class="modal-body">
                            
                            <input type="hidden" name="id" value="<?php echo e($data3->id); ?>">
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
                                          <option value="<?php echo e($data3->escortId); ?>">Current <?php echo e(\App\User::find($data3->escortId)->name); ?></option>
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
                                        <label class="FormLabel1"><?php echo e(__('Upload To')); ?>*</label>
                                      </div>
                                      <div class="selct_2_alska">
                                        <select class="form-control" name="status">
                                          <option value="<?php echo e($data3->status); ?>">Current <?php if($data3->status==1): ?> Rate(In Call) <?php elseif($data3->status==2): ?> Rate(Out Call) <?php else: ?> <?php endif; ?></option>
                                          <option value="1">Rate(In Call)</option>
                                          <option value="2">Rate(Out Call)</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                      <div class="select_2_alska2">
                                        <label class="FormLabel1"><?php echo e(__('Time')); ?>*</label>
                                      </div>
                                      <div class="selct_2_alska">
                                        <select class="form-control" name="time">
                                          <option value="<?php echo e($data3->time); ?>"><?php echo e($data3->time); ?> Hours</option>
                                          <option value="12 Hours">12 Hours</option>
                                          <option value="4 Hours">4 Hours</option>
                                          <option value="3 Hours">3 Hours</option>
                                          <option value="2 Hours">2 Hours</option>
                                          <option value="1 Hours">1 Hours</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                      <div class="select_2_alska2">
                                        <label class="FormLabel1"><?php echo e(__('Price')); ?>*</label>
                                      </div>
                                      <div class="selct_2_alska">
                                        <input type="text" name="price" value="<?php echo e($data3->price); ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                      <div class="select_2_alska2">
                                        <label class="FormLabel1"><?php echo e(__('Description')); ?>*</label>
                                      </div>
                                      <div class="selct_2_alska">
                                        <textarea class="form-control" name="description"><?php echo e($data3->description); ?></textarea>
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
































<?php elseif(Auth::user()->roleStatus==2): ?>


  <div class="text-center btn btn-success"><h1>Profile Rates</h1></div><hr>
                <form role="form" method="POST" action="<?php echo e(url('profile/rate/store')); ?>" enctype="multipart/form-data">
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
                                <option value="1">Rate(In Call)</option>
                                <option value="2">Rate(Out Call)</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group sip_mt">
                            <div class="select_2_alska2">
                              <label class="FormLabel1"><?php echo e(__('Time')); ?>*</label>
                            </div>
                            <div class="selct_2_alska">
                              <select class="form-control" name="time">
                                <option value="12 Hours">12 Hours</option>
                                <option value="4 Hours">4 Hours</option>
                                <option value="3 Hours">3 Hours</option>
                                <option value="2 Hours">2 Hours</option>
                                <option value="1 Hours">1 Hours</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group sip_mt">
                            <div class="select_2_alska2">
                              <label class="FormLabel1"><?php echo e(__('Price')); ?>*</label>
                            </div>
                            <div class="selct_2_alska">
                              <input type="text" name="price" placeholder="Dollar">
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
                              <textarea class="textarea" name="description"></textarea>
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
                      <th><?php echo e(__('Time')); ?></th>
                      <th><?php echo e(__('Price')); ?></th>
                      <th><?php echo e(__('Description')); ?></th>
                      <th><?php echo e(__('Action')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $pfrates =\App\ProfileRate::all()->where('escortId', Auth::user()->id);?>
                    <?php $i=1;?>
                    <?php $__currentLoopData = $pfrates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td>00<?php echo e($i++); ?></td>
                      
                      <td><?php echo e(\App\User::find($data3->escortId)->name); ?></td>
                      <td><?php if($data3->status==1): ?> Rate(In Call) <?php elseif($data3->status==2): ?> Rate(Out Call) <?php else: ?> <?php endif; ?></td>
                      <td><?php echo e($data3->time); ?></td>
                      <td><?php echo e($data3->price); ?></td>
                      <td><?php echo $data3->description; ?></td>
                      
                      
                      <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfrates<?php echo e($data3->id); ?>">Modify</a> <a href="<?php echo e(url('profile/rate/delete/'.$data3->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
                      
                      
                      
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                  </table>
                  <!--  ==================================Modal Start============================================= -->
                  <?php $__currentLoopData = $pfrates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="modal fade" id="modal-xl-pfrates<?php echo e($data3->id); ?>">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header" style="background: #b00404;">
                          <h4 class="modal-title">Modify Information</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form role="form" method="POST" action="<?php echo e(url('profile/rate/update')); ?>" enctype="multipart/form-data">
                          <?php echo e(csrf_field()); ?>

                          <div class="modal-body">
                            
                            <input type="hidden" name="id" value="<?php echo e($data3->id); ?>">
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
                                          <option value="<?php echo e($data3->escortId); ?>">Current <?php echo e(\App\User::find($data3->escortId)->name); ?></option>
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
                                          <option value="<?php echo e($data3->status); ?>">Current <?php if($data3->status==1): ?> Rate(In Call) <?php elseif($data3->status==2): ?> Rate(Out Call) <?php else: ?> <?php endif; ?></option>
                                          <option value="1">Rate(In Call)</option>
                                          <option value="2">Rate(Out Call)</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                      <div class="select_2_alska2">
                                        <label class="FormLabel1"><?php echo e(__('Time')); ?>*</label>
                                      </div>
                                      <div class="selct_2_alska">
                                        <select class="form-control" name="time">
                                          <option value="<?php echo e($data3->time); ?>"><?php echo e($data3->time); ?> Hours</option>
                                          <option value="12 Hours">12 Hours</option>
                                          <option value="4 Hours">4 Hours</option>
                                          <option value="3 Hours">3 Hours</option>
                                          <option value="2 Hours">2 Hours</option>
                                          <option value="1 Hours">1 Hours</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                      <div class="select_2_alska2">
                                        <label class="FormLabel1"><?php echo e(__('Price')); ?>*</label>
                                      </div>
                                      <div class="selct_2_alska">
                                        <input type="text" name="price" value="<?php echo e($data3->price); ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-12">
                                    <div class="form-group sip_mt">
                                      <div class="select_2_alska2">
                                        <label class="FormLabel1"><?php echo e(__('Description')); ?>*</label>
                                      </div>
                                      <div class="selct_2_alska">
                                        <textarea class="form-control" name="description"><?php echo e($data3->description); ?></textarea>
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
<?php echo $__env->make('masters.editormaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe-front\resources\views/admin/profile/profileRate.blade.php ENDPATH**/ ?>