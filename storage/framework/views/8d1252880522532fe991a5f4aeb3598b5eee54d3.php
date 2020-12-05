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
        <?php if(Session::has('main_login_type') && Auth::user()->parent_id == ''): ?>
        <div class="frd-rqst-area" style="right: 564px;top: 31px;">
            <a href="<?php echo e(route('admin.session')); ?>" style="color: white;border-radius: 4px;padding: 9.2%;background: red;">
                Admin Login
            </a>
        </div>
        <?php endif; ?>
        <a class="btn frd-rqst-area" href="<?php echo e(route('escort.feed.upload')); ?>" style="background: red;color: white;right: 437px;top: 31px;">Upload a Post</a>
        <div class="frd-rqst-area">
            <a href="<?php echo e(route('escort.friend-requests')); ?>">
                <img src="<?php echo e(asset('assets/profile/images/friend-request-icon.png')); ?>" />
                <span></span>
            </a>
        </div>
        <a href="<?php echo e(route('escort.notifications')); ?>">
            <div class="notification-area">
                <img src="<?php echo e(asset('assets/profile/images/bell-icon.png')); ?>">
                <span>
                    
                </span>
            </div>
        </a>
        <div class="dropdown show user">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                    $profile_image = NULL;
                    $profile_image_arr = DB::table('profile_images')->where('status','5')->where('escortId',Auth::user()->id)->get();
                    if(count($profile_image_arr) > 0)
                    {
                        $profile_image = $profile_image_arr[0]->image;
                    }
                ?>
                <?php if($profile_image==NULL): ?>
                    <img style="height: 44px; width: 44px; border-radius: 25px;" src="<?php echo e(asset('public/blankphoto.png')); ?>">
                <?php else: ?>
                    <img style="height: 44px; width: 44px; border-radius: 25px;" src="<?php echo e(asset('public/uploads/'.$profile_image)); ?>">
                <?php endif; ?>
                <div class="name"><?php echo e(Auth::user()->name); ?> <span>Escort</span></div>
                <i class="icofont-caret-down"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                
                <a class="dropdown-item" href="<?php echo e(route('client.logout')); ?>">Logout</a>
            </div>
        </div>
    </div>
</nav><?php /**PATH /home/honeydevealakmal/public_html/resources/views/partials/_profileHeader.blade.php ENDPATH**/ ?>