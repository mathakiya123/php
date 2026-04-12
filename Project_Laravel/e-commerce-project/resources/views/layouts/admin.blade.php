<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - {{ config('app.name', 'Laravel') }}</title>

    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f4f6f9; }
        .sidebar { min-height: 100vh; background-color: #343a40; color: #fff; }
        .sidebar a { color: #c2c7d0; text-decoration: none; padding: 12px 20px; display: block; border-left: 3px solid transparent; transition: all 0.3s ease; }
        .sidebar a:hover, .sidebar a.active { color: #fff; background: rgba(255,255,255,0.1); border-left-color: #0d6efd; }
        .navbar-admin { background-color: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .card { border: none; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); border-radius: 12px; }
        .form-control { border-radius: 8px; }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar flex-shrink-0" style="width: 250px;">
            <div class="px-3 py-4 text-center border-bottom border-secondary mb-3">
                <a href="{{ url('/') }}" class="text-white text-decoration-none fs-4 fw-bold">
                    <i class="bi bi-box-seam text-primary me-2"></i>LaraShop Admin
                </a>
            </div>
            
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
            
            <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <i class="bi bi-grid me-2"></i> Categories
            </a>
            
            <a href="{{ route('admin.subcategories.index') }}" class="{{ request()->routeIs('admin.subcategories.*') ? 'active' : '' }}">
                <i class="bi bi-list-nested me-2"></i> Subcategories
            </a>
            
            <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                <i class="bi bi-box me-2"></i> Products
            </a>
            
            <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                <i class="bi bi-cart-check me-2"></i> Orders
            </a>
            
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-danger mt-5">
                <i class="bi bi-power me-2"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1" style="overflow-y: auto; height: 100vh;">
            <nav class="navbar navbar-expand-lg navbar-admin mb-4 px-4 py-3">
                <div class="container-fluid">
                    <span class="fs-5 fw-bold text-dark">Admin Panel</span>
                    <div class="d-flex ms-auto">
                        <span class="text-muted mt-1 me-3">Welcome, {{ Auth::user()->name }}</span>
                    </div>
                </div>
            </nav>

            <div class="container-fluid px-4 pb-5">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
