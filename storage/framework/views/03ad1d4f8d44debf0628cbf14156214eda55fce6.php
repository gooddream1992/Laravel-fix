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
          





<div class="text-center btn btn-success"><h1>About</h1></div><hr>
          <form role="form" method="POST" action="<?php echo e(url('about/update')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>



             <?php $abouts= \App\About::all();?>
            <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="id" value="<?php echo e($abt->id); ?>">
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Title Head')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="titleHead" value="<?php echo e($abt->titleHead); ?>">
                      </div>
                    </div>
                  </div>

              <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Intro')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea name="intro" class="textarea"><?php echo e($abt->intro); ?></textarea>
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
                        <label class="FormLabel1"><?php echo e(__('Descritption')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea name="description" class="textarea"><?php echo e($abt->description); ?></textarea>
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
<?php echo $__env->make('masters.editormaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe-front\resources\views/admin/home/aboutAdmin.blade.php ENDPATH**/ ?>