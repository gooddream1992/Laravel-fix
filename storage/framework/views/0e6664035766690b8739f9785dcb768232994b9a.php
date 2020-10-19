

<?php $__env->startSection('title', __('Blog Details')); ?>
<?php $__env->startSection('main'); ?>

<!-- Content -->
        <div id="content">

            <section class="blogs-detail row-am">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="blog-detail-box">

                            		 <?php $blogs2 =\App\Blog::all()->where('status', 2)->where('id', $id);?>
          <?php $__currentLoopData = $blogs2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="blog-detail-head">
                                    <h2><?php echo e($blog2->title); ?></h2>
                                    <ul>
                                        <li>by <span><?php if($blog2->publishBy==0): ?> None <?php else: ?> <?php echo e(\App\User::find($blog2->publishBy)->name); ?> <?php endif; ?></span></li>
                                        <li><?php echo e($blog2->created_at); ?></li>
                                    </ul>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                 <?php $__currentLoopData = $blogs2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="blog-detail-body">
                                    <div class="blod-img">
                                        <img src="<?php echo e(asset('public/uploads/'.$blog2->imageurl)); ?>" class="w-100" />
                                    </div>
                                    <div class="blog-content">
                                        <?php echo $blog2->description; ?>


                                        
                                    </div>
                                </div>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php $comments= \App\LikeComment::all();?>
            <section class="comments">
                <div class="container">
                    <div class="blog-detail-title"><?php echo e($comments->count()); ?> Comments</div>
                    <div class="row">
                        <div class="comments-wrap ">
                        	<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class=" col-sm-12 col-md-12 col-lg-12">
                                <div class="comment-one">
                                	 <?php $pfpic=\App\User::find($commnt->userId)->photo;?>
                                    <div class="comnt-image"><img src="<?php echo e(asset('public/uploads/'.$pfpic)); ?>"></div>
                                    <div class="coment-data">
                                        <div class="person-name"><?php if($commnt->userId==0): ?> None <?php else: ?> <?php echo e(\App\User::find($commnt->userId)->name); ?> <?php endif; ?></div>
                                        <div class="time"><?php echo e($commnt->updated_at->diffForHumans()); ?></div>
                                        <p><?php echo e($commnt->comments); ?></p>
                                    </div>
                                </div>
                            </div>
                            <!--single end-->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           


                            
                        </div> <!--single end-->
                    </div>
                </div>
            </section>

           <?php if(Auth::check()): ?>
            <section class="contact-form-wraper">
                <div class="container">
                    <div class="blog-detail-title">write a comment</div>
                    <div class="contact-form-inner">
                        <form role="form" method="POST" action="<?php echo e(url('like/comment/store')); ?>">
            <?php echo e(csrf_field()); ?>

              <?php $__currentLoopData = $blogs2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <input type="hidden" name="escortId" value="<?php echo e($blog2->publishBy); ?>">
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="userId" value="<?php echo e(Auth::user()->id); ?>">
            <input type="hidden" name="likes" value="0">

                            <div class="row">
                                <div class="col-md-6 col-sm-12 nrow">

                                    <input type="text" class="input" name="name" placeholder="Name">
                                </div>
                                <div class="col-md-6 col-sm-12 nrow">

                                    <input type="text" class="input" name="email" placeholder="Email">
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="message">
                                        <textarea class="input textarea" name="comments" placeholder="Enter your comment here"></textarea>
                                    </div>
                                    <div>
                                        <div class="form-check selection">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="">Save my name, email, and website in this browser for the next time I comment.  </label>
                                        </div>

                                    </div>
                                    <div class="submit-btn">
                                      <button type="submit" class="red-small btn-block"> POST Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <?php endif; ?>



        </div>
        <!-- Content END -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/provider/frontBlogDetails.blade.php ENDPATH**/ ?>