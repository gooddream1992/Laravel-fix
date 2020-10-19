<?php if(isset($data)): ?>
<div class="col-lg-12">
   <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
         <div class="simplebar res-img-grid" id="myElement" >
            <ul class="res-tab-imgs" >
               <?php /*$escorts =\App\User::all()->where('roleStatus', 2);*/ ?>
               <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li>
                  <div class="img-box">
                     <img src="<?php echo e(asset('public/localresources/'.$escort->image)); ?>" class="img-fluid"/>
                     <div class="top-content"><?php echo e($escort->name); ?></div>
                     <div class="bottom-content"><?php echo e($escort->title); ?></div>
                  </div>
               </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
         </div>
      </div>
      </ul>
   </div>
</div>
</div>
</div>
<?php endif; ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/pages/searchCityEscort.blade.php ENDPATH**/ ?>