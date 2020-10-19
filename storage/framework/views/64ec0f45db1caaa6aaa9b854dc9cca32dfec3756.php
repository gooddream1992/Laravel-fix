<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.png">

        <title>Escort Dashboard</title>

        <!-- Bootstrap core CSS -->
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="style2.css">
        <link rel="stylesheet" type="text/css" href="icofont/icofont.min.css">
    </head>

    <body>

        <!-- Header -->
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a href="index.html" class="navbar-brand wow fadeIn" data-wow-delay="0.5s"><img src="images/logo.png" ></a>
            </div>
            <div class="right">
                <h1>Profile</h1>
                <!--<div class="breadcrumb">Home » Task Type</div>-->
                <div class="user">
                    <img src="images/user-icon.png">
                    <div class="name">User name here <span>Designation</span></div>
                    <i class="icofont-caret-down"></i>
                </div>
            </div>
        </nav>
        <!-- Header END -->

        <!-- Content -->
        <div id="content">
            <!-- Section 1 -->
            <section class="row-am home missed-visit-report row">
                <div class="col-md-3 clearfix left-admin-menu">
                    <nav class="navbar navbar-expand-lg left-icon ">

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="navbar-nav mr-auto sidenav" id="navAccordion">
                                <!--                                <li class="nav-item">
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
                                <li class="nav-item"><a class="nav-link" href="#"><div class="dash-menu-icon dash-icon-1"></div> <span>Home</span></a></li>
                                <!--<li class="nav-item"><a class="nav-link" href="#"><div class="dash-menu-icon dash-icon-2"></div> <span>Submit ticket</span></a></li>-->
                                <li class="nav-item"><a class="nav-link" href="#"><div class="dash-menu-icon dash-icon-3"></div> <span>Friendship List</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"><div class="dash-menu-icon dash-icon-4"></div> <span>Report</span></a></li>
                                <!--<li class="nav-item"><a class="nav-link" href="#"><div class="dash-menu-icon dash-icon-5"></div> <span>FAQ</span></a></li>-->
                                <li class="nav-item"><a class="nav-link" href="#"><div class="dash-menu-icon dash-icon-6"></div> <span>Blog</span></a></li>
                                <li class="nav-item active"><a class="nav-link" href="#"><div class="dash-menu-icon dash-icon-7"></div> <span>Profile</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"><div class="dash-menu-icon dash-icon-8"></div> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-9 right-content">
                    <div class="box multi_step_form">
                        <form>
                            <div class="clearfix row ">
                                <div class="col-md-12">
                                    <ul id="progressbar">
                                        <li class="active icon-1"><a href="profile-step-1.html"><span>Profile Stats</span></a></li>  
                                        <li class=" icon-2"><a href="profile-step-2.html"><span>Biography</span></a></li> 
                                        <li class=" icon-3"><a href="profile-step-3.html"><span>Services</span></a></li>
                                        <li class=" icon-4"><a href="profile-step-4.html"><span>Photos</span></a></li>
                                        <li class="icon-5"><a href="profile-step-5.html"><span>Verification</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix row">
                                <div class="col-md-6 ">
                                    <div class="form-box">
                                        <div class="box-header">
                                            <h3>Basic Information</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-box">
                                        <div class="box-header">
                                            <h3>Social Information</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>Whatsapp</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label>Snapchat</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label>Website</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix row">
                                <div class="col-md-12 ">
                                    <div class="form-box">
                                        <div class="box-header">
                                            <h3>Other Information</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>Suburb</label>
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>Male/female/trans</label>
                                                        <select class="form-control">
                                                            <option>&nbsp;</option>
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                            <option>Trans gender</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>Straight/bi/gay</label>
                                                        <select class="form-control">
                                                            <option>&nbsp;</option>
                                                            <option>Straight</option>
                                                            <option>Bi</option>
                                                            <option>Gay</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>Height</label>
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>Age</label>
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>Hair</label>
                                                        <select class="form-control">
                                                            <option>&nbsp;</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>Eyes</label>
                                                        <select class="form-control">
                                                            <option>&nbsp;</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>Dress</label>
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>Bust</label>
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>Body Shape</label>
                                                        <select class="form-control">
                                                            <option>&nbsp;</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>Nationality</label>
                                                        <select class="form-control">
                                                            <option>&nbsp;</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>Personality Type</label>
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>Service Offering</label>
                                                        <!--<input type="text" class="form-control" >-->
                                                        <select class="form-control">
                                                            <option>&nbsp;</option>
                                                            <option>Escort</option>
                                                            <option>Massage </option>
                                                            <option>BDSM</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>Favourite Drink</label>
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>Favourite Food</label>
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>Service Provider </label>
                                                        <select class="form-control">
                                                            <option>&nbsp;</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="submit-btn">Submit Tick</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <!-- Content END -->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/index.js"></script>

        <script type="text/javascript" src="jquery.js"></script>
        <script>
            var $y = jQuery.noConflict();
        </script>
        <script>
            $y(document).ready(function () {
                if (!$y.browser.opera) {
                    // select element styling
                    $y('select.select').each(function () {
                        var title = $y(this).attr('title');
                        if ($y('option:selected', this).val() != '')
                            title = $y('option:selected', this).text();
                        $y(this)
                                .css({'z-index': 10, 'opacity': 0, '-khtml-appearance': 'none'})
                                .after('<span class="select">' + title + '</span>')
                                .change(function () {
                                    val = $y('option:selected', this).text();
                                    $y(this).next().text(val);
                                })
                    });
                }
                ;
            });
        </script>

        <script src="js/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>
    </body>
</html>
<?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/dev/profileStats.blade.php ENDPATH**/ ?>