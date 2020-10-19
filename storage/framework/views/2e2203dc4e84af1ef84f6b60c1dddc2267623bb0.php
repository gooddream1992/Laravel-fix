<?php $__env->startSection('title', __('Product List')); ?>



<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle"> Product List</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        
     <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th><?php echo e(__('ID')); ?></th>
                <th><?php echo e(__('Product Image')); ?></th>
                <th><?php echo e(__('Product Name')); ?></th>
                <th><?php echo e(__('Cost Price')); ?></th>
                <th><?php echo e(__('Sale Price')); ?></th>
                <th><?php echo e(__('Quantity')); ?></th>
                <th><?php echo e(__('Details')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($product->id); ?> </td>
                <td>
                  <?php if($product->productImage==NULL): ?>
                 <i class="fas fa-barcode"></i>
                  <?php else: ?>
                 <img src="<?php echo e(asset($product->productImage)); ?>">
                  <?php endif; ?>
                </td>
                <td><?php echo e($product->productName); ?></td>
                 <td><?php echo e($product->costPrice); ?></td>
                  <td><?php echo e($product->productPrice); ?></td>
             <?php 
             $entryqnties= \App\DataQntyEntry::all()->where('productId', $product->id)->sum('quantity');

             ?>
                <td><?php echo e($product->productQnty-$entryqnties); ?></td>
         
                <td><a href="#" data-toggle="modal" data-target="#modal-lg<?php echo e($product->id); ?>" class="btn btn-primary btn-xs"><?php echo e(__('View')); ?> </a></td>
                <td>
                  <a href="<?php echo e(url('product/edit/'.$product->id)); ?>" class="btn btn-warning btn-xs"><?php echo e(__('Edit')); ?></a></td>
                  
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </tbody>
            </table>
          
      </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
</div>
   <!--Modal box BY ID Paid Salary-->
   <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-lg<?php echo e($product->id); ?>">
    <div class="modal-dialog modal-lg<?php echo e($product->id); ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Product Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


        <table class="table table-bordered table-hover">
                  <tbody>
                    
                    <tr>
                      <th><?php echo e(__('Product ID')); ?></th>
                      <td><?php echo e($product->id); ?></td>
                    </tr>
                    <tr>
                      <th><?php echo e(__('Product\'s Name')); ?></th>
                      <td><?php echo e($product->productName); ?></td>
                    </tr>
                    <tr>
                      <th><?php echo e(__('Product\'s Image')); ?></th>
                      <td> <?php if($product->productImage==NULL): ?>
                        <i class="fa fa-barcode"></i>
                        <?php else: ?>
                        <img src="<?php echo e(asset($product->productImage)); ?>">
                      <?php endif; ?></td>
                    </tr>
                    <tr>
                      <th><?php echo e(__('Product\'s Price')); ?></th>
                      <td><?php echo e($product->productPrice); ?></td>
                    </tr>
                    <tr>
                      <th><?php echo e(__('Product\'s Quantity')); ?></th>
                      <td><?php echo e($product->productQnty); ?></td>
                    </tr>
                    <tr>
                      <th><?php echo e(__('Specification')); ?></th>
                      <td><?php echo e($product->productSpecification); ?></td>
                    </tr>
                    <tr>
                      <th><?php echo e(__('Product\'s Details')); ?></th>
                      <td><?php echo e($product->productDetails); ?></td>
                    </tr>
                    <tr>
                      <th><?php echo e(__('Remark')); ?></th>
                      <td><?php echo e($product->remark); ?></td>
                    </tr>
                    
                  </tbody>
                </table>



        </div>
        
      </div>
    </div>
  </div>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <!--/Modal box BY ID -->
  <?php $__env->stopSection(); ?>


<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pump\resources\views/admin/product/productList.blade.php ENDPATH**/ ?>