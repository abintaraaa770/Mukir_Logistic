<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mukir Logistics - Sewa Truk Profesional')</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="app-container">
        <!-- Navbar -->
        <nav class="navbar scrolled">
            <div class="container nav-content">
                <a href="{{ route('home') }}" class="logo">
                    <span class="logo-icon">❅</span> Mukir Logistics
                </a>
                <ul class="nav-links">
                    <li><a href="{{ route('home') }}" class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">Beranda</a></li>
                    <li><a href="{{ route('layanan') }}" class="{{ Route::currentRouteName() == 'layanan' ? 'active' : '' }}">Layanan</a></li>
                    <li><a href="{{ route('contact') }}" class="{{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">Kontak</a></li>
                    <li><a href="{{ route('tracking') }}" class="{{ Route::currentRouteName() == 'tracking' ? 'active' : '' }}">Lacak Pengiriman</a></li>
                </ul>
                <a href="{{ route('booking') }}" class="btn btn-accent" style="padding: 0.5rem 1.5rem; font-size: 0.9rem;">
                    Booking
                </a>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <h3 class="text-gradient" style="font-family: 'Outfit', sans-serif; font-size: 2rem; margin-bottom: 1rem;">
                    Mukir Logistics
                </h3>
                <p style="color: var(--text-muted); font-size: 0.95rem;">
                    Jl. Logistik Utama No. 99, SCBD, Jakarta. <br>
                    &copy; {{ date('Y') }} Mukir Logistics. Hak Cipta Dilindungi.
                </p>
                <div style="margin-top: 1.5rem; font-size: 0.85rem;">
                    <a href="{{ route('admin.login') }}" style="color: rgba(255,255,255,0.4); text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#00e0ff'" onmouseout="this.style.color='rgba(255,255,255,0.4)'">
                        Panel Admin
                    </a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
