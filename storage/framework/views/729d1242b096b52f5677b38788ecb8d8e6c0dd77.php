

 <!-- jQuery -->
    <script src="<?php echo e(asset('/assets/custom/js/jquery.min.js')); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('/assets/custom/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- DataTables -->
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
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('/assets/custom/js/adminlte.min.js')); ?>"></script>
    <!-- End of Script Sources -->
    <!-- page script -->

    <script>
        $(function() {
                var ami = 0;
            $(".ami").on('click', function() {
                if (ami == 0) {
                    ami = 1;
                    $(".On").hide();
                    $(".Off").show();
                }
                else if (ami == 1) {
                    ami = 0;
                    $(".On").show();
                    $(".Off").hide();
                }

            });

       


            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

            var areaChartData = {
                labels: ['Sales', 'Purchase', 'Expense', 'Due', 'Profit/Lose'],
                datasets: [{
                        label: 'Area',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [45, 323, 323 , 66,22]
                    },
                    {
                        label: 'Chart',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [45, 323, 323 , 66,22]
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            var areaChart = new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            })

            //-------------
            //- LINE CHART -
            //--------------
            var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
            var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
            var lineChartData = jQuery.extend(true, {}, areaChartData)
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: lineChartData,
                options: lineChartOptions
            })

            //-------------
            //- DONUT CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var donutData = {
                labels: [
                    'Sales',
                    'Purchase',
                    'Expense',
                    'Due',
                    'Paid',
                    'Profit/Lose',
                ],
                datasets: [{
                    data: [45, 323, 323 , 66,22],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }]
            }
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var donutChart = new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            })

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = donutData;
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var pieChart = new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })

            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = jQuery.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })

            //---------------------
            //- STACKED BAR CHART -
            //---------------------
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = jQuery.extend(true, {}, barChartData)

            var stackedBarChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: stackedBarChartData,
                options: stackedBarChartOptions
            })
        });



       $(function() {
            // News Scroll js
            $('.js-conveyor-1').jConveyorTicker({
                anim_duration: 300, // Specify the time (in milliseconds) the animation takes to move 10 pixels
                reverse_elm: true, // Enable the use of the reverse animation trigger HTML element
                force_loop: true // Force the initialization even if the items are too small in total width
            });
        });

    </script>



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
            // Progress bar js 
            startAnimation();

            function startAnimation() {
                jQuery('.skills').each(function() {

                    jQuery(this).find('.skillbar').animate({
                        width: jQuery(this).attr('data-percent')
                    }, 2000);

                });
            }
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })



            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })

    </script>




<?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/includes/script.blade.php ENDPATH**/ ?>