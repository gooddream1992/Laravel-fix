<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a href="{{ route('profile.stats.index') }}" class="navbar-brand wow fadeIn" data-wow-delay="0.5s">
            <img src="{{ asset('assets/profile/images/logo.png') }}">
        </a>
    </div>
    <div class="right">
        <h1 id="page_header_heading"> @yield('header_title')</h1>
        <!--<div class="breadcrumb">Home » Task Type</div>-->

        @if(Session::has('message'))
            <p style="width: 72%;text-align: center;" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        @if(Session::has('main_login_type') && Auth::user()->parent_id == '')
        <div class="frd-rqst-area" style="right: 564px;top: 31px;">
            <a href="{{ route('admin.session') }}" style="color: white;border-radius: 4px;padding: 9.2%;background: red;">
                Admin Login
            </a>
        </div>
        @endif
        <a class="btn frd-rqst-area" href="{{ route('escort.feed.upload') }}" style="background: red;color: white;right: 437px;top: 31px;">Upload a Post</a>
        <div class="frd-rqst-area">
            <a href="{{ route('escort.friend-requests') }}">
                <img src="{{ asset('assets/profile/images/friend-request-icon.png') }}" />
                <span></span>
            </a>
        </div>
        <a href="{{ route('escort.notifications') }}">
            <div class="notification-area">
                <img src="{{ asset('assets/profile/images/bell-icon.png') }}">
                <span>
                    {{-- {{ route('') }} --}}
                </span>
            </div>
        </a>
        <div class="dropdown show user">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @php
                    $profile_image = NULL;
                    $profile_image_arr = DB::table('profile_images')->where('status','5')->where('escortId',Auth::user()->id)->get();
                    if(count($profile_image_arr) > 0)
                    {
                        $profile_image = $profile_image_arr[0]->image;
                    }
                @endphp
                @if($profile_image==NULL)
                    <img style="height: 44px; width: 44px; border-radius: 25px;" src="{{asset('public/blankphoto.png')}}">
                @else
                    <img style="height: 44px; width: 44px; border-radius: 25px;" src="{{asset('public/uploads/'.$profile_image)}}">
                @endif
                <div class="name">{{ Auth::user()->name }} <span>Escort</span></div>
                <i class="icofont-caret-down"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                {{-- <a class="dropdown-item" href="#">Login</a> --}}
                <a class="dropdown-item" href="{{ route('client.logout') }}">Logout</a>
            </div>
        </div>
    </div>
</nav>