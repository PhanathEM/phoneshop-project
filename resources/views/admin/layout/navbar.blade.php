<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">

        <!-- Left Side -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#">
                    ☰
                </a>
            </li>
            <li class="nav-item d-none d-md-block">
                <span class="nav-link">Admin Panel</span>
            </li>
        </ul>

        <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

    </div>
</nav>
