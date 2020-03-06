<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('events.index') }}" class="nav-link">
                <i class="nav-icon fas fa-calendar"></i>
                <p>
                    Event
                </p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->