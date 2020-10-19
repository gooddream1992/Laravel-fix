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
                   <?php $pfimages =\App\ProfileImage::all();?>
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
<!-- ==================================Modal============================================= -->
















 <div class="text-center btn btn-success"><h1>Profile Description</h1></div><hr>
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
                          <option value="1">About Me</option>
                          <option value="2">Service offer</option>
                          <option value="3">Domestic Tours</option>
                          <option value="4">International Tours</option>
                          <option value="5">Interests & Favourite Things</option>
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
                <th><?php echo e(__('Description')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $pfdescrs =\App\ProfileDescription::all();?>
                 <?php $i=1;?>
              <?php $__currentLoopData = $pfdescrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>00<?php echo e($i++); ?></td>
                
                <td><?php echo e(\App\User::find($data1->escortId)->name); ?></td>
                <td><?php if($data1->status==1): ?> About Me <?php elseif($data1->status==2): ?> Service offer <?php elseif($data1->status==3): ?> Domestic Tour <?php elseif($data1->status==4): ?> International Tours <?php elseif($data1->status==5): ?> Interests & Favourite Things <?php else: ?> None <?php endif; ?></td>
                <td><?php echo $data1->description; ?></td>
              
              
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfdes<?php echo e($data1->id); ?>">Modify</a> <a href="<?php echo e(url('profile/description/delete/'.$data1->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </table>



<!--  ==================================Modal Start============================================= -->
      <?php $__currentLoopData = $pfdescrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-xl-pfdes<?php echo e($data1->id); ?>">
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
                          <?php $escorts1= \App\User::all()->where('roleStatus', 2);?>
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



 <div class="text-center btn btn-success"><h1>Profile List</h1></div><hr>
          <form role="form" method="POST" action="<?php echo e(url('profile/list/store')); ?>" enctype="multipart/form-data">
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
                          <option value="1">Service offer</option>
                          <option value="2">Rate(In Call)</option>
                          <option value="3">Rate(Out Call)</option>
                          <option value="4">Availability</option>
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
                <th><?php echo e(__('Description')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $pflist =\App\ProfileList::all();?>
                 <?php $i=1;?>
              <?php $__currentLoopData = $pflist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>00<?php echo e($i++); ?></td>
                
                <td><?php echo e(\App\User::find($data2->escortId)->name); ?></td>
                <td><?php if($data2->status==1): ?> Service offer <?php elseif($data2->status==2): ?> Rate(In Call) <?php elseif($data2->status==3): ?> Rate(Out Call) <?php elseif($data2->status==4): ?> Availability <?php else: ?> None <?php endif; ?> </td>
                <td><?php echo $data2->description; ?></td>
              
              
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pflist<?php echo e($data2->id); ?>">Modify</a><a href="<?php echo e(url('profile/list/delete/'.$data2->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </table>


<!--  ==================================Modal Start============================================= -->
     <?php $__currentLoopData = $pflist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-xl-pflist<?php echo e($data2->id); ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="<?php echo e(url('profile/list/update')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            
            <input type="hidden" name="id" value="<?php echo e($data2->id); ?>">
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
                          <option value="<?php echo e($data2->escortId); ?>">Current <?php echo e(\App\User::find($data2->escortId)->name); ?></option>
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
                          <option value="<?php echo e($data2->status); ?>">Current <?php if($data2->status==1): ?> Service offer <?php elseif($data2->status==2): ?> Rate(In Call) <?php elseif($data2->status==3): ?> Rate(Out Call) <?php elseif($data2->status==4): ?> Availability <?php else: ?> None <?php endif; ?> </option>
                           <option value="1">Service offer</option>
                          <option value="2">Rate(In Call)</option>
                          <option value="3">Rate(Out Call)</option>
                          <option value="4">Availability</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  
                  <div class="col-lg-12">
                      <div class="selct_2_alska">
                        <textarea class="textarea" name="description"><?php echo e($data2->description); ?></textarea>
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



<div class="text-center btn btn-success"><h1>Profile Availability</h1></div><hr>
          <form role="form" method="POST" action="<?php echo e(url('profile/availability/store')); ?>" enctype="multipart/form-data">
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
                        <label class="FormLabel1"><?php echo e(__('Weekday')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="weekday">
                          <option value="Saturday">Saturday</option>
                          <option value="Sunday">Sunday</option>
                          <option value="Monday">Monday</option>
                          <option value="Tuesday">Tuesday</option>
                          <option value="Wednesday">Wednesday</option>
                          <option value="Thirsday">Thirsday</option>
                          <option value="Friday">Friday</option>
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
                        <label class="FormLabel1"><?php echo e(__('From')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="fromDate">
                          <option value="1:00 AM">1:00 AM</option>
                          <option value="2:00 AM">2:00 AM</option>
                          <option value="3:00 AM">3:00 AM</option>
                          <option value="4:00 AM">4:00 AM</option>
                          <option value="5:00 AM">5:00 AM</option>
                          <option value="6:00 AM">6:00 AM</option>
                          <option value="7:00 AM">7:00 AM</option>
                          <option value="8:00 AM">8:00 AM</option>
                          <option value="9:00 AM">9:00 AM</option>
                          <option value="10:00 AM">10:00 AM</option>
                          <option value="11:00 AM">11:00 AM</option>
                          <option value="12:00 AM">12:00 AM</option>
                          <option value="13:00 PM">13:00 PM</option>
                          <option value="14:00 PM">14:00 PM</option>
                          <option value="15:00 PM">15:00 PM</option>
                          <option value="16:00 PM">16:00 PM</option>
                          <option value="17:00 PM">17:00 PM</option>
                          <option value="18:00 PM">18:00 PM</option>
                          <option value="19:00 PM">19:00 PM</option>
                          <option value="20:00 PM">20:00 PM</option>
                          <option value="21:00 PM">21:00 PM</option>
                          <option value="22:00 PM">22:00 PM</option>
                          <option value="23:00 PM">23:00 PM</option>
                          <option value="24:00 PM">24:00 PM</option>
                        </select>
                      </div>
                    </div>
                  </div>


                 
                  
                <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Until')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                         <select class="form-control" name="untilDate">
                          <option value="1:00 AM">1:00 AM</option>
                          <option value="2:00 AM">2:00 AM</option>
                          <option value="3:00 AM">3:00 AM</option>
                          <option value="4:00 AM">4:00 AM</option>
                          <option value="5:00 AM">5:00 AM</option>
                          <option value="6:00 AM">6:00 AM</option>
                          <option value="7:00 AM">7:00 AM</option>
                          <option value="8:00 AM">8:00 AM</option>
                          <option value="9:00 AM">9:00 AM</option>
                          <option value="10:00 AM">10:00 AM</option>
                          <option value="11:00 AM">11:00 AM</option>
                          <option value="12:00 AM">12:00 AM</option>
                          <option value="13:00 PM">13:00 PM</option>
                          <option value="14:00 PM">14:00 PM</option>
                          <option value="15:00 PM">15:00 PM</option>
                          <option value="16:00 PM">16:00 PM</option>
                          <option value="17:00 PM">17:00 PM</option>
                          <option value="18:00 PM">18:00 PM</option>
                          <option value="19:00 PM">19:00 PM</option>
                          <option value="20:00 PM">20:00 PM</option>
                          <option value="21:00 PM">21:00 PM</option>
                          <option value="22:00 PM">22:00 PM</option>
                          <option value="23:00 PM">23:00 PM</option>
                          <option value="24:00 PM">24:00 PM</option>
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
                <th><?php echo e(__('Escort')); ?></th>
                <th><?php echo e(__('Weekday')); ?></th>
                <th><?php echo e(__('From')); ?></th>
                <th><?php echo e(__('Untill')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $pfavails =\App\ProfileAvailability::all();?>
                 <?php $i=1;?>
              <?php $__currentLoopData = $pfavails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>00<?php echo e($i++); ?></td>
                
                <td><?php echo e(\App\User::find($data3->escortId)->name); ?></td>
                <td><?php echo e($data3->weekday); ?></td>
                <td><?php echo e($data3->fromDate); ?></td>
                <td><?php echo e($data3->untilDate); ?></td>
              
              
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfavails<?php echo e($data3->id); ?>">Modify</a> <a href="<?php echo e(url('profile/availability/delete/'.$data3->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </table>


<!--  ==================================Modal Start============================================= -->
     <?php $__currentLoopData = $pfavails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-xl-pfavails<?php echo e($data3->id); ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="<?php echo e(url('profile/availability/update')); ?>" enctype="multipart/form-data">
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

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Weekday')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="weekday">
                          <option value="<?php echo e($data3->weekday); ?>">Current <?php echo e($data3->weekday); ?></option>
                          <option value="Saturday">Saturday</option>
                          <option value="Sunday">Sunday</option>
                          <option value="Monday">Monday</option>
                          <option value="Tuesday">Tuesday</option>
                          <option value="Wednesday">Wednesday</option>
                          <option value="Thirsday">Thirsday</option>
                          <option value="Friday">Friday</option>
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
                        <label class="FormLabel1"><?php echo e(__('From')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="fromDate">
                          <option value="<?php echo e($data3->fromDate); ?>">Current <?php echo e($data3->fromDate); ?> </option>
                          <option value="1:00 AM">1:00 AM</option>
                          <option value="2:00 AM">2:00 AM</option>
                          <option value="3:00 AM">3:00 AM</option>
                          <option value="4:00 AM">4:00 AM</option>
                          <option value="5:00 AM">5:00 AM</option>
                          <option value="6:00 AM">6:00 AM</option>
                          <option value="7:00 AM">7:00 AM</option>
                          <option value="8:00 AM">8:00 AM</option>
                          <option value="9:00 AM">9:00 AM</option>
                          <option value="10:00 AM">10:00 AM</option>
                          <option value="11:00 AM">11:00 AM</option>
                          <option value="12:00 AM">12:00 AM</option>
                          <option value="13:00 PM">13:00 PM</option>
                          <option value="14:00 PM">14:00 PM</option>
                          <option value="15:00 PM">15:00 PM</option>
                          <option value="16:00 PM">16:00 PM</option>
                          <option value="17:00 PM">17:00 PM</option>
                          <option value="18:00 PM">18:00 PM</option>
                          <option value="19:00 PM">19:00 PM</option>
                          <option value="20:00 PM">20:00 PM</option>
                          <option value="21:00 PM">21:00 PM</option>
                          <option value="22:00 PM">22:00 PM</option>
                          <option value="23:00 PM">23:00 PM</option>
                          <option value="24:00 PM">24:00 PM</option>
                        </select>
                      </div>
                    </div>
                  </div>


                 
                  
                <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Until')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                         <select class="form-control" name="untilDate">
                          <option value="<?php echo e($data3->untilDate); ?>">Current <?php echo e($data3->untilDate); ?> </option>
                          <option value="1:00 AM">1:00 AM</option>
                          <option value="2:00 AM">2:00 AM</option>
                          <option value="3:00 AM">3:00 AM</option>
                          <option value="4:00 AM">4:00 AM</option>
                          <option value="5:00 AM">5:00 AM</option>
                          <option value="6:00 AM">6:00 AM</option>
                          <option value="7:00 AM">7:00 AM</option>
                          <option value="8:00 AM">8:00 AM</option>
                          <option value="9:00 AM">9:00 AM</option>
                          <option value="10:00 AM">10:00 AM</option>
                          <option value="11:00 AM">11:00 AM</option>
                          <option value="12:00 AM">12:00 AM</option>
                          <option value="13:00 PM">13:00 PM</option>
                          <option value="14:00 PM">14:00 PM</option>
                          <option value="15:00 PM">15:00 PM</option>
                          <option value="16:00 PM">16:00 PM</option>
                          <option value="17:00 PM">17:00 PM</option>
                          <option value="18:00 PM">18:00 PM</option>
                          <option value="19:00 PM">19:00 PM</option>
                          <option value="20:00 PM">20:00 PM</option>
                          <option value="21:00 PM">21:00 PM</option>
                          <option value="22:00 PM">22:00 PM</option>
                          <option value="23:00 PM">23:00 PM</option>
                          <option value="24:00 PM">24:00 PM</option>
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
<!-- ==================================Modal============================================= -->

<div class="text-center btn btn-success"><h1>Profile Tours</h1></div><hr>
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
                        <input type="date" name="startDate">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('End Date')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="date" name="endDate">
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
                   <?php $pftours =\App\ProfileTour::all();?>
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




          <div class="text-center btn btn-success"><h1>Profile Blog</h1></div><hr>
          <form role="form" method="POST" action="<?php echo e(url('profile/blog/store')); ?>" enctype="multipart/form-data">
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
                          <option value="1">Blog</option>
                           <option value="2">Wishlist</option>
                          <option value="3">testimonials </option>
                        </select>
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title">
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
                        <label class="FormLabel1"><?php echo e(__('Image')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="image" type="file" accept="image/*" value="0">
                      <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;">
                      </div>
                    </div>
                  </div>

                 
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Url')); ?>*</label>
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
                <th><?php echo e(__('Escort')); ?></th>
                <th><?php echo e(__('Status')); ?></th>
                <th><?php echo e(__('Title')); ?></th>
                <th><?php echo e(__('Image')); ?></th>
                <th><?php echo e(__('URL')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $pfblogs =\App\ProfileBlog::all();?>
                 <?php $i=1;?>
              <?php $__currentLoopData = $pfblogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data5): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>00<?php echo e($i++); ?></td>
                
                <td><?php echo e(\App\User::find($data5->escortId)->name); ?></td>
                <td><?php if($data5->status==1): ?> Blog <?php elseif($data5->status==2): ?> Wishlist <?php elseif($data5->status==3): ?> testimonials <?php else: ?> <?php endif; ?></td>
                <td><?php echo e($data5->title); ?></td>
                 <td><?php if($data5->image==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$data5->image)); ?>" style="width: 30px;"><?php endif; ?></td>
                <td><?php echo e($data5->url); ?></td>
              
              
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfblogs<?php echo e($data5->id); ?>">Modify</a> <a href="<?php echo e(url('profile/blog/delete/'.$data5->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </table>








<!--  ==================================Modal Start============================================= -->
   <?php $__currentLoopData = $pfblogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data5): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-xl-pfblogs<?php echo e($data5->id); ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="<?php echo e(url('profile/blog/update')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            
            <input type="hidden" name="id" value="<?php echo e($data5->id); ?>">
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
                          <option value="<?php echo e($data5->escortId); ?>">Current <?php echo e(\App\User::find($data5->escortId)->name); ?></option>
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
                          <option value="<?php echo e($data5->status); ?>"><?php if($data5->status==1): ?> Blog <?php elseif($data5->status==2): ?> Wishlist <?php elseif($data5->status==3): ?> testimonials <?php else: ?> <?php endif; ?></option>
                          <option value="1">Blog</option>
                           <option value="2">Wishlist</option>
                          <option value="3">testimonials </option>
                        </select>
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title" value="<?php echo e($data5->title); ?>">
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
                        <label class="FormLabel1"><?php echo e(__('Image')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="image" type="file" accept="image/*" value="<?php echo e($data5->image); ?>">
                      <?php if($data5->image==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$data5->image)); ?>" style="width: 30px;"><?php endif; ?>
                      </div>
                    </div>
                  </div>

                 
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Url')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="url" value="<?php echo e($data5->url); ?>">
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








     





        </div>
        
        
        
        
      </div>
      
    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.editormaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/admin/front_pages/profile.blade.php ENDPATH**/ ?>