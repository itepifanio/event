<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="/home" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('events.list') }}" class="nav-link {{ request()->routeIs('events.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-calendar"></i>
                <p>
                    Event
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('organizations.index') }}" class="nav-link {{ request()->routeIs('organizations.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-building"></i>
                <p>
                    Organization
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Sair
                </p>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
