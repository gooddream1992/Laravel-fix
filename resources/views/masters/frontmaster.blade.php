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
        <link href="{{asset('assets/frontend/css/style.css')}}" rel="stylesheet">
        <link rel="stylesheet" media="all" type="text/css" href="{{asset('assets/frontend/fontawesome-free-5.0.7/css/fontawesome-all.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/fontawesome-free-5.0.7/css/bootstrap.min.css') }}">
        
        <script src="{{ asset('assets/frontend/newjs/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/newjs/popper.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/newjs/bootstrap.min.js') }}"></script>

        {{-- SMPEDIT 29-08-2020 --}}
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
        </style>
        {{-- SMPEDIT 29-08-2020 END --}}
    </head>

    <body>

        
        @include('frontend.includes.header')
        @include('frontend.includes.nav')
        
        <!-- Header END -->
        @yield('main')
        
            <!-- Content END -->
            <!--<a href="#" class="advace-search-btn ">Advance Search</a>-->
            <!-- Footer -->
        @include('frontend.includes.footer')
        <!-- Footer END -->

     
        {{-- SMPEDIT 01-10-2020 --}}
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

                if (inputField.value == 'false') {
                    inputField.value = true
                    toggleButton.classList.add('active')
                } else {
                    inputField.value = false
                    toggleButton.classList.remove('active')
                }
            }

            function getCities() {
                $.ajax({
                    url: "{{route('get_cities')}}",
                    method: 'GET',
                    data: {
                        'country_id': $('#selectCountry').find(':selected').val()
                    },
                    success: function (data) {
                        $('#citySelect').text(' ');
                        for (var k = 0; k < data.cities.length; k++) {
                            $('#citySelect').append('<option value="' + data.cities[k].id + '">' + data.cities[k].city + '</option>');
                        }
                        
                        let cityOptions = document.querySelector('#citySelect').options;
                        for (i = 0; i < cityOptions.length; i++) {
                            @if (isset($city_id))
                                if (cityOptions[i].value == {{ $city_id }} ) {
                                    cityOptions[i].setAttribute('selected', true)
                                }
                            @endif
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                })
            } 
        </script>
        {{-- / SMPEDIT 01-10-2020 END --}}

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->
        <script>window.jQuery || document.write('<script src="{{asset('assets/frontend/js/jquery.min.js')}}"><\/script>')</script>
        <!-- <script src="{{asset('assets/frontend/js/jquery.min.js')}}"></script> -->
        <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/frontend/js/index.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/frontend/js/menu3.js')}}"></script>
        <script src="http://design.hire-webdeveloper.com/honey/v11/js/simple-sidebar.js"></script>
        <!-- <script src="{{asset('assets/frontend/js/wow.min.js')}}"></script> -->
        <script src="{{asset('assets/frontend/js/wow.min.js')}}"></script> {{-- SMPEDIT 29-09-2020 --}}
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
                            <div class="logo c-center"><img src="{{asset('public/uploads/'.$footerlogo)}}" /></div>
                            <h3>{{$footerinfo}}</h3>
                            <h6>Our Platforms are here to support you</h6>
                            <ul class="">
                                <li><a href="{{$facebookurl}}"><img src="{{asset('public/uploads/'.$facebook)}}" /></a></li>
                            <li><a href="{{$tweeterurl}}"><img src="{{asset('public/uploads/'.$tweeter)}}" /></a></li>
                            <li><a href="{{$linkedinurl}}"><img src="{{asset('public/uploads/'.$linkedin)}}" /></a></li>
                            <li><a href="{{$youtubeurl}}"><img src="{{asset('public/uploads/'.$youtube)}}" /></a></li>
                            <li><a href="{{$instagramurl}}"><img src="{{asset('public/uploads/'.$instagram)}}" /></a></li>
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


                         <form method="POST" action="{{ url('country/city/list/escort') }}">
                                  @csrf



                            <div class="form-group">
                                <select class="form-control" name="country_id" onchange="selectcountry()" id="selectCountry">
                                     <?php $countries=\App\Country::all();?>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->country}}</option>
                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="state_id" onchange="selectstate()" id="stateSelect">
                                      <?php $states=\App\State::all();?>
                        @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->state}}</option>
                        @endforeach
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
</html>