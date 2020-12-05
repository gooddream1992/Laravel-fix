<nav class="navbar navbar-inverse header">
          <div class="container-fluid top">
        <nav class="menu left-menu">
             <ul>
            <li class="m-hidden">
               <?php if(Auth::check()): ?>
                           <div class="flexbox-container">
                              <a href="<?php echo e(route('admin.logout')); ?>" class="red-small">Logout</a>
                          </div>
               <?php else: ?>
                          <div class="flexbox-container">
                              <a href="" class="red-small">Login</a>
                          </div>
                            <ul class="submenu">
                              <li class="subOption"><a href="<?php echo e(url(url('client/login'))); ?>">Client Login</a></li>
                                <li class="subOption"><a href="<?php echo e(url(url('escort/login'))); ?>">Escort Login</a></li>
                          </ul>
                          <?php endif; ?>
                      </li>
                     </ul>
                  
                </nav>
                  <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
        <!-- <a href="<?php echo e(url('/home')); ?>" class="white-btn">Dashboard</a>
        <a href="<?php echo e(url('escort/updates')); ?>" class="white-btn"><span><?php echo e($escorts->count()); ?></span> Escort Updates</a>
        <a href="<?php echo e(url('/home')); ?>" class="white-btn">Chat Room</a>
        <a href="<?php echo e(url('/home')); ?>" class="white-btn">Forum</a>
        <a href="<?php echo e(url('3hours/available')); ?>" class="white-btn">Available Now For 3 hours</a> -->
        <nav class="menu">
                  <ul>
                      <li class="m-hidden">
                          <div class="flexbox-container">
                              <a href="" onclick="return false;" class="red-small">Menu</a>
                            </div>
                            
                            <ul class="submenu">
                              <li class="subOption"><a href="<?php echo e(url('/home')); ?>">Dashboard</a></li>
                              <li class="subOption"><a href="<?php echo e(url('/multi/page')); ?>">Activities</a></li>
                              <li class="subOption"><a href="<?php echo e(url('/blog')); ?>">Blogs</a></li>
                                <li class="subOption"><a href="<?php echo e(url('/local/resources')); ?>">Local Resources</a></li>
                                
                              <li class="subOption"><a href="<?php echo e(url('/business/etiquete')); ?>">Business Etiquette</a></li>
                              <li class="subOption"><a href="<?php echo e(url('/our/story')); ?>">Our Story</a></li>
                              <li class="subOption"><a href="<?php echo e(url('/client/membership')); ?>">Client Membership</a></li>
                              <li class="subOption"><a href="<?php echo e(url('/faq')); ?>">FAQs</a></li>
                              <li class="subOption"><a href="<?php echo e(url('/privacy/statement')); ?>">Privacy Policy</a></li>
                              
                          </ul>
                          
                      </li>
                    </ul>
                    <div class="hamburger m-hidden"><span></span></div>
                    <div class="dimmer"></div>
                </nav>
          </div>
            <div class="container-fluid">
                <div class="navbar-header">
                  <?php $hedfoots=\App\HeaderFooter::orderBy('id','desc')->first(); $headerlogo= $hedfoots->headerLogo;?>
                    <a href="<?php echo e(url('/')); ?>" class="navbar-brand wow fadeIn logo-text" data-wow-delay="0.5s">
                      <img src="<?php echo e(asset('public/uploads/'.$headerlogo)); ?>" class="header-animated-logo"/></a>
                      
                </div>
                <div class="header-menu-right desktop-menu">
                    <nav class="menu">
                        <ul>
                            <!-- <li><a href="<?php echo e(url('explore/cities')); ?>">Explore Cities</a></li> -->
                            
                            <li><a href="<?php echo e(url('business/etiquete')); ?>">Business Etiquette</a></li>
                            <li><a href="<?php echo e(url('our/story')); ?>">Our Story</a></li>
                            <li><a href="<?php echo e(url('faq')); ?>">FAQ</a></li>
                            <li><a href="<?php echo e(url('client/membership')); ?>">Client Membership</a></li>
                            
                            
                            <li>
                              <?php if(auth()->guard()->guest()): ?>
                              <div class="flexbox-container">
                                <a class="red-small">Join Now</a>
                              </div>
                              <ul class="submenu">
                                <!-- <li class="subOption"><a href="<?php echo e(url('client/signup')); ?>">As Client</a></li>
                                     <li class="subOption"><a href="<?php echo e(url('escort/signup')); ?>">As Escort</a></li> -->
                                <li class="subOption"><a href="<?php echo e(url('client/membership')); ?>">As Client</a></li>
                                <li class="subOption"><a href="<?php echo e(url('bacome/escort')); ?>">As Escort</a></li>
                              </ul>
                              <?php else: ?> 
                                <a href="<?php echo e(url('/home')); ?>" class="red-small">Dashboard</a>
                              <?php endif; ?>
                            </li>
                            
                        </ul>
                        <div class="hamburger m-hidden"><span></span></div>
                        <div class="dimmer"></div>
                    </nav>
                    <div class="top-right desktop m-hidden">
                        <ul>
              
                            <!-- <li><a class="btn gray-btn search-box" href="<?php echo e(url('explore/cities')); ?>"><img src="<?php echo e(asset('public/uploads/search-icon.png')); ?>" /></a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </nav>



<?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/includes/nav.blade.php ENDPATH**/ ?>