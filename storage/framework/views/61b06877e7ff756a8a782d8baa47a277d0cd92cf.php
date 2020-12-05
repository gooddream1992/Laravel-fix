<?php $__env->startSection('title', 'Escort - FAQ'); ?>

<?php $__env->startSection('content'); ?>

<style>
.accordion {
  background-color: black;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: 1px solid;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;


}
.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;

}

</style>

    <div class="offset-md-3 col-md-6 right-content">
        <div class="box multi_step_form">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button class="accordion"><?php echo e($value->question); ?></button>
            <div class="panel">
              <p><?php echo $value->answer; ?></p>
            </div>
            <br>
            <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
</div>

<script>
    var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.profileMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/new/faq/index.blade.php ENDPATH**/ ?>