<aside class="app-sidebar bg-dark shadow">
    <div class="sidebar-brand p-3 text-white text-center">
        <img src="/images/phoneshop-logo.png" alt="Phone Shop" height="40">
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" role="menu">

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="/admin/dashboard"
                        class="nav-link text-white {{ request()->is('admin/dashboard') ? 'bg-secondary' : '' }}">
                        <span>Dashboard Statistics</span>
                    </a>
                </li>

                {{-- Phones --}}
                <li class="nav-item">
                    <a href="/admin/phones"
                        class="nav-link text-white {{ request()->is('admin/phones*') ? 'bg-secondary' : '' }}">
                        <span>Manage Phones</span>
                    </a>
                </li>

                {{-- Orders --}}
                <li class="nav-item">
                    <a href="/admin/orders"
                        class="nav-link text-white {{ request()->is('admin/orders*') ? 'bg-secondary' : '' }}">
                        <span>Orders</span>
                    </a>
                </li>

                {{-- Users --}}
                <li class="nav-item">
                    <a href="/admin/users"
                        class="nav-link text-white {{ request()->is('admin/users*') ? 'bg-secondary' : '' }}">
                        <span>Users Account</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
