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
                    
                    
                    <span id="count"></span><br>
                    <span class="custom-toggle switch">
                        <label for="switch-id" data-toggle="modal" data-target="#availability-modal">Online &nbsp;</label>
                        <input type="checkbox" class="switch" id="switch-id" <?php if(Auth::user()->activation == 0){?> checked data-toggle="modal" data-target="#availability-modal" <?php } ?> >
                        <label for="switch-id">Offline</label>
                    </span>
                
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <div class="dash-menu-icon dash-icon-1"></div>
                        <span>Home</span>
                    </a>
                </li> --}}
                <li class="nav-item {{ request()->route()->getName() === 'escort.friend-list' ? ' active ' : '' }}">
                    <a class="nav-link" href="{{ route('escort.friend-list') }}">
                        <div class="dash-menu-icon dash-icon-3"></div>
                        <span>Friendship List</span>
                    </a>
                </li>
                @if(Auth::user()->type_IA !='' && Auth::user()->type_IA != NULL && Auth::user()->type_IA != '1')
                <li class="nav-item {{ request()->route()->getName() === 'escort.my-profiles' ? ' active ' : '' }}">
                    <a class="nav-link" href="{{ route('escort.my-profiles') }}">
                        <div class="dash-menu-icon dash-icon-3"></div>
                        <span>My Profiles</span>
                    </a>
                </li>
                @endif
                <li class="nav-item {{ request()->route()->getName() === 'escort.report' ? ' active ' : '' }}">
                    <a class="nav-link" href="{{ route('escort.report') }}">
                        <div class="dash-menu-icon dash-icon-4"></div>
                        <span>Report</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->route()->getName() === 'escort.blog' ? ' active ' : '' }}">
                    <a class="nav-link" href="{{ route('escort.blog') }}">
                        <div class="dash-menu-icon dash-icon-6"></div>
                        <span>Blog</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->route()->getName() === 'escort.feed' ? ' active ' : '' }}">
                    <a class="nav-link" href="{{ route('escort.feed') }}">
                        <div class="dash-menu-icon dash-icon-10"></div>
                        <span>Feed</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->route()->getName() === 'escort.notifications' ? ' active ' : '' }}">
                    <a class="nav-link" href="{{ route('escort.notifications') }}">
                        <div class="dash-menu-icon dash-icon-9"></div>
                        <span>Notifications</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->route()->getName() === 'escort.newprofiles' ? ' active ' : '' }}">
                    <a class="nav-link" href="{{ route('escort.newprofiles') }}">
                        <div class="dash-menu-icon dash-icon-11"></div>
                        <span>New Profiles</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->route()->getName() === 'escort.ticket' ? ' active ' : '' }}">
                    <a class="nav-link" href="{{ route('escort.ticket') }}">
                        <div class="dash-menu-icon dash-icon-2"></div>
                        <span>Submit ticket</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->route()->getName() === 'escort.faq' ? ' active ' : '' }}">
                    <a class="nav-link" href="{{ route('escort.faq') }}">
                        <div class="dash-menu-icon dash-icon-5"></div>
                        <span>FAQ</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->route()->getName() === 'profile.stats.index' ? ' active ' : '' }}">
                    <a class="nav-link" href="{{ route('profile.stats.index') }}">
                        <div class="dash-menu-icon dash-icon-7"></div>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->route()->getName() === 'escort.tour' ? ' active ' : '' }}">
                    <a class="nav-link" href="{{ route('escort.tour') }}">
                        <div class="dash-menu-icon dash-icon-14"></div>
                        <span>Tours</span>
                    </a>
                </li>
                
                <!--<li class="nav-item"><a class="nav-link" href="#"><div class="dash-menu-icon dash-icon-5"></div> <span>Friend Request</span></a></li>-->
                <li class="nav-item {{ request()->route()->getName() === 'manage-account' ? ' active ' : '' }}">
                    <a class="nav-link" href="{{ route('manage-account')  }}">
                        <div class="dash-menu-icon dash-icon-12"></div>
                        <span>Manage Account</span>
                    </a>
                </li>
                <li class="logout-menu">
                    <a class="logout-btn" href="{{ route('client.logout') }}">
                        <span>
                            <img src="{{ asset('assets/profile/images/logout-icon.png') }}">
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


<input type="hidden" name="datetime" value="{{ Auth::user()->timer }}" id='datetime'>
<script>
    var indiaTime = new Date().toLocaleString("en-US", {timeZone: "Asia/Kolkata"});
    console.log(indiaTime);
     <?php if(Auth::user()->activation == 1){  ?>
      var datetime = $("#datetime").val();
      var deadline = new Date(datetime).getTime(); 

      var x = setInterval(function() { 
        var indiaTime = new Date().toLocaleString("en-US", {timeZone: "Asia/Kolkata"});
      var now = new Date(indiaTime).getTime();
      console.log(now);
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

$("#switch-id").on('change', function() {    
    if ($(this).is(':checked') == true) {
        switchStatus = 0;
    }
    $.ajax({
        url:"{{ route('escort.profile.deactivation.ajax') }}",
        type:"POST",
        data:{
        "_token": "{{ csrf_token() }}",
        'switchStatus':switchStatus,
        },success: function(data){
          location.reload(true);
        }
    });

});
</script>

<form action="{{ route('escort.profile.activation.ajax') }}" method="post">
    
 @csrf
<!--Availibility modal--> 
        <div class="modal fade" id="availability-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">You are going<br> online now</h5>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                        <h3>Choose your available hours</h3>
                        <div class="number-tile-group">
                            <div class="input-container">
                                <input class="num-check-button" type="radio" name="check1" value="1">
                                <div class="num-tile">
                                    <p class="num-tile-label">1</p>
                                </div>
                                </div>
                                <div class="input-container">
                                <input class="num-check-button" type="radio" name="check1" value="2">
                                <div class="num-tile">
                                    <p class="num-tile-label">2</p>
                                </div>
                                </div>
                                <div class="input-container">
                                <input class="num-check-button" type="radio" name="check1" value="3">
                                <div class="num-tile">
                                    <p class="num-tile-label">3</p>
                                </div>
                                </div>
                                <div class="input-container">
                                <input class="num-check-button" type="radio" name="check1" value="4">
                                <div class="num-tile">
                                    <p class="num-tile-label">4</p>
                                </div>
                                </div>
                                <div class="input-container">
                                <input class="num-check-button" type="radio" name="check1" value="5">
                                <div class="num-tile">
                                    <p class="num-tile-label">5</p>
                                </div>
                                </div>
                                <div class="input-container">
                                <input class="num-check-button" type="radio" name="check1" value="6">
                                <div class="num-tile">
                                    <p class="num-tile-label">6</p>
                                </div>
                                </div>
                        </div>

                        <button class="submit-btn large" id="go-online" type="submit">Go online </button>
                    </div>
                </div>
            </div>
        </div>
        <!--Availibility modal End--> 
</form>