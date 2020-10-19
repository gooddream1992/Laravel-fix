






<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.png" />

        <title>HONEYLUXE - HOME</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo e(asset('assets/frontend/css/style.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" media="all" type="text/css" href="<?php echo e(asset('assets/frontend/fontawesome-free-5.0.7/css/fontawesome-all.css')); ?>">


    </head>

    <body>

        
        <?php echo $__env->make('frontend.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.includes.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <!-- Header END -->
       <?php echo $__env->yieldContent('main'); ?>
       
        <!-- Content END -->
        <!--<a href="#" class="advace-search-btn ">Advance Search</a>-->
        <!-- Footer -->
       <?php echo $__env->make('frontend.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Footer END -->

     
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script>window.jQuery || document.write('<script src="<?php echo e(asset('assets/frontend/js/jquery.min.js')); ?>"><\/script>')</script>
        <script src="<?php echo e(asset('assets/frontend/js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/frontend/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/frontend/js/index.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/frontend/js/menu3.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/frontend/js/wow.min.js')); ?>"></script>
        <script src="js/wow.min.js"></script>
        <script>
                        new WOW().init();

        </script>
       

<!--City Search Modal start-->
        <!-- Modal -->
        <div class="modal fade" id="social-media-popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">&nbsp;</h4>
                        <button type="button" class="btn" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="social-modal-content c-center">
                            <div class="logo c-center"><img src="images/logo.png" /></div>
                            <h3>Check out our social channels for all the latest updates</h3>
                            <h6>Our Platforms are here to support you</h6>
                            <ul class="">
                                <li><a href="#"><img src="images/social-medial-facebook.png"></a></li>
                                <li><a href="#"><img src="images/social-medial-insta.png"></a></li>
                                <li><a href="#"><img src="images/social-medial-youtube.png"></a></li>
                                <li><a href="#"><img src="images/social-medial-twitter.png"></a></li>
                            </ul>
                            <button class="btn red-small ">Click to Follow us </button> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="contact-blog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">Blog For Us</h4>
                        <button type="button" class="btn" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body c-center">
                        <h3>Contact Us</h3>
                        <h6>Please tell us your experience and why you would be good to blog for Skissr</h6>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name " />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email Id " />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Your Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn red-small " type="submit">Submit </button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="citySearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">Search By City</h4>
                        <button type="button" class="btn" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <select class="form-control">
                                    <option>Country</option> 
                                    <option>Canada</option> 
                                    <option>Australia</option> 
                                    <option>UK</option> 
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control">
                                    <option>City</option> 
                                    <option>City name 1</option> 
                                    <option>City name 2</option> 
                                    <option>City name 3</option> 
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="red-small btn-block">Search</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--City Search Modal End-->





        
 <script>
            $(document).ready(function () {
                $('a[href="#search"]').on("click", function (event) {
                    event.preventDefault();
                    $("#search").addClass("open");
                    $('#search > form > input[type="search"]').focus();
                });

                $("#search, #search .close").on("click keyup", function (event) {
                    if (
                            event.target == this ||
                            event.target.className == "close" ||
                            event.keyCode == 27
                            ) {
                        $(this).removeClass("open");
                    }
                });

                $("form").submit(function (event) {
                    event.preventDefault();
                    return false;
                });

            });

            $(".dropdown-menu li a").click(function () {
                $(this).parents(".dropdown").find('.btn').html($(this).text() + '');
                $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('a#hamburger-navigation').click(function () {
                    $('.menu4').toggleClass("showmenu1");
                    $('.menu4').toggleClass("showmenu", 500);
                });
            });
        </script>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                $('.menu4 li').click(function () {
                    //show its submenu
                    $('ul', this).slideDown(300);
                }, function () {
                    //hide its submenu
                    $('ul', this).slideUp(300);
                });

            });
        </script>
    </body>
</html><?php /**PATH E:\xampp\htdocs\honeyluxe\resources\views/masters/frontmaster.blade.php ENDPATH**/ ?>