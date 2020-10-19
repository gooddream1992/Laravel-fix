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
          <form role="form" method="POST" action="<?php echo e(url('slider/store')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                        <input name="slider" type="file" accept="image/*" value="0" >
                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;height:100px;">
                        <p class="help-block"><?php echo e(__('Upload Slider1 Image max 1mb')); ?></p>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                        <input name="slider1" type="file" accept="image/*" value="0" >
                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;height:100px;">
                        <p class="help-block"><?php echo e(__('Upload Slider2 Image max 1mb')); ?></p>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                        <input name="slider2" type="file" accept="image/*" value="0" >
                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;height:100px;">
                        <p class="help-block"><?php echo e(__('Upload Slider3 Image max 1mb')); ?></p>
                    </div>
                  </div>
                 

                  
                  
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Category')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <select class="form-control" name="category">
                        <option value="1">Home</option>
                        <option value="2">Explore Cities</option>
                        <option value="3">Terms & Condition</option>
                        <option value="4">Business Etiquette</option>
                        <option value="5">Our Story</option>
                        <option value="6">FAQ</option>
                        <option value="7">Client Membership</option>
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

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Description')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <textarea class="form-control" name="description"></textarea>
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




<div class="row">
              
              <div class="col-md-12">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><?php echo e(__('ID No.')); ?></th>
                <th><?php echo e(__('Category')); ?></th>
                <th><?php echo e(__('Title')); ?></th>
                <th><?php echo e(__('Description')); ?></th>
                <th><?php echo e(__('Slider1')); ?></th>
                <th><?php echo e(__('Slider2')); ?></th>
                <th><?php echo e(__('Slider3')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $sliders =\App\Slider::all();?>
             
              <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($slider->id); ?></td>
                <td> <?php if($slider->category==1): ?> Home <?php elseif($slider->category==2): ?> Explore Cities <?php elseif($slider->category==3): ?> Terms & Condition <?php elseif($slider->category==4): ?>  Business Etiquette <?php elseif($slider->category==5): ?> Our Story <?php elseif($slider->category==6): ?> FAQ <?php elseif($slider->category==7): ?> Client Membership <?php else: ?> <?php endif; ?></td>
                <td><?php echo e($slider->title); ?></td>
                <td><?php echo e($slider->description); ?></td>
                <td><?php if($slider->slider==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$slider->slider)); ?>" style="width: 30px;"><?php endif; ?></td>
                <td><?php if($slider->slider1==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$slider->slider1)); ?>" style="width: 30px;"><?php endif; ?></td>
                <td><?php if($slider->slider2==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$slider->slider2)); ?>" style="width: 30px;"><?php endif; ?></td>
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl<?php echo e($slider->id); ?>">Modify</a> <a href="<?php echo e(url('slider/delete/'.$slider->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </table>
              </div>











            </div>
            
          
          
        </div>
        
      </div>
    </section>
  </div>






<!-- Modal Start================ -->
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-xl<?php echo e($slider->id); ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="<?php echo e(url('slider/update')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            
            <input type="hidden" name="id" value="<?php echo e($slider->id); ?>">
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                        <input name="slider" type="file" accept="image/*" value="<?php echo e($slider->slider); ?>" >
                        <?php if($slider->slider==NULL): ?> <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;height:100px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$slider->slider)); ?>" style="width:100%;"> <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                         <input name="slider1" type="file" accept="image/*" value="<?php echo e($slider->slider1); ?>" >
                        <?php if($slider->slider1==NULL): ?> <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;height:100px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$slider->slider1)); ?>" style="width:100%;"> <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                       <input name="slider2" type="file" accept="image/*" value="<?php echo e($slider->slider2); ?>" >
                        <?php if($slider->slider2==NULL): ?> <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;height:100px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$slider->slider2)); ?>" style="width:100%;"> <?php endif; ?>
                    </div>
                  </div>
                  
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Category')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <select class="form-control" name="category">
                        <option value="<?php echo e($slider->category); ?>">Current <?php if($slider->category==1): ?> Home <?php elseif($slider->category==2): ?> Explore Cities <?php elseif($slider->category==3): ?> <?php elseif($slider->category==3): ?> Terms & Condition <?php elseif($slider->category==4): ?>  Business Etiquette <?php elseif($slider->category==5): ?> Our Story <?php elseif($slider->category==6): ?> FAQ <?php elseif($slider->category==7): ?> Client Membership <?php else: ?> <?php endif; ?></option>
                        <option value="1">Home</option>
                        <option value="2">Explore Cities</option>
                        <option value="3">Terms & Condition</option>
                        <option value="4">Business Etiquette</option>
                        <option value="5">Our Story</option>
                        <option value="6">FAQ</option>
                        <option value="7">Client Membership</option>
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
                       <input type="text" name="title" class="form-control" value="<?php echo e($slider->title); ?>">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Description')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <textarea class="form-control" name="description"><?php echo e($slider->description); ?></textarea>
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
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe-front\resources\views/admin/general_setting/sliderAdd.blade.php ENDPATH**/ ?>