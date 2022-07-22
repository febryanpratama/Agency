<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true"
        data-img="{{ asset('') }}admin/app-assets/images/backgrounds/02.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo"
                        alt="Chameleon admin logo" src="{{ asset('') }}admin/app-assets/images/logo/logo.png" />
                    <h3 class="brand-text">StarLabSys</h3>
                </a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="navigation-background"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ request()->is('dashboard') ? 'open' : '' }}">
                <a href="{{ url('dashboard') }}">
                    <i class="ft-home"></i>
                    <span class="menu-title" data-i18n="">Dashboard</span>
                </a>
            </li>
            <li class=" nav-item {{ request()->is('services') ? 'open' : '' }}">
                <a href="{{ url('services') }}">
                    <i class="ft-align-center"></i>
                    <span class="menu-title" data-i18n="">Services</span>
                </a>
            </li>
            <li class=" nav-item {{ request()->is('study-case') ? 'open' : '' }}">
                <a href="{{ url('study-case') }}">
                    <i class="ft-briefcase"></i>
                    <span class="menu-title" data-i18n="">Study Case</span>
                </a>
            </li>
            <li class=" nav-item {{ request()->is('portfolio') ? 'open' : '' }}">
                <a href="{{ url('portfolio') }}">
                    <i class="ft-file-text"></i>
                    <span class="menu-title" data-i18n="">Portfolio</span>
                </a>
            </li>
            <li class=" nav-item {{ request()->is('pricing') ? 'open' : '' }}">
                <a href="{{ url('pricing') }}">
                    <i class="ft-bar-chart-2"></i>
                    <span class="menu-title" data-i18n="">Pricing</span>
                </a>
            </li>
            <li class=" nav-item {{ request()->is('client') ? 'open' : '' }}">
                <a href="{{ url('client') }}">
                    <i class="ft-user-check"></i>
                    <span class="menu-title" data-i18n="">Client</span>
                </a>
            </li>
            <li class=" nav-item">
                <a href="https://themeselection.com/support">
                    <i class="ft-settings"></i>
                    <span class="menu-title" data-i18n="">Setting</span>
                </a>
            </li>
        </ul>
    </div>
</div>