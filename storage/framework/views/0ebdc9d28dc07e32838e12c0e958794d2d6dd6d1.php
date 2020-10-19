<?php $__env->startSection('title', 'Profile Details'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Profile Details</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          





<?php if(Auth::user()->roleStatus==1): ?>



                  <div class="text-center btn btn-success"><h1>Profile Availability</h1></div><hr>
                  <form role="form" method="POST" action="<?php echo e(url('profile/availability/store')); ?>" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    
                    
                    
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                <label class="FormLabel1"><?php echo e(__('Escort')); ?>*</label>
                              </div>
                              <div class="selct_2_alska">
                                <select class="form-control" name="escortId">
                                  <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                                  <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($escort->id); ?>"><?php echo e($escort->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                <label class="FormLabel1"><?php echo e(__('Weekday')); ?>*</label>
                              </div>
                              <div class="selct_2_alska">
                                <select class="form-control" name="weekday">
                                  <option value="Saturday">Saturday</option>
                                  <option value="Sunday">Sunday</option>
                                  <option value="Monday">Monday</option>
                                  <option value="Tuesday">Tuesday</option>
                                  <option value="Wednesday">Wednesday</option>
                                  <option value="Thirsday">Thirsday</option>
                                  <option value="Friday">Friday</option>
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
                                <label class="FormLabel1"><?php echo e(__('From')); ?>*</label>
                              </div>
                              <div class="selct_2_alska">
                                <select class="form-control" name="fromDate">
                                  <option value="1:00 AM">1:00 AM</option>
                                  <option value="2:00 AM">2:00 AM</option>
                                  <option value="3:00 AM">3:00 AM</option>
                                  <option value="4:00 AM">4:00 AM</option>
                                  <option value="5:00 AM">5:00 AM</option>
                                  <option value="6:00 AM">6:00 AM</option>
                                  <option value="7:00 AM">7:00 AM</option>
                                  <option value="8:00 AM">8:00 AM</option>
                                  <option value="9:00 AM">9:00 AM</option>
                                  <option value="10:00 AM">10:00 AM</option>
                                  <option value="11:00 AM">11:00 AM</option>
                                  <option value="12:00 AM">12:00 AM</option>
                                  <option value="13:00 PM">13:00 PM</option>
                                  <option value="14:00 PM">14:00 PM</option>
                                  <option value="15:00 PM">15:00 PM</option>
                                  <option value="16:00 PM">16:00 PM</option>
                                  <option value="17:00 PM">17:00 PM</option>
                                  <option value="18:00 PM">18:00 PM</option>
                                  <option value="19:00 PM">19:00 PM</option>
                                  <option value="20:00 PM">20:00 PM</option>
                                  <option value="21:00 PM">21:00 PM</option>
                                  <option value="22:00 PM">22:00 PM</option>
                                  <option value="23:00 PM">23:00 PM</option>
                                  <option value="24:00 PM">24:00 PM</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          
                          
                          <div class="col-lg-12">
                            <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                <label class="FormLabel1"><?php echo e(__('Until')); ?>*</label>
                              </div>
                              <div class="selct_2_alska">
                                <select class="form-control" name="untilDate">
                                  <option value="1:00 AM">1:00 AM</option>
                                  <option value="2:00 AM">2:00 AM</option>
                                  <option value="3:00 AM">3:00 AM</option>
                                  <option value="4:00 AM">4:00 AM</option>
                                  <option value="5:00 AM">5:00 AM</option>
                                  <option value="6:00 AM">6:00 AM</option>
                                  <option value="7:00 AM">7:00 AM</option>
                                  <option value="8:00 AM">8:00 AM</option>
                                  <option value="9:00 AM">9:00 AM</option>
                                  <option value="10:00 AM">10:00 AM</option>
                                  <option value="11:00 AM">11:00 AM</option>
                                  <option value="12:00 AM">12:00 AM</option>
                                  <option value="13:00 PM">13:00 PM</option>
                                  <option value="14:00 PM">14:00 PM</option>
                                  <option value="15:00 PM">15:00 PM</option>
                                  <option value="16:00 PM">16:00 PM</option>
                                  <option value="17:00 PM">17:00 PM</option>
                                  <option value="18:00 PM">18:00 PM</option>
                                  <option value="19:00 PM">19:00 PM</option>
                                  <option value="20:00 PM">20:00 PM</option>
                                  <option value="21:00 PM">21:00 PM</option>
                                  <option value="22:00 PM">22:00 PM</option>
                                  <option value="23:00 PM">23:00 PM</option>
                                  <option value="24:00 PM">24:00 PM</option>
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
                  <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th><?php echo e(__('ID No.')); ?></th>
                        <th><?php echo e(__('Escort')); ?></th>
                        <th><?php echo e(__('Weekday')); ?></th>
                        <th><?php echo e(__('From')); ?></th>
                        <th><?php echo e(__('Untill')); ?></th>
                        <th><?php echo e(__('Action')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $pfavails =\App\ProfileAvailability::all();?>
                      <?php $i=1;?>
                      <?php $__currentLoopData = $pfavails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td>00<?php echo e($i++); ?></td>
                        
                        <td><?php echo e(\App\User::find($data3->escortId)->name); ?></td>
                        <td><?php echo e($data3->weekday); ?></td>
                        <td><?php echo e($data3->fromDate); ?></td>
                        <td><?php echo e($data3->untilDate); ?></td>
                        
                        
                        <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfavails<?php echo e($data3->id); ?>">Modify</a> <a href="<?php echo e(url('profile/availability/delete/'.$data3->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
                        
                        
                        
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                    </table>
                    <!--  ==================================Modal Start============================================= -->
                    <?php $__currentLoopData = $pfavails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="modal fade" id="modal-xl-pfavails<?php echo e($data3->id); ?>">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header" style="background: #b00404;">
                            <h4 class="modal-title">Modify Information</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form role="form" method="POST" action="<?php echo e(url('profile/availability/update')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="modal-body">
                              
                              <input type="hidden" name="id" value="<?php echo e($data3->id); ?>">
                              <div class="row">
                                
                                <div class="col-md-6">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                          <label class="FormLabel1"><?php echo e(__('Escort')); ?>*</label>
                                        </div>
                                        <div class="selct_2_alska">
                                          <select class="form-control" name="escortId">
                                            <option value="<?php echo e($data3->escortId); ?>">Current <?php echo e(\App\User::find($data3->escortId)->name); ?></option>
                                            <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
                                            <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($escort->id); ?>"><?php echo e($escort->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-12">
                                      <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                          <label class="FormLabel1"><?php echo e(__('Weekday')); ?>*</label>
                                        </div>
                                        <div class="selct_2_alska">
                                          <select class="form-control" name="weekday">
                                            <option value="<?php echo e($data3->weekday); ?>">Current <?php echo e($data3->weekday); ?></option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thirsday">Thirsday</option>
                                            <option value="Friday">Friday</option>
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
                                          <label class="FormLabel1"><?php echo e(__('From')); ?>*</label>
                                        </div>
                                        <div class="selct_2_alska">
                                          <select class="form-control" name="fromDate">
                                            <option value="<?php echo e($data3->fromDate); ?>">Current <?php echo e($data3->fromDate); ?> </option>
                                            <option value="1:00 AM">1:00 AM</option>
                                            <option value="2:00 AM">2:00 AM</option>
                                            <option value="3:00 AM">3:00 AM</option>
                                            <option value="4:00 AM">4:00 AM</option>
                                            <option value="5:00 AM">5:00 AM</option>
                                            <option value="6:00 AM">6:00 AM</option>
                                            <option value="7:00 AM">7:00 AM</option>
                                            <option value="8:00 AM">8:00 AM</option>
                                            <option value="9:00 AM">9:00 AM</option>
                                            <option value="10:00 AM">10:00 AM</option>
                                            <option value="11:00 AM">11:00 AM</option>
                                            <option value="12:00 AM">12:00 AM</option>
                                            <option value="13:00 PM">13:00 PM</option>
                                            <option value="14:00 PM">14:00 PM</option>
                                            <option value="15:00 PM">15:00 PM</option>
                                            <option value="16:00 PM">16:00 PM</option>
                                            <option value="17:00 PM">17:00 PM</option>
                                            <option value="18:00 PM">18:00 PM</option>
                                            <option value="19:00 PM">19:00 PM</option>
                                            <option value="20:00 PM">20:00 PM</option>
                                            <option value="21:00 PM">21:00 PM</option>
                                            <option value="22:00 PM">22:00 PM</option>
                                            <option value="23:00 PM">23:00 PM</option>
                                            <option value="24:00 PM">24:00 PM</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    
                                    <div class="col-lg-12">
                                      <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                          <label class="FormLabel1"><?php echo e(__('Until')); ?>*</label>
                                        </div>
                                        <div class="selct_2_alska">
                                          <select class="form-control" name="untilDate">
                                            <option value="<?php echo e($data3->untilDate); ?>">Current <?php echo e($data3->untilDate); ?> </option>
                                            <option value="1:00 AM">1:00 AM</option>
                                            <option value="2:00 AM">2:00 AM</option>
                                            <option value="3:00 AM">3:00 AM</option>
                                            <option value="4:00 AM">4:00 AM</option>
                                            <option value="5:00 AM">5:00 AM</option>
                                            <option value="6:00 AM">6:00 AM</option>
                                            <option value="7:00 AM">7:00 AM</option>
                                            <option value="8:00 AM">8:00 AM</option>
                                            <option value="9:00 AM">9:00 AM</option>
                                            <option value="10:00 AM">10:00 AM</option>
                                            <option value="11:00 AM">11:00 AM</option>
                                            <option value="12:00 AM">12:00 AM</option>
                                            <option value="13:00 PM">13:00 PM</option>
                                            <option value="14:00 PM">14:00 PM</option>
                                            <option value="15:00 PM">15:00 PM</option>
                                            <option value="16:00 PM">16:00 PM</option>
                                            <option value="17:00 PM">17:00 PM</option>
                                            <option value="18:00 PM">18:00 PM</option>
                                            <option value="19:00 PM">19:00 PM</option>
                                            <option value="20:00 PM">20:00 PM</option>
                                            <option value="21:00 PM">21:00 PM</option>
                                            <option value="22:00 PM">22:00 PM</option>
                                            <option value="23:00 PM">23:00 PM</option>
                                            <option value="24:00 PM">24:00 PM</option>
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
                    <!-- ==================================Modal============================================= -->
                   

























<?php elseif(Auth::user()->roleStatus==2): ?>


                  <div class="text-center btn btn-success"><h1>Profile Availability</h1></div><hr>
                  <form role="form" method="POST" action="<?php echo e(url('profile/availability/store')); ?>" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    
                    
                    
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                <label class="FormLabel1"><?php echo e(__('Escort')); ?>*</label>
                              </div>
                              <div class="selct_2_alska">
                                <select class="form-control" name="escortId">
                                   <option value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->name); ?></option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                <label class="FormLabel1"><?php echo e(__('Weekday')); ?>*</label>
                              </div>
                              <div class="selct_2_alska">
                                <select class="form-control" name="weekday">
                                  <option value="Saturday">Saturday</option>
                                  <option value="Sunday">Sunday</option>
                                  <option value="Monday">Monday</option>
                                  <option value="Tuesday">Tuesday</option>
                                  <option value="Wednesday">Wednesday</option>
                                  <option value="Thirsday">Thirsday</option>
                                  <option value="Friday">Friday</option>
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
                                <label class="FormLabel1"><?php echo e(__('From')); ?>*</label>
                              </div>
                              <div class="selct_2_alska">
                                <select class="form-control" name="fromDate">
                                  <option value="1:00 AM">1:00 AM</option>
                                  <option value="2:00 AM">2:00 AM</option>
                                  <option value="3:00 AM">3:00 AM</option>
                                  <option value="4:00 AM">4:00 AM</option>
                                  <option value="5:00 AM">5:00 AM</option>
                                  <option value="6:00 AM">6:00 AM</option>
                                  <option value="7:00 AM">7:00 AM</option>
                                  <option value="8:00 AM">8:00 AM</option>
                                  <option value="9:00 AM">9:00 AM</option>
                                  <option value="10:00 AM">10:00 AM</option>
                                  <option value="11:00 AM">11:00 AM</option>
                                  <option value="12:00 AM">12:00 AM</option>
                                  <option value="13:00 PM">13:00 PM</option>
                                  <option value="14:00 PM">14:00 PM</option>
                                  <option value="15:00 PM">15:00 PM</option>
                                  <option value="16:00 PM">16:00 PM</option>
                                  <option value="17:00 PM">17:00 PM</option>
                                  <option value="18:00 PM">18:00 PM</option>
                                  <option value="19:00 PM">19:00 PM</option>
                                  <option value="20:00 PM">20:00 PM</option>
                                  <option value="21:00 PM">21:00 PM</option>
                                  <option value="22:00 PM">22:00 PM</option>
                                  <option value="23:00 PM">23:00 PM</option>
                                  <option value="24:00 PM">24:00 PM</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          
                          
                          <div class="col-lg-12">
                            <div class="form-group sip_mt">
                              <div class="select_2_alska2">
                                <label class="FormLabel1"><?php echo e(__('Until')); ?>*</label>
                              </div>
                              <div class="selct_2_alska">
                                <select class="form-control" name="untilDate">
                                  <option value="1:00 AM">1:00 AM</option>
                                  <option value="2:00 AM">2:00 AM</option>
                                  <option value="3:00 AM">3:00 AM</option>
                                  <option value="4:00 AM">4:00 AM</option>
                                  <option value="5:00 AM">5:00 AM</option>
                                  <option value="6:00 AM">6:00 AM</option>
                                  <option value="7:00 AM">7:00 AM</option>
                                  <option value="8:00 AM">8:00 AM</option>
                                  <option value="9:00 AM">9:00 AM</option>
                                  <option value="10:00 AM">10:00 AM</option>
                                  <option value="11:00 AM">11:00 AM</option>
                                  <option value="12:00 AM">12:00 AM</option>
                                  <option value="13:00 PM">13:00 PM</option>
                                  <option value="14:00 PM">14:00 PM</option>
                                  <option value="15:00 PM">15:00 PM</option>
                                  <option value="16:00 PM">16:00 PM</option>
                                  <option value="17:00 PM">17:00 PM</option>
                                  <option value="18:00 PM">18:00 PM</option>
                                  <option value="19:00 PM">19:00 PM</option>
                                  <option value="20:00 PM">20:00 PM</option>
                                  <option value="21:00 PM">21:00 PM</option>
                                  <option value="22:00 PM">22:00 PM</option>
                                  <option value="23:00 PM">23:00 PM</option>
                                  <option value="24:00 PM">24:00 PM</option>
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
                  <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th><?php echo e(__('ID No.')); ?></th>
                        <th><?php echo e(__('Escort')); ?></th>
                        <th><?php echo e(__('Weekday')); ?></th>
                        <th><?php echo e(__('From')); ?></th>
                        <th><?php echo e(__('Untill')); ?></th>
                        <th><?php echo e(__('Action')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $pfavails =\App\ProfileAvailability::all()->where('escortId', Auth::user()->id);?>
                      <?php $i=1;?>
                      <?php $__currentLoopData = $pfavails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td>00<?php echo e($i++); ?></td>
                        
                        <td><?php echo e(\App\User::find($data3->escortId)->name); ?></td>
                        <td><?php echo e($data3->weekday); ?></td>
                        <td><?php echo e($data3->fromDate); ?></td>
                        <td><?php echo e($data3->untilDate); ?></td>
                        
                        
                        <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfavails<?php echo e($data3->id); ?>">Modify</a> <a href="<?php echo e(url('profile/availability/delete/'.$data3->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
                        
                        
                        
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                    </table>
                    <!--  ==================================Modal Start============================================= -->
                    <?php $__currentLoopData = $pfavails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="modal fade" id="modal-xl-pfavails<?php echo e($data3->id); ?>">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header" style="background: #b00404;">
                            <h4 class="modal-title">Modify Information</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form role="form" method="POST" action="<?php echo e(url('profile/availability/update')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="modal-body">
                              
                              <input type="hidden" name="id" value="<?php echo e($data3->id); ?>">
                              <div class="row">
                                
                                <div class="col-md-6">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                          <label class="FormLabel1"><?php echo e(__('Escort')); ?>*</label>
                                        </div>
                                        <div class="selct_2_alska">
                                          <select class="form-control" name="escortId">
                                            <option value="<?php echo e($data3->escortId); ?>">Current <?php echo e(\App\User::find($data3->escortId)->name); ?></option>
                                            <option value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->name); ?></option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-12">
                                      <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                          <label class="FormLabel1"><?php echo e(__('Weekday')); ?>*</label>
                                        </div>
                                        <div class="selct_2_alska">
                                          <select class="form-control" name="weekday">
                                            <option value="<?php echo e($data3->weekday); ?>">Current <?php echo e($data3->weekday); ?></option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thirsday">Thirsday</option>
                                            <option value="Friday">Friday</option>
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
                                          <label class="FormLabel1"><?php echo e(__('From')); ?>*</label>
                                        </div>
                                        <div class="selct_2_alska">
                                          <select class="form-control" name="fromDate">
                                            <option value="<?php echo e($data3->fromDate); ?>">Current <?php echo e($data3->fromDate); ?> </option>
                                            <option value="1:00 AM">1:00 AM</option>
                                            <option value="2:00 AM">2:00 AM</option>
                                            <option value="3:00 AM">3:00 AM</option>
                                            <option value="4:00 AM">4:00 AM</option>
                                            <option value="5:00 AM">5:00 AM</option>
                                            <option value="6:00 AM">6:00 AM</option>
                                            <option value="7:00 AM">7:00 AM</option>
                                            <option value="8:00 AM">8:00 AM</option>
                                            <option value="9:00 AM">9:00 AM</option>
                                            <option value="10:00 AM">10:00 AM</option>
                                            <option value="11:00 AM">11:00 AM</option>
                                            <option value="12:00 AM">12:00 AM</option>
                                            <option value="13:00 PM">13:00 PM</option>
                                            <option value="14:00 PM">14:00 PM</option>
                                            <option value="15:00 PM">15:00 PM</option>
                                            <option value="16:00 PM">16:00 PM</option>
                                            <option value="17:00 PM">17:00 PM</option>
                                            <option value="18:00 PM">18:00 PM</option>
                                            <option value="19:00 PM">19:00 PM</option>
                                            <option value="20:00 PM">20:00 PM</option>
                                            <option value="21:00 PM">21:00 PM</option>
                                            <option value="22:00 PM">22:00 PM</option>
                                            <option value="23:00 PM">23:00 PM</option>
                                            <option value="24:00 PM">24:00 PM</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    
                                    <div class="col-lg-12">
                                      <div class="form-group sip_mt">
                                        <div class="select_2_alska2">
                                          <label class="FormLabel1"><?php echo e(__('Until')); ?>*</label>
                                        </div>
                                        <div class="selct_2_alska">
                                          <select class="form-control" name="untilDate">
                                            <option value="<?php echo e($data3->untilDate); ?>">Current <?php echo e($data3->untilDate); ?> </option>
                                            <option value="1:00 AM">1:00 AM</option>
                                            <option value="2:00 AM">2:00 AM</option>
                                            <option value="3:00 AM">3:00 AM</option>
                                            <option value="4:00 AM">4:00 AM</option>
                                            <option value="5:00 AM">5:00 AM</option>
                                            <option value="6:00 AM">6:00 AM</option>
                                            <option value="7:00 AM">7:00 AM</option>
                                            <option value="8:00 AM">8:00 AM</option>
                                            <option value="9:00 AM">9:00 AM</option>
                                            <option value="10:00 AM">10:00 AM</option>
                                            <option value="11:00 AM">11:00 AM</option>
                                            <option value="12:00 AM">12:00 AM</option>
                                            <option value="13:00 PM">13:00 PM</option>
                                            <option value="14:00 PM">14:00 PM</option>
                                            <option value="15:00 PM">15:00 PM</option>
                                            <option value="16:00 PM">16:00 PM</option>
                                            <option value="17:00 PM">17:00 PM</option>
                                            <option value="18:00 PM">18:00 PM</option>
                                            <option value="19:00 PM">19:00 PM</option>
                                            <option value="20:00 PM">20:00 PM</option>
                                            <option value="21:00 PM">21:00 PM</option>
                                            <option value="22:00 PM">22:00 PM</option>
                                            <option value="23:00 PM">23:00 PM</option>
                                            <option value="24:00 PM">24:00 PM</option>
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
                    <!-- ==================================Modal============================================= -->
                   
<?php else: ?>

<?php endif; ?>














                      </div>
                      
                      
                      
                      
                    </div>
                    
                  </div>
                </section>
              </div>
              <?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.editormaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe-front\resources\views/admin/profile/profileAvailability.blade.php ENDPATH**/ ?>