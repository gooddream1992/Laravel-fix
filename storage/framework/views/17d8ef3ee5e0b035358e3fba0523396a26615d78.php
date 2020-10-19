<?php $__env->startSection('title', __('Ledger')); ?>

<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Ledger</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form role="form" method="POST" action="" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

               
                <input type="hidden" name="addedBy" value="<?php echo e(Auth::user()->id); ?>">

                <input type="hidden" name="paid" value="0">
                <input type="hidden" name="accId" value="11">

                <div class="row">
                
                <div class="col-md-6">
                    <div class="row">

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Cashier Name')); ?>*</label>
                      </div>
                     <?php $cshiers=\App\User::all()->where('roleStatus', 3);?>
                      <div class="selct_2_alska">
                        <select name="cashierId" class="form-control select2">
                            <?php $__currentLoopData = $cshiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cashier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cashier->id); ?>"><?php echo e($cashier->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                       
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Search">
                      </div>
                    </div>
                  </div> 


                  </div>
                </div>


                </div>
                
                
            </form>
         
     </div>


     <div class="card-body">
 <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><?php echo e(__('ID No.')); ?></th>
                <th><?php echo e(__('Date')); ?></th>
                <th><?php echo e(__('Deposit By')); ?></th>
                <th><?php echo e(__('Deposit Amount')); ?></th>
                <th><?php echo e(__('Note')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php 

                   $dataentries =\App\DataEntry::all();
                   $totaldeposit=\App\DataEntry::all()->sum('cashdeposit');

                   ?>
                 <?php $i=1;?>
              <?php $__currentLoopData = $dataentries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>ID0<?php echo e($i++); ?></td>
                <td><?php echo e($entry->date); ?></td>
                <td><?php echo e(\App\User::find($entry->cashierId)->name); ?></td>
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
    <?php $__currentLoopData = $dataentries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                    $datqntyentrs=\App\DataQntyEntry::all()->where('entryId', $entry->id);

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
                     <?php $__currentLoopData = $datqntyentrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataqnty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                    <?php $__currentLoopData = $datqntyentrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataqnty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pump\resources\views/admin/data_entry/ledger.blade.php ENDPATH**/ ?>