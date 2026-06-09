<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <!-- Bootstrap 5 (REQUIRED) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- AdminLTE 4 CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">

        {{-- Navbar --}}
        @include('admin.layout.navbar')

        {{-- Sidebar --}}
        @include('admin.layout.sidebar')

        {{-- Main Content --}}
        <main class="app-main">
            <div class="app-content p-4">
                @yield('content')
            </div>
        </main>

    </div>

    <!-- Bootstrap JS (REQUIRED) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE 4 JS -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>

</html>
