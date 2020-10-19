<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
  @include('includes.style')
    <!-- Font Awesome -->
   
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">







        <!-- Navbar -->
        @include('includes.sadmin-header')
    
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('includes.sadmin-menu-sidebar')


 <!-- Alert Message -->

      
    <div class="row">
      
    <link rel="stylesheet" href="{{asset('/assets/custom/css/toastr.min.css')}}">  
   <script src="{{asset('/assets/custom/js/jquery.min.js')}}"></script>

    <script src="{{asset('/assets/custom/js/sweetalert2.min.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('/assets/custom/js/toastr.min.js')}}"></script>     
    

      @if ($message = Session::get('message'))

       <script>
       // For Modals And Toastr 

        $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

                  toastr.success('{{$message}}');

            // Toast.fire({
            //         type: 'success',
            //         title: '{{$message}}'
            //     });

         

            });

         
      </script> 
      
      
      
      @elseif($error = Session::get('error'))
      
       <script>
       // For Modals And Toastr 

        $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

                toastr.error('{{$error}}');

            // Toast.fire({
            //         type: 'error',
            //         title: '{{$error}}'
            //     });
           

            });

         
      </script> 
      @endif

      <script>
      window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(200, function(){
      $(this).remove();
      });
      }, 8000);


     
            
      </script>
    </div>
      <!-- /Alert Message -->


       
       @yield('main')
        <!-- Content Wrapper. Contains page content -->
      
        <!-- /.content-wrapper -->
       @include('includes.sadmin-footer')

    <!-- Bootstrap 4 -->
    <script src="{{asset('/assets/custom/js/bootstrap.bundle.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('/assets/default/select2/dist/css/select2.min.css')}}">
<!-- ===============Search Select css================= -->
<!-- ===============Search Select js================= -->
<script src="{{asset('/assets/default/select2/dist/js/select2.full.min.js')}}"></script>
  <script src="{{asset('/assets/custom/js/adminlte.min.js')}}"></script>

<!-- ===============Menu hide and show================= -->

<!-- ===============Menu hide and show================= -->
<!-- <script src="{{asset('/assets/default/dist/js/adminlte.min.js')}}"></script> -->
<!-- ===============Search Select css================= -->

<script type="text/javascript">
  $('.select2').select2();



</script>
<!-- ===============Search Select js================= -->



@yield('scripts')
      
    </div>
    <!-- ./wrapper -->

</body>

</html>




