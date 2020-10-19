<?php $__env->startSection('title', 'ModiFy Escort'); ?>
<?php $__env->startSection('main'); ?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
       
        <!-- /.card-header -->
        <div class="card-body">
          <a href="<?php echo e(url('/home')); ?>" class="btn btn-primary">Back</a><hr>
          <div class="text-center btn btn-success" style="width: 100%"><h1>Profile Setting</h1></div><hr>
          <form role="form" method="POST" action="<?php echo e(url('escort/update')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


            <?php $escorts=\App\User::all()->where('id', $id);?>



            <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <input type="hidden" name="id" value="<?php echo e($escort->id); ?>">
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                    
                      <div class="selct_2_alska">
                        <input name="photo" type="file" accept="image/*"  value="<?php echo e($escort->photo); ?>">
                        <img src="<?php echo e(asset('public/uploads/'.$escort->photo)); ?>" style="width: 60px;">
                      </div>
                    </div>
                  </div> 
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Name')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="name" class="form-control"  value="<?php echo e($escort->name); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Phone')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="phone" value="<?php echo e($escort->phone); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Email')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="email"  value="<?php echo e($escort->email); ?>" class="form-control">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Gender')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="gender" value="<?php echo e($escort->gender); ?>"> 
                          <option value="<?php echo e($escort->gender); ?>">Current <?php if($escort->gender==1): ?> Male <?php elseif($escort->gender==2): ?> Female <?php else: ?> None <?php endif; ?></option>
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                        </select>
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Service Area')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="serviceArea" value="<?php echo e($escort->serviceArea); ?>">  <option value="<?php echo e($escort->serviceArea); ?>">Current <?php if($escort->serviceArea==1): ?> In Call <?php elseif($escort->serviceArea==2): ?> Out Call <?php else: ?> None <?php endif; ?></option>
                          <option value="1">In Call</option>
                          <option value="2">Out Call</option>
                        </select>
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Age')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="age"> 
                          <option value="<?php echo e($escort->age); ?>">Current <?php echo e($escort->age); ?></option>
                          <option value="18">18</option>
                          <option value="20">20</option>
                           <option value="22">22</option>
                          <option value="24">24</option>
                           <option value="26">26</option>
                          <option value="28">28</option>
                        </select>
                      </div>
                    </div>
                  </div>

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Nationality')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="nationality"> 
                          <option value="<?php echo e($escort->nationality); ?>"><?php if($escort->nationality==NULL): ?> None <?php else: ?> Current <?php echo e(\App\EscortDropdown::find($escort->nationality)->dropdownTitle); ?> <?php endif; ?></option>
                          <?php $hairs=\App\EscortDropdown::all()->where('status', 4);?> 
                        <?php $__currentLoopData = $hairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($hair->id); ?>"><?php echo e($hair->dropdownTitle); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Sexuality')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="sexuality"> 
                           <option value="<?php echo e($escort->sexuality); ?>"><?php if($escort->sexuality==NULL): ?> None <?php else: ?> Current <?php echo e(\App\EscortDropdown::find($escort->sexuality)->dropdownTitle); ?> <?php endif; ?> </option>
                           <?php $hairs=\App\EscortDropdown::all()->where('status', 3);?> 
                        <?php $__currentLoopData = $hairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($hair->id); ?>"><?php echo e($hair->dropdownTitle); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Eyes')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="eyes"> 
                          <option value="<?php echo e($escort->eyes); ?>"><?php if($escort->eyes==NULL): ?> None <?php else: ?> Current <?php echo e(\App\EscortDropdown::find($escort->eyes)->dropdownTitle); ?> <?php endif; ?> </option>
                          <?php $hairs=\App\EscortDropdown::all()->where('status', 1);?> 
                        <?php $__currentLoopData = $hairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($hair->id); ?>"><?php echo e($hair->dropdownTitle); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Body Shape')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="bodyShape"> 
                           <option value="<?php echo e($escort->bodyShape); ?>"><?php if($escort->bodyShape==NULL): ?> <?php else: ?> Current <?php echo e(\App\EscortDropdown::find($escort->bodyShape)->dropdownTitle); ?> <?php endif; ?> </option>
                           <?php $hairs=\App\EscortDropdown::all()->where('status', 2);?> 
                        <?php $__currentLoopData = $hairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($hair->id); ?>"><?php echo e($hair->dropdownTitle); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Escort Type')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="escortType">
                          <option value="<?php echo e($escort->escortType); ?>">Current <?php if($escort->escortType==1): ?> Agency <?php elseif($escort->escortType==2): ?> Independent <?php elseif($escort->escortType==3): ?> Establishment <?php else: ?> <?php endif; ?></option>
                          <option value="1">Agency</option>
                          <option value="2">Independent</option>
                          <option value="3">Establishment  </option>
                        </select>
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Touring Escort')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="escortTouring">
                           <option value="<?php echo e($escort->escortTouring); ?>">Current <?php if($escort->escortTouring==1): ?> Yes <?php elseif($escort->escortTouring==0): ?> No <?php else: ?> <?php endif; ?></option>
                          
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>
                    </div>
                  </div>


                    <div class="col-lg-12" style="display: none">
                    <div class="form-group sip_mt">
                        <label class="FormLabel1"><?php echo e(__('Service Offer')); ?>*</label><br>
                     
                        <input type="checkbox" name="serviceOffer1" value="Boyfriend Experience"> Boyfriend Experience 
                        <input type="checkbox" name="serviceOffer2" value="Girlfriend Girlfriend"> Girlfriend Girlfriend  
                     <input type="checkbox" name="serviceOffer3" value="Pornstar Girlfriend"> Pornstar Girlfriend  
                     <br> 
                        <input type="checkbox" name="serviceOffer4" value="Overnight"> Overnight 
                        <input type="checkbox" name="serviceOffer5" value="Party Sessions"> Party Sessions

                        <input type="checkbox" name="serviceOffer6" value="Dinner Dates"> Dinner Dates

                        <br> 
                        <input type="checkbox" name="serviceOffer7" value="Couples"> Couples
 
                        <input type="checkbox" name="serviceOffer8" value="Fly me to you"> Fly me to you

                        <input type="checkbox" name="serviceOffer9" value="Message"> Message

                        <br> 
                        <input type="checkbox" name="serviceOffer10" value="Videoing"> Videoing

                        <input type="checkbox" name="serviceOffer11" value="Dress Up"> Dress Up

                        <input type="checkbox" name="serviceOffer12" value="Tantra"> Tantra

                        <br> 
                        <input type="checkbox" name="serviceOffer13" value="Anal"> Anal

 
                        <input type="checkbox" name="serviceOffer14" value="bbj"> bbj


                        <input type="checkbox" name="serviceOffer15" value="Covered bj"> Covered bj
                      
                    </div>
                  </div>

                   

                  
                  
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Hair')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="hair">
                            <option value="<?php echo e($escort->hair); ?>"><?php if($escort->hair==NULL): ?> None <?php else: ?> Current <?php echo e(\App\EscortDropdown::find($escort->hair)->dropdownTitle); ?> <?php endif; ?> </option>
                        <?php $hairs=\App\EscortDropdown::all()->where('status', 5);?> 
                        <?php $__currentLoopData = $hairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($hair->id); ?>"><?php echo e($hair->dropdownTitle); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Whatsapp Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="whatsup" value="<?php echo e($escort->whatsup); ?>" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Snap Chat Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="snapchat" value="<?php echo e($escort->snapchat); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Instagram Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="instagram" value="<?php echo e($escort->instagram); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Follow Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="follow_me" value="<?php echo e($escort->follow_me); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Email Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="email_me" value="<?php echo e($escort->email_me); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Website Link</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="website" value="<?php echo e($escort->website); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Straight/Bi/Gay</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="straight" value="<?php echo e($escort->straight); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Bust</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="bust" value="<?php echo e($escort->bust); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Personal Type</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="personal_type" value="<?php echo e($escort->personal_type); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Pet Hate</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="pet" value="<?php echo e($escort->pet); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Favourite Drink</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="drink" value="<?php echo e($escort->drink); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Favourite food</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="food" value="<?php echo e($escort->food); ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1">Service Provider</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="service" value="<?php echo e($escort->service); ?>" class="form-control">
                      </div>
                    </div>
                  </div>

                  

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Activation')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="activation"> 
                          <option value="<?php echo e($escort->activation); ?>">Current <?php if($escort->activation==1): ?> Available Now <?php elseif($escort->activation==0): ?> Not Available <?php else: ?> None <?php endif; ?> </option>
                          <option value="1">Available Now</option>
                          <option value="0">Not Available</option>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Dress')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="dress" value="<?php echo e($escort->dress); ?>" class="form-control">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Height')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="height" value="<?php echo e($escort->height); ?>" class="form-control">
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Price')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="price" value="<?php echo e($escort->price); ?>" class="form-control">
                      </div>
                    </div>
                  </div>



                 <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Country')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <select class="form-control" name="country" id="country">
                        <option value="">Country</option>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($country->id); ?>" <?php if($escort->country == $country->id): ?> selected <?php endif; ?> ><?php echo e($country->country); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Home Location')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="hidden" name="state_id" value="<?php echo e($escort->state); ?>" id="state_id">
                      <select class="form-control" name="city" id="state">
                        <option value="">Home Location</option>
                      </select>
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Suburb')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="hidden" name="city_id1" value="<?php echo e($escort->city); ?>" >
                        <input type="text" name="suburb" id="suburb" class="form-control">
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Code')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="code" value="<?php echo e($escort->code); ?>" class="form-control">
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
    </section>
  </div>
  <style>
    *{box-sizing: border-box;}
html{height: 100%;margin: 0;}
body{min-height: 100%;font-family: 'Roboto';margin: 0;background-color: #fafafa;}
.container { margin: 150px auto; max-width: 960px;}
label{display: block;padding: 20px 0 5px 0;}
.tagsinput,.tagsinput *{box-sizing:border-box}
.tagsinput{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;background:#fff;font-family:sans-serif;font-size:14px;line-height:20px;color:#556270;padding:5px 5px 0;border:1px solid #e6e6e6;border-radius:2px}
.tagsinput.focus{border-color:#ccc}
.tagsinput .tag{position:relative;background:#556270;display:block;max-width:100%;word-wrap:break-word;color:#fff;padding:5px 30px 5px 5px;border-radius:2px;margin:0 5px 5px 0}
.tagsinput .tag .tag-remove{position:absolute;background:0 0;display:block;width:30px;height:30px;top:0;right:0;cursor:pointer;text-decoration:none;text-align:center;color:#ff6b6b;line-height:30px;padding:0;border:0}
.tagsinput .tag .tag-remove:after,.tagsinput .tag .tag-remove:before{background:#ff6b6b;position:absolute;display:block;width:10px;height:2px;top:14px;left:10px;content:''}
.tagsinput .tag .tag-remove:before{-webkit-transform:rotateZ(45deg);transform:rotateZ(45deg)}
.tagsinput .tag .tag-remove:after{-webkit-transform:rotateZ(-45deg);transform:rotateZ(-45deg)}
.tagsinput div{-webkit-box-flex:1;-webkit-flex-grow:1;-ms-flex-positive:1;flex-grow:1}
.tagsinput div input{background:0 0;display:block;width:100%;font-size:14px;line-height:20px;padding:5px;border:0;margin:0 5px 5px 0}
.tagsinput div input.error{color:#ff6b6b}
.tagsinput div input::-ms-clear{display:none}
.tagsinput div input::-webkit-input-placeholder{color:#ccc;opacity:1}
.tagsinput div input:-moz-placeholder{color:#ccc;opacity:1}
.tagsinput div input::-moz-placeholder{color:#ccc;opacity:1}
.tagsinput div input:-ms-input-placeholder{color:#ccc;opacity:1}

  </style>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.11/jquery.autocomplete.js" integrity="sha512-JwPA+oZ5uRgh1AATPhLKeByWbXcsRnMMSBpvhuAGQp+CWISl/fHecOshbRcPPgKWau9Wy1H5LhiwAa4QFiQKYw==" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('assets/frontend/newjs/autocomplete.js')); ?>"></script>
<script>
/*  $(function() {
 

$("#state").on('change',function(){
    var src = "<?php echo e(route('profile-suburb-name')); ?>";
    var state = this.value;
    $('#suburb').tagsInput({
        'autocomplete':          {
            source:function(request, response){
                 $.ajax({
                  url: src,
                  type :"POST",
                  data:{
                    "_token": "<?php echo e(csrf_token()); ?>",
                    state:state,
                    query : request.term
                  },
                  success: function(data) {
                  response(data);

                }
              });
            },minLength: 2,
          }
        });
    });
});
*/

</script>
  <script>
    $(document).ready(function(){
      $('#country').on('change',function(){
        var country = this.value;
        $.ajax({
          url : "<?php echo e(route('profile-country-name')); ?>",
          type:"POST",
          data:{
            "_token": "<?php echo e(csrf_token()); ?>",
            country:country
          },
          success: function(data) {
            $("#state").html(data);
          }
        });
      });

      $("#state").on('change',function(){
        var src = "<?php echo e(route('profile-suburb-name')); ?>";
        var state = this.value;
          $("#suburb").autocomplete({
            source: function(request, response) {
              $.ajax({
                url: src,
                type :"POST",
                data:{
                  "_token": "<?php echo e(csrf_token()); ?>",
                  state:state,
                  query : request.term
                },
                success: function(data) {
                  response(data);
                }
              });
            },
            minLength: 2,
            
          });
      });


      var country = $("#country").val();
        var state_id = $("#state_id").val();
        if(country != '' && state_id != ''){
          $.ajax({
            url : "<?php echo e(route('profile-country-name')); ?>",
            type:"POST",
            data:{
              "_token": "<?php echo e(csrf_token()); ?>",
              country:country,
              state_id:state_id
            },
            success: function(data) {
              $("#state").html(data);
            }
          });

        }
    });
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/profileSettings.blade.php ENDPATH**/ ?>