<?php $__env->startSection('title', __('New Product Category')); ?>
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
    
    <div class="row">
      <!-- begin col-6 -->
      <div class="col-lg-6 form-horizontal">
        <form role="form" method="POST" action="<?php echo e(url('product/category/add')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          
          <input type="hidden" name="addedBy" value="<?php echo e(Auth::user()->id); ?>">
          <div class="form-group m-b-10">
            <label class="col-lg-3 col-form-label"><?php echo e(__('New category')); ?></label>
            <div class="col-lg-7">
              <input type="text" name="productCatName" class="form-control" placeholder="<?php echo e(__('Name of Category')); ?> " />
            </div>
          </div>
          <div class="form-group m-b-10">
            <label class="col-lg-3 col-form-label"></label>
            <div class="col-lg-7">
              <button type="submit" class="btn btn-success width-100 m-r-5"><?php echo e(__('Add')); ?></button> <a href="<?php echo e(url('/admin/home')); ?>" class="btn btn-default width-100"><?php echo e(__('Cancel')); ?></a>
            </div>
          </div>
          
          
        </form>
      </div>
      <!-- begin col-6 -->


      
        </div>
    <!-- end row -->
     </div>
    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pump\resources\views/admin/product/productCategoryNew.blade.php ENDPATH**/ ?>