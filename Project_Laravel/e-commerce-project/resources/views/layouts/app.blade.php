<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Electronics E-Commerce Application'))</title>

    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        /* Navbar Styling */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        .navbar-brand {
            font-weight: 700;
            letter-spacing: -0.5px;
            color: #2b2d42 !important;
        }
        .nav-link {
            font-weight: 500;
            color: #4a4e69 !important;
            transition: color 0.2s ease;
        }
        .nav-link:hover {
            color: #ef233c !important;
        }
        
        /* Product Card Micro-animations */
        .product-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.04);
            background: #fff;
        }
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.1);
        }
        .product-card img {
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .product-card:hover img {
            transform: scale(1.05);
        }
        
        /* Buttons */
        .btn-primary {
            background-color: #ef233c;
            border-color: #ef233c;
            font-weight: 500;
            border-radius: 8px;
            padding: 8px 20px;
            transition: all 0.2s ease;
        }
        .btn-primary:hover {
            background-color: #d90429;
            border-color: #d90429;
            transform: scale(1.02);
        }
        .btn-outline-dark {
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .btn-outline-dark:hover {
            transform: scale(1.02);
        }

        /* Cart Badge */
        .cart-badge {
            position: absolute;
            top: 0px;
            right: -5px;
            font-size: 0.65rem;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #2b2d42 0%, #1a1a24 100%);
            color: #fff;
            padding: 80px 0;
            border-radius: 20px;
            margin-top: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        main {
            min-height: 80vh;
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Modern Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light sticky-top py-3">
            <div class="container">
                <a class="navbar-brand fs-4" href="{{ url('/') }}">
                    <i class="bi bi-box-seam text-danger me-2"></i>Electronics E-Commerce 
                </a>
                <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                        </li>
                        @php
                            $categoriesNav = \App\Models\Category::with('subcategories')->get();
                        @endphp
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                Categories
                            </a>
                            <ul class="dropdown-menu border-0 shadow-sm" aria-labelledby="navbarDropdown">
                                 @foreach($categoriesNav as $cat)
                                    <li><a class="dropdown-item" href="{{ route('category.products', $cat->slug) }}">{{ $cat->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                        <li class="nav-item me-3">
                            <a href="{{ route('cart.index') }}" class="nav-link position-relative">
                                <i class="bi bi-cart3 fs-5"></i>
                                @php
                                    $cartCount = Auth::check() 
                                        ? \App\Models\Cart::where('user_id', Auth::id())->sum('quantity')
                                        : collect(session('cart', []))->sum('quantity');
                                @endphp
                                @if($cartCount > 0)
                                    <span class="position-absolute translate-middle badge rounded-pill bg-danger cart-badge">
                                        {{ $cartCount }}
                                    </span>
                                @endif
                            </a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-dark ms-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownAuth" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end border-0 shadow-sm" aria-labelledby="navbarDropdownAuth">
                                    @if(Auth::user()->isAdmin())
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('user.orders') }}">My Orders</a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
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
            </div>

            @yield('content')
        </main>
        
        <footer class="bg-white text-center py-4 mt-5 border-top border-light">
            <div class="container">
                <p class="mb-0 text-muted">&copy; {{ date('Y') }} LaraShop E-Commerce. Built with Laravel 11.</p>
            </div>
        </footer>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Micro-interaction for alert auto close
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
</body>
</html>
