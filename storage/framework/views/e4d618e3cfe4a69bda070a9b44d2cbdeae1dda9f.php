
<?php $__env->startSection('title', 'Home Page'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Home Page</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          




<div class="text-center btn btn-success"><h1>Service provider resources</h1></div><hr>
          <form role="form" method="POST" action="<?php echo e(url('provider/resource/update')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


             <?php $provresrcs= \App\ProviderResource::all();?>
            <?php $__currentLoopData = $provresrcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resourc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="id" value="<?php echo e($resourc->id); ?>"> 

            <div class="row">
              
              <div class="col-md-6">
                <div class="row">

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Title Head')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="titleHead" value="<?php echo e($resourc->titleHead); ?>">
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Intro')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea name="intro" class="textarea"><?php echo e($resourc->intro); ?></textarea>
                      </div>
                    </div>
                  </div>


                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Trafficking Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title1" value="<?php echo e($resourc->title1); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Trafficking Icon')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon1" type="file" accept="image/*" value="0">
                        <?php if($resourc->icon1==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$resourc->icon1)); ?>" style="width: 100%;"><?php endif; ?>
                      </div>
                    </div>
                  </div>

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Resources Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title2" value="<?php echo e($resourc->title2); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Resources Icon')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon2" type="file" accept="image/*" value="0">
                       <?php if($resourc->icon2==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$resourc->icon2)); ?>" style="width: 100%;"><?php endif; ?>
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
                        <label class="FormLabel1"><?php echo e(__('Purchase Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title3" value="<?php echo e($resourc->title3); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Purchase Icon')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon3" type="file" accept="image/*" value="0">
                        <?php if($resourc->icon3==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$resourc->icon3)); ?>" style="width: 100%;"><?php endif; ?>
                      </div>
                    </div>
                  </div>


                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Become Escort Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title4" value="<?php echo e($resourc->title4); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Become Escort Icon')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon4" type="file" accept="image/*" value="0">
                       <?php if($resourc->icon4==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$resourc->icon4)); ?>" style="width: 100%;"><?php endif; ?>
                      </div>
                    </div>
                  </div>


                 

                 
                  
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Update">
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
                
              </div>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </form>







        </div>
        
        
        
        
      </div>
      
    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.editormaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/home/providerResource.blade.php ENDPATH**/ ?>