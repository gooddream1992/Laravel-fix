<nav class="navbar navbar-inverse header">
          <div class="container-fluid top">
        <nav class="menu left-menu">
                  <ul>
            <li class="m-hidden">
                          <div class="flexbox-container">
                              <a href="" class="red-small">Login</a>
                          </div>
                            <ul class="submenu">
                              <li class="subOption"><a href="<?php echo e(url(url('client/login'))); ?>">Client Login</a></li>
                                <li class="subOption"><a href="<?php echo e(url(url('escort/login'))); ?>">Escort Login</a></li>
                          </ul>
                      </li>
                     </ul>
                </nav>
        <a href="<?php echo e(url('/home')); ?>" class="white-btn">Dashboard</a>
        <button class="white-btn"><span>34</span> Dscort Updates</button>
        <button class="white-btn">Chat Room</button>
        <button class="white-btn">Forum</button>
        <button class="white-btn">Available Now For 3 hours</button>
        <nav class="menu">
                  <ul>
                      <li class="m-hidden">
                          <div class="flexbox-container">
                              <a href="" class="red-small">Menu</a>
                            </div>
                            <ul class="submenu">
                              <li class="subOption"><a href="">Privacy Policy</a></li>
                                <li class="subOption"><a href="">Terms & Condition</a></li>
                                <li class="subOption"><a href="">Link 1</a></li>
                                <li class="subOption"><a href="">Link 2</a></li>
                                <li class="subOption"><a href="">Link 3</a></li>
                                <li class="subOption"><a href="">Link 4</a></li>
                                <li class="subOption"><a href="">Link 5</a></li>
                                <li class="subOption"><a href="">Link 6</a></li>
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
                            <li><a href="<?php echo e(url('explore/cities')); ?>">Explore Cities</a></li>
                            <li><a href="<?php echo e(url('terms/condition')); ?>">Terms & Condition</a></li>
                            <li><a href="<?php echo e(url('business/etiquete')); ?>">Business Etiquette</a></li>
                            <li><a href="<?php echo e(url('our/story')); ?>">Our Story</a></li>
                            <li><a href="<?php echo e(url('faq')); ?>">FAQ</a></li>
                            <li><a href="<?php echo e(url('client/membership')); ?>">Client Membership</a></li>
                            <li><a class=" btn red-small client-login" href="<?php echo e(url('client/signup')); ?>">Join Now</a></li>
                        </ul>
                        <div class="hamburger m-hidden"><span></span></div>
                        <div class="dimmer"></div>
                    </nav>
                    <div class="top-right desktop m-hidden">
                        <ul>
              
                            <li><a class="btn gray-btn search-box" href="#search"><img src="<?php echo e(asset('public/uploads/search-icon.png')); ?>" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>



<?php /**PATH E:\xampp\htdocs\honeyluxe-front\resources\views/frontend/includes/nav.blade.php ENDPATH**/ ?>