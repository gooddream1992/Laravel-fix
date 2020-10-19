<?php $__env->startSection('title', 'Privacy Statement'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Terms</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          
          <div class="text-center btn btn-success"><h1>Privacy Statement</h1></div><hr>
          
          <form role="form" method="POST" action="<?php echo e(route('admin.privacyedit')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            
            <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
            
            <div class="row">
              
              <div class="col-md-12">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title" value="<?php echo e($data->titile); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Description')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea class="textarea" name="description"><?php echo e($data->description); ?></textarea>
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
<?php echo $__env->make('masters.editormaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/front_pages/privacyupdate.blade.php ENDPATH**/ ?>