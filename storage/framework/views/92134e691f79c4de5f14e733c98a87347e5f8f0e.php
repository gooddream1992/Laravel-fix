<?php $__env->startSection('title', 'News & Blog'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">News & Blog</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          


          <div class="text-center btn btn-success"><h1>News & Blog</h1></div><hr>
    
          <form role="form" method="POST" action="<?php echo e(url('admin/blog/store')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

           
            <input type="hidden" name="publishBy" value="<?php echo e(Auth::user()->id); ?>">
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Image')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="imageurl" type="file" accept="image/*" value="0">
                      <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;">
                      </div>
                    </div>
                  </div>




                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                       <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title">
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Publication')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="publicationStatus">
                          <option value="1">Publish</option>
                          <option value="0">Unpublish</option>
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
                        <label class="FormLabel1"><?php echo e(__('Description')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <textarea class="textarea" name="description"></textarea>
                      </div>
                    </div>
                  </div>

                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Upload To')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="status">
                          <option value="1">Section 01</option>
                          <option value="2">Section 02</option>
                          <option value="3">Multi-Page Section 03</option>
                          <option value="4">Multi-Page Section 04</option>
                          <option value="5">Multi-Page Section 05</option>
                        </select>
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








<?php if(Auth::user()->roleStatus==1): ?>

 <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><?php echo e(__('ID No.')); ?></th>
                <th><?php echo e(__('Picture')); ?></th>
                <th><?php echo e(__('Title')); ?></th>
                <th><?php echo e(__('Status')); ?></th>
                <th><?php echo e(__('Publish By')); ?></th>
                <th><?php echo e(__('Publication')); ?></th>
                <th><?php echo e(__('Description')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $blogs =\App\Blog::all();?>
                 <?php $i=1;?>
              <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>00<?php echo e($i++); ?></td>
                <td><?php if($data->imageurl==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$data->imageurl)); ?>" style="width: 30px;"><?php endif; ?></td>
                <td><?php echo e($data->title); ?></td>
                <td>Section <?php echo e($data->status); ?></td>
                <td><?php if($data->publishBy==0 or $data->publishBy==NULL): ?> None <?php else: ?> <?php echo e(\App\User::find($data->publishBy)->name); ?> <?php endif; ?></td>
                <td><?php if($data->publicationStatus==1): ?>Publish <?php else: ?> Unpublish <?php endif; ?></td>
                <td><?php echo $data->description; ?></td>
              
              
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl<?php echo e($data->id); ?>">Modify</a> <a href="<?php echo e(url('admin/blog/delete/'.$data->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </table>
        
<?php elseif(Auth::user()->roleStatus==2): ?>
<table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><?php echo e(__('ID No.')); ?></th>
                <th><?php echo e(__('Picture')); ?></th>
                <th><?php echo e(__('Title')); ?></th>
                <th><?php echo e(__('Status')); ?></th>
                <th><?php echo e(__('Publish By')); ?></th>
                <th><?php echo e(__('Publication')); ?></th>
                <th><?php echo e(__('Description')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $blogs =\App\Blog::all()->where('publishBy', Auth::user()->id);?>
                 <?php $i=1;?>
              <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>00<?php echo e($i++); ?></td>
                <td><?php if($data->imageurl==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$data->imageurl)); ?>" style="width: 30px;"><?php endif; ?></td>
                <td><?php echo e($data->title); ?></td>
                <td>Section <?php echo e($data->status); ?></td>
                <td><?php if($data->publishBy==0 or $data->publishBy==NULL): ?> None <?php else: ?> <?php echo e(\App\User::find($data->publishBy)->name); ?> <?php endif; ?></td>
                <td><?php if($data->publicationStatus==1): ?>Publish <?php else: ?> Unpublish <?php endif; ?></td>
                <td><?php echo $data->description; ?></td>
              
              
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl<?php echo e($data->id); ?>">Modify</a> <a href="<?php echo e(url('admin/blog/delete/'.$data->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </table>
<?php else: ?>
<?php endif; ?>




        </div>
        
        
        
        
      </div>
      
    </div>
  </section>
</div>





  <!-- Modal Start================ -->
         <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-xl<?php echo e($data->id); ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="<?php echo e(url('admin/blog/update')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            
            <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
            <input type="hidden" name="publishBy" value="<?php echo e(Auth::user()->id); ?>">
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Icon Image')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="imageurl" type="file" accept="image/*" value="<?php echo e($data->imageurl); ?>">
                        <img src="<?php echo e(asset('public/uploads/'.$data->imageurl)); ?>" style="width:100%;">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title" class="form-control" value="<?php echo e($data->title); ?>">
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Publication')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="publicationStatus">
                          <option  value="<?php echo e($data->publicationStatus); ?>">Current <?php if($data->publicationStatus==1): ?>Publish <?php else: ?> Unpublish <?php endif; ?></option>
                          <option value="1">Publish</option>
                          <option value="0">Unpublish</option>
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
                        <label class="FormLabel1"><?php echo e(__('Description')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea class="textarea" name="description"><?php echo e($data->description); ?></textarea>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Upload To')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="status"  value="<?php echo e($data->status); ?>">
                          <option value="<?php echo e($data->status); ?>">Current Section <?php echo e($data->status); ?></option>
                          <option value="1">Section 01</option>
                          <option value="2">Section 02</option>
                          <option value="3">Multi-Page Section 03</option>
                          <option value="4">Multi-Page Section 04</option>
                          <option value="5">Multi-Page Section 05</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  
                  
                  
                  
                </div>
                
              </div>
            </div>
            
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>




        </div>
        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal-dialog -->
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.editormaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe-front\resources\views/admin/provider/adminBlog.blade.php ENDPATH**/ ?>