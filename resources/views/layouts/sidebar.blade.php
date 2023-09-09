<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="/images/icon/logo-apps.png" alt="Reimburse Apps"/>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <a class="js-arrow" href="/dashboard">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>

                @if (auth()->user()->level->level == 'Directur')
                    <li class="{{ Request::is('dashboard/users*') ? 'active' : '' }}">
                        <a href="/dashboard/users">
                            <i class="fas fa-chart-bar"></i>Users</a>
                    </li>
                @endif
                <li class="{{ Request::is('dashboard/reimburses*') ? 'active' : '' }}">
                    <a href="/dashboard/reimburses">
                        <i class="fas fa-table"></i>Reimburse</a>
                </li>
                @if (auth()->user()->level->level == 'Directur')
                    <li class="has-sub {{ Request::is('dashboard/statuses') || Request::is('dashboard/levels') ? 'active' : '' }}">
                        <a class="js-arrow {{ Request::is('dashboard/statuses') || Request::is('dashboard/levels') ? 'open' : '' }}" href="#">
                            <i class="fas fa-copy"></i>Master</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list" @if (Request::is('dashboard/statuses') || Request::is('dashboard/levels'))
                        style="display:block"
                        @endif >
                            <li class="{{ Request::is('dashboard/statuses*') ? 'active' : '' }}">
                                <a href="/dashboard/statuses">Status</a>
                            </li>
                            <li class="{{ Request::is('dashboard/levels*') ? 'active' : '' }}">
                                <a href="/dashboard/levels">Jabatan</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->