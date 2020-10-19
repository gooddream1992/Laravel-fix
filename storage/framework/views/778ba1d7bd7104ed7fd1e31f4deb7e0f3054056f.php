<?php $__env->startSection('title', __('Meter Reading')); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Current Meter Reading</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
      

     <div class="card-body">
<div class="col-lg-12">
                    
                    <div class="Feature_main mt-3">
                        <div class="row">

                   <?php $meters =\App\Product::all()->where('currMeter', '!=', NULL);?>
              <?php $__currentLoopData = $meters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

               <?php 
             $entryqnties= \App\DataQntyEntry::all()->where('productId', $meter->id)->sum('saleqnty');

             ?>
               <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                      <a class="FI_Link w-100 d-block" href="<?php echo e(url('start/data/entry')); ?>">
                                        <h2><?php echo e($meter->currMeter-$entryqnties); ?></h2>
                                        <p> <?php echo e($meter->productName); ?></p>
                                    </a>
                                </div>
                            </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </div>
           </div>
         </div>   
           

     </div>



    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pump\resources\views/admin/data_entry/meterMngmnt.blade.php ENDPATH**/ ?>