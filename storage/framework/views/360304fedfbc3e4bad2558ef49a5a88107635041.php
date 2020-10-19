<?php $__env->startSection('title', __('Product Category List')); ?>




<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">New Product Category</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          
        <div id="dvData" class="box-body table-responsive no-padding">
          <table id="tblcopy" class="table table-bordered">
            <thead>
              <tr>
                
                <th><?php echo e(__('ID')); ?></th>
                <th><?php echo e(__('Category Name')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                
              </tr>
            </thead>
            <tbody>
              <?php $i=1; ?>
              <?php $__currentLoopData = $productCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $products=\App\Product::all()->where('productCatId', $productCat->id);?>
              <tr class="odd even">
                
                <td><?php echo e($i++); ?></td>
                
                <td><?php echo e($productCat->productCatName); ?> <span>(<?php echo e($products->count()); ?>)</span></td>
                <td>
                  <a href="<?php echo e(url('product/category/view/'.$productCat->id)); ?>" class="btn btn-primary" ui-toggle-class=""><?php echo e(__('Show all')); ?></a>
                  <a href="<?php echo e(url('product/category/'.$productCat->id)); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </tbody>
          </table>
          
        </div>
       </div>
    <!-- end row -->
     </div>
    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/admin/product/productCategoryList.blade.php ENDPATH**/ ?>