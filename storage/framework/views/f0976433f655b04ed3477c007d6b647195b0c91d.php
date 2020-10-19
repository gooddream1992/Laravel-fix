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
   <style type="text/css">
     .modal-header{background: #b00404 !important;}
     .modal-title{color:white !important;}
   </style>
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
   
<link rel="stylesheet" href="<?php echo e(asset('assets/custom/summernote/summernote-bs4.css')); ?>">


    <script src="<?php echo e(asset('/assets/custom/js/jquery.min.js')); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('/assets/custom/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- DataTables -->
   
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('/assets/custom/js/adminlte.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/custom/summernote/summernote-bs4.min.js')); ?>"></script>
    




  <script type="text/javascript" src="<?php echo e(asset('/assets/custom/new/jszip.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/assets/custom/new/pdfmake.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/assets/custom/new/vfs_fonts.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/assets/custom/new/jquery.dataTables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/assets/custom/new/dataTables.buttons.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/assets/custom/new/buttons.flash.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/assets/custom/new/buttons.html5.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/assets/custom/new/buttons.print.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/assets/custom/new/dataTables.responsive.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/assets/custom/new/dataTables.searchPanes.min.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('/assets/custom/ticker/jquery.jConveyorTicker.min.js')); ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo e(asset('/assets/custom/js/select2.full.min.js')); ?>"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="<?php echo e(asset('/assets/custom/js/jquery.bootstrap-duallistbox.min.js')); ?>"></script>
    <!-- InputMask -->
    <script src="<?php echo e(asset('/assets/custom/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/custom/js/jquery.inputmask.bundle.min.js')); ?>"></script>
    <!-- date-range-picker -->
    <script src="<?php echo e(asset('/assets/custom/js/daterangepicker.js')); ?>"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo e(asset('/assets/custom/js/bootstrap-colorpicker.min.js')); ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo e(asset('/assets/custom/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
    <!-- Bootstrap Switch -->
    <script src="<?php echo e(asset('/assets/custom/js/bootstrap-switch.min.js')); ?>"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo e(asset('/assets/custom/js/sweetalert2.min.js')); ?>"></script>
    <!-- Toastr -->
    <script src="<?php echo e(asset('/assets/custom/js/toastr.min.js')); ?>"></script>
    <!-- ChartJS -->
    <script src="<?php echo e(asset('/assets/custom/js/Chart.min.js')); ?>"></script>
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
     <!-- jQuery -->
   

      
    </div>
    <!-- ./wrapper -->

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

</body>

</html>
<?php /**PATH E:\xampp\htdocs\honeyluxe-front\resources\views/masters/editormaster.blade.php ENDPATH**/ ?>