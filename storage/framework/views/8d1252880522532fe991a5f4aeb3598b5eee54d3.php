<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a href="<?php echo e(route('profile.stats.index')); ?>" class="navbar-brand wow fadeIn" data-wow-delay="0.5s">
            <img src="<?php echo e(asset('assets/profile/images/logo.png')); ?>">
        </a>
    </div>
    <div class="right">
        <h1 id="page_header_heading"> <?php echo $__env->yieldContent('header_title'); ?></h1>
        <!--<div class="breadcrumb">Home » Task Type</div>-->

        <?php if(Session::has('message')): ?>
            <p style="width: 72%;text-align: center;" class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
        <?php endif; ?>
        <div class="frd-rqst-area">
            <a href="<?php echo e(route('escort.friend-requests')); ?>">
                <img src="<?php echo e(asset('assets/profile/images/friend-request-icon.png')); ?>" />
                <span></span>
            </a>
        </div>
        <div class="notification-area">
            <img src="<?php echo e(asset('assets/profile/images/bell-icon.png')); ?>">
            <span>
            
            </span>
        </div>
        <div class="dropdown show user">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo e(asset('assets/profile/images/user-icon.png')); ?>">
                <div class="name"><?php echo e(Auth::user()->name); ?> <span>Escort</span></div>
                <i class="icofont-caret-down"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                
                <a class="dropdown-item" href="<?php echo e(route('client.logout')); ?>">Logout</a>
            </div>
        </div>
    </div>
</nav><?php /**PATH /home/honeydevealakmal/public_html/resources/views/partials/_profileHeader.blade.php ENDPATH**/ ?>