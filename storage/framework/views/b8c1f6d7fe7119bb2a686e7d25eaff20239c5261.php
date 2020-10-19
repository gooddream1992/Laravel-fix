<?php $__env->startSection('title', __('Client Login')); ?>
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
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder=""/>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder=""/>
                                </div>
                                <div class="form-group">
                                    <div class="auth-remember-part">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                            <label class="custom-control-label" for="customCheck">Remember me</label>
                                        </div>
                                        <a href="#">Forgot Password?</a>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn red-small btn-block c-center">Login</button>

                                    <br><b style="color:white">New CLient? </b><a class="btn red-small c-center" href="<?php echo e(url('client/signup')); ?>">Signup</a>

                                </div>
  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/frontend/pages/clientLogin.blade.php ENDPATH**/ ?>