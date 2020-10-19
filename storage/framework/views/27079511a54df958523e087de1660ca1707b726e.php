<?php
    $hedfoots=\App\HeaderFooter::orderBy('id','desc')->first();
    $footerlogo= $hedfoots->footerLogo;
?>
<!DOCTYPE html>
<html>
<head>
    <title>HONEYLUXE - HOME</title>
     <!-- Bootstrap core CSS -->
        <link href="<?php echo e(asset('assets/frontend/css/style.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" media="all" type="text/css" href="<?php echo e(asset('assets/frontend/fontawesome-free-5.0.7/css/fontawesome-all.css')); ?>">
</head>
<body>
<nav class="navbar navbar-inverse header">
          <div class="container-fluid top">
        <nav class="menu left-menu">
                  <ul>
            <li class="m-hidden">
                          <div class="flexbox-container">
                              <a href="" class="red-small">Login</a>
                          </div>
                            <ul class="submenu">
                              <li class="subOption"><a href="<?php echo e(url(url('client/login'))); ?>">Client Login</a></li>
                                <li class="subOption"><a href="<?php echo e(url(url('escort/login'))); ?>">Escort Login</a></li>
                          </ul>
                      </li>
                     </ul>
                </nav>
        <a href="<?php echo e(url('/home')); ?>" class="white-btn">Dashboard</a>
        <button class="white-btn"><span>34</span> Dscort Updates</button>
        <button class="white-btn">Chat Room</button>
        <button class="white-btn">Forum</button>
        <button class="white-btn">Available Now For 3 hours</button>
        <nav class="menu">
                  <ul>
                      <li class="m-hidden">
                          <div class="flexbox-container">
                              <a href="" class="red-small">Menu</a>
                            </div>
                            
                            <ul class="submenu">
                                <li class="subOption"><a href="<?php echo e(url('/home')); ?>">Dashboard</a></li>
                                <li class="subOption"><a href="<?php echo e(url('/multi/page')); ?>">Activities</a></li>
                                <li class="subOption"><a href="<?php echo e(url('/blog')); ?>">Blogs</a></li>
                                <li class="subOption"><a href="<?php echo e(url('/local/resources')); ?>">Local Resources</a></li>
                                <li class="subOption"><a href="<?php echo e(url('/explore/cities')); ?>">Explore Cities</a></li>
                                <li class="subOption"><a href="<?php echo e(url('/business/etiquete')); ?>">Business Etiquette</a></li>
                                <li class="subOption"><a href="<?php echo e(url('/out/story')); ?>">Our Story</a></li>
                                <li class="subOption"><a href="<?php echo e(url('/client/membership')); ?>">Client Membership</a></li>
                                <li class="subOption"><a href="<?php echo e(url('/faq')); ?>">FAQs</a></li>
                                <li class="subOption"><a href="<?php echo e(url('/privacy/statement')); ?>">Privacy Policy</a></li>
                                <li class="subOption"><a href="<?php echo e(url('/terms/condition')); ?>">Terms & Condition</a></li>
                            </ul>
                            
                      </li>
                    </ul>
                    <div class="hamburger m-hidden"><span></span></div>
                    <div class="dimmer"></div>
                </nav>
          </div>
            <div class="container-fluid">
                <div class="navbar-header">
                  <?php $hedfoots=\App\HeaderFooter::orderBy('id','desc')->first(); $headerlogo= $hedfoots->headerLogo;?>
                    <a href="<?php echo e(url('/')); ?>" class="navbar-brand wow fadeIn logo-text" data-wow-delay="0.5s">
                      <img src="<?php echo e(asset('public/uploads/'.$headerlogo)); ?>" class="header-animated-logo"/></a>
                </div>
                <div class="header-menu-right desktop-menu">
                    <nav class="menu">
                        <ul>
                            <li><a href="<?php echo e(url('explore/cities')); ?>">Explore Cities</a></li>
                            <li><a href="<?php echo e(url('terms/condition')); ?>">Terms & Condition</a></li>
                            <li><a href="<?php echo e(url('business/etiquete')); ?>">Business Etiquette</a></li>
                            <li><a href="<?php echo e(url('our/story')); ?>">Our Story</a></li>
                            <li><a href="<?php echo e(url('faq')); ?>">FAQ</a></li>
                            <li><a href="<?php echo e(url('client/membership')); ?>">Client Membership</a></li>
                            
                            
                            <li>
                                <?php if(auth()->guard()->guest()): ?>
                                <div class="flexbox-container">
                                  <a class="red-small">Join Now</a>
                                </div>
                                <ul class="submenu">
                                  <li class="subOption"><a href="<?php echo e(url('client/signup')); ?>">As Client</a></li>
                                  <li class="subOption"><a href="<?php echo e(url('escort/signup')); ?>">As Escort</a></li>
                                </ul>
                                <?php else: ?> 
                                  <a href="<?php echo e(url('/home')); ?>" class="red-small">Dashboard</a>
                                <?php endif; ?>
                              </li>
                              
                        </ul>
                        <div class="hamburger m-hidden"><span></span></div>
                        <div class="dimmer"></div>
                    </nav>
                    <div class="top-right desktop m-hidden">
                        <ul>
              
                            <li><a class="btn gray-btn search-box" href="#search"><img src="<?php echo e(asset('public/uploads/search-icon.png')); ?>" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
<?php if($message = Session::get('message')): ?>
<h4 class="alert alert-success"><?php echo e($message); ?></h4>
<?php elseif($error = Session::get('error')): ?>
<h4 class="alert alert-danger" align="center"><?php echo e($error); ?></h4>
<?php endif; ?>
<style>
.alert-success, .alert-danger {
text-align: center;
margin-bottom: 0;
}
#name-error, #email-error, #password-error, #cpassword-error{
    font-weight: bold;
    color: red;
}
</style>
<section class="auth-page sign-in-page" style="background-image: url('<?php echo e(asset('public/uploads/no-fake-profile-bg.jpg')); ?>'); background-size:cover;background-position: center;">
            <div class="container">

                <div class="auth-box">
                    <div class="row">

                        <div class="col-lg-12">

                            <img src="<?php echo e(asset('public/uploads/'.$footerlogo)); ?>" class="auth-logo" />


                           <form method="POST" action="<?php echo e(url('forgotpassword/sentemail')); ?>" id="form">
                                   <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span style="color: red;">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn red-small btn-block c-center" type="submit">Submit</button>
                                </div>
                          
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<!--Add custom scripts here -->

<script>
 $(document).ready(function(){
 $('#form').validate({
                rules: {
                   'email':{
                        required:true,
                    },
                },
                messages: {
                    'email': "* Please Enter Your Email",
                }
              });
            });
</script>
</body>
</html>
<?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/pages/clientforgotpwd.blade.php ENDPATH**/ ?>