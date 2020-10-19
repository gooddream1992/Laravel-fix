<!DOCTYPE html>
<head>
  <title><?php echo e(__('HoneyLuxe Admin Login')); ?></title>
  <!-- bootstrap-css -->
  <link rel="stylesheet" href="<?php echo e(asset('public/css/bootstrap.min.css')); ?>" >
  <!-- //bootstrap-css -->
  <!-- Custom CSS -->
  <link href="<?php echo e(asset('public/css/style.css')); ?>" rel='stylesheet' type='text/css' />
  <!-- Custom CSS -->
  
</head>
<body style="background-image: url('./public/bg.jpg'); background-size: cover;background-repeat: no-repeat;background-attachment: fixed;">

    <div class="w3layouts-main">
      <h2><img src="<?php echo e(asset('public/honeylogo.gif')); ?>" style="width: 50%;"><br><?php echo e(__('Honeluxe Admin')); ?></h2>
      
<form method="POST" action="<?php echo e(route('login')); ?>">
          <?php echo csrf_field(); ?>
          <input id="email" type="email" class="ggg<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email"placeholder="Email ID" required="">
          <?php if($errors->has('email')): ?>
          <div class="alert alert-danger" role="alert">
            <strong><?php echo e(__('Oh snap!')); ?></strong> <?php echo e($errors->first('email')); ?>

          </div>
          
          <?php endif; ?>
          <input id="password" type="password" class="ggg<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" placeholder="Password" required="">
          <?php if($errors->has('password')): ?>
          <span class="invalid-feedback" role="alert">
            <strong><?php echo e($errors->first('password')); ?></strong>
          </span>
          <?php endif; ?>
          
          <button type="submit" name="login"><?php echo e(__('Login')); ?></button>
        </form>

</div>
</body>
</html><?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/auth/login.blade.php ENDPATH**/ ?>