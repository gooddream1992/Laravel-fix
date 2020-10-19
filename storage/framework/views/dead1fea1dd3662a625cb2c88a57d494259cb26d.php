<?php $__env->startSection('title', 'Profile Details'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
      
        <!-- /.card-header -->
        <div class="card-body">
          <a href="<?php echo e(url('/home')); ?>" class="btn btn-primary">Back</a><hr>
                  <div class="text-center btn btn-success" style="width: 100%"><h1>Profile Availability</h1></div><hr>
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
                                   <option value="<?php if(isset($profile_availabilities[0]->userid)): ?> <?php echo e($profile_availabilities[0]->userid); ?> <?php endif; ?>">
                                    <?php if(isset($profile_availabilities[0]->name)): ?>
                                    <?php echo e($profile_availabilities[0]->name); ?>

                                    <?php endif; ?>
                                  </option>
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
                                  <option value="Saturday" <?php if(isset($profile_availabilities[0]->weekday) && $profile_availabilities[0]->weekday == "Saturday"): ?> <?php endif; ?>>Saturday</option>
                                  <option value="Sunday" <?php if(isset($profile_availabilities[0]->weekday) && $profile_availabilities[0]->weekday == "Sunday"): ?> <?php endif; ?>>Sunday</option>
                                  <option value="Monday" <?php if(isset($profile_availabilities[0]->weekday) && $profile_availabilities[0]->weekday == "Monday"): ?> <?php endif; ?>>Monday</option>
                                  <option value="Tuesday" <?php if(isset($profile_availabilities[0]->weekday) && $profile_availabilities[0]->weekday == "Tuesday"): ?> <?php endif; ?>>Tuesday</option>
                                  <option value="Wednesday" <?php if(isset($profile_availabilities[0]->weekday) && $profile_availabilities[0]->weekday == "Wednesday"): ?> <?php endif; ?>>Wednesday</option>
                                  <option value="Thirsday" <?php if(isset($profile_availabilities[0]->weekday) && $profile_availabilities[0]->weekday == "Thirsday"): ?> <?php endif; ?>>Thirsday</option>
                                  <option value="Friday" <?php if(isset($profile_availabilities[0]->weekday) && $profile_availabilities[0]->weekday == "Friday"): ?> <?php endif; ?>>Friday</option>
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
                                  <option value="1:00 AM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "1:00 AM"): ?> selected <?php endif; ?>>1:00 AM</option>
                                  <option value="2:00 AM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "2:00 AM"): ?> selected <?php endif; ?>>2:00 AM</option>
                                  <option value="3:00 AM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "3:00 AM"): ?> selected <?php endif; ?>>3:00 AM</option>
                                  <option value="4:00 AM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "4:00 AM"): ?> selected <?php endif; ?>>4:00 AM</option>
                                  <option value="5:00 AM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "5:00 AM"): ?> selected <?php endif; ?>>5:00 AM</option>
                                  <option value="6:00 AM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "6:00 AM"): ?> selected <?php endif; ?>>6:00 AM</option>
                                  <option value="7:00 AM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "7:00 AM"): ?> selected <?php endif; ?>>7:00 AM</option>
                                  <option value="8:00 AM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "8:00 AM"): ?> selected <?php endif; ?>>8:00 AM</option>
                                  <option value="9:00 AM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "9:00 AM"): ?> selected <?php endif; ?>>9:00 AM</option>
                                  <option value="10:00 AM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "10:00 AM"): ?> selected <?php endif; ?>>10:00 AM</option>
                                  <option value="11:00 AM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "11:00 AM"): ?> selected <?php endif; ?>>11:00 AM</option>
                                  <option value="12:00 AM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "12:00 AM"): ?> selected <?php endif; ?>>12:00 AM</option>
                                  <option value="13:00 PM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "13:00 PM"): ?> selected <?php endif; ?>>13:00 PM</option>
                                  <option value="14:00 PM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "14:00 PM"): ?> selected <?php endif; ?>>14:00 PM</option>
                                  <option value="15:00 PM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "15:00 PM"): ?> selected <?php endif; ?>>15:00 PM</option>
                                  <option value="16:00 PM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "16:00 PM"): ?> selected <?php endif; ?>>16:00 PM</option>
                                  <option value="17:00 PM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "17:00 PM"): ?> selected <?php endif; ?>>17:00 PM</option>
                                  <option value="18:00 PM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "18:00 PM"): ?> selected <?php endif; ?>>18:00 PM</option>
                                  <option value="19:00 PM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "19:00 PM"): ?> selected <?php endif; ?>>19:00 PM</option>
                                  <option value="20:00 PM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "20:00 PM"): ?> selected <?php endif; ?>>20:00 PM</option>
                                  <option value="21:00 PM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "21:00 PM"): ?> selected <?php endif; ?>>21:00 PM</option>
                                  <option value="22:00 PM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "22:00 PM"): ?> selected <?php endif; ?>>22:00 PM</option>
                                  <option value="23:00 PM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "23:00 PM"): ?> selected <?php endif; ?>>23:00 PM</option>
                                  <option value="24:00 PM" <?php if(isset($profile_availabilities[0]->fromDate) && $profile_availabilities[0]->fromDate == "24:00 PM"): ?> selected <?php endif; ?>>24:00 PM</option>
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
                                  <option value="1:00 AM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "1:00 AM"): ?> selected <?php endif; ?>>1:00 AM</option>
                                  <option value="2:00 AM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "2:00 AM"): ?> selected <?php endif; ?>>2:00 AM</option>
                                  <option value="3:00 AM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "3:00 AM"): ?> selected <?php endif; ?>>3:00 AM</option>
                                  <option value="4:00 AM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "4:00 AM"): ?> selected <?php endif; ?>>4:00 AM</option>
                                  <option value="5:00 AM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "5:00 AM"): ?> selected <?php endif; ?>>5:00 AM</option>
                                  <option value="6:00 AM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "6:00 AM"): ?> selected <?php endif; ?>>6:00 AM</option>
                                  <option value="7:00 AM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "7:00 AM"): ?> selected <?php endif; ?>>7:00 AM</option>
                                  <option value="8:00 AM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "8:00 AM"): ?> selected <?php endif; ?>>8:00 AM</option>
                                  <option value="9:00 AM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "9:00 AM"): ?> selected <?php endif; ?>>9:00 AM</option>
                                  <option value="10:00 AM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "10:00 AM"): ?> selected <?php endif; ?>>10:00 AM</option>
                                  <option value="11:00 AM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "11:00 AM"): ?> selected <?php endif; ?>>11:00 AM</option>
                                  <option value="12:00 AM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "12:00 AM"): ?> selected <?php endif; ?>>12:00 AM</option>
                                  <option value="13:00 PM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "13:00 PM"): ?> selected <?php endif; ?>>13:00 PM</option>
                                  <option value="14:00 PM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "14:00 PM"): ?> selected <?php endif; ?>>14:00 PM</option>
                                  <option value="15:00 PM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "15:00 PM"): ?> selected <?php endif; ?>>15:00 PM</option>
                                  <option value="16:00 PM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "16:00 PM"): ?> selected <?php endif; ?>>16:00 PM</option>
                                  <option value="17:00 PM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "17:00 PM"): ?> selected <?php endif; ?>>17:00 PM</option>
                                  <option value="18:00 PM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "18:00 PM"): ?> selected <?php endif; ?>>18:00 PM</option>
                                  <option value="19:00 PM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "19:00 PM"): ?> selected <?php endif; ?>>19:00 PM</option>
                                  <option value="20:00 PM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "20:00 PM"): ?> selected <?php endif; ?>>20:00 PM</option>
                                  <option value="21:00 PM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "21:00 PM"): ?> selected <?php endif; ?>>21:00 PM</option>
                                  <option value="22:00 PM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "22:00 PM"): ?> selected <?php endif; ?>>22:00 PM</option>
                                  <option value="23:00 PM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "23:00 PM"): ?> selected <?php endif; ?>>23:00 PM</option>
                                  <option value="24:00 PM" <?php if(isset($profile_availabilities[0]->untilDate) && $profile_availabilities[0]->untilDate == "24:00 PM"): ?> selected <?php endif; ?>>24:00 PM</option>
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
                        <th><?php echo e(__('Escort')); ?></th>
                        <th><?php echo e(__('Weekday')); ?></th>
                        <th><?php echo e(__('From')); ?></th>
                        <th><?php echo e(__('Untill')); ?></th>
                        <th><?php echo e(__('Action')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        
                        <td><?php if(isset($profile_availabilities[0]->name)): ?><?php echo e($profile_availabilities[0]->name); ?><?php endif; ?></td>
                        <td><?php if(isset($profile_availabilities[0]->weekday)): ?> <?php echo e($profile_availabilities[0]->weekday); ?> <?php endif; ?></td>
                        <td><?php if(isset($profile_availabilities[0]->fromDate)): ?> <?php echo e($profile_availabilities[0]->fromDate); ?> <?php endif; ?></td>
                        <td><?php if(isset($profile_availabilities[0]->untilDate)): ?><?php echo e($profile_availabilities[0]->untilDate); ?> <?php endif; ?></td>
                        
                        
                        <td>
                          <?php if(isset($profile_availabilities[0]->id)): ?>
                          <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl-pfavails<?php echo e($profile_availabilities[0]->id); ?>">Modify</a>
                          <a href="<?php echo e(url('profile/availability/delete/'.$profile_availabilities[0]->id)); ?>" class="btn btn-xs btn-danger">Delete</a>
                          <?php endif; ?>
                        </td>
                        
                        
                        
                      </tr>
                      
                    </table>
                    <?php $pfavails =\App\ProfileAvailability::all()->where('escortId', Auth::user()->id);?>
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

                      </div>
                      
                      
                      
                      
                    </div>
                    
                  </div>
                </section>
              </div>
              <?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/profileAvailability.blade.php ENDPATH**/ ?>