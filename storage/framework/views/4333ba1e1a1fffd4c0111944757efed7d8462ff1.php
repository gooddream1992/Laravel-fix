<?php $__env->startSection('title', 'Purchase Marketing'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Purchase Marketing</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          


          <div class="text-center btn btn-success"><h1>Purchase Marketing</h1></div><br><br>
          <a href="<?php echo e(route('purchase.marketing.admin.view')); ?>" class="btn btn-danger">View Marketing Blog</a>
          <hr>
          <form role="form" method="POST" action="<?php echo e(route('purchase.marketing.admin.update')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
            <div class="row">              
              <div class="col-md-6">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Image')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="imageurl" type="file" accept="image/*" value="0">
                        <input type="hidden" name="imageurl" value="<?php echo e($data->image); ?>">
                        <?php if(isset($data->image)): ?>
                        <img src="<?php echo e(asset('public/purchasemarketing')); ?>/<?php echo e($data->image); ?>" width="100" height="100">
                        <?php else: ?>
                      <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;">
                      <?php endif; ?>
                      </div>
                    </div>
                  </div>




                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                       <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title" value="<?php if(isset($data->title)): ?> <?php echo e($data->title); ?> <?php endif; ?>">
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
                       <textarea class="textarea" name="description"><?php if(isset($data->description)): ?> <?php echo e($data->description); ?> <?php endif; ?></textarea>
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
          
        </div>
        
        
        
        
      </div>

    </div>
  </section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.editormaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/purchasemarketing/edit.blade.php ENDPATH**/ ?>