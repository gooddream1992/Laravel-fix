<?php $__env->startSection('title', 'Home Page'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Home Page</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          


          <div class="text-center btn btn-success"><h1>Independent Escort</h1></div><hr>
          <form role="form" method="POST" action="<?php echo e(url('independent/update')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


            <?php $indpnts= \App\Independent::all();?>
            <?php $__currentLoopData = $indpnts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indpnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="id" value="<?php echo e($indpnt->id); ?>">
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Icon Image')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon" type="file" accept="image/*" value="0">
                       <?php if($indpnt->icon==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$indpnt->icon)); ?>" style="width: 100%;"><?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Background')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="bgimage" type="file" accept="image/*" value="0">
                       <?php if($indpnt->bgimage==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width:100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$indpnt->bgimage)); ?>" style="width: 100%;"><?php endif; ?>
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
                        <label class="FormLabel1"><?php echo e(__('Title Head')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="topHead" value="<?php echo e($indpnt->topHead); ?>" >
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title" value="<?php echo e($indpnt->title); ?>" >
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Descritption')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea name="description" class="textarea"><?php echo e($indpnt->description); ?></textarea>
                      </div>
                    </div>
                  </div>
                  
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Update">
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
                
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </form>






<div class="text-center btn btn-success"><h1>Service provider resources</h1></div><hr>
          <form role="form" method="POST" action="<?php echo e(url('provider/resource/update')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


             <?php $provresrcs= \App\ProviderResource::all();?>
            <?php $__currentLoopData = $provresrcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resourc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="id" value="<?php echo e($resourc->id); ?>"> 

            <div class="row">
              
              <div class="col-md-6">
                <div class="row">

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Title Head')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="titleHead" value="<?php echo e($resourc->titleHead); ?>">
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Intro')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea name="intro" class="textarea"><?php echo e($resourc->intro); ?></textarea>
                      </div>
                    </div>
                  </div>


                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Trafficking Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title1" value="<?php echo e($resourc->title1); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Trafficking Icon')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon1" type="file" accept="image/*" value="0">
                        <?php if($resourc->icon1==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$resourc->icon1)); ?>" style="width: 100%;"><?php endif; ?>
                      </div>
                    </div>
                  </div>

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Resources Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title2" value="<?php echo e($resourc->title2); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Resources Icon')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon2" type="file" accept="image/*" value="0">
                       <?php if($resourc->icon2==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$resourc->icon2)); ?>" style="width: 100%;"><?php endif; ?>
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
                        <label class="FormLabel1"><?php echo e(__('Purchase Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title3" value="<?php echo e($resourc->title3); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Purchase Icon')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon3" type="file" accept="image/*" value="0">
                        <?php if($resourc->icon3==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$resourc->icon3)); ?>" style="width: 100%;"><?php endif; ?>
                      </div>
                    </div>
                  </div>


                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Become Escort Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title4" value="<?php echo e($resourc->title4); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Become Escort Icon')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon4" type="file" accept="image/*" value="0">
                       <?php if($resourc->icon4==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$resourc->icon4)); ?>" style="width: 100%;"><?php endif; ?>
                      </div>
                    </div>
                  </div>


                 

                 
                  
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Update">
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
                
              </div>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </form>




          <div class="text-center btn btn-success"><h1>A Platform Built for Professionals</h1></div><hr>
          <form role="form" method="POST" action="<?php echo e(url('professional/update')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            
            <?php $professionals= \App\Professional::all();?>
            <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="id" value="<?php echo e($professonal->id); ?>"> 
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Title Head')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="titleHead" value="<?php echo e($professonal->titleHead); ?>">
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Intro')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea name="intro" class="textarea"><?php echo e($professonal->intro); ?></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Background Top')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="bgTop" type="file" accept="image/*" value="0">
                        <?php if($professonal->bgTop==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$professonal->bgTop)); ?>" style="width: 100%;"><?php endif; ?>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Background Bottom')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="bgBottom" type="file" accept="image/*" value="0">
                        <?php if($professonal->bgBottom==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$professonal->bgBottom)); ?>" style="width: 100%;"><?php endif; ?>
                      </div>
                    </div>
                  </div>


                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__(' Title1')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title1"  value="<?php echo e($professonal->title1); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Icon1')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon1" type="file" accept="image/*" value="0">
                         <?php if($professonal->icon1==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$professonal->icon1)); ?>" style="width: 100%;"><?php endif; ?>
                      </div>
                    </div>
                  </div>

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__(' Title2')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title2"  value="<?php echo e($professonal->title2); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Icon2')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon2" type="file" accept="image/*" value="0">
                        <?php if($professonal->icon2==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$professonal->icon2)); ?>" style="width: 100%;"><?php endif; ?>
                      </div>
                    </div>
                  </div>

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__(' Title3')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title3"  value="<?php echo e($professonal->title3); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Icon3')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon3" type="file" accept="image/*" value="0">
                       <?php if($professonal->icon3==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$professonal->icon3)); ?>" style="width: 100%;"><?php endif; ?>
                      </div>
                    </div>
                  </div>

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__(' Title4')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title4"  value="<?php echo e($professonal->title4); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Icon4')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon4" type="file" accept="image/*" value="0">
                        <?php if($professonal->icon4==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$professonal->icon4)); ?>" style="width: 100%;"><?php endif; ?>
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
                        <label class="FormLabel1"><?php echo e(__(' Title5')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title5"  value="<?php echo e($professonal->title5); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Icon5')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon5" type="file" accept="image/*" value="0">
                       <?php if($professonal->icon5==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$professonal->icon5)); ?>" style="width: 100%;"><?php endif; ?>
                      </div>
                    </div>
                  </div>


                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__(' Title6')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title6"  value="<?php echo e($professonal->title6); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Icon6')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon6" type="file" accept="image/*" value="0">
                        <?php if($professonal->icon6==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$professonal->icon6)); ?>" style="width: 100%;"><?php endif; ?>
                      </div>
                    </div>
                  </div>


                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__(' Title7')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title7"  value="<?php echo e($professonal->title7); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Icon7')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon7" type="file" accept="image/*" value="0">
                        <?php if($professonal->icon7==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$professonal->icon7)); ?>" style="width: 100%;"><?php endif; ?>
                      </div>
                    </div>
                  </div>


                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__(' Title8')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title8"  value="<?php echo e($professonal->title8); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Icon8')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon8" type="file" accept="image/*" value="0">
                        <?php if($professonal->icon8==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$professonal->icon8)); ?>" style="width: 100%;"><?php endif; ?>
                      </div>
                    </div>
                  </div>


                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__(' Title9')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title9"  value="<?php echo e($professonal->title9); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Icon9')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="icon9" type="file" accept="image/*" value="0">
                       <?php if($professonal->icon9==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$professonal->icon9)); ?>" style="width: 100%;"><?php endif; ?>
                      </div>
                    </div>
                  </div>


                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Update">
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
                
              </div>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </form>






<div class="text-center btn btn-success"><h1>About</h1></div><hr>
          <form role="form" method="POST" action="<?php echo e(url('about/update')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>



             <?php $abouts= \App\About::all();?>
            <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="id" value="<?php echo e($abt->id); ?>">
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Title Head')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="titleHead" value="<?php echo e($abt->titleHead); ?>">
                      </div>
                    </div>
                  </div>

              <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Intro')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea name="intro" class="textarea"><?php echo e($abt->intro); ?></textarea>
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
                        <label class="FormLabel1"><?php echo e(__('Descritption')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea name="description" class="textarea"><?php echo e($abt->description); ?></textarea>
                      </div>
                    </div>
                  </div>
                  
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Update">
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
      
    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.editormaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/admin/front_pages/homePage.blade.php ENDPATH**/ ?>