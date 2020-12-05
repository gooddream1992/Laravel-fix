<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="<?php echo e(asset('/favicon.ico')); ?>" rel="shortcut icon">
        

        
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo e(asset('assets/frontend/css/style.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" media="all" type="text/css" href="<?php echo e(asset('assets/frontend/fontawesome-free-5.0.7/css/fontawesome-all.css')); ?>">
        <!--<link rel="stylesheet" href="<?php echo e(asset('assets/frontend/fontawesome-free-5.0.7/css/bootstrap.min.css')); ?>">-->
        
        
        <script src="<?php echo e(asset('assets/frontend/newjs/popper.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/frontend/newjs/bootstrap.min.js')); ?>"></script>

        
        <style>
            .custom-toggle-btn {
                border-radius: 4px !important;
                padding: 9px 15px !important;
                background: #f8150a !important;
                color: white !important;
                font-weight: 600 !important;
                text-transform: uppercase !important;
                font-size: 14px !important;
            }
            .custom-toggle > .active {
                color: #f8150a !important; 
                background: white !important;
            }
            .custom-red-small {
                border-radius: 4px !important;
                padding: 7px 15px !important;
                background: #f8150a !important;
                color: white !important;
                font-weight: 600 !important;
                text-transform: uppercase !important;
                font-size: 14px !important;
            }
            .custom-red-small:hover {
                background-color: #747474 !important;
                color: white !important;
            }
            .s-btn:hover {
                background: #cc140a !important;
                color: white !important;
            } 
            .s-btn:focus {
                background: #cc140a !important;
                color: white !important;
            }
            .pagination > li.page-item {
                list-style-type: none !important;
                margin: 0 3px !important;
            }
            .pagination {
                width: 100%;
                margin: 0 auto 0 auto;
            }
        </style>
        
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

     
        
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                getCities()
                let allCustomButtons = document.querySelectorAll('.custom-toggle-btn')
                
                for (let i = 0; i < allCustomButtons.length; i++) {
                    let fieldId = (allCustomButtons[i].id).split('_btn')[0]
                    let toggleButton = document.getElementById(allCustomButtons[i].id)
                    let field = document.getElementById(fieldId)
                    if (field.value == 'true') {
                        toggleButton.setAttribute('aria-pressed', true)
                        toggleButton.classList.add('active')
                    } 
                }
            });

            function customToggle(field, button) {
                let inputField = document.getElementById(field)
                let toggleButton = document.getElementById(button)
                // toggleButton.classList.toggle('active');
                if (inputField.value == 'false') 
                {
                    inputField.value = true;
                    toggleButton.classList.add('active');
                } 
                else 
                {
                    inputField.value = false;
                    toggleButton.classList.remove('active');
                }
            }
            function customToggleTwo(field, button) {
                let inputField = document.getElementById(field)
                let toggleButton = document.getElementById(button)
                // toggleButton.classList.toggle('active');
                if (inputField.value == 'false') 
                {
                    inputField.value = true;
                    toggleButton.classList.remove('active');
                } 
                else 
                {
                    inputField.value = false;
                    toggleButton.classList.add('active');
                }
            }

            function getCities() {
                $.ajax({
                    url: "<?php echo e(route('get_cities')); ?>",
                    method: 'GET',
                    data: {
                        'country_id': $('#selectCountry').find(':selected').val()
                    },
                    success: function (data) {
                        $('#citySelect').text(' ');
                        $('#citySelectMob').text(' ');
                        let cityId = undefined
                        <?php if(isset($city_id) || isset($state_id)): ?>
                            cityId = <?php echo e($city_id ?? $state_id); ?>

                        <?php endif; ?>
                        $('#citySelect').text(' ');
                        $('#citySelectMob').text(' ');
                        $('#citySelect').append('<option value="">--Select City--</option>');
                        $('#citySelectMob').append('<option value="">--Select City--</option>');
                        for (var k = 0; k < data.cities.length; k++) {
                            if (cityId == undefined) {
                                $('#citySelect').append('<option value="' + data.cities[k].id + '">' + data.cities[k].city + '</option>');
                                $('#citySelectMob').append('<option value="' + data.cities[k].id + '">' + data.cities[k].city + '</option>');
                            } else {
                                let selected = ''
                                if (cityId == data.cities[k].id) {
                                    selected = 'selected'
                                } 
                                $('#citySelect').append('<option value="' + data.cities[k].id + '"' + selected +'>' + data.cities[k].city + '</option>');
                                $('#citySelectMob').append('<option value="' + data.cities[k].id + '"' + selected +'>' + data.cities[k].city + '</option>');
                            }
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                })
            } 
            function getCitiesOne() {
                $.ajax({
                    url: "<?php echo e(route('get_cities')); ?>",
                    method: 'GET',
                    data: {
                        'country_id': $('#selectCountryOne').find(':selected').val()
                    },
                    success: function (data) {
                        $('#citySelectOne').text(' ');
                        let cityId = undefined
                        <?php if(isset($city_id) || isset($state_id)): ?>
                            cityId = <?php echo e($city_id ?? $state_id); ?>

                        <?php endif; ?>
                        $('#citySelectOne').text(' ');
                        $('#citySelectOne').append('<option value="">--Select City--</option>');
                        for (var k = 0; k < data.cities.length; k++) {
                            if (cityId == undefined) {
                                $('#citySelectOne').append('<option value="' + data.cities[k].id + '">' + data.cities[k].city + '</option>');
                            } else {
                                let selected = ''
                                if (cityId == data.cities[k].id) {
                                    selected = 'selected'
                                } 
                                $('#citySelectOne').append('<option value="' + data.cities[k].id + '"' + selected +'>' + data.cities[k].city + '</option>');
                            }
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                })
            } 
            function getCitiesTwo() {
                $.ajax({
                    url: "<?php echo e(route('get_cities')); ?>",
                    method: 'GET',
                    data: {
                        'country_id': $('#selectCountryAdvSearch').find(':selected').val()
                    },
                    success: function (data) {
                        $('#citySelectAdvSearch').text(' ');
                        let cityId = undefined
                        <?php if(isset($city_id) || isset($state_id)): ?>
                            cityId = <?php echo e($city_id ?? $state_id); ?>

                        <?php endif; ?>
                        $('#citySelectAdvSearch').text(' ');
                        $('#citySelectAdvSearch').append('<option value="">--Select City--</option>');
                        for (var k = 0; k < data.cities.length; k++) {
                            if (cityId == undefined) {
                                $('#citySelectAdvSearch').append('<option value="' + data.cities[k].id + '">' + data.cities[k].city + '</option>');
                            } else {
                                let selected = ''
                                if (cityId == data.cities[k].id) {
                                    selected = 'selected'
                                } 
                                $('#citySelectAdvSearch').append('<option value="' + data.cities[k].id + '"' + selected +'>' + data.cities[k].city + '</option>');
                            }
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                })
            } 


        </script>
        

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        
        <script src='https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.min.js'></script>
        <script src="<?php echo e(asset('assets/frontend/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/frontend/js/index.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/frontend/js/menu3.js')); ?>"></script>
        <script src="https://design.hire-webdeveloper.com/honey/v11/js/simple-sidebar.js"></script>
        <!-- <script src="<?php echo e(asset('assets/frontend/js/wow.min.js')); ?>"></script> -->
        <script src="<?php echo e(asset('assets/frontend/js/wow.min.js')); ?>"></script> 
        <script>

$('.profile-container').masonry({
    columnWidth : '.grid-sizer',
    gutter : 2,
    itemSelector : '.item',
    percentPosition : 'true',
    fitWidth: true,
  });
  $('.selfie-container').masonry({
    columnWidth : '.grid-sizer',
    gutter : 0,
    itemSelector : '.item',
    percentPosition : 'true',
    fitWidth: true,
  });
                        new WOW().init();
                        function likeUnlike(feedId) {
        like_status = $("#like" + feedId).html();
        like_status = like_status.trim();
        if (like_status == 'Like') {
            $("#like" + feedId).html('Liked!');
            var old_likes = $("#likecount" + feedId).html();
            new_likes = parseInt(old_likes) + parseInt(1);
            $("#likecount" + feedId).html(new_likes);
        } else {
            $("#like" + feedId).html('Like');
            var old_likes = $("#likecount" + feedId).html();
            new_likes = parseInt(old_likes) - parseInt(1);
            $("#likecount" + feedId).html(new_likes);
        }
        $.ajax({
            type: "post",
            url: "<?php echo e(route('escort.like-unlike')); ?>",
            data: {
                feedId: feedId,
                "_token": "<?php echo e(csrf_token()); ?>"
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
            }
        });
    }

    function doComment(feedId) {
        comment = $("#comment" + feedId).val();
        if (comment != '') {
            $.ajax({
                type: "post",
                url: "<?php echo e(route('escort.do-comment')); ?>",
                data: {
                    feedId: feedId,
                    comment: comment,
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                dataType: "json",
                success: function(response) {
                    $("#" + feedId + " .comment-row:first").after('<div class="form-group comment-row"><div class="comment-feed-img"><img src="' + response.image + '" style="height: 45px;width: 45px;" class="img-fluid"></div><div class="comment-box" style="color: #9f809f;min-width: 9%;border-radius: 10px;float: left;height: auto;padding-left: 15px;"><b style="color: gray;"><?php echo e((Auth::check()) ? Auth::user()->name : ""); ?></b><br>' + response.comment + '</div></div>');
                    $("#comment" + feedId).val('');
                    var old_comments = $("#commentcount" + feedId).html();
                    new_comments = parseInt(old_comments) + parseInt(1);
                    $("#commentcount" + feedId).html(new_comments);
                }
            });
        }
    }
    $(".comment-box").keyup(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) { //Enter keycode
            doComment($(this).attr('data-id'));
        }
    });
        </script>
<script>
    $(document).ready(function(){
        $(".testimonial-submit-btn").click(function(){
            var escort_id = $("#escort_id").val();
            var testimoninal_text = $("#testimoninal_text").val();
            $.ajax({
                type: "POST",
                url:"<?php echo e(route('store.testimonial')); ?>",
                data:{
                    "_token": "<?php echo e(csrf_token()); ?>",
                    escort_id:escort_id,
                    testimoninal_text:testimoninal_text
                },success: function(data){
                    console.log(data);
                    location.reload();
                }
            });
        });
    });
        $(document).ready(function(){
           $('#service_type').on('change',function(){
                if(this.value == 1){
                    $('#formId').attr('action', "<?php echo e(url('filter/search/escort?servicetype=Escort')); ?>");
                }else if(this.value == 2){
                    $('#formId').attr('action', "<?php echo e(url('filter/search/escort?servicetype=BDSM')); ?>");
                }else if(this.value == 3){
                    $('#formId').attr('action', "<?php echo e(url('filter/search/escort?servicetype=Massage')); ?>");
                }else{
                    $('#formId').attr('action', "<?php echo e(url('filter/search/escort')); ?>");
                }
           });
        });
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
                    <div class="modal-body">
                        <div class="social-modal-content c-center">
                            <div class="logo c-center"><img src="<?php echo e(asset('public/uploads/'.$footerlogo)); ?>" /></div>
                            <h3><?php echo e($footerinfo); ?></h3>
                            <h6>Our Platforms are here to support you</h6>
                            <ul class="">
                                <li><a href="<?php echo e($facebookurl); ?>"><img src="<?php echo e(asset('public/uploads/'.$facebook)); ?>" /></a></li>
                            <li><a href="<?php echo e($tweeterurl); ?>"><img src="<?php echo e(asset('public/uploads/'.$tweeter)); ?>" /></a></li>
                            <li><a href="<?php echo e($linkedinurl); ?>"><img src="<?php echo e(asset('public/uploads/'.$linkedin)); ?>" /></a></li>
                            <li><a href="<?php echo e($youtubeurl); ?>"><img src="<?php echo e(asset('public/uploads/'.$youtube)); ?>" /></a></li>
                            <li><a href="<?php echo e($instagramurl); ?>"><img src="<?php echo e(asset('public/uploads/'.$instagram)); ?>" /></a></li>
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
                         
                                  <?php echo csrf_field(); ?>



                            <div class="form-group">
                                <select class="form-control" name="country_id" onchange="getCitiesOne()" id="selectCountryOne">
                                    <option value="">--Select Country--</option>
                                     <?php $countries=\App\Country::all();?>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>"><?php echo e($country->country); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="citySelect" id="citySelectOne">
                                    <option value="">--Select City--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="red-small btn-block" type="button" id="viewMoreRedirection">Search</button>
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
                     
                     /*
                    event.preventDefault();

                    return false;
                       */
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.11/jquery.autocomplete.js" integrity="sha512-JwPA+oZ5uRgh1AATPhLKeByWbXcsRnMMSBpvhuAGQp+CWISl/fHecOshbRcPPgKWau9Wy1H5LhiwAa4QFiQKYw==" crossorigin="anonymous"></script>
<!-- Content END -->
<script>
   $(document).ready(function(){
      src = "<?php echo e(route('suburb')); ?>";
             $("#city_id").autocomplete({
                 source: function(request, response) {
                     $.ajax({
                         url: src,
                         type : 'POST',
                         dataType: "json",
                         data: {
                             "_token": "<?php echo e(csrf_token()); ?>",
                             query : request.term
                         },
                         success: function(data) {
                             response(data);
                         }
                     });
                 },
                 minLength: 2,
            
             });
      $("#search-location").click(function(){
        load_data();
      });
      function load_data()
      {

        var tab_value = $("#tab-value").val();
        var city_id = $("#city_id").val();
        $.ajax({
            url:"<?php echo e(url('search/city/escort')); ?>",
            type:"POST",
            data:{
              "_token": "<?php echo e(csrf_token()); ?>",
              city_id:city_id,
              tab_value:tab_value
            },success: function(data){
              $("#pills-tabContent").empty();
              var html = '<div class="col-lg-12"><div class="tab-content" id="pills-tabContent"><div class="tab-pane fade show active " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">';
              html += '<div class="simplebar res-img-grid" id="myElement" ><ul class="res-tab-imgs" >';
              for(var count =0; count < data.length; count++){
                  html +=' <li><div class="img-box">';
                  html +='<a href="'+data[count].title+'" target="_blank">';
                  html +='<img src="<?php echo e(asset('public/localresources/')); ?>/'+data[count].image+'" class="img-fluid"/>';
                  html +='<div class="top-content">'+data[count].name+'</div></a></div></li>';
              }
              html +='</ul></div></div></ul></div></div></div></div>';
              $("#pills-tabContent").append(html);
            }
        });
      
      }

      $(".get-data").click(function(){
        load_data();
      });
   });
</script>
        <script type="text/javascript">

        $("#viewMoreRedirection").click(function(){
            country = $( "#selectCountryOne option:selected" ).text();
            city = $( "#citySelectOne option:selected" ).text();
            link = '';
            if(country!='')
            {
                link += '/country/'+country.replace(" ", "-");
            }
            if(city!='' && city!='--Select City--')
            {
                link += '/'+city.replace(" ", "-");
            }
            if(link!='')
            {
                window.location.href = 'http://'+window.location.hostname+link;
            }
        });

            jQuery(document).ready(function () {

                $('.menu4 li').click(function () {

                    //show its submenu

                    $('ul', this).slideDown(300);

                }, function () {

                    //hide its submenu

                    $('ul', this).slideUp(300);

                });


                $(".testimonial-submit-btn").click(function(){
                    $("#store_testimonial").submit();
                });
                

            });

        </script>

    </body>
</html><?php /**PATH /home/honeydevealakmal/public_html/resources/views/masters/frontmaster.blade.php ENDPATH**/ ?>