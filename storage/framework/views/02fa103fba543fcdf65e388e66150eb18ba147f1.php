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
       <?php echo $__env->make('includes.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 

      
    </div>
    <!-- ./wrapper -->



<script>
        $(function() {
            var ami = 0;
            $(".ami").on('click', function() {
                if (ami == 0) {
                    ami = 1;
                    $(".On").hide();
                    $(".Off").show();
                } else if (ami == 1) {
                    ami = 0;
                    $(".On").show();
                    $(".Off").hide();
                }
            });
            $('#example').DataTable({
                select: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print', 'csv'
                ]
            });
            $('#example1').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });
        });

    </script>

    <script>
        $(function() {
    
        // Print Button js
        $(".Print").on('click', function() {
            print();
        });
            
        });

    </script>
</body>

</html>
<?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/masters/master.blade.php ENDPATH**/ ?>