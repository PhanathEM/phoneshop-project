<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container position-relative">

        {{-- Logo (Left) --}}
        <a class="navbar-brand" href="/">
            <img src="/images/phoneshop-logo.png" alt="Phone Shop" height="40">
        </a>

        {{-- Search (Center) --}}
        <form action="{{ route('products.index') }}" method="GET"
            class="d-none d-lg-flex position-absolute start-50 translate-middle-x" style="width: 50%;">

            <select name="brand" class="form-select me-2" style="width: 160px;">
                <option value="">All Brands</option>
                <option value="Apple" @selected(request('brand') == 'Apple')>Apple</option>
                <option value="Samsung" @selected(request('brand') == 'Samsung')>Samsung</option>
                <option value="Xiaomi" @selected(request('brand') == 'Xiaomi')>Xiaomi</option>
                <option value="Oppo" @selected(request('brand') == 'Oppo')>Oppo</option>
                <option value="Vivo" @selected(request('brand') == 'Vivo')>Vivo</option>
                <option value="Realme" @selected(request('brand') == 'Realme')>Realme</option>
                <option value="Huawei" @selected(request('brand') == 'Huawei')>Huawei</option>
                <option value="Honor" @selected(request('brand') == 'Honor')>Honor</option>
                <option value="Nokia" @selected(request('brand') == 'Nokia')>Nokia</option>
                <option value="ASUS" @selected(request('brand') == 'ASUS')>ASUS</option>
            </select>

            <input type="text" name="search" class="form-control me-2" placeholder="Search phone..."
                value="{{ request('search') }}">

            <button class="btn btn-primary">
                <i class="bi bi-search"></i>
            </button>
        </form>

        {{-- Toggle (Mobile) --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Right Menu --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">

                {{-- Cart --}}
                <li class="nav-item me-3">
                    <a href="{{ route('cart.index') }}" class="nav-link position-relative">
                        <i class="bi bi-cart3 fs-5"></i>
                        <span
                            class="position-absolute top-1 start-100 translate-middle
                                     badge rounded-pill bg-danger">
                            {{ session('cart') ? count(session('cart')) : 0 }}
                        </span>
                    </a>
                </li>

                {{-- Guest --}}
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            Register
                        </a>
                    </li>
                @endguest

                {{-- Authenticated User --}}
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('orders.index') }}">
                                    <i class="bi bi-bag"></i></i> My Orders
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="bi bi-person"></i> Profile
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
