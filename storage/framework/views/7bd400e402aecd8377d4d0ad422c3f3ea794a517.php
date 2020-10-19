<aside class="main-sidebar sidebar-dark-primary elevation-1">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Brand Logo -->
    <div class="user-panel mb-3 d-flex">
      <div class="image">
        
        <span class="logo-lg">
          <img src="<?php echo e(asset('public/honeylogo.gif')); ?>" class="img-circle elevation-1" alt="Brand Logo">
        </span>
        
        
      </div>
      <div class="info">
        <a href="<?php echo e(url('/home')); ?>" class="d-block">HoneyLuxe Admin</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        
        <!--=====================Plan 2 and plan 5===============================-->
        <li class="nav-item has-treeview">
          <a href="<?php echo e(url('/home')); ?>" class="nav-link active">
            
            <p><i class="nav-icon fas fa-home"></i>Dashboard </p>
          </a>
        </li>



     <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>General Setting<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
             <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Account </p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('user/list')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Account List</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo e(url('location/add')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Location Add</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('slider/add')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Slider Add</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="<?php echo e(url('header/footer')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Header & Footer</p>
              </a>
            </li>
            
            
          </ul>
        </li>

         <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Escorts<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

             <li class="nav-item">
              <a href="<?php echo e(url('escort/dropdown')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Escort Dropdown</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="<?php echo e(url('new/escort')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Escort</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('escort/list')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Escort List</p>
              </a>
            </li>

            

          
            
            
          </ul>
        </li>

         

         <li class="nav-item has-treeview  menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Main Front Pages<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('home/page')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Home Page</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('home/page')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Explore Cities</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="<?php echo e(url('admin/terms')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Terms & Condition</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('admin/business/etiquete')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Business Etiquette</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('admin/our/story')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Our Story</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo e(url('admin/faq')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>FAQ</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(url('admin/client/relationship')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Client Membership</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo e(url('profile')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile</p>
              </a>
            </li>
            
            
          </ul>
        </li>


         <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Provider Resources<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('admin/sex/trafficking')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Stop Sex Trafficking</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('admin/local/resources')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Free Local Resources</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('admin/purchase/marketing')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Purchase Marketing</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(url('admin/become/escort')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Become an Escort</p>
              </a>
            </li>
            

      
            
          </ul>
        </li>



 <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Professionals Platform<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('admin/blog')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Real Escort Reviews</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('admin/blog')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Honey News & Blog</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('profile')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Escort Tours</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(url('admin/blog')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Escort Bloging Corner</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="<?php echo e(url('escort/list')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Search Escort</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('admin/blog')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Client Bloging Corner</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('admin/business/etiquete')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Business Etiquete</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="<?php echo e(url('admin/terms')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Terms & Condition</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="<?php echo e(url('admin/our/story')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Our Story & Promise</p>
              </a>
            </li>

          
            
            
          </ul>
        </li>







        
        
        <li class="nav-item has-treeview">
          <a href="<?php echo e(route('admin.logout')); ?>" class="nav-link">
            
            <p style="color: #9d0000;"> <i class="fa fa-key"></i> <?php echo e(__('Logout')); ?></p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside><?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/includes/sadmin-menu-sidebar.blade.php ENDPATH**/ ?>