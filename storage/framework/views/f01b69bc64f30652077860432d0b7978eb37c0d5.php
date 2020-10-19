 <footer>
            <section class="row-am footer1">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center">
                        <div class="col-lg-10 c-center">
                            <div class="logo-text">
                                 <?php $hedfoots=\App\HeaderFooter::orderBy('id','desc')->first(); 
                                 $footerlogo= $hedfoots->footerLogo;
                                 $facebook= $hedfoots->facebook;
                                 $facebookurl= $hedfoots->facebookurl;
                                 $youtube= $hedfoots->youtube;
                                 $youtubeurl= $hedfoots->youtubeurl;
                                 $linkedin= $hedfoots->linkedin;
                                 $linkedinurl= $hedfoots->linkedinurl;
                                 $instagram= $hedfoots->instagram;
                                 $instagramurl= $hedfoots->instagramurl;
                                 $tweeter= $hedfoots->tweeter;
                                 $tweeterurl= $hedfoots->tweeterurl;
                                 $footerinfo= $hedfoots->footerInfo;
                                 $copyrights= $hedfoots->copyrights;

                                 ?>
                                <h3 ><img src="<?php echo e(asset('public/uploads/'.$footerlogo)); ?>" class="title-logo"/></h3>

                            </div>
                            <div class="links">
                                <ul>
                                    <li><a href="#">Privacy Statments</a></li>   
                                    <li><a href="#">Copyright</a></li>   
                                    <li><a href="#">Disclaimer</a></li>   
                                    <li><a href="#">Acceptable Usage</a></li>   
                                    <li><a href="#">Terms & Conditions</a></li>   
                                </ul>
                            </div>
                            <p><?php echo e($footerinfo); ?></p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="row-am footer2">
                <div class="container bottom-red-bar">
                    <div class="left">© <script>new Date().getFullYear() > 2010 && document.write(+new Date().getFullYear());</script><?php echo e($copyrights); ?></div>
                    <div class="center">
                        <ul>
                            <li><a href="<?php echo e($facebookurl); ?>"><img src="<?php echo e(asset('public/uploads/'.$facebook)); ?>" /></a></li>
                            <li><a href="<?php echo e($tweeterurl); ?>"><img src="<?php echo e(asset('public/uploads/'.$tweeter)); ?>" /></a></li>
                            <li><a href="<?php echo e($linkedinurl); ?>"><img src="<?php echo e(asset('public/uploads/'.$linkedin)); ?>" /></a></li>
                            <li><a href="<?php echo e($youtubeurl); ?>"><img src="<?php echo e(asset('public/uploads/'.$youtube)); ?>" /></a></li>
                            <li><a href="<?php echo e($instagramurl); ?>"><img src="<?php echo e(asset('public/uploads/'.$instagram)); ?>" /></a></li>
                        </ul>
                    </div>
                    <!--<div class="right">Design and Developed by <a href="https://www.alakmalak.com/" target="_blank">Alakmalak Technologies</a></div>-->
                </div>
            </section>
        </footer><?php /**PATH E:\xampp\htdocs\honeyluxe-front\resources\views/frontend/includes/footer.blade.php ENDPATH**/ ?>