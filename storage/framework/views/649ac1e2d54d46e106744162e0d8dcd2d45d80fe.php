<?php $__env->startSection('title', __('New Product')); ?>

<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">New Product</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">
            
            <form role="form" method="POST" action="<?php echo e(url('product/add')); ?>" enctype="multipart/form-data">
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
                        <label class="FormLabel1"><?php echo e(__('Add Date')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="date" id="theDate1" name="addDate" class="form-control" />
                        <script type="text/javascript">
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth() + 1;
                    var year = date.getFullYear();
                    if (month < 10) month = "0" + month;
                    if (day < 10) day = "0" + day;
                    var today = year + "-" + month + "-" + day;
                    document.getElementById('theDate1').value = today;
                    </script>
                      </div>
                    </div>
                  </div>

                    
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Category')); ?>*/ <a href="<?php echo e(url('product/category/add')); ?>"><?php echo e(__('Add')); ?></a></label>
                      </div>
                      <div class="selct_2_alska">
                        <select name="productCatId" class="form-control select2">
                            <option value=""><?php echo e(__('Select')); ?></option>
                            <?php $__currentLoopData = $productCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($productCat->id); ?>"><?php echo e($productCat->productCatName); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>
                  </div>


                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Item\'s Name')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="productName" placeholder="Product's Name" />
                      </div>
                    </div>
                  </div>

              

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Product Details')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                         <textarea  name="productDetails" class="textarea" placeholder="<?php echo e(__('Product Details')); ?>"></textarea>
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
                        <label class="FormLabel1"><?php echo e(__('Sale Price')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                         <input type="text" name="productPrice" placeholder="<?php echo e(__('Sale Price')); ?>" />
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Cost Price')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="costPrice" placeholder="<?php echo e(__('Purchase Price')); ?>" />
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Vendors')); ?>*/ <a href="<?php echo e(url('vendor/add')); ?>"><?php echo e(__('Add')); ?></a></label>
                      </div>
                      <div class="selct_2_alska">
                        <select name="vendorId" class="form-group select2">
                            <option value="0"> <?php echo e(__('Select')); ?></option>
                            <?php $vendors=\App\Vendor::all()->where('status','1');?>
                            <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($data->id); ?>"><?php echo e($data->company); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Quantity </label>
                      </div>
                      <div class="selct_2_alska">
                         <input type="text" name="productQnty" value="0" placeholder="<?php echo e(__('Quantity')); ?>" />
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Item\'s Image')); ?> </label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="productImage" type="file" accept="image/*" value="0">
                        <p class="help-block"><?php echo e(__('Upload image max size 1mb')); ?></p>
                      </div>
                    </div>
                  </div> 


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                       
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" name="submit" value="<?php echo e(__('Save')); ?>">
                      </div>
                    </div>
                  </div> 

                    
                    
                  
                  

                    </div>
                </div>



                </div>
                
                
            </form>
         
     </div>
    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pump\resources\views/admin/product/productAdd.blade.php ENDPATH**/ ?>