<?php $__env->startSection('title', __('Data Entry')); ?>
<?php $__env->startSection('main'); ?>
<script type="text/javascript" src="<?php echo e(asset('public/jquery-3.3.1.js')); ?>"></script>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Data Entry</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        
        <script type="text/javascript" src="<?php echo e(asset('public/frontEnd/js/jautocalc.js')); ?>"></script>
        <script type="text/javascript">
        
        $(document).ready(function() {
        function autoCalcSetup() {
        $('form[name=cart]').jAutoCalc('destroy');
        $('form[name=cart] tr[name=line_items]').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero: true});
        $('form[name=cart]').jAutoCalc({decimalPlaces: 2});
        }
        autoCalcSetup();
        $('button[name=remove]').click(function(e) {
        e.preventDefault();
        var form = $(this).parents('form')
        $(this).parents('tr').remove();
        autoCalcSetup();
        });
        $('button[name=add]').click(function(e) {
        e.preventDefault();
        var $table = $(this).parents('table');
        var $top = $table.find('tr[name=line_items]').first();
        var $new = $top.clone(true);
        $new.jAutoCalc('destroy');
        $new.insertBefore($top);
        $new.find('input[type=text]').val('');
        $new.find('input[type=hidden]').val('');
        autoCalcSetup();
        });
        });
        
        </script>
        <script>
        $(document).ready(function(){
        $("input").click(function(){
        $(this).next().show();
        $(this).next().hide();
        });
        });
        </script>
        <script>
        function singleSelectChangeValue23() {
        //Getting Value
        var selObj = document.getElementById("singleSelectValueDDJS23");
        var selValue = selObj.options[selObj.selectedIndex].value;
        var selValue2 = selObj.options[selObj.selectedIndex].id;
        //Setting Value
        document.getElementById("textFieldValueJS23").value = selValue;
        document.getElementById("textFieldValueJS234").value = selValue2;
        }
        </script>
        
        
      <div class="card-body">
          <form name="cart" id="cart"  action="<?php echo e(url('data/entry/store')); ?>" method="POST">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="cashierId" value="<?php echo e($casrid); ?>" class="form-control">
            
               <div class="row">
                
                <div class="col-md-6">
                    <div class="row">

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Cashier Name')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
<input type="text" class="readonly" value="<?php echo e($cashiername=\App\User::find($casrid)->name); ?>" readonly>
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Shift')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                        <?php $shift=\App\User::find($casrid)->shift;?>
                      <?php if($shift==1): ?>
                       <input type="text" class="readonly" value="1 Shift" readonly>
                       <?php else: ?>
                        <input type="text" class="readonly" value="2 Shift" readonly>
                       <?php endif; ?>
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
                        <label class="FormLabel1"><?php echo e(__('Time:')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                       <?php if($shift==1): ?>
                       <input type="text" class="readonly" value="9AM - 9PM" readonly>
                       <?php else: ?>
                        <input type="text" class="readonly" value="9PM - 9AM" readonly>
                       <?php endif; ?>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Date')); ?> *</label>
                      </div>
                      <div class="selct_2_alska">
                       <input type="date" name="date"  value="<?php echo date("Y-m-d");?>" class="readonly">
                      </div>
                    </div>
                  </div>



                  </div>
                </div>


                </div>
            
            <table class="table table-striped table-bordered" style="width:100%" id="tableRoom3">
              <tr><th colspan="5">Billing Information</th></tr>
              <tr>
                
                <th><?php echo e(__('Product')); ?></th>
                <th><?php echo e(__('Previous Meter Reading')); ?></th>
                <th><?php echo e(__('Current Meter Reading')); ?></th>
                <th><?php echo e(__('Sale')); ?></th>
                <th> <?php echo e(__('More')); ?></th>
                
              </tr>
              
              <tr>
                <td>
                  <?php $products=\App\Product::all();?>
                  <select name="productId[]" class="form-control">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($product->id); ?>"><?php echo e($product->productName); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </td>
                
                
                
                <td><input type="text" name="qty" id="qty" value="0" class='totalqty form-control'>
                  <input type="hidden" name="prevMeter[]" id="qty" value="" jAutoCalc="{qty}" class='totalqty form-control'>
                  <p id="demo"></p>
                </td>
                <td>
                  <input type="text" name="price" id="price" value="0" class='totalqty form-control'>
                  <input type="hidden" name="currMeter[]" id="price" value="" jAutoCalc="{price}" class='totalqty form-control'>
                  
                  
                </td>
                
                <td><input type="text" name="saleqnty[]"  class="form-control" id="saleqnty" value="" jAutoCalc="{qty}-{price}">
              
              </td>
              <td>
              <button onclick="addnewrow3()" name="add" class="label label-primary"><i class="fa fa-plus" aria-hidden="true"></i></button></td></tr>
              <script>
              var i=1;
              function addnewrow3(){
              $('#tableRoom3').append('<tr><td> <select name="productId[]" class="form-control"><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($product->id); ?>"><?php echo e($product->productName); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td>  <td><input type="text" name="prevMeter[]" id="qtytot'+i+'"  onkeyup="addqty('+i+')" value="0" class="form-control"></td><td>  <input type="text" name="currMeter[]" id="usedtot'+i+'"  onkeyup="addqty('+i+')" value="0" class="form-control"></td><td><input type="text" name="saleqnty[]"  class="form-control" id="saleqnty'+i+'"  onkeyup="addqty('+i+')" value="0"><input type="hidden"  name="costsr"  class="form-control" id="saleqnty" value="" jAutoCalc="{qty} * {price} * {pax} "> </td><td><a href="javascript:void(0)" name="btn-remove3"  id="btn-remove3" class="label label-danger btn-remove3"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>');
              
              i++;
              }
              function gettime(i){
              var value1=($(".chin"+i).val());
              var value2=($(".chout"+i).val());
              const date1 = new Date(value1);
              const date2 = new Date(value2);
              const diffTime = Math.abs(date2.getTime() - date1.getTime());
              const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
              date= diffDays;
              //$('.date').text(date);//Result <b class="date"></b>
              $('.date'+i).val(date);
              }
              // Remove table row
              $("body").on("click", ".btn-remove3", function(){
              $(this).parents('tr').remove();
              });
              </script>
              <script>
              function addqty(i){
              if ($('#qtytot'+i).val()!=0 || $('#usedtot'+i).val()!=0) {
              $('#usedtot'+i).val($('#usedtot'+i).val());
              $('#qtytot'+i).val($('#qtytot'+i).val());
              $('#saleqnty'+i).val($('#qtytot'+i).val() - $('#usedtot'+i).val());
              }
              }
              </script>
              
              <!--App master-->
              <script src="<?php echo e(asset('public/frontEnd/js/bootstrap.js')); ?>"></script>
              <script src="<?php echo e(asset('public/frontEnd/js/jquery.dcjqaccordion.2.7.js')); ?>"></script>
              <script>
              
              $('.totalqty').keyup(function () {
              
              var sum = 0;
              $('.totalqty').each(function() {
              sum += Number($(this).val());
              });
              $('#total_qty').val(sum);
              
              });
              </script>
              
              
              
              
              
              
            </table>
            <table name="cart" id="cart" class="table table-striped table-bordered">
              
              
              <tr>
                <td>TOTAL Quantity </td>

                <td><input type="text" name="totalqnty" value="" class="form-control" id="qtytot"  jAutoCalc="SUM({saleqnty[]})"></td>
              </tr>
              <tr>
                <td>Cash Deposit</td>
                <!-- <td>&nbsp;</td> -->
                <td><input type="text" name="cashdeposit" class="writeonly" style="width: 100%;"></td>
              </tr>
              <tr><th colspan="5"><textarea name="note" class="form-control" placeholder="Note:"></textarea> </th></tr>
            </table>
            <br>
            
            <center><button type="submit" class="btn btn-primary"  onclick="return confirm('Are you sure select the Vendor?')"><?php echo e(__('ADD ESTIMATE')); ?></button></center><br>
          </form>
     
      </div>
    </div>
    
  </div>
</section>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.masterinvoice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pump\resources\views/admin/data_entry/dataEntry.blade.php ENDPATH**/ ?>