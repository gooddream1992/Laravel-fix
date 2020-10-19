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
          


          <div class="text-center btn btn-success"><h1>Independent Escort</h1></div><hr>
          <form role="form" method="POST" action="<?php echo e(url('independent/update')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


            <?php $indpnts= \App\Independent::all();?>
            <?php $__currentLoopData = $indpnts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indpnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="id" value="<?php echo e($indpnt->id); ?>">
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Icon Image')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon" type="file" accept="image/*" value="0">
                       <?php if($indpnt->icon==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$indpnt->icon)); ?>" style="width: 100%;"><?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Background')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="bgimage" type="file" accept="image/*" value="0">
                       <?php if($indpnt->bgimage==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width:100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$indpnt->bgimage)); ?>" style="width: 100%;"><?php endif; ?>
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
                        <label class="FormLabel1"><?php echo e(__('Title Head')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="topHead" value="<?php echo e($indpnt->topHead); ?>" >
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title" value="<?php echo e($indpnt->title); ?>" >
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Descritption')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea name="description" class="textarea"><?php echo e($indpnt->description); ?></textarea>
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
<?php echo $__env->make('masters.editormaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe-front\resources\views/admin/front_pages/homePage.blade.php ENDPATH**/ ?>