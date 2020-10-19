<?php $__env->startSection('title', 'Header and Footer'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Header and Footer</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form role="form" method="POST" action="<?php echo e(url('header/footer/store')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Header Logo')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="headerLogo" type="file" accept="image/*" value="0" >
                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 50%;height:30px;">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Footer Logo')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="footerLogo" type="file" accept="image/*" value="0" >
                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 50%;height:30px;">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Facebook')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="facebook" type="file" accept="image/*" value="0" >
                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 50%;height:30px;">
                        <input name="facebookurl" type="text" placeholder="Facebook URL">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Youtube')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="youtube" type="file" accept="image/*" value="0" >
                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 50%;height:30px;">
                        <input name="youtubeurl" type="text" placeholder="Youtube URL">
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Linked In')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="linkedin" type="file" accept="image/*" value="0" >
                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 50%;height:30px;">
                        <input name="linkedinurl" type="text" placeholder="Linked In URL">
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
                        <label class="FormLabel1"><?php echo e(__('Tweeter')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="tweeter" type="file" accept="image/*" value="0" >
                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 50%;height:30px;">
                        <input name="tweeterurl" type="text" placeholder="Tweeter URL">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Instagram')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="instagram" type="file" accept="image/*" value="0" >
                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 50%;height:30px;">
                        <input name="instagramurl" type="text" placeholder="Instagram URL">
                      </div>
                    </div>
                  </div>
                  
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Footer Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="footerTitle">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Copyrights Info')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="copyrights">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Footer Info')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <textarea class="form-control" name="footerInfo"></textarea>
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
                <table id="example" class="table table-striped table-responsive table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><?php echo e(__('ID No.')); ?></th>
                <th><?php echo e(__('Header Logo')); ?></th>
                <th><?php echo e(__('Footer Logo')); ?></th>
                <th><?php echo e(__('Facebook')); ?></th>
                <th><?php echo e(__('Youtube')); ?></th>
                <th><?php echo e(__('Tweeter')); ?></th>
                <th><?php echo e(__('Linkedin')); ?></th>
                <th><?php echo e(__('Instagram')); ?></th>
                <th><?php echo e(__('Footer Title')); ?></th>
                <th><?php echo e(__('Footer Info')); ?></th>
                <th><?php echo e(__('Copyrights')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $headerfooters =\App\HeaderFooter::all();?>
             
              <?php $__currentLoopData = $headerfooters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hedfoot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($hedfoot->id); ?></td>
                <td><?php if($hedfoot->headerLogo==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$hedfoot->headerLogo)); ?>" style="width: 30px;"><?php endif; ?></td>

                <td><?php if($hedfoot->footerLogo==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$hedfoot->footerLogo)); ?>" style="width: 30px;"><?php endif; ?></td>

                <td><?php if($hedfoot->facebook==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$hedfoot->facebook)); ?>" style="width: 30px;"><?php endif; ?></td>

                <td><?php if($hedfoot->youtube==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$hedfoot->youtube)); ?>" style="width: 30px;"><?php endif; ?></td>

                <td><?php if($hedfoot->linkedin==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$hedfoot->linkedin)); ?>" style="width: 30px;"><?php endif; ?></td>

                <td><?php if($hedfoot->instagram==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$hedfoot->instagram)); ?>" style="width: 30px;"><?php endif; ?></td>

                <td><?php if($hedfoot->tweeter==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$hedfoot->tweeter)); ?>" style="width: 30px;"><?php endif; ?></td>

                <td><?php echo e($hedfoot->footerTitle); ?></td>
                <td><?php echo e($hedfoot->footerInfo); ?></td>
                <td><?php echo e($hedfoot->copyrights); ?></td>

                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl<?php echo e($hedfoot->id); ?>">Modify</a> <a href="<?php echo e(url('header/footer/delete/'.$hedfoot->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
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
        <?php $__currentLoopData = $headerfooters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hedfoot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-xl<?php echo e($hedfoot->id); ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="<?php echo e(url('header/footer/update')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            
            <input type="hidden" name="id" value="<?php echo e($hedfoot->id); ?>">
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Header Logo')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="headerLogo" type="file" accept="image/*" value="<?php echo e($hedfoot->headerLogo); ?>" >
                        <?php if($hedfoot->headerLogo==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$hedfoot->headerLogo)); ?>" style="width: 30px;"><?php endif; ?>
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Footer Logo')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="footerLogo" type="file" accept="image/*" value="<?php echo e($hedfoot->footerLogo); ?>" >
                       <?php if($hedfoot->footerLogo==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$hedfoot->footerLogo)); ?>" style="width: 30px;"><?php endif; ?>
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Facebook')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="facebook" type="file" accept="image/*" value="<?php echo e($hedfoot->facebook); ?>" >
                         <?php if($hedfoot->facebook==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$hedfoot->facebook)); ?>" style="width: 30px;"><?php endif; ?>
                        <input name="facebookurl" type="text" value="<?php echo e($hedfoot->facebookurl); ?>" class="form-control">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Youtube')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="youtube" type="file" accept="image/*" value="<?php echo e($hedfoot->youtube); ?>" >
                        <?php if($hedfoot->youtube==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$hedfoot->youtube)); ?>" style="width: 30px;"><?php endif; ?>
                        <input name="youtubeurl" type="text" value="<?php echo e($hedfoot->youtubeurl); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Linked In')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="linkedin" type="file" accept="image/*" value="<?php echo e($hedfoot->linkedin); ?>" >
                        <?php if($hedfoot->linkedin==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$hedfoot->linkedin)); ?>" style="width: 30px;"><?php endif; ?>
                        <input name="linkedinurl" type="text" value="<?php echo e($hedfoot->linkedinurl); ?>" class="form-control">
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
                        <label class="FormLabel1"><?php echo e(__('Tweeter')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="tweeter" type="file" accept="image/*" value="<?php echo e($hedfoot->tweeter); ?>" >
                         <?php if($hedfoot->tweeter==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$hedfoot->tweeter)); ?>" style="width: 30px;"><?php endif; ?>
                        <input name="tweeterurl" type="text" value="<?php echo e($hedfoot->tweeterurl); ?>" class="form-control">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Instagram')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input name="instagram" type="file" accept="image/*" value="<?php echo e($hedfoot->instagram); ?>" >
                         <?php if($hedfoot->instagram==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$hedfoot->instagram)); ?>" style="width: 30px;"><?php endif; ?>
                        <input name="instagramurl" type="text" value="<?php echo e($hedfoot->instagramurl); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Footer Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="footerTitle" value="<?php echo e($hedfoot->footerTitle); ?>" class="form-control">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Copyrights Info')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea class="form-control" name="copyrights"><?php echo e($hedfoot->copyrights); ?></textarea>
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Footer Info')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <textarea class="form-control" name="footerInfo"><?php echo e($hedfoot->footerInfo); ?></textarea>
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
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/admin/general_setting/headerFooter.blade.php ENDPATH**/ ?>