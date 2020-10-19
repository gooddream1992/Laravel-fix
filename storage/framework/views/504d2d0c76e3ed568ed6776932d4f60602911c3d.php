<?php $__env->startSection('title', __('Business Etiquete')); ?>
<?php $__env->startSection('main'); ?>
  <?php $hedfoots=\App\HeaderFooter::orderBy('id','desc')->first(); 
                                 $footerlogo= $hedfoots->footerLogo;?>


<section class="auth-page sign-in-page" style="background-image: url('<?php echo e(asset('public/uploads/no-fake-profile-bg.jpg')); ?>'); background-size:cover;background-position: center;">
            <div class="container">
                <div class="auth-box">
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="<?php echo e(asset('public/uploads/'.$footerlogo)); ?>" class="auth-logo" />
                            <form>
                                <!--                                <div class="form-group">
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" class="custom-control-input" id="client-signup" name="example" value="customEx">
                                                                        <label class="custom-control-label" for="client-signup">Client Sign Up</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" class="custom-control-input" id="escort-signup" name="example" value="customEx">
                                                                        <label class="custom-control-label" for="escort-signup">Escort Sign Up</label>
                                                                    </div>
                                                                </div>-->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder=""/>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder=""/>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder=""/>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" placeholder=""/>
                                </div>
                                <div class="form-group">
                                    <label>I am</label>
                                    <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                        <label class="btn btn-secondary active">
                                            <input type="radio" name="options" id="option1" autocomplete="off" checked> Client
                                        </label>
                                        <label class="btn btn-secondary">
                                            <input type="radio" name="options" id="option2" autocomplete="off"> Escort
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn red-small btn-block c-center">Sign Up</button>

                                     <br><b style="color:white">Already CLient? </b><a class="btn red-small c-center" href="<?php echo e(url('client/login')); ?>">Sign In</a>
                                </div>
                                <!--                                <div class="sign-up-actions">
                                                                    <button class="btn btn-line">Client Sign Up</button>
                                                                    <button class="btn btn-line">Escort Sign Up</button>
                                                                </div>-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/frontend/pages/clientSignup.blade.php ENDPATH**/ ?>