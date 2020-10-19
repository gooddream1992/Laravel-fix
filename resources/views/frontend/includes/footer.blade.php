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
                        <h3 ><img src="{{asset('public/uploads/'.$footerlogo)}}" class="title-logo"/></h3>

                    </div>
                    <div class="links">
                        <ul>
                            <li><a href="{{ route('privacy.statement') }}">Privacy Statments</a></li>   
                            <li><a href="{{ route('copyright') }}">Copyright</a></li>   
                            <li><a href="{{ route('disclaimer') }}">Disclaimer</a></li>   
                            <li><a href="{{ route('acceptable.usage') }}">Acceptable Usage</a></li>   
                            <li><a href="{{url('terms/condition')}}">Terms & Conditions</a></li>   
                        </ul>
                    </div>
                    <p>{{$footerinfo}}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="row-am footer2">
        <div class="container bottom-red-bar">
            <div class="left">© <script>new Date().getFullYear() > 2010 && document.write(+new Date().getFullYear());</script>{{$copyrights}}</div>
            <div class="center">
                <ul>
                    <li><a href="{{$facebookurl}}"><img src="{{asset('public/uploads/'.$facebook)}}" /></a></li>
                    <li><a href="{{$tweeterurl}}"><img src="{{asset('public/uploads/'.$tweeter)}}" /></a></li>
                    <li><a href="{{$linkedinurl}}"><img src="{{asset('public/uploads/'.$linkedin)}}" /></a></li>
                    <li><a href="{{$youtubeurl}}"><img src="{{asset('public/uploads/'.$youtube)}}" /></a></li>
                    <li><a href="{{$instagramurl}}"><img src="{{asset('public/uploads/'.$instagram)}}" /></a></li>
                </ul>
            </div>
            <!--<div class="right">Design and Developed by <a href="https://www.alakmalak.com/" target="_blank">Alakmalak Technologies</a></div>-->
        </div>
    </section>
</footer>

<!-- <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script> -->
<script src="https://npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<script src="https://npmcdn.com/isotope-masonry-horizontal@2/masonry-horizontal.js"></script>