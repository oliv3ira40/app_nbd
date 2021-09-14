<body>
    <!-- Preloader -->
    {{-- <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div> --}}
    <!-- /Preloader -->
    <div class="wrapper theme-5-active pimary-color-blue">
        <!-- Top Menu Items -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="mobile-only-brand pull-left">
                <div class="nav-header pull-left">
                    <div class="logo-wrap pt-0">
                        <a href="{{ route('adm.index') }}">
                            <img style="width: 180px; top: 5px;"class="brand-img" src="{{ asset('assets/logo.png') }}" alt="NBD"/>
                        </a>
                    </div>
                </div>	
                <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
            </div>
            <div id="mobile_only_nav" class="mobile-only-nav pull-right">
                <ul class="nav navbar-right top-nav pull-right">
                    <li style="z-index: 10;" class="dropdown auth-drp">
                        <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">
                            @if (HelpAdmin::IsUserDeveloper())
                                <img style="border: solid 1px black;" src="{{ asset('assets/icons/6.png') }}" alt="user_auth" class="user-auth-img img-circle"/>
                            @elseif (HelpAdmin::IsUserAdministrator())
                                <img style="border: solid 1px black;" src="{{ asset('assets/icons/12.png') }}" alt="user_auth" class="user-auth-img img-circle"/>
                            @else
                               <img style="border: solid 1px black;" src="{{ asset('assets/icons/4.png') }}" alt="user_auth" class="user-auth-img img-circle"/>
                            @endif    
                        </a>
                        <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                            <li >
                                <a href="javascript:void(0);">
                                    <span class="font-bold">
                                        {{ \Auth::User()->first_name }} {{ \Auth::User()->last_name }}
                                    </span>
                                    <br>
                                    <span style="color: {{ \Auth::User()->Group->tag_color }}">
                                        {{ \Auth::User()->Group->name }}
                                    </span>
                                </a>
                            </li>
                            <li class="divider"></li>

                            @if (in_array('adm.users.edit', HelpAdmin::permissionsUser()))
                                <li>
                                    <a href="{{ route('adm.users.edit', \Auth::User()->id) }}"><i class="zmdi zmdi-account"></i><span>Perfil</span></a>
                                </li>
                            @endif
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('adm.logout') }}">
                                    <i class="zmdi zmdi-power"></i>
                                    <span>Sair</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>	
        </nav>
        <!-- /Top Menu Items -->
        
        <!-- Left Sidebar Menu -->
        <div class="fixed-sidebar-left">
            <ul class="nav navbar-nav side-nav nicescroll-bar">
                @foreach (HelpMenuAdmin::SideMenu() as $option)
                    @if ($option['permission'] == '#' OR in_array($option['permission'], HelpAdmin::permissionsUser(\Auth::user())) OR HelpAdmin::IsUserDeveloper())
                        @if (isset($option['name_menu']))
                            <li class="navigation-header">
                                <span>{{ $option['name_menu'] }}</span> 
                                <i class="zmdi zmdi-more"></i>
                            </li>
                        @else
                            @if (isset($option['sub_menu']))
                                <li>
                                    <a class="{{ $option['a-active'] }}" aria-expanded="{{ $option['aria-expanded'] }}" href="javascript:void(0);" data-toggle="collapse" data-target="#{{ $option['link_btn'] }}">
                                        <div class="pull-left">
                                            <i class="{{ $option['icon'] }} mr-10"></i>
                                            <span class="right-nav-text txt-trans-initial">{{ $option['label'] }}</span>
                                        </div>
                                        <div class="pull-right">
                                            <i class="zmdi zmdi-caret-down"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="{{ $option['link_btn'] }}" class="collapse-level-1 two-col-list collapse {{ $option['ul-active'] }}">
                                        @foreach ($option['sub_menu'] as $submenu)
                                            @if (in_array($submenu['url'], HelpAdmin::permissionsUser(\Auth::user())) OR HelpAdmin::IsUserDeveloper())
                                                <li style="{{ (isset($submenu['mb'])) ? 'margin-bottom: 10px;' : '' }}">
                                                    <a class="txt-trans-initial {{ $submenu['active_page'] }}" href="{{ route($submenu['url']) }}">{{ $submenu['label'] }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>                            
                            @else
                                <li>
                                    <a class="{{ $option['a-active'] }}" aria-expanded="{{ $option['aria-expanded'] }}" href="{{ route($option['url']) }}">
                                        <div class="pull-left">
                                            <i class="{{ $option['icon'] }} mr-10"></i>
                                            <span class="right-nav-text txt-trans-initial">{{ $option['label'] }}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </a>
                                </li>
                            @endif
                            @if ($option['line'])
                                <li><hr class="light-grey-hr mb-10"/></li>
                            @endif
                        @endif
                    @endif
                @endforeach
            </ul>
        </div>
        <!-- /Left Sidebar Menu -->
        
        <!-- Right Sidebar Backdrop -->
        <div class="right-sidebar-backdrop"></div>
        <!-- /Right Sidebar Backdrop -->

        <!-- Main Content -->
		<div class="page-wrapper">
                <div class="container-fluid pt-20">