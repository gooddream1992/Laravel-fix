<?php $__env->startSection('header_title', 'Profile'); ?>

<?php 

// Declare Step Routes Here
$routes = [
    ['step' => 1, 'label' => 'ProfileStats',    'name' => 'profile.stats.index',        'param' => $id],
    ['step' => 2, 'label' => 'Biography',       'name' => 'profile.biography.index',    'param' => $id],
    ['step' => 3, 'label' => 'Services',        'name' => 'profile.services.index',     'param' => $id],
    ['step' => 4, 'label' => 'Photos',          'name' => 'profile.photos.index',       'param' => $id],
    ['step' => 5, 'label' => 'Verification',    'name'=>'profile.verification.index',   'param' => $id]
];

$currentStep = 1;
$routeName = Route::currentRouteName(); 

foreach ($routes as $route) {
    if ($route['name'] == $routeName) {
        $currentStep = $route['step'];
    }
}
?>



<div class="clearfix row">
    <div class="col-md-12">
        
        <ul id="progressbar">
            <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(!empty($route['name']) ? route($route['name'], $route['param']) : '#'); ?>">
                <li class="icon-<?php echo e($route['step']); ?> <?php echo e(($route['step'] <= $currentStep) ? 'active' : ''); ?>">
                    <span><?php echo e($route['label']); ?></span>
                </li> 
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div><?php /**PATH /home/honeydevealakmal/public_html/resources/views/partials/_profileSteps.blade.php ENDPATH**/ ?>