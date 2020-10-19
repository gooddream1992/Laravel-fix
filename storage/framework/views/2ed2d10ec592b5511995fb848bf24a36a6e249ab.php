<?php $__env->startSection('title', __('Update Product')); ?>
<?php $__env->startSection('main'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Update Product</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">
            
             <form role="form" method="POST" action="<?php echo e(url('product/update')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                
                
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" name="id" class="form-control" value="<?php echo e($product->id); ?>">

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
                        <label class="FormLabel1"><?php echo e(__('Item\'s Name')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="productName" value="<?php echo e($product->productName); ?>"/>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Specification')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="productSpecification" value="<?php echo e($product->productSpecification); ?>"/>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Product Details')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                         <textarea  name="productDetails" class="textarea"><?php echo e($product->productDetails); ?></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Current Meter')); ?> </label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="currMeter" value="<?php echo e($product->currMeter); ?>"/>
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
                         <input type="text" name="productPrice" value="<?php echo e($product->productPrice); ?>" />
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Cost Price')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="costPrice" value="<?php echo e($product->costPrice); ?>" />
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
        <?php 
        $vendors=\App\Vendor::all()->where('status','1');
        $vendorname=\App\Vendor::find($product->vendorId)->name;

        ?>
                            <option  value="<?php echo e($product->vendorId); ?>">  <?php echo e($vendorname); ?></option>
                           
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
                        <label class="FormLabel1">Quantity  <b class="text-danger">(This quantity is automatic purchased Qnty remaining from balance)</b></label>
                      </div>
                      <div class="selct_2_alska">
                         <input type="text" name="productQnty"  value="<?php echo e($product->productQnty); ?>"/>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Item\'s Image')); ?> </label>
                      </div>
                      <div class="selct_2_alska">
                       
                       <label><?php if($product->productImage==NULL): ?>
                            <i class="fa fa-barcode"></i>
                            <p class="help-block"><?php echo e(__('Not Uploaded product image')); ?></p>
                            <?php else: ?>
                            <img src="<?php echo e(asset($product->productImage)); ?>">
                            <p class="help-block"><?php echo e(__('Uploaded product image')); ?></p>
                            <?php endif; ?>
                        </label>
                      </div>
                    </div>
                  </div> 


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                       
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" name="submit" value="<?php echo e(__('Update Product')); ?>">
                      </div>
                    </div>
                  </div> 

                    
                    
                  
                  

                    </div>
                </div>



                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                
            </form>
         
     </div>
    </div>
  </section>
</div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pump\resources\views/admin/product/editProduct.blade.php ENDPATH**/ ?>