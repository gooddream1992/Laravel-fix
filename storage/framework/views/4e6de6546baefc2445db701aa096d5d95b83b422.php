<?php $__env->startSection('main'); ?>
<style type="text/css">.meter{width:30%;border-radius: 5%;border: 1px solid #8be1d1;}</style>
<div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
           
            <div class="row mb-2">
                <div class="col-lg-12">
                    
                    <div class="Feature_main mt-3">
                        <div class="row">

                           




                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link d-block" href="<?php echo e(url('new/user')); ?>">
                                        <i class="fas fa-cogs"></i>
                                        <h3>User Permit </h3>
                                        <p>FC-1.1.0</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="<?php echo e(url('ledger')); ?>">
                                        <i class="fas fa-money-check-alt"></i>
                                        <h3>Gen. Ledger</h3>
                                        <p>FC-1.1.1</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="<?php echo e(url('product/list')); ?>">
                                       <i class="fas fa-donate"></i>
                                        <h3>Rate</h3>
                                        <p>FC-1.1.2</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="<?php echo e(url('purchase/start')); ?>">
                                        <i class="fas fa-cart-plus"></i>
                                        <h3>Create Stock</h3>
                                        <p>FC-1.1.3</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="<?php echo e(url('branches')); ?>">
                                        <i class="fas fa-building"></i>
                                        <h3>Pam Manages</h3>
                                        <p>FC-1.1.4</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="">
                                        <i class="fas fa-chart-line"></i>
                                        <h3>Report</h3>
                                        <p>FC-1.1.5</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link d-block" href="">
                                        <i class="fas fa-list-ol"></i>
                                        <h3>Cashier</h3>
                                        <p>FC-1.1.6</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="<?php echo e(url('product/list')); ?>">
                                        <i class="fas fa-receipt"></i>
                                        <h3>View Stock</h3>
                                        <p>FC-1.1.7</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="">
                                        <i class="fas fa-hand-holding-usd"></i>
                                        <h3>Salary Mng.</h3>
                                        <p>FC-1.1.8</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="<?php echo e(url('start/data/entry')); ?>">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                        <h3>Data Entry </h3>
                                        <p>FC-1.1.9</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="">
                                        <i class="fas fa-file"></i>
                                        <h3>Credit Slip</h3>
                                        <p>FC-1.1.10</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="Feature_Item elevation-1 text-center">
                                    <a class="FI_Link w-100 d-block" href="">
                                        <i class="fas fa-search"></i>
                                        <h3>Search</h3>
                                        <p>FC-1.1.11</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                
                <div class="row">
                    <div class="col-md-6">
                        
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Donut Chart</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Area Chart</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Pie Chart</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Bar Chart</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Line Chart</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                     
                        </div>
                   
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Stacked Bar Chart</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                   
                        </div>


                   
                    </div>
                 
                </div>
             
         
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('masters.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pump\resources\views/home.blade.php ENDPATH**/ ?>