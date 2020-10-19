<?php $__env->startSection('title', 'FAQ Escort Client'); ?>
<?php $__env->startSection('main'); ?>
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
               <div class="right" style="float: right;">
                  <a href="<?php echo e(route('faq.client.escort')); ?>" class="btn btn-warning">Add FAQ Escort Client</a>
                 
               </div>
               <hr>
              <table class="table">
                 <tr>
                    <td style="background-color: #696969; color: white;"><b><strong>Question</strong></b></td>
                    <td style="background-color: #696969; color: white;"> <b><strong>Answer</strong></b></td>
                    <td style="background-color: #696969; color: white;"> <b><strong>Escort/Client</strong></b></td>
                    <td style="background-color: #696969; color: white;"> <b><strong>Created At</strong></b></td>
                    <td style="background-color: #696969; color: white;"> <b><strong>Updated At</strong></b></td>
                    <td style="background-color: #696969; color: white;"> <b><strong>Action</strong></b></td>
                 </tr>
                 <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                     <td>
                        <?php echo e($value->question); ?>

                     </td>
                     <td style="width: 300px;">
                        <?php echo $value->answer; ?>
                     </td>
                     <td>
                        <?php if($value->roleType == 2): ?>
                        Escort
                        <?php else: ?>
                        Client
                        <?php endif; ?>
                     </td>
                     <td>
                        <?php echo e($value->created_at); ?>

                     </td>
                     <td>
                        <?php echo e($value->updated_at); ?>

                     </td>
                     <td>
                        <a href="<?php echo e(route('faq.client.escort.delete',$value->id)); ?>" class="btn btn-xs btn-danger">Delete</a>
                        <a href="<?php echo e(route('faq.client.escort.edit',$value->id)); ?>" class="btn btn-xs btn-primary">Modify</a>
                     </td>
                  </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </table>
            </div>
         </div>
      </div>
   </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.editormaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/faqClientEscort/view.blade.php ENDPATH**/ ?>