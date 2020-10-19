<?php $__env->startSection('title', 'Feed'); ?>
<?php $__env->startSection('home'); ?>
<div class="col-md-9 right-content">
  	<div class="box multi_step_form">
      	<form>
          	<div class="clearfix row">
              	<div class="col-md-12 ">
					<div class="profile-feeds ">
						<div class="feeds-outer simplebar" id="myElement">
							<ul class="profile-feed-inner">
								<?php $__currentLoopData = $feed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feed_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php
									$since_start = new DateTime($feed_details->created_at);
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
								<li class="media-feed">
									<div class="row">
										<div class="col-lg-5">
											<div class="media-feed-area">
												
												<?php if($feed_details->image==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"><?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$feed_details->image)); ?>" class="w-100"><?php endif; ?>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="feed-content">
												<div class="feed-author">
													<div class="author-img">
														<img src="http://design.hire-webdeveloper.com/honey/escort-admin/images/feed-author.jpg" class="img-fluid">
													</div>
													<div class="author-detail">
														<p><?php echo e($notification_time); ?></p>
														<h5><?php echo e($feed_details->name); ?> <?php echo e($feed_details->title); ?></h5>
													</div>
												</div>
												<div class="feed-text">
													<p><?php echo $feed_details->description; ?></p>
												</div>
												<div class="feed-action">
													<ul>
														<li>
															<div class="clearfix">
																<div class="left">
																	<a href="#" id="like<?php echo e($feed_details->id); ?>" class="feed-content-action like-action" onclick="likeUnlike(<?php echo e($feed_details->id); ?>)"> 
																	<?php
																		if(isset($like_data[$feed_details->id]) && in_array(Auth::user()->id,$like_data[$feed_details->id]))
																		{
																			echo "Liked!";
																		}
																		else {
																			echo "Like";
																		}
																	?>
																	</a>
																</div>
																<div class="right">
																	<a href="#" onclick="doComment(<?php echo e($feed_details->id); ?>)" class="feed-content-action comment-action">Comment</a>
																</div>
															</div>
														</li>
														<li>
															<div class="clearfix">
																<div class="left">
																	<p><span id="likecount<?php echo e($feed_details->id); ?>"><?php echo isset($like_data[$feed_details->id]) ? count($like_data[$feed_details->id]) : '0'; ?></span> Likes</p>
																</div>
																<div class="right">
																	<p><span id="commentcount<?php echo e($feed_details->id); ?>"><?php echo isset($comment_data[$feed_details->id]) ? count($comment_data[$feed_details->id]) : '0'; ?></span> Comment</p>
																</div>
															</div>
														</li>
													</ul>
													<form>
														<div class="form-group">
															<div class="comment-feed-img">
																<img src="http://design.hire-webdeveloper.com/honey/escort-admin/images/feed-comment.jpg" class="img-fluid"> 
															</div>
															<div class="comment-box">
																<input type="text" id="comment<?php echo e($feed_details->id); ?>" class="form-control" placeholder="Write a Comment">
															</div>
														</div>

															
														<?php
														if(isset($comment_text[$feed_details->id]) && count($comment_text[$feed_details->id]) > 0)
														foreach ($comment_text[$feed_details->id] as $key => $comment) 
														{
														?>
															<div class="form-group">
																<div class="comment-feed-img">
																	<?php if($comment_photo[$feed_details->id][$key]==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height: 35px;width: 35px;" class="img-fluid"><?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$comment_photo[$feed_details->id][$key])); ?>" style="height: 35px;width: 35px;" class="img-fluid"><?php endif; ?>
																</div>
																<div class="comment-box" style="background: white;min-width: 9%;border-radius: 10px;float: left;height: 70px;padding: 1%;">
																	<b><?php echo e($comment_name[$feed_details->id][$key]); ?></b></br>
																	<?php echo e($comment); ?>

																</div>
															</div>
														<?php
														}
													?>
												</div>
											</div>
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
		$("#page_header_heading").html('Feed');
	});

	function likeUnlike(feedId) 
	{
		like_status = $("#like"+feedId).html();
		like_status = like_status.trim();
		if(like_status == 'Like')
		{
			$("#like"+feedId).html('Liked!');
			var old_likes = $("#likecount"+feedId).html();
			new_likes = parseInt(old_likes) + parseInt(1);
			$("#likecount"+feedId).html(new_likes);
		}
		else
		{
			$("#like"+feedId).html('Like');
			var old_likes = $("#likecount"+feedId).html();
			new_likes = parseInt(old_likes) - parseInt(1);
			$("#likecount"+feedId).html(new_likes);
		}
		$.ajax({
			type: "post",
			url: "<?php echo e(route('client.like-unlike')); ?>",
			data: {feedId:feedId,"_token": "<?php echo e(csrf_token()); ?>"},
			dataType: "json",
			success: function (response) {
				console.log(response);
			}
		});
	}

	function doComment(feedId) 
	{
		comment = $("#comment"+feedId).val();
		if(comment != '')
		{
			$.ajax({
				type: "post",
				url: "<?php echo e(route('client.do-comment')); ?>",
				data: {feedId:feedId,comment:comment,"_token": "<?php echo e(csrf_token()); ?>"},
				dataType: "json",
				success: function (response) {
					$("#comment"+feedId).val('');
					var old_comments = $("#commentcount"+feedId).html();
					new_comments = parseInt(old_comments) + parseInt(1);
					$("#commentcount"+feedId).html(new_comments);
				}
			});
		}
	}
	
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.master.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/client/feed.blade.php ENDPATH**/ ?>