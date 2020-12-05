<?php $__env->startSection('title', 'Local Resources'); ?>
<?php $__env->startSection('main'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Local Resources</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          


          <div class="text-center btn btn-success"><h1>Local Resources</h1></div><br><br>
          <a href="<?php echo e(route('local.resources.admin.view')); ?>" class="btn btn-danger">View Local Resources</a>
          <hr>
          <form role="form" method="POST" action="<?php echo e(route('local.resources.store.admin')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="row">              
              <div class="col-md-6">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Image')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="imageurl" type="file" accept="image/*" value="0">
                      <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;">
                      </div>
                    </div>
                  </div>




                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                       <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Link')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title">
                      </div>
                    </div>
                  </div>
                 
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                     <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Name')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="name" class="form-control">
                      </div>
                    </div>
                  </div>                
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                     <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Section')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <select class="form-control" name="section">
                        <option value="">Section</option>
                         <option value="healthcare">Healthcare</option>
                         <option value="Legal Advice">Mentors</option>
                         <option value="Photographers">Photographers</option>
                       </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                     <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Country')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select name="country" class="form-control country">
                          <option value="">Country</option>
                          <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($country_list->id); ?>"><?php echo e($country_list->country); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                     <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('City')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select name="city_id" class="form-control" id="city">
                          <option value="">City</option>
                          
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Save">
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
                
              </div>
            </div>
          

          </form>
          
        </div>
        
        
        
        
      </div>

    </div>
  </section>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.11/jquery.autocomplete.js" integrity="sha512-JwPA+oZ5uRgh1AATPhLKeByWbXcsRnMMSBpvhuAGQp+CWISl/fHecOshbRcPPgKWau9Wy1H5LhiwAa4QFiQKYw==" crossorigin="anonymous"></script>
 <script>
  $(document).ready(function(){
    src = "<?php echo e(route('suburb')); ?>";
            $("#city_id").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: src,
                        type : 'POST',
                        dataType: "json",
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            query : request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 2,
           
            });
  });

  $(document).ready(function () {
                $('.country').on('change',function(){
                    var country = this.value;
                    $.ajax({
                        url: "<?php echo e(route('getCity')); ?>",
                        method: 'POST',
                        data: { "_token": "<?php echo e(csrf_token()); ?>",'country_id':country },
                        success: function (data) {
                            console.log(data);
                             $('#city').html(data);
                        } 
                    });
                });

                var countries = $('.country').val();
                if(countries != ''){
                    var city_name = $('#city_name').val();
                    $.ajax({
                        url: "<?php echo e(route('getCity')); ?>",
                        method: 'POST',
                        data: { "_token": "<?php echo e(csrf_token()); ?>",'country_id':countries,'city_name':city_name },
                        success: function (data) {
                             $('#city').html(data);
                        } 
                    });    
                }
                
            });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.editormaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/localResources/index.blade.php ENDPATH**/ ?>