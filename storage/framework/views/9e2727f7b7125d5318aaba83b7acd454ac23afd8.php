<?php $__env->startSection('title', 'Profile Details'); ?>
<?php $__env->startSection('main'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="content-wrapper">


  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
       
        <!-- /.card-header -->
        <div class="card-body">
<a href="<?php echo e(url('/home')); ?>" class="btn btn-primary">Back</a><hr>
          <div class="text-center btn btn-success" style="width: 100%"><h3>
             <a href="<?php echo e(url('escort/profile/image')); ?>" class="btn btn-light">Gallery</a>
                     <a href="<?php echo e(route('escort.slider')); ?>" class="btn btn-light">Slider</a>
                     <a href="<?php echo e(route('escort.video')); ?>" class="btn btn-light">Video</a>
                     <a href="<?php echo e(route('escort.selfie')); ?>" class="btn btn-light">Selfie Gallery</a> <!-- Profile Images -->
              
            </h3>
          </div>
          <br><br>
          
          <a href="<?php echo e(route('addgallery')); ?>" class="btn btn-success">Add Gallery Image</a>
          <hr>
            

          <!-- Gallert Start's Here -->
            <div class="row">
              <div class="col-md-12">
                <div id="mdb-lightbox-ui"></div>
                <div class="mdb-lightbox no-margin">
                  <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <figure class="col-md-4">
                      <a href="<?php echo e(route('escort.profile-image-gallery',$value->id)); ?>" data-size="1600x1067" title="Edit Image Gallery">
                        <img alt="picture" src="<?php echo e(asset('public/uploads/'.$value->image)); ?> " class="img-fluid" style=" border-radius: 8px; width: 500px; height: 300px;"><br><br>
                      </a>
                     </figure>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
            <!-- Gallert End's Here -->

       <!--    <form role="form" method="POST" action="<?php echo e(url('profile/image/store')); ?>" enctype="multipart/form-data">
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
                         <option value="<?php if(isset($profile_images[0]->userid)): ?> <?php echo e($profile_images[0]->userid); ?> <?php endif; ?>"><?php if(isset($profile_images[0]->name)): ?> <?php echo e($profile_images[0]->name); ?> <?php endif; ?></option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"> <?php echo e(__('Profile Image')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="image" type="file" accept="image/*" value="0">
                        <img src="<?php if(isset($profile_images[0]->image) && !empty($profile_images[0]->image)): ?> <?php echo e(asset('public/uploads/'.$profile_images[0]->image)); ?> <?php else: ?> <?php echo e(asset('public/blankphoto.png')); ?> <?php endif; ?>" style="width: 100%;">
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
                          <option value="1" <?php if(isset($profile_images[0]->slider) && $profile_images[0]->slider == 1): ?> Selected <?php endif; ?> >Slider</option>
                          <option value="2" <?php if(isset($profile_images[0]->slider) && $profile_images[0]->slider == 2): ?> Selected <?php endif; ?> >Gallery</option>
                          <option value="3" <?php if(isset($profile_images[0]->slider) && $profile_images[0]->slider == 3): ?> Selected <?php endif; ?> >Video </option>
                          <option value="4" <?php if(isset($profile_images[0]->slider) && $profile_images[0]->slider == 4): ?> Selected <?php endif; ?> >Selfie Gallery</option>
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
                        <input type="text" name="url" class="form-control" value="<?php if(isset($profile_images[0]->url)): ?> <?php echo e($profile_images[0]->url); ?> <?php endif; ?>">
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
            
          </form> -->
         <!--  <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th><?php echo e(__('Picture')); ?></th>
                <th><?php echo e(__('Escort')); ?></th>
                <th><?php echo e(__('Status')); ?></th>
                <th><?php echo e(__('Url')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php
              /*  $pfimages =\App\ProfileImage::all()->where('escortId', Auth::user()->id );*/
              ?>
              <?php $i=1;?>
              <tr>
                <td>
                  <img src="<?php if(isset($profile_images[0]->image) && !empty($profile_images[0]->image)): ?> <?php echo e(asset('public/uploads/'.$profile_images[0]->image)); ?> <?php else: ?> <?php echo e(asset('public/blankphoto.png')); ?> <?php endif; ?>" style="width: 30px;">
                </td>
                <td>
                  <?php if(isset($profile_images[0]->name)): ?> <?php echo e($profile_images[0]->name); ?> <?php endif; ?>
                </td>
                <td>
                  <?php if(isset($profile_images[0]->slider)): ?>
                    <?php echo e(($profile_images[0]->slider ==1) ? "Slider" : ""); ?>

                    <?php echo e(($profile_images[0]->slider ==2) ? "Gallery" : ""); ?>

                    <?php echo e(($profile_images[0]->slider ==3) ? "Video" : ""); ?>

                    <?php echo e(($profile_images[0]->slider ==4) ? "Selfie Gallery" : ""); ?>

                  <?php endif; ?>
                </td>
                <td>
                  <?php if(isset($profile_images[0]->url)): ?> <?php echo e($profile_images[0]->url); ?> <?php endif; ?>
                </td>
                
                
                <td>
                  <?php if(isset($profile_images[0]->id)): ?>
                  <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl<?php echo e($profile_images[0]->id); ?>">Modify</a>
                  <a href="<?php echo e(url('profile/image/delete/'.$profile_images[0]->id)); ?>" class="btn btn-xs btn-danger">Delete</a>
                   <?php endif; ?>
                </td>
                
                
                
              </tr>
              
            </table> -->
            <?php
                $pfimages =\App\ProfileImage::all()->where('escortId', Auth::user()->id );
              ?>
            <!--  ==================================Modal Start============================================= -->
            <?php $__currentLoopData = $pfimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="modal fade" id="modal-xl<?php echo e($profile_images[0]->id); ?>">
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


                      </div>
                      
                      
                      
                      
                    </div>
                    
                  </div>
                </section>
              </div>
              <?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/profileImage.blade.php ENDPATH**/ ?>