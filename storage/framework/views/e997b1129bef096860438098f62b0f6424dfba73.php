<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="<?php echo e(asset('public/client_library/image/favicon.png')); ?>">

        <title><?php echo $__env->yieldContent('title'); ?></title>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo e(asset('public/client_library/css/style.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('public/client_library/css/escort_admin_style.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/client_library/css/style2.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/client_library/css/icofont.min.css')); ?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>

        <!-- Header -->
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a href="index.html" class="navbar-brand wow fadeIn" data-wow-delay="0.5s"><img src="<?php echo e(asset('public/client_library/image/logo.png')); ?>" ></a>
            </div>
            <div class="right">
                <h1 id="page_header_heading"><?php echo $__env->yieldContent('header_title'); ?></h1>

                <!--<div class="breadcrumb">Home » Task Type</div>-->
                <div class="frd-rqst-area">
                    <?php if(Session::has('message')): ?>
                        <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
                    <?php endif; ?>
                    
                </div> 
                <div class="notification-area">
                    <a href="<?php echo e(route('client.notification')); ?>">
                        <img src="<?php echo e(asset('public/client_library/image/bell-icon.png')); ?>">
                        <?php
                            $notifications = DB::table('notification')->where('user_id',Auth::user()->id)->get();
                        ?>
                        <span><?php count($notifications) ?></span>
                    </a>
                </div>
                <div class="dropdown show user">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo e(asset('public/client_library/image/user-icon.png')); ?>">
                        <div class="name"><?php echo e(Auth::user()->name); ?> <span>Client</span></div>
                        <i class="icofont-caret-down"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo e(route('client.logout')); ?>">Logout</a>
                    </div>
                </div>
            
            </div>
        </nav>

        <!-- Header END -->


        <!-- Content -->
        <div id="content">
            <!-- Section 1 -->

            <section class="row-am home missed-visit-report row">
                <div class="col-md-3 clearfix left-admin-menu">
                    <nav class="navbar navbar-expand-lg left-icon ">

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="navbar-nav mr-auto sidenav" id="navAccordion">
                                <!--                                <li class="nav-item">
                                                                    <a class="nav-link nav-link-collapse" href="#" id="hasSubItems" data-toggle="collapse" data-target="#collapseSubItems1" aria-controls="collapseSubItems1" aria-expanded="false"><img src="images/file-icon.png"> <span>File</span></a>
                                                                    <ul class="nav-second-level collapse" id="collapseSubItems1" data-parent="#navAccordion">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" href="#">
                                                                                <span class="nav-link-text"><i class="fab fa-accessible-icon"></i> <span>Item 2.1</span></span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" href="#">
                                                                                <span class="nav-link-text"><i class="fab fa-accessible-icon"></i> <span>Item 2.2</span></span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </li>-->
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <div class="dash-menu-icon dash-icon-1"></div>
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(request()->route()->getName() === 'client.friendlist' ? ' active ' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('client.friendlist')); ?>">
                                        <div class="dash-menu-icon dash-icon-3"></div>
                                        <span>Friendship List</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item <?php echo e(request()->route()->getName() === 'client.blog' ? ' active ' : ''); ?>" >
                                    <a class="nav-link" href="<?php echo e(route('client.blog')); ?>">
                                        <div class="dash-menu-icon dash-icon-6"></div>
                                        <span>Blog</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(request()->route()->getName() === 'client.feed' ? ' active ' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('client.feed')); ?>">
                                        <div class="dash-menu-icon dash-icon-10"></div>
                                        <span>Feed</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(request()->route()->getName() === 'client.notification' ? ' active ' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('client.notification')); ?>">
                                        <div class="dash-menu-icon dash-icon-9"></div>
                                        <span>Notifications</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(request()->route()->getName() === 'client.newprofiles' ? ' active ' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('client.newprofiles')); ?>">
                                        <div class="dash-menu-icon dash-icon-11"></div>
                                        <span>New Profiles</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(request()->route()->getName() === 'client.ticket' ? ' active ' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('client.ticket')); ?>">
                                        <div class="dash-menu-icon dash-icon-2"></div>
                                        <span>Submit ticket</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(request()->route()->getName() === 'client.faq.client' ? ' active ' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('client.faq.client')); ?>">
                                        <div class="dash-menu-icon dash-icon-5"></div>
                                        <span>FAQ</span>
                                    </a>
                                </li>
                                <li class="nav-item  <?php echo e(request()->route()->getName() === 'client.profile' ? ' active ' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('client.profile')); ?>">
                                        <div class="dash-menu-icon dash-icon-7"></div>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <!--<li class="nav-item"><a class="nav-link" href="#"><div class="dash-menu-icon dash-icon-6"></div> <span>Tours</span></a></li>-->
                                <!--<li class="nav-item"><a class="nav-link" href="#"><div class="dash-menu-icon dash-icon-5"></div> <span>Friend Request</span></a></li>-->
                                <li class="nav-item <?php echo e(request()->route()->getName() === 'client.manage-account' ? ' active ' : ''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('client.manage-account')); ?>">
                                        <div class="dash-menu-icon dash-icon-12"></div>
                                        <span>Manage Account</span>
                                    </a>
                                </li>
                                <li class="logout-menu">
                                    <a class="logout-btn" href="<?php echo e(route('client.logout')); ?>">
                                        <span>
                                            <img src="<?php echo e(asset('public/client_library/image/logout-icon.png')); ?>">&nbsp;Logout
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>

<!-- Above Header Are called into the various Pages -->


<?php $__env->startSection('home'); ?>        



<?php echo $__env->yieldSection(); ?>
  
<!-- Below Footer Are called into the various Pages -->


                  <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo e(asset('public/client_library/js/jquery.min.js')); ?>"></script>
        
        <script src="<?php echo e(asset('public/client_library/js/bootstrap.min.js')); ?>"></script>
        
        <script src="<?php echo e(asset('public/client_library/js/index.js')); ?>"></script>
        <script src="<?php echo e(asset('public/client_library/js/simple-sidebar.js')); ?>" type="text/javascript"></script>
        
        <script>
            var $y = jQuery.noConflict();
        </script>
        <script>
            $y(document).ready(function () {
                if (!$y.browser.opera) {
                    // select element styling
                    $y('select.select').each(function () {
                        var title = $y(this).attr('title');
                        if ($y('option:selected', this).val() != '')
                            title = $y('option:selected', this).text();
                        $y(this)
                                .css({'z-index': 10, 'opacity': 0, '-khtml-appearance': 'none'})
                                .after('<span class="select">' + title + '</span>')
                                .change(function () {
                                    val = $y('option:selected', this).text();
                                    $y(this).next().text(val);
                                })
                    });
                }
                ;
            });
        </script>

        <script src="<?php echo e(asset('public/client_library/js/wow.min.js')); ?>"></script>
        <script>
            new WOW().init();
            $(".custom-file-input").on("change", function () {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
            $(document).on('click', '#availability-status', function (e) {
                var value = $('#availibility-check').is(':checked');

                if (value == false) {

                    $(this).html("<input type='checkbox' id='availibility-check'>Available Now");
                } else {


                    $(this).html("<input type='checkbox' id='availibility-check'>Not Available");
                }
            });
        </script>
        
    </body>
</html>
<?php /**PATH /home/honeydevealakmal/public_html/resources/views/client/master/layouts.blade.php ENDPATH**/ ?>