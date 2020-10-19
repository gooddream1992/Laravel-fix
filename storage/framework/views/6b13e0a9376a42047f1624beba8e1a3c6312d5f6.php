<div class="col-md-3 clearfix left-admin-menu">
    <nav class="navbar navbar-expand-lg left-icon ">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto sidenav" id="navAccordion">
                <!--<li class="nav-item">
                    <a class="nav-link nav-link-collapse" href="#" id="hasSubItems" data-toggle="collapse" data-target="#collapseSubItems1" aria-controls="collapseSubItems1" aria-expanded="false"><img src="images/file-icon.png"> <span>File</span></a>
                    <ul class="nav-second-level collapse" id="collapseSubItems1" data-parent="#navAccordion">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="nav-link-text"><i class="fab fa-accessible-icon"></i> <span>Item 2.1</span></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="nav-link-text"><i class="fab fa-accessible-icon"></i> <span>Item 2.2</span></span>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <li class="availability-check-btn">
                    <!--<div class="btn-group-toggle" data-toggle="buttons">
                        <label class="btn"  id="availability-status">
                            <input type="checkbox" autocomplete="off" id="availibility-check">Not Available
                        </label>
                    </div>-->
                    <?php

                     ?>
                    <span id="count"></span><br>
                    <span class="custom-toggle switch">
                        <label for="switch-id">Online &nbsp;</label>
                        <input type="checkbox" class="switch" id="switch-id" <?php if(Auth::user()->activation == 0): ?> checked <?php endif; ?>>
                        <label for="switch-id">Offline</label>
                    </span>
                </li>
                
                <li class="nav-item <?php echo e(request()->route()->getName() === 'escort.friend-list' ? ' active ' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('escort.friend-list')); ?>">
                        <div class="dash-menu-icon dash-icon-3"></div>
                        <span>Friendship List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <div class="dash-menu-icon dash-icon-4"></div>
                        <span>Report</span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(request()->route()->getName() === 'escort.blog' ? ' active ' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('escort.blog')); ?>">
                        <div class="dash-menu-icon dash-icon-6"></div>
                        <span>Blog</span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(request()->route()->getName() === 'escort.feed' ? ' active ' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('escort.feed')); ?>">
                        <div class="dash-menu-icon dash-icon-10"></div>
                        <span>Feed</span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(request()->route()->getName() === 'escort.notifications' ? ' active ' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('escort.notifications')); ?>">
                        <div class="dash-menu-icon dash-icon-9"></div>
                        <span>Notifications</span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(request()->route()->getName() === 'escort.newprofiles' ? ' active ' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('escort.newprofiles')); ?>">
                        <div class="dash-menu-icon dash-icon-11"></div>
                        <span>New Profiles</span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(request()->route()->getName() === 'escort.ticket' ? ' active ' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('escort.ticket')); ?>">
                        <div class="dash-menu-icon dash-icon-2"></div>
                        <span>Submit ticket</span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(request()->route()->getName() === 'escort.faq' ? ' active ' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('escort.faq')); ?>">
                        <div class="dash-menu-icon dash-icon-5"></div>
                        <span>FAQ</span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(request()->route()->getName() === 'profile.stats.index' ? ' active ' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('profile.stats.index')); ?>">
                        <div class="dash-menu-icon dash-icon-7"></div>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(request()->route()->getName() === 'escort.tour' ? ' active ' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('escort.tour')); ?>">
                        <div class="dash-menu-icon dash-icon-6"></div>
                        <span>Tours</span>
                    </a>
                </li>
                <!--<li class="nav-item"><a class="nav-link" href="#"><div class="dash-menu-icon dash-icon-5"></div> <span>Friend Request</span></a></li>-->
                
                <li class="logout-menu">
                    <a class="logout-btn" href="<?php echo e(route('client.logout')); ?>">
                        <span>
                            <img src="<?php echo e(asset('assets/profile/images/logout-icon.png')); ?>">
                            &nbsp;Logout
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
$dtime = Auth::user()->timer;
$tz_object = new DateTimeZone('Asia/Kolkata');
$datetime = new DateTime();
$datetime->setTimezone($tz_object);
$yt= $datetime->format('Y');
$mt= $datetime->format('m');
$dt= $datetime->format('d');
$hours= $datetime->format('H');
$minutes= $datetime->format('i');
$seconds= $datetime->format('s');
$now = $yt."-".$mt."-".$dt." ".$hours.":".$minutes.":".$seconds;
$cenvertedTime = date('Y-m-d H:i:s',strtotime('+6 hour',strtotime($now))); 
?>
<input type="hidden" name="profile_id" value="<?php echo e(Auth::user()->id); ?>" id="profile_id">
<input type="hidden" name="todayDT" value="<?php echo $cenvertedTime; ?>" id="todayDT">
<input type="hidden" name="datetime" value="<?php echo e(Auth::user()->timer); ?>" id='datetime'>
  <span style="color: white;">
<?php
    /*$today =  date('Y-M-d H:i:s');*/
    $startTime = date("Y-m-d H:i:s");
    $added_dt = date('Y-m-d H:i:s',strtotime('+11 hour +30 minutes',strtotime($startTime)));
?>
</span>

<script>
    var indiaTime = new Date().toLocaleString("en-US", {timeZone: "Asia/Kolkata"});
     <?php if(Auth::user()->activation == 1){  ?>
      var datetime = $("#datetime").val();
      var deadline = new Date(datetime).getTime(); 
      var x = setInterval(function() { 
      var now = new Date().getTime();
      var t = deadline - now; 
      var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
      var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
      var seconds = Math.floor((t % (1000 * 60)) / 1000); 
      document.getElementById("count").innerHTML =hours + "h " + minutes + "m " + seconds + "s "; 
          if (t < 0) { 
              clearInterval(x); 
              document.getElementById("count").innerHTML = "EXPIRED"; 
          } 
      }, 1000); 

  <?php } ?>

var switchStatus = true;
var profile_id = $("#profile_id").val();
var todayDT = $("#todayDT").val();
$("#switch-id").on('change', function() {
    if ($(this).is(':checked') == true) {
        switchStatus = 0;
        var text = "Now Your Profile will Be Not Available!";
    } else {
        switchStatus = 1;
        var text = "Now Your Profile will Be Available!";
    }
    $.ajax({
        url:"<?php echo e(route('escort.profile.activation.ajax')); ?>",
        type:"POST",
        data:{
        "_token": "<?php echo e(csrf_token()); ?>",
        'profile_id':profile_id,
        'switchStatus':switchStatus,
        'todayDT':todayDT
        },success: function(data){
          location.reload(true);
        }
    });

});
</script><?php /**PATH /home/honeydevealakmal/public_html/resources/views/partials/_profileSidenav.blade.php ENDPATH**/ ?>