<div class="top-header-bar m-visible desk-hidden">
            <nav class="navbar header">
              
                <div class="container-fluid">
                    <?php if(auth()->guard()->guest()): ?>
                    <div class="dropdown cust-dropdown join-drop-down" >
                        <button type="button" class="btn red-small dropdown-toggle " data-toggle="dropdown">
                            Join Now
                        </button>
                        <div class="dropdown-menu">
                            <!-- <a href="<?php echo e(url('client/signup')); ?>" class="dropdown-item">As Client</a>
                            <a href="<?php echo e(url('escort/signup')); ?>" class="dropdown-item">As Escort</a> -->
                            <a href="<?php echo e(url('client/membership')); ?>" class="dropdown-item">As Client</a>
                            <a href="<?php echo e(url('bacome/escort')); ?>" class="dropdown-item">As Escort</a>
                        </div>
                    </div>

                    <?php endif; ?>
                    <div class="header-menu-right">
                        <nav class="menu">
                            <ul>
                            <li>
                                <a href="<?php echo e(url('/home')); ?>">Dashboard</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/multi/page')); ?>">Activities</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/blog')); ?>">Blogs</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/local/resources')); ?>">Local Resources</a>
                            </li>
                            <li>
                                
                            </li>
                            <li>
                                <a href="<?php echo e(url('/business/etiquete')); ?>">Business Etiquette</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/our/story')); ?>">Our Story</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/client/membership')); ?>">Client Membership</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/faq')); ?>">FAQs</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/privacy/statement')); ?>">Privacy Policy</a>
                            </li>
                            <?php if(Auth::check()): ?>
                            <li>
                                <a href="<?php echo e(route('client.logout')); ?>">Logout</a>
                            </li>
                            <?php else: ?>
                                <li>
                                    <a href="<?php echo e(url(url('escort/login'))); ?>">Login Escort</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url(url('client/login'))); ?>">Login Client</a>
                                </li>
                            <?php endif; ?>
                            

                                <!-- <li><a href="<?php echo e(url('become/escorts')); ?>">Become an Escort</a></li>
                                <li><a href="">Business Etiquete</a></li>
                                <li><a href="">Our Story</a></li>
                                <li><a href="">Our Promise</a></li>
                                <li><a href="">Client Corner</a></li>
                                <li><a href="">Terms & Condition</a></li>
                                <li><a href="">Privacy Policy</a></li>
                                <li class="subOption"><a href="">Link 1</a></li>
                                <li class="subOption"><a href="">Link 2</a></li>
                                <li class="subOption"><a href="">Link 3</a></li>
                                <li class="subOption"><a href="">Link 4</a></li>
                                <li class="subOption"><a href="">Link 5</a></li>
                                <li class="subOption"><a href="">Link 6</a></li> -->
                            </ul>
                            <div class="hamburger ">Menu</div>
                            <div class="dimmer"></div>
                        </nav>
                    </div>
                    <div class="other-notify-btn">
                        <?php if(Auth::check()): ?>
                        <?php
                            $role = Auth::user()->roleStatus;
                            ?>
                        <?php if($role=='2'): ?>
                        <button onclick="document.location.href='/new-post'" class="btn post-status-btn red-small">Post Status</button>
                        <button onclick="document.location.href='<?php echo e(route('escort.feed')); ?>'" class="btn feed-ststus-btn"><img  src="<?php echo e(asset('assets/frontend/images/feed-icon.png')); ?>" height="30" width="30"/></button>
                        <?php elseif($role=='3'): ?>
                        <button onclick="document.location.href='<?php echo e(route('client.blog')); ?>'" class="btn post-status-btn red-small">Blog</button>
                        <button onclick="document.location.href='<?php echo e(route('client.feed')); ?>'" class="btn feed-ststus-btn"><img  src="<?php echo e(asset('assets/frontend/images/feed-icon.png')); ?>" height="30" width="30"/></button>
                        <?php endif; ?>  

                            <button type="button" class="btn notification-icon-btn" onclick="toggleNotificationDiv()">
                                <img  src="<?php echo e(asset('assets/frontend/images/notification-icon.png')); ?>" height="30" width="30"/>
                                <?php
                                    $notifications = array();

                                    if (Auth::check() && Auth::user()->roleStatus == 2) {
                                    $notifications = DB::table('notification')->where([
                                        ['user_id',Auth::user()->id],
                                        ['is_readed','=','0'],
                                        ['type','=','escort']
                                        ])->get();
                                    }elseif(Auth::check() && Auth::user()->roleStatus == 3){
                                        $user_id = Auth::user()->id;
                                          $data = DB::table('follows')->where([['custId',$user_id],['status','1']])->get();
                                          $id_arr = array();
                                          $notifications = array();
                                          if(count($data)>0)
                                          {
                                            foreach ($data as $follow_details) 
                                            {
                                              $id_arr[] = $follow_details->escortId;
                                            }
                                            $notifications = DB::table('notification')->join('users','notification.user_id','users.id')->whereNull('notification.type')->where('notification.is_readed','0')->whereIn('notification.user_id',$id_arr)->orderBy('notification.created_on','desc')->get();
                                          }
                                    }
                                ?>
                                <span>
                                    <?php
                                        echo count($notifications)
                                    ?>
                                </span>
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </nav> 
        </div>
        <!-- Header -->
        
        
        <div class="user-notifications-area" style="display: none;">
            <ul class="notify-list">
                
            </ul>
        </div>

        <script>


function toggleNotificationDiv() 
{ 
  $.ajax({
    type: "get",
    url: "<?php echo e(route('get.notification')); ?>",
    dataType: "html",
    success: function (response) {
      $(".notify-list").empty();
      $(".notify-list").append(response);
      console.log(response);
    }
  });
  $(".user-notifications-area").toggle();
}

        </script><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/includes/header.blade.php ENDPATH**/ ?>