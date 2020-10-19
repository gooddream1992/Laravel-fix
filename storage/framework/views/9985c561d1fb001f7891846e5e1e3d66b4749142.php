<div class="col-lg-12">
   <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
         <div class="simplebar res-img-grid" id="myElement" >
            <ul class="res-tab-imgs" >
               <?php /*$escorts =\App\User::all()->where('roleStatus', 2);*/ ?>
               <?php $__currentLoopData = $health; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li>
                  <div class="img-box">
                     <a href="<?php echo e($escort->title); ?>" target="_blank">
                     <img src="<?php echo e(asset('public/localresources/'.$escort->image)); ?>" class="img-fluid"/>
                     <div class="top-content"><?php echo e($escort->name); ?></div>
                     </a>
                     <div class="bottom-content"><?php echo e($escort->title); ?></div>
                  </div>
               </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
         </div>
      </div>
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
         <div class="simplebar res-img-grid" id="myElement" >
            <ul class="res-tab-imgs" >
               <?php /*$escorts =\App\User::all()->where('roleStatus', 2);*/ ?>
               <?php $__currentLoopData = $legal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li>
                  <div class="img-box">
                     <a href="<?php echo e($escort->title); ?>" target="_blank">
                     <img src="<?php echo e(asset('public/localresources/'.$escort->image)); ?>" class="img-fluid"/>
                     <div class="top-content"><?php echo e($escort->name); ?></div>
                     </a>
                      <div class="bottom-content"><?php echo e($escort->title); ?></div>
                  </div>
               </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
         </div>
      </div>
      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
         <div class="simplebar res-img-grid" id="myElement" >
            <ul class="res-tab-imgs" >
               <?php /*$escorts =\App\User::all()->where('roleStatus', 2);*/ ?>
               <?php $__currentLoopData = $photographers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li>
                  <div class="img-box">
                     <a href="<?php echo e($escort->title); ?>" target="_blank">
                     <img src="<?php echo e(asset('public/localresources/'.$escort->image)); ?>" class="img-fluid"/>
                     <div class="top-content"><?php echo e($escort->name); ?></div>
                     </a>
                      <div class="bottom-content"><?php echo e($escort->title); ?></div>
                  </div>
               </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
         </div>
      </div>
   </div>
</div><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/provider/iframe.blade.php ENDPATH**/ ?>