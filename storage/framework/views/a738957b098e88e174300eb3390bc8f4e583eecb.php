<?php $__env->startSection('title', __('Client Login')); ?>
<?php $__env->startSection('main'); ?>
<?php
    $hedfoots=\App\HeaderFooter::orderBy('id','desc')->first();
    $footerlogo= $hedfoots->footerLogo;
?>


<section class="auth-page sign-in-page" style="background-image: url('<?php echo e(asset('public/uploads/no-fake-profile-bg.jpg')); ?>'); background-size:cover;background-position: center;">
     <?php if(session('status')): ?>
     <div class="container">
         <div class="alert alert-success" align="center">
            <?php echo e(session('status')); ?>

        </div>
     </div>
    <?php endif; ?>
            <div class="container">
                <div class="auth-box">
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="<?php echo e(asset('public/uploads/'.$footerlogo)); ?>" class="auth-logo" />




                        <form method="POST" action="<?php echo e(route('login')); ?>" >
                                  <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" placeholder="Email ID" required="">
                                <?php if($errors->has('email')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong><?php echo e(__('Oh snap!')); ?></strong> <?php echo e($errors->first('email')); ?>

                                </div>

                                <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" placeholder="Password" required="">
                                <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                                <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <div class="auth-remember-part">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                            <label class="custom-control-label" for="customCheck">Remember me</label>
                                        </div>
                                        <a href="<?php echo e(url('forgotpassword')); ?>">Forgot Password?</a>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" class="btn red-small btn-block c-center" value="Login">

                                    <br><b style="color:white">New Client? </b><a class="btn red-small c-center" href="<?php echo e(url('client/signup')); ?>">Signup</a>

                                </div>
  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.loginFrontMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/pages/clientLogin.blade.php ENDPATH**/ ?>