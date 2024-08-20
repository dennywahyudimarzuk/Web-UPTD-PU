<!--**********************************
            Sidebar start
        ***********************************-->
<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="dropdown header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                    <img src="{{ asset('admin/images/profile/defaultuser.jpg') }}" width="20" alt="" />
                    <div class="header-info ms-3">
                        <span class="font-w600 ">Hi,<b> {{ Auth::user()->name ?? 'Admin' }}</b></span>
                        <small class="text-end font-w400">{{ Auth::user()->email ?? 'admin@gmail.com' }}</small>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="./app-profile.html" class="dropdown-item ai-icon">
                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18"
                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span class="ms-2">{{ __('auth.profile') }} </span>
                    </a>
                    <a href="./email-inbox.html" class="dropdown-item ai-icon">
                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18"
                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                            </path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <span class="ms-2">{{ __('auth.inbox') }} </span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item ai-icon">
                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                                height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            <span class="ms-2 logout">{{ __('auth.logout') }} </span>
                        </button>
                    </form>
            </li>
            <li><a class="ai-icon" href="{{ route('dashboard.index') }}" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">{{ __('main.dashboard') }}</span>
                </a>
            </li>
            <li class="ms-3 my-2 text-uppercase fw-bold">{{ __('main.main') }}</li>
            <li><a class="ai-icon" href="{{ route('dashboard.banner.index') }}" aria-expanded="false">
                    <i class="fa fa-id-card-o"></i>
                    <span class="nav-text">{{ __('main.banner') }}</span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/news*') ? 'mm-active' : 'tt' }}">
                <a class="ai-icon" href="{{ route('dashboard.news.index') }}" aria-expanded="false">
                    <i class="fa fa-newspaper-o fw-bold"></i>
                    <span class="nav-text">{{ __('main.news') }}</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-picture-o fw-bold"></i>
                    <span class="nav-text">{{ __('main.gallery') }}</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('dashboard.image.index') }}">{{ __('main.image') }}</a></li>
                    <li><a href="{{ route('dashboard.video.index') }}">{{ __('main.video') }}</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-info fw-bold"></i>
                    <span class="nav-text">{{ __('main.information') }}</span>
                </a>
                <ul aria-expanded="false">
                    {{-- <li><a href="{{ route('dashboard.information-list.index', ['pg' => 'sakip']) }}">{{ __('main.sakip') }}</a>
                    </li>
                    <li><a href="{{ route('dashboard.information-list.index', ['pg' => 'strategic_plan']) }}">{{ __('main.strategic_plan') }}</a>
                    </li>
                    <li><a href="{{ route('dashboard.information-list.index', ['pg' => 'annual_performance_plan']) }}">{{ __('main.annual_performance_plan') }}</a>
                    </li>
                    <li><a href="{{ route('dashboard.information-list.index', ['pg' => 'key_performance_indicators']) }}">{{ __('main.key_performance_indicators') }}</a>
                    </li>
                    <li><a href="{{ route('dashboard.information-list.index', ['pg' => 'performance_agreement']) }}">{{ __('main.performance_agreement') }}</a>
                    </li> --}}
                    <li><a href="{{ route('dashboard.information-list.index', ['pg' => 'all_times']) }}">{{ __('main.all_times') }}</a>
                    </li>
                    <li><a href="{{ route('dashboard.information-list.index', ['pg' => 'periodically']) }}">{{ __('main.periodically') }}</a>
                    </li>
                    <li><a href="{{ route('dashboard.information-list.index', ['pg' => 'necessarily']) }}">{{ __('main.necessarily') }}</a>
                    </li>
                </ul>
            </li>
            {{-- <li class="{{ Request::is('dashboard/agenda*') ? 'mm-active' : '' }}">
                <a class="ai-icon" href="{{ route('dashboard.agenda.index') }}" aria-expanded="false">
                    <i class="fa fa-calendar-check-o fw-bold"></i>
                    <span class="nav-text">{{ __('main.agenda') }}</span>
                </a>
            </li> --}}
            <li class="{{ Request::is('dashboard/input*') ? 'mm-active' : '' }}">
                <a class="ai-icon" href="{{ route('dashboard.input.index') }}" aria-expanded="false">
                    <i class="fa fa-commenting fw-bold"></i>
                    <span class="nav-text">{{ __('main.input') }}</span>
                </a>
            </li>
            <li class="ms-3 my-2 text-uppercase fw-bold">{{ __('main.master') }}</li>
            <li class="{{ Request::is('dashboard/category*') ? 'mm-active' : '' }}">
                <a class="ai-icon" href="{{ route('dashboard.category.index') }}" aria-expanded="false">
                    <i class="fa fa-cubes fw-bold"></i>
                    <span class="nav-text">{{ __('main.news_category') }}</span></a>
            </li>
            @if (false)
                <li class="{{ Request::is('dashboard/menu*') ? 'mm-active' : '' }}">
                    <a class="ai-icon" href="{{ route('dashboard.menu.index') }}" aria-expanded="false">
                        <i class="fa fa-bars fw-bold"></i>
                        <span class="nav-text">{{ __('main.menu') }}</span>
                    </a>
                </li>
                <li class="{{ Request::is('dashboard/page*') ? 'mm-active' : '' }}">
                    <a class="ai-icon" href="{{ route('dashboard.page.index') }}" aria-expanded="false">
                        <i class="fa fa-columns fw-bold"></i>
                        <span class="nav-text">{{ __('main.page') }}</span>
                    </a>
                </li>
            @endif
            <li class="{{ Request::is('dashboard/setting*') ? 'mm-active' : '' }}">
                <a class="ai-icon" href="{{ route('dashboard.setting.index') }}" aria-expanded="false">
                    <i class="fa fa-cog fw-bold"></i>
                    <span class="nav-text">{{ __('main.setting') }}</span>
                </a>
            </li>
            @if (false)
                <li class="ms-3 my-2 text-uppercase fw-bold">{{ __('main.authentication') }}</li>
                <li class="{{ Request::is('dashboard/users*') ? 'mm-active' : '' }}">
                    <a class="ai-icon" href="{{ route('dashboard.users.index') }}" aria-expanded="false">
                        <i class="fa fa-users fw-bold"></i>
                        <span class="nav-text">{{ __('main.users') }}</span>
                    </a>
                </li>
            @endif
        </ul>
        {{-- <div class="copyright">
            <p><strong>Dompet Payment Admin Dashboard</strong> © 2021 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by DexignLab</p>
        </div> --}}
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->
