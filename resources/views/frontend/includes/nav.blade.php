<nav class="navbar navbar-inverse header">
          <div class="container-fluid top">
        <nav class="menu left-menu">
             <ul>
            <li class="m-hidden">
               @if (Auth::check())
                           <div class="flexbox-container">
                              <a href="{{ route('admin.logout') }}" class="red-small">Logout</a>
                          </div>
               @else
                          <div class="flexbox-container">
                              <a href="" class="red-small">Login</a>
                          </div>
                            <ul class="submenu">
                              <li class="subOption"><a href="{{url(url('client/login'))}}">Client Login</a></li>
                                <li class="subOption"><a href="{{url(url('escort/login'))}}">Escort Login</a></li>
                          </ul>
                          @endif
                      </li>
                     </ul>
                  
                </nav>
                  <?php $escorts= \App\User::all()->where('roleStatus', 2);?>
        <a href="{{url('/home')}}" class="white-btn">Dashboard</a>
        <a href="{{url('escort/updates')}}" class="white-btn"><span>{{$escorts->count()}}</span> Escort Updates</a>
        <a href="{{url('/home')}}" class="white-btn">Chat Room</a>
        <a href="{{url('/home')}}" class="white-btn">Forum</a>
        <a href="{{url('3hours/available')}}" class="white-btn">Available Now For 3 hours</a>
        <nav class="menu">
                  <ul>
                      <li class="m-hidden">
                          <div class="flexbox-container">
                              <a href="" class="red-small">Menu</a>
                            </div>
                            {{-- SMPEDIT 15-10-2020 --}}
                            <ul class="submenu">
                              <li class="subOption"><a href="{{ url('/home') }}">Dashboard</a></li>
                              <li class="subOption"><a href="{{ url('/multi/page') }}">Activities</a></li>
                              <li class="subOption"><a href="{{ url('/blog') }}">Blogs</a></li>
                                <li class="subOption"><a href="{{ url('/local/resources') }}">Local Resources</a></li>
                                <li class="subOption"><a href="{{ url('/explore/cities') }}">Explore Cities</a></li>
                              <li class="subOption"><a href="{{ url('/business/etiquete') }}">Business Etiquette</a></li>
                              <li class="subOption"><a href="{{ url('/out/story') }}">Our Story</a></li>
                              <li class="subOption"><a href="{{ url('/client/membership') }}">Client Membership</a></li>
                              <li class="subOption"><a href="{{ url('/faq') }}">FAQs</a></li>
                              <li class="subOption"><a href="{{ url('/privacy/statement') }}">Privacy Policy</a></li>
                              <li class="subOption"><a href="{{ url('/terms/condition') }}">Terms & Condition</a></li>
                          </ul>
                          {{-- / SMPEDIT 15-10-2020 END --}}
                      </li>
                    </ul>
                    <div class="hamburger m-hidden"><span></span></div>
                    <div class="dimmer"></div>
                </nav>
          </div>
            <div class="container-fluid">
                <div class="navbar-header">
                  <?php $hedfoots=\App\HeaderFooter::orderBy('id','desc')->first(); $headerlogo= $hedfoots->headerLogo;?>
                    <a href="{{url('/')}}" class="navbar-brand wow fadeIn logo-text" data-wow-delay="0.5s">
                      <!-- <img src="{{asset('public/uploads/'.$headerlogo)}}" class="header-animated-logo"/></a> -->
                      <img src="{{asset('assets/frontend/images/Logo-gif.gif')}}" class="header-animated-logo"/></a>
                </div>
                <div class="header-menu-right desktop-menu">
                    <nav class="menu">
                        <ul>
                            <li><a href="{{url('explore/cities')}}">Explore Cities</a></li>
                            <li><a href="{{url('terms/condition')}}">Terms & Condition</a></li>
                            <li><a href="{{url('business/etiquete')}}">Business Etiquette</a></li>
                            <li><a href="{{url('our/story')}}">Our Story</a></li>
                            <li><a href="{{url('faq')}}">FAQ</a></li>
                            <li><a href="{{url('client/membership')}}">Client Membership</a></li>
                            {{-- SMPEDIT 15-10-2020 --}}
                            {{-- <li><a class=" btn red-small client-login" href="{{url('client/signup')}}">Join Now</a></li> --}}
                            <li>
                              @guest
                              <div class="flexbox-container">
                                <a class="red-small">Join Now</a>
                              </div>
                              <ul class="submenu">
                                <li class="subOption"><a href="{{url('client/signup')}}">As Client</a></li>
                                <li class="subOption"><a href="{{url('escort/signup')}}">As Escort</a></li>
                              </ul>
                              @else 
                                <a href="{{url('/home')}}" class="red-small">Dashboard</a>
                              @endguest
                            </li>
                            {{-- / SMPEDIT 15-10-2020 END --}}
                        </ul>
                        <div class="hamburger m-hidden"><span></span></div>
                        <div class="dimmer"></div>
                    </nav>
                    <div class="top-right desktop m-hidden">
                        <ul>
              
                            <li><a class="btn gray-btn search-box" href="#search"><img src="{{asset('public/uploads/search-icon.png')}}" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>



