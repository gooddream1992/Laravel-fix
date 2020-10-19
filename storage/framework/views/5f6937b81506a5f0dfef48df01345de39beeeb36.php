<?php $__env->startSection('title', __('Purchase List')); ?>

<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Purchase List</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
       


     <div class="card-body">
 <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><?php echo e(__('ID No.')); ?></th>
                <th><?php echo e(__('Date')); ?></th>
                <th><?php echo e(__('Vendor')); ?></th>
                <th><?php echo e(__('Amount')); ?></th>
                <th><?php echo e(__('Note')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php 

                   $purchases =\App\Purchase::all();
                   $totaldeposit=\App\Purchase::all()->sum('cashdeposit');

                   ?>
                 <?php $i=1;?>
              <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>ID0<?php echo e($i++); ?></td>
                <td><?php echo e($entry->date); ?></td>
                <td><?php echo e(\App\Vendor::find($entry->vendorId)->name); ?></td>
                <td><?php echo e($entry->cashdeposit); ?> TK.</td>
                <td><?php echo e($entry->note); ?></td>
                <td><a href="#"  data-toggle="modal" data-target="#modal-lg<?php echo e($entry->id); ?>" class="btn btn-primary btn-xs">Details</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <tr><th colspan="3">Total</th><th><?php echo e($totaldeposit); ?> TK.</th><th colspan="2"></th></tr>
                
                </tfoot>
              </table>

     </div>



    </div>
  </section>
</div>


 <!--Modal box BY ID Paid Salary-->
    <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-lg<?php echo e($entry->id); ?>">
    <div class="modal-dialog modal-lg<?php echo e($entry->id); ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Entry Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


        <table class="table table-bordered table-hover">
                  <tbody>

                    <?php 
                    $purchasesqntities=\App\PurchaseQuantity::all()->where('entryId', $entry->id);

                    ?>
                    
                    <tr>
                      <th><?php echo e(__('Entry ID')); ?></th>
                      <td><?php echo e($entry->id); ?></td>
                    </tr>

                    <tr>
                      <th><?php echo e(__('Cashier')); ?></th>
                      <td><?php echo e($entry->cashierId); ?></td>
                    </tr>

                    <tr>
                      <th><?php echo e(__('Date')); ?></th>
                      <td><?php echo e($entry->date); ?></td>
                    </tr>
                    <?php if($entry->totalqnty==NULL): ?>
                     <?php $__currentLoopData = $purchasesqntities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataqnty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <th><?php echo e(\App\Product::find($dataqnty->productId)->productName); ?> Meter</th>
                      <th>
                     Quantity: <?php echo e($dataqnty->quantity); ?><br>
                     Rate: <?php echo e($dataqnty->rate); ?><br>
                     Item Total: <?php echo e($dataqnty->itemtotal); ?><br>

                      </th>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <?php $__currentLoopData = $purchasesqntities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataqnty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <th><?php echo e(\App\Product::find($dataqnty->productId)->productName); ?> Meter</th>
                      <th>
                      Previous Reading: <?php echo e($dataqnty->prevMeter); ?><br>
                      Current Reading: <?php echo e($dataqnty->currMeter); ?><br>
                      Sale Quantity: <?php echo e($dataqnty->saleqnty); ?><br>

                      </th>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                   
                  </tbody>
                </table>



        </div>
        
      </div>
    </div>
  </div>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <!--/Modal box BY ID -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pump\resources\views/admin/purchase/purchaseList.blade.php ENDPATH**/ ?>