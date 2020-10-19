<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">Font Icon</a> -->
  <!-- Left navbar links -->

<style type="text/css">
  .mybtn{border: 2px solid white;color:white;font-style: 1.5em;margin: 10px;padding:5px;}
</style>


  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link NBar" data-widget="pushmenu" href="#"><span class="line1"></span><span class="line2"></span><span class="line3"></span></a>
    </li>
     <li class="user-header">
          <a href="<?php echo e(url('/')); ?>" class="mybtn">Home</a>
        </li>

         <li class="user-header">
          <a href="<?php echo e(url('create-invoice')); ?>" class="mybtn">Dashboard</a>
        </li>
      <li class="user-header">
          <a href="<?php echo e(url('create-invoice')); ?>" class="mybtn">Explore Cities</a>
        </li>
        <li class="user-header">
          <a href="<?php echo e(url('invoice_list')); ?>" class="mybtn">Business Etiquette</a>
        </li>
       <li class="user-header">
          <a href="<?php echo e(url('customer/all')); ?>" class="mybtn">Our Story</a>
        </li>
        <li class="user-header">
          <a href="<?php echo e(url('customer/all')); ?>" class="mybtn">FAQ</a>
        </li>
        <li class="user-header">
          <a href="<?php echo e(url('customer/all')); ?>" class="mybtn">Client Membership</a>
        </li>
        
  </ul>




  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link TIbox ami" data-widget="control-sidebar" data-slide="true" href="#">
        <i class="far fa-user On"></i><i class="fas fa-times Off"></i>
      </a>
    </li>
  </ul>
</nav>



<aside class="control-sidebar UserASIDE control-sidebar-dark">


  <div class="UserImage text-center">
     <span class="logo-lg">
      <img src="<?php echo e(asset('public/honeylogo.gif')); ?>" class="img-fluid">
    </span>

    <h4 class="pt-2 pb-1"><?php echo e(Auth::user()->name); ?></h4>
    <p> Since 2020</p>
  </div>
  <div class="User_buttons clearfix text-center">
    <!-- <a href="#" class="User_links"><i class="far fa-comment-alt"></i>
      <p class="Abailable">Chat(80)</p>
    </a> -->
    <!-- <a href="#" class="User_links"><i class="fas fa-envelope-square"></i>
      <p>Massage Inbox</p>
    </a> -->
    <!-- <a href="<?php echo e(url('logo')); ?>" class="User_links"><i class="fas fa-project-diagram"></i>
      <p>Change Logo</p>
    </a> -->
    <a href="<?php echo e(url('profile/edit/'.Auth::user()->id)); ?>" class="User_links"><i class="far fa-id-badge"></i>
      <p>Manage Profile</p>
    </a>
    <!-- <a href="<?php echo e(url('admin/register/')); ?>" class="User_links"><i class="fas fa-ticket-alt"></i>
      <p>User Role</p>
    </a> -->
    <a href="<?php echo e(url('reset/password/get/'.Auth::user()->id)); ?>" class="User_links"><i class="fas fa-key"></i>
      <p>Reset Password</p>
    </a>
  </div>
  <div class="Logout_user text-center">
    <a href="<?php echo e(route('admin.logout')); ?>" class="UserLogout"><i class="fas fa-sign-out-alt"></i>Logout</a>
  </div>
</aside>
<!-- /.control-sidebar --><?php /**PATH /home/honeydevealakmal/public_html/resources/views/includes/sadmin-header.blade.php ENDPATH**/ ?>