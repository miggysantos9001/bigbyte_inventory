<?php 
    $setting = \App\Setting::orderBy('id','DESC')->first();
?>
<header class="header">
    <div class="logo-container">
        <a href="../4.0.0" class="logo">
            @if($setting == NULL)
            <img src="{{ asset('public/photo/samplelogo.png') }}" alt="" height="45" width="50" style="padding-bottom: 10px;">
            @else
            <img src="{{ asset('public/photo/'.$setting->company_logo) }}" alt="" height="45" width="50" style="padding-bottom: 10px;">
            @endif
        </a>

        <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
        </div>

    </div>

    <!-- start: search & user box -->
    <div class="header-right">
        <span class="separator"></span>
        
        <div id="userbox" class="userbox">
            <a href="#" data-bs-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="{{ asset('public/assets/img/!logged-user.jpg') }}" alt="Joseph Doe" class="rounded-circle" data-lock-picture="{{ asset('public/assets/img/!logged-user.jpg') }}" />
                </figure>
                <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                    <span class="name">{{ Auth::user()->name }}</span>
                    <span class="name">{{ Auth::user()->usertype->name }}</span>
                </div>
                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled mb-2">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="{{ action('DashboardController@view_changepassword',Auth::user()->id) }}"><i class="fa fa-key"></i> Change Password</a>
                        <a role="menuitem" tabindex="-1" href="{{ route('gawas') }}"><i class="bx bx-power-off"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>