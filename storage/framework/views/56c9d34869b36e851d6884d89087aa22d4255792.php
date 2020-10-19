<?php $__env->startSection('title', 'FAQ Escort Client'); ?>
<?php $__env->startSection('main'); ?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <!-- SELECT2 EXAMPLE -->
         <div class="card card-default">
            <div class="card-header">
               <h3 class="card-title FormTitle">FAQ Escort Client</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
               </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <div class="text-center btn btn-success">
                  <h1>FAQ Escort Client</h1>
               </div>
               <hr>
               <form role="form" method="POST" action="<?php echo e(route('faq.client.escort.update')); ?>" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="id" value="<?php echo e($value->id); ?>">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                 <div class="select_2_alska2">
                                    <label class="FormLabel1"><?php echo e(__('Question')); ?>*</label>
                                 </div>
                                 <div class="selct_2_alska">
                                    <input name="question" type="text" value="<?php echo e($value->question); ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                 <div class="select_2_alska2">
                                    <label class="FormLabel1"><?php echo e(__('Escort/Client')); ?>*</label>
                                 </div>
                                 <div class="selct_2_alska">
                                    <select class="form-control" name="roleType">
                                    	<option>
                                    		Escort/Client
                                    	</option>
                                    	<option value="2" <?php if($value->roleType == 2): ?> selected <?php endif; ?>>
                                    		Escort
                                    	</option>
                                    	<option value="3" <?php if($value->roleType == 3): ?> selected <?php endif; ?>>
                                    		Client
                                    	</option>
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
                                    <label class="FormLabel1"><?php echo e(__('Answer')); ?>*</label>
                                 </div>
                                 <div class="selct_2_alska">
                                    <textarea class="textarea" name="answer"><?php echo e($value->answer); ?></textarea>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.editormaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/faqClientEscort/edit.blade.php ENDPATH**/ ?>