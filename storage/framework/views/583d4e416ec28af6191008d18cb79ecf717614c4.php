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
          <div class="text-center btn btn-success"><h1>Profile Images</h1></div><hr>
          <form role="form" method="POST" action="<?php echo e(url('profile/image/store')); ?>" enctype="multipart/form-data">
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
                        <label class="FormLabel1"><?php echo e(__('Profile Image')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="image" type="file" accept="image/*" value="0">
                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;">
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
                          <option value="1">Slider</option>
                          <option value="2">Gallery</option>
                          <option value="3">Video </option>
                          <option value="4">Selfie Gallery</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Image Url')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="url">
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
                <th><?php echo e(__('Picture')); ?></th>
                <th><?php echo e(__('Escort')); ?></th>
                <th><?php echo e(__('Status')); ?></th>
                <th><?php echo e(__('Url')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1 ?>
              <?php $__currentLoopData = $pfimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>00<?php echo e($i++); ?></td>
                <td><?php if($data->image==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$data->image)); ?>" style="width: 30px;"><?php endif; ?></td>
                <td><?php echo e($data->escortName); ?></td> 
                <td><?php if($data->status==1): ?> Slider <?php elseif($data->status==2): ?> Gallery <?php elseif($data->status==3): ?> Video Gallery <?php else: ?> Selfie Gallery <?php endif; ?></td>
                <td><?php echo e($data->url); ?></td>
                
                
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl<?php echo e($data->id); ?>">Modify</a> <a href="<?php echo e(url('profile/image/delete/'.$data->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
                
                
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
              
          </table>
            <!--  ==================================Modal Start============================================= -->
            <?php $__currentLoopData = $pfimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="modal fade" id="modal-xl<?php echo e($data->id); ?>">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header" style="background: #b00404;">
                    <h4 class="modal-title">Modify Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form role="form" method="POST" action="<?php echo e(url('profile/image/update')); ?>" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="modal-body">
                      
                      <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
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
                                    <option value="<?php echo e($data->escortId); ?>">Current <?php echo e($data->escortName); ?></option> 
                                    <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                                    <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($escort->id); ?>"><?php echo e($escort->id); ?><?php echo e($escort->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                <div class="select_2_alska2">
                                  <label class="FormLabel1"><?php echo e(__('Profile Image')); ?>*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <input name="image" type="file" accept="image/*" value="<?php echo e($data->image); ?>">
                                  <?php if($data->image==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$data->image)); ?>" style="width: 30px;"><?php endif; ?>
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
                                    <option value="<?php echo e($data->status); ?>">Current <?php if($data->status==1): ?> Slider <?php elseif($data->status==2): ?> Gallery <?php elseif($data->status==3): ?> Video <?php elseif($data->status==4): ?> Selfie Gallery <?php else: ?> None <?php endif; ?> </option>
                                    <option value="1">Slider</option>
                                    <option value="2">Gallery</option>
                                    <option value="3">Video </option>
                                    <option value="4">Selfie Gallery</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            
                            <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                <div class="select_2_alska2">
                                  <label class="FormLabel1"><?php echo e(__('Image Url')); ?>*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <input type="text" name="url"  value="<?php echo e($data->url); ?>">
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
         

<?php elseif(Auth::user()->roleStatus==2): ?>



          <div class="text-center btn btn-success"><h1>Profile Images</h1></div><hr>
          <form role="form" method="POST" action="<?php echo e(url('profile/image/store')); ?>" enctype="multipart/form-data">
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
                        <label class="FormLabel1"><?php echo e(__('Profile Image')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="image" type="file" accept="image/*" value="0">
                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;">
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
                          <option value="1">Slider</option>
                          <option value="2">Gallery</option>
                          <option value="3">Video </option>
                          <option value="4">Selfie Gallery</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Image Url')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="url">
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
                <th><?php echo e(__('Picture')); ?></th>
                <th><?php echo e(__('Escort')); ?></th>
                <th><?php echo e(__('Status')); ?></th>
                <th><?php echo e(__('Url')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $pfimages =\App\ProfileImage::all()->where('escortId', Auth::user()->id );?>
              <?php $i=1;?>
              <?php $__currentLoopData = $pfimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>00<?php echo e($i++); ?></td>
                <td><?php if($data->image==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$data->image)); ?>" style="width: 30px;"><?php endif; ?></td>
                <td><?php echo e(\App\User::find($data->escortId)->name); ?></td>
                <td><?php if($data->status==1): ?> Slider <?php elseif($data->status==2): ?> Gallery <?php elseif($data->status==3): ?> Video Gallery <?php else: ?> Selfie Gallery <?php endif; ?></td>
                <td><?php echo e($data->url); ?></td>
                
                
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl<?php echo e($data->id); ?>">Modify</a> <a href="<?php echo e(url('profile/image/delete/'.$data->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
                
                
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </table>
            <!--  ==================================Modal Start============================================= -->
            <?php $__currentLoopData = $pfimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="modal fade" id="modal-xl<?php echo e($data->id); ?>">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header" style="background: #b00404;">
                    <h4 class="modal-title">Modify Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form role="form" method="POST" action="<?php echo e(url('profile/image/update')); ?>" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="modal-body">
                      
                      <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
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
                                    <option value="<?php echo e($data->escortId); ?>">Current <?php echo e(\App\User::find($data->escortId)->name); ?></option>
                                    <option value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->name); ?></option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                <div class="select_2_alska2">
                                  <label class="FormLabel1"><?php echo e(__('Profile Image')); ?>*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <input name="image" type="file" accept="image/*" value="<?php echo e($data->image); ?>">
                                  <?php if($data->image==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$data->image)); ?>" style="width: 30px;"><?php endif; ?>
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
                                    <option value="<?php echo e($data->status); ?>">Current <?php if($data->status==1): ?> Slider <?php elseif($data->status==2): ?> Gallery <?php elseif($data->status==3): ?> Video <?php elseif($data->status==4): ?> Selfie Gallery <?php else: ?> None <?php endif; ?> </option>
                                    <option value="1">Slider</option>
                                    <option value="2">Gallery</option>
                                    <option value="3">Video </option>
                                    <option value="4">Selfie Gallery</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            
                            <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                <div class="select_2_alska2">
                                  <label class="FormLabel1"><?php echo e(__('Image Url')); ?>*</label>
                                </div>
                                <div class="selct_2_alska">
                                  <input type="text" name="url"  value="<?php echo e($data->url); ?>">
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
          


<?php endif; ?>














                      </div>
                      
                      
                      
                      
                    </div>
                    
                  </div>
                </section>
              </div>
              <?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.editormaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/front_pages/profile.blade.php ENDPATH**/ ?>