<?php $__env->startSection('title', 'Notification Lists'); ?>
<?php $__env->startSection('home'); ?>

<div class="col-md-9 right-content">
  	<div class="box multi_step_form">
      	<form>
          	<div class="clearfix row">
              	<div class="col-md-12 ">
                  	<div class="feed-list-box simplebar" id="myElement">
                      	<div class="feeds-list">
                          	<ul>
									<?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								  	<li>
											<div class="feed-content-box">
												<div class="left">
												<a href="/profile/<?php echo e($notification_details->user_id); ?>">
														<div class="feed-profile-image">
															
															
																<!-- <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height: 50px;width: 50px;border-radius:50px;" class="img-fluid"> -->

																<?php 
																	if($notification_details->roleStatus == 2){ 
																		$profileImage = \App\ProfileImage::where([
																			['escortId','=',$notification_details->id],
																			['status','=',5]
																		])->get();
																		foreach ($profileImage as $key => $value) { ?>
																			<?php if(!empty($value->image)){ ?>
																				<img src="<?php echo e(asset('public/uploads/'.$value->image)); ?>" style="height: 50px;width: 50px;border-radius:50px;" class="img-fluid">	
																			<?php }else { ?>
																				<img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height: 50px;width: 50px;border-radius:50px;" class="img-fluid">
																			<?php } ?>
																		<?php } ?>
																	<?php }else{ if(!empty($notification_details->photo)){ ?>
																		<img src="<?php echo e(asset('public/uploads/'.$notification_details->photo)); ?>" style="height: 50px;width: 50px;border-radius:50px;" class="img-fluid">
																	<?php } } ?>
															
														</div>
													</a>
												</div>
												<div class="right">
													<?php
														$since_start = new DateTime($notification_details->created_on);
														$start_date = $since_start->diff(new DateTime(now()));
														if($start_date->s!='0')
														{
															$notification_time = $start_date->s.' seconds ago';
														}
														if($start_date->i!='0')
														{
															$notification_time = $start_date->i.' minutes ago';
														}
														if($start_date->h!='0')
														{
															$notification_time = $start_date->h.' hours ago';
														}
														if($start_date->d!='0')
														{
															$notification_time = $start_date->d.' days ago';
														}
														if($start_date->m!='0')
														{
															$notification_time = $start_date->m.' months ago';
														}
														if($start_date->y!='0')
														{
															$notification_time = $start_date->y.' years ago';
														}
													?>

														<a href="/<?php echo e($notification_details->url); ?>">
																	<span class="time"><?php echo e($notification_time); ?></span>
																	<h5><?php echo e($notification_details->notification_title); ?></h5>
																	<p><?php echo $notification_details->notification_content; ?></p>
														</a>
												</div>
											</div>
									</li>
								  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	$(document).ready(function () {
		$("#page_header_heading").html('Notifications');
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.master.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/client/notifications.blade.php ENDPATH**/ ?>