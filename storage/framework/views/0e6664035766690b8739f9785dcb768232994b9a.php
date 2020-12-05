<?php $__env->startSection('title', __('Blog Details')); ?>
<?php $__env->startSection('main'); ?>

<!-- Content -->
<div id="content">
    <?php if($blog): ?>
    <section class="blogs-detail row-am">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="blog-detail-box">
                        <div class="blog-detail-head">
                            <h2><?php echo e($blog->title); ?></h2>
                            <ul>
                                <li>by <span class="mx-1"><?php echo e($creator->name); ?></span></li>
                                <li><?php echo e($blog->created_at->format('jS F \\, Y')); ?></li>
                            </ul>
                        </div>
                        <div class="blog-detail-body">
                            <div class="blod-img mx-auto mt-5">
                                <?php if($blog->imageurl): ?>
                                    <img src="<?php echo e(asset('public/client_library/upload/blog/' . $blog->imageurl)); ?>" class="w-100 rounded" />
                                <?php else: ?> 
                                    <img src="<?php echo e(asset('public/client_library/upload/blog/blankphoto.png')); ?>" class="w-100 rounded" />
                                <?php endif; ?>
                            </div>
                            <div class="blog-content mt-5">
                                <?php echo $blog->description; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="comments mt-5">
        <div class="container">
            <div class="blog-detail-title"><?php echo e($comments->count()); ?> Comments</div>
            <?php if($comments->count() > 0): ?>
                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="w-100 mb-3 pt-3" style="border-top: 1px solid #e2e8f0">
                    <div class="d-flex justify-content-between px-3">
                        <div style="width: 8% !important">
                            <?php if($comment->userImage): ?>
                                <img src="<?php echo e(asset('public/uploads/' . $comment->userImage)); ?>" class="w-100 rounded">
                            <?php else: ?>
                                <img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100 rounded">
                            <?php endif; ?>
                        </div>
                        <div style="width: 92% !important" class="pl-5 py-2">
                            <div class="h5 text-uppercase"><?php echo e($comment->userName ?? $comment->name); ?></div>
                            <p class="text-secondary"><?php echo e($comment->created_at); ?></p>
                            <p><?php echo e($comment->comment); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </section>

    
    <section class="contact-form-wraper mt-5">
        <div class="container">

            <?php if(auth()->guard()->guest()): ?>
            <?php else: ?>
            <div class="blog-detail-title">write a comment</div>
            <?php endif; ?>
            <div class="contact-form-inner">
                <?php $saved = explode(';', Cookie::get('blog_form')) ?? null ?>
                <form method="POST" action="<?php echo e(route('multi.blog_comment.store', $blog->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <?php if(auth()->guard()->guest()): ?>
                        <?php else: ?>
                        <div class="ml-2 pl-1 pb-4">Post a comment as <strong class="pl-1"><?php echo e(Auth::user()->name); ?></strong></div>
                        <div class="col-md-12 col-sm-12">
                            <div class="message">
                                <textarea class="input textarea" name="comment" placeholder="Enter your comment here"></textarea>
                            </div>
                            <div class="submit-btn">
                                <button class="btn btn-danger s-btn red-small" type="submit">POST COMMENT</button>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php else: ?>
    <h1 class="text-center">Blog doesnot exist!</h1>
    <?php endif; ?>
</div>
<!-- Content END -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/provider/frontBlogDetails.blade.php ENDPATH**/ ?>