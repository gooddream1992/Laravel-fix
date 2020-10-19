<aside class="main-sidebar sidebar-dark-primary elevation-1">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Brand Logo -->
    <div class="user-panel mb-3 d-flex">
      <div class="image">
        
        <span class="logo-lg">
          <img src="<?php echo e(asset('public/logo.png')); ?>" class="img-circle elevation-1" alt="Brand Logo">
        </span>
        
        
      </div>
      <div class="info">
        <a href="<?php echo e(url('/home')); ?>" class="d-block">Accounting Software</a>
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
            
            <p><i class="nav-icon fas fa-home"></i>Admin </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?php echo e(url('branches')); ?>" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Branch Management </p>
          </a>
          
        </li>

          <li class="nav-item has-treeview">
          <a href="<?php echo e(url('meter/reading')); ?>" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Current Meter Reading </p>
          </a>
          
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Inventory Management<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('product/category/add')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Category</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('product/category/list')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Category List</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="<?php echo e(url('product/add')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Store</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('product/list')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Store List</p>
              </a>
            </li>
            
            
          </ul>
        </li>


        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Cashier Management<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
          

             <li class="nav-item">
              <a href="<?php echo e(url('cashier/list')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Cashier List</p>
              </a>
            </li>
            
            
          </ul>
        </li>


           <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Data Entry<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('start/data/entry')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Data Entry</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('ledger')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Entry Ledger</p>
              </a>
            </li>
          </ul>
        </li>


            <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Money Receipt<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Money Receipt</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Money Receipt List</p>
              </a>
            </li>
          </ul>
        </li>


            <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Vendor Management<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('vendor/add')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Vendor</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('vendor/list')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Vendor List</p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Purchase Management<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('purchase/start')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Purchase</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('purchase/list')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Purchase List</p>
              </a>
            </li>
          </ul>
        </li>


          <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Corporate Management<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Corporate</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Corporate List</p>
              </a>
            </li>
          </ul>
        </li>


        


         <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Expense Management<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Expense</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Expense List</p>
              </a>
            </li>
          </ul>
        </li>

      

         <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Accounts Management<i class="right fas fa-angle-left"></i>
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
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Account List</p>
              </a>
            </li>
          </ul>
        </li>

         <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Reports<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Sales </p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Purchase</p>
              </a>
            </li>
          </ul>
        </li>


 <li class="nav-item has-treeview">
          <a href="<?php echo e(url('/home')); ?>" class="nav-link active">
            
            <p><i class="nav-icon fas fa-building"></i>HRM & Payroll </p>
          </a>
        </li>

          <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Employee Management<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Employee</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Employee List</p>
              </a>
            </li>
          </ul>
        </li>


          <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Department <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Department</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Department List</p>
              </a>
            </li>
          </ul>
        </li>

          <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Designation <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Designation</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Designation List</p>
              </a>
            </li>
          </ul>
        </li>


          <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Increment <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Increment</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Increment List</p>
              </a>
            </li>
          </ul>
        </li>

         <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Deduction <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Deduction</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Deduction List</p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Leave Application <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Application</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Application List</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Attendance <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Attendance</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Attendance List</p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Salary Management<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Salary</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Salary List</p>
              </a>
            </li>
          </ul>
        </li>


           <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Loan Management<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Take Loan</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('new/user')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Loan List</p>
              </a>
            </li>
          </ul>
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
                <p>New User Create</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="<?php echo e(url('role/setup')); ?>" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Role Setup Mange</p>
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
</aside><?php /**PATH E:\xampp\htdocs\pump\resources\views/includes/sadmin-menu-sidebar.blade.php ENDPATH**/ ?>