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
        <div class="frd-rqst-area">
            <a href="{{ route('escort.friend-requests') }}">
                <img src="{{ asset('assets/profile/images/friend-request-icon.png') }}" />
                <span></span>
            </a>
        </div>
        <div class="notification-area">
            <img src="{{ asset('assets/profile/images/bell-icon.png') }}">
            <span>
            {{-- {{ route('') }} --}}
            </span>
        </div>
        <div class="dropdown show user">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('assets/profile/images/user-icon.png') }}">
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