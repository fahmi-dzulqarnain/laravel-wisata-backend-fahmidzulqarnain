<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Wisata Ticketing</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#"
                   class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Home</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link"
                           href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                    </li>
                    <li class="{{ Request::is('dashboard-ecommerce-dashboard') ? 'active' : '' }}">
                        <a class="nav-link"
                           href="{{ url('dashboard-ecommerce-dashboard') }}">Ecommerce Dashboard</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('users.index') }}"
                   class="nav-link "><i class="fas fa-users"></i>
                    <span>Users</span></a>
            </li>

            <li class="nav-item">
                <a href="{{ route('categories.index') }}"
                   class="nav-link "><i class="fas fa-tags"></i>
                    <span>Categories</span></a>
            </li>

            <li class="nav-item">
                <a href="{{ route('products.index') }}"
                   class="nav-link "><i class="fas fa-box"></i>
                    <span>Products</span></a>
            </li>
        </ul>
    </aside>
</div>
