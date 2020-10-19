<?php $__env->startSection('title', 'ModiFy Escort'); ?>
<?php $__env->startSection('main'); ?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php if(session()->has('message')): ?>
    <div class="alert alert-success">
        <?php echo e(session()->get('message')); ?>

    </div>
<?php endif; ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
       <a href="<?php echo e(url('/home')); ?>" class="btn btn-primary">Back</a><hr>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="text-center btn btn-success" style="width: 100%"><h1>Service Location</h1></div><hr>
          <form role="form" method="POST" action="<?php echo e(route('escort-service-location-add')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

                        <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                	<div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Escort')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                      	<input type="hidden" name="usersId" placeholder="Name" value="<?php echo e($users->id); ?>" class="form-control">
                        <input type="text" name="name" placeholder="Name" value="<?php echo e($users->name); ?>" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Country')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="country" id="country">
                        <option value="">Country</option>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($country->id); ?>"><?php echo e($country->country); ?></option>
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
                      <select class="form-control" name="city" id="state">
                        <option value="">Home Location</option>
                      </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Suburb')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="text" name="suburb" id="suburb" class="form-control" >
                      </div>
                    </div>
                  </div>
                
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Update">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          
        </div>
        
      </div>
    </section>
  </div>

  <style>
    *{box-sizing: border-box;}
html{height: 100%;margin: 0;}
body{min-height: 100%;font-family: 'Roboto';margin: 0;background-color: #fafafa;}
.container { margin: 150px auto; max-width: 960px;}
label{display: block;padding: 20px 0 5px 0;}
.tagsinput,.tagsinput *{box-sizing:border-box}
.tagsinput{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;background:#fff;font-family:sans-serif;font-size:14px;line-height:20px;color:#556270;padding:5px 5px 0;border:1px solid #e6e6e6;border-radius:2px}
.tagsinput.focus{border-color:#ccc}
.tagsinput .tag{position:relative;background:#556270;display:block;max-width:100%;word-wrap:break-word;color:#fff;padding:5px 30px 5px 5px;border-radius:2px;margin:0 5px 5px 0}
.tagsinput .tag .tag-remove{position:absolute;background:0 0;display:block;width:30px;height:30px;top:0;right:0;cursor:pointer;text-decoration:none;text-align:center;color:#ff6b6b;line-height:30px;padding:0;border:0}
.tagsinput .tag .tag-remove:after,.tagsinput .tag .tag-remove:before{background:#ff6b6b;position:absolute;display:block;width:10px;height:2px;top:14px;left:10px;content:''}
.tagsinput .tag .tag-remove:before{-webkit-transform:rotateZ(45deg);transform:rotateZ(45deg)}
.tagsinput .tag .tag-remove:after{-webkit-transform:rotateZ(-45deg);transform:rotateZ(-45deg)}
.tagsinput div{-webkit-box-flex:1;-webkit-flex-grow:1;-ms-flex-positive:1;flex-grow:1}
.tagsinput div input{background:0 0;display:block;width:100%;font-size:14px;line-height:20px;padding:5px;border:0;margin:0 5px 5px 0}
.tagsinput div input.error{color:#ff6b6b}
.tagsinput div input::-ms-clear{display:none}
.tagsinput div input::-webkit-input-placeholder{color:#ccc;opacity:1}
.tagsinput div input:-moz-placeholder{color:#ccc;opacity:1}
.tagsinput div input::-moz-placeholder{color:#ccc;opacity:1}
.tagsinput div input:-ms-input-placeholder{color:#ccc;opacity:1}

  </style>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.11/jquery.autocomplete.js" integrity="sha512-JwPA+oZ5uRgh1AATPhLKeByWbXcsRnMMSBpvhuAGQp+CWISl/fHecOshbRcPPgKWau9Wy1H5LhiwAa4QFiQKYw==" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('assets/frontend/newjs/autocomplete.js')); ?>"></script>
<script>
  $(function() {
 

$("#state").on('change',function(){
    var src = "<?php echo e(route('profile-suburb-name')); ?>";
    var state = this.value;
    $('#suburb').tagsInput({
        'autocomplete':          {
            source:function(request, response){
                 $.ajax({
                  url: src,
                  type :"POST",
                  data:{
                    "_token": "<?php echo e(csrf_token()); ?>",
                    state:state,
                    query : request.term
                  },
                  success: function(data) {
                  response(data);
                }
              });
            },minLength: 1,
          }
        });
    });
});


</script>
  <script>
    $(document).ready(function(){
      $('#country').on('change',function(){
        var country = this.value;
        $.ajax({
          url : "<?php echo e(route('profile-country-name')); ?>",
          type:"POST",
          data:{
            "_token": "<?php echo e(csrf_token()); ?>",
            country:country
          },
          success: function(data) {
            $("#state").html(data);
          }
        });
      });

  


      var country = $("#country").val();
        var state_id = $("#state_id").val();
        if(country != ''){
          $.ajax({
            url : "<?php echo e(route('profile-country-name')); ?>",
            type:"POST",
            data:{
              "_token": "<?php echo e(csrf_token()); ?>",
              country:country,
              state_id:state_id
            },
            success: function(data) {
              $("#state").html(data);
            }
          });

        }
    });
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/escortServiceLocation.blade.php ENDPATH**/ ?>