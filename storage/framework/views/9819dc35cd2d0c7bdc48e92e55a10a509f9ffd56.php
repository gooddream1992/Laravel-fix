<?php $__env->startSection('title', __('Escort List')); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Escort List</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
      

     <div class="card-body">
 <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><?php echo e(__('ID No.')); ?></th>
                <th><?php echo e(__('Picture')); ?></th>
                <th><?php echo e(__('User Name')); ?></th>
                <th><?php echo e(__('Activation')); ?></th>
                <th><?php echo e(__('Gender')); ?></th>
                <th><?php echo e(__('Phone No.')); ?></th>
                <th><?php echo e(__('Email')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $users =\App\User::all()->where('roleStatus', 2);?>
                 <?php $i=1;?>
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>00<?php echo e($i++); ?></td>
                <td><?php if($user->photo==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$user->photo)); ?>" style="width: 30px;"><?php endif; ?></td>
                <td><?php echo e($user->name); ?></td>
                <td><?php if($user->activation==1): ?> <a href="" class="btn btn-success">Active</a> <?php else: ?> <a href="" class="btn btn-warning">Deactive</a> <?php endif; ?></td>
              
                 <td><?php if($user->gender==1): ?> Male <?php elseif($user->gender==2): ?> Female <?php else: ?> Guy <?php endif; ?></td>
                <td><?php echo e($user->phone); ?></td>
                <td><?php echo e($user->email); ?></td>

               
                <td><a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-xl-pfv<?php echo e($user->id); ?>">Profile Preview</a> <a href="<?php echo e(url('escort/modify/'.$user->id)); ?>" class="btn btn-xs btn-primary">Modify</a> <a href="" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </table>

     </div>



    </div>
  </section>
</div>















<!-- Modal Start================ -->
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-xl-pfv<?php echo e($user->id); ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Escort Profile Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>



          <div class="modal-body">
           
            <div class="row">
              
              <div class="col-md-6">
              <table class="table table-striped table-bordered" style="width:100%">
                <tr><td colspan="2"><?php if($user->photo==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width:100%;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$user->photo)); ?>" style="width: 100%;"><?php endif; ?></td></tr>
              
                <tr><th><?php echo e(__('ID No.')); ?></th><td>ESC00<?php echo e($user->id); ?></td></tr>
                <tr><th><?php echo e(__('Name')); ?></th><td><?php echo e($user->name); ?></td></tr>
                <tr><th><?php echo e(__('Contact No')); ?></th><td><?php echo e($user->phone); ?></td></tr>
                <tr><th><?php echo e(__('Email')); ?></th><td><?php echo e($user->email); ?></td></tr>
                
             
              
                
              </table>
              </div>
              <div class="col-md-6">
                 <table class="table table-striped table-bordered" style="width:100%">

              <tr><th>Availability</th><td> <?php if($user->activation==1): ?> Available Now <?php elseif($user->activation==0): ?> Not Available <?php else: ?> None <?php endif; ?></td></tr>
              <tr><th>Service Area</th><td><?php if($user->serviceArea==1): ?> In Call <?php elseif($user->serviceArea==2): ?> Out Call <?php else: ?> None <?php endif; ?></td></tr>
              <tr><th>Whatsup</th><td><?php echo e($user->whatsup); ?></td></tr>
              <tr><th>Snapchat</th><td><?php echo e($user->snapchat); ?></td></tr>
              <tr><th>Instagram</th><td><?php echo e($user->instagram); ?></td></tr>
              <tr><th>Follow_me</th><td><?php echo e($user->follow_me); ?></td></tr>
              <tr><th>Email_me</th><td><?php echo e($user->email_me); ?></td></tr>
              <tr><th>Website</th><td><?php echo e($user->website); ?></td></tr>
              <tr><th>Straight</th><td><?php echo e($user->straight); ?></td></tr>
              <tr><th>Hair</th><td><?php if($user->hair==NULL): ?> None <?php else: ?> Current <?php echo e(\App\EscortDropdown::find($user->hair)->dropdownTitle); ?> <?php endif; ?></td></tr>

              <tr><th>Bust</th><td><?php echo e($user->bust); ?></td></tr>
              <tr><th>Personal_type</th><td><?php echo e($user->personal_type); ?></td></tr>
              <tr><th>Pet</th><td><?php echo e($user->pet); ?></td></tr>
              <tr><th>Drink</th><td><?php echo e($user->drink); ?></td></tr>
              <tr><th>Food</th><td><?php echo e($user->food); ?></td></tr>
              <tr><th>Service</th><td><?php echo e($user->service); ?></td></tr>
              <tr><th>Age</th><td><?php echo e($user->age); ?></td></tr>
              <tr><th>Nationality</th><td><?php if($user->nationality==NULL): ?> None <?php else: ?> <?php echo e(\App\EscortDropdown::find($user->nationality)->dropdownTitle); ?> <?php endif; ?></td></tr>
              <tr><th>Sexuality</th><td><?php if($user->sexuality==NULL): ?> None <?php else: ?> <?php echo e(\App\EscortDropdown::find($user->sexuality)->dropdownTitle); ?> <?php endif; ?></td></tr>
              <tr><th>Eyes</th><td><?php if($user->eyes==NULL): ?> None <?php else: ?> <?php echo e(\App\EscortDropdown::find($user->eyes)->dropdownTitle); ?> <?php endif; ?></td></tr>

              <tr><th>BodyShape</th><td><?php if($user->bodyShape==NULL): ?> <?php else: ?>  <?php echo e(\App\EscortDropdown::find($user->bodyShape)->dropdownTitle); ?> <?php endif; ?></td></tr>
              <tr><th>EscortType</th><td><?php if($user->escortType==1): ?> Agency <?php elseif($user->escortType==2): ?> Independent <?php elseif($user->escortType==3): ?> Establishment <?php else: ?> None <?php endif; ?></td></tr>
              <tr><th>escortTouring</th><td><?php if($user->escortTouring==1): ?> Yes <?php elseif($user->escortTouring==0): ?> No <?php else: ?> None <?php endif; ?></td></tr>
              <tr><th>Dress</th><td><?php echo e($user->dress); ?></td></tr>
              <tr><th>Height</th><td><?php echo e($user->height); ?></td></tr>
              <tr><th>Price</th><td><?php echo e($user->price); ?></td></tr>
              <tr><th>Gender</th><td><?php if($user->gender==1): ?> Male <?php elseif($user->gender==2): ?> Female <?php else: ?> None <?php endif; ?></td></tr>

              <tr><th>Country</th><td> <?php $cntrycount=\App\Country::all()->where('id', $user->country);?> <?php if($cntrycount->count()<1): ?> Not Found <?php else: ?>  <?php echo e(\App\Country::find($user->country)->country); ?> <?php endif; ?> </td></tr>
              <tr><th>City</th><td><?php $statecount=\App\State::all()->where('id', $user->city);?><?php if($statecount->count()<1): ?> Not Found <?php else: ?> <?php echo e(\App\State::find($user->city)->state); ?> <?php endif; ?> </td></tr>
              <tr><th>Suburb</th><td> <?php $citycount=\App\City::all()->where('id', $user->suburb);?>
                           <?php if($citycount->count()<1): ?> Not Found <?php else: ?> <?php echo e(\App\City::find($user->suburb)->city); ?> <?php endif; ?> </td></tr>
              <tr><th>Code</th><td><?php echo e($user->code); ?></td></tr>


                
              </table>
                
              </div>
            </div>
            
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancel</button>
            </div>
 




        </div>
        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal-dialog -->
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/admin/escorts/escortList.blade.php ENDPATH**/ ?>