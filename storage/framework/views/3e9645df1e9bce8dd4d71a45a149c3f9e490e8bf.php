


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?php echo $__env->yieldContent('title'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php echo $__env->make('includes.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Font Awesome -->
   
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">







        <!-- Navbar -->
        <?php echo $__env->make('includes.sadmin-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php echo $__env->make('includes.sadmin-menu-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


 <!-- Alert Message -->

      
    <div class="row">
      
    <link rel="stylesheet" href="<?php echo e(asset('/assets/custom/css/toastr.min.css')); ?>">  
   <script src="<?php echo e(asset('/assets/custom/js/jquery.min.js')); ?>"></script>

    <script src="<?php echo e(asset('/assets/custom/js/sweetalert2.min.js')); ?>"></script>
    <!-- Toastr -->
    <script src="<?php echo e(asset('/assets/custom/js/toastr.min.js')); ?>"></script>     
    

      <?php if($message = Session::get('message')): ?>

       <script>
       // For Modals And Toastr 

        $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

                  toastr.success('<?php echo e($message); ?>');

            // Toast.fire({
            //         type: 'success',
            //         title: '<?php echo e($message); ?>'
            //     });

         

            });

         
      </script> 
      
      
      
      <?php elseif($error = Session::get('error')): ?>
      
       <script>
       // For Modals And Toastr 

        $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

                toastr.error('<?php echo e($error); ?>');

            // Toast.fire({
            //         type: 'error',
            //         title: '<?php echo e($error); ?>'
            //     });
           

            });

         
      </script> 
      <?php endif; ?>

      <script>
      window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(200, function(){
      $(this).remove();
      });
      }, 8000);


     
            
      </script>
    </div>
      <!-- /Alert Message -->


       
       <?php echo $__env->yieldContent('main'); ?>
        <!-- Content Wrapper. Contains page content -->
      
        <!-- /.content-wrapper -->
       <?php echo $__env->make('includes.sadmin-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('/assets/custom/js/bootstrap.bundle.min.js')); ?>"></script>

    <link rel="stylesheet" href="<?php echo e(asset('/assets/default/select2/dist/css/select2.min.css')); ?>">
<!-- ===============Search Select css================= -->
<!-- ===============Search Select js================= -->
<script src="<?php echo e(asset('/assets/default/select2/dist/js/select2.full.min.js')); ?>"></script>
  <script src="<?php echo e(asset('/assets/custom/js/adminlte.min.js')); ?>"></script>

<!-- ===============Menu hide and show================= -->

<!-- ===============Menu hide and show================= -->
<!-- <script src="<?php echo e(asset('/assets/default/dist/js/adminlte.min.js')); ?>"></script> -->
<!-- ===============Search Select css================= -->

<script type="text/javascript">
  $('.select2').select2();



</script>
<!-- ===============Search Select js================= -->



<?php echo $__env->yieldContent('scripts'); ?>
      
    </div>
    <!-- ./wrapper -->

</body>

</html>




<?php /**PATH E:\xampp\htdocs\pump\resources\views/masters/masterinvoice.blade.php ENDPATH**/ ?>